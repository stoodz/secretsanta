<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{

    protected $fillable = [
        'email',
        'guest_name'
    ];

    protected $table = 'giftlist_guests';


    public function giftlist()
    {
        return $this->belongsTo('App\Giftlist');
    }


}
