<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    /**
     * Test if the user is an admin
     * 
     * @return bool
     */
    function isnt_admin(){
        if(!auth()->user()->admin)
        {
            return true;
        }
        else return false;
    }

    /**
     * Return Clinic by id
     * 
     * @return Clinic
     */

    public function listById(int $id){
        if($this->isnt_admin())
        {
            return response()->json([
                "data"=>
                [ 
                    "message"=>'Not an admin'
                ]
            ], 403);
        }
        $clinic = Clinic::findOrFail($id);
        return $clinic;
    }

    /**
     * Return all clinics
     * 
     * @return array<Clinic>
     */

    public function list(){
        if($this->isnt_admin())
        {
            return response()->json([
                "data"=>
                [ 
                    "message"=>'Not an admin'
                ]
            ], 403);
        }
        return Clinic::all();
    }

    /**
     * Add User
     * 
     * @return Clinic
     */

    public function add(Request $req){
        if($this->isnt_admin())
        {
            return response()->json([
                "data"=>
                [ 
                    "message"=>'Not an admin'
                ]
            ], 403);
        }
        $data = $req->all();
        $clinic = Clinic::create($data);
        return $clinic;    
    }

    /**
     * Edit especific Clinic
     * 
     * @return Clinic
     */

    public function edit(Request $req, int $id){
        if($this->isnt_admin())
        {
            return response()->json([
                "data"=>
                [ 
                    "message"=>'Not an admin'
                ]
            ], 403);
        }
        $clinic = Clinic::findOrFail($id);
        $data = $req->all();
        $clinic->update($data);
        return $clinic;
    }

    /**
     * Delete especific a Clinic
     * 
     * @return void
     */

    public function destroy(int $id){
        if($this->isnt_admin())
        {
            return response()->json([
                "data"=>
                [ 
                    "message"=>'Not an admin'
                ]
            ], 403);
        }
        $clinic = Clinic::findOrFail();
        $clinic->delete();
        return response()->json([], 204);
    }
}
