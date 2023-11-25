<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Role;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use App\Notifications\NewUserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class TaskController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:task-list|task-create|task-edit|task-delete', ['only' => ['index', 'store', 'show']]);
    //     $this->middleware('permission:task-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:task-edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:task-delete', ['only' => ['destroy']]);
    // }

    public function index(Request $request)
    {
        $todoTasks = Task::where('status',1)->get();
        $inProgressTasks = Task::where('status',2)->get();
        $doneTasks = Task::where('status', 3)->get();
        $search = $request->input('search');

        $tasks = Task::when($search, function ($query, $search) {
        return $query->where('name', 'like', "%$search%");

       })->paginate(10);
       return view('tasks.index', compact('todoTasks','inProgressTasks','doneTasks','tasks'));
    }




    public function create()
    {
        // Render the create view
        $projects = Project::all();
        return view('tasks.create',compact('projects'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'project_id' => 'nullable|integer',
            'name' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string',
            'deadline' => 'required|string',
            'priority' => 'required|string',
        ]);

        // Create a new task with the validated data
       $status = $request->input('status');

        if($status == 0)
         {
            return redirect()->route('tasks.create')->with('success', 'select the status please.');
         }


        Task::create($validatedData);



        // Redirect to the tasks index page
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function edit($id)


    {

        $task = Task::find($id);

        // Render the edit view with the specified task
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        // Validate the request data
        $validatedData = $request->validate([
            // 'project_id' => 'nullable|integer',
            'name' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string',
            'deadline' => 'required|string',
            'priority' => 'required|string',
        ]);

        // Update the task with the validated data
        $task->update($validatedData);

        // Redirect to the tasks index page
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function show(Task $task)

    {
        // Render the show view with the specified task
        $users=User::all();
        $projects=Project::all();
        return view('tasks.show', compact('task','projects','users'));
    }

    public function delete($id)
    {
        // Delete the task from the database
        // $task->delete();
        $task = Task::find($id);
        $task->delete();
        // Redirect to the tasks index page
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
