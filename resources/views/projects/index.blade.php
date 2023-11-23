<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Project index') }}
        </h2>
    </x-slot>
<div class="container mx-auto">
    <form action="{{ route('projects.index') }}" method="GET" class="flex justify-center mb-4">
      <div class="w-64">
        <div class="flex">
          <input type="text" name="search" class="w-full px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:border-blue-500" placeholder="Search">
          <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-r-lg">Search</button>
        </div>
      </div>
    </form>
 
    @if (session('success'))
      <div class="bg-green-200 text-green-800 rounded p-2 mb-4">
        {{ session('success') }}
      </div>
    @endif

    <div class="container pb-5">
      <div class="overflow-x-auto">
      <table class="min-w-full divide-y divide-gray-200">
        <thead>
          <tr>
            <th class="px-4 py-2  bg-green-100">ID</th>
            <th class="px-4 py-2  bg-green-100">Department Name</th>
            <th class="px-4 py-2  bg-green-100">Name</th>
            <th class="px-4 py-2  bg-green-100">Description</th>
            <th class="px-4 py-2  bg-green-100">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($projects as $project)
            <tr>
              <td class="px-4 py-2">{{ $project->id }}</td>
              <td class="px-4 py-2">{{ $project->department->name ?? '' }}</td>
              <td class="px-4 py-2">{{ $project->name }}</td>
              <td class="px-4 py-2">{{$project->description}} </td>
              <td class="px-4 py-2">
                <a href="{{ route('projects.show', $project->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded">Show</a>
                <a href="{{ route('projects.edit', $project->id) }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-2 rounded">Edit</a>
                <form action="{{ route('projects.delete', $project->id) }}" method="POST" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded" onclick="return confirm('Are you sure you want to delete this project?')">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    </div>
  </div>
</x-app-layout>
