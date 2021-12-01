<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryMissionVission extends Model
{
    //
    protected $table ='historymissionvission';
    protected $fillable =[
        'fontawesome',
        'heading',
        'paragraph'
    ];
}
