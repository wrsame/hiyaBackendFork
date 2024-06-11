<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Http\Resources\MaterialResource;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        $material = Material::all();
        return response()->json(MaterialResource::collection($material)->resolve());

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $material = Material::create($validated);
        return MaterialResource::make($material);
    }

    public function show(Material $material)
    {
        return MaterialResource::make($material);
    }

    public function update(Request $request, Material $material)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
        ]);

        $material->update($validated);

        return MaterialResource::make($material);
    }

    public function destroy(Material $material)
    {
        $material->delete();
        return response()->json(['message' => 'material deleted successfully'], 204);
    }
}
