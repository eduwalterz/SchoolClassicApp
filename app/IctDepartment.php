<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IctDepartment extends Model
{
    //
    protected $table ='ictdepartment';
    protected $fillable=[
        'main_heading',
        'image',
        'sub_heading',
        'paragraph',
        'persona',
        'persona_title'
    ];
}
