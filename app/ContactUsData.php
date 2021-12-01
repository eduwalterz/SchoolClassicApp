<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUsData extends Model
{
    //
    protected $table = 'contactusdata';
    protected $fillable=[
        'name',
        'email',
        'subject',
        'message'
    ];
}
