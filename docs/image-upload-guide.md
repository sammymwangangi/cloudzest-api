# Image Upload Guide for CloudZest API

This guide explains how to handle image uploads for the CloudZest API, specifically for the `hero_image_url` field in services.

## Overview

The API provides an endpoint for uploading images, which returns a URL that can be used in the `hero_image_url` field when creating or updating a service.

## Authentication

All requests to the API, including image uploads, require authentication using a Bearer token.

## Image Upload Process

### Step 1: Upload the Image

Make a POST request to `/api/upload/image` with the image file:

```
POST /api/upload/image
Content-Type: multipart/form-data
Authorization: Bearer YOUR_TOKEN

Form data:
- image: [file]
```

### Step 2: Get the Image URL

The response will include the URL of the uploaded image:

```json
{
  "status": "success",
  "message": "Image uploaded successfully",
  "url": "http://example.com/storage/images/services/my-image_1620000000.jpg",
  "path": "images/services/my-image_1620000000.jpg"
}
```

### Step 3: Use the URL in Service Creation/Update

Use the returned URL in the `hero_image_url` field when creating or updating a service:

```json
{
  "slug": "web-development",
  "meta_title": "Web Development Services",
  "meta_description": "Professional web development services",
  "seo_keywords": "web development, website, programming",
  "hero_heading": "Web Development Services",
  "hero_subheading": "Professional web development services",
  "hero_cta_button_text": "Get Started",
  "hero_cta_button_link": "/contact",
  "hero_image_url": "http://example.com/storage/images/services/my-image_1620000000.jpg",
  "introduction_heading": "Our Web Development Services",
  "introduction_content": "We provide professional web development services",
  "testimonial_or_quote": "Great service!",
  "testimonial_author": "John Doe",
  "published": true
}
```

## Image Requirements

- Supported formats: JPEG, PNG, JPG, GIF
- Maximum file size: 2MB

## Error Handling

If the image upload fails, the API will return an error response:

```json
{
  "status": "error",
  "message": "Failed to upload image",
  "error": "Error message details"
}
```

Common error scenarios:
- File too large
- Unsupported file format
- Authentication failure
- Server error

## Frontend Implementation Example

Here's an example of how to implement the image upload in a frontend application using JavaScript:

```javascript
// Function to upload an image
async function uploadImage(imageFile, token) {
  const formData = new FormData();
  formData.append('image', imageFile);
  
  try {
    const response = await fetch('http://example.com/api/upload/image', {
      method: 'POST',
      headers: {
        'Authorization': `Bearer ${token}`
      },
      body: formData
    });
    
    const data = await response.json();
    
    if (data.status === 'success') {
      return data.url;
    } else {
      throw new Error(data.message || 'Failed to upload image');
    }
  } catch (error) {
    console.error('Error uploading image:', error);
    throw error;
  }
}

// Example usage in a form
document.getElementById('imageUploadForm').addEventListener('submit', async (e) => {
  e.preventDefault();
  
  const imageFile = document.getElementById('imageInput').files[0];
  const token = 'YOUR_AUTH_TOKEN';
  
  try {
    const imageUrl = await uploadImage(imageFile, token);
    
    // Now you can use this URL in your service creation/update form
    document.getElementById('heroImageUrlInput').value = imageUrl;
    
    alert('Image uploaded successfully!');
  } catch (error) {
    alert('Failed to upload image: ' + error.message);
  }
});
```
