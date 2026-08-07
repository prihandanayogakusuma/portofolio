<div>
    <!-- Hero Section -->
    <section id="hero" class="py-20 lg:py-32 relative z-10">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="flex flex-col-reverse lg:flex-row items-center gap-12">
                <!-- Kolom Teks -->
                <div class="lg:w-1/2 flex flex-col justify-center text-center lg:text-left" data-aos="fade-right">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4">
                        Halo, Saya <span class="text-indigo-500">Prihandana Yoga Kusuma</span>
                    </h1>
                    <h2 class="text-xl md:text-2xl text-slate-300 font-medium mb-6">
                        IT Infrastructure & Developer
                    </h2>
                    <p class="text-slate-400 text-lg leading-relaxed mb-8">
                        Profesional IT dengan fokus pada pengelolaan infrastruktur jaringan, pemeliharaan server, serta pengembangan sistem Web untuk meningkatkan efisiensi operasional.
                    </p>
                    <div class="flex flex-wrap justify-center lg:justify-start gap-4">
                        <a href="#projects" class="px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-full font-medium transition-all shadow-lg shadow-indigo-500/30">
                            Lihat Proyek
                        </a>
                        <a href="{{ route('cv.download') }}" class="px-8 py-3 bg-slate-800 hover:bg-slate-700 border border-slate-700 text-white rounded-full font-medium transition-all">
                            Download CV
                        </a>
                        <a href="#contact" class="px-8 py-3 bg-slate-800 hover:bg-slate-700 border border-slate-700 text-white rounded-full font-medium transition-all">
                            Hubungi Saya
                        </a>
                    </div>
                </div>

                <!-- Kolom Foto -->
               <style>
@keyframes floatAnimation {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-10px);
    }
}

.floating-container {
    animation: floatAnimation 3s ease-in-out infinite;
}

.bounce-spin-img {
    transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.bounce-spin-img:hover {
    transform: scale(1.1) rotate(360deg);
}

@keyframes cardBounce {
    0% { transform: scale(0.3); opacity: 0; }
    50% { transform: scale(1.05); opacity: 1; }
    70% { transform: scale(0.95); }
    100% { transform: scale(1); opacity: 1; }
}

.card-bounce {
    animation: cardBounce 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55) forwards;
}
</style>

<div class="lg:w-1/2 flex justify-center" data-aos="fade-left">
    <div class="relative w-72 h-72 md:w-80 md:h-80 lg:w-96 lg:h-96 floating-container">
        <div class="absolute inset-0 bg-indigo-500 rounded-full blur-3xl opacity-20"></div>
        <img src="{{ asset('images/prihandana.png') }}" alt="Foto Profil" class="bounce-spin-img relative w-full h-full object-cover rounded-full border-4 border-slate-700 shadow-2xl cursor-pointer">
    </div>
</div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-20 relative z-10">
        <!-- Pembatas Glow -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-px bg-gradient-to-r from-transparent via-indigo-500 to-transparent opacity-40"></div>
        
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Keahlian & Kemampuan</h2>
                <div class="w-20 h-1 bg-indigo-500 mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($skills ?? [] as $skill)
                <div class="card-bounce bg-slate-800/40 border border-slate-700/50 backdrop-blur-sm p-6 rounded-2xl hover:-translate-y-1 transition-all duration-300" style="animation-delay: {{ $loop->index * 0.1 }}s;">
                    <div class="flex justify-between items-center mb-4">
                        <div class="flex items-center gap-3">
                            @if($skill->icon)
                            <div class="w-8 h-8 flex items-center justify-center text-white">
                                {!! $skill->icon !!}
                            </div>
                            @endif
                            <h3 class="text-lg font-semibold text-white">{{ $skill->name }}</h3>
                        </div>
                        <span class="text-indigo-400 font-medium">{{ $skill->proficiency_percentage }}%</span>
                    </div>
                    <div class="w-full bg-slate-700 rounded-full h-2.5">
                        <div class="bg-indigo-500 h-2.5 rounded-full transition-all duration-1000" style="width: {{ $skill->proficiency_percentage }}%"></div>
                    </div>
                    @if($skill->category)
                    <div class="mt-3 inline-block px-3 py-1 bg-slate-900/50 border border-slate-700 text-xs text-slate-400 rounded-full">
                        {{ $skill->category }}
                    </div>
                    @endif
                </div>
                @empty
                <div class="col-span-full text-center text-slate-500 py-8">
                    Data keahlian belum tersedia.
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Experience Section -->
    <section id="experience" class="py-20 relative z-10">
        <!-- Pembatas Glow -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-px bg-gradient-to-r from-transparent via-indigo-500 to-transparent opacity-40"></div>

        <div class="container mx-auto px-6 max-w-4xl">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Pengalaman Kerja</h2>
                <div class="w-20 h-1 bg-indigo-500 mx-auto rounded-full"></div>
            </div>

            <div class="space-y-8 relative before:absolute before:inset-0 before:left-7 sm:before:left-40 before:h-full before:w-px before:bg-slate-700">
                @forelse($experiences ?? [] as $experience)
                <div class="card-bounce relative flex flex-col sm:flex-row items-start gap-6 sm:gap-10 group" style="animation-delay: {{ $loop->index * 0.15 }}s;">
                    <div class="sm:w-32 pt-1 text-sm font-semibold text-indigo-400 shrink-0 pl-14 sm:pl-0 sm:text-right">
                        {{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }} - 
                        @if($experience->is_current)
                            Sekarang
                        @else
                            {{ \Carbon\Carbon::parse($experience->end_date)->format('M Y') }}
                        @endif
                    </div>
                    <div class="absolute left-7 sm:left-40 -translate-x-1/2 top-2 w-4 h-4 rounded-full bg-indigo-500 border-4 border-[#0f172a] z-10"></div>
                    <div class="flex-grow w-full bg-slate-800/40 border border-slate-700/50 backdrop-blur-sm p-6 rounded-2xl hover:bg-slate-800/60 transition-all ml-12 sm:ml-0">
                        <h3 class="text-xl font-bold text-white">{{ $experience->position }}</h3>
                        <div class="text-slate-300 font-medium mb-4">{{ $experience->company }}</div>
                        <div class="text-slate-400 text-sm leading-relaxed prose prose-invert max-w-none">
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

    <!-- Projects Section -->
    <section id="projects" class="py-20 bg-slate-800/20 relative z-10">
        <!-- Pembatas Glow -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-px bg-gradient-to-r from-transparent via-indigo-500 to-transparent opacity-40"></div>

        <div class="container mx-auto px-6 max-w-7xl">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Proyek Unggulan</h2>
                <div class="w-20 h-1 bg-indigo-500 mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($projects ?? [] as $project)
                <div class="card-bounce bg-slate-800/40 border border-slate-700/50 rounded-2xl overflow-hidden hover:-translate-y-2 transition-transform duration-300 group" style="animation-delay: {{ $loop->index * 0.15 }}s;">
                    <div class="aspect-video bg-slate-700 relative overflow-hidden">
                        @if($project->image)
                            <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-slate-500 bg-slate-800">
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
                        <h3 class="text-xl font-bold text-white mb-2">{{ $project->title }}</h3>
                        <p class="text-slate-400 text-sm mb-4 line-clamp-3">
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
        <!-- Pembatas Glow -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-px bg-gradient-to-r from-transparent via-indigo-500 to-transparent opacity-40"></div>

        <div class="container mx-auto px-6 max-w-7xl">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Artikel & <span class="text-indigo-500">Catatan IT</span></h2>
                <div class="w-20 h-1 bg-indigo-500 mx-auto rounded-full mb-4"></div>
                <a href="{{ route('articles.index') }}" class="inline-flex items-center text-sm font-medium text-indigo-400 hover:text-indigo-300 transition-colors">
                    Lihat Semua Artikel &rarr;
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($latestArticles as $article)
                <div class="card-bounce bg-slate-800/40 border border-slate-700/50 rounded-2xl overflow-hidden backdrop-blur-sm flex flex-col justify-between hover:border-indigo-500/50 transition-all group" style="animation-delay: {{ $loop->index * 0.15 }}s;">
                    @if($article->thumbnail)
                        <div class="aspect-video overflow-hidden bg-slate-900">
                            <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                    @else
                        <div class="w-full h-48 bg-slate-900/60 flex items-center justify-center text-slate-500">No Image</div>
                    @endif
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <span class="text-xs text-indigo-400 font-medium">{{ $article->published_at?->format('d M Y') }}</span>
                            <h3 class="text-xl font-bold text-white mt-2 mb-3 group-hover:text-indigo-400 transition-colors">{{ $article->title }}</h3>
                            <p class="text-slate-400 text-sm line-clamp-3">{{ $article->excerpt }}</p>
                        </div>
                        <div class="mt-6">
                            <a href="{{ route('articles.show', $article->slug) }}" class="inline-flex items-center text-sm font-medium text-indigo-400 hover:text-indigo-300">
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
        <!-- Pembatas Glow -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-px bg-gradient-to-r from-transparent via-indigo-500 to-transparent opacity-40"></div>

        <div class="container mx-auto px-6 max-w-7xl">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Layanan</h2>
                <div class="w-20 h-1 bg-indigo-500 mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($services ?? [] as $service)
                <div class="card-bounce bg-slate-800/40 border border-slate-700/50 backdrop-blur-sm p-8 rounded-2xl hover:-translate-y-2 transition-all duration-300 group flex flex-col justify-between" style="animation-delay: {{ $loop->index * 0.15 }}s;">
                    <div>
                        @if($service->icon)
                        <div class="w-14 h-14 bg-indigo-600/20 border border-indigo-500/30 rounded-xl flex items-center justify-center text-indigo-400 mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300 [&>svg]:w-7 [&>svg]:h-7 overflow-hidden">
                            {!! $service->icon !!}
                        </div>
                        @endif
                        <h3 class="text-xl font-bold text-white mb-3">{{ $service->title }}</h3>
                        <p class="text-slate-400 text-sm leading-relaxed">
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
        <!-- Pembatas Glow -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-px bg-gradient-to-r from-transparent via-indigo-500 to-transparent opacity-40"></div>

        <div class="container mx-auto px-6 max-w-7xl">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Hubungi <span class="text-indigo-500">Saya</span></h2>
                <div class="w-20 h-1 bg-indigo-500 mx-auto rounded-full"></div>
                <p class="text-slate-400 mt-6 max-w-2xl mx-auto">Mari berdiskusi tentang infrastruktur IT, pengembangan sistem, atau peluang kerja sama.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Kartu Informasi Kontak & Sosial Media -->
                <div class="card-bounce bg-slate-800/40 p-8 rounded-2xl border border-slate-700/50 backdrop-blur-sm flex flex-col justify-between" style="animation-delay: 0.1s;">
                    <div>
                        <h3 class="text-xl font-bold text-white mb-6">Informasi Kontak</h3>
                        <div class="space-y-6 mb-8">
                            <!-- Email -->
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 shrink-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-slate-400">Email</p>
                                    <p class="font-medium text-white">prihandana99@gmail.com</p>
                                </div>
                            </div>
                            <!-- WhatsApp -->
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 shrink-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-slate-400">WhatsApp</p>
                                    <p class="font-medium text-white">+62 5886666212</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tautan Sosial Media -->
                    <div>
                        <h4 class="text-sm font-semibold text-slate-300 uppercase tracking-wider mb-4">Temukan Saya di</h4>
                        <div class="flex flex-wrap gap-3">
                            <a href="https://github.com/username" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-lg bg-slate-900/60 border border-slate-700 text-slate-300 hover:text-white hover:bg-indigo-600 hover:border-indigo-600 transition-all" title="GitHub">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                            </a>
                            <a href="https://linkedin.com/in/username" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-lg bg-slate-900/60 border border-slate-700 text-slate-300 hover:text-white hover:bg-indigo-600 hover:border-indigo-600 transition-all" title="LinkedIn">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                            </a>
                            <a href="https://facebook.com/username" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-lg bg-slate-900/60 border border-slate-700 text-slate-300 hover:text-white hover:bg-indigo-600 hover:border-indigo-600 transition-all" title="Facebook">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8H6v4h3v12h5V12h3.642L18 8h-4V6.333C14 5.37 14.5 5 15.5 5H18V0h-3.808C10.559 0 9 1.587 9 4.722V8z"/></svg>
                            </a>
                            <a href="https://instagram.com/username" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-lg bg-slate-900/60 border border-slate-700 text-slate-300 hover:text-white hover:bg-indigo-600 hover:border-indigo-600 transition-all" title="Instagram">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Form Kontak -->
                <div class="card-bounce bg-slate-800/40 p-8 rounded-2xl border border-slate-700/50 backdrop-blur-sm" style="animation-delay: 0.25s;">
                    @if (session()->has('success'))
                        <div class="mb-6 p-4 bg-emerald-500/20 border border-emerald-500/30 text-emerald-400 rounded-lg text-sm">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="submitContact" class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-300 mb-2">Nama</label>
                            <input type="text" wire:model="name" class="w-full bg-slate-900/50 border border-slate-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors" placeholder="Masukkan nama Anda">
                            @error('name') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-300 mb-2">Email</label>
                            <input type="email" wire:model="email" class="w-full bg-slate-900/50 border border-slate-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors" placeholder="email@anda.com">
                            @error('email') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-300 mb-2">Pesan</label>
                            <textarea rows="4" wire:model="message" class="w-full bg-slate-900/50 border border-slate-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors" placeholder="Tulis pesan Anda di sini..."></textarea>
                            @error('message') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" wire:loading.attr="disabled" class="w-full bg-indigo-600 hover:bg-indigo-700 disabled:bg-indigo-400 text-white font-medium py-3 px-4 rounded-lg transition-colors shadow-lg shadow-indigo-500/30 flex items-center justify-center">
                            <span wire:loading.remove>Kirim Pesan</span>
                            <span wire:loading>Mengirim...</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>