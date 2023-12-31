<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Project;
use App\Models\Organization;
use App\Models\Department;
use App\Models\Task;
use App\Models\Photo;
use App\Models\Notification;
use App\Models\Role;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    protected $fillable = [ 'name','email','password','role','permission',
    'organization_id','department_id','task_id','project_id','address',
    'photo_id','phone','status','username','last_seen',
    ];

    // protected $guarded = [];

   public function project(){

       return $this->belongsTo(Project::class , 'project_id');

   }
   public function organization(){

    return $this->belongsTo(Organization::class , 'organization_id');

}
public function department(){

    return $this->belongsTo(Department::class , 'department_id');

}

public function tasks()
{
    return $this->belongsToMany(Task::class,'task_user');
}

public function photo(){

    return $this->belongsTo(Photo::class , 'photo');
}


public function getIsAdminAttribute()
{
    return $this->roles()->where('id', 1)->exists();
}
//
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
