<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomerRequest;

use App\Services\CustomerService;

use App\Traits\ApiResponse;

class CustomerController extends Controller
{
    use ApiResponse;

    public function __construct(
        private CustomerService $customerService
    ){}

    public function index()
    {
        
    }

    public function store(StoreCustomerRequest $request)
    {
        $customer = $this->customerService->create($request->validated());

        return $this->successResponse($customer, 'Customer created successfully');
    }

    public function show(string $id)
    {
        
    }

    public function update(Request $request, string $id)
    {
        
    }

    public function destroy(string $id)
    {
        
    }
}
