<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create new project
        </h2>
    </x-slot>

    <!-- Card Section -->
    <div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <form method="POST" accept="{{ route('projects.store') }}">
            @csrf
            <!-- Card -->
            <div class="bg-white rounded-xl shadow dark:bg-slate-900">
                <div
                    class="relative h-40 bg-[url('https://preline.co/assets/svg/examples/abstract-bg-1.svg')] bg-no-repeat bg-cover bg-center">
                    <div class="absolute top-0 end-0 p-4">
                        <button type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium  border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                            <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                <polyline points="17 8 12 3 7 8" />
                                <line x1="12" x2="12" y1="3" y2="15" />
                            </svg>
                            Upload banner
                        </button>
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
                                type="date" name="deadline" id="deadline">
                        </div>





                        <div class="grid grid-cols-1 gap-4 w-full md:grid-cols-2">
                            <div class="space-y-2">
                                <label for="af-submit-app-category"
                                    class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-gray-200">
                                    Type
                                </label>

                                <select id="af-submit-app-category" name="type" required
                                    class="py-2 px-3 pe-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-amber-500 focus:ring-amber-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                    <option selected>Select a category</option>
                                    <option value="design">Design</option>
                                    <option value="marketing">Marketing</option>
                                    <option value="development">Development</option>
                                    <option value="testing">Testing</option>
                                    <option value="done">Done</option>
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
                                    <option value="done">Done</option>
                                    <option value="in_progress">In progress</option>
                                    <option value="todo">Todo</option>
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
                                rows="6"
                                placeholder="A detailed summary will better explain your products to the audiences. Our users will see this in your dedicated product page."></textarea>

                            @error('description')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                    <!-- End Grid -->

                    <div class="mt-5 flex justify-center gap-x-2">
                        <button type="submit"
                            class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-amber-600 text-white hover:bg-amber-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                            Create your project
                        </button>
                    </div>
                </div>
            </div>
            <!-- End Card -->
        </form>
    </div>
    <!-- End Card Section -->
</x-app-layout>
