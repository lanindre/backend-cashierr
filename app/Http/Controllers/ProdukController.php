<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdukRequest;
use App\Models\produk;
use App\Http\Requests\StoreprodukRequest;
use App\Http\Requests\UpdateprodukRequest;
use App\Policies\ProdukPolicy;
use Exception;
use PDOException;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = Produk::get();
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
    public function store(ProdukRequest $request)
    {
        try {
            $data = Produk::create($request->all());
            return response()->json(['status'=>true,'message'=>'input success','data'=>$data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'gagal input data']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(produk $produk)
    {
        try {
            
            return Response()->json(['status'=>true,'data'=>$produk]);
        }catch (Exception | PDOException $e){
            return Response()->json(['status'=>false,'message'=>'data failed to update'.$e]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProdukRequest $request, produk $produk)
    {
        try {
            $produk->update($request->all());
            return Response()->json(['status'=>true,'message'=>'data has been update']);
        }catch (Exception | PDOException $e){
            return Response()->json(['status'=>false,'message'=>'data failed to update'.$e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(produk $produk)
    {
        try {
            $data = $produk -> delete();
           return Response()->json(['status'=>true,'message'=>'data has been deleted','data'=>$data]);
       }catch (Exception | PDOException $e){
           return Response()->json(['status'=>false,'message'=>'data failed to delete']);
       }
    }
}
