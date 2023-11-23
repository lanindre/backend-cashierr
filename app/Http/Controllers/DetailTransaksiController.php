<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetailTransaksiRequest;
use App\Models\DetailTransaksi;
use App\Http\Requests\StoreDetailTransaksiRequest;
use App\Http\Requests\UpdateDetailTransaksiRequest;
use Exception;
use PDOException;

class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = DetailTransaksi::get();
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
    public function store(DetailTransaksiRequest $request)
    {
        try {
            $data = DetailTransaksi::create($request->all());
            return response()->json(['status'=>true,'message'=>'input success','data'=>$data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'gagal input data']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailTransaksi $detailTransaksi)
    {
        try {
            
            return Response()->json(['status'=>true,'data'=>$detailTransaksi]);
        }catch (Exception | PDOException $e){
            return Response()->json(['status'=>false,'message'=>'data failed to update'.$e]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailTransaksi $detailTransaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DetailTransaksiRequest $request, DetailTransaksi $detailTransaksi)
    {
        try {
            $detailTransaksi->update($request->all());
            return Response()->json(['status'=>true,'message'=>'data has been update']);
        }catch (Exception | PDOException $e){
            return Response()->json(['status'=>false,'message'=>'data failed to update'.$e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailTransaksi $detailTransaksi)
    {
        try {
            $data = $detailTransaksi -> delete();
           return Response()->json(['status'=>true,'message'=>'data has been deleted','data'=>$data]);
       }catch (Exception | PDOException $e){
           return Response()->json(['status'=>false,'message'=>'data failed to delete']);
       }
    }
}
