<?php

namespace App\Http\Controllers\Trait;

use Illuminate\Http\Request;

trait ApiResourceTrait
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            $this->modelName::all()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->modelName::create($request->all());

        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->modelName::find($id);

        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $this->modelName::findOrFail($id);
        $data->update($request->all());

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->modelName::destroy($id);

        return response()->json(null, 204);
    }
}
