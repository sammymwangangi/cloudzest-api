<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Homepage;
use App\Http\Resources\HomepagesResource;
use App\Http\Requests\StoreHomepageRequest;
use App\Http\Requests\UpdateHomepageRequest;
use Illuminate\Support\Facades\Cache;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $homepages = Cache::remember('homepages', 3600, function () {
            return Homepage::paginate(15);
        });
        
        return HomepagesResource::collection($homepages);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHomepageRequest $request)
    {
        $homepage = Homepage::create($request->validated());
        
        return new HomepagesResource($homepage);
    }

    /**
     * Display the specified resource.
     */
    public function show(Homepage $homepage)
    {
        return new HomepagesResource($homepage);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHomepageRequest $request, Homepage $homepage)
    {
        $homepage->update($request->validated());
        
        return new HomepagesResource($homepage);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Homepage $homepage)
    {
        $homepage->delete();
        
        return response()->json(null, 204);
    }
}
