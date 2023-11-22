<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800 max-w-xl">

        @if ($errors->any())
          <div class="bg-red-500 text-white p-4 rounded mb-4">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form method="POST" action="{{ route('tasks.update', $task->id) }}" enctype="multipart/form-data" class="pt-5">
            @csrf
          @method('PUT')
          {{-- <div class="mb-4">
            <label for="project_id" class="block font-bold">Project ID:</label>
            <input type="number" name="project_id" id="project_id" class="w-full bg-gray-100 border border-gray-300 rounded px-4 py-2" value="{{ $task->project_id }}">
          </div> --}}
          <div class="mb-4">
            <label for="name" class="block font-bold">Name:</label>
            <input type="text" name="name" id="name" class="w-full bg-gray-100 border border-gray-300 rounded px-4 py-2" value="{{ $task->name }}">
          </div>
          <div class="mb-4">
            <label for="description" class="block font-bold">Description:</label>
            <textarea name="description" id="description" class="w-full bg-gray-100 border border-gray-300 rounded px-4 py-2">{{ $task->description }}</textarea>
          </div>
          <div class="mb-4">
            <label for="status" class="block font-bold">Status:</label>
            <input type="text" name="status" id="status" class="w-full bg-gray-100 border border-gray-300 rounded px-4 py-2" value="{{$task->status}}">
          </div>
          <div class="mb-4">
            <label for="deadline" class="block font-bold">Deadline:</label>
            <input type="text" name="deadline" id="deadline" class="w-full bg-gray-100 border border-gray-300 rounded px-4 py-2" value="{{ $task->deadline }}">
          </div>
          <div class="mb-4">
            <label for="priority" class="block font-bold">Priority:</label>
            <input type="text" name="priority" id="priority" class="w-full bg-gray-100 border border-gray-300 rounded px-4 py-2" value="{{ $task->priority }}">
          </div>
          <div class="flex">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mr-3">Update</button>
            <a href="{{ route('tasks.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Cancel</a>
          </div>
        </form>
      </div>

</x-app-layout>
