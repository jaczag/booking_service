<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\LoginRequest;
use App\Http\Requests\v1\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AuthController extends Controller
{
    /**
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $data = $request->validated();

        try {
            if (!Auth::attempt($data)) {
                return $this->errorResponse(__('messages.Invalid credentials'), 401);
            }
            $token = Auth::user()->createToken('logged_in')->plainTextToken;
        } catch (\Exception $e) {
            reportError($e);
            return $this->errorResponse(__('messages.Something went wrong'));
        }

        return $this->successResponse([
            'user' => UserResource::make(Auth::user()),
            'token'=> $token
        ]);
    }

    /**
     * @param RegisterRequest $request
     * @param UserService $service
     * @return JsonResponse
     */
    public function register(RegisterRequest $request, UserService $service): JsonResponse
    {
        try {
            $user = $service->assignData($request->validated());
        } catch (Exception $exception) {
            reportError($exception);
            return $this->errorResponse(__('messages.Something went wrong'));
        }
        return $this->successResponse(UserResource::make($user));
    }


    public function logout(): JsonResponse
    {
        try {
            Auth::user()->tokens()->delete();
        } catch (Exception $exception) {
            reportError($exception);
            return $this->errorResponse(__('messages.Something went wrong'));
        }
        return $this->successResponse();
    }
}
