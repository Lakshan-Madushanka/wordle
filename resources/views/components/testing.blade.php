<div x-data="{ modelOpen: true }">
        <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
             aria-modal="true">
            <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                     x-transition:enter="transition ease-out duration-300 transform"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200 transform"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"
                ></div>

                <div x-cloak x-show="modelOpen"
                     x-transition:enter="transition ease-out duration-300 transform"
                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave="transition ease-in duration-200 transform"
                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     class="dark:bg-black dark:text-white inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl"
                >
                    <div class="flex items-center justify-end space-x-4">
                        <button @click="modelOpen = false" class="text-gray-600 dark:text-white focus:outline-none hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </button>
                    </div>


                    <!-- Content -->
                    <div>
                        <h1 class="text-xl text-center w-full font-bold font-medium "></h1>
                        <div class="w-full font-bold mb-4 text-2xl border-b-2 border-gray-500 border-opacity-100 dark:border-opacity-50">
                            <p class="text-center">* This app is in its testing phrase</p>
                        </div>

                        <div class="flex justify-center mt-4">
                            <div class="w-full">
                                <p class="text-center">
                                    Please inform if you found any bug related to performance, functionality, design
                                    etc. to below email address [please use <span class="font-bold">pro_code_#965</span> as the subject].
                                </p>
                                <p class="text-center mt-2 font-bold hover:cursor-pointer hover:text-blue-500">
                                    <a href="mailto:epmadushanka@gmail.com@email.com">epmadushanka@gmail.com</a>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
