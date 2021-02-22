@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              
                  
                  
                <div class="card-header " style="text-align:center;font-size: 4em; color:darkslategray; font-family:Georgia, 'Times New Roman', Times, serif">{{ __('My Profile') }}</div>
                <h1 style="color:darkslategray;">{{ $user->name}}</h1> 
                
                <div class="row">
                    <div clas="col-md-4 col-sm-4">
                    <img style="width:80%" src="/storage/cover_image/{{$user->cover_image}}">
                </div>


                <div class="card-body">
                <h3 style="color:darkslategray;">Email:</h3> <h4>{{$user->email }}</h4>  
                </div>

                <div class="card-body">
                <h3 style="color:darkslategray;">Departament:</h3><h4>{{$user->id_departament }}</h4>  
                </div>
                
                <div class="card-body">
                <h3 style="color:darkslategray;">Telephone number:</h3><h4>{{$user->tel }}</h4>  
                </div>
                <hr>
                <div class="col-md-4" style="font-style:italic; color:gray">
                    <div class="well">
                        <dl class="dl-horizontal">
                            <dt>Created at:</dt>
                            <dd>{{$user->created_at}}</dd>
                        </dl>   

                        <dl class="dl-horizontal">
                                <dt>Last updated:</dt>
                                <dd>{{$user->updated_at}}</dd>
                            </dl> 
                       
                            <div class="row">
                                <div class="col-sm-8">
                                   {!!Form::open(['route'=>['users.edit', $user->id], 'method'=> 'GET']) !!}
                                    {!! Form::submit('Edit', ['class'=>'btn btn-dark btn-block'])!!}
                                 </div>

                                <div class="col-sm-8">
                                    {{-- {!!Form::open(['route'=>['users.destroy', $user->id], 'method'=> 'DELETE']) !!}
                                    {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block'])!!} --}}

                                    <a href="/{{$user->id}}/deleteprofile" class='btn btn-danger btn-block'>Delete</a>
                                    {!! Form::close() !!}
                                   
                                    
                                    
                                    {{-- <a href='/{{$user->name}}' class='btn btn-dark'>Chat</a> --}}
                                     
                                     <label for="chat">Enter chat system</label>

                      <a href="/chat"><button class="btn btn-dark btn-block" name="chat">Chat</button></a>
                                     
                                     
                                     </div>
                            </div>         
                </div>   

            </div>
        </div>
    </div>
</div>                   
@endsection