<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Trait\ApiResourceTrait;
use App\Http\Requests\CatRequest;
use App\Models\Cat;

class CatController extends Controller
{
    use ApiResourceTrait;

    protected string $modelName = Cat::class;

    /**
     * Store a newly created resource in storage.
     */
    public function store(CatRequest $request)
    {
        $data = $this->modelName::create($request->all());

        return response()->json($data, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CatRequest $request, $id)
    {
        $data = $this->modelName::findOrFail($id);
        $data->update($request->all());

        return response()->json($data);
    }
}
