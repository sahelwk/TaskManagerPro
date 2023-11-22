<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('User Create') }}
        </h2>
    </x-slot>
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Edit User</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label for="org_id" class="text-gray-800">Organization</label>
          <select class="form-select" name="org_id">
            @foreach ($organizations as $org)
            <option value="{{ $org->id }}" {{ $org->id == $user->organization->id ? 'selected' : '' }}>{{ $org->name }}</option>
            @endforeach
          </select>
        </div>

        <div>
          <label for="dep_id" class="text-gray-800">Department</label>
          <select class="form-select" name="dep_id">
            @foreach ($departments as $dep)
            <option value="{{ $dep->id }}" {{ $dep->id == $user->department->id ? 'selected' : '' }}>{{ $dep->name }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label for="project_id" class="text-gray-800">Project</label>
          <select class="form-select" name="project_id">
            @foreach ($projects as $project)
            <option value="{{ $project->id }}" {{ $project->id == $user->project->id ? 'selected' : '' }}>{{ $project->name }}</option>
            @endforeach
          </select>
        </div>

        <div>
          <label for="task_id" class="text-gray-800">Task</label>
          <select class="form-select" multiple name="tasks_id[]">
            @foreach ($tasks as $key => $task)
            <option value="{{ $task->id }}"
              @foreach ($user->tasks as $user_task)
              {{ $task->id == $user_task->pivot->task_id ? 'selected' : '' }}
              @endforeach
              >{{ $task->name }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="mb-4">
        <label for="name" class="text-gray-800">Name</label>
        <input type="text" class="form-input" id="name" name="name" value="{{ $user->name }}">
      </div>

      <div class="mb-4">
        <label for="email" class="text-gray-800">Email</label>
        <input type="email" class="form-input" id="email" name="email" value="{{ $user->email }}">
      </div>

      <div class="mb-4">
        <label for="roles" class="text-gray-800">Roles</label><br>
        @foreach ($roles as $role)
        <div class="flex items-center">
          <input type="checkbox" class="form-checkbox" name="roles[]" value="{{ $role->name }}"{{ $user->hasRole($role) ? ' checked' : '' }}>
          <label class="ml-2">{{ $role->name }}</label>
        </div>
        @endforeach
      </div>

      <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Update</button>
    </form>

</x-app-layout>
