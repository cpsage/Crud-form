<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function showUsers() {
        

        $users = DB::table('students')
        
        // ->get();
        
        
        ->simplePaginate(4);
        // ->paginate(4, ['name', 'email']);

        // $users = DB::table('students');
        // return $users;

        // dd($users);
        // dump($users);

        // foreach($users as $user) {
        //     echo $user->name . "<br>";

 
        return view('allusers', ['data' => $users]);
        }

        public function singleUser(string $id) {
            $users = DB::table('students')->where('id', $id)->get();
            // $users = DB::table('students')->find(4);
            // return view('allusers', ['data' => $users]);
            // return $users;
            return view('user', ['data' => $users]);
        }
        public function addUser(Request $req) {
            $user = DB::table('students')
            ->insert([
                'name' => $req->username,
                'email' => $req->usermail,
                'age' => $req->userage,
                'city' => $req->usercity,
            ]);
            

            if($user) {
                return redirect()->route('home');
            } else {
                echo "<h1>Data not Added!!</h1>";
            }
        }

        public function updatePage(string $id){
            $users = DB::table('students')->find($id);
            // return $users;
            return view('updateuser', ['data' => $users]);
        }

        public function updateUser(Request $req, $id) {
            $user = DB::table('students')
                        ->where('id', $id)
                        ->update([
                            'name' => $req->username,
                            'email' => $req->usermail,
                            'age' => $req->userage,
                            'city' => $req->usercity,
                        ]);
                        // ->update([
                        //     'city' => 'Mumbai'
                        // ]);

                        // ->updateOrInsert([
                        //     'name' => 'Austin Murazik',
                        //     'email' => 'wilderman.joanne@bailey.com'
                        // ], [
                        //     'age' => 21
                        // ]);

                        // ->increment('age');
                        // ->decrement('age', 3, ['city' => 'Delhi']);
                        // ->incrementEach([
                        //     'age' => 2,
                            // 'votes' => 1
                        // ]);
            if($user) {
                return redirect()->route('home');
                // echo "<h1>Data Successfully Updated.</h1>";
            } else {
                echo "<h1>Data not Updated!!</h1>";
            }
        }

        public function deleteUser(string $id) {
            $user  = DB::table('students')
                         ->where('id', $id)
                         ->delete();
                        //  ->truncate();
            if($user) {
                return redirect()->route('home');
            }
        }
    }

