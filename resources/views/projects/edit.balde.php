<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('project Edit') }}
        </h2>
    </x-slot>
    <div class="container mx-auto">
 

  <form action="{{ route('projects.update', $project->id) }}" method="POST" class="max-w-md mx-auto">
    @csrf
    @method('PUT')

    <div class="mb-6">
      <label for="dep_id" class="block text-gray-700 font-semibold mb-2">Departments:</label>
      <select name="dep_id" id="dep_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 bg-blue-100">
        @foreach($departments as $department)
          <option value="{{ $department->id }}" {{ $department->id == $project->department->id ? 'selected' : '' }}>
            {{ $department->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-6">
      <label for="name" class="block text-gray-700 font-semibold mb-2">Name:</label>
      <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 bg-blue-100" value="{{ $project->name }}" required>
    </div>

    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded w-full">Update Project</button>
  </form>
</div>

</x-app-layout>
