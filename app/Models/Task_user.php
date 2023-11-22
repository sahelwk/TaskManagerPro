<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class Task_user extends Model
{

    use HasFactory , softDeletes;
    protected $table = 'task_user';
    protected $fillable = ['name','user_id','task_id'];
}
