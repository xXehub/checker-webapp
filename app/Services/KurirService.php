<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

class kurirService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = Config::get('services.lolhuman.key');
        $this->baseUrl = Config::get('services.lolhuman.url');
    }

    public function trackPackage($trackingNumber)
    {
        try {
            $url = $this->baseUrl . 'checkresi';
            $params = [
                'apikey' => $this->apiKey,
                'resi' => $trackingNumber
            ];
            
            // Log request untuk debugging
            \Log::info("Requesting: $url", $params);
            
            $response = Http::get($url, $params);
            
            // Log full response
            \Log::info("Response Status: " . $response->status());
            \Log::info("Response Body: " . $response->body());
            
            if ($response->successful()) {
                return $response->json();
            }
            
            return [
                'status' => $response->status(),
                'message' => 'Gagal mendapatkan informasi pengiriman: ' . $response->body(),
                'result' => null
            ];
        } catch (\Exception $e) {
            \Log::error("Exception in tracking: " . $e->getMessage());
            return [
                'status' => 500,
                'message' => 'Error: ' . $e->getMessage(),
                'result' => null
            ];
        }
    }
}