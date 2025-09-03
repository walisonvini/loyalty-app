<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customers\StoreCustomerRequest;
use App\Http\Requests\Customers\AddPointsRequest;
use App\Http\Requests\Customers\SearchCustomerRequest;
use App\Http\Requests\Customers\RedeemRewardRequest;

use App\Http\Resources\Customers\PointsAddedResource;
use App\Http\Resources\Customers\CustomerBalanceResource;

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
        $customers = $this->customerService->all();

        return $this->successResponse($customers, 'Customers found successfully');
    }

    public function store(StoreCustomerRequest $request)
    {
        $customer = $this->customerService->create($request->validated());

        return $this->successResponse($customer, 'Customer created successfully');
    }

    public function show(string $id)
    {
        try {
            $customer = $this->customerService->find($id);

            return $this->successResponse($customer, 'Customer found successfully');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 404);
        }
    }

    public function search(SearchCustomerRequest $request)
    {
        try {
            $customer = $this->customerService->search($request->validated('query'));

            return $this->successResponse($customer, 'Customers found successfully');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 404);
        }
    }

    public function addPoints(AddPointsRequest $request, string $id)
    {
        try {
            $customer = $this->customerService->find($id);

            $pointsAdded = $this->customerService->addPoints($customer, $request->amount);

            $customer->refresh();

            return $this->successResponse(new PointsAddedResource($customer, $pointsAdded), 'Points added successfully');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 400);
        }
    }

    public function getBalanceWithRedemptions(string $id)
    {
        try {
            $customer = $this->customerService->find($id);

            $customer->load('redemptions.reward');

            return $this->successResponse(new CustomerBalanceResource($customer), 'Customer balance found successfully');

        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 404);
        }
    }

    public function redeemReward(RedeemRewardRequest $request, string $id)
    {
        try {
            $customer = $this->customerService->find($id);

            $redemption = $this->customerService->redeemReward($customer, $request->reward_id);
    
            return $this->successResponse([
                'reward' => $redemption->reward->only(['id', 'name', 'points']),
                'points_balance' => $customer->points_balance,
            ], 'Reward redeemed successfully');
    
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 400);
        }
    }    
}
