<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function showAllUsers()
    {
        return response()->json(User::all());
    }

    public function showOneUser($id)
    {
        if(!User::find($id)) return $this->customResponse('User not found!', 404);
        return response()->json(User::find($id));
    }

    public function create(Request $request)
    {
        $User = User::create($request->all());

        return response()->json($User, 200);
    }

    public function update($id, Request $request)
    {
        if(!User::find($id)) return $this->customResponse('User not found!', 404);

        $User = User::findOrFail($id);
        $User->update($request->all());

        return response()->json($User, 200);
    }

    public function delete($id)
    {
        if(!User::find($id)) return $this->customResponse('User not found!', 404);

        User::findOrFail($id)->delete();
        
        return $this->customResponse('Deleted successfully', 200);
    }

    public function customResponse($message = 'success', $status = 200)
    {
        return response(['status' =>  $status, 'message' => $message], $status);
    }
    
}

?>