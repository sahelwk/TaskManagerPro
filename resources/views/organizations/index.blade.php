<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Orgnization index') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <div class="flex justify-center mb-4">
            <form action="{{ route('organizations.index') }}" method="GET" class="flex">
                <div class="flex">
                    <div class="flex">
                        <input type="text" name="search" class="form-input rounded" placeholder = "search">
                    </div>
                    <button type="submit" class="btn bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Search</button>
                </div>
            </form>
        </div>

        <div class="text-center">

            @if ($errors->any())
                <div class="text-red-500">
                    {{ implode('', $errors->all('<div>:message</div>')) }}
                </div>
            @endif
        </div>

        {{-- <a href="{{ route('organizations.create') }}" class="btn bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-2">Create New Organization</a> --}}

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="overflow-x-auto mt-5">
            <table class="table table-fixed w-full  border border-gray-200">
                <thead>
                    <tr class="text-center bg-gray-500 text-white">
                        <th class="w-1/12">#</th>
                        <th class="w-2/12">Name</th>
                        <th class="w-3/12">Description</th>
                        <th class="w-2/12">Departments of organization</th>
                        <th class="w-1/12">Created at</th>
                        <th class="w-1/12">Updated at</th>
                        <th class="w-1/12">Show</th>
                        <th class="w-1/12">Edit</th>
                        <th class="w-1/12">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($organizations as $organization)
                        <tr>
                            <td>{{ $organization->id }}</td>
                            <td>{{ $organization->name }}</td>
                            <td>{{ $organization->description }}</td>
                            <td>
                                @foreach ($organization_department->departments as $department)
                                    <span class="badge bg-green-500 text-white text-sm">{{ $department->name }}</span>
                                @endforeach
                             
                            </td> 
                            <td>{{ $organization->created_at->diffForHumans() }}</td>
                            <td>{{ $organization->updated_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('organizations.show', $organization->id) }}" class="btn bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Show</a>
                            </td>
                            <td>
                                <a href="{{ route('organizations.edit', $organization->id) }}" class="btn bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded mb-2">Edit</a>
                            </td>
                            <td>
                                <a href="{{ route('organizations.delete', $organization->id) }}" class="btn bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded mb-2">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $organizations->links() }}
        </div>
    </div>
</x-app-layout>
