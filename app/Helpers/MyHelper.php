<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * Created by PhpStorm.
 * User: Laptop
 * Date: 2/3/2017
 * Time: 8:42 AM
 */
class MyHelper
{
   public static function uploadFile(UploadedFile $file, $options = array())
   {
            $fileName = uniqid() . '.' . $file->extension();
            $path = '';
            for ($i = 0; $i < 5; $i ++) {
                $randomString = md5(str_random(10));
                $randomFolder = substr($randomString, 0, 2);
                $path .= '/' . $randomFolder;
            }

            $path .= '/' . $fileName;
            //storage uploaded file
            $stored = Storage::disk('upload')->put('images' . $path,  \File::get($file));

            if ($stored == 1) {
                return $path;
            }
            abort(502);
   }
}
