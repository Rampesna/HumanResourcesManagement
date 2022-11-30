<?php

namespace App\Services\Eloquent;

use App\Interfaces\Eloquent\IUserService;
use App\Models\Eloquent\User;
use App\Core\ServiceResponse;
use Illuminate\Support\Facades\Hash;

class UserService implements IUserService
{
    /**
     * @return ServiceResponse
     */
    public function getAll(): ServiceResponse
    {
        return new ServiceResponse(
            true,
            'All users',
            200,
            User::all()
        );
    }

    /**
     * @param int $id
     *
     * @return ServiceResponse
     */
    public function getById(
        int $id
    ): ServiceResponse
    {
        $user = User::with([

        ])->find($id);
        if ($user) {
            return new ServiceResponse(
                true,
                'User',
                200,
                $user
            );
        } else {
            return new ServiceResponse(
                false,
                'User not found',
                404,
                null
            );
        }
    }

    /**
     * @param int $pageIndex
     * @param int $pageSize
     * @param string|null $keyword
     * @param int|null $typeId
     *
     * @return ServiceResponse
     */
    public function index(
        int     $pageIndex,
        int     $pageSize,
        ?string $keyword = null,
        ?int    $typeId = null
    ): ServiceResponse
    {
        $users = User::with([
            'companies'
        ])->where(function ($users) use ($keyword) {
            $users->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('email', 'like', '%' . $keyword . '%');
        });

        if ($typeId) {
            $users->where('type_id', $typeId);
        }

        return new ServiceResponse(
            true,
            'Users',
            200,
            [
                'totalCount' => $users->count(),
                'pageIndex' => $pageIndex,
                'pageSize' => $pageSize,
                'users' => $users->skip($pageSize * $pageIndex)
                    ->take($pageSize)
                    ->get()
            ]
        );
    }

    /**
     * @param string $email
     * @param string $password
     *
     * @return ServiceResponse
     */
    public function login(
        string $email,
        string $password
    ): ServiceResponse
    {
        $user = User::where('email', $email)->first();
        if ($user) {
            if (Hash::check($password, $user->password)) {
                $tokenResponse = $this->generateToken($user->id);
                if ($tokenResponse->isSuccess()) {
                    $user->api_token = $tokenResponse->getData();
                    $user->save();
                    return new ServiceResponse(
                        true,
                        'User logged in successfully',
                        200,
                        [
                            'token' => $tokenResponse->getData()
                        ]
                    );
                } else {
                    return $tokenResponse;
                }
            } else {
                return new ServiceResponse(
                    false,
                    'Password is incorrect',
                    401,
                    null
                );
            }
        } else {
            return new ServiceResponse(
                false,
                'User not found',
                404,
                null
            );
        }
    }

    /**
     * @param string $userId
     *
     * @return ServiceResponse
     */
    public function generateToken(
        string $userId,
    ): ServiceResponse
    {
        $user = $this->getById($userId);
        if ($user->isSuccess()) {
            return new ServiceResponse(
                true,
                'Token generated',
                200,
                $user->getData()->createToken('userApiToken')->plainTextToken
            );
        } else {
            return $user;
        }
    }

    /**
     * @param string $userId
     *
     * @return ServiceResponse
     */
    public function getCompanies(
        string $userId,
    ): ServiceResponse
    {
        $user = $this->getById($userId);
        if ($user->isSuccess()) {
            return new ServiceResponse(
                true,
                'User companies',
                200,
                $user->getData()->companies
            );
        } else {
            return $user;
        }
    }

    /**
     * @param int $id
     *
     * @return ServiceResponse
     */
    public function delete(
        int $id
    ): ServiceResponse
    {
        $user = $this->getById($id);
        if ($user->isSuccess()) {
            $user->getData()->delete();

            return new ServiceResponse(
                true,
                'User deleted',
                200,
                $user->getData()
            );
        } else {
            return $user;
        }
    }
}
