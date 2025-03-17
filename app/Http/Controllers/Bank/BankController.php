<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use App\Services\BankService;
use Illuminate\Http\Request;

class BankController extends Controller
{
    protected $bankService;
    
    /**
     * Create a new controller instance.
     *
     * @param BankService $bankService
     * @return void
     */
    public function __construct(BankService $bankService)
    {
        // $this->middleware('auth'); // iki gawe lek butuh wajib login sek
        $this->bankService = $bankService;
    }

    /**
     * Gawe get data all bank anjoyyyyyy
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $paymentMethods = $this->bankService->getAllPaymentMethods();
        
        return view('banks.index', [
            'banks' => $paymentMethods['banks'],
            'ewallets' => $paymentMethods['ewallets']
        ]);
    }

    /**
     * Prosess check akun
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function checkAccount(Request $request)
    {
        $validated = $request->validate([
            'account_number' => 'required|string',
            'account_bank' => 'required|string'
        ]);
        
        $result = $this->bankService->checkAccount(
            $validated['account_number'],
            $validated['account_bank']
        );
        
        $paymentMethods = $this->bankService->getAllPaymentMethods();
        
        return view('banks.index', [
            'banks' => $paymentMethods['banks'],
            'ewallets' => $paymentMethods['ewallets'],
            'result' => $result,
            'formData' => $validated
        ]);
    }
}