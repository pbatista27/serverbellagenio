<?php

namespace App\Http\Controllers;

use App\Transfer;
use Illuminate\Http\Request;
///
use Illuminate\Support\Facades\Auth;

class TransferController extends Controller
{

  protected $user;


  public function __construct(){
    $this->user = Auth::guard()->authenticate();

  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($this->user->tipo == 0 )
        {
          $this->user->tipo='isAdmin';
          $model = Transfer::get(['id','banco_emisor','bank_id','fecha_transferencia','referencia','monto','estado','service_id','user_id'])->toArray();
        }
        else
        {
          $model = $this->user->transfers()->get(['id','banco_emisor','bank_id','fecha_transferencia','referencia','monto','estado','service_id'])->toArray();
        }


      return response()->json(['transfer'=>$model],200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function show(Transfer $transfer)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transfer $transfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transfer $transfer)
    {
        //
    }


}
