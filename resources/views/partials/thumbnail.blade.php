@php
    $sizeClass = $size ?? 'aspect-[16/9] w-full';
@endphp

@if ($article->featuredMedia)
    @php
        $media = $article->featuredMedia;
    @endphp
    <img src="{{ $media->url() }}" alt="{{ $media->alt_text ?: $article->title }}"
         class="{{ $sizeClass }} object-cover" loading="lazy"
         @if($media->width && $media->height) width="{{ $media->width }}" height="{{ $media->height }}" @endif>
@else
    {{-- Default branded thumbnail (doc 01: default category/site thumbnail behavior) --}}
    <div class="{{ $sizeClass }} relative flex items-center justify-center overflow-hidden bg-brand-800" aria-hidden="true">
        <div class="absolute inset-0 opacity-20"
             style="background: radial-gradient(circle at 30% 20%, transparent 0%, #062117 140%), repeating-linear-gradient(135deg, rgba(255,255,255,.06) 0 2px, transparent 2px 14px);"></div>
        <span class="relative font-serif text-4xl font-bold text-brand-200/90">NPD</span>
    </div>
@endif
