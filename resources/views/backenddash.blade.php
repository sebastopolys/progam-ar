@extends('layouts.backend')


@section('backenddash')
<div class="container">
    <div>

        <h1>BACKEND DASH</h1>
        <form id="pag-form" name="pag-select" class="select" method="post" action="{{ route('intralog_hash') }}" enctype="multipart/form-data">
            @csrf
@if( $data['options'][0]->meta_value==5)selected @endif
    
            <div class="pagination-select">
                <label for="user_pag_sel">Paginate:</label>

                <select name="user_pag_sel" id="user_pag_sel" form="pag-form">
                    <option value="5"@if( $data['options'][0]->meta_value==5)selected @endif>5</option>
                    <option value="10"@if( $data['options'][0]->meta_value==10)selected @endif>10</option>
                    <option value="15"@if( $data['options'][0]->meta_value==15)selected @endif>15</option>
                    <option value="20"@if( $data['options'][0]->meta_value==20)selected @endif>20</option>
                    <option value="30"@if( $data['options'][0]->meta_value==30)selected @endif>30</option>
                    <option value="45"@if( $data['options'][0]->meta_value==45)selected @endif>45</option>
                    <option value="60"@if( $data['options'][0]->meta_value==60)selected @endif>60</option>
                    <option value="80"@if( $data['options'][0]->meta_value==80)selected @endif>80</option>
                    <option value="100"@if( $data['options'][0]->meta_value==100)selected @endif>100</option>
                </select>
            </div>    
            <input type="submit" value="Enter">
        </form> 
    </div>
<hr>

    <div id="usr-list">


    <h2>Users List:</h2>
    <table id="user">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Role</th>
            <th>email</th>
            <th>created</th>
            <th>Edited</th>
        </tr>
        @foreach ($data['users']  as $user )  
            @if ($user->role!='admin')
            <tr>
                <td> {{ $user->id }} </td>      
                <td> {{ $user->name }} </td>      
                <td> {{ $user->role }} </td> 
                <td> <p>{{ $user->email }}</p></td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
            </tr>
            @endif  
        @endforeach

        @foreach ($data['id_pos'] as $id_post )
            
        <p>{{ $id_post->titulo }}</p>
        @endforeach
      
    </table>
    </div>
    <div class="list-pag"> 
    

     {{ $data['users']->links() }}

    </div>



    <div>

    <hr>
        @foreach ($data['posts'] as $post )
        {{ $post->titulo }}
        {{ $post->auth_id }}
        {{ $post->estado }}
            <br/> 
        @endforeach

      
        
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/custom.js') }}" ></script>
@endsection