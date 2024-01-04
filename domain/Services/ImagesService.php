<?php

namespace domain\Services;

use App\Models\Image;
use BaconQrCode\Renderer\Path\Move;
use Illuminate\Support\Facades\Storage;

class ImagesService{

    protected $images;

    public function __construct()
    {
        $this->images = new Image();
    }

    public function storeTodoPublic($file)
    {
        $name = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $name);
        // dd($name);
        return $this->images->create([
            'name' => $name,
        ]);
    }

    public function storeTodoStorage($file)
    {
        $name = time() . '_' . $file->getClientOriginalName();
        //1) $path = $file->storeAs('upolads', $name);
        // dd($path);

        //2) $file->storeAs('public/upolads', $name);
        // 3)
        Storage::putFileAs('public/upolads', $file, $name);
        // $file->store('public/upolads', $file, $name);

        //display name of the image
        // $name = str_replace('public/upolads/', '', $path);
        // dd($path);

        return $this->images->create([
            'name' => $name,
        ]);
    }

}