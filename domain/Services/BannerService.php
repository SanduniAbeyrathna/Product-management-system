<?php

namespace domain\Services;

use App\Models\Banner;
// use domain\Services\BannerService;
use infrastructure\Facades\ImagesFacade;

class BannerService
{
    protected $banner;

    public function __construct()
    {
        $this->banner = new Banner();
    }

    //get all banners
    public function all()
    {
        return $this->banner->all();

    }

    public function allActive()
    {
        return $this->banner->allActive();
    }

    public function create()
    {
        //
    }

    public function store($data)
    {
        // dd($data);
        if(isset($data['images'])){
            $image = ImagesFacade::store($data['images'], [1,2,3,4,5]);
            $data['image_id'] = $image['created_images']->id;
        }
        $this->banner->create($data);

    }

    public function show(string $banner_id)
    {
        //
    }

    public function edit(string $banner_id)
    {

    }

    // public function update(Request $request, string $banner_id)
    // {
    //     //
    // }

    public function delete($banner_id)
    {
        // Find the banner by id
        $banner = $this->banner->find($banner_id);
        $banner->delete();
    }

    public function status($banner_id)
    {
        $banner = $this->banner->find($banner_id);
        if ($banner->status == 0) {
            $banner->status = 1;
            $banner->update();
        } else {
            $banner->status = 0;
            $banner->update();
        }
    }
}