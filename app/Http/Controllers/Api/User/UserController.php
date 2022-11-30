<?php

namespace App\Http\Controllers\Api\User;

use App\Core\Controller;
use App\Interfaces\Eloquent\IUserService;
use App\Http\Requests\Api\User\UserController\LoginRequest;
use App\Http\Requests\Api\User\UserController\GetProfileRequest;
use App\Core\HttpResponse;

class UserController extends Controller
{
    use HttpResponse;

    /**
     * @var $userService
     */
    private $userService;

    /**
     * @var $passwordResetService
     */
    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param LoginRequest $request
     */
    public function login(LoginRequest $request)
    {
        $response = $this->userService->login(
            $request->email,
            $request->password
        );

        return $this->httpResponse(
            $response->getMessage(),
            $response->getStatusCode(),
            $response->getData(),
            $response->isSuccess()
        );
    }

    /**
     * @param GetProfileRequest $request
     */
    public function getProfile(GetProfileRequest $request)
    {
        $response = $this->userService->getById(
            $request->user()->id
        );

        return $this->httpResponse(
            $response->getMessage(),
            $response->getStatusCode(),
            $response->getData(),
            $response->isSuccess()
        );
    }

    /**
     * @param GetProfileRequest $request
     */
    public function getCompanies(GetProfileRequest $request)
    {
        $response = $this->userService->getCompanies(
            $request->user()->id
        );

        return $this->httpResponse(
            $response->getMessage(),
            $response->getStatusCode(),
            $response->getData(),
            $response->isSuccess()
        );
    }
}
