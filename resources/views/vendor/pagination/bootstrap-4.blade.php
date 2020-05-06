@if ($paginator->hasPages())
    <!-- <ul class="pagination" role="navigation"> -->
    <nav class="pagination is-centered is-rounded" role="navigation" aria-label="pagination">
      {{-- Previous Page Link --}}
      @if ($paginator->onFirstPage())
          <a class="pagination-previous" disabled>Previous</a>
      @else
          <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" class="pagination-previous">Previous</a>
      @endif
      <ul class="pagination-list">
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li><a class="pagination-link disabled" aria-label="true">{{ $element }}</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><a class="pagination-link is-current" aria-current="page">{{$page}}</a></li>
                    @else
                        <li><a class="pagination-link" href="{{ $url }}">{{$page}}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
      </ul>
      {{-- Next Page Link --}}
      @if ($paginator->hasMorePages())
          <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" class="pagination-next">Next page</a>
      @else
          <a aria-label="@lang('pagination.next')" class="pagination-next" disabled>Next page</a>
      @endif
    </nav>
@endif
