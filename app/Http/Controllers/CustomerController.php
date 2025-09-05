<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customers\StoreCustomerRequest;
use App\Http\Requests\Customers\AddPointsRequest;
use App\Http\Requests\Customers\SearchCustomerRequest;
use App\Http\Requests\Customers\RedeemRewardRequest;

use App\Http\Resources\Customers\PointsAddedResource;
use App\Http\Resources\Customers\RewardRedemptionResource;
use App\Http\Resources\Customers\CustomerBalanceResource;

use App\Services\CustomerService;
use App\Services\RewardService;

use App\Traits\ApiResponse;

class CustomerController extends Controller
{
    use ApiResponse;

    public function __construct(
        private CustomerService $customerService,
        private RewardService $rewardService
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

    public function show(string $customerId)
    {
        try {
            $customer = $this->customerService->find($customerId);

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

    public function addPoints(AddPointsRequest $request, string $customerId)
    {
        try {
            $customer = $this->customerService->find($customerId);

            $pointsAdded = $this->customerService->addPoints($customer, $request->amount);

            $customer->refresh();

            return $this->successResponse(new PointsAddedResource($customer, $pointsAdded), 'Points added successfully');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 400);
        }
    }

    public function getBalanceWithRedemptions(string $customerId)
    {
        try {
            $customer = $this->customerService->find($customerId);

            $customer->load(['redemptions' => function($query) {
                $query->orderBy('created_at', 'desc');
            }, 'redemptions.reward']);

            return $this->successResponse(new CustomerBalanceResource($customer), 'Customer balance found successfully');

        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 404);
        }
    }

    public function redeemReward(RedeemRewardRequest $request, string $customerId)
    {
        try {
            $customer = $this->customerService->find($customerId);

            $reward = $this->rewardService->find($request->reward_id);

            $redemption = $this->customerService->redeemReward($customer, $reward);
    
            return $this->successResponse(new RewardRedemptionResource($redemption), 'Reward redeemed successfully');
    
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 400);
        }
    }    
}
