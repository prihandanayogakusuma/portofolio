<footer class="bg-[#0b0f19] border-t border-indigo-500/10 pt-24 pb-12 relative overflow-hidden z-10">
    <!-- Garis Cahaya & Efek Glow di Bagian Atas -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-px bg-gradient-to-r from-transparent via-indigo-500 to-transparent opacity-50"></div>
    <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-[600px] h-48 bg-indigo-600/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="container mx-auto px-6 max-w-7xl relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 mb-16">
            
            <!-- Kotak Branding Utama (Glassmorphism Card) -->
            <div class="lg:col-span-5 bg-slate-900/40 border border-slate-800 p-8 rounded-3xl backdrop-blur-md relative group hover:border-indigo-500/40 transition-all duration-500">
                <div class="absolute inset-0 bg-gradient-to-br from-indigo-600/5 to-transparent rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"></div>
                <a href="/" class="text-3xl font-extrabold text-white tracking-tight mb-4 inline-block">
                    Kus<span class="text-indigo-500">ByteVibe</span>
                </a>
                <p class="text-slate-400 text-sm leading-relaxed mb-8">
                    Menghadirkan arsitektur infrastruktur IT yang tangguh, otomatisasi proses tingkat lanjut, dan pengembangan web berkinerja tinggi.
                </p>
                <div class="inline-flex items-center gap-3 px-4 py-2 bg-indigo-500/10 border border-indigo-500/30 rounded-full text-indigo-400 text-xs font-semibold">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    Tersedia untuk Kolaborasi & Proyek Baru
                </div>
            </div>

            <!-- Tautan Navigasi & Aksi -->
            <div class="lg:col-span-7 grid grid-cols-2 sm:grid-cols-3 gap-8 content-center">
                <div>
                    <h4 class="text-white text-sm font-bold uppercase tracking-wider mb-6">Navigasi</h4>
                    <ul class="space-y-3">
                        <li><a href="#about" class="text-slate-400 hover:text-white transition-colors text-sm">Tentang</a></li>
                        <li><a href="#skills" class="text-slate-400 hover:text-indigo-400 transition-colors text-sm">Keahlian</a></li>
                        <li><a href="#services" class="text-slate-400 hover:text-indigo-400 transition-colors text-sm">Layanan</a></li>
                        <li><a href="#projects" class="text-slate-400 hover:text-indigo-400 transition-colors text-sm">Proyek</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white text-sm font-bold uppercase tracking-wider mb-6">Eksplorasi</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('articles.index') }}" class="text-slate-400 hover:text-indigo-400 transition-colors text-sm">Catatan IT</a></li>
                        <li><a href="{{ route('cv.download') }}" class="text-slate-400 hover:text-indigo-400 transition-colors text-sm">Unduh CV</a></li>
                        <li><a href="#contact" class="text-slate-400 hover:text-indigo-400 transition-colors text-sm">Kontak</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white text-sm font-bold uppercase tracking-wider mb-6">Hubungi</h4>
                    <a href="mailto:prihandana99@gmail.com" class="inline-flex items-center gap-2 px-4 py-2.5 bg-slate-800/80 hover:bg-indigo-600 border border-slate-700 text-slate-200 hover:text-white rounded-xl text-sm font-medium transition-all shadow-md">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        Kirim Email
                    </a>
                </div>
            </div>

        </div>

        <!-- Hak Cipta & Informasi Teknologi (Rata Tengah) -->
        <div class="border-t border-slate-800/80 pt-8 flex flex-col items-center justify-center text-center gap-2">
            <p class="text-slate-500 text-xs">
                &copy; {{ date('Y') }} KusByteVibe.
            </p>
        </div>
    </div>
</footer>