@if ($paginator->hasPages())
<div class="pagination-area">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            @if (!$paginator->onFirstPage())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                        <i class="fa-solid fa-angle-left"></i>
                    </a>
                </li>
            @endif

                @foreach ($elements as $element)
                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item"><a class="page-link active" href="#">{{ $page }}</a></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                            <i class="fa-solid fa-angle-right"></i>
                        </a>
                    </li>
                @endif
        </ul>
    </nav>
</div>
@endif
