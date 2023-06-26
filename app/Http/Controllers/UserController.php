<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Return user by id
     * 
     * @return User
     */

    public function listById(int $id){
        $user = User::findOrFail($id);
        return $user;
    }

    /**
     * Return all users
     * 
     * @return array<User>
     */

    public function list(){
        return User::all();
    }

    /**
     * Add User
     * 
     * @return User
     */

    public function add(Request $req){
        $data = $req->all();
        $data['password'] = bcrypt($req->password);
        $user = User::create($data);
        return $user;    
    }

    /**
     * Edit especific user
     * 
     * @return User
     */

    public function edit(Request $req, int $id){
        $user = User::findOrFail($id);
        $data = $req->all();
        $data['password'] = bcrypt($req->password);
        $user->update($data);
        return $user;
    }

    /**
     * Delete especific a user
     * 
     * @return void
     */

    public function destroy(int $id){
        $user = User::findOrFail();
        $user->delete();
        return response()->json([], 204);
    }
}
