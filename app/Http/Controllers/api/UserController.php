<?php
 namespace App\Http\Controllers\api;
 
     use Illuminate\Http\Request;
     use App\Http\Controllers\Controller;
     use Illuminate\Support\Facades\Auth;
     use App\User;
     use Response;

class UserController extends Controller
{
    public function __construct()
    {
        $this->content = array();
    }
    public function login()
    {
        error_log( request('email'));
        error_log( request('password'));
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $this->content['token'] =  $user->createToken('Web Client')->accessToken;
            $status = 200;
        } else {
            $this->content['error'] = "Unauthorised";
            $status = 401;
        }
        return response()->json($this->content, $status);
    }

    public function details()
    {
        return response()->json(['user' => Auth::user()]);
    }
}
