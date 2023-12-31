<?php

namespace App\Http\Controllers;

use App\Http\Requests\StokRequest;
use App\Models\Stok;
use App\Http\Requests\StoreStokRequest;
use App\Http\Requests\UpdateStokRequest;
use Exception;
use PDOException;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = Stok::get();
            return Response()->json(['status'=>true,'message'=>'success','data'=>$data]);
        }catch (Exception | PDOException $e){
            return Response()->json(['status'=>false,'message'=>'gagal menampilkan data']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StokRequest $request)
    {
        try {
            $data = Stok::create($request->all());
            return response()->json(['status'=>true,'message'=>'input success','data'=>$data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'gagal input data']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Stok $stok)
    {
        try {
            
            return Response()->json(['status'=>true,'data'=>$stok]);
        }catch (Exception | PDOException $e){
            return Response()->json(['status'=>false,'message'=>'data failed to update'.$e]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stok $stok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StokRequest $request, Stok $stok)
    {
        try {
            $stok->update($request->all());
            return Response()->json(['status'=>true,'message'=>'data has been update']);
        }catch (Exception | PDOException $e){
            return Response()->json(['status'=>false,'message'=>'data failed to update'.$e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stok $stok)
    {
        try {
            $data = $stok -> delete();
           return Response()->json(['status'=>true,'message'=>'data has been deleted','data'=>$data]);
       }catch (Exception | PDOException $e){
           return Response()->json(['status'=>false,'message'=>'data failed to delete']);
       }
    }
}
