<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Task Details') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-4 py-8">

        <div class="flex flex-wrap">
            <div class="w-full md:w-1/2 lg:w-1/3">
                <div class="bg-white shadow-lg rounded-lg p-4 mt-4">
                    <h5 class="text-xl font-bold mb-2">ID: {{ $task->id }}</h5>
                    <p class="text-gray-800">Name: {{ $task->name }}</p>
                    <p class="text-gray-800">Description: {{ $task->description }}</p>
                    <p class="text-gray-800">Status: {{ $task->status }}</p>
                    <p class="text-gray-800">Deadline: {{ $task->deadline }}</p>
                    <p class="text-gray-800">Priority: {{ $task->priority }}</p>
                </div>
            </div>

            <div class="w-full md:w-1/2 lg:w-1/3 ml-5 flex-right">
                <div class="bg-white shadow-lg rounded-lg p-4 mt-4">
                    <h1 class="text-2xl font-bold mb-4">User Lists</h1>
                    <form method="post" action="{{ route('taskAssign.store') }}" class="space-y-2">
                        @csrf
                        @foreach ($users as $user)
                            <div class="flex items-center">
                                <input id="user-{{ $user->id }}" type="radio" name="user_id" value="{{ $user->id }}"
                                    class="form-radio-input">
                                <label for="user-{{ $user->id }}" class="ml-2">{{ $user->name }}</label>
                            </div>
                        @endforeach

                        <input type="hidden" name="task_id" value="{{ $task->id }}">

                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-4">Assign
                          task to one of these users</button>
                    </form>
                </div>
            </div>
        </div>

        <a href="{{ route('tasks.index') }}"
            class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mt-4">Back to Tasks</a>
    </div>
</x-app-layout>
