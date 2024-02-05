<x-project-layout>
    <!-- Card Section -->
    <div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Card -->
        <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">
                    Add member
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Add a new member to your project
                </p>
            </div>

            <form method="POST"
                action="{{ route('projects.dashboard.update-member', ['project' => $project, 'member' => $member->id]) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <!-- Grid -->
                <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">

                    <div class="sm:col-span-3">
                        <label for="email" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                            Email
                        </label>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-9">
                        <input id="email" type="email" name="email" oninput="fetchMembers()"
                            value="{{ $member->email }}"
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-amber-500 focus:ring-amber-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                            placeholder="maria@site.com">
                    </div>


                    <!-- End Col -->

                    <div class="sm:col-span-3">
                        <label for="af-account-full-name"
                            class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                            Full name
                        </label>
                        <div class="hs-tooltip inline-block">
                            <button type="button" class="hs-tooltip-toggle ms-1">
                                <svg class="inline-block w-3 h-3 text-gray-400 dark:text-gray-600"
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg>
                            </button>
                            <span
                                class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible w-40 text-center z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-slate-700"
                                role="tooltip">
                                Displayed on public forums, such as Preline
                            </span>
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-9">
                        <div class="sm:flex">
                            <input id="first-name" type="text" value="{{ $member->name }}"
                                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-amber-500 focus:ring-amber-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                placeholder="Maria">
                            <input type="text" id="last-name" value="{{ $member->name }}"
                                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-amber-500 focus:ring-amber-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                placeholder="Boone">
                        </div>
                        <div style="display: none;" id="not-found">
                            <p class="text-red-500 text-sm">
                                User not found
                            </p>
                        </div>

                    </div>
                    <!-- End Col -->



                    <div class="sm:col-span-3">
                        <label for="role" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                            Role
                        </label>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-9">
                        <div class="sm:flex">
                            <label for="role-admin"
                                class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-amber-500 focus:ring-amber-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                <input type="radio" name="role" value="admin"
                                    class="shrink-0 mt-0.5 border-gray-300 rounded-full text-amber-600 focus:ring-amber-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-amber-500 dark:checked:border-amber-500 dark:focus:ring-offset-gray-800"
                                    id="role-admin" checked>
                                <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">
                                    Admin
                                </span>
                            </label>

                            <label for="role-editor"
                                class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-amber-500 focus:ring-amber-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                <input type="radio" name="role" value="editor"
                                    class="shrink-0 mt-0.5 border-gray-300 rounded-full text-amber-600 focus:ring-amber-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-amber-500 dark:checked:border-amber-500 dark:focus:ring-offset-gray-800"
                                    id="role-editor">
                                <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">
                                    Editor
                                </span>
                            </label>

                            <label for="role-viewer"
                                class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-amber-500 focus:ring-amber-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                <input type="radio" name="role" value=" viewer" "
                                    class="shrink-0 mt-0.5 border-gray-300 rounded-full text-amber-600 focus:ring-amber-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-amber-500 dark:checked:border-amber-500 dark:focus:ring-offset-gray-800"
                                    id="role-viewer">
                                <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">
                                    Viewer
                                </span>
                            </label>
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-3">
                        <label for="function" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                            Function
                        </label>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-9">
                        <textarea id="function" type="text" name="function"
                            class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-amber-500 focus:ring-amber-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                            rows="6" placeholder="Type member function...">{{ $member->function }}</textarea>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Grid -->

                <div class="mt-5 flex justify-end gap-x-2">

                    <button type="submit"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-amber-600 text-white hover:bg-amber-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        Save changes
                    </button>
                </div>
            </form>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Card Section -->
</x-project-layout>


<script>
    function fetchMembers() {
        const email = document.getElementById('email').value;
        if (!email) return;
        console.log(email);
        fetch(`/api/user/${email}`)
            // If response is not 200
            .then(response => response.json()).then(data => {
                if (data) {
                    if (data.error) {
                        console.log(data.error);
                        document.getElementById('not-found').style.display = 'block';
                    } else {
                        console.log(data);
                        const first_name = data.user.name.split(' ')[0];
                        const last_name = data.user.name.split(' ')[1];
                        document.getElementById('first-name').value = first_name;
                        document.getElementById('last-name').value = last_name;

                        document.getElementById('not-found').style.display = 'none';
                        return;
                    }
                }
            });
    }
</script>
