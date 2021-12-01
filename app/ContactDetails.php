<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactDetails extends Model
{
    //
    protected $table = 'contactdetails';
    protected $fillable=[
        'fontawesome',
        'contacts',
        'tags'
    ];
}
