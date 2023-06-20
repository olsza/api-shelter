<?php

namespace App\Http\Controllers\Trait;

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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->modelName::find($id);

        return response()->json($data, 200);
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
