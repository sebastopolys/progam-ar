


@extends('layouts.app')

@section('content')
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-400 sm:items-center py-4 sm:pt-0" >
   
        <style>
            .nav-tabs{
                border-bottom: 2px solid #ddd;  background-color: #2556ea1a;
            }
            .nav-tabs .nav-link{
                margin-bottom:-2px;
            }

            .nav-tabs .nav-link.active
            {
              
                border-color:#c2ccd7 #cfd6dd #fff;
            }
        </style>


            


            <div class="container">



        
            <h1>USER Profile</h1>
           

            

            @if (Auth::guest())  
            <h2>Register or login to view private Profiles</h2>
            @else
 
           

   <p>User Id: {{ $r_data['data']->id }}
       </p> 
    <p>User name: {{ $r_data['data']->name }}</p>  
     
    
    <p>Account created on: {{ $r_data['data']->created_at }}</p>
    <p>Role: {{ $r_data['data']->role }}</p>

    @if ($r_data['profile']!==NULL)        

      <h4>{{ $r_data['profile']->title }}</h4>  
       <p>{{ $r_data['profile']->body }}</p> 
       <p>{{ $r_data['profile']->tags }}</p> 







       

  

      




















    @else
       <h4>Este usuario todavia no ha publicado su perfil</h4> 
    @endif
    @if( $r_data['owned']==1)
       <a href="{{ url('user/'.$r_data['data']->name.'/settings') }}">edit</a>



        
        
      
    @endif
 
  
   
           

            @endif

        
        </div>
    </div>
  
   

@endsection
