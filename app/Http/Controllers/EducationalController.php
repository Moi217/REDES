<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Resultado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EducationalController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function contenido()
    {
        return view('contenido');
    }

    public function iniciarActividad(Request $request)
    {
        $nombre = $request->query('nombre', 'Estudiante');
        return view('actividad', compact('nombre'));
    }

    public function actividad()
    {
        return view('actividad');
    }

    public function guardarResultado(Request $request)
    {
        $nombre = $request->query('nombre', 'Estudiante');
        $puntuacion = (int) $request->query('puntuacion', 0);
        $total = (int) $request->query('total', 5);
        $respuestas = $request->query('respuestas', '');

        if (empty($nombre)) {
            return redirect()->route('actividad');
        }

        $estudiante = Estudiante::where('nombre', $nombre)->first();

        if (!$estudiante) {
            $estudiante = Estudiante::create([
                'nombre' => $nombre,
                'correo' => strtolower(str_replace(' ', '.', $nombre)) . '@estudiante.local',
            ]);
        }

        $resultado = Resultado::create([
            'estudiante_id' => $estudiante->id,
            'puntaje' => $puntuacion,
            'fecha' => now()->toDateString(),
        ]);

        return redirect()->route('resultados', [
            'id' => $resultado->id,
            'respuestas' => $respuestas,
        ]);
    }

    public function resultados(Request $request)
    {
        $resultadoId = $request->query('id');
        $respuestas = $request->query('respuestas', '');
        
        $todosResultados = Resultado::with('estudiante')
            ->orderBy('fecha', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();
        
        if ($resultadoId) {
            $resultado = Resultado::with('estudiante')->find($resultadoId);
            if ($resultado) {
                return view('resultados', [
                    'puntuacion' => $resultado->puntaje,
                    'total' => 5,
                    'nombre' => $resultado->estudiante->nombre,
                    'todosResultados' => $todosResultados,
                    'respuestas' => $respuestas,
                ]);
            }
        }

        $puntuacion = (int) $request->query('puntuacion', 0);
        $total = (int) $request->query('total', 5);
        $nombre = $request->query('nombre', 'Estudiante');
        
        return view('resultados', compact('puntuacion', 'total', 'nombre', 'todosResultados', 'respuestas'));
    }
}