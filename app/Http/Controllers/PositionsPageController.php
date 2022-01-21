<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;






class PositionsPageController extends Controller
{
    public function positions($postslug){
 

        $expopost = DB::table('posts')->where('slug', $postslug)->first();
  

     
        if($postslug==$expopost->slug){
            return view('expopost')->with('expopost',$expopost);
        }

        else{
            return view('home');
        }
       
    }
}
