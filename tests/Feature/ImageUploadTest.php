<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Models\User;

class ImageUploadTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_upload_image(): void
    {
        // Create a user
        $user = User::factory()->create();
        
        // Create a fake image
        Storage::fake('public');
        $file = UploadedFile::fake()->image('test-image.jpg');
        
        // Send the request with authentication
        $response = $this->actingAs($user)
            ->postJson('/api/upload/image', [
                'image' => $file,
            ]);
        
        // Assert the response
        $response->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'url',
                'path'
            ]);
        
        // Extract the path from the response
        $path = $response->json('path');
        
        // Assert the file was stored
        Storage::disk('public')->assertExists($path);
    }

    public function test_unauthenticated_user_cannot_upload_image(): void
    {
        // Create a fake image
        Storage::fake('public');
        $file = UploadedFile::fake()->image('test-image.jpg');
        
        // Send the request without authentication
        $response = $this->postJson('/api/upload/image', [
            'image' => $file,
        ]);
        
        // Assert the response is unauthorized
        $response->assertStatus(401);
    }
}
