@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div class="max-w-5xl mx-auto">
    <!-- Hero Section -->
    <div class="bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-700 rounded-3xl p-8 md:p-12 text-white mb-8 shadow-2xl relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -mr-16 -mt-16 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-purple-500/20 rounded-full -ml-12 -mb-12 blur-3xl"></div>
        
        <div class="relative z-10">
            <div class="flex items-center space-x-2 mb-4">
                <span class="bg-white/20 px-3 py-1 rounded-full text-sm font-medium">
                    <i class="fas fa-rocket mr-1"></i>Bienvenido
                </span>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold mb-4 animate-slide-up">Aprende Topologías de Red</h1>
            <p class="text-blue-100 text-lg md:text-xl mb-8 max-w-2xl animate-slide-up" style="animation-delay: 0.1s">
                Domina los conceptos fundamentales de redes de computadoras con nuestro contenido interactivo y cuestionarios prácticos.
            </p>
            <div class="flex flex-wrap gap-4 animate-slide-up" style="animation-delay: 0.2s">
                <a href="{{ route('contenido') }}" class="btn-primary bg-white text-blue-600 px-8 py-4 rounded-xl font-bold hover:bg-blue-50 shadow-lg">
                    <i class="fas fa-play mr-2"></i>Comenzar Ahora
                </a>
                <a href="{{ route('actividad') }}" class="bg-white/10 text-white px-8 py-4 rounded-xl font-bold hover:bg-white/20 transition backdrop-blur">
                    <i class="fas fa-pencil-alt mr-2"></i>Tomar Quiz
                </a>
            </div>
</div>
    </div>

    <!-- Video Introductorio -->
    <div class="bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-700 rounded-3xl p-6 md:p-8 mb-8 shadow-2xl">
        <h2 class="text-2xl font-bold text-white mb-4 text-center">
            <i class="fas fa-video mr-2"></i>Introducción a las Topologías de Red
        </h2>
        <div class="relative w-full" style="padding-bottom: 56.25%;">
            <iframe 
                class="absolute top-0 left-0 w-full h-full rounded-xl"
                src="https://www.youtube.com/embed/BI_AcCJpWeY" 
                title="Video de Topologías de Red" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
            </iframe>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-2xl p-6 shadow-lg card-hover animate-slide-up" style="animation-delay: 0.1s">
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mb-3">
                <i class="fas fa-book text-blue-600 text-xl"></i>
            </div>
            <p class="text-3xl font-bold text-slate-800">9</p>
            <p class="text-slate-500 text-sm">Temas</p>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-lg card-hover animate-slide-up" style="animation-delay: 0.15s">
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mb-3">
                <i class="fas fa-question-circle text-green-600 text-xl"></i>
            </div>
            <p class="text-3xl font-bold text-slate-800">5</p>
            <p class="text-slate-500 text-sm">Preguntas</p>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-lg card-hover animate-slide-up" style="animation-delay: 0.2s">
            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center mb-3">
                <i class="fas fa-users text-purple-600 text-xl"></i>
            </div>
            <p class="text-3xl font-bold text-slate-800">0</p>
            <p class="text-slate-500 text-sm">Estudiantes</p>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-lg card-hover animate-slide-up" style="animation-delay: 0.25s">
            <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center mb-3">
                <i class="fas fa-check-circle text-orange-600 text-xl"></i>
            </div>
            <p class="text-3xl font-bold text-slate-800">0</p>
            <p class="text-slate-500 text-sm">Intentos</p>
        </div>
    </div>

    <!-- Features -->
    <h2 class="text-2xl font-bold text-slate-800 mb-6">
        <i class="fas fa-star text-blue-600 mr-2"></i>¿Qué aprenderás?
    </h2>
    
    <div class="grid md:grid-cols-3 gap-6">
        <div class="bg-white rounded-2xl p-8 shadow-lg card-hover border-t-4 border-blue-500 animate-slide-up" style="animation-delay: 0.1s">
            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-4 shadow-lg">
                <i class="fas fa-network-wired text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-slate-800 mb-3">Topologías de Red</h3>
            <p class="text-slate-600">Aprende las diferentes configuraciones de red: bus, estrella, anillo, malla y más.</p>
        </div>

        <div class="bg-white rounded-2xl p-8 shadow-lg card-hover border-t-4 border-green-500 animate-slide-up" style="animation-delay: 0.2s">
            <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-4 shadow-lg">
                <i class="fas fa-server text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-slate-800 mb-3">Hardware de Red</h3>
            <p class="text-slate-600">Conoce los dispositivos esenciales: switches, routers, puntos de acceso y más.</p>
        </div>

        <div class="bg-white rounded-2xl p-8 shadow-lg card-hover border-t-4 border-purple-500 animate-slide-up" style="animation-delay: 0.3s">
            <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-4 shadow-lg">
                <i class="fas fa-trophy text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-slate-800 mb-3">Evaluación</h3>
            <p class="text-slate-600">Pon a prueba tus conocimientos con cuestionarios interactivos y recibe retroalimentación.</p>
        </div>
    </div>

    <!-- CTA -->
    <div class="mt-12 bg-gradient-to-r from-slate-800 to-slate-900 rounded-2xl p-8 text-center shadow-2xl">
        <h3 class="text-2xl font-bold text-white mb-4">¿Listo para aprender?</h3>
        <p class="text-slate-300 mb-6">Comienza ahora y domina las topologías de red</p>
        <a href="{{ route('contenido') }}" class="btn-primary inline-flex items-center bg-blue-600 text-white px-8 py-4 rounded-xl font-bold hover:bg-blue-700 shadow-lg">
            <i class="fas fa-arrow-right mr-2"></i>Ir al Contenido
        </a>
    </div>
</div>
@endsection