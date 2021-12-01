<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffsRowSection extends Model
{
    //
    protected $table ='staffsrowsection';
    protected $fillable =[
        'image',
        'staff_name',
        'paragraph'
    ];
}
