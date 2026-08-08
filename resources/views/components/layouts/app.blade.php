<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="view-transition" content="same-origin">
        <title>{{ $title ?? 'Portfolio - IT Infrastructure & Developer' }}</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        
        <!-- AOS CSS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <style>
            /* Animasi Bouncing Card */
            @keyframes cardBounce {
                0% { transform: scale(0.3); opacity: 0; }
                50% { transform: scale(1.05); opacity: 1; }
                70% { transform: scale(0.95); }
                100% { transform: scale(1); }
            }

            .card-bounce {
                animation: cardBounce 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55) forwards;
            }
        </style>

        <!-- Script Pencegah Kedipan Tema -->
        <script>
            if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        </script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="bg-white dark:bg-[#0f172a] text-slate-900 dark:text-slate-200 font-['Inter'] antialiased selection:bg-indigo-500 selection:text-white transition-colors duration-300">
        
        <!-- Background Ornaments (Glassmorphism Effect Setup) -->
        <div class="fixed inset-0 z-[-1] overflow-hidden pointer-events-none">
            <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-indigo-600/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-blue-600/20 rounded-full blur-3xl"></div>
        </div>

        <!-- Navbar Component -->
        <livewire:components.navbar />

        <main>
            {{ $slot }}
        </main>

        <!-- Footer Component -->
        <livewire:components.footer />

        @livewireScripts
        
        <!-- Alpine Store untuk Dark Mode -->
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.store('darkMode', {
                    on: document.documentElement.classList.contains('dark'),
                    toggle() {
                        this.on = !this.on;
                        if (this.on) {
                            document.documentElement.classList.add('dark');
                            localStorage.theme = 'dark';
                        } else {
                            document.documentElement.classList.remove('dark');
                            localStorage.theme = 'light';
                        }
                    }
                });
            });
        </script>

        <!-- AOS JS -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init({
                once: true,
                offset: 50,
            });
        </script>
    </body>
</html>