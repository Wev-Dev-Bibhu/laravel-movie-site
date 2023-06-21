<div class="flex flex-col overflow-x-auto bg-gray-900 p-4 pt-0">
    <div class="sm:-mx-6">
        <div class="inline-block py-2 sm:px-6 lg:px-8">
            <div class="overflow-x-auto">
                <table class=" text-left text-sm font-light">
                    <thead class="border-b font-medium dark:border-neutral-500">
                        <tr>
                            <th scope="col" class="px-3 py-4 text-gray-200">#</th>
                            <th scope="col" class="px-3 py-4 text-gray-200">Title</th>
                            <th scope="col" class="px-3 py-4 text-gray-200 w-56">Description</th>
                            <th scope="col" class="px-3 py-4 text-gray-200">Release Year</th>
                            <th scope="col" class="px-3 py-4 text-gray-200">Special Features</th>
                            <th scope="col" class="px-3 py-4 text-gray-200">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $page === 0 ? 0 : ($page - 1) * 10; ?>
                        @foreach ($dataArr as $item)
                            <tr>
                                <td class="whitespace-nowrap px-3 py-4 text-gray-200 font-medium"> {{ ++$i }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-gray-200">{{ $item->title }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-gray-200">{{ $item->description }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-gray-200">{{ $item->release_year }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-gray-200">
                                    <div class="flex">
                                        <?php
                                        $str_arr = explode(',', $item->special_features);
                                        ?>
                                        @foreach ($str_arr as $chips)
                                            <div class="mr-1 flex items-center justify-between rounded-[16px] px-[12px] py-0 text-[13px] font-normal normal-case leading-loose text-[#4f4f4f] shadow-none transition-[opacity] duration-300 ease-linear hover:!shadow-none  dark:bg-neutral-600 dark:text-neutral-200"
                                                data-te-close="true">
                                                {{ $chips }}
                                            </div>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-gray-200 flex ">
                                    <button class="pr-1"
                                        onclick="window.location='{{ url('edit-movie/' . $item->film_id) }}'">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                        </svg>

                                    </button>
                                    |
                                    <button
                                        class="pl-1 outline-none transititext-primary text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600"
                                        data-te-toggle="modal" data-te-target="#deleteModal"
                                        onclick="document.getElementById('deleteIdInput').value = {{ $item->film_id }}"
                                        data-te-ripple-color="light">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="w-4 h-4 text-red-500 transititext-primary text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600">

                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>


                                    </button>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <nav aria-label="Page navigation example">
        {{-- get-pagination/{page} --}}
        <ul class="list-style-none flex justify-end">
            <li>
                <a href="
                @if ($page == 1) {{ 'javascript:void(0)' }}
                @elseif ($page == 0)
                    {{ 'javascript:void(0)' }}
                @else
                    {{ route('movie-management/page/', $page - 1) }} @endif
                "
                    class="
                @if ($page == 1) {{ 'pointer-events-none' }}
                @elseif ($page == 0)
                    {{ 'pointer-events-none' }}
                @else
                   '' @endif
                    relative block rounded bg-transparent px-3 py-1.5 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100 dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
                    </svg>

                </a>
            </li>
            <li>
                <a href="
                @if (ceil($total / 10) <= $page + 1) {{ 'javascript:void(0)' }}
                @else
                {{ route('movie-management/page/', $page === 0 ? 2 : $page + 1) }} @endif
                "
                    class="
                @if (ceil($total / 10) <= $page + 1) {{ 'pointer-events-none' }}
                @else
                   '' @endif
                relative block rounded bg-transparent px-3 py-1.5 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100 dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                    </svg>
                </a>
            </li>
        </ul>
    </nav>
</div>
<div data-te-modal-init
    class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="deleteModal" tabindex="-1" aria-labelledby="deleteModalTitle" aria-modal="true" role="dialog">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
        <div
            class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-clip-padding text-current shadow-lg outline-none bg-slate-200">
            <div class="relative p-4 items-center flex justify-center flex-col">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-32 h-32 text-red-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                </svg>
                <h3>Are you sure ?</h3>
                <p class="text-sm text-slate-500">You can recover by contacting admin.</p>

            </div>
            <div class="flex flex-shrink-0 flex-wrap items-center justify-center rounded-b-md p-4 ">
                <button type="button"
                    class="ml-1 inline-block rounded bg-slate-500 hover:bg-slate-600 focus:bg-slate-600 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] outline-none focus:ring-0"
                    data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                    cancel
                </button>
                <form action="{{ route('delete-movie') }}" method="post">
                    @csrf
                    <input type="text" hidden id="deleteIdInput" name="deleteIdInput" value="10">
                    <button type="submit"
                        class="ml-1 inline-block rounded bg-red-500 hover:bg-red-600 focus:bg-red-600 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] outline-none focus:ring-0  active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] "
                        data-te-ripple-init data-te-ripple-color="light">
                        delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
