@extends('layouts.app')

@section('title', 'Práctica - Packet Tracer')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="text-center mb-10">
        <span class="bg-green-100 text-green-700 px-4 py-1 rounded-full text-sm font-medium">Práctica</span>
        <h1 class="text-4xl font-bold text-slate-800 mt-4">Actividad Práctica</h1>
        <p class="text-slate-600 mt-2">Ahora desarrollaremos una de las siguientes topologías</p>
    </div>

    <div class="bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-700 rounded-2xl p-8 text-white mb-8 shadow-2xl">
        <h2 class="text-2xl font-bold mb-4"><i class="fas fa-network-wired mr-2"></i>Topologías Disponibles</h2>
        <p class="text-lg">Selecciona una topología para practicar en Packet Tracer</p>
    </div>

    <div class="grid md:grid-cols-2 gap-6 mb-10">
        <div onclick="seleccionarTopologia('estrella', this)" class="topologia-card bg-white rounded-2xl shadow-lg p-6 card-hover cursor-pointer border-4 border-transparent transition-all">
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mb-4">
                <i class="fas fa-star text-green-600 text-xl"></i>
            </div>
            <h3 class="text-lg font-bold text-slate-800 mb-3">Topología Estrella</h3>
            <p class="text-slate-600 text-sm">Todos los dispositivos conectados a un switch central.</p>
        </div>
        <div onclick="seleccionarTopologia('bus', this)" class="topologia-card bg-white rounded-2xl shadow-lg p-6 card-hover cursor-pointer border-4 border-transparent transition-all">
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mb-4">
                <i class="fas fa-bars text-blue-600 text-xl"></i>
            </div>
            <h3 class="text-lg font-bold text-slate-800 mb-3">Topología Bus</h3>
            <p class="text-slate-600 text-sm">Todos los dispositivos conectados a un cable central.</p>
        </div>
        <div onclick="seleccionarTopologia('malla', this)" class="topologia-card bg-white rounded-2xl shadow-lg p-6 card-hover cursor-pointer border-4 border-transparent transition-all">
            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center mb-4">
                <i class="fas fa-project-diagram text-purple-600 text-xl"></i>
            </div>
            <h3 class="text-lg font-bold text-slate-800 mb-3">Topología Malla</h3>
            <p class="text-slate-600 text-sm">Cada dispositivo conectado a múltiples nodos.</p>
        </div>
        <div onclick="seleccionarTopologia('anillo', this)" class="topologia-card bg-white rounded-2xl shadow-lg p-6 card-hover cursor-pointer border-4 border-transparent transition-all">
            <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center mb-4">
                <i class="fas fa-circle-notch text-orange-600 text-xl"></i>
            </div>
            <h3 class="text-lg font-bold text-slate-800 mb-3">Topología Anillo</h3>
            <p class="text-slate-600 text-sm">Dispositivos conectados en un ciclo cerrado.</p>
        </div>
    </div>

    <div class="text-center mb-8">
        <button onclick="abrirPacketTracer()" class="btn-primary inline-flex items-center bg-gradient-to-r from-green-600 to-emerald-600 text-white px-10 py-5 rounded-xl font-bold text-xl hover:from-green-700 hover:to-emerald-700 shadow-lg transform hover:scale-105 transition-all disabled:opacity-50 disabled:cursor-not-allowed" id="btn-empezemos" disabled>
            <i class="fas fa-play mr-3"></i>Empezemos
        </button>
    </div>

    <p id="selecciona-msg" class="text-center text-slate-500 mb-6">Selecciona una topología para continuar</p>

    <!-- Modal Packet Tracer -->
    <div id="modal-packettracer" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden flex items-center justify-center">
        <div class="bg-white rounded-3xl shadow-2xl p-8 max-w-lg w-full mx-4 transform animate-slide-up">
            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-desktop text-white text-3xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-slate-800 mb-4">Buscar Packet Tracer</h2>
                <p class="text-slate-600 mb-6">Busca Packet Tracer en tu computadora.¿No aparece?</p>
                
                <div class="space-y-3">
                    <a href="https://www.netacad.com/portal/learning/packet-tracer" target="_blank" class="block w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-4 rounded-xl font-bold hover:from-blue-700 hover:to-indigo-700 transition">
                        <i class="fas fa-download mr-2"></i>Descargar Packet Tracer
                    </a>
                    <button onclick="cerrarModal()" class="block w-full bg-slate-100 text-slate-700 px-6 py-4 rounded-xl font-bold hover:bg-slate-200 transition">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-10">
        <a href="{{ route('contenido') }}" class="text-blue-600 hover:text-blue-800 font-medium">
            <i class="fas fa-arrow-left mr-2"></i>Volver al Contenido
        </a>
    </div>
</div>

<script>
    let topologiaSeleccionada = null;

    function seleccionarTopologia(tipo, elemento) {
        topologiaSeleccionada = tipo;
        
        document.querySelectorAll('.topologia-card').forEach(card => {
            card.classList.remove('border-blue-600', 'bg-blue-50');
            card.classList.add('border-transparent');
        });
        
        elemento.classList.remove('border-transparent');
        elemento.classList.add('border-blue-600', 'bg-blue-50');
        
        document.getElementById('btn-empezemos').disabled = false;
        document.getElementById('selecciona-msg').classList.add('hidden');
    }

    function abrirPacketTracer() {
        document.getElementById('modal-packettracer').classList.remove('hidden');
        window.location.href = 'packettracer://';
    }

    function cerrarModal() {
        document.getElementById('modal-packettracer').classList.add('hidden');
    }

    document.getElementById('modal-packettracer').addEventListener('click', function(e) {
        if (e.target === this) {
            cerrarModal();
        }
    });
</script>
@endsection