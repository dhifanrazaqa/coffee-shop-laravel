<!-- resources/views/pagination/custom.blade.php -->

@if ($paginator->hasPages())
    <div class="flex justify-between items-center py-4">
        <div class="text-sm text-app_primary">
            Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} result
        </div>
        <div class="flex items-center space-x-2">
            <ul class="flex items-center list-none p-0 m-0 space-x-1">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="disabled" aria-disabled="true">
                        <span class="px-2 py-1 border border-gray-300 text-gray-500">&laquo;</span>
                    </li>
                @else
                    <li>
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                            class="px-2 py-1 border border-gray-300 text-gray-700 hover:bg-gray-100">&laquo;</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="disabled" aria-disabled="true">
                            <span class="px-2 py-1 border border-gray-300 text-gray-700">{{ $element }}</span>
                        </li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="active" aria-current="page">
                                    <span
                                        class="px-2 py-1 border border-gray-300 text-white bg-app_primary">{{ $page }}</span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $url }}"
                                        class="px-2 py-1 border border-gray-300 text-app_primary hover:bg-gray-100">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li>
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                            class="px-2 py-1 border border-gray-300 text-gray-700 hover:bg-gray-100">&raquo;</a>
                    </li>
                @else
                    <li class="disabled" aria-disabled="true">
                        <span class="px-2 py-1 border border-gray-300 text-gray-500">&raquo;</span>
                    </li>
                @endif
            </ul>
        </div>
        <div class="hidden md:flex items-center">
            <label for="items-per-page" class="mr-2 text-sm text-app_primary">Items per page</label>
            <select id="items-per-page"
                class="block appearance-none bg-white border border-gray-300 text-gray-700 py-1 px-2 pr-8 rounded leading-tight focus:outline-none focus:border-gray-500"
                onchange="location = this.value;">
                @foreach ([10, 20, 30, 40, 50] as $perPage)
                    <option
                        value="{{ request()->url() }}?page={{ $paginator->currentPage() }}&per_page={{ $perPage }}"
                        {{ $paginator->perPage() == $perPage ? 'selected' : '' }}>{{ $perPage }}</option>
                @endforeach
            </select>
        </div>
    </div>
@endif
