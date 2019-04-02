<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
     use SoftDeletes; // <-- Use This Instead Of SoftDeletingTrait

    protected $table = 'lessons';
}
