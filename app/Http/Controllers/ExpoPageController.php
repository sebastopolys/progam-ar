<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Post;


class ExpoPageController extends Controller
{
    public function expo (){

        # users
        $rec_users = DB::select('select * from users where role = :role', ['role' => 'recruiter']);
        $pos_users = DB::select('select * from users where role = :role', ['role' => 'postulant']);

        # initialize
        $us_id_r = $us_is_r = $us_id_p = $us_is_p = array();

        # BUILD RECRUITERS
            for ($i=0; $i < count($rec_users) ; $i++) { 
                array_push($us_id_r,$rec_users[$i]->id);            
                array_push($us_is_r,$rec_users[$i]);
            }
            $us_if_r=array_combine($us_id_r,$us_is_r);

        # BUILD POSTULANTS
            for ($i=0; $i < count($pos_users) ; $i++) { 
                array_push($us_id_p,$pos_users[$i]->id);            
                array_push($us_is_p,$pos_users[$i]);
            }            
            $us_if_p=array_combine($us_id_p,$us_is_p);
        
        # final USERS array
        $expo_use=array('recruiter'=>$us_if_r,'postulant'=>$us_if_p);
        # Posts
        $posts = DB::table('posts')->select(
            'id',
            'type',
            'titulo',
            'slug',
            'descripcion',
            'contenido',
            'img_route',
            'tags',            
            'estado')->get();
        $posts = Post::all();

        #  Posts & Users
        $data = array($posts,$expo_use);
        
        return view('expo')->with('data',$data);    
    
    }


}
