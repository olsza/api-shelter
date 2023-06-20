<?php

namespace App\Http\Requests\Trait;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

trait FailedValidationTrait
{
    protected function failedValidation(Validator $validator): HttpResponseException
    {
        throw new HttpResponseException(
            response()->json([
                'errors' => $validator->errors(),
            ], Response::HTTP_BAD_REQUEST)
        );
    }
}
