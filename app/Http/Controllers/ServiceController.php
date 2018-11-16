<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
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
        $service = Service::all()->toArray();
      }
      else
      {
          $service = Service::where('estado','>',0)->get(['id','nombre']);
      }
        return response()->json(['servicios'=>$service],200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new Service();
        $service->nombre = $request->input('nombre');
        $service->estado = $request->input('estado');

        $service->save();

        return response()->json(['respuesta'=>'Servicio guardado con exito'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service , $id)
    {
        return response()->json(['servicio'=>$service::find($id)]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service, $id)
    {

      $model = $service::find($id);

      $model->nombre = $request->input('nombre');
      $model->estado = $request->input('estado');

      $model->save();

      return response()->json(['respuesta'=>'Servicio editado con exito'],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service, $id)
    {
        $model = $service::find($id);
        $model->delete();

        return response()->json(['respuesta'=>'Servicio eleminado con exito'],201);
    }
}
