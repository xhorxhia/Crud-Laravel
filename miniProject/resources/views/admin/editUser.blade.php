@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="text-align: center; font-size:3em; color:darkslategray;"> 
                        Admin Dashboard
                    </div>
            </div>
        </div>
    </div>
<div class="container">
        <div class="col-md-8 col-md-offset-2">
            <h1>Edit User </h1>
            <hr>

 {{-- {!! Form::open(['action' => ['AdminUserController@updateUser', $admin->id], 'method' => 'PUT', 'enctype'=>'multipart/form-data']) !!} --}}
         {{-- {!! Form::open(['method' => 'PATCH', 'action'=> ['AdminUserController@updateUser', Request::user()->id]]) !!} --}}
     
         <form action='/admin/{{$admin->id}}' method='POST'>

                  @csrf
                {{ @method_field('PATCH') }}


                    <div class="form-group">
                       <label for="name">Name</label>
                        {{-- {{ Form::text('name', null, array('class' =>'form-control')) }} --}}
                        <input class="form-control" type="text" name='name' placeholder='name' value='{{$admin->name}}'>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input  class="form-control" type="text" name='email' placeholder='email' value='{{$admin->email}}'>
                    </div>

                     <div class="form-group">
                       <label for="dep_id">Departament</label>
                       <input class="form-control" type="number" name='id_departament' placeholder='dep' value='{{$admin->id_departament}}'>
                    </div> 

                     {{-- {{ Form::label('dep_id', 'Departament:')}}
					  <select class="form-group" name="dep_id">
						@foreach($departaments as $departament)
							<option value='{{ $departament->id}}'> {{ $departament->name}} </option>
						@endforeach	
				      </select> --}}

                    <div class="form-group">
                       <label for="isAdmin">Is Admin?</label>
                        <input class="form-control" type="text" name='isAdmin' placeholder='adm' value='{{$admin->isAdmin}}'>
                    </div>
                
                {{-- {!! Html::linkRoute('admin.show', 'Cancel', array($admin->id), array('class' =>'btn btn-danger btn-block')) !!} --}}
                {{-- {!! Html::linkRoute('admin.indexAdmin', 'Cancel', array($admin->id), array('class' =>'btn btn-danger btn-block')) !!} --}}
                 

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
                 {!! Html::linkRoute('adminHome', 'Cancel', array($admin->id), array('class'=>'btn btn-danger btn-block'))  !!} 

                 </div>

                <div class="col-sm-6">
                  {{-- {{ Form::submit('Save', array('class' =>'btn btn-success btn-block')) }} --}}
                  <button type='submit' class='btn btn-success btn-block'>Save</button>
                  
                </div>
              </div>
              {!! Form::close() !!}
        </div>
    </div>

</div>
@endsection