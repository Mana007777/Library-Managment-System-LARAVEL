<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    public function __construct(private UserService $service) {}

    public function index()
    {
        return UserResource::collection(User::all());
    }

    public function store(StoreUserRequest $request)
    {
        return new UserResource(
            $this->service->store($request->validated())
        );
    }

    public function update(StoreUserRequest $request, User $user)
    {
        return new UserResource(
            $this->service->update($user, $request->validated())
        );
    }

    public function destroy(User $user)
    {
        $this->service->delete($user);
        return response()->noContent();
    }
}
