<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Trait\ApiResourceTrait;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;

class EmployeeController extends Controller
{
    use ApiResourceTrait;

    protected string $modelName = Employee::class;

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        $data = $this->modelName::create($request->all());

        return response()->json($data, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, $id)
    {
        $data = $this->modelName::findOrFail($id);
        $data->update($request->all());

        return response()->json($data);
    }
}
