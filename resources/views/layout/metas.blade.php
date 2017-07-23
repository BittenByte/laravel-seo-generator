
{{-- Common --}}
<title>{!! array_get($seo, 'title') !!}</title>
<meta name="description" content="{!! array_get($seo, 'description') !!}">
<meta name="author" content="{!! array_get($seo, 'author') !!}">
<meta name="keywords" content="{!! array_get($seo, 'keywords') !!}">
<link rel="canonical" href="{!! array_get($seo, 'canonical') !!}" />

@foreach ($seo as $tag => $value)
    @if (!empty($value))
        @if ($value == 'empty')
            @php $value = '' @endphp
        @endif

        @if (starts_with($tag, 'og-'))
            <meta property="{{ str_replace('-', ':', $tag) }}" content="{!! $value !!}">
        @elseif (starts_with($tag, 'twitter-'))
            <meta name="{{ str_replace('-', ':', $tag) }}" content="{!! $value !!}">
        @endif
    @endif
@endforeach