<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccomplishmentFirstSection extends Model
{
    //
    protected $table ='accomplishmentfirstsection';
    protected $fillable=[
        'heading',
        'image',
        'paragraph',
        'fontawesome',
        'dates'
    ];
}
