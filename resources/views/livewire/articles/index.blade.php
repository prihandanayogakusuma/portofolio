<div class="py-28 relative z-10">
    <div class="container mx-auto px-6 max-w-7xl">
        <!-- Judul Halaman -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Artikel & <span class="text-indigo-500">Catatan IT</span></h1>
            <div class="w-20 h-1 bg-indigo-500 mx-auto rounded-full mb-4"></div>
            <p class="text-slate-400">Kumpulan dokumentasi konfigurasi server, jaringan, dan otomatisasi sistem.</p>
        </div>

        <!-- Bagian Filter dan Pencarian -->
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-12">
            <!-- Filter Kategori -->
            <div class="flex flex-wrap items-center gap-2 w-full md:w-auto">
                <button wire:click="$set('category', '')" 
                    class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ $category === '' ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-500/30' : 'bg-slate-800/60 text-slate-300 border border-slate-700 hover:bg-slate-800' }}">
                    Semua
                </button>
                @foreach($categories ?? [] as $cat)
                <button wire:click="$set('category', '{{ $cat }}')" 
                    class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ $category === $cat ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-500/30' : 'bg-slate-800/60 text-slate-300 border border-slate-700 hover:bg-slate-800' }}">
                    {{ $cat }}
                </button>
                @endforeach
            </div>

            <!-- Input Pencarian -->
            <div class="w-full md:w-80 relative">
                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari artikel atau catatan..." 
                    class="w-full bg-slate-800/40 border border-slate-700 rounded-full px-5 py-3 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all">
                <div class="absolute right-4 top-3.5 text-slate-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
            </div>
        </div>

        <!-- Grid Daftar Artikel -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($articles as $article)
            <div class="card-bounce bg-slate-800/40 border border-slate-700/50 rounded-2xl overflow-hidden backdrop-blur-sm flex flex-col justify-between hover:border-indigo-500/50 transition-all group" style="animation-delay: {{ $loop->index * 0.1 }}s;">
                @if($article->thumbnail)
                    <div class="aspect-video overflow-hidden bg-slate-900">
                        <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                @else
                    <div class="w-full h-48 bg-slate-900/60 flex items-center justify-center text-slate-500">No Image</div>
                @endif
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-xs text-indigo-400 font-medium">{{ $article->published_at?->format('d M Y') }}</span>
                            @if($article->category)
                            <span class="text-xs px-2.5 py-1 bg-slate-900/60 border border-slate-700 text-slate-400 rounded-full">{{ $article->category }}</span>
                            @endif
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3 group-hover:text-indigo-400 transition-colors">{{ $article->title }}</h3>
                        <p class="text-slate-400 text-sm line-clamp-3">{{ $article->excerpt }}</p>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('articles.show', $article->slug) }}" class="inline-flex items-center text-sm font-medium text-indigo-400 hover:text-indigo-300">
                            Baca Selengkapnya &rarr;
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center text-slate-500 py-16">
                <p class="text-lg">Artikel atau catatan IT yang Anda cari tidak ditemukan.</p>
            </div>
            @endforelse
        </div>

        <!-- Navigasi Pagination -->
        <div class="mt-12">
            {{ $articles->links() }}
        </div>
    </div>
</div>