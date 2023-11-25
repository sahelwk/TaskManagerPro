<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Report') }}
        </h2>
    </x-slot>

    <!-- Filter Form -->
    <form action="{{ route('reports.search') }}" method="GET">
        <!-- Organization Filter -->
        <label for="organization">Organization:</label>
        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="organization" id="organization">
            <option value="">All Organizations</option>
            @foreach($organizations as $org)
                <option value="{{ $org->id }}"  >{{ $org->name }}</option>
            @endforeach
        </select>

        {{-- <!-- Project Filter -->
        <label for="project">Project:</label>
        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="project" id="project">
            <option value="">All Projects</option>
            @foreach($projects as $project)
                <option value="{{ $project->id }}"  >{{ $project->name }}</option>
            @endforeach
        </select>
         <!-- Department Filter -->
         <label for="department">Department:</label>
         <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="department" id="department">
             <option value="">All Departments</option>
             @foreach($departments as $department)
                 <option value="{{ $department->id }}">{{ $department->name }}</option>
             @endforeach
         </select>

        <!-- Task Filter -->
        <label for="task"class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" >Task:</label>
        <select  name="task" id="task" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="">All Tasks</option>
            @foreach($tasks as $task)
                <option value="{{ $task->id }}"  >{{ $task->name }}</option>
            @endforeach
        </select> --}}

        <input type="text" name="department">


        <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Filter</button>
    </form>




    <h1 class="text-xl text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 mt-8 text-center font-bold">Report</h1>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    organization name
                </th>
                <th scope="col" class="px-6 py-3">
                   project Name
                </th>
                <th scope="col" class="px-6 py-3">
                  Task name
                </th>
                <th scope="col" class="px-6 py-3">
                  deparment name
                </th>

            </tr>
        </thead>
        <tbody>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Apple MacBook Pro 17"
                </th>
                <td class="px-6 py-4">
                    Silver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>

            </tr>


        </tbody>
    </table>
</div>

</x-app-layout>
