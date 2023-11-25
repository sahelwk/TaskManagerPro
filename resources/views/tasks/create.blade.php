<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Create Task') }}
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

  @if (session('success'))
  <div class="bg-red-500 text-white p-4 rounded mb-4">
    {{ session('success') }}
  </div>
@endif

  <form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <!-- <div class="mb-4">
      <label for="project_id" class="block font-bold">Projects:</label>
      <select name="project_id" class="w-full bg-gray-100 border border-gray-300 rounded px-4 py-2">
        @foreach ($projects as $project)
        <option value="{{ $project->id }}">{{ $project->name }}</option>
        @endforeach
      </select>
    </div> -->
    <div class="mb-4">
      <label for="name" class="block font-bold">Name:</label>
      <input type="text" name="name" id="name" class="block w-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-gray-200 border berder-gray-300 rounded-md focus-outline-none focus-bg-white focus-border-gray-500" value="{{ old('name') }}">
    </div>
    <div class="mb-4">
      <label for="description" class="block font-bold">Description:</label>
      <textarea name="description" id="description" class="block w-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-gray-200 border berder-gray-300 rounded-md focus-outline-none focus-bg-white focus-border-gray-500">{{ old('description') }}</textarea>
    </div>
    <div class="mb-4">
      <label for="status" class="block font-bold">Status:</label>

      <select name="status" id="status" class="block w-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-gray-200 border berder-gray-300 rounded-md focus-outline-none focus-bg-white focus-border-gray-500">
        <option value="0" selected class="">Select the status</option>
        <option value="1">TODO</option>
        <option value="2">In Progress</option>
        <option value="3">Done</option>
      </select>
    </div>
    <div class="mb-4">
      <label for="deadline" class="block font-bold">Deadline:</label>
      <input type="text" name="deadline" id="deadline"  class="block w-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-gray-200 border berder-gray-300 rounded-md focus-outline-none focus-bg-white focus-border-gray-500" value="{{ old('deadline') }}">
    </div>
    <div class="mb-4">
      <label for="priority" class="block font-bold">Priority:</label>
      <select name="priority" id="priority"  class="block w-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-gray-200 border berder-gray-300 rounded-md focus-outline-none focus-bg-white focus-border-gray-500">
        <option value="hiegh">High</option>
        <option value="Medium">Medium</option>
        <option value="Low">Low</option>
      </select>
    </div>
    <div class="flex">
      <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mr-3">Create</button>
      <a href="{{ route('tasks.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Cancel</a>
    </div>
  </form>
</div>

</x-app-layout>
