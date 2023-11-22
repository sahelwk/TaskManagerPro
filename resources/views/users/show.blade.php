<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('User Create') }}
        </h2>
    </x-slot>
    <div class="container">
        <h1 class="badge bg-light text-dark border text-2xl font-light mb-4">User Details</h1>
        <div class="flex flex-wrap -mx-4">
          <div class="w-full md:w-1/2 px-4">
            <div class="card mt-4">
              <div class="card-body">
                <h5 class="card-title">ID: <strong class="badge bg-info text-light text-sm font-light">{{ $user->id }}</strong></h5>
                <p class="card-text"><strong>Organization Name:</strong> <span class="badge bg-info text-light text-sm font-light">{{ $user->organization->name ?? '' }}</span></p>
                <p class="card-text"><strong>Department Name:</strong> <span class="badge bg-info text-light text-sm font-light">{{ $user->department->name ?? '' }}</span></p>
                <p class="card-text"><strong>Project Name:</strong> <span class="badge bg-info text-light text-sm font-light">{{ $user->project->name ?? '' }}</span></p>
                <p class="card-text"><strong>User Name:</strong> <span class="badge bg-info text-light text-sm font-light">{{ $user->name ?? '' }}</span></p>
                <p class="card-text"><strong>Role:</strong>
                  @foreach ($user->roles as $role)
                  <span class="badge bg-info text-light text-sm font-light">{{ $role->name }}</span>
                  @endforeach
                </p>
                <p class="card-text"><strong>Email:</strong> <strong class="badge bg-info text-light">{{ $user->email }}</strong></p>
              </div>
            </div>
            <a href="{{ route('users.index') }}" class="btn btn-secondary m-4">Back to User</a>
          </div>

          <div class="w-full md:w-1/2 px-4">
            <h1 class="btn btn-secondary mt-4">Assigned Tasks To User: {{ $user->name }}</h1>
            <div class="card mt-4">
              <div class="card-body">
                @foreach ($user->tasks as $task)
                <span class="badge bg-success text-light text-sm font-light">{{ $task->name }}</span>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>

</x-app-layout>
