<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected  $primaryKey = 'id';
    protected  $table ='tasks';
    protected  $fillable =['task', 'description','done'];
}
