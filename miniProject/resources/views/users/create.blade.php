@extends('layouts.app')

@section('content')
    <h1 style="color:darkslategray;"> Create your profile</h1>   
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Fill the form') }}</div>

                    {!! Form::open(['action' => 'UserController@store','method'=> 'POST','enctype'=>'multipart/form-data']) !!}
    
                    {{-- !! Form::open(['action' => 'employees.store', 'data-parsley-validate'=>'', 'file'=>true]) !!}
                    {{-- perdorim kte per arsye sigurie --}}
                    <div class="form-group">
                        {{ Form::label('name','Name:') }}
                        {{ Form::text('name', null, array('class' =>'form-control')) }}
                    </div>

                    <div class="form-group">
                    {{Form::label('email','Email:')}}
                    {{Form::text('email',null,array('class'=>'form-control'))}}
                    </div>

                     <div class="form-group">
                    {{Form::label('id_departament','Departament:')}}
                    {{Form::text('id_departament',null,array('class'=>'form-control'))}}
                    </div>

                    <div class="form-group">
                        {{ Form::label('tel','Tel:') }}
                        {{ Form::text('tel', null, array('class' =>'form-control')) }}
                    </div>

                    <div class="form-group"> 
                        {{Form::file('cover_image')}}
                    
                    </div>
                     {{ Form::submit('Create', array('class' =>'btn btn-dark btn-lg btn-block','style'=>'margin-top:20px')) }}
                     
                    
                    {!! Form::close() !!}
    
                                   
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection





 {{-- <form action='/users/create' method='GET'>

                  @csrf
                {{ @method_field('GET') }}


                    <div class="form-group">
                       <label for="name">Name</label>
                        <input class="form-control" type="text" name='name' placeholder='name' value='{{$user->name}}'>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input  class="form-control" type="text" name='email' placeholder='email' value='{{$user->email}}'>
                    </div>


                     <div class="form-group">
                       <label for="dep_id">Departament</label>
                       <input class="form-control" type="text" name='dep_id' placeholder='dep' value='{{$user->dep_id}}'>
                    </div> 

                    <div class="form-group">
                       <label for="tel">Tel</label>
                       <input class="form-control" type="text" name='tel' placeholder='tel' value='{{$->tel}}'>
                    </div> 

                    <div class="form-group"> 
                        {{Form::file('cover_image')}}
                    
                    </div>

                  <div class="row">
                 <div class="col-sm-6">
                        <a href='/adminHome' class='btn btn-danger btn-block'>Cancel</a>
                 </div>

                <div class="col-sm-6">
                  <button type='submit' class='btn btn-success btn-block'>Save</button>
                  
                </div>
              </div>
              

                    </form> --}}
