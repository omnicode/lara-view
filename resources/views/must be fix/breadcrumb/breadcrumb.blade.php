<ul class="breadcrumb">
    @if(isset($breadcrumbs))
        @foreach($breadcrumbs as $breadcrumb)

            @if (!$loop->last)
                <li>
                    <a href="{{ $breadcrumb['route'] }}">{{ ucwords($breadcrumb['name']) }}</a>
                </li>
            @endif

            @if ($loop->last)
                <li>
                    <span>{{ ucwords($breadcrumb['name']) }}</span>
                </li>
            @endif

        @endforeach
    @endif
</ul>