<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;
use App\Http\Requests\CreateUserRequest;

class AuthController extends BaseController
{
    public function register(CreateUserRequest $request)
    {
        try{
            $user = User::create($request->validated());
            $success['token'] =  $user->createToken('todo')->plainTextToken;
            $success['name'] =  $user->name;
            return $this->sendResponse($success, 'User register successfully.');
        }catch(Exception $e){
            $this->sendError('User registration failed', $e->getMessage());
        }
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && $user->password === $request->password) {
            $success['token'] =  $user->createToken('MyApp')->plainTextToken; 
            $success['name'] =  $user->name;
            return $this->sendResponse($success, 'User login successfully.');
        }

        return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Logout successful'], 200);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
