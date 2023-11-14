<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Http\Requests\UsersRequest;
use App\Models\User;
use Exception;
use PDOException;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(UsersRequest $request)
    {
        try {
            $data = User::create($request->all());
            return response()->json(['status'=>true,'message'=>'input success','data'=>$data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'gagal input data']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $users)
    {
        try {
            
            return Response()->json(['status'=>true,'data'=>$users]);
        }catch (Exception | PDOException $e){
            return Response()->json(['status'=>false,'message'=>'data failed to update'.$e]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsersRequest $request, User $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $users)
    {
        //
    }
}
