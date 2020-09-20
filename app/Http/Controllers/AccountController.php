<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Hash;
class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\Account::all();
        if(count($data) > 0){ //mengecek apakah data kosong atau tidak
            $res['message'] = "Success!";
            $res['values'] = $data;
            return response($res);
        }
        else{
            $res['message'] = "Empty!";
            return response($res);
        }
    }

    public function login(Request $request){

        $email = $request->input('email');
        $password = $request->input('password');
        // dd($password);
        $data = \App\Account::where('email', $email)->first();
        // dd($data->password);
        if($data){ //apakah email tersebut ada atau tidak
            
            // dd(Hash::check($password, $data->password));
            if(Hash::check($password, $data->password) ){
                    $key = "example_key";
                    $payload = array(
                    "id" => $data->id 
                    );
                    $jwt = JWT::encode($payload, $key);
                    
                    $val = array(
                        "data" => $data,
                        "token" => $jwt
                        );
                    $res['message'] = "Success!";
                    $res['value'] = $val;
                    return response($res);
            }
            else{
                $res['message'] = "Belum Berhasil!";
            return response()->json($res, 401);
            }
        }
        else{
            $res['message'] = "data tidak ada";
            return response()->json($res, 401);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $account_name = $request->input('account_name');
        $description = $request->input('description');
        $account_type = $request->input('account_type');
        $email = $request->input('email');
        $password = $request->input('password');

        $data = new \App\Account();
        $data->account_name = $account_name;
        $data->description = $description;
        $data->account_type = $account_type;
        $data->email = $email;
        $data->password = Hash::make($password);

        $add = $data->save();

        if($add ){
            $key = "example_key";
            $payload = array(
            "id" => $data->id 
            );
            $key = "example_key";
            $jwt = JWT::encode($payload, $key);
            
            $key = array(
                "data" => $data,
                "token" => $jwt
                );
            $res['message'] = "Success!";
            $res['value'] = $key;
            return response($res);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = \App\Account::where('id',$id)->get();
        if(count($data) > 0){ //mengecek apakah data kosong atau tidak
            $res['message'] = "Success!";
            $res['values'] = $data;
            return response($res);
        }
        else{
            $res['message'] = "Failed!";
            return response($res);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $account_name = $request->input('account_name');
        $description = $request->input('description');
        $account_type = $request->input('account_type');
        $email = $request->input('email');
        $password = $request->input('password');

        $data = \App\Account::where('id',$id)->first();
        $data->account_name = $account_name;
        $data->description = $description;
        $data->account_type = $account_type;
        $data->email = $email;
        $data->password = Hash::make($request->$password);

        if($data->save()){
            $res['message'] = "Success!";
            $res['value'] = "$data";
            return response($res);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = \App\Account::withTrashed()->where('id', $id)->first();

        if($data->delete()){
            $res['message'] = "Success!";
            $res['value'] = "$data";
            return response($res);
        }
        else{
            $res['message'] = "Failed!";
            return response($res);
        }
    }

    public function restore($id)
    {
        $data = \App\Account::onlyTrashed()->where('id', $id)->first();

        if($data->restore()){
            $res['message'] = "Success!";
            $res['value'] = "$data";
            return response($res);
        }
        else{
            $res['message'] = "Failed!";
            return response($res);
        }
    }

    
}