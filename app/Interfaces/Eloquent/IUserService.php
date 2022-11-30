<?php

namespace App\Interfaces\Eloquent;

use App\Core\ServiceResponse;

interface IUserService extends IEloquentService
{
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
    ): ServiceResponse;

    /**
     * @param string $email
     * @param string $password
     *
     * @return ServiceResponse
     */
    public function login(
        string $email,
        string $password
    ): ServiceResponse;

    /**
     * @param string $userId
     *
     * @return ServiceResponse
     */
    public function generateToken(
        string $userId,
    ): ServiceResponse;

    /**
     * @param string $userId
     *
     * @return ServiceResponse
     */
    public function getCompanies(
        string $userId,
    ): ServiceResponse;
}
