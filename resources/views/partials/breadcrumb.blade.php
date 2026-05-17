{{--
    Visible breadcrumb partial.
    Usage:
        @include('partials.breadcrumb', ['items' => [
            ['name' => 'Services', 'url' => route('services.index')],
            ['name' => $service['title']],   // last item has no url (it's the current page)
        ]])

    The schema BreadcrumbList still lives in the page's @section('schema').
--}}
<nav aria-label="Breadcrumb" class="container-wide pt-4 pb-2 text-xs">
    <ol class="flex flex-wrap items-center gap-1.5 text-charcoal-400">
        <li class="flex items-center gap-1.5">
            <a href="{{ url('/') }}" class="hover:text-charcoal-700 transition-colors">Home</a>
        </li>
        @foreach($items as $i => $item)
        <li class="flex items-center gap-1.5">
            <svg class="w-3 h-3 text-charcoal-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            @if(!empty($item['url']) && !$loop->last)
                <a href="{{ $item['url'] }}" class="hover:text-charcoal-700 transition-colors">{{ $item['name'] }}</a>
            @else
                <span aria-current="page" class="text-charcoal-600 font-medium">{{ $item['name'] }}</span>
            @endif
        </li>
        @endforeach
    </ol>
</nav>
