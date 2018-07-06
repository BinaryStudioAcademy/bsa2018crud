<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ECurrency extends Model
{
    protected $table = 'ecurrency';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'short_name', 'actual_course', 'actual_course_time', 'active'
    ];
}
