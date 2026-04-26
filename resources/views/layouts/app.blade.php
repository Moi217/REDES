<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Plataforma Educativa')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-out',
                        'slide-up': 'slideUp 0.5s ease-out',
                        'slide-in-left': 'slideInLeft 0.3s ease-out',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        slideInLeft: {
                            '0%': { opacity: '0', transform: 'translateX(-20px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' },
                        },
                    },
                },
            },
        };
    </script>
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }
        .sidebar-link {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .sidebar-link:hover {
            transform: translateX(8px);
        }
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .btn-primary {
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.3);
        }
        .progress-bar {
            transition: width 1s ease-in-out;
        }
        .glow {
            animation: glow 2s ease-in-out infinite alternate;
        }
        @keyframes glow {
            from { box-shadow: 0 0 5px rgba(59, 130, 246, 0.5); }
            to { box-shadow: 0 0 20px rgba(59, 130, 246, 0.8); }
        }
        .glass {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-50 min-h-screen">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-72 bg-gradient-to-b from-slate-900 via-slate-800 to-slate-900 fixed h-full z-50 hidden md:block shadow-2xl">
            <!-- Logo -->
            <div class="p-6 border-b border-slate-700/50">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-graduation-cap text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-white text-xl font-bold">Redes</h1>
                        <p class="text-slate-400 text-xs">Plataforma Educativa</p>
                    </div>
                </div>
            </div>

            <!-- Menu -->
            <nav class="p-4 space-y-2">
                <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider px-4 mb-3">Menú</p>
                
                <a href="{{ route('home') }}" class="sidebar-link flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('home') ? 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow-lg' : 'text-slate-300 hover:bg-slate-800/50' }}">
                    <div class="w-10 h-10 rounded-lg flex items-center justify-center {{ request()->routeIs('home') ? 'bg-white/20' : 'bg-slate-700/50' }}">
                        <i class="fas fa-home"></i>
                    </div>
                    <span class="ml-3 font-medium">Inicio</span>
                    @if(request()->routeIs('home'))
                        <span class="ml-auto w-2 h-2 bg-white rounded-full animate-pulse"></span>
                    @endif
                </a>

                <a href="{{ route('contenido') }}" class="sidebar-link flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('contenido') ? 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow-lg' : 'text-slate-300 hover:bg-slate-800/50' }}">
                    <div class="w-10 h-10 rounded-lg flex items-center justify-center {{ request()->routeIs('contenido') ? 'bg-white/20' : 'bg-slate-700/50' }}">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <span class="ml-3 font-medium">Contenido</span>
                    @if(request()->routeIs('contenido'))
                        <span class="ml-auto w-2 h-2 bg-white rounded-full animate-pulse"></span>
                    @endif
                </a>

                <a href="{{ route('actividad') }}" class="sidebar-link flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('actividad*') ? 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow-lg' : 'text-slate-300 hover:bg-slate-800/50' }}">
                    <div class="w-10 h-10 rounded-lg flex items-center justify-center {{ request()->routeIs('actividad*') ? 'bg-white/20' : 'bg-slate-700/50' }}">
                        <i class="fas fa-pencil-alt"></i>
                    </div>
                    <span class="ml-3 font-medium">Actividad</span>
                    @if(request()->routeIs('actividad*'))
                        <span class="ml-auto w-2 h-2 bg-white rounded-full animate-pulse"></span>
                    @endif
                </a>

                <a href="{{ route('resultados') }}" class="sidebar-link flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('resultados') ? 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow-lg' : 'text-slate-300 hover:bg-slate-800/50' }}">
                    <div class="w-10 h-10 rounded-lg flex items-center justify-center {{ request()->routeIs('resultados') ? 'bg-white/20' : 'bg-slate-700/50' }}">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <span class="ml-3 font-medium">Resultados</span>
                    @if(request()->routeIs('resultados'))
                        <span class="ml-auto w-2 h-2 bg-white rounded-full animate-pulse"></span>
                    @endif
                </a>
            </nav>

            <!-- Footer sidebar -->
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-slate-700/50">
                <div class="bg-slate-800/50 rounded-xl p-4">
                    <p class="text-slate-400 text-xs text-center">
                        <i class="fas fa-network-wired mr-1"></i>Redes v1.0
                    </p>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="md:ml-72 flex-1">
            <!-- Mobile Header -->
            <header class="bg-white/80 backdrop-blur-lg shadow-sm p-4 flex justify-between items-center md:hidden sticky top-0 z-40">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-white"></i>
                    </div>
                    <h1 class="text-lg font-bold text-slate-800">Redes</h1>
                </div>
                <button id="mobile-menu-btn" class="w-10 h-10 bg-slate-100 rounded-lg flex items-center justify-center text-slate-600 hover:bg-slate-200 transition">
                    <i class="fas fa-bars"></i>
                </button>
            </header>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden hidden bg-white shadow-xl absolute w-full z-50 rounded-b-2xl">
                <nav class="p-4 space-y-2">
                    <a href="{{ route('home') }}" class="flex items-center px-4 py-3 rounded-xl text-slate-700 hover:bg-blue-50 transition">
                        <i class="fas fa-home w-6"></i>
                        <span class="ml-3">Inicio</span>
                    </a>
                    <a href="{{ route('contenido') }}" class="flex items-center px-4 py-3 rounded-xl text-slate-700 hover:bg-blue-50 transition">
                        <i class="fas fa-book-open w-6"></i>
                        <span class="ml-3">Contenido</span>
                    </a>
                    <a href="{{ route('actividad') }}" class="flex items-center px-4 py-3 rounded-xl text-slate-700 hover:bg-blue-50 transition">
                        <i class="fas fa-pencil-alt w-6"></i>
                        <span class="ml-3">Actividad</span>
                    </a>
                    <a href="{{ route('resultados') }}" class="flex items-center px-4 py-3 rounded-xl text-slate-700 hover:bg-blue-50 transition">
                        <i class="fas fa-chart-line w-6"></i>
                        <span class="ml-3">Resultados</span>
                    </a>
                </nav>
            </div>

            <!-- Content -->
            <main class="p-6 md:p-8">
                <div class="animate-fade-in">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script>
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuBtn?.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>