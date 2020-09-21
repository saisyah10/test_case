<?php

namespace App\Http\Controllers;

use App\Finance;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\Finance::all();
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
        $this->validate($request, [
            'id_account' => 'required',
            'title' => 'min:4',
            'description' => 'min:10',
            'amount' => 'required|min:4'
        ]);

        $id_account = $request->input('id_account');
        $title = $request->input('title');
        $description = $request->input('description');
        $amount = $request->input('amount');

        $data = new \App\Finance();
        $data->id_account = $id_account;
        $data->title = $title;
        $data->description = $description;
        $data->amount = $amount;

        if($data->save()){
            $res['message'] = "Success!";
            $res['value'] = "$data";
            return response($res);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = \App\Finance::where('id',$id)->get();
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
     * @param  \App\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function edit(Finance $finance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_account' => 'required',
            'title' => 'min:4',
            'description' => 'min:10',
            'amount' => 'required|min:4'
        ]);

        $id_account = $request->input('id_account');
        $title = $request->input('title');
        $description = $request->input('description');
        $amount = $request->input('amount');

        $data = \App\Finance::where('id',$id)->first();
        $data->id_account = $id_account;
        $data->title = $title;
        $data->description = $description;
        $data->amount = $amount;

        if($data->save()){
            $res['message'] = "Success!";
            $res['value'] = "$data";
            return response($res);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = \App\Finance::withTrashed()->where('id', $id)->first();

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
        $data = \App\Finance::onlyTrashed()->where('id', $id)->first();

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

    public function report_daily($daily){
        $data = \App\Finance::whereDay('created_at','=',$daily)->get();
        if(count($data) > 0){ //mengecek apakah data kosong atau tidak
            $res['message'] = "Report daily found!";
            $res['values'] = $data;
            return response($res);
        }
        else{
            $res['message'] = "Report daily not found!";
            return response($res);
        }
    }

    public function report_monthly($monthly){
        $data = \App\Finance::whereMonth('created_at','=',$monthly)->get();
        if(count($data) > 0){ //mengecek apakah data kosong atau tidak
            $res['message'] = "Report monthly found!";
            $res['values'] = $data;
            return response($res);
        }
        else{
            $res['message'] = "Report monthly not found!";
            return response($res);
        }
    }

    public function filter($filter){
        $data = \App\Finance::where('title',$filter)->paginate();
        if(count($data) > 0){ //mengecek apakah data kosong atau tidak
            $res['message'] = "Data found!";
            $res['values'] = $data;
            return response($res);
        }
        else{
            $res['message'] = "Data not found!";
            return response($res);
        }
    }
}
