<?php

namespace KSD_FMS;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    //
    public function location()
    {
        return $this->belongsTo('Location');
    }
    public function asset_type()
    {
        return $this->belongsTo('AssetType');
    }
    public function index() {
        $assets = Asset::all();
        return view('asset.index', ['assets' => $assets]);
    }
}
class Location extends Model
{
    public function assets()
    {
        return $this->hasMany('Asset');
    }
}

class AssetType extends Model
{
    public function assets()
    {
        return $this->hasMany('Asset');
    }
}
