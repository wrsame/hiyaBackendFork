<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use Illuminate\Http\Request;
use App\Http\Resources\CollectionResource;

class CollectionController extends Controller
{

    public function index()
    {
        //
        $collections = Collection::orderBy('name', 'asc')->get();
        return response()->json(CollectionResource::collection($collections)->resolve());
    
    }

    public function latestCollections($count)
    {
        $collections = Collection::orderBy('created_at', 'desc')->take($count)->get();
        return response()->json(CollectionResource::collection($collections)->resolve());
    }

    public function store(Request $request)
    {
        $validator =  $request->validate([
            'name' => 'required|string'
        ]);

        $collection = Collection::create($validator);

        return CollectionResource::make($collection);
    }

    public function show(Collection $collection)
    {
        return CollectionResource::make($collection);
    }

    public function update(Request $request, Collection $collection)
    {
        $validated =  $request->validate([
            'name' => 'required|string'
        ]);

        $collection->update($validated);

        return CollectionResource::make($collection);
    }


    public function destroy(Collection $collection)
    {
        $collection->delete();
        return response()->noContent();
    }
}
