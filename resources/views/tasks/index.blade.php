<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('tasks index') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <form action="{{ route('tasks.index') }}" method="GET" class="flex justify-center mb-4">
          <div class="w-full max-w-md">
            <div class="flex">
              <input type="text" name="search" class="w-full bg-gray-100 border border-gray-300 rounded-l px-4 py-2 focus:outline-none" placeholder="Search">
              <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-r">Search</button>
            </div>
          </div>
        </form>



        @if (session('success'))
          <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
          </div>
        @endif

        {{-- <a href="{{ route('tasks.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-3">Create Task</a> --}}

        <div class="container mx-auto">
          <div class="flex flex-wrap justify-between">
            <div class="w-full md:w-1/3 lg:w-1/4 mb-8">
              <h1 class="bg-green-500 text-white text-center font-bold py-2 px-4 rounded">TODO</h1>
              @foreach($todoTasks as $todo)
                <div class="bg-white shadow-lg rounded-lg p-4 mb-4">
                  <div class="font-bold mb-2">{{ $todo->name }}</div>
                  <div class="text-gray-800">{{ $todo->description }}</div>
                  <div class="flex justify-center mt-4">
                    <a href="{{ route('tasks.edit', $todo->id) }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                    <a href="{{ route('tasks.delete', $todo->id) }}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded mr-2">Delete</a>
                    <a href="{{ route('tasks.show', $todo->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">More</a>
                  </div>
                </div>
              @endforeach
            </div>

            <div class="w-full md:w-1/3 lg:w-1/4 mb-8">
              <h1 class="bg-yellow-500 text-white text-center font-bold py-2 px-4 rounded">In Progress</h1>
              @foreach($inProgressTasks as $inProgress)
                <div class="bg-white shadow-lg rounded-lg p-4 mb-4">
                  <div class="font-bold mb-2">{{ $inProgress->name }}</div>
                  <div class="text-gray-800">{{ $inProgress->description }}</div>
                  <div class="flex justify-center mt-4">
                    <a href="{{ route('tasks.edit', $inProgress->id) }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                    <a href="{{ route('tasks.delete', $inProgress->id) }}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded mr-2">Delete</a>
                    <a href="{{ route('tasks.show', $inProgress->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded"> More</a>
                  </div>
                </div>
              @endforeach
            </div>

            <div class="w-full md:w-1/3 lg:w-1/4 mb-8">
              <h1 class="bg-blue-500 text-white text-center font-bold py-2 px-4 rounded">Done</h1>
              @foreach($doneTasks as $done)
                <div class="bg-white shadow-lg rounded-lg p-4 mb-4">
                  <div class="font-bold mb-2">{{ $done->name }}</div>
                  <div class="text-gray-800">{{ $done->description }}</div>
                  <div class="flex justify-center mt-4">
                    <a href="{{ route('tasks.edit', $done->id) }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                    <a href="{{ route('tasks.delete', $done->id) }}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded mr-2">Delete</a>
                    <a href="{{ route('tasks.show', $done->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">More</a>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
</x-app-layout>
