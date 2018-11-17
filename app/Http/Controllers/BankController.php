<?php

namespace App\Http\Controllers;

use App\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BankController extends Controller
{

  protected $user;

  public function __construct()
  {
    $this->user = Auth::guard()->authenticate();
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      if($this->user->tipo == 0)
      {
        $bank = Bank::get(['id','nombre','numero_cuenta','tipo_cuenta','usuario_cuenta','usuario_cedula','estado'])->toArray();
      }
      else
      {
          $bank = Bank::where('estado','>',0)->get(['id','nombre','numero_cuenta','tipo_cuenta','usuario_cuenta','usuario_cedula']);
      }
        return response()->json(['bancos'=>$bank],200);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $bank = new Bank();

        $bank->nombre = $request->input('nombre');
        $bank->numero_cuenta = $request->input('numero_cuenta');
        $bank->tipo_cuenta = $request->input('tipo_cuenta');
        $bank->usuario_cuenta = $request->input('usuario_cuenta');
        $bank->usuario_cedula = $request->input('usuario_cedula');
        $bank->estado = $request->input('estado');

        $bank->save();

        return response()->json(['respuesta'=>'Banco registrado con exito', 'id'=>$bank->id],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank, $id)
    {
        return response()->json(['banco'=>$bank::find($id)],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank, $id)
    {
      $model = $bank::find($id);
      $model->nombre = $request->input('nombre');
      $model->numero_cuenta = $request->input('numero_cuenta');
      $model->tipo_cuenta = $request->input('tipo_cuenta');
      $model->usuario_cuenta = $request->input('usuario_cuenta');
      $model->usuario_cedula = $request->input('usuario_cedula');
      $model->estado = $request->input('estado');

      $model->save();
      //return response()->json(['modelo'=>$model]);
      return response()->json(['respuesta'=>'Banco editado con exito'],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank, $id)
    {
      $model = $bank::find($id);
      $model->delete($id);
      return response()->json(['respuesta'=>'Bancon eliminado con exito']);
    }
}
