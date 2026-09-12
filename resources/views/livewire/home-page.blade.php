<div>
    <!-- Hero Section -->
    <section id="hero" class="py-20 lg:py-32 relative z-10">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="flex flex-col-reverse lg:flex-row items-center gap-12">
                <!-- Kolom Teks -->
                <div class="lg:w-1/2 flex flex-col justify-center text-center lg:text-left" data-aos="fade-right">
                    <div class="inline-flex self-center lg:self-start items-center gap-2 px-4 py-1.5 mb-6 rounded-full bg-emerald-50 dark:bg-emerald-500/10 border border-emerald-200 dark:border-emerald-500/20 text-emerald-600 dark:text-emerald-400 text-xs font-semibold">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        Tersedia untuk Kolaborasi & Proyek Baru
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-slate-900 dark:text-white mb-4 tracking-tight">
                        Halo, Saya <span class="text-indigo-600 dark:text-indigo-500">Prihandana Yoga Kusuma</span>
                    </h1>
                    <h2 class="text-xl md:text-2xl text-slate-700 dark:text-slate-300 font-medium mb-6 min-h-[2em]"
                        x-data="{
                            roles: ['IT Infrastructure & Developer', 'Network & Server Specialist', 'Web Application Developer'],
                            roleIndex: 0,
                            text: '',
                            isDeleting: false,
                            type() {
                                const current = this.roles[this.roleIndex];
                                if (!this.isDeleting) {
                                    this.text = current.substring(0, this.text.length + 1);
                                    if (this.text === current) {
                                        this.isDeleting = true;
                                        setTimeout(() => this.type(), 2000);
                                        return;
                                    }
                                } else {
                                    this.text = current.substring(0, this.text.length - 1);
                                    if (this.text === '') {
                                        this.isDeleting = false;
                                        this.roleIndex = (this.roleIndex + 1) % this.roles.length;
                                    }
                                }
                                setTimeout(() => this.type(), this.isDeleting ? 30 : 70);
                            }
                        }"
                        x-init="type()">
                        <span x-text="text"></span><span class="typing-caret inline-block w-0.5 h-5 md:h-6 bg-indigo-500 ml-0.5 align-middle"></span>
                    </h2>
                    <p class="text-slate-600 dark:text-slate-400 text-lg leading-relaxed mb-8">
                        Profesional IT dengan fokus pada pengelolaan infrastruktur jaringan, pemeliharaan server, serta pembangunan sistem web untuk meningkatkan efisiensi operasional.
                    </p>
                    <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4">
                        <a href="#projects" class="btn-shine px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-full font-medium transition-all shadow-lg shadow-indigo-500/30 hover:-translate-y-0.5">
                            Lihat Proyek
                        </a>
                        <a href="#contact" class="px-8 py-3 bg-transparent hover:bg-slate-100 dark:hover:bg-slate-800 border border-slate-300 dark:border-slate-700 text-slate-800 dark:text-white rounded-full font-medium transition-all">
                            Hubungi Saya
                        </a>
                        <a href="{{ route('cv.view') }}" target="_blank" class="inline-flex items-center gap-2 px-2 py-3 text-slate-600 dark:text-slate-300 hover:text-indigo-600 dark:hover:text-indigo-400 font-medium transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            Lihat CV
                        </a>
                    </div>
                </div>

                <!-- Kolom Foto -->
                <style>
                @keyframes floatAnimation {
                    0%, 100% { transform: translateY(0px); }
                    50% { transform: translateY(-10px); }
                }
                .floating-container { animation: floatAnimation 3s ease-in-out infinite; }
                .bounce-spin-img { transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1); }
                .bounce-spin-img:hover { transform: scale(1.05); }
                @keyframes cardBounce {
                    0% { transform: scale(0.3); opacity: 0; }
                    50% { transform: scale(1.05); opacity: 1; }
                    70% { transform: scale(0.95); }
                    100% { transform: scale(1); opacity: 1; }
                }
                .card-bounce { animation: cardBounce 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55) forwards; }

                /* Carousel Keahlian (auto-scroll) */
                @keyframes marqueeScroll {
                    from { transform: translateX(0); }
                    to { transform: translateX(-50%); }
                }
                .marquee-track {
                    animation: marqueeScroll linear infinite;
                    will-change: transform;
                }
                .marquee-track:hover { animation-play-state: paused; }
                .marquee-mask {
                    -webkit-mask-image: linear-gradient(to right, transparent, black 8%, black 92%, transparent);
                    mask-image: linear-gradient(to right, transparent, black 8%, black 92%, transparent);
                }
                @media (prefers-reduced-motion: reduce) {
                    .marquee-track { animation: none; }
                }
                </style>

                <div class="lg:w-1/2 flex justify-center" data-aos="fade-left">
                    <div class="relative w-72 h-72 md:w-80 md:h-80 lg:w-96 lg:h-96 floating-container">
                        <div class="absolute inset-0 bg-indigo-500 rounded-full blur-3xl opacity-20"></div>
                        <div class="spin-ring absolute -inset-2 rounded-full" style="background: conic-gradient(from 0deg, #6366f1, #a855f7, #6366f1);"></div>
                        <img src="{{ asset('images/prihandana.png') }}" alt="Foto Profil" class="bounce-spin-img relative w-full h-full object-cover rounded-full border-4 border-white dark:border-[#0f172a] shadow-2xl cursor-pointer">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-20 relative z-10">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-px bg-gradient-to-r from-transparent via-indigo-500 to-transparent opacity-40"></div>
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-indigo-50 dark:bg-indigo-500/10 border border-indigo-200 dark:border-indigo-500/20 text-indigo-600 dark:text-indigo-400 text-xs font-semibold uppercase tracking-wider mb-4">
                    Kemampuan Teknis
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white">Keahlian & Kemampuan</h2>
            </div>

        </div>

        @php
            $skillIcons = ($skills ?? collect())->filter(fn($skill) => $skill->icon)->values();
            // Gandakan urutan ikon agar satu putaran selalu lebih lebar dari layar (mencegah celah kosong pada layar lebar)
            $minItems = 20;
            $repeat = $skillIcons->isEmpty() ? 0 : max(1, (int) ceil($minItems / $skillIcons->count()));
            $skillSequence = collect();
            for ($i = 0; $i < $repeat; $i++) {
                $skillSequence = $skillSequence->concat($skillIcons);
            }
        @endphp

        @if($skillIcons->isEmpty())
        <div class="container mx-auto px-6 max-w-7xl text-center text-slate-500 py-8">
            Data keahlian belum tersedia.
        </div>
        @else
        <div class="marquee-mask overflow-hidden" data-aos="fade-up">
            <div class="marquee-track flex items-center gap-6 w-max" style="animation-duration: {{ max(20, $skillSequence->count() * 2.5) }}s;">
                @foreach($skillSequence->concat($skillSequence) as $skill)
                <div class="spotlight-card shrink-0 w-24 h-24 md:w-28 md:h-28 flex items-center justify-center bg-white dark:bg-slate-800/40 border border-slate-200 dark:border-slate-700/50 backdrop-blur-sm rounded-2xl shadow-sm dark:shadow-none hover:-translate-y-1 hover:border-indigo-400/50 transition-all duration-300" title="{{ $skill->name }}">
                    <div class="w-9 h-9 md:w-11 md:h-11 flex items-center justify-center text-slate-800 dark:text-white [&>svg]:w-full [&>svg]:h-full">
                        {!! $skill->icon !!}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </section>

   {{-- Experience Section (disembunyikan sementara atas permintaan)
    <section id="experience" class="py-20 relative z-10">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-px bg-gradient-to-r from-transparent via-indigo-500 to-transparent opacity-40"></div>
        <div class="container mx-auto px-6 max-w-4xl">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white mb-4">Pengalaman Kerja</h2>
                <div class="w-20 h-1 bg-indigo-500 mx-auto rounded-full"></div>
            </div>

            <div class="space-y-8 relative before:absolute before:inset-0 before:left-7 sm:before:left-40 before:h-full before:w-px before:bg-slate-300 dark:before:bg-slate-700">
                @forelse($experiences ?? [] as $experience)
                <div class="card-bounce relative flex flex-col sm:flex-row items-start gap-6 sm:gap-10 group" style="animation-delay: {{ $loop->index * 0.15 }}s;">
                    <div class="sm:w-32 pt-1 text-sm font-semibold text-indigo-600 dark:text-indigo-400 shrink-0 pl-14 sm:pl-0 sm:text-right">
                        {{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }} -
                        @if($experience->is_current)
                            Sekarang
                        @else
                            {{ \Carbon\Carbon::parse($experience->end_date)->format('M Y') }}
                        @endif
                    </div>
                    <div class="absolute left-7 sm:left-40 -translate-x-1/2 top-2 w-4 h-4 rounded-full bg-indigo-600 dark:bg-indigo-500 border-4 border-white dark:border-[#0f172a] z-10"></div>
                    <div class="flex-grow w-full bg-white dark:bg-slate-800/40 border border-slate-200 dark:border-slate-700/50 backdrop-blur-sm p-6 rounded-2xl shadow-sm dark:shadow-none hover:bg-slate-50 dark:hover:bg-slate-800/60 transition-all ml-12 sm:ml-0">
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white">{{ $experience->position }}</h3>
                        <div class="text-slate-700 dark:text-slate-300 font-medium mb-4">{{ $experience->company }}</div>
                        <div class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed prose prose-slate dark:prose-invert max-w-none">
                            {!! $experience->description !!}
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center text-slate-500 py-8">
                    Belum ada data pengalaman kerja.
                </div>
                @endforelse
            </div>
        </div>
    </section>
    --}}

    <!-- Projects Section -->
    <section id="projects" class="py-20 bg-slate-100/50 dark:bg-slate-800/20 relative z-10">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-px bg-gradient-to-r from-transparent via-indigo-500 to-transparent opacity-40"></div>
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-indigo-50 dark:bg-indigo-500/10 border border-indigo-200 dark:border-indigo-500/20 text-indigo-600 dark:text-indigo-400 text-xs font-semibold uppercase tracking-wider mb-4">
                    Portofolio
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white">Proyek Unggulan</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($projects ?? [] as $project)
                <div class="spotlight-card card-bounce bg-white dark:bg-slate-800/40 border border-slate-200 dark:border-slate-700/50 rounded-2xl overflow-hidden shadow-sm dark:shadow-none hover:-translate-y-2 hover:border-indigo-400/50 transition-all duration-300 group" style="animation-delay: {{ $loop->index * 0.15 }}s;">
                    <div class="aspect-video bg-slate-200 dark:bg-slate-700 relative overflow-hidden">
                        @if($project->image)
                            <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-slate-400 dark:text-slate-500 bg-slate-100 dark:bg-slate-800">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-slate-900/80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-4">
                            @if($project->url)
                            <a href="{{ $project->url }}" target="_blank" class="p-3 bg-indigo-600 rounded-full text-white hover:bg-indigo-700 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">{{ $project->title }}</h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm mb-4 line-clamp-3">
                            {{ $project->description }}
                        </p>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-slate-500 py-8">
                    Belum ada proyek unggulan.
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Articles Section -->
    @php
        $latestArticles = \App\Models\Article::whereNotNull('published_at')->latest('published_at')->take(3)->get();
    @endphp

    @if($latestArticles->count() > 0)
    <section id="articles" class="py-20 relative z-10">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-px bg-gradient-to-r from-transparent via-indigo-500 to-transparent opacity-40"></div>
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-indigo-50 dark:bg-indigo-500/10 border border-indigo-200 dark:border-indigo-500/20 text-indigo-600 dark:text-indigo-400 text-xs font-semibold uppercase tracking-wider mb-4">
                    Blog & Insight
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white mb-4">Artikel & <span class="text-indigo-600 dark:text-indigo-500">Catatan IT</span></h2>
                <a href="{{ route('articles.index') }}" wire:navigate class="inline-flex items-center text-sm font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 transition-colors">
                    Lihat Semua Artikel &rarr;
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($latestArticles as $article)
                <div class="spotlight-card card-bounce bg-white dark:bg-slate-800/40 border border-slate-200 dark:border-slate-700/50 rounded-2xl overflow-hidden shadow-sm dark:shadow-none backdrop-blur-sm flex flex-col justify-between hover:-translate-y-2 hover:border-indigo-500/50 transition-all group" style="animation-delay: {{ $loop->index * 0.15 }}s;">
                    @if($article->thumbnail)
                        <div class="aspect-video overflow-hidden bg-slate-200 dark:bg-slate-900">
                            <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                    @else
                        <div class="w-full h-48 bg-slate-200 dark:bg-slate-900/60 flex items-center justify-center text-slate-500">No Image</div>
                    @endif
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <span class="text-xs text-indigo-600 dark:text-indigo-400 font-medium">{{ $article->published_at?->format('d M Y') }}</span>
                            <h3 class="text-xl font-bold text-slate-900 dark:text-white mt-2 mb-3 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">{{ $article->title }}</h3>
                            <p class="text-slate-600 dark:text-slate-400 text-sm line-clamp-3">{{ $article->excerpt }}</p>
                        </div>
                        <div class="mt-6">
                            <a href="{{ route('articles.show', $article->slug) }}" wire:navigate class="inline-flex items-center text-sm font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-500">
                                Baca Selengkapnya &rarr;
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Services Section -->
    <section id="services" class="py-20 relative z-10">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-px bg-gradient-to-r from-transparent via-indigo-500 to-transparent opacity-40"></div>
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-indigo-50 dark:bg-indigo-500/10 border border-indigo-200 dark:border-indigo-500/20 text-indigo-600 dark:text-indigo-400 text-xs font-semibold uppercase tracking-wider mb-4">
                    Apa yang Saya Tawarkan
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white">Layanan</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($services ?? [] as $service)
                <div class="spotlight-card card-bounce bg-white dark:bg-slate-800/40 border border-slate-200 dark:border-slate-700/50 backdrop-blur-sm p-8 rounded-2xl shadow-sm dark:shadow-none hover:-translate-y-2 hover:border-indigo-400/50 transition-all duration-300 group flex flex-col justify-between" style="animation-delay: {{ $loop->index * 0.15 }}s;">
                    <div>
                        @if($service->icon)
                        <div class="w-14 h-14 bg-indigo-50 dark:bg-indigo-600/20 border border-indigo-200 dark:border-indigo-500/30 rounded-xl flex items-center justify-center text-indigo-600 dark:text-indigo-400 mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300 [&>svg]:w-7 [&>svg]:h-7 overflow-hidden">
                            {!! $service->icon !!}
                        </div>
                        @endif
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">{{ $service->title }}</h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                            {{ $service->description }}
                        </p>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-slate-500 py-8">
                    Belum ada layanan yang tersedia.
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 relative z-10">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-px bg-gradient-to-r from-transparent via-indigo-500 to-transparent opacity-40"></div>
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-indigo-50 dark:bg-indigo-500/10 border border-indigo-200 dark:border-indigo-500/20 text-indigo-600 dark:text-indigo-400 text-xs font-semibold uppercase tracking-wider mb-4">
                    Mari Terhubung
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white mb-4">Hubungi <span class="text-indigo-600 dark:text-indigo-500">Saya</span></h2>
                <p class="text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">Mari berdiskusi tentang infrastruktur IT, pengembangan sistem, atau peluang kerja sama.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Kartu Informasi Kontak & Sosial Media -->
                <div class="spotlight-card card-bounce bg-white dark:bg-slate-800/40 p-8 rounded-2xl border border-slate-200 dark:border-slate-700/50 shadow-sm dark:shadow-none backdrop-blur-sm flex flex-col justify-between hover:border-indigo-400/50 transition-all" style="animation-delay: 0.1s;">
                    <div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-6">Informasi Kontak</h3>
                        <div class="space-y-6 mb-8">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 border border-indigo-200 dark:border-indigo-500/20 shrink-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-slate-500 dark:text-slate-400">Email</p>
                                    <a href="mailto:prihandana99@gmail.com" class="font-medium text-slate-900 dark:text-white hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">prihandana99@gmail.com</a>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 border border-indigo-200 dark:border-indigo-500/20 shrink-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-slate-500 dark:text-slate-400">WhatsApp</p>
                                    <a href="https://wa.me/085886666212" target="_blank" class="font-medium text-slate-900 dark:text-white hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">+62 5886666212</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h4 class="text-sm font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-4">Temukan Saya di</h4>
                        <div class="flex flex-wrap gap-3">
                           <div class="flex flex-wrap gap-3">
    <!-- GitHub -->
    <a href="https://github.com/prihandanayogakusuma" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-900/60 border border-slate-300 dark:border-slate-700 text-slate-700 dark:text-slate-300 hover:text-white hover:bg-indigo-600 hover:border-indigo-600 transition-all" title="GitHub">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
    </a>
    
    <!-- LinkedIn -->
    <a href="https://www.linkedin.com/in/prihandana-kusuma-44ab5b1a4" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-900/60 border border-slate-300 dark:border-slate-700 text-slate-700 dark:text-slate-300 hover:text-white hover:bg-indigo-600 hover:border-indigo-600 transition-all" title="LinkedIn">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
    </a>

    <!-- Instagram -->
    <a href="https://www.instagram.com/prhndnygk?igsh=enI2Z2JrZThieDdt&utm_source=qr" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-900/60 border border-slate-300 dark:border-slate-700 text-slate-700 dark:text-slate-300 hover:text-white hover:bg-indigo-600 hover:border-indigo-600 transition-all" title="Instagram">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
    </a>

    <!-- Facebook -->
    <a href="https://www.facebook.com/share/19SDoAzbHx/?mibextid=wwXIfr" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-900/60 border border-slate-300 dark:border-slate-700 text-slate-700 dark:text-slate-300 hover:text-white hover:bg-indigo-600 hover:border-indigo-600 transition-all" title="Facebook">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
    </a>

    <!-- X (Twitter) -->
    <a href="https://x.com/prhndn21?s=21" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-900/60 border border-slate-300 dark:border-slate-700 text-slate-700 dark:text-slate-300 hover:text-white hover:bg-indigo-600 hover:border-indigo-600 transition-all" title="X">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
    </a>

    <!-- YouTube -->
    <a href="https://youtube.com/@clientzonefootball?si=gLSECo36aKdwulhl" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-900/60 border border-slate-300 dark:border-slate-700 text-slate-700 dark:text-slate-300 hover:text-white hover:bg-indigo-600 hover:border-indigo-600 transition-all" title="YouTube">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
    </a>
</div>
                        </div>
                    </div>
                </div>

                <!-- Form Kontak -->
                <div class="spotlight-card card-bounce bg-white dark:bg-slate-800/40 p-8 rounded-2xl border border-slate-200 dark:border-slate-700/50 shadow-sm dark:shadow-none backdrop-blur-sm hover:border-indigo-400/50 transition-all">
                    @if (session()->has('success'))
                        <div class="mb-6 p-4 bg-emerald-500/20 border border-emerald-500/30 text-emerald-400 rounded-lg text-sm">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="submitContact" class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Nama</label>
                            <input type="text" wire:model="name" class="w-full bg-slate-50 dark:bg-slate-900/50 border border-slate-300 dark:border-slate-600 rounded-lg px-4 py-3 text-slate-900 dark:text-white focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors" placeholder="Masukkan nama Anda">
                            @error('name') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Email</label>
                            <input type="email" wire:model="email" class="w-full bg-slate-50 dark:bg-slate-900/50 border border-slate-300 dark:border-slate-600 rounded-lg px-4 py-3 text-slate-900 dark:text-white focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors" placeholder="email@anda.com">
                            @error('email') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Pesan</label>
                            <textarea rows="4" wire:model="message" class="w-full bg-slate-50 dark:bg-slate-900/50 border border-slate-300 dark:border-slate-600 rounded-lg px-4 py-3 text-slate-900 dark:text-white focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors" placeholder="Tulis pesan Anda di sini..."></textarea>
                            @error('message') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" wire:loading.attr="disabled" class="btn-shine w-full bg-indigo-600 hover:bg-indigo-700 disabled:bg-indigo-400 text-white font-medium py-3 px-4 rounded-lg transition-colors shadow-lg shadow-indigo-500/30 flex items-center justify-center">
                            <span wire:loading.remove>Kirim Pesan</span>
                            <span wire:loading>Mengirim...</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>