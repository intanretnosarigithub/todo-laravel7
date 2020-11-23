<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
    public function register(Request $request)
{
$validateData = $request->validate([
    'name' => 'required|max:25',
    'email' => 'email|required|unique:users',
    'password' => 'required|confirmed'
]);

//create user
$user = new user([
    'name' => $request->name,
    'email'=> $request->email,
    'password' => $request->password
]);

$user->save();

return response()-> json ($user, 201);
}
}
