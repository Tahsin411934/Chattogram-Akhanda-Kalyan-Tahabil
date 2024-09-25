<div class="flex flex-col h-full p-3 w-60 dark:bg-gray-50 dark:text-gray-800 font-">
    <div class="space-y-3">

        <div class="flex items-center justify-between">

            <h2>Dashboard</h2>
            <button class="p-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                    class="w-5 h-5 fill-current dark:text-gray-800">
                    <rect width="352" height="32" x="80" y="96"></rect>
                    <rect width="352" height="32" x="80" y="240"></rect>
                    <rect width="352" height="32" x="80" y="384"></rect>
                </svg>
            </button>
        </div>

        <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center py-4">
                <button type="submit" class="p-2 focus:outline-none focus:ring">
                    <svg fill="currentColor" viewBox="0 0 512 512" class="w-5 h-5 dark:text-gray-600">
                        <path
                            d="M479.6,399.716l-81.084-81.084-62.368-25.767A175.014,175.014,0,0,0,368,192c0-97.047-78.953-176-176-176S16,94.953,16,192,94.953,368,192,368a175.034,175.034,0,0,0,101.619-32.377l25.7,62.2L400.4,478.911a56,56,0,1,0,79.2-79.195ZM48,192c0-79.4,64.6-144,144-144s144,64.6,144,144S271.4,336,192,336,48,271.4,48,192ZM456.971,456.284a24.028,24.028,0,0,1-33.942,0l-76.572-76.572-23.894-57.835L380.4,345.771l76.573,76.572A24.028,24.028,0,0,1,456.971,456.284Z">
                        </path>
                    </svg>
                </button>
            </span>
            <input type="search" name="Search" placeholder="Search..."
                class="w-full py-2 pl-10 text-sm dark:border- rounded-md focus:outline-none dark:bg-gray-100 dark:text-gray-800 focus:dark:bg-gray-50">
        </div>
        <div class="flex-1">
            <ul class="pt-2 pb-4 space-y-1 text-sm text-gray-100">
                <li class="rounded-sm">
                    <a href="/dashboard"><button class="flex items-center p-2 space-x-3 rounded-md"><svg
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="w-5 h-5 fill-current dark:text-gray-600">
                                <path
                                    d="M469.666,216.45,271.078,33.749a34,34,0,0,0-47.062.98L41.373,217.373,32,226.745V496H208V328h96V496H480V225.958ZM248.038,56.771c.282,0,.108.061-.013.18C247.9,56.832,247.756,56.771,248.038,56.771ZM448,464H336V328a32,32,0,0,0-32-32H208a32,32,0,0,0-32,32V464H64V240L248.038,57.356c.013-.012.014-.023.024-.035L448,240Z">
                                </path>
                            </svg>
                            <span>Home</span></button></a>

                </li>
                <li class="rounded-sm">
                    <a href="/member/create">
                        <button class="flex items-center p-2 space-x-3 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                class="w-5 h-5 dark:text-gray-600">
                                <path
                                    d="M12 0C5.373 0 0 5.373 0 12c0 6.627 5.373 12 12 12s12-5.373 12-12S18.627 0 12 0zm-1 17.586L5.414 12l1.414-1.414L11 14.586l6.586-6.586L19 12l-8 5.586z">
                                </path>
                            </svg>
                            <span>Add New Member</span>
                        </button>
                    </a>
                </li>
                <li class="rounded-sm">
                    <a href="/deposits/create">
                        <button class="flex items-center p-2 space-x-3 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path d="M12 5v14m7-7H5" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <span>Deposite</span>
                        </button>
                    </a>
                </li>
                <li class="rounded-sm">
                    <a href="/withdrawals/create">
                        <button class="flex items-center p-2 space-x-3 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path d="M3 12h18v2H3z" />
                            </svg>
                            <span>Withdrawals</span>
                        </button>
                    </a>
                </li>
                <li class="rounded-sm">
                    <a href="/memberInfo">
                        <button class="flex items-center p-2 space-x-3 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm0 22C6.485 22 2 17.515 2 12S6.485 2 12 2s10 4.485 10 10-4.485 10-10 10zm-1-17h2v2h-2zm0 4h2v10h-2z" />
                            </svg>

                            <span>Member Information</span>
                        </button>
                    </a>
                </li>
                <li class="rounded-sm">
                    <a href="/receipt/create">
                        <button class="flex items-center p-2 space-x-3 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                fill="currentColor">
                                <path
                                    d="M19 8h-1V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v4H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V10a2 2 0 0 0-2-2zm-11-4h8v4H8V4zm10 16H6v-8h12v8zm-6-2a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm2-6H8V10h10v2z" />
                            </svg>

                            <span>Recipt Print</span>
                        </button>
                    </a>
                </li>
                <li class="rounded-sm">
                    <a rel="noopener noreferrer" href="#" class="flex items-center p-2 space-x-3 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                            class="w-5 h-5 fill-current dark:text-gray-600">
                            <path
                                d="M479.6,399.716l-81.084-81.084-62.368-25.767A175.014,175.014,0,0,0,368,192c0-97.047-78.953-176-176-176S16,94.953,16,192,94.953,368,192,368a175.034,175.034,0,0,0,101.619-32.377l25.7,62.2L400.4,478.911a56,56,0,1,0,79.2-79.195ZM48,192c0-79.4,64.6-144,144-144s144,64.6,144,144S271.4,336,192,336,48,271.4,48,192ZM456.971,456.284a24.028,24.028,0,0,1-33.942,0l-76.572-76.572-23.894-57.835L380.4,345.771l76.573,76.572A24.028,24.028,0,0,1,456.971,456.284Z">
                            </path>
                        </svg>
                        <span>Search</span>
                    </a>
                </li>
                <li class="rounded-sm">
                    <a rel="noopener noreferrer" href="#" class="flex items-center p-2 space-x-3 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                            class="w-5 h-5 fill-current dark:text-gray-600">
                            <path
                                d="M448.205,392.507c30.519-27.2,47.8-63.455,47.8-101.078,0-39.984-18.718-77.378-52.707-105.3C410.218,158.963,366.432,144,320,144s-90.218,14.963-123.293,42.131C162.718,214.051,144,251.445,144,291.429s18.718,77.378,52.707,105.3c33.075,27.168,76.861,42.13,123.293,42.13,6.187,0,12.412-.273,18.585-.816l10.546,9.141A199.849,199.849,0,0,0,480,496h16V461.943l-4.686-4.685A199.17,199.17,0,0,1,448.205,392.507ZM370.089,423l-21.161-18.341-7.056.865A180.275,180.275,0,0,1,320,406.857c-79.4,0-144-51.781-144-115.428S240.6,176,320,176s144,51.781,144,115.429c0,31.71-15.82,61.314-44.546,83.358l-9.215,7.071,4.252,12.035a231.287,231.287,0,0,0,37.882,67.817A167.839,167.839,0,0,1,370.089,423Z">
                            </path>
                            <path
                                d="M60.185,317.476a220.491,220.491,0,0,0,34.808-63.023l4.22-11.975-9.207-7.066C62.918,214.626,48,186.728,48,156.857,48,96.833,109.009,48,184,48c55.168,0,102.767,26.43,124.077,64.3,3.957-.192,7.931-.3,11.923-.3q12.027,0,23.834,1.167c-8.235-21.335-22.537-40.811-42.2-56.961C270.072,30.279,228.3,16,184,16S97.928,30.279,66.364,56.206C33.886,82.885,16,118.63,16,156.857c0,35.8,16.352,70.295,45.25,96.243a188.4,188.4,0,0,1-40.563,60.729L16,318.515V352H32a190.643,190.643,0,0,0,85.231-20.125,157.3,157.3,0,0,1-5.071-33.645A158.729,158.729,0,0,1,60.185,317.476Z">
                            </path>
                        </svg>
                        <span>Chat</span>
                    </a>
                </li>

                <li class="rounded-sm">
                    <a rel="noopener noreferrer" href="#" class="flex items-center p-2 space-x-3 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                            class="w-5 h-5 fill-current dark:text-gray-600">
                            <path
                                d="M440,424V88H352V13.005L88,58.522V424H16v32h86.9L352,490.358V120h56V456h88V424ZM320,453.642,120,426.056V85.478L320,51Z">
                            </path>
                            <rect width="32" height="64" x="256" y="232"></rect>
                        </svg>
                        <span>Logout</span>
                    </a>
                </li>
                <li class="rounded-lg font-poppins bg-cyan-950 py-3 px-10 w-full border border-sky-950">
                    <div class=" text-center">
                        @include('clock')
                    </div>
                </li>
            </ul>
        </div>
    </div>

</div>