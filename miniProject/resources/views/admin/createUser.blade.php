@extends('layouts.app')

@section('content')
  <h1 style="color:darkslategray;"> Add user</h1>   
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Fill the form') }}</div>
               
               
                <form action="/admin/indexAdmin" method="POST">

                    @csrf 

                    <div class="form-group">
                       <label for="name">Name</label>
                        {{-- {{ Form::text('name', null, array('class' =>'form-control')) }} --}}
                        <input class="form-control" type="text" name='name' placeholder='name' value=''>
                    </div>


                    <div class="form-group">
                        <label for="email">Email</label>
                        <input  class="form-control" type="text" name='email' placeholder='email' value=''>
                    </div>


                    <div class="form-group">
                       <label for="dep_id">Departament</label>
                       <input class="form-control" type="text" name='id_departament' placeholder='dep' value=''>
                    </div> 


                    <div class="form-group">
                       <label for="isAdmin">Is Admin?</label>
                        <input class="form-control" type="text" name='isAdmin' placeholder='adm' value=''>
                    </div>



                    <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                  
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                         <div class="row">
                 <div class="col-sm-6">
                 {{-- {!! Html::linkRoute('adminHome', 'Cancel', array($admin->id), array('class'=>'btn btn-danger btn-block'))  !!}  --}}
                <a href="/adminHome" class="btn btn-danger btn-block">Cancel</a>
                 </div>

                <div class="col-sm-6">
                  {{-- {{ Form::submit('Save', array('class' =>'btn btn-success btn-block')) }} --}}
                  <button type='submit' class='btn btn-success btn-block'>Save</button>
                  
                </div>
              </div>
              {!! Form::close() !!}


                {{-- {!! Form::open(['action' => 'AdminUserController@storeUser','method'=> 'POST','enctype'=>'multipart/form-data']) !!}
                @csrf
                @method('post')
                   
              
                    <div class="form-group">
                        {{ Form::label('name','Name:') }}
                        {{ Form::text('name', null, array('class' =>'form-control')) }}
                    </div>

                     <div class="form-group">
                        {{ Form::label('dep_id','Departament:') }}
                        {{ Form::text('dep_id', null, array('class' =>'form-control')) }}
                    </div>  --}}

                     {{-- {{ Form::label('dep_id', 'Departament:')}}
					  <select class="form-group" name="dep_id">
						@foreach($deps as $dep)
							<option value='{{ $dep->id}}'> {{ $dep->name}} </option>
						@endforeach	
				      </select> --}}

                    {{-- <div class="form-group">
                    {{Form::label('email','Email:')}}
                    {{Form::text('email',null,array('class'=>'form-control'))}}
                    </div>

                    

                    <div class="form-group">
                        {{ Form::label('isAdmin','Admin?:') }}
                        {{ Form::text('isAdmin', null, array('class' =>'form-control')) }}
                    </div>
            
            
                     <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                
                     {{ Form::submit('Create', ['class' =>'btn btn-dark btn-lg btn-block']) }}
                    
                    {!! Form::close() !!} --}}
    
                                   
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection