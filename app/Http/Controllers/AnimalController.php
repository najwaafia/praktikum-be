<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    private $animals = ['kucing', 'ayam', 'ikan'];

    //show data employee
    public function index()
    {
        $data = [
            'message' => 'Get all animals',
            'data' => $this->animals,
        ];
        
        return response()->json($data, 200);
        
    }

    //store/insert employees data
    public function store(Request $request)
    {
        $newAnimal = $request->input('name');
        array_push($this->animals, $newAnimal);

        $data = [
            'message' => 'Hewan berhasil ditambahkan',
            'data' => $this->animals,
        ];
        
        return response()->json($data, 201);

    }

    //put/update animal data
    public function update(Request $request, $id)
    {
        $updatedAnimal = $request->input('name');

        if (isset($this->animals[$id])) {
            $this->animals[$id] = $updatedAnimal;

            $data = [
                'message' => 'Hewan berhasil diupdate',
                'data' => $this->animals,
            ];
            return response()->json($data, 200);

        }

        return response()->json([
            'success' => false,
            'message' => 'Hewan dengan ID tersebut tidak ditemukan',
        ], 404);
    }

    //destroy/delete animal data
    public function destroy($id)
    {
        if (isset($this->animals[$id])) {
            unset($this->animals[$id]);
            $this->animals = array_values($this->animals);

            $data = [
                'message' => 'Hewan berhasil dihapus',
                'data' => $this->animals,
            ];
            return response()->json($data, 200);
            
        }

        return response()->json([
            'success' => false,
            'message' => 'Hewan dengan ID tersebut tidak ditemukan',
        ], 404);
    }
}
