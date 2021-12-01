<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class carausel extends Model
{
    //

    protected $table='carausels';
    
    protected $fillable=[
        'image_name','image'
    ];

    public static function getCarausels(){
        $records = DB::table('carausels')->select('id','image_name','image')->get()->toArray();
        return $records;
    }
}
