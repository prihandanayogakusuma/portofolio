<article class="py-20 container mx-auto px-6 max-w-4xl">
    <div class="mb-8">
        <a href="{{ route('articles.index') }}" class="text-sm text-indigo-400 hover:text-indigo-300 mb-4 inline-block">&larr; Kembali ke Daftar Artikel</a>
        <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">{{ $article->title }}</h1>
        <p class="text-slate-400 text-sm">Dipublikasikan pada {{ $article->published_at?->format('d M Y') }}</p>
    </div>

    @if($article->thumbnail)
        <div class="mb-10 rounded-2xl overflow-hidden border border-slate-700/50">
            <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}" class="w-full max-h-[450px] object-cover">
        </div>
    @endif

    <div class="prose prose-invert max-w-none text-slate-300 space-y-6">
        {!! $article->content !!}
    </div>
</article>