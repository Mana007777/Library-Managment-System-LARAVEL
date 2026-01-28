<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoanRequest;
use App\Http\Resources\LoanResource;
use App\Models\Loan;
use App\Services\LoanService;

class LoanController extends Controller
{
    public function __construct(private LoanService $service) {}

    public function index()
    {
        return LoanResource::collection(
            Loan::with(['user', 'copy.book'])->get()
        );
    }

    public function store(StoreLoanRequest $request)
    {
        return new LoanResource(
            $this->service->borrow($request->validated())
        );
    }

    public function return(Loan $loan)
    {
        return new LoanResource(
            $this->service->return($loan)
        );
    }
}
