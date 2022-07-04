<?php

namespace App\Http\Controllers;

use Firebase\JWT\JWT;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function authenticate(Request $request)
    {
        $input = $request->all();
        $usuario = User::where('email', $input['email'])->first();
        //dd(User::where('email', $request->email)->get());
        if (!$usuario)
        {
            return response()->json([
                'success' => false,
                'message' => 'usuario invalido',
                
            ], 400);

        }
        if (Hash::check($request->password,$usuario->password )) {
            $key = env('JWT_SECRET', '');
            $time = time();
            $token = array(
                'iat' => $time, // Tiempo que inició el token
                'exp' => $time + (1200 * 60), // Tiempo que expirará el token (+1 hora)
                'data' => [ // información del usuario
                    'name' => $usuario->name,
                    'email' => $usuario->email,
                    'rol' => $usuario->rol,
                ]
            );
            $jwt = JWT::encode($token, $key,'HS256');
            return response()->json([
                'success' => true,
                'token' => $jwt,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Credenciales invalidas.',
                'username' => $request->username,
            ], 400);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
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
        /*User::create($request->name,
        $request->email,
        $request->hasMany(password));*/
        return User::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users = User::findOrFail($id);
            $users->update($request->all());
            return $users;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users=User::findOrFail($id); 
         $users->delete();
       return $users;
    }
}
