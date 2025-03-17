<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BankService
{
    protected $baseUrl = 'https://cekrekening-api.belibayar.online/api/v1';

    /**
     * Get all available banks
     *
     * @return array
     */
    public function getAllBanks()
    {
        try {
            $response = Http::get($this->baseUrl . '/bank-list');
            
            if ($response->successful()) {
                return $response->json()['data']['banks'];
            }
            
            Log::error('Failed to get bank list', [
                'status' => $response->status(),
                'response' => $response->body()
            ]);
            
            return [];
        } catch (\Exception $e) {
            Log::error('Exception while getting bank list', [
                'message' => $e->getMessage()
            ]);
            
            return [];
        }
    }

    /**
     * Get all available e-wallets
     *
     * @return array
     */
    public function getEwallets()
    {
        try {
            $response = Http::get($this->baseUrl . '/bank-list');
            
            if ($response->successful()) {
                return $response->json()['data']['ewallets'];
            }
            
            Log::error('Failed to get ewallet list', [
                'status' => $response->status(),
                'response' => $response->body()
            ]);
            
            return [];
        } catch (\Exception $e) {
            Log::error('Exception while getting ewallet list', [
                'message' => $e->getMessage()
            ]);
            
            return [];
        }
    }

    /**
     * Get all payment methods (banks and e-wallets combined)
     *
     * @return array
     */
    public function getAllPaymentMethods()
    {
        $banks = $this->getAllBanks();
        $ewallets = $this->getEwallets();
        
        return [
            'banks' => $banks,
            'ewallets' => $ewallets
        ];
    }

    /**
     * Check account details
     *
     * @param string $accountNumber
     * @param string $bankCode
     * @return array|null
     */
    public function checkAccount($accountNumber, $bankCode)
    {
        try {
            $response = Http::post($this->baseUrl . '/account-inquiry', [
                'account_number' => $accountNumber,
                'account_bank' => $bankCode
            ]);
            
            if ($response->successful()) {
                return $response->json();
            }
            
            Log::error('Failed to check account', [
                'status' => $response->status(),
                'response' => $response->body(),
                'account_number' => $accountNumber,
                'account_bank' => $bankCode
            ]);
            
            return [
                'success' => false,
                'message' => $response->json()['message'] ?? 'Failed to check account',
                'data' => null
            ];
        } catch (\Exception $e) {
            Log::error('Exception while checking account', [
                'message' => $e->getMessage(),
                'account_number' => $accountNumber,
                'account_bank' => $bankCode
            ]);
            
            return [
                'success' => false,
                'message' => 'Error: ' . $e->getMessage(),
                'data' => null
            ];
        }
    }
}