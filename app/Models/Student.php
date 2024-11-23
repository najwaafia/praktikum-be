<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Student extends Model
{
    public static function getAllStudents(){
        $students = DB::select('select * from student'); 
    }

    public function index(){
        $students = Student::all();
        $data =[
            'message' => 'Get all Students',
            'data' => $students
        ];
        return response()->json($data, 200);
    }

    public static function findStudentById($id)
    {
        // Tambahkan logika tambahan jika diperlukan
        return self::find($id);
    }

}
