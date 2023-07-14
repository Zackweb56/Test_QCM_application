@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation">
        {{-- @if ($questions->category->category_name == $category->category_name) --}}
            <ul class="pagination">

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="btn text-light" href="{{ $paginator->nextPageUrl() }}" id="bg-sews" rel="next">{!! __('pagination.next') !!}</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">{!! __('pagination.next') !!}</span>
                    </li>
                @endif
            </ul>
        {{-- @endif --}}

    </nav>
@endif
