<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required',
        ]);

        try 
        {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => app('hash')->make($request->password)
            ]);

            return response()->json($user, 201);
        } 
        catch (\Exception $error) 
        {
            return response()->json($error, 409);
        }
    }

    /**
     * Get a JWT via given credentials.
     *
     * @param  Request  $request
     * @return Response
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['email', 'password']);

        if (!$token = Auth::attempt($credentials))
            return response()->json(['message' => 'Unauthorized', 401]);
        else
            return $this->respondWithToken($token);
    }

    /**
     * Get user details.
     *
     * @param  Request  $request
     * @return Response
     */	 	
    public function me()
    {
        return response()->json(auth()->user());
    }
}
