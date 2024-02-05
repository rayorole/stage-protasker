<x-app-layout>
    <x-slot name="header">
        <div class="flex display-flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Projects
            </h2>
            <a href="{{ route('projects.create') }}"
                class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-2 px-4 rounded">
                Create new project
            </a>
        </div>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="overflow-hidden">
                                <!-- Card Blog -->
                                <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
                                    <!-- Grid -->
                                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                        @foreach ($projects as $project)
                                            <div
                                                class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                                                <div
                                                    class="h-52 flex flex-col justify-center items-center bg-blue-600 rounded-t-xl">
                                                    <img src="/storage/{{ $project->banner_image }}"
                                                        alt="{{ $project->name }}"
                                                        class="object-cover w-full h-full rounded-t-xl" />
                                                </div>
                                                <div class="p-4 md:p-6">
                                                    <div class="flex items-center justify-between">
                                                        <h3
                                                            class="text-xl font-semibold text-gray-800 dark:text-gray-300 dark:hover:text-white ">
                                                            {{ $project->name }}
                                                        </h3>
                                                        <p class="text-sm text-gray-600 tracking-tight">
                                                            {{ $project->deadline }}
                                                        </p>
                                                    </div>
                                                    <p class="mt-3 text-gray-500">
                                                        {{ $project->description }}
                                                    </p>
                                                </div>
                                                <div
                                                    class="mt-auto flex border-t border-gray-200 divide-x divide-gray-200 dark:border-gray-700 dark:divide-gray-700">
                                                    <a class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-es-xl bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                                        href="{{ route('projects.dashboard.index', [
                                                            'project' => $project->id,
                                                        ]) }}">
                                                        View Project
                                                    </a>
                                                    <a class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-ee-xl bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                                        href="{{ route('projects.dashboard.settings', [
                                                            'project' => $project->id,
                                                        ]) }}">
                                                        Edit project
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- End Grid -->
                                </div>
                                <!-- End Card Blog -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
