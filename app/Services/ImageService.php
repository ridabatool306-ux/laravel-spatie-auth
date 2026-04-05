<?php

namespace App\Services;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageService
{
    // Upload Image
    public function upload($image, $folder = 'users')
    {
        $name = Str::uuid() . '.' . $image->getClientOriginalExtension();
        return $image->storeAs($folder, $name, 'public');
    }

    // Update Image
    public function update($newImage, $oldImage = null, $folder = 'users')
     {
        if ($oldImage) {
            Storage::disk('public')->delete($oldImage);
        }

        return $this->upload($newImage, $folder);
    }

    // Delete Image
    public function delete($image)
    {
        if ($image) {
            Storage::disk('public')->delete($image);
        }
    }
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
}
