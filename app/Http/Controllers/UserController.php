<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\RegisterUserForm;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $usuarios = User::all()->toArray();

       return response()->json(['usuarios'=>$usuarios],200);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterUserForm $request)
    {
        $model = new User();

        $model->nombre = $request->input('nombre');
        $model->apellido = $request->input('apellido');
        $model->fecha_nacimiento = $request->input('fecha_nacimiento');
        $model->email = $request->input('email');
        $model->telefono = $request->input('telefono');
        $model->password = bcrypt($request->input('password'));
        $model->tipo = 1;

        $model->save();

        return response()->json(['respuesta'=>'exito'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user,$id)
    {
        return response()->json(['usuario'=>$user::find($id)]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user, $id)
    {
        $model = $user::find($id);

        $model->nombre = $request->input('nombre');
        $model->apellido = $request->input('apellido');
        $model->fecha_nacimiento = $request->input('fecha_nacimiento');
        $model->email = $request->input('email');
        $model->telefono = $request->input('telefono');
        $model->password = bcrypt($request->input('password'));

        $model->save();

        return response()->json(['respuesta'=>'Usuario actualizado con exito'],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
    {
      $model = $user::find($id);
      $model->delete();
      return response()->json(['respuesta'=>'Usuario eliminado con exito'],200);
    }
}
