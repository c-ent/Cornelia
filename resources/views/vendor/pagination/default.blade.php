@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true" style="font-size:30px">&lsaquo;</span>
                </li>
            @else
                <li>
                    <a  style="font-size:30px" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
@foreach ($elements as $element)
{{-- "Three Dots" Separator --}}
@if (is_string($element))
    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
@endif

{{-- Array Of Links --}}
@if (is_array($element))
    @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
            <li class="active" aria-current="page">
                <span style="color: rgb(107, 107, 107); font-size: 30px; display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: #ccc; border-radius: 50%; margin-right: 10px;">{{ $page }}</span>
            </li>
        @else
            <li>
                <a href="{{ $url }}" style="color: black; font-size: 30px; margin-right: 10px;">{{ $page }}</a>
            </li>
        @endif
    @endforeach
@endif
@endforeach



            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a  style="font-size:30px"href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span  style="font-size:30px" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
