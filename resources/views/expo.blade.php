@extends('layouts.app')
<style>


.positions{
    background-color:rgb(223, 243, 250);
}
.projects{
    background-color:rgb(247, 224, 224);
}

.head-section>h2{
    font-size:36px;
    padding-top: 15px;
    margin-left: 20px;
}


</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
               

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>                        
                    @endif
          
                    <div class="positions"> 
                    <span  class="head-section">      
                        <h2>Posiciones abiertas</h2>
                    </span>
                        <ul>
                
                            @foreach ($data[0]  as $post )           
                                @if( $post->type=='position' )
                                    <li class="post border my-4 p-3" style="list-style:none;">
                                        <div class="list row align-items-center justify-content-evenly">
                                            <div class="post-head col"> 
                                                <img src=" {{ asset('images/'.$post->img_route)   }}" width="310"/>
                                            </div>
                                            <div class="post-head col">
                                              
                                                    <h2>  {{ $post->titulo }}</h2>
                                                    <h5><i>{{ $post->descripcion }}</i></h5>  
                                                    <p>{{ $post->tags }}</p>
                                            <p>Autor: {{ $data[1]['recruiter'][$post->auth_id]->name }}</p>
                                               
                                            </div>
                                            <div class="post-cont row">
                                                {!! Str::limit($post->contenido, 350) !!}
                                                <a href="/position/{{ $post->slug }}">Leer mas</a>    
                                            </div>                              
                                        </div>
                                    </li> 
                                @endif 
                            @endforeach
                        </ul>                                   
                    </div>
                    <div class="projects">
                        <span  class="head-section"> 
                            <h2>Proyectos</h2>
                        </span>
                        <ul>
                            @foreach ($data[0]  as $post ) 
                                @if( $post->type=='proyect' )
                                <li class="post border my-4 p-3" style="list-style:none;">
                                    <div class="list row align-items-center justify-content-evenly">
                                        <div class="post-head col"> 
                                            <img src=" {{ asset('images/'.$post->img_route)   }}" width="310" />
                                        </div>
                                        <div class="post-head col">
                                          
                                                <h2>  {{ $post->titulo }}</h2>
                                                <h5><i>{{ $post->descripcion }}</i></h5>  
                                                <p>{{ $post->tags }}</p>
                                                <p>Autor: {{ $data[1]['postulant'][$post->auth_id]->name }}</p>
                                        
                                           
                                        </div>
                                        <div class="post-cont row">
                                            {!! Str::limit($post->contenido, 350) !!}
                                            <a href="/proyects/{{ $post->slug }}">Leer mas</a>    
                                        </div>   
                                                              
                                    </div>
                                </li> 
                                @endif
                            @endforeach
                        </ul>


                    </div>
                    <div class="market">
                        <h2>Mercado</h2>
                    </div>
                  
            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection