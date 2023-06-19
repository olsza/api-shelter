<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Trait\ApiResourceTrait;
use App\Models\Cat;

class CatController extends Controller
{
    use ApiResourceTrait;

    protected string $modelName = Cat::class;
}
