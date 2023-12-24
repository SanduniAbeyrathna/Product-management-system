<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use domain\Facades\BannerFacade;
use infrastructure\Images;

class BannerController extends ParentController
{
    public function index()
    {
        $response ['banners'] = BannerFacade::all();
        return view('pages.banner.index')->with($response);
    }

    public function store(Request $request)
    {
        BannerFacade::store($request->all());
        return redirect()->back();

    }

    public function delete($banner_id)
    {

        BannerFacade::delete($banner_id);
        return redirect()->back();
    }

    public function status($banner_id)
    {
        BannerFacade::status($banner_id);
        return redirect()->back();
    }
}