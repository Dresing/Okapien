<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentGroupRelation extends Model
{
    protected $table = 'student_group_student';
    protected $fillable = [
        'student_group_id',
        'student_id',
    ];
}
