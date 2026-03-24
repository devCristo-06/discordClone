<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Socialite;

class AuthController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Auth $auth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Auth $auth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Auth $auth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Auth $auth)
    {
        //
    }

    // --------------------------------------------------------------------------------
    /**
     * Funzione che fa registrare l'utente
     * 
     * @author Christopher
     * @param RegisterRequest $request
     * @return JSONResponse
     */
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required | string | max:40',
            'surname' => 'required | string | max:40',
            'gender' => 'required | int',
            'birth' => 'required | date',
            'nation' => 'required | int',
            'phoneNumber' => 'required | string | max:15',
            'prefix' => 'required | int',
            'email' => 'required | email | unique',
            'password' => 'required | string | min:8',
            'password_confirm' => 'required | string | same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['ERR' => $validator()], 422);
        }
    }

    // --------------------------------------------------------------------------------
    /**
     * Funzione che fa accedere l'utente
     * 
     * @author Christopher
     * @param string $user
     * @param string $hash
     * @return JSONResponse
     */
    public function login($user, $hash = null)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json([
            'token' => $token
        ]);
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            ['name' => $googleUser->getName()]
        );

        $token = auth()->login($user);

        return response()->json([
            'token' => $token
        ]);
    }
}
