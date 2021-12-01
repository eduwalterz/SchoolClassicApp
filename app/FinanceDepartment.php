<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinanceDepartment extends Model
{
    //
    protected $table='financedepartment';
    protected $fillable=[
        'main_heading',
        'image',
        'sub_heading',
        'paragraph',
        'author',
        'author_title'
    ];
}
