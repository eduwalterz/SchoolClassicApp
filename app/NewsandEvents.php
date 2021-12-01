<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsandEvents extends Model
{
    //
    protected  $table='newsandevents';
    protected  $fillable=[
        'main_heading',
        'image',
        'dates',
        'sub_heading',
        'paragraph'
    ];
}
