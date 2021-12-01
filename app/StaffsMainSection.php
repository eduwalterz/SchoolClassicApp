<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffsMainSection extends Model
{
    //
    protected $table ='staffsmainsection';
    protected $fillable =[
        'image',
        'staff_name',
        'paragraph'
    ];
}
