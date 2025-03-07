<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employees;
use App\Models\Roles;
use App\Models\Schools;
use Illuminate\Http\Request;

class EmployeesController
{
    public function index() {
        $employees = Employees::with(['schools', 'roles'])->get();

        if (!$employees) {
            return response()->noContent();
        }

        return response()->json($employees);
    }

    public function create(Request $request) {
        $name = $request->input('name');
        $role_id = $request->input('role_id');
        $school_id = $request->input('school_id');

        if (!$school_id) {
            return response()->json([
                'message' => 'O ID da escola não foi encontrado!'
            ], 400);
        }

        if (!$role_id) {
            return response()->json([
                'message' => 'Nome do cargo vazio!'
            ], 400);
        }

        if (!$name) {
            return response()->json([
                'message' => 'Nome do colaborador inválido!'
            ], 400);
        }

        $school = Schools::find($school_id);

        if (!$school) {
            return response()->json([
                'message' => 'Escola não encontrada!'
            ], 404);
        }

        $role = Roles::find($role_id);

        if (!$role) {
            return response()->json([
                'message' => 'Cargo não encontrado!'
            ], 404);
        }

        if ($school->id !== $role->school_id) {
            return response()->json([
                'message' => 'O cargo enviado não corresponde à escola do colaborador!'
            ], 400);
        }

        $employee = Employees::create([
            'name' => $name,
            'school_id' => $school->id,
            'role_id' => $role->id,
        ]);

        return response()->json([
            'message' => 'Colaborador cadastrado com sucesso!',
            'employee' => $employee
        ]);
    }

    public function update(Request $request, string $id) {
        $name = $request->input('name');

        if (!$name) {
            return response()->json([
                'message' => 'Nome do colaborador inválido!'
            ], 400);
        }

        $employee = Employees::find($id);

        if (!$employee) {
            return response()->json([
                'message' => 'Colaborador não encontrado!',
            ], 404);
        }

        $employee->name = $name;
        $employee->save();

        return response()->json([
            'message' => 'Colaborador atualizado com sucesso!',
            'employee' => $employee
        ]);
    }

    public function show($id) {
        $employee = Employees::find($id);

        if (!$employee) {
            return response()->json([
                'message' => 'Colaborador não encontrado!',
            ], 404);
        }

        return response()->json($employee);
    }

    public function delete(string $id) {
        $employee = Employees::find($id);

        if (!$employee) {
            return response()->json([
                'message' => 'Colaborador não encontrado!'
            ], 404);
        }

        $employee->delete();

        return response()->json([
            'message' => 'Cargo deletado com sucesso!',
        ]);
    }
}
