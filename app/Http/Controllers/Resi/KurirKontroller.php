<?php

namespace App\Http\Controllers\Resi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\kurirService;

class KurirKontroller extends Controller
{
    protected $courierService;

    public function __construct(kurirService $courierService)
    {
        $this->courierService = $courierService;
    }

    public function index()
    {
        return view('resi.index');
    }

    public function trackPackage(Request $request)
    {
        $request->validate([
            'tracking_number' => 'required|string|min:5|max:50'
        ], [
            'tracking_number.required' => 'Nomor resi harus diisi',
            'tracking_number.min' => 'Nomor resi terlalu pendek',
            'tracking_number.max' => 'Nomor resi terlalu panjang'
        ]);

        $trackingNumber = trim($request->input('tracking_number')); // Trim whitespace
        $trackingData = $this->courierService->trackPackage($trackingNumber);

        // Debugging response
        \Log::info('Track Package Response', ['data' => $trackingData]);

        return view('resi.index', [
            'trackingData' => $trackingData,
            'trackingNumber' => $trackingNumber
        ]);
    }
}
