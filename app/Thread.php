<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thread extends Model
{
     use SoftDeletes; // <-- Use This Instead Of SoftDeletingTrait

    protected $table = 'threads';
}
