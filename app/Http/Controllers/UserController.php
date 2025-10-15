<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function ShowData(){
        echo "Hello User!";
    }
    public function UserData($name, $id){
        echo "UserName: ".$name.".";
        echo "<br>";
        echo "ID: ".$id.".";
    }
}
