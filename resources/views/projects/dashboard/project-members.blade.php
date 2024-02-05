<x-project-layout>
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Card -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div
                        class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-slate-900 dark:border-gray-700">

                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-slate-800">
                                <tr>


                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                Name
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                Role
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                Function
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                Edit
                                            </span>
                                        </div>
                                    </th>

                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($members as $member)
                                    <tr class="bg-white hover:bg-gray-50 dark:bg-slate-900 dark:hover:bg-slate-800">

                                        <td class="h-px w-px whitespace-nowrap align-top">
                                            <a class="block p-6" href="#">
                                                <div class="flex items-center gap-x-3">

                                                    <div class="grow">
                                                        <span
                                                            class="block text-sm font-semibold text-gray-800 dark:text-gray-200">
                                                            {{ $member->user->name }}
                                                        </span>
                                                        <span class="block text-sm text-gray-500">
                                                            {{ $member->user->email }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="h-px w-72 min-w-[18rem] align-top">
                                            <a class="block p-6" href="#">

                                                <span
                                                    class="block text-sm font-semibold text-gray-800 dark:text-gray-200">
                                                    {{ $member->role }}
                                                </span>
                                            </a>
                                        </td>
                                        <td class="h-px w-px whitespace-nowrap align-top">
                                            <a class="block p-6" href="#">
                                                <span class="text-sm text-gray-600 dark:text-gray-400">
                                                    {{ $member->function }}
                                                </span>
                                            </a>
                                        </td>

                                        <td class="h-px w-px whitespace-nowrap align-top flex display-flex">
                                            <a class="block p-6"
                                                href="{{ route('projects.dashboard.edit-member', ['project' => $project, 'member' => $member]) }}">
                                                <span class="text-sm text-gray-600 dark:text-gray-400">Edit</span>
                                            </a>
                                            <a class="block p-6"
                                                href="{{ route('projects.dashboard.delete-member', ['project' => $project, 'member' => $member]) }}">
                                                <span class="text-sm text-red-600 dark:text-red-400">Delete</span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-project-layout>
