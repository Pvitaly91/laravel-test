@if(!empty($breadcrumbs))
<nav class="text-sm text-gray-600 mb-4" aria-label="Breadcrumb">
    <ol class="list-reset flex flex-wrap gap-1">
        @foreach($breadcrumbs as $crumb)
            <li class="flex items-center">
                @if(!$loop->first)
                    <span class="mx-1">/</span>
                @endif
                @if(isset($crumb['url']))
                    <a href="{{ $crumb['url'] }}" class="text-blue-600 hover:underline">{{ $crumb['label'] }}</a>
                @else
                    <span>{{ $crumb['label'] }}</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
@endif
