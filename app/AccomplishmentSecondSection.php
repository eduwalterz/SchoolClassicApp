<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccomplishmentSecondSection extends Model
{
    //
    protected $table ='accomplishmentsecondsection';
    protected $fillable=[
        'heading',
        'paragraph',
        'image',
        'fontawesome',
        'dates'
    ];
}
