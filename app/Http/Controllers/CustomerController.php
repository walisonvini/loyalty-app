<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Customers\StoreCustomerRequest;
use App\Http\Requests\Customers\AddPointsRequest;

use App\Http\Resources\Customers\PointsAddedResource;

use App\Services\CustomerService;

use App\Traits\ApiResponse;

use App\Models\Customer;

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

    public function addPoints(AddPointsRequest $request, Customer $customer)
    {
        try {
            $pointsAdded = $this->customerService->addPoints($customer, $request->amount);

            return $this->successResponse(new PointsAddedResource($customer, $pointsAdded), 'Points added successfully');
        } catch (\InvalidArgumentException $e) {
            return $this->errorResponse($e->getMessage(), 400);
        }
    }
}
