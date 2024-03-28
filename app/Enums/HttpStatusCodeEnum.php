<?php

namespace App\Enums;


enum HttpStatusCodeEnum: int
{
    case Success = 200;
    case PaymentRequired = 402;
    case NotFound = 404;
    case NotSupportedMethod = 405;
    case UnprocessableEntity = 422;
    case InternalServerError = 500;
}
