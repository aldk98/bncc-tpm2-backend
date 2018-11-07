<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Kelas;
use App\Http\Controllers\Controller;
use Validator;

class KelasController extends Controller
{
   public $successStatus = 200;
    
    public function getKelas()
    {
        $kelas = Kelas::all();
        return response()->json([
            'kelas' => $kelas,
        ], $this->successStatus);
    }

    public function showKelas($id)
    {
        $kelas = Kelas::findOrFail($id);

        return response()->json([
            'kelas' => $kelas
        ], $this->successStatus);
    }

    public function postKelas(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required'
        ]);

        $kelas = new Kelas;

        if($validator->fails()){
            return response()->json([
                'message' => 'Failed to insert'
            ]);
        }
        $kelas->name = $request->name;
        $kelas->description = $request->description;
        $kelas->save();

        return response()->json([
            'message' => 'Success Insert New Class'
        ], $this->successStatus);
    }

    public function updateKelas(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required'
        ]);
        
        if($validator->fails()){
            return response()->json([
                'message' => 'Failed to update'
            ]);
        }

        $kelas->name = $request->name;
        $kelas->description = $request->description;

        $kelas->save();

        return response()->json([
            'message' => 'Success Update Class'
        ], $this->successStatus);
    }

    public function deleteKelas($id)
    {
        $kelas = Kelas::findOrFail($id);

        $kelas->delete();

        return response()->json([
            'message' => 'Success Delete Kelas'
        ]);
    }

}
