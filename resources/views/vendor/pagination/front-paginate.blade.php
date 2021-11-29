@if ($paginator->hasPages())
    <ul>
        @if ($paginator->onFirstPage())
            <li>
                <a class="prev disabled" href="#"><i class="ion-ios-arrow-left"></i></a>
            </li>
        @else
            <li>
                <a class="prev" href="{{ $paginator->previousPageUrl() }}">
                    <i class="ion-ios-arrow-left"></i>
                </a>
            </li>
        @endif
        @foreach ($elements as $element)
            @if (is_string($element))
                <li><a class="active" href="#">{{ $element }}</a></li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li>
                            <a class="active" href="#">{{ $page }}</a>
                        </li>
                    @else
                        <li>
                            <a class="" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <li>
                <a class="next" href="{{ $paginator->nextPageUrl() }}">
                    <i class="ion-ios-arrow-right"></i>
                </a>
            </li>
        @else
            <li>
                <a class="next" href="#">
                    <i class="ion-ios-arrow-right"></i>
                </a>
            </li>
        @endif
    </ul>
@endif
