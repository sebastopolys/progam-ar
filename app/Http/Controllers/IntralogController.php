<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Validator;
use Illuminate\Http\Request;
use Auth;

use App\Models\User;


class IntralogController extends Controller
{

    protected $data;

    public function index(){

        $user = Auth::user();
        if($user!==NULL&&$user->role=='admin'){

        # Meta options
            $ops = DB::select('select * from meta where meta_name = :meta_name', ['meta_name' => 'user_pag']);


        # Users
            $users =  DB::table('users')->orderBy('id')->paginate(intval($ops[0]->meta_value));
    
        # Posts    
            $posts = DB::select('select * from posts');
    
        #  user posts
            # initialize
            $us_po_id = $us_po_is = array();
            for ($i=0; $i < count($posts) ; $i++) { 
                array_push($us_po_id,$posts[$i]->auth_id);            
                array_push($us_po_is,$posts[$i]);
            }
            $user_post=array_combine($us_po_id,$us_po_is);


        # BUILD data
            $data=array(
                'users'=>$users,           
                'posts'=>$posts,
                'id_pos'=>$user_post,
                'options'=>$ops    
            ); 
            return view('backenddash')->with('data',$data);
        }
        else{
            return view('home');
        }
    }

    public function storeops(Request $request){
        // build post pagination
        $request->validate([
            'user_pag_sel'=>'required'
        ]);
        $pag_int= $request->all('user_pag_sel')['user_pag_sel'];
        $ops = DB::select('select * from meta where meta_name = :meta_name', ['meta_name' => 'user_pag']);
        $ops[0]->meta_value=$pag_int;
    
        // build $data
        $users =  DB::table('users')->orderBy('id')->paginate($pag_int);
        $posts = DB::select('select * from posts');
        $data=array(
            'users'=>$users,           
            'posts'=>$posts,
            'options'=>$ops     
        );
        // update DDBB
        DB::table('meta')
              ->where('meta_name', 'user_pag')
              ->update(['meta_value' => $pag_int]);
        // return 
        return view('backenddash')->with('data',$data);   
  

    }

   
}
