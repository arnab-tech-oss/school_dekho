<?php

namespace App\Core;

use App\Core\BaseController;
use Illuminate\Support\Facades\Validator;


abstract class BaseAdminController extends BaseController
{
    protected function IsValidModel($request): bool
    {
        return true;
    }
}
