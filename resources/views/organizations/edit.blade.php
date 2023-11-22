<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Edit Organization') }}
        </h2>
    </x-slot>
    <div class="container">


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('organizations.update', $organization) }}" enctype="multipart/form-data" class="pt-5">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-6 sm:col-span-3">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" class="form-input mt-1 block w-full hover:bg-gray-300 rounded" id="name" name="name" value="{{ $organization->name }}">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <input type="text" class="form-input mt-1 block w-full bg-blue-200, hover:bg-gray-300 rounded" id="description" name="description" value="{{ $organization->description }}">
                </div>
            </div>

            <br>
            <button type="submit" class="btn bg-gray-500 hover:bg-gray-700 rounded text-white font-bold py-2 px-2">Update</button>
            <a href="{{ route('organizations.index') }}" class="btn bg-green-500 hover:bg-green-700 rounded text-white font-bold py-2 px-2">Back to view</a>
        </form>
    </div>
</x-app-layout>
