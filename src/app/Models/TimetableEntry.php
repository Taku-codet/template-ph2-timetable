<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimetableEntry extends Model
{
    // create() でまとめて代入してよいカラム
    protected $fillable = ['day', 'period', 'title', 'room'];
}
