@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                       
                    @endif
                    <div class="">
                        <h1>{{ $data['name'] }}</h1>
                        <h3>{{ $data['descr'] }} </h3>
                        <hr>
                        <p>Progarg es un sitio web donde los usuarios pueden publicar sus ofertas de trabajo y sumar postulantes a una posicion abierta</p>
                        <p>Al mismo tiempo, los usuarios pueden postularse a esas posiciones si son validados como programadores.</p>
                        <p>Tambien pueden publicar proyectos, promociones, tutoriales o cualquier tipo de contenido que deseen para promocionarse y que los recluadores se fijen en ellos</p>
                        <h4>Registro de usuarios</h4>
                        <p>Al registrarse en el sitio web, los usuarios pueden optar por una de estos roles de usuario</p>
                        <ul>
                            <li>Recruiter</li>
                            <li>Postulant</li>
                            <li>Colaborator</li>
                            <li>Suscriptor</li>

                        </ul>

                        <h4>Permisos de usuarios segun rol</h4>
                        <p><b>Recruiter</b></p>
                        <ul>
                         
                            <li>Ver perfiles de postulantes</li>
                            <li>Ver / Descargar CV de postulantes</li>
                            <li>Contactar a postulantes</li>
                            <li>Publicar perfil de usuario</li>
                            <li>Publicar posiciones</li>
                            <li>Publicar posts</li>
                        </ul>
                        <p><b>Postulant</b></p>
                        <ul>
                        
                            <li>Ver perfiles de recruiters</li>
                            <li>Postularse a posiciones abiertas</li>
                            <li>Publicar perfil de usuario</li>
                            <li>Publicar proyectos</li>
                            <li>Publicar posts</li>
                          
                        </ul>

                        <p><b>Colaborator</b></p>
                        <ul>
                         
                            <li>Publicar perfil de usuario</li>
                            <li>Publicar posts</li>
                           
                        </ul>
                        <p><b>Suscriptor</b></p>
                        
                        <ul>
                         
                            <li>Publicar perfil de usuario</li>
                           
                        </ul>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
