<?php
use Illuminate\Support\Facades\config;


function getFolder()
{

    return app()->getLocale() == 'ar' ? 'css-rtl' : 'css';
}

 
function uploadImage($folder, $image)
{
    $image->store('/', $folder);
    $filename = $image->hashName();
    $path = 'images/' . $folder . '/' . $filename;
    return $path;
}
