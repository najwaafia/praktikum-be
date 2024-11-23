<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentlController extends Controller
{
    
    //show data employee
    public function index()
    {
        // Mengambil semua data dari tabel students
        $students = Student::all();
        
        $data = [
            'message' => 'Get all employees',
            'data' => $students
        ];
        
        return response()->json($data, 200);
        
    }

    // POST /api/students
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|integer',
            'email' => 'required|email|unique:students,email',
            'major' => 'required|string|max:255'
        ]);

        //save data to students tabel (database)
        $student = Student::create($validatedData);

        $data = [
            'message' => 'Student successfully created',
            'data' => $student,
        ];
        
        return response()->json($data, 201);
        
    }

    //put/update student data
    public function update(Request $request, $id)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|integer',
            'email' => 'required|email|unique:students,email',
            'major' => 'required|string|max:255'
        ]);

        //search student based on ID
        $student = Student::find($id);

        //if data not found, respon error 404
        if (!$student) {
            return response()->json([
                'message' => 'Student not found!'
            ], 404);
        }

        //update student data
        $student->update($validatedData);

        $data = [
            'message' => 'Student successfully updated',
            'data' => $student,
        ];
        return response()->json($data, 200);
    }

    //destroy/delete student data
    public function destroy($id)
    {
        //search student based on ID
        $student = Student::find($id);

        //if data not found, respon error 404
        if (!$student) {
            return response()->json([
                'message' => 'Student not found!'
            ], 404);
        }

        //delete student
        $student->delete();

        $data = [
            'message' => 'Student successfully deleted',
            'data' => $student,
        ];
        return response()->json($data, 200);
    }

    public function show($id)
{
    //searcg id student
    $student = Student::findStudentById($id);

    if ($student) {
        $data = [
            'message' => 'Get detail student',
            'data' => $student,
        ];

        return response()->json($data, 200);
    } else {
        $data = [
            'message' => 'Student not found',
        ];

        return response()->json($data, 404);
    }
}

}
