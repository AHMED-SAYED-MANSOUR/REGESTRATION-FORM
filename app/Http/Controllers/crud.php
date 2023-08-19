<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\users_table;
use Exception;
use Mail;
use App\Mail\MailNotify;
class crud extends Controller
{
    function index(){
        return view('index');
    }
    function add(Request $request){
        $name=$request->input('name');
        $username=$request->input('username');
        $phone=$request->input('phone');
        $birthday=$request->input('birthday');
        $address=$request->input('address');
        $password=$request->input('password');
        $confirmPassword=$request->input('passwordConfirm');
        $userImage=$request->input('userImage');
        $email=$request->input('email');
    
        $local = "localhost";
        $root = "root";
        $pass = "";
        $dbname = "webproject";


        $connection = mysqli_connect($local, $root, $pass, $dbname);

        $userQuery = mysqli_query($connection, "SELECT username FROM users");

        $check1 = false;
        while ($row = mysqli_fetch_assoc($userQuery)) {
            if ($row['username'] == $username) {
                $check1 = true;
                break;
            }
        }
        if ($check1) {
            return back()->with('error','username has been taken');
        }else{
            $isInserted=users_table::insert([
            'name'=>$name,
            'username'=>$username,
            'phone'=>$phone,
            'birthday'=>$birthday,
            'address'=>$address,
            'password'=>$password,
            'confirmPassword'=>$confirmPassword,
            'userImage'=>$userImage,
            'email'=>$email
            ]);
            if($isInserted){
                $mailData = [
                'title' => '',
                'body' => ''
                ,'name'=>$name
                ];
         
                Mail::to('ziadmohamed997@gmail.com')->send(new MailNotify($mailData));
                return back()->with('success','registered successfully !');
            }
            else{
                return back()->with('fail','registration error, please try again.');
            }
        }
        
        
    }
}
