<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function upload_file($file, $folder)
    {
        $path = $file->store('uploads/' . $folder, 'public');
        return $path;
    }
}
