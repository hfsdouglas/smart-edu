<?php

namespace App\Http\Controllers;

use App\Models\Schools;
use Illuminate\Http\Request;

class SchoolsController
{
    public function index() {
        $schools = Schools::all();

        if (!$schools) {
            return response()->noContent();
        }

        return response()->json($schools);
    }

    public function create(Request $request) {
        $name = $request->input('name');

        if (!$name) {
            return response()->json([
                'message' => 'Digite o nome para criar uma escola!',
            ], 400);
        }

        $school = Schools::create(['name' => $name]);

        return response()->json([
            'message' => 'A escola foi criada com sucesso!',
            'escola' => $school
        ]);
    }

    public function show($id) {
        $school = Schools::find($id);

        if (!$school) {
            return response()->json([
                'message' => 'Escola não encontrada!',
            ], 404);
        }

        return response()->json($school);
    }

    public function update(Request $request, string $id) {
        $school = Schools::find($id);

        if (!$school) {
            return response()->json([
                'message' => 'Escola não encontrada!',
            ], 404);
        }
        
        $name = $request->input('name');

        if (!$name) {
            return response()->json([
                'message' => 'Digite o nome que deseja atualizar!',
            ], 400);
        }

        $school->name = $name;
        $school->save();

        return response()->json([
            'message' => 'A escola foi atualizada com sucesso!',
            'escola' => $school
        ]);
    }
}
