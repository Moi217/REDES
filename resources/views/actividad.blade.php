@extends('layouts.app')

@section('title', 'Actividad - Topologías de Red')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="text-center mb-8">
        <span class="bg-blue-100 text-blue-700 px-4 py-1 rounded-full text-sm font-medium">Cuestionario</span>
        <h1 class="text-3xl font-bold text-slate-800 mt-4">Topologías de Red</h1>
        <p class="text-slate-600">Pon a prueba tus conocimientos</p>
    </div>

    <!-- Formulario inicial -->
    @if(!isset($nombre) || $nombre == 'Estudiante')
    <div id="form-inicio" class="bg-white rounded-2xl shadow-lg p-8 animate-slide-up">
        <div class="text-center mb-6">
            <div class="w-20 h-20 bg-gradient-to-br from-blue-400 to-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                <i class="fas fa-user-graduate text-white text-3xl"></i>
            </div>
            <h2 class="text-xl font-bold text-slate-800">Antes de comenzar</h2>
            <p class="text-slate-600">Por favor ingresa tu nombre</p>
        </div>
        
        <form id="form-nombre" class="space-y-4">
            <div>
                <label for="nombre" class="block text-sm font-medium text-slate-700 mb-2">Nombre del estudiante</label>
                <input type="text" id="nombre" name="nombre" required 
                    class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-slate-50"
                    placeholder="Ej: Juan Pérez" autocomplete="off">
            </div>
            <button type="submit" class="btn-primary w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-4 rounded-xl font-bold hover:from-blue-700 hover:to-indigo-700 shadow-lg">
                <i class="fas fa-play mr-2"></i>Comenzar Cuestionario
            </button>
        </form>
    </div>
    @endif

    <!-- Quiz interactivo -->
    <div id="quiz-container" class="{{ isset($nombre) && $nombre != 'Estudiante' ? '' : 'hidden' }}">
        <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">
            <div class="flex justify-between items-center mb-4">
                <span class="text-sm font-medium text-slate-500">Pregunta <span id="pregunta-actual" class="text-blue-600 font-bold">1</span> de 5</span>
                <span class="text-sm font-bold text-blue-600" id="progreso-texto">20%</span>
            </div>
            <div class="w-full bg-slate-200 rounded-full h-3 overflow-hidden">
                <div id="barra-progreso" class="progress-bar bg-gradient-to-r from-blue-500 to-indigo-600 h-3 rounded-full" style="width: 20%"></div>
            </div>
        </div>

        <form id="quiz-form">
            <input type="hidden" id="nombre-estudiante" name="nombre" value="{{ $nombre ?? '' }}">
            
            <div id="preguntas-wrapper" class="space-y-4">
                <!-- Las preguntas se generan dinámicamente con JavaScript -->
            </div>

            <div class="mt-6 flex justify-between">
                <button type="button" id="btn-anterior" class="bg-slate-200 text-slate-700 px-6 py-3 rounded-xl font-semibold hover:bg-slate-300 transition hidden">
                    <i class="fas fa-arrow-left mr-2"></i>Anterior
                </button>
                <button type="button" id="btn-siguiente" class="btn-primary bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-8 py-3 rounded-xl font-semibold hover:from-blue-700 hover:to-indigo-700 shadow-lg ml-auto">
                    Siguiente<i class="fas fa-arrow-right ml-2"></i>
                </button>
                <button type="submit" id="btn-enviar" class="btn-primary bg-gradient-to-r from-green-500 to-emerald-600 text-white px-8 py-3 rounded-xl font-semibold hover:from-green-600 hover:to-emerald-700 shadow-lg hidden">
                    <i class="fas fa-check mr-2"></i>Ver Resultados
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Datos de preguntas con respuestas correctas
    const preguntasData = [
        {
            id: 1,
            pregunta: '¿Cuál es la topología donde todos los dispositivos están conectados a un cable central?',
            opciones: [
                { letra: 'a', texto: 'Estrella' },
                { letra: 'b', texto: 'Bus' },
                { letra: 'c', texto: 'Anillo' },
                { letra: 'd', texto: 'Malla' }
            ],
            correcta: 'b'
        },
        {
            id: 2,
            pregunta: '¿Qué topología ofrece mayor redundancia ante fallos?',
            opciones: [
                { letra: 'a', texto: 'Estrella' },
                { letra: 'b', texto: 'Bus' },
                { letra: 'c', texto: 'Malla' },
                { letra: 'd', texto: 'Punto a punto' }
            ],
            correcta: 'c'
        },
        {
            id: 3,
            pregunta: '¿Cuál es la función de un terminador en topología de bus?',
            opciones: [
                { letra: 'a', texto: 'Amplificar la señal' },
                { letra: 'b', texto: 'Evitar reflejos de señal' },
                { letra: 'c', texto: 'Conectar más dispositivos' },
                { letra: 'd', texto: 'Enrutar paquetes' }
            ],
            correcta: 'b'
        },
        {
            id: 4,
            pregunta: '¿Qué dispositivo conecta una red local a otra red diferente?',
            opciones: [
                { letra: 'a', texto: 'Switch' },
                { letra: 'b', texto: 'Hub' },
                { letra: 'c', texto: 'Router' },
                { letra: 'd', texto: 'Terminador' }
            ],
            correcta: 'c'
        },
        {
            id: 5,
            pregunta: '¿Qué topología combina características de varias topologías?',
            opciones: [
                { letra: 'a', texto: 'Doble anillo' },
                { letra: 'b', texto: 'Árbol' },
                { letra: 'c', texto: 'Híbrida' },
                { letra: 'd', texto: 'Cadena' }
            ],
            correcta: 'c'
        }
    ];

    // Función para mezclar array
    function shuffleArray(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    }

    // Mezclar preguntas
    let preguntasMezcladas = shuffleArray([...preguntasData]);
    let preguntaActual = 0;
    const totalPreguntas = preguntasMezcladas.length;

    // Renderizar preguntas
    function renderizarPreguntas() {
        const container = document.getElementById('preguntas-wrapper');
        container.innerHTML = '';

        preguntasMezcladas.forEach((preg, index) => {
            const div = document.createElement('div');
            div.className = `pregunta bg-white rounded-2xl shadow-lg p-6 ${index === 0 ? '' : 'hidden'}`;
            div.dataset.pregunta = index + 1;
            div.dataset.idOriginal = preg.id;

            let opcionesHTML = preg.opciones.map(op => `
                <label class="flex items-center p-4 border-2 border-slate-100 rounded-xl cursor-pointer hover:bg-slate-50 hover:border-blue-300 transition">
                    <input type="radio" name="respuesta${preg.id}" value="${op.letra}" class="text-blue-600 w-5 h-5">
                    <span class="ml-3 text-slate-700">${op.letra}) ${op.texto}</span>
                </label>
            `).join('');

            div.innerHTML = `
                <div class="flex items-center mb-4">
                    <span class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center text-white font-bold mr-3">${index + 1}</span>
                    <h3 class="text-lg font-semibold text-slate-800">${preg.pregunta}</h3>
                </div>
                <div class="space-y-3">
                    ${opcionesHTML}
                </div>
            `;

            container.appendChild(div);
        });
    }

    // Inicializar
    renderizarPreguntas();

    // Respuestas correctas para validación (usando IDs originales)
    const respuestasCorrectas = {};
    preguntasData.forEach(p => {
        respuestasCorrectas[`respuesta${p.id}`] = p.correcta;
    });

    function actualizarVista() {
        document.querySelectorAll('.pregunta').forEach((p, i) => {
            p.classList.toggle('hidden', i !== preguntaActual);
        });
        
        document.getElementById('pregunta-actual').textContent = preguntaActual + 1;
        document.getElementById('progreso-texto').textContent = `${((preguntaActual + 1) / totalPreguntas) * 100}%`;
        document.getElementById('barra-progreso').style.width = `${((preguntaActual + 1) / totalPreguntas) * 100}%`;

        document.getElementById('btn-anterior').classList.toggle('hidden', preguntaActual === 0);
        
        if (preguntaActual === totalPreguntas - 1) {
            document.getElementById('btn-siguiente').classList.add('hidden');
            document.getElementById('btn-enviar').classList.remove('hidden');
            document.getElementById('btn-enviar').textContent = '¡Listo!';
        } else {
            document.getElementById('btn-siguiente').classList.remove('hidden');
            document.getElementById('btn-enviar').classList.add('hidden');
        }
    }

    function tieneRespuesta() {
        const pregunta = preguntasMezcladas[preguntaActual];
        return document.querySelector(`input[name="respuesta${pregunta.id}"]:checked`) !== null;
    }

    document.getElementById('form-nombre')?.addEventListener('submit', (e) => {
        e.preventDefault();
        const nombre = document.getElementById('nombre').value.trim();
        if (nombre) {
            window.location.href = `{{ route('actividad.iniciar') }}?nombre=${encodeURIComponent(nombre)}`;
        }
    });

    document.getElementById('btn-siguiente')?.addEventListener('click', () => {
        if (!tieneRespuesta()) {
            alert('Por favor selecciona una respuesta');
            return;
        }
        if (preguntaActual < totalPreguntas - 1) {
            preguntaActual++;
            actualizarVista();
        }
    });

    document.getElementById('btn-anterior')?.addEventListener('click', () => {
        if (preguntaActual > 0) {
            preguntaActual--;
            actualizarVista();
        }
    });

    document.getElementById('quiz-form')?.addEventListener('submit', (e) => {
        e.preventDefault();
        
        let puntuacion = 0;
        const nombre = document.getElementById('nombre-estudiante').value;
        
        // Calcular puntuación usando IDs originales de preguntas
        preguntasMezcladas.forEach(preg => {
            const seleccionada = document.querySelector(`input[name="respuesta${preg.id}"]:checked`);
            if (seleccionada && seleccionada.value === preg.correcta) {
                puntuacion++;
            }
        });

        // Recolectar respuestas con IDs originales
        let respuestas = {};
        preguntasMezcladas.forEach(preg => {
            const seleccionada = document.querySelector(`input[name="respuesta${preg.id}"]:checked`);
            respuestas[preg.id] = seleccionada ? seleccionada.value : '';
        });
        
        const respuestasJson = JSON.stringify(respuestas);
        const url = `{{ route('actividad.guardar') }}?nombre=${encodeURIComponent(nombre)}&puntuacion=${puntuacion}&total=${totalPreguntas}&respuestas=${encodeURIComponent(respuestasJson)}`;
        window.location.href = url;
    });
</script>
@endsection