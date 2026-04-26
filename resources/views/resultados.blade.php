@extends('layouts.app')

@section('title', 'Resultados')

@section('content')
<div class="max-w-5xl mx-auto">
    <!-- Result Card -->
    <div class="bg-white rounded-2xl shadow-lg p-8 mb-8 text-center relative overflow-hidden">
        <div class="absolute top-0 left-0 w-32 h-32 bg-gradient-to-br from-blue-500/20 to-indigo-500/20 rounded-full -ml-16 -mt-16 blur-2xl"></div>
        <div class="absolute bottom-0 right-0 w-32 h-32 bg-gradient-to-br from-purple-500/20 to-pink-500/20 rounded-full -mr-16 -mb-16 blur-2xl"></div>
        
        <div class="relative z-10">
            <span class="bg-blue-100 text-blue-700 px-4 py-1 rounded-full text-sm font-medium">Resultados</span>
            <h1 class="text-3xl font-bold text-slate-800 mt-4 mb-6">Evaluación Completada</h1>
            
            @php
                $porcentaje = round(($puntuacion / $total) * 100);
            @endphp

            <div class="mb-8">
                @if($porcentaje >= 80)
                    <div class="w-28 h-28 bg-gradient-to-br from-green-400 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg animate-pulse-slow">
                        <i class="fas fa-trophy text-white text-4xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-green-600">¡Excelente!</h2>
                @elseif($porcentaje >= 60)
                    <div class="w-28 h-28 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i class="fas fa-star text-white text-4xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-yellow-600">¡Muy Bien!</h2>
                @else
                    <div class="w-28 h-28 bg-gradient-to-br from-red-400 to-red-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i class="fas fa-redo text-white text-4xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-red-600">¡Sigue Intentando!</h2>
                @endif
            </div>

            <div class="mb-6">
                <p class="text-slate-600 text-lg">Tu puntuación:</p>
                <p class="text-6xl font-bold text-slate-800">{{ $puntuacion }} <span class="text-2xl text-slate-400">/ {{ $total }}</span></p>
            </div>

            <div class="max-w-md mx-auto mb-6">
                <div class="w-full bg-slate-200 rounded-full h-4 mb-2">
                    <div class="progress-bar h-4 rounded-full bg-gradient-to-r {{ $porcentaje >= 80 ? 'from-green-400 to-green-600' : ($porcentaje >= 60 ? 'from-yellow-400 to-orange-500' : 'from-red-400 to-red-600') }}" 
                        style="width: {{ $porcentaje }}%">
                    </div>
                </div>
                <p class="text-slate-600">{{ $porcentaje }}% de respuestas correctas</p>
            </div>

            @if(isset($nombre))
            <p class="text-slate-500 mb-6">Estudiante: <strong class="text-slate-800">{{ $nombre }}</strong></p>
            @endif

            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('actividad') }}" class="btn-primary bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-xl font-bold hover:from-blue-700 hover:to-indigo-700 shadow-lg">
                    <i class="fas fa-redo mr-2"></i>Intentar de Nuevo
                </a>
                <a href="{{ route('contenido') }}" class="bg-slate-200 text-slate-700 px-6 py-3 rounded-xl font-bold hover:bg-slate-300 transition">
                    <i class="fas fa-book mr-2"></i>Revisar Contenido
                </a>
            </div>
        </div>
    </div>

    <!-- Revisión de respuestas -->
    @if(isset($respuestas) && !empty($respuestas))
    @php
        $respuestasArray = json_decode($respuestas, true);
        $preguntas = [
            1 => ['pregunta' => '¿Cuál es la topología donde todos los dispositivos están conectados a un cable central?', 'opciones' => ['a' => 'Estrella', 'b' => 'Bus', 'c' => 'Anillo', 'd' => 'Malla'], 'correcta' => 'b'],
            2 => ['pregunta' => '¿Qué topología ofrece mayor redundancia ante fallos?', 'opciones' => ['a' => 'Estrella', 'b' => 'Bus', 'c' => 'Malla', 'd' => 'Punto a punto'], 'correcta' => 'c'],
            3 => ['pregunta' => '¿Cuál es la función de un terminador en topología de bus?', 'opciones' => ['a' => 'Amplificar la señal', 'b' => 'Evitar reflejos de señal', 'c' => 'Conectar más dispositivos', 'd' => 'Enrutar paquetes'], 'correcta' => 'b'],
            4 => ['pregunta' => '¿Qué dispositivo conecta una red local a otra red diferente?', 'opciones' => ['a' => 'Switch', 'b' => 'Hub', 'c' => 'Router', 'd' => 'Terminador'], 'correcta' => 'c'],
            5 => ['pregunta' => '¿Qué topología combina características de varias topologías?', 'opciones' => ['a' => 'Doble anillo', 'b' => 'Árbol', 'c' => 'Híbrida', 'd' => 'Cadena'], 'correcta' => 'c'],
        ];
    @endphp
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8 animate-slide-up">
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-5">
            <h2 class="text-xl font-bold text-white">
                <i class="fas fa-check-double mr-2"></i>Revisión de Respuestas
            </h2>
        </div>
        
        <div class="p-6 space-y-4">
            @foreach($preguntas as $id => $preg)
                @php
                    $respuestaUsuario = $respuestasArray[$id] ?? '';
                    $esCorrecta = $respuestaUsuario === $preg['correcta'];
                @endphp
                <div class="border-2 rounded-xl p-4 {{ $esCorrecta ? 'border-green-300 bg-green-50' : 'border-red-300 bg-red-50' }}">
                    <div class="flex items-start">
                        <div class="w-8 h-8 rounded-lg flex items-center justify-center mr-3 {{ $esCorrecta ? 'bg-green-500' : 'bg-red-500' }}">
                            <i class="fas fa-{{ $esCorrecta ? 'check' : 'times' }} text-white"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-bold text-slate-800 mb-2">{{ $preg['pregunta'] }}</p>
                            <div class="space-y-1">
                                @foreach($preg['opciones'] as $letra => $texto)
                                    @php
                                        $clase = '';
                                        if ($letra === $preg['correcta']) {
                                            $clase = 'bg-green-500 text-white font-bold';
                                        } elseif ($letra === $respuestaUsuario && !$esCorrecta) {
                                            $clase = 'bg-red-500 text-white';
                                        } else {
                                            $clase = 'bg-slate-200 text-slate-600';
                                        }
                                    @endphp
                                    <div class="inline-block px-3 py-1 rounded-lg text-sm mr-2 mb-1 {{ $clase }}">
                                        {{ $letra }}) {{ $texto }}
                                    </div>
                                @endforeach
                            </div>
                            @if(!$esCorrecta)
                                <p class="mt-2 text-sm text-red-600">
                                    <i class="fas fa-times-circle mr-1"></i>
                                    Tu respuesta: {{ $respuestaUsuario ? $preg['opciones'][$respuestaUsuario] : 'Sin respuesta' }}
                                    <span class="font-bold ml-2">• Correcta: {{ $preg['opciones'][$preg['correcta']] }}</span>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- Tabla de resultados -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden animate-slide-up">
        <div class="bg-gradient-to-r from-slate-800 to-slate-900 px-8 py-5">
            <h2 class="text-xl font-bold text-white">
                <i class="fas fa-history mr-2"></i>Historial de Resultados
            </h2>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-slate-600 uppercase tracking-wider">
                            <i class="fas fa-user mr-1"></i>Estudiante
                        </th>
                        <th class="px-6 py-4 text-center text-xs font-bold text-slate-600 uppercase tracking-wider">
                            <i class="fas fa-star mr-1"></i>Puntaje
                        </th>
                        <th class="px-6 py-4 text-center text-xs font-bold text-slate-600 uppercase tracking-wider">
                            <i class="fas fa-percentage mr-1"></i>Porcentaje
                        </th>
                        <th class="px-6 py-4 text-center text-xs font-bold text-slate-600 uppercase tracking-wider">
                            <i class="fas fa-calendar mr-1"></i>Fecha
                        </th>
                        <th class="px-6 py-4 text-center text-xs font-bold text-slate-600 uppercase tracking-wider">
                            <i class="fas fa-info-circle mr-1"></i>Estado
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($todosResultados as $resultado)
                        @php
                            $porc = round(($resultado->puntaje / 5) * 100);
                            $badgeClass = $porc >= 80 ? 'bg-green-100 text-green-700' : ($porc >= 60 ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700');
                            $badgeIcon = $porc >= 80 ? 'trophy' : ($porc >= 60 ? 'star' : 'redo');
                            $badgeText = $porc >= 80 ? 'Excelente' : ($porc >= 60 ? 'Bien' : 'Revisar');
                        @endphp
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-indigo-600 rounded-xl flex items-center justify-center">
                                        <i class="fas fa-user text-white"></i>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-bold text-slate-800">{{ $resultado->estudiante->nombre }}</div>
                                        <div class="text-sm text-slate-500">{{ $resultado->estudiante->correo }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-2xl font-bold text-slate-800">{{ $resultado->puntaje }}</span>
                                <span class="text-slate-400">/5</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="w-20 mx-auto">
                                    <div class="w-full bg-slate-200 rounded-full h-2 mb-1">
                                        <div class="h-2 rounded-full bg-gradient-to-r {{ $porc >= 80 ? 'from-green-400 to-green-600' : ($porc >= 60 ? 'from-yellow-400 to-orange-500' : 'from-red-400 to-red-600') }}" 
                                            style="width: {{ $porc }}%"></div>
                                    </div>
                                    <span class="text-sm text-slate-600">{{ $porc }}%</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="text-sm text-slate-600">
                                    <i class="fas fa-calendar-day mr-1 text-slate-400"></i>
                                    {{ \Carbon\Carbon::parse($resultado->fecha)->format('d/m/Y') }}
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="px-4 py-2 inline-flex text-xs leading-5 font-bold rounded-xl {{ $badgeClass }}">
                                    <i class="fas fa-{{ $badgeIcon }} mr-1"></i>
                                    {{ $badgeText }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <div class="w-16 h-16 bg-slate-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-inbox text-3xl text-slate-300"></i>
                                </div>
                                <p class="text-slate-500">No hay resultados registrados</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection