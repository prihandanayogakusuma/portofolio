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

            /* Background blob mengambang */
            @keyframes blobMove1 {
                0%, 100% { transform: translate(0, 0) scale(1); }
                33% { transform: translate(40px, 60px) scale(1.1); }
                66% { transform: translate(-30px, 30px) scale(0.95); }
            }
            @keyframes blobMove2 {
                0%, 100% { transform: translate(0, 0) scale(1); }
                33% { transform: translate(-50px, -40px) scale(1.15); }
                66% { transform: translate(30px, -20px) scale(0.9); }
            }
            .blob-1 { animation: blobMove1 16s ease-in-out infinite; }
            .blob-2 { animation: blobMove2 18s ease-in-out infinite; }

            /* Efek spotlight mengikuti kursor di kartu */
            .spotlight-card { position: relative; isolation: isolate; }
            .spotlight-card::before {
                content: '';
                position: absolute;
                inset: 0;
                border-radius: inherit;
                background: radial-gradient(500px circle at var(--spot-x, 50%) var(--spot-y, 50%), rgba(99,102,241,0.15), transparent 60%);
                opacity: 0;
                transition: opacity 0.4s ease;
                pointer-events: none;
                z-index: 0;
            }
            .spotlight-card:hover::before { opacity: 1; }

            /* Efek kilau sapuan pada tombol utama */
            .btn-shine { position: relative; overflow: hidden; }
            .btn-shine::after {
                content: '';
                position: absolute;
                top: 0; left: -75%;
                width: 50%; height: 100%;
                background: linear-gradient(120deg, transparent, rgba(255,255,255,0.35), transparent);
                transform: skewX(-20deg);
                transition: left 0.6s ease;
            }
            .btn-shine:hover::after { left: 125%; }

            /* Kursor berkedip untuk efek mengetik */
            @keyframes caretBlink { 0%, 100% { opacity: 1; } 50% { opacity: 0; } }
            .typing-caret { animation: caretBlink 0.8s step-end infinite; }

            /* Cincin gradient berputar di foto profil */
            @keyframes spinSlow { to { transform: rotate(360deg); } }
            .spin-ring { animation: spinSlow 8s linear infinite; }
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

        <!-- Progress Bar Scroll -->
        <div id="scroll-progress" class="fixed top-0 left-0 h-1 bg-gradient-to-r from-indigo-500 via-purple-500 to-indigo-400 z-[60] transition-[width] duration-150 ease-out" style="width:0%"></div>

        <!-- Background Ornaments (Glassmorphism Effect Setup) -->
        <div class="fixed inset-0 z-[-1] overflow-hidden pointer-events-none">
            <div class="blob-1 absolute top-[-10%] left-[-10%] w-96 h-96 bg-indigo-600/20 rounded-full blur-3xl"></div>
            <div class="blob-2 absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-blue-600/20 rounded-full blur-3xl"></div>
            <div class="blob-1 absolute top-[40%] right-[15%] w-72 h-72 bg-purple-600/10 rounded-full blur-3xl" style="animation-delay: -8s;"></div>
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

        <!-- Progress Bar Scroll -->
        <script>
            (function () {
                const progressBar = document.getElementById('scroll-progress');
                function updateProgress() {
                    const docHeight = document.documentElement.scrollHeight - window.innerHeight;
                    const progress = docHeight > 0 ? (window.scrollY / docHeight) * 100 : 0;
                    if (progressBar) progressBar.style.width = progress + '%';
                }
                window.addEventListener('scroll', updateProgress, { passive: true });
                updateProgress();
            })();
        </script>

        <!-- Efek Spotlight Mengikuti Kursor di Kartu -->
        <script>
            document.addEventListener('mousemove', (e) => {
                const card = e.target.closest('.spotlight-card');
                if (!card) return;
                const rect = card.getBoundingClientRect();
                card.style.setProperty('--spot-x', (e.clientX - rect.left) + 'px');
                card.style.setProperty('--spot-y', (e.clientY - rect.top) + 'px');
            });
        </script>

    </body>
</html>