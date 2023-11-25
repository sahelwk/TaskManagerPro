<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Create User') }}
        </h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
        <div class="bg-gray-200 text-gray-200 rounded p-2 mb-4">
          {{ session('success') }}
        </div>
      @endif
    </x-slot>
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800 ">

        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="form_number" class="text-gray-800">Name</label>
                    <input type="text"  class="block w-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-gray-200 border berder-gray-300 rounded-md focus-outline-none focus-bg-white focus-border-gray-500" id="form_number" name="name" required
                        value="{{ old('name') }}">
                </div>

                <div class="mb-4">
                    <label for="full_name" class="text-gray-800">Email</label>
                    <input type="text" class="block w-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-gray-200 border berder-gray-300 rounded-md focus-outline-none focus-bg-white focus-border-gray-500" id="full_name" name="email" required
                        value="{{ old('email') }}">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="org_id" class="text-gray-800">Organization:</label>
                    <select name="org_id"  class="block w-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-gray-200 border berder-gray-300 rounded-md focus-outline-none focus-bg-white focus-border-gray-500">
                        @foreach ($organizations as $organization)
                            <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="project_id" class="text-gray-800">Project:</label>
                    <select name="project_id"  class="block w-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-gray-200 border berder-gray-300 rounded-md focus-outline-none focus-bg-white focus-border-gray-500">
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="task_id" class="text-gray-800">Task:</label>
                    <select name="task_id"  disabled class="block w-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-gray-200 border berder-gray-300 rounded-md focus-outline-none focus-bg-white focus-border-gray-500">
                        @foreach ($tasks as $task)
                            <option value="{{ $task->id }}">{{ $task->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="dep_id" class="text-gray-800">Department:</label>
                    <select name="deppartment_id"  class="block w-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-gray-200 border berder-gray-300 rounded-md focus-outline-none focus-bg-white focus-border-gray-500">
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="Password" class="text-gray-800 form-control rounded">Password</label>
                    <input type="password" class="block w-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-gray-200 border berder-gray-300 rounded-md focus-outline-none focus-bg-white focus-border-gray-500 rounded" id="Password" name="password">
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="text-gray-800">Confirm Password</label>
                    <input type="password" class="block w-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-gray-200 border berder-gray-300 rounded-md focus-outline-none focus-bg-white focus-border-gray-500" id="password_confirmation" name="password_confirmation">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="role" class="text-gray-800">Roles</label>
                    <select id="role" name="roles[]" multiple="multiple"  class="block w-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-gray-200 border berder-gray-300 rounded-md focus-outline-none focus-bg-white focus-border-gray-500">
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="status" class="text-gray-800">Status:</label>
                    <select name="status"  class="block w-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-gray-200 border berder-gray-300 rounded-md focus-outline-none focus-bg-white focus-border-gray-500">
                        <option value="1">Active</option>
                        <option value="0">Not Active</option>
                    </select>
                </div>
            </div>

            <div class="mb-4">
                <label for="photo" class="text-gray-800">Photo</label>
                <input type="file"class="block w-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-gray-200 border berder-gray-300 rounded-md focus-outline-none focus-bg-white focus-border-gray-500" id="photo" name="photo">
            </div>

            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-4">Create</button>
        </form>
    </div>
</x-app-layout>
