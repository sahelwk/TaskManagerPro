<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use HasFactory , SoftDeletes;
     protected $fillable = ['name','organization_id','project_id','department_id','task_id'];


        public function organization()
        {
            return $this->belongsTo(Organization::class);
        }

        public function project()
        {
            return $this->belongsTo(Project::class);
        }

        public function task()
        {
            return $this->belongsTo(Task::class);
        }

        public function department()
        {
            return $this->belongsTo(Department::class);
        }
}
