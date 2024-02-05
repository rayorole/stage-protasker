<x-project-layout>

    <x-slot name="header">
        <h2 class="font-semibold  text-xl text-gray-800 leading-tight">
            Create new project
        </h2>
    </x-slot>

    <!-- Card Section -->
    <div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 mx-auto">
        <form method="POST" accept="{{ route('projects.dashboard.update.settings', ['project' => $project->id]) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $project->id }}">
            <!-- Card -->
            <div class="bg-white rounded-xl shadow dark:bg-slate-900">
                <div id="output"
                    class="relative h-40 bg-[url('https://preline.co/assets/svg/examples/abstract-bg-1.svg')] bg-no-repeat bg-cover bg-center">
                    <div class="absolute top-0 end-0 p-4">
                        <img id="output" />
                        <label class="block">
                            <span class="sr-only">Choose profile photo</span>
                            <input type="file" onchange="loadFile(event)" accept="image/*" name="banner"
                                class="block w-full text-sm text-gray-500
                                  file:me-4 file:py-2 file:px-4
                                  file:rounded-lg file:border-gray-100
                                  file:text-sm file:font-semibold
                                  file:bg-white file:text-gray-600
                                  hover:file:bg-gray-100
                                  file:disabled:opacity-50 file:disabled:pointer-events-none">
                        </label>
                    </div>
                </div>

                <div class="pt-0 p-4 sm:pt-0 sm:p-7">
                    <!-- Grid -->
                    <div class="space-y-4 sm:space-y-6">


                        <div class="space-y-2">
                            <label for="af-submit-app-project-name"
                                class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-gray-200">
                                Project name
                            </label>

                            <input id="af-submit-app-project-name" type="text" required name="name"
                                value="{{ $project->name }}"
                                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-amber-500 focus:ring-amber-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                placeholder="Enter project name">

                            @error('name')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="af-submit-app-project-name"
                                class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-gray-200">
                                Deadline
                            </label>
                            <input
                                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-amber-500 focus:ring-amber-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                value="{{ $project->deadline }}" type="date" name="deadline" id="deadline">
                        </div>
                        <div class="grid grid-cols-1 gap-4 w-full md:grid-cols-2">
                            <div class="space-y-2">
                                <label for="af-submit-app-category"
                                    class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-gray-200">
                                    Type
                                </label>

                                <select id="af-submit-app-category" name="type" required
                                    class="py-2 px-3 pe-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-amber-500 focus:ring-amber-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                    <option>Select a category</option>
                                    <option value="design" {{ $project->type == 'design' ? 'selected' : '' }}>
                                        Design
                                    </option>

                                    <option value="marketing" {{ $project->type == 'marketing' ? 'selected' : '' }}>
                                        Marketing
                                    </option>
                                    <option value="development" {{ $project->type == 'development' ? 'selected' : '' }}>
                                        Development
                                    </option>
                                    <option value="testing" {{ $project->type == 'testing' ? 'selected' : '' }}>
                                        Testing
                                    </option>
                                    <option value="done" {{ $project->type == 'done' ? 'selected' : '' }}>
                                        Done
                                    </option>
                                </select>

                                @error('type')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="af-submit-app-category"
                                    class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-gray-200">
                                    Status
                                </label>

                                <select id="af-submit-app-category" name="status" required
                                    class="py-2 px-3 pe-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-amber-500 focus:ring-amber-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                    <option selected>Select a status</option>
                                    <option value="done" {{ $project->status == 'done' ? 'selected' : '' }}>Done
                                    </option>
                                    <option value="in_progress"
                                        {{ $project->status == 'in_progress' ? 'selected' : '' }}>In progress</option>
                                    <option value="todo" {{ $project->status == 'todo' ? 'selected' : '' }}>Todo
                                    </option>
                                </select>

                                @error('status')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="space-y-2">
                            <label for="af-submit-app-description"
                                class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-gray-200">
                                Description
                            </label>

                            <textarea id="af-submit-app-description" name="description" required
                                class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-amber-500 focus:ring-amber-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                rows="6" placeholder="A detailed summary will better explain your project to your team.">{{ $project->description }}</textarea>

                            @error('description')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                    <!-- End Grid -->

                    <div class="mt-5 flex justify-center gap-x-2">
                        <button type="submit"
                            class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-amber-600 text-white hover:bg-amber-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                            Update project
                        </button>
                    </div>
                </div>
            </div>
            <!-- End Card -->
        </form>
    </div>
    <!-- End Card Section -->



    <script>
        const loadFile = function(event) {
            const output = document.getElementById('output');
            // Update bg-[url
            output.style.backgroundImage = `url(${URL.createObjectURL(event.target.files[0])})`;

            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>

    <!-- End Card Section -->
</x-project-layout>
