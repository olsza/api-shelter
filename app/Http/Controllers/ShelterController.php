<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Trait\ApiResourceTrait;
use App\Http\Requests\ShelterRequest;
use App\Models\Shelter;

class ShelterController extends Controller
{
    use ApiResourceTrait;

    protected string $modelName = Shelter::class;

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShelterRequest $request)
    {
        $data = $this->modelName::create($request->all());

        return response()->json($data, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShelterRequest $request, $id)
    {
        $data = $this->modelName::findOrFail($id);
        $data->update($request->all());

        return response()->json($data);
    }
}
