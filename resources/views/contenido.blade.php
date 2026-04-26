@extends('layouts.app')

@section('title', 'Contenido - Topologías de Red')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="text-center mb-10">
        <span class="bg-blue-100 text-blue-700 px-4 py-1 rounded-full text-sm font-medium">Redes de Computadoras</span>
        <h1 class="text-4xl font-bold text-slate-800 mt-4">Topologías de Red</h1>
        <p class="text-slate-600 mt-2">Aprende sobre la estructura y configuración de las redes informáticas</p>
    </div>

    <!-- Introducción -->
    <section class="mb-12">
        <div class="bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-700 rounded-2xl p-8 text-white mb-8 shadow-2xl relative overflow-hidden">
            <div class="absolute top-0 right-0 w-40 h-40 bg-white/10 rounded-full -mr-20 -mt-20 blur-3xl"></div>
            <h2 class="text-2xl font-bold mb-4 relative z-10"><i class="fas fa-network-wired mr-2"></i>1. Introducción a la Arquitectura de Redes</h2>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div class="bg-white rounded-2xl shadow-lg p-6 card-hover">
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-question-circle text-blue-600 text-xl"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-800 mb-3">¿Qué es una Topología?</h3>
                <p class="text-slate-600">La topología de red describe la disposición física o lógica de los dispositivos en una red de computadoras.</p>
            </div>
            <div class="bg-white rounded-2xl shadow-lg p-6 card-hover">
                <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-layer-group text-indigo-600 text-xl"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-800 mb-3">Física vs Lógica</h3>
                <ul class="text-slate-600 space-y-2">
                    <li><strong class="text-slate-800">Física:</strong> Disposición real del cableado.</li>
                    <li><strong class="text-slate-800">Lógica:</strong> Cómo fluyen los datos.</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Tipos de Topologías -->
    <section class="mb-12">
        <div class="bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-700 rounded-2xl p-8 text-white mb-8 shadow-2xl">
            <h2 class="text-2xl font-bold mb-4"><i class="fas fa-sitemap mr-2"></i>2. Tipos de Topologías</h2>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b">
                    <h3 class="text-lg font-bold text-slate-800"><i class="fas fa-link text-blue-600 mr-2"></i>Punto a Punto</h3>
                </div>
                <div class="p-6">
                    <p class="text-slate-600 mb-4">Conexión directa entre dos dispositivos.</p>
                    <div class="space-y-3">
                        <div class="bg-green-50 border-l-4 border-green-500 p-3 rounded-r-lg">
                            <p class="text-sm"><strong class="text-green-700">Ventajas:</strong> Simple, económica.</p>
                        </div>
                        <div class="bg-red-50 border-l-4 border-red-500 p-3 rounded-r-lg">
                            <p class="text-sm"><strong class="text-red-700">Desventajas:</strong> Sin escalabilidad.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b">
                    <h3 class="text-lg font-bold text-slate-800"><i class="fas fa-bars text-blue-600 mr-2"></i>Bus</h3>
                </div>
                <div class="p-6">
                    <p class="text-slate-600 mb-4">Dispositivos conectados a cable central.</p>
                    <div class="space-y-3">
                        <div class="bg-green-50 border-l-4 border-green-500 p-3 rounded-r-lg">
                            <p class="text-sm"><strong class="text-green-700">Ventajas:</strong> Simple, bajo costo.</p>
                        </div>
                        <div class="bg-red-50 border-l-4 border-red-500 p-3 rounded-r-lg">
                            <p class="text-sm"><strong class="text-red-700">Desventajas:</strong> Un fallo corta todo.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b">
                    <h3 class="text-lg font-bold text-slate-800"><i class="fas fa-star text-blue-600 mr-2"></i>Estrella</h3>
                </div>
                <div class="p-6">
                    <p class="text-slate-600 mb-4">Dispositivos conectados a nodo central.</p>
                    <div class="space-y-3">
                        <div class="bg-green-50 border-l-4 border-green-500 p-3 rounded-r-lg">
                            <p class="text-sm"><strong class="text-green-700">Ventajas:</strong> Falla no afecta otros.</p>
                        </div>
                        <div class="bg-red-50 border-l-4 border-red-500 p-3 rounded-r-lg">
                            <p class="text-sm"><strong class="text-red-700">Desventajas:</strong> Si falla el central, cae todo.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b">
                    <h3 class="text-lg font-bold text-slate-800"><i class="fas fa-circle-notch text-blue-600 mr-2"></i>Anillo</h3>
                </div>
                <div class="p-6">
                    <p class="text-slate-600 mb-4">Dispositivos en ciclo cerrado.</p>
                    <div class="space-y-3">
                        <div class="bg-green-50 border-l-4 border-green-500 p-3 rounded-r-lg">
                            <p class="text-sm"><strong class="text-green-700">Ventajas:</strong> Predictible.</p>
                        </div>
                        <div class="bg-red-50 border-l-4 border-red-500 p-3 rounded-r-lg">
                            <p class="text-sm"><strong class="text-red-700">Desventajas:</strong> Rotura afecta todo.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b">
                    <h3 class="text-lg font-bold text-slate-800"><i class="fas fa-project-diagram text-blue-600 mr-2"></i>Malla</h3>
                </div>
                <div class="p-6">
                    <p class="text-slate-600 mb-4">Nodos conectados a múltiples nodos.</p>
                    <div class="space-y-3">
                        <div class="bg-green-50 border-l-4 border-green-500 p-3 rounded-r-lg">
                            <p class="text-sm"><strong class="text-green-700">Ventajas:</strong> Alta redundancia.</p>
                        </div>
                        <div class="bg-red-50 border-l-4 border-red-500 p-3 rounded-r-lg">
                            <p class="text-sm"><strong class="text-red-700">Desventajas:</strong> Muy costosa.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b">
                    <h3 class="text-lg font-bold text-slate-800"><i class="fas fa-puzzle-piece text-blue-600 mr-2"></i>Híbrida</h3>
                </div>
                <div class="p-6">
                    <p class="text-slate-600 mb-4">Combinación de topologías.</p>
                    <div class="space-y-3">
                        <div class="bg-green-50 border-l-4 border-green-500 p-3 rounded-r-lg">
                            <p class="text-sm"><strong class="text-green-700">Ventajas:</strong> Flexible.</p>
                        </div>
                        <div class="bg-red-50 border-l-4 border-red-500 p-3 rounded-r-lg">
                            <p class="text-sm"><strong class="text-red-700">Desventajas:</strong> Compleja.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-700 rounded-2xl p-6 text-white">
            <h3 class="text-lg font-bold text-white mb-4 text-center">Representación Visual de las Topologías</h3>
            <img src="{{ asset('images/topologias-de-red-1.jpg') }}" alt="Diagrama de topologías de red" class="w-full h-auto rounded-lg border-4 border-white/30">
        </div>
    </section>

    <!-- Cuadro Comparativo -->
    <section class="mb-12">
        <div class="bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-700 rounded-2xl p-8 text-white mb-8 shadow-2xl">
            <h2 class="text-2xl font-bold mb-4"><i class="fas fa-table mr-2"></i>3. Cuadro Comparativo</h2>
        </div>

        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-slate-800 to-slate-900 text-white">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-bold">Topología</th>
                            <th class="px-6 py-4 text-center text-sm font-bold">Costo</th>
                            <th class="px-6 py-4 text-center text-sm font-bold">Escalabilidad</th>
                            <th class="px-6 py-4 text-center text-sm font-bold">Fiabilidad</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 font-medium text-slate-800">Estrella</td>
                            <td class="px-6 py-4 text-center"><span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">Medio</span></td>
                            <td class="px-6 py-4 text-center"><span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">Alta</span></td>
                            <td class="px-6 py-4 text-center"><span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">Media</span></td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 font-medium text-slate-800">Malla</td>
                            <td class="px-6 py-4 text-center"><span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">Alto</span></td>
                            <td class="px-6 py-4 text-center"><span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">Alta</span></td>
                            <td class="px-6 py-4 text-center"><span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">Muy Alta</span></td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 font-medium text-slate-800">Bus</td>
                            <td class="px-6 py-4 text-center"><span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">Bajo</span></td>
                            <td class="px-6 py-4 text-center"><span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">Media</span></td>
                            <td class="px-6 py-4 text-center"><span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">Baja</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Hardware de Red -->
    <section class="mb-12">
        <div class="bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-700 rounded-2xl p-8 text-white mb-8 shadow-2xl">
            <h2 class="text-2xl font-bold mb-4"><i class="fas fa-server mr-2"></i>4. Hardware de Red</h2>
        </div>

        <div class="grid md:grid-cols-4 gap-6">
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center card-hover">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <i class="fas fa-random text-white text-2xl"></i>
                </div>
                <h3 class="font-bold text-slate-800 mb-2">Switch</h3>
                <p class="text-slate-600 text-sm">Conecta equipos en LAN</p>
            </div>
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center card-hover">
                <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <i class="fas fa-route text-white text-2xl"></i>
                </div>
                <h3 class="font-bold text-slate-800 mb-2">Router</h3>
                <p class="text-slate-600 text-sm">Conecta redes diferentes</p>
            </div>
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center card-hover">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <i class="fas fa-wifi text-white text-2xl"></i>
                </div>
                <h3 class="font-bold text-slate-800 mb-2">WAP</h3>
                <p class="text-slate-600 text-sm">Punto WiFi</p>
            </div>
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center card-hover">
                <div class="w-16 h-16 bg-gradient-to-br from-orange-400 to-orange-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <i class="fas fa-ban text-white text-2xl"></i>
                </div>
                <h3 class="font-bold text-slate-800 mb-2">Terminador</h3>
                <p class="text-slate-600 text-sm">Evita reflejos</p>
            </div>
        </div>
    </section>

    <!-- Conclusión -->
    <section class="mb-8">
        <div class="bg-white rounded-2xl shadow-lg p-8 border-l-4 border-blue-600">
            <h2 class="text-2xl font-bold text-slate-800 mb-4"><i class="fas fa-check-circle text-blue-600 mr-2"></i>5. Conclusión</h2>
            <p class="text-slate-600">La topología <strong class="text-blue-600">estrella</strong> es la más utilizada por su equilibrio entre costo y confiabilidad.</p>
        </div>
    </section>

    <!-- CTA -->
    <div class="text-center space-y-4">
        <a href="{{ route('actividad') }}" class="btn-primary inline-flex items-center bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-8 py-4 rounded-xl font-bold hover:from-blue-700 hover:to-indigo-700 shadow-lg">
            <i class="fas fa-pencil-alt mr-2"></i>Ir a la Actividad
        </a>
        <br>
        <a href="{{ route('practica') }}" class="btn-primary inline-flex items-center bg-gradient-to-r from-green-600 to-emerald-600 text-white px-8 py-4 rounded-xl font-bold hover:from-green-700 hover:to-emerald-700 shadow-lg">
            <i class="fas fa-laptop-code mr-2"></i>Ir a la Práctica
        </a>
    </div>
</div>
@endsection