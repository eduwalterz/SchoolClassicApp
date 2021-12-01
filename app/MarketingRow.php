<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarketingRow extends Model
{
    //
    protected $table="marketingrows";
    protected $fillable=[
        'fontawesome',
        'heading',
        'paragraph'
    ];
}
