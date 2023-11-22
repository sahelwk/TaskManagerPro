<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Organization Create') }}
        </h2>
    </x-slot>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800 max-w-xl">
            <form method="POST" action="{{ route('organizations.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" class="form-input mt-1 block w-full" id="name" name="name" required placeholder="Enter the name">
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <input type="text" class="form-input mt-1 block w-full" id="description" name="description" required placeholder="Description">
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Create</button>
                    <a href="{{ route('organizations.index') }}" class="btn bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">View</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
