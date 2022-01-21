<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Post;

use Illuminate\Support\Str;


use Validator;

use Auth;


use Config;


class PagesController extends Controller
{


    private $roles = array(
        'rec' => [
            'publish_profile' =>  1,
            'publish_portfolio' =>  1,
            'publish_position' => 1,
            'publish_post' =>  1,
    
            'view_profile' => 1,
            'view_portfolio' => 1,
            'download_cv' => 1,
            'contact_postulant' => 1     
        ],
        
        'pos' => [
            'publish_profile' =>  1,
            'publish_portfolio' =>  1,
            'publish_project' => 1,
            'publish_post' =>  1,
    
            'view_profile' => 1,
            'view_portfolio' => 1,
            'submit_postulation' => 1,
            'contact_recruiter' => 1
    
        ],
        'col' => [
            'publish_profile' =>  1,
            'publish_portfolio' =>  1,
            'publish_post' =>  1
            
        ],
        'sus' => [
            'publish_profile' =>  1    
        ],
    );




    public function index (){
        $data = [
            'name'=>'sebas',
            'id'=>'11',
            'hash'=>'#41m24',
            'role'=>'subs',
            'timestamp'=>'16421233'
        ];
        return view('index')->with('data',$data);
    
       
    
    }

    public function info (){
        $data = [
            'name'=>'Information',
            'descr'=>'Informacion sobre esta pagina, como funciona, quienes pueden participar y como, hacia quien esta orientada, comunidad, Preguntas frecuentes, contacto, soporte, productos',
            'hash'=>'#41m24',
            'role'=>'subs',
            'timestamp'=>'16421233'
        ];
        return view('info')->with('data',$data);
    
       
    
    }

    public function show($name){


        $data = DB::select('select * from users where name = :name', ['name' => $name]);
      //  $profiles = DB::select('select * from posts where type = :type',['type' => 'profile']);     


      $nouser = 'No user found';
     

      //var_dump($user->id);
       // no existe el usuario
        if(count($data)==0):
          
            
            return view('users.nouser')->with('nouser',$nouser);
        // usuario existe
        else:

          
            $user = Auth::user();
       
            // User ID of URL
            $user_id = $data[0]->id;
                $own=0;
                // own profile - editor ON
                if(!empty($user)&&$user_id==$user->id): 
                $own=1;
                endif;
            // prepare data 
            
                    $r_data=[
                        'data'=>$data[0],
                        'profile'=>NULL,
                        'owned'=>$own
                    ];
                
            
            return view('users.profile')->with('r_data',$r_data);
            
        endif;
 

    }

    public function settings($name){
        $user = Auth::user();
        $us_nam=$user->name;
        if($name==$us_nam):
            return view('users.settings')->with('name',$name);
        else:
            return self::show($name);
        endif;

    }

    public function store(Request $request)

    {
     
        // IMAGE
    $request->validate([
        'titulo' => 'required',
        'archivo' => 'required|mimes:jpg,png,jpeg|max:5048'
    ]);

    $file = $request->file('archivo')->getClientOriginalName();
    $name = pathinfo($file,PATHINFO_FILENAME);
    $img_name = $name.'-'.time().'.'.$request->archivo->extension();

    // save public
     $request->archivo->move(public_path('images'), $img_name);
   
     // save in storage
     //$img_path=$request->file('archivo')->store('images');

        $data = $request->all();
        $title = $request->all('titulo');  
        $slug_to_low=  strtolower($title['titulo']);  
        $slug_replace= preg_replace('~[^\pL\d]+~u','-', $slug_to_low);

        $slug = $slug_replace.'-'.time();

        $data['slug'] = $slug;
        $data['img_route']=$img_name;

            // POST TINYMCE EDITOR


        Post::create($data);

        return view('users.settings')->with('message','Succesfully sent');
    }

}
