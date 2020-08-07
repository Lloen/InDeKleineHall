<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Covid19Registration extends Model
{
    protected $table = 'covid19_registrations';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'email',
        'n',
        'number_of_people'
    ];
}
