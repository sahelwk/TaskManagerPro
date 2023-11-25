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
            <div class="overflow-x-auto">
            <table class="table table-fixed w-full  border border-gray-300 table-auto">
                <thead>
                    <tr class="text-center bg-gray-500 text-white space-y-4">
                        <th class="w-1/12 py-2 px-3">#</th>
                        <th class="w-2/12 py-2 px-3">Name</th>
                        <th class="w-3/12 py-2 px-3">Description</th>
                        <th class="w-2/12 py-2 px-3">Departments of organization</th>
                        <th class="w-1/12 py-2 px-3">Created at</th>
                        <th class="w-1/12 py-2 px-3">Updated at</th>
                        <th class="w-1/12 py-2 px-3">Show</th>
                        <th class="w-1/12 py-2 px-3">Edit</th>
                        <th class="w-1/12 py-2 px-3">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($organizations as $organization)
                        <tr class="space-y-4">
                            <td class="py-2 px-3">{{ $organization->id }}</td>
                            <td class="py-2 px-3">{{ $organization->name }}</td>
                            <td class="py-2 px-3">{{ $organization->description }}</td>
                            <td class="py-2 px-3">
                    @foreach ($organization->departments as $department)
                        <span class="py-2 px-2 rounded badge bg-green-500 text-white text-sm">{{ $department->name }}</span>
                    @endforeach

                            </td>
                            <td class="py-2 px-3">{{ $organization->created_at->diffForHumans() }}</td>
                            <td class="py-2 px-3">{{ $organization->updated_at->diffForHumans() }}</td>
                            <td class="py-2 px-3">
                                <a href="{{ route('organizations.show', $organization->id) }}" class="py-4 px-6btn bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Show</a>
                            </td>
                            <td class="py-2 px-3">
                                <a href="{{ route('organizations.edit', $organization->id) }}" class="py-4 px-6btn bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded mb-2">Edit</a>
                            </td>
                            <td class="py-2 px-3">
                                <a href="{{ route('organizations.delete', $organization->id) }}" class="py-4 px-6btn bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded mb-2">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>

        <div class="py-4 px-6 mt-4">
            {{ $organizations->links() }}
        </div>
    </div>
</x-app-layout>
