<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function showStudents(){
        return Student::paginate();
    }

    public function getStudent($id){
        return Student::find($id);
    }

    public function createStudent(Request $request){
        $student = new Student();
        $student->id = $request->input('id');
        $student->nombre = $request->input('nombre');
        $student->apellidos = $request->input('apellidos');
        $student->edad = $request->input('edad');
        $student->fecha_nacimiento = $request->input('fecha_nacimiento');
        $student->activo = $request->input('activo');

        $student->save();
        return json_encode(['msg'=>'created']);
    }

    public function updateStudent(Request $request, $id){
        $nombre = $request->input('nombre');
        $apellidos = $request->input('apellidos');
        $edad = $request->input('edad');
        $fecha_nacimiento = $request->input('fecha_nacimiento');
        $activo = $request->input('activo');

        Student::where('id', $id)->update(
            [
                'nombre' => $nombre,
                'apellidos' => $apellidos,
                'edad' => $edad,
                'fecha_nacimiento' => $fecha_nacimiento,
                'activo' => $activo
            ]
        );
        return json_encode(['msg'=>'updated']);
    }
    public function deleteStudent($id){
        Student::destroy($id);
        return json_encode(['msg'=>'removed']);
    }
}
