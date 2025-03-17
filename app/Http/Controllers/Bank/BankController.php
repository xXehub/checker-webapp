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
        $this->bankService = $bankService;
    }

    /**
     * Show the bank account checking form with list of available banks
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $banks = $this->bankService->getAllBanks();
        $ewallets = $this->bankService->getEwallets();
        
        return view('banks.index', [
            'banks' => $banks,
            'ewallets' => $ewallets
        ]);
    }

    /**
     * Process account checking
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function checkAccount(Request $request)
    {
        $validated = $request->validate([
            'account_number' => 'required|string',
            'account_bank' => 'required|string',
            'type' => 'sometimes|string|in:bank,ewallet'
        ]);
        
        $result = $this->bankService->checkAccount(
            $validated['account_number'],
            $validated['account_bank']
        );
        
        $banks = $this->bankService->getAllBanks();
        $ewallets = $this->bankService->getEwallets();
        
        return view('banks.index', [
            'banks' => $banks,
            'ewallets' => $ewallets,
            'result' => $result,
            'formData' => $validated
        ]);
    }
}