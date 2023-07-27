<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait FileHandler
{



    public function upload_file($file, $path = '', $key = "")
    {
        $imageName = time() . $key . '.' . $file->extension();
        return "attachments" . "/" . $file->store($path, 'attachment');
    }


}
