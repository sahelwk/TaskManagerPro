
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Orgnization Show') }}
        </h2>
    </x-slot>
<div class="container pb-5">
    <div class="text-center">
        <h1 class="text-3xl font-bold mb-5">Organization Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <strong>Organization ID:</strong>
                    <span class="badge bg-indigo-500 text-white text-sm ml-2">{{ $organizations->id }}</span>
                </h5>
                <p class="card-text">
                    <strong>Organization Name:</strong>
                    <span class="badge bg-indigo-500 text-white text-sm ml-2">{{ $organizations->name }}</span>
                </p>
                <p class="card-text">
                    <strong>Organization Description:</strong>
                    <span class="badge bg-indigo-500 text-white text-sm ml-2">{{ $organizations->description }}</span>
                </p>
            </div>
        </div>
    </div>

    <div class="flex justify-center mt-8">
        <a href="{{ route('organizations.index') }}" class="btn bg-blue-500 hover:btn-blue-700 text-white font-bold rounded py-2 px-2">Back to Organizations</a>
    </div>

    <div class="flex justify-center mt-12">
        <form method="post" action="{{ route('department_organization.store') }}">
            @csrf
            @foreach ($departments as $department)
                <div class="flex items-center mb-2">
                    <input
                        id="user-{{ $department->id }}"
                        type="radio"
                        name="department_id"
                        value="{{ $department->id }}"
                        class="form-radio-input"
                    >
                    <label for="user-{{ $department->id }}" class="form-radio-label ml-2">
                        {{ $department->name }}
                    </label>
                    <input type="hidden" name="organization_id" value="{{ $organization->id }}">
                </div>
            @endforeach

            <div class="flex justify-center">
                <button type="submit" class="btn bg-green-500 hover:bg-green-700 font-bold text-white rounded py-2 px-2">Assign Departments to This Organization</button>
            </div>
        </form>
    </div>
</div>

</x-app-layout>
