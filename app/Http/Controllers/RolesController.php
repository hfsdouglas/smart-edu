<?php

namespace App\Http\Controllers;

use App\Http\Resources\RolesResource;
use App\Models\Roles;
use App\Models\Schools;
use Illuminate\Http\Request;

class RolesController
{
    public function index() {
        $roles = Roles::with('schools')->get();
        $formatted_roles = RolesResource::collection($roles);

        return response()->json([
            'roles' => $formatted_roles
        ]);
    }
    
    public function create(Request $request) {
        $role = $request->input('role');
        $school_id = $request->input('school_id');

        if (!$school_id) {
            return response()->json([
                'message' => 'O ID da escola não foi encontrado!'
            ], 400);
        }

        if (!$role) {
            return response()->json([
                'message' => 'Nome do cargo vazio!'
            ], 400);
        }

        $school = Schools::find($school_id);

        if (!$school) {
            return response()->json([
                'message' => 'Escola não encontrada!'
            ], 404);
        }

        $role = Roles::create([
            'role' => $role,
            'school_id' => $school_id
        ]);

        return response()->json([
            'message' => 'Cargo cadastrado com sucesso!',
            'role' => $role
        ]);
    }

    public function update(Request $request, string $id) {
        $role = $request->input('role');

        if (!$role) {
            return response()->json([
                'message' => 'Nome do cargo vazio!'
            ], 400);
        }

        $result = Roles::find($id);

        if (!$result) {
            return response()->json([
                'message' => 'Cargo não encontrado!'
            ], 404);
        }

        $result->role = $role;
        $result->save();

        return response()->json([
            'message' => 'Cargo atualizado com sucesso!',
            'role' => $result
        ]);
    }

    public function delete(string $id) {
        $role = Roles::find($id);

        if (!$role) {
            return response()->json([
                'message' => 'Cargo não encontrado!'
            ], 404);
        }

        $role->delete();

        return response()->json([
            'message' => 'Cargo deletado com sucesso!',
        ]);
    }

    public function show($id) {
        $roles = Roles::find($id);

        if (!$roles) {
            return response()->json([
                'message' => 'Escola não encontrada!',
            ], 404);
        }

        return response()->json($roles);
    }
}