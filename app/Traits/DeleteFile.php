<?php


namespace App\Traits;


use Illuminate\Support\Facades\Storage;

trait DeleteFile
{
    public function deleteFile($file){
        Storage::delete($file);
    }

}
