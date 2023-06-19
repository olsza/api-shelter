<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Trait\ApiResourceTrait;
use App\Models\Employee;

class EmployeeController extends Controller
{
    use ApiResourceTrait;

    protected string $modelName = Employee::class;
}
