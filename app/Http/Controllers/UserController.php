<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function list_user(){
        $data = User::get();
        return response()->json($data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password'=> 'required',
            'role' => 'required',
            'division_id' => 'required'
        ]);
        $user = new User;
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->role = $request->input('role');
        $user->division_id = $request->input('division_id');
        $user->save();

        return response()->json(['message' => 'success'],200);
    }
    public function update(Request $request, $id){
        $request->validate([
            'username' => 'required',
            'password'=> 'required',
            'role' => 'required',
            'division_id' => 'required'
        ]);

        $user = User::find($id);
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->role = $request->input('role');
        $user->division_id = $request->input('division_id');
        $user->save();

        return response()->json(['Message' => 'update success']);
    }
    public function delete($id)
    {
        $user = User::findOrFail($id);
        if (! $user) {
            return response()->json(['message' => 'user not found'],500);
        }
        $user->delete();

        return response()->json(['message' => 'success'],200);
    }
}
