<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Http\Resources\PageResource;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use Illuminate\Support\Facades\Cache;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Cache::remember('pages', 3600, function () {
            return Page::with(['statsItems', 'valueItems'])->paginate(15);
        });

        return PageResource::collection($pages);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePageRequest $request)
    {
        $page = Page::create($request->validated());

        return new PageResource($page);
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        $page->load(['statsItems', 'valueItems']);

        return new PageResource($page);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
        $page->update($request->validated());

        return new PageResource($page);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $page->delete();

        return response()->json(null, 204);
    }
}
