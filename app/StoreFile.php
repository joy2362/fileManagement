<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreFile extends Model
{
    protected $fillable = [
      'Name','fileName' , 'userId', 'fileSize','extention'
    ];
}
