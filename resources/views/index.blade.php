@extends('layouts.app')



@section('content')
<div id="main" class="container-fluid col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5" >
   
        <div class="col-10 col-sm-8 col-lg-6">
            <img class="d-block mx-lg-auto img-fluid" width="220" src="{{ asset('images/SC-Logo-1630869569.png') }}">
        </div>


        <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3">Programadores Argentinos - PROGARG 2</h1> 
            <p class="lead">
                Hola  {{ $data ['name']}}, La comunidad mas grande de programadores de Argentina</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">

                <button class="btn btn-primary btn-lg px-4 me-md-2">Postulant</button>
                <button class="btn btn-outline-secondary btn-lg px-4">Recruiter</button>
                </div>
        </div>
    </div>
</div>
@endsection

