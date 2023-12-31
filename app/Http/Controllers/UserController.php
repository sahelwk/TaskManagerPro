<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Notification as ModelsNotification;
use App\Models\Organization;
use App\Models\Permission;
use App\Models\Project;
use App\Models\Task;
use App\Models\Photo;
use App\Models\User;
use App\Notifications\NewUserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rules\Password;
use Illuminate\Pagination\Paginator;
use Spatie\Permission\Models\Permission as ModelsPermission;

class UserController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'store', 'show']]);
    //     $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:user-edit', ['only' => ['edit', 'update', 'updatePassword']]);
    //     $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    // }
    /**
     * Display a listing of the resource.
     */



     public function index(Request $request)
     {
         $tasks = Task::all();
         $users = User::with('roles')->paginate(5); // Paginate the users
         $projects = Project::all();
         $organizations = Organization::all();
         $roles = Role::all();

         $search = $request->input('search');

         $s_users = User::when($search, function ($query, $search) {
             return $query->where('name', 'like', "%$search%")
                 ->orWhere('email', 'like', "%$search%")
                 ->orWhere('address', 'like', "%$search%")
                 ->orWhere('phone', 'like', "%$search%")
                 ->orWhere('username', 'like', "%$search%")
                 ->orWhere('status', 'like', "%$search%");
         })->paginate(5);


         $users->withPath('/users');

         // Pass the paginated users to the view
         return view("users.index", compact('users', 'projects', 'organizations', 'tasks', 'roles', 's_users'));
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // $users = $adminRole->users;

        // foreach ($users as $user) {
            // Perform your desired operations with each user
            // For example, you can access user properties like $user->name, $user->email, etc.

        // }     $users_id= $user->id;
        $roles = Role::all();

        $projects = Project::all();
        $organizations = Organization::all();
        $departments = Department::all();
        $tasks = Task::all();
        return view('users.create',['projects'=>$projects ,'organizations'=>$organizations,'roles'=>$roles,'tasks'=>$tasks,'departments'=>$departments]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'organization_id' => 'nullable',
        'department_id' => 'nullable',
        'project_id' => 'nullable',
        'task_id' =>'nullable',
        "name" => "required",
        "roles" => "required",
        "email" => 'required|email|unique:users,email',
        "password" => "required|confirmed",
    ]);

    $input = $request->all();
    $input['password'] = bcrypt($request->password);
    $user = User::create($input);




    // if ($file = $request->file('photo_id')) {
    //     $name = time() . $file->getClientOriginalName();
    //     $file->move('images', $name);
    //     $photo = Photo::create(['file' => $name]);
    //     $input['photo_id'] = $photo->id;
    // }

    if ($user) {
        $user->assignRole($request->input('roles'));

        // $adminRole = Role::where('name', 'Admin')->firstOrFail();
        // foreach($adminRole->users as $admin_user){

        //     Notification::send($admin_user, new NewUserNotification($user));


        return redirect()->route('users.index')->with("success", "User created successfully.");
    } else {
        return redirect()->route('users.index')->with("error", 'Something went wrong.');
    }
}

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

        $task_role = User::with('roles')->get();
        $task_user = User::with('tasks')->get();
        return view('users.show', compact('user','task_user','task_role'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit( User $user)
    {
        // $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        $roles = Role::all();
        $users = User::all();
        $tasks = Task::all();
        $departments = Department::get();
        $projects = Project::get();
        $permissions = ModelsPermission::all();
        // return $user->tasks;
        $organizations = Organization::get();
        return view("users.edit",compact('projects','user', 'roles' , 'userRole' , 'permissions' ,'users','tasks','organizations','departments'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,User $user)
    {
        $request->validate([
            'organization_id' => 'required',
            'department_id' => 'required',
            'project_id' => 'required',
            'task_id'   => 'required',
            'name' => 'required|string',
            'roles' => 'required',
            'email' => 'required|email',
            "password" => "confirmed",

       ]);


       $input = $request->input();
        if (!empty($request->input('password'))) {
            $input['password'] = bcrypt($request->input('password'));

        } else {
            unset($input['password']);
        }


        if ($user->update($input)) {

            $user->tasks()->sync($request->tasks_id);

        if (auth()->user()->hasRole(['Admin','Manager'])){
                DB::table("model_has_roles")->where("model_id", $user->id)->delete();
                $user->assignRole($request->input('roles'));

            return redirect()->route('users.index')->with('success', "messages.user_update");
        } else {
            return redirect()->route('users.index')->with('error', 'Something went wrong');
        }
    }
}
    /**
     * Remove the specified resource from storage.
     */
    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', "messages.user_delete");
    }


    public function getIsAdminAttribute()
    {
        return $this->roles()->where('id', 1)->exists();
    }

}
