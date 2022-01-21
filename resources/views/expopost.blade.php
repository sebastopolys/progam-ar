@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Posiciones') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <img src=" {{ asset('images/'.$expopost->img_route)   }}" width="450px" height="270px"/>

                    <h1>{{ $expopost->titulo }}</h1>
                    <h3>{{ $expopost->descripcion }}</h3>
             
                    {!! html_entity_decode($expopost->contenido) !!}

                   <span><p>Tagged under: {{ $expopost->tags }}</p></span>
           
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection