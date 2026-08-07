<nav x-data="{ open: false }" class="fixed w-full z-50 top-0 transition-all duration-300 backdrop-blur-md bg-[#0f172a]/70 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ url('/') }}" class="text-2xl font-bold text-white tracking-tighter">
                    Kus<span class="text-indigo-500">ByteVibe</span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ url('/#hero') }}" class="text-slate-300 hover:text-white transition-colors text-sm font-medium">Tentang</a>
                <a href="{{ url('/#skills') }}" class="text-slate-300 hover:text-white transition-colors text-sm font-medium">Keahlian</a>
                <a href="{{ url('/#services') }}" class="text-slate-300 hover:text-white transition-colors text-sm font-medium">Layanan</a>
                <a href="{{ url('/#projects') }}" class="text-slate-300 hover:text-white transition-colors text-sm font-medium">Proyek</a>
                <a href="{{ url('/#experience') }}" class="text-slate-300 hover:text-white transition-colors text-sm font-medium">Pengalaman</a>
                <a href="{{ route('articles.index') }}" class="text-slate-300 hover:text-white transition-colors text-sm font-medium">Artikel</a>
                <a href="{{ url('/#contact') }}" class="px-5 py-2 rounded-full bg-indigo-600/10 text-indigo-400 border border-indigo-500/30 hover:bg-indigo-600 hover:text-white transition-all text-sm font-medium">
                    Hubungi Saya
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
                <button type="button" 
                        @click="open = !open" 
                        class="text-slate-300 hover:text-white focus:outline-none p-2 relative z-50 cursor-pointer w-10 h-10 flex items-center justify-center"
                        aria-label="Toggle Menu">
                    <!-- Ikon Hamburger (Garis 3) -->
                    <svg class="h-6 w-6 transition-all duration-300 absolute" 
                         x-show="!open"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor"
                         x-transition:enter="transition ease-out duration-300 transform"
                         x-transition:enter-start="opacity-0 rotate-90 scale-0"
                         x-transition:enter-end="opacity-100 rotate-0 scale-100"
                         x-transition:leave="transition ease-in duration-200 transform"
                         x-transition:leave-start="opacity-100 rotate-0 scale-100"
                         x-transition:leave-end="opacity-0 rotate-90 scale-0">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <!-- Ikon X (Close) -->
                    <svg class="h-6 w-6 transition-all duration-300 absolute" 
                         x-show="open"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor"
                         x-transition:enter="transition ease-out duration-300 transform"
                         x-transition:enter-start="opacity-0 -rotate-90 scale-0"
                         x-transition:enter-end="opacity-100 rotate-0 scale-100"
                         x-transition:leave="transition ease-in duration-200 transform"
                         x-transition:leave-start="opacity-100 rotate-0 scale-100"
                         x-transition:leave-end="opacity-0 rotate-90 scale-0">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Dropdown -->
    <div id="mobile-menu" 
         class="md:hidden absolute top-20 left-0 w-full bg-[#0f172a]/95 backdrop-blur-xl border-b border-slate-800 px-6 py-6 space-y-3 shadow-2xl z-40 overflow-hidden"
         x-show="open"
         x-transition:enter="transition-all duration-500 ease-out"
         x-transition:enter-start="max-h-0 opacity-0 -translate-y-5"
         x-transition:enter-end="max-h-[500px] opacity-100 translate-y-0"
         x-transition:leave="transition-all duration-400 ease-in"
         x-transition:leave-start="max-h-[500px] opacity-100 translate-y-0"
         x-transition:leave-end="max-h-0 opacity-0 -translate-y-5"
         @click.outside="open = false">
         
        <a href="{{ url('/#hero') }}" @click="open = false" class="block text-slate-300 hover:text-indigo-400 hover:bg-slate-800/60 hover:translate-x-2 px-4 py-2.5 rounded-xl transition-all duration-300 text-base font-medium">Tentang</a>
        <a href="{{ url('/#skills') }}" @click="open = false" class="block text-slate-300 hover:text-indigo-400 hover:bg-slate-800/60 hover:translate-x-2 px-4 py-2.5 rounded-xl transition-all duration-300 text-base font-medium">Keahlian</a>
        <a href="{{ url('/#services') }}" @click="open = false" class="block text-slate-300 hover:text-indigo-400 hover:bg-slate-800/60 hover:translate-x-2 px-4 py-2.5 rounded-xl transition-all duration-300 text-base font-medium">Layanan</a>
        <a href="{{ url('/#projects') }}" @click="open = false" class="block text-slate-300 hover:text-indigo-400 hover:bg-slate-800/60 hover:translate-x-2 px-4 py-2.5 rounded-xl transition-all duration-300 text-base font-medium">Proyek</a>
        <a href="{{ url('/#experience') }}" @click="open = false" class="block text-slate-300 hover:text-indigo-400 hover:bg-slate-800/60 hover:translate-x-2 px-4 py-2.5 rounded-xl transition-all duration-300 text-base font-medium">Pengalaman</a>
        <a href="{{ route('articles.index') }}" @click="open = false" class="block text-slate-300 hover:text-indigo-400 hover:bg-slate-800/60 hover:translate-x-2 px-4 py-2.5 rounded-xl transition-all duration-300 text-base font-medium">Artikel</a>
        <div class="pt-2">
            <a href="{{ url('/#contact') }}" @click="open = false" class="block text-center px-5 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white transition-all duration-300 text-sm font-medium shadow-lg shadow-indigo-500/30">
                Hubungi Saya
            </a>
        </div>
    </div>
</nav>