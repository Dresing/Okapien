<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * The class students and teachers attend.
 * @package App
 */
class Collection extends Model{
    protected $fillable = [
        'name'
    ];
}
