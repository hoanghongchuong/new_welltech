@if ($paginator->hasPages())
    <ul class="pagination pagination-xs m-0 float-right">
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link" href="javascript:void(0);" tabindex="-1"><i class="fas fa-angle-double-left"></i></a>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ \Request::fullUrlWithQuery(['page'=>1]) }}"><i class="fas fa-angle-double-left"></i></a>
            </li>
        @endif

        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link" href="javascript:void(0);" tabindex="-1"><i class="fas fa-angle-left"></i></a>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ \Request::fullUrlWithQuery(['page'=> $paginator->currentPage()-1]) }}"><i class="fas fa-angle-left"></i></a>
            </li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled"><a class="page-link">{{ $element }}</a></li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active">
                            <a class="page-link">{{ $page }}</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ \Request::fullUrlWithQuery(['page'=>$page]) }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ \Request::fullUrlWithQuery(['page'=> $paginator->currentPage()+1]) }}" rel="next"><i class="fas fa-angle-right"></i></a>
            </li>
        @else
            <li class="page-item disabled">
                <a class="page-link" href="javascript:void(0);"><i class="fas fa-angle-right"></i></a>
            </li>
        @endif

        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ \Request::fullUrlWithQuery(['page'=>$paginator->lastPage()]) }}"><i class="fas fa-angle-double-right"></i></a>
            </li>
        @else
            <li class="page-item disabled">
                <a class="page-link" href="javascript:void(0);" tabindex="-1"><i class="fas fa-angle-double-right"></i></a>
            </li>
        @endif
    </ul>
@endif
