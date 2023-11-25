<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task_project extends Model
{
    use HasFactory , softDeletes;
   protected $fillable = ['task_id','project_id'];
}
