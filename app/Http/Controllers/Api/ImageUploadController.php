<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageUploadController extends Controller
{
    /**
     * Upload an image and return the URL.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            if ($request->hasFile('image')) {
                // Generate a unique filename with original extension
                $originalName = $request->file('image')->getClientOriginalName();
                $extension = $request->file('image')->getClientOriginalExtension();
                $filename = pathinfo($originalName, PATHINFO_FILENAME);
                $sluggedFilename = Str::slug($filename) . '_' . time() . '.' . $extension;

                // Store the file in the public disk
                $path = $request->file('image')->storeAs(
                    'images/services',
                    $sluggedFilename,
                    'public'
                );

                // Return the URL to the stored image
                $url = Storage::disk('public')->url($path);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Image uploaded successfully',
                    'url' => $url,
                    'path' => $path
                ]);
            }

            return response()->json([
                'status' => 'error',
                'message' => 'No image file provided'
            ], 400);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to upload image',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
