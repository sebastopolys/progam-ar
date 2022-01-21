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



        
              

            

            @if (Auth::guest())  
            <h2>Register or login to view private Profiles</h2>
            @else
 

      

   





       

 

  

      






















        
        
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Profile</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="unique-tab" data-bs-toggle="tab" data-bs-target="#unique" type="button" role="tab" aria-controls="unique" aria-selected="false">Unique</button>
        </li>

     
        
            @switch(auth()->user()->role)
                @case('recruiter')
                    <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">          
                     Position</button>
                    </li>
                    @break            
                @case('postulant')
                    <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">          
                     Proyect</button>
                    </li>
                    @break                    
            @endswitch

     
   
        
        <li class="nav-item" role="presentation">
        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Blog Posts</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">Publicar / Editar Perfil</div>
        <div class="tab-pane fade" id="unique" role="tabpanel" aria-labelledby="unique-tab">Publicar / Editar CV / Porfolio</div>
        @if (auth()->user()->role=='recruiter'||auth()->user()->role=='postulant')
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                @include('users.form')     
            </div>
        @endif
      
    
      
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Publicar blog post</div>
    </div>
    

 
  
   
           

            @endif

        
        </div>

        <h2>{{ $message ?? ''}}</h2>
    </div>
  
   

@endsection
