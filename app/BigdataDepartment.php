<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BigdataDepartment extends Model
{
    //
    protected $table='bigdatadepartment';
    protected $fillable=[
        'main_heading',
        'image',
        'sub_heading',
        'paragraph',
        'owner',
        'owner_title'
    ];
}
