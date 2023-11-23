<?php

namespace App\Http\Controllers;

use App\Http\Requests\JenisRequest;
use App\Models\Jenis;
use App\Http\Requests\StoreJenisRequest;
use App\Http\Requests\UpdateJenisRequest;
use Exception;
use PDOException;

class JenisController extends Controller
{
    public function index()
    {
        try {
            $data = Jenis::get();
            return Response()->json(['status'=>true,'message'=>'success','data'=>$data]);
        }catch (Exception | PDOException $e){
            return Response()->json(['status'=>false,'message'=>'gagal menampilkan data']);
        }
    }
    
    public function store(JenisRequest $request)
    {     
        try {
            $data = Jenis::create($request->all());
            return response()->json(['status'=>true,'message'=>'input success','data'=>$data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'gagal input data']);
        }
    }

    public function show(Jenis $jeni){
        try {
            
            return Response()->json(['status'=>true,'data'=>$jeni]);
        }catch (Exception | PDOException $e){
            return Response()->json(['status'=>false,'message'=>'data failed to update'.$e]);
        }
    }

    public function update(JenisRequest $request, Jenis $jeni)
    {
        try {
           $jeni->update($request->all());
           return Response()->json(['status'=>true,'message'=>'data has been update']);
       }catch (Exception | PDOException $e){
           return Response()->json(['status'=>false,'message'=>'data failed to update'.$e]);
       }
    }

    public function destroy(Jenis $jeni)
    {
        try {
             $data = $jeni -> delete();
            return Response()->json(['status'=>true,'message'=>'data has been deleted','data'=>$data]);
        }catch (Exception | PDOException $e){
            return Response()->json(['status'=>false,'message'=>'data failed to delete']);
        }
    }
}
