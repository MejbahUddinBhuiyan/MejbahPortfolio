<?php

namespace App\Support;

class CloudinaryUploader
{
    public static function upload($file, string $folder = 'portfolio/uploads'): string
    {
        $cloudinary = new \Cloudinary\Cloudinary(config('cloudinary.cloud_url'));

        $folder = trim($folder);
        $folder = preg_replace('/\s+/', '', $folder);

        $result = $cloudinary->uploadApi()->upload(
            $file->getRealPath(),
            [
                'folder' => $folder,
                'resource_type' => 'auto',
                'use_filename' => false,
                'unique_filename' => true,
            ]
        );

        return $result['secure_url'];
    }
}