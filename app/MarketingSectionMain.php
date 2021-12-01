<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarketingSectionMain extends Model
{
    //
    protected $table="marketingsectionmains_tables";
    protected $fillable=[
        'main_heading',
        'main_paragraph'
    ];
}
