<?php

namespace KSD_FMS;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    //
    public function index() {
        $assets = Asset::all();
        return view('asset.index', ['assets' => $assets]);
    }
}
