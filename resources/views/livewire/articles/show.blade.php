@php
    $latestArticles = \App\Models\Article::whereNotNull('published_at')->latest('published_at')->take(5)->get();
    
    // Mengambil artikel sebelumnya dan berikutnya berdasarkan ID
    $previousArticle = \App\Models\Article::where('id', '<', $article->id)->whereNotNull('published_at')->orderBy('id', 'desc')->first();
    $nextArticle = \App\Models\Article::where('id', '>', $article->id)->whereNotNull('published_at')->orderBy('id', 'asc')->first();
@endphp

<div class="py-28 relative z-10">
    <div class="container mx-auto px-6 max-w-7xl">
        <!-- Tautan Kembali -->
        <div class="mb-8">
            <a href="{{ route('articles.index') }}" class="inline-flex items-center text-sm font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 transition-colors">
                &larr; Kembali ke Daftar Artikel
            </a>
        </div>

        <!-- Layout Utama: Kolom Kiri (Konten), Kolom Kanan (Sidebar) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- KONTEN UTAMA (Kiri) -->
            <div class="lg:col-span-8 space-y-8">
                
                <!-- Kartu Utama Artikel -->
                <div class="bg-white dark:bg-slate-800/40 border border-slate-200 dark:border-slate-700/50 p-6 md:p-10 rounded-2xl shadow-sm dark:shadow-none backdrop-blur-sm">
                    <!-- Kategori & Judul -->
                    <div class="mb-6">
                        @if($article->category)
                            <span class="inline-block px-3 py-1 bg-slate-100 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-xs text-slate-700 dark:text-slate-300 rounded-full mb-4">
                                {{ $article->category }}
                            </span>
                        @endif
                        <h1 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white mb-4 leading-tight">
                            {{ $article->title }}
                        </h1>
                        <p class="text-sm text-slate-500 dark:text-slate-400">
                            Dipublikasikan pada {{ $article->published_at?->format('d M Y') }}
                        </p>
                    </div>

                    <!-- Thumbnail Artikel -->
                    @if($article->thumbnail)
                        <div class="mb-8 rounded-xl overflow-hidden border border-slate-200 dark:border-slate-700/50 bg-slate-100 dark:bg-slate-900">
                            <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}" class="w-full h-auto object-cover max-h-[450px]">
                        </div>
                    @endif

                    <!-- Isi Artikel -->
                    <div id="article-content" class="prose prose-slate dark:prose-invert max-w-none text-slate-700 dark:text-slate-300 leading-relaxed mb-12">
                        {!! $article->content !!}
                    </div>

                    <hr class="border-slate-200 dark:border-slate-700 my-8">

                    <!-- SEKSI RATING ARTIKEL (Interaktif dengan Alpine.js) -->
                    <div x-data="{ 
                        rating: 0, 
                        hoverRating: 0, 
                        hasVoted: false, 
                        voteCount: 12, 
                        average: 5.0,
                        rate(star) {
                            if (this.hasVoted) return;
                            this.rating = star;
                            this.hasVoted = true;
                            this.voteCount++;
                        }
                    }" class="text-center py-6 bg-slate-50 dark:bg-slate-900/40 rounded-xl border border-slate-200 dark:border-slate-700/50 mb-8">
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">Bermanfaatkan Artikel Ini?</h3>
                        <p class="text-sm text-slate-600 dark:text-slate-400 mb-4" x-text="hasVoted ? 'Terima kasih telah memberi rating pada post ini.' : 'Klik bintang untuk rating!'"></p>
                        
                        <!-- Ikon Bintang Interaktif -->
                        <div class="flex justify-center gap-1 mb-3">
                            <template x-for="star in 5">
                                <svg @click="rate(star)" 
                                     @mouseenter="hoverRating = star" 
                                     @mouseleave="hoverRating = 0"
                                     class="w-7 h-7 cursor-pointer transition-transform hover:scale-110"
                                     :class="(hoverRating >= star || rating >= star) ? 'text-amber-400 fill-current' : 'text-slate-300 dark:text-slate-600 fill-current'"
                                     viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                            </template>
                        </div>
                        
                        <p class="text-xs text-slate-500 dark:text-slate-400">
                            Rating rata-rata <span x-text="average"></span> / 5. Vote count: <span x-text="voteCount"></span>
                        </p>
                        <p class="text-xs text-indigo-600 dark:text-indigo-400 mt-1 font-medium" x-show="hasVoted">Terima kasih atas penilaian Anda!</p>
                    </div>

                    <!-- TOMBOL SHARE SOSIAL MEDIA -->
                    <div class="grid grid-cols-2 sm:grid-cols-5 gap-3 mb-10">
                        <button class="flex items-center justify-center gap-2 py-2.5 px-4 bg-[#3b5998] hover:bg-[#324b81] text-white rounded-lg text-sm font-medium transition-colors">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M9 8H6v4h3v12h5V12h3.642L18 8h-4V6.333C14 5.37 14.5 5 15.5 5H18V0h-3.808C10.559 0 9 1.587 9 4.722V8z"/></svg>
                        </button>
                        <button class="flex items-center justify-center gap-2 py-2.5 px-4 bg-[#000000] hover:bg-slate-800 text-white rounded-lg text-sm font-medium transition-colors">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </button>
                        <button class="flex items-center justify-center gap-2 py-2.5 px-4 bg-[#dd4b39] hover:bg-[#c23321] text-white rounded-lg text-sm font-medium transition-colors">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm3.25 15.5h-1.5v-2h-2v-1.5h2v-2h1.5v2h2v1.5h-2v2zm3.75-5.5c0 1.381-.563 2.63-1.474 3.535l-1.061-1.061c.64-.64 1.035-1.525 1.035-2.474 0-1.933-1.567-3.5-3.5-3.5s-3.5 1.567-3.5 3.5c0 .949.395 1.834 1.035 2.474l-1.061 1.061c-.911-.905-1.474-2.154-1.474-3.535 0-2.761 2.239-5 5-5s5 2.239 5 5z"/></svg>
                        </button>
                        <button class="flex items-center justify-center gap-2 py-2.5 px-4 bg-[#0077b5] hover:bg-[#006097] text-white rounded-lg text-sm font-medium transition-colors">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </button>
                        <button class="flex items-center justify-center gap-2 py-2.5 px-4 col-span-2 sm:col-span-1 bg-[#25d366] hover:bg-[#20ba5a] text-white rounded-lg text-sm font-medium transition-colors">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        </button>
                    </div>

                    <hr class="border-slate-200 dark:border-slate-700 my-8">

                    <!-- KOTAK PENULIS (AUTHOR BIO) -->
                    <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6 bg-slate-50 dark:bg-slate-900/40 p-6 rounded-xl border border-slate-200 dark:border-slate-700/50 mb-8">
                        <img src="{{ asset('images/prihandana.png') }}" alt="Author" class="w-20 h-20 rounded-full object-cover border-2 border-indigo-500 shrink-0">
                        <div class="text-center sm:text-left">
                            <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-1">Prihandana Yoga Kusuma</h4>
                            <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed mb-4">
                                I'm a IT Infrastructure & development strong passion for front-end & Backend development. Skilled in website creation and experienced in content writing. I blend technical expertise with creativity to craft engaging and functional web experiences!
                            </p>
                            <div class="flex justify-center sm:justify-start items-center gap-3">
                                <a href="{{ route('articles.index') }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-xs font-medium transition-colors shadow-sm">VIEW ALL POSTS</a>
                                <a href="{{ route('articles.index') }}" class="p-2 bg-slate-200 dark:bg-slate-800 hover:bg-slate-300 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 rounded-lg transition-colors" title="Semua Postingan">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- NAVIGASI ARTIKEL SEBELUMNYA / BERIKUTNYA -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4 border-t border-slate-200 dark:border-slate-700">
                        <!-- Artikel Sebelumnya -->
                        @if($previousArticle)
                            <a href="{{ route('articles.show', $previousArticle->slug) }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-900/40 transition-colors group">
                                <span class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-500 shrink-0 group-hover:bg-indigo-600 group-hover:text-white transition-colors">&larr;</span>
                                <span class="text-xs font-medium text-slate-700 dark:text-slate-300 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors line-clamp-2">{{ $previousArticle->title }}</span>
                            </a>
                        @else
                            <div></div>
                        @endif

                        <!-- Artikel Berikutnya -->
                        @if($nextArticle)
                            <a href="{{ route('articles.show', $nextArticle->slug) }}" class="flex items-center justify-between sm:justify-end gap-3 p-3 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-900/40 transition-colors group text-right sm:col-start-2">
                                <span class="text-xs font-medium text-slate-700 dark:text-slate-300 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors line-clamp-2">{{ $nextArticle->title }}</span>
                                <span class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-500 shrink-0 group-hover:bg-indigo-600 group-hover:text-white transition-colors">&rarr;</span>
                            </a>
                        @else
                            <div></div>
                        @endif
                    </div>
                </div>

            </div>

            <!-- SIDEBAR (Kanan) -->
            <div class="lg:col-span-4 space-y-8">
                
                <!-- Widget 1: Artikel Terbaru -->
                <div class="bg-white dark:bg-slate-800/40 border border-slate-200 dark:border-slate-700/50 p-6 rounded-2xl shadow-sm dark:shadow-none backdrop-blur-sm">
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-6 pb-3 border-b border-slate-200 dark:border-slate-700">Artikel Terbaru</h3>
                    <div class="space-y-4">
                        @forelse($latestArticles as $latest)
                            <a href="{{ route('articles.show', $latest->slug) }}" class="block text-sm text-slate-600 dark:text-slate-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors pb-3 border-b border-slate-100 dark:border-slate-800 last:border-0 last:pb-0">
                                {{ $latest->title }}
                            </a>
                        @empty
                            <p class="text-sm text-slate-500 dark:text-slate-400">Belum ada artikel terbaru.</p>
                        @endforelse
                    </div>
                </div>

               <!-- Widget 2: Daftar Isi Otomatis (Table of Contents) -->
                <div x-data="{
                    headings: [],
                    init() {
                        setTimeout(() => {
                            const content = document.getElementById('article-content');
                            if (!content) return;
                            const els = content.querySelectorAll('h2, h3');
                            els.forEach((el, index) => {
                                if (!el.id) el.id = 'heading-' + index;
                                this.headings.push({
                                    id: el.id,
                                    text: el.innerText,
                                    tag: el.tagName.toLowerCase()
                                });
                            });
                        }, 100);
                    }
                }" class="bg-white dark:bg-slate-800/40 border border-slate-200 dark:border-slate-700/50 p-6 rounded-2xl shadow-sm dark:shadow-none backdrop-blur-sm">
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-4">Daftar Isi</h3>
                    <div class="p-4 rounded-xl border border-indigo-200 dark:border-indigo-500/30 bg-indigo-50/50 dark:bg-indigo-950/20 text-sm space-y-2">
                        <!-- Pesan jika artikel belum menggunakan Heading 2 atau Heading 3 -->
                        <template x-if="headings.length === 0">
                            <p class="text-xs text-slate-500 dark:text-slate-400">Gunakan format Heading 2 atau Heading 3 pada editor artikel agar daftar isi muncul otomatis.</p>
                        </template>
                        
                        <!-- Daftar isi otomatis jika heading ditemukan -->
                        <template x-for="(heading, index) in headings" :key="index">
                            <a :href="'#' + heading.id" 
                               :class="heading.tag === 'h3' ? 'pl-4 text-xs block text-indigo-600 dark:text-indigo-400 hover:underline' : 'block text-indigo-600 dark:text-indigo-400 hover:underline font-semibold'">
                                <span x-text="heading.text"></span>
                            </a>
                        </template>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>