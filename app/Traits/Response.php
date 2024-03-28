<?php

namespace App\Traits;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use App\Enums\HttpStatusCodeEnum;

trait Response
{

    /**
     * @param iterable $errors
     * @param string|null $message
     * @param HttpStatusCodeEnum|null $errorHttpCode
     * @param bool $shouldThrow
     * @param array $headers
     * @param int $options
     * @return mixed
     */
    public function errorResponse(
        iterable            $errors,
        ?string             $message = null,
        ?HttpStatusCodeEnum $errorHttpCode = null,
        bool                $shouldThrow = true,
        array               $headers = [],
        int                 $options = 0
    ): mixed
    {
        $response = response()->json(
            data: [
                'status' => false,
                'message' => $message ?? @trans('messages.unprocessable_entity'),
                'errors' => $errors,
            ],
            status: $errorHttpCode->value ?? HttpStatusCodeEnum::UnprocessableEntity->value,
            headers: $headers,
            options: $options
        );

        return $shouldThrow ? throw new HttpResponseException($response) : $response;
    }


    /**
     * @param string|null $message
     * @param array $headers
     * @param int $options
     * @return JsonResponse
     */
    public function successResponse(
        ?string $message = null,
        array   $headers = [],
        int     $options = 0
    ): JsonResponse
    {
        return response()->json(
            data: [
                'status' => true,
                'message' => $message ?? @trans('messages.success'),
            ],
            status: HttpStatusCodeEnum::Success->value,
            headers: $headers,
            options: $options
        );
    }

    /**
     * @param mixed $data
     * @param string|null $message
     * @param array $headers
     * @param int $options
     * @return JsonResponse
     */
    public function dataResponse(
        mixed $data,
        ?string  $message = null,
        array    $headers = [],
        int      $options = 0
    ): JsonResponse
    {
        return response()->json(
            data: [
                'status' => true,
                'message' => $message ?? @trans('messages.success'),
                'data' => $data,
            ],
            status: HttpStatusCodeEnum::Success->value,
            headers: $headers,
            options: $options
        );
    }


    /**
     * @param string|null $message
     * @param HttpStatusCodeEnum|null $errorHttpCode
     * @param bool $shouldThrow
     * @param array $headers
     * @param int $options
     * @return mixed
     */
    public function errorMessage(
        ?string             $message = null,
        ?HttpStatusCodeEnum $errorHttpCode = null,
        bool                $shouldThrow = true,
        array               $headers = [],
        int                 $options = 0
    ): mixed
    {
        $response = response()->json(
            data: [
                'status' => false,
                'message' => $message ?? @trans('messages.internal_server_error'),
            ],
            status: ($errorHttpCode ?? HttpStatusCodeEnum::InternalServerError)->value,
            headers: $headers,
            options: $options
        );

        return $shouldThrow ? throw new HttpResponseException($response) : $response;
    }

}
