<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Trait\ApiResourceTrait;
use App\Models\Shelter;

class ShelterController extends Controller
{
    use ApiResourceTrait;

    protected string $modelName = Shelter::class;
}
