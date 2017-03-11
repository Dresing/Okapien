<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherGroupRelation extends Model
{
    protected $table = 'teacher_group_teacher';
    protected $fillable = [
        'teacher_group_id',
        'teacher_id',
    ];
}
