@extends('layouts.app')

@section('content')

    <h1 style="color:darkslategray;"> Edit user</h1>   
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Fill the form') }}</div>

             {{-- {!! Form::open(['action' => 'UserController@update','method'=> 'PUT','enctype'=>'multipart/form-data']) !!}  --}}

         {{-- {!! Form::open(['method' => 'PATCH', 'action'=> ['UserController@update', Request::user()->id]]) !!} --}}
                  
                  {!! Form::model($user, ['route' =>['users.update', $user->id], 'method'=>'PUT', 'enctype'=>'multipart/form-data']) !!}
                  @csrf
                  @method('put')
                  
    
                    
                    <div class="form-group">
                        {{ Form::label('name','Name:') }}
                        {{ Form::text('name', null, array('class' =>'form-control')) }}
                    </div>

                    <div class="form-group">
                    {{Form::label('email','Email:')}}
                    {{Form::text('email',null,array('class'=>'form-control'))}}
                    </div>

                    <div class="form-group">
                        {{ Form::label('number','Tel:') }}
                        {{ Form::text('number', null, array('class' =>'form-control')) }}
                    </div>


                    <div class="form-group"> 
                        {{ Form::label('cover_image','Uplaod Image :') }}
                        {{Form::file('cover_image')}}
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
                                <div class="col-sm-6">
                                    {!! Html::linkRoute('users.show', 'Cancel', array($user->id), array('class' =>'btn btn-danger btn-block')) !!}
                                 </div>

                                <div class="col-sm-6">
                                    {{Form::submit('Save', ['class'=>'btn btn-success btn-block'])}}                                 

                                </div>

                            </div>        
                </div>   
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>   
               
@endsection