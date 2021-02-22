
@extends('layouts.app')

@section('content')
  <h1 style="color:darkslategray;"> Add Departament</h1>   
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Fill the form') }}</div>
                 
 
                {!! Form::open(['action' => 'AdminDepController@storeDep','method'=> 'POST','enctype'=>'multipart/form-data']) !!}

                @csrf
                @method('post')
                   
              
                    <div class="form-group">
                        {{ Form::label('name','Name:') }}
                        {{ Form::text('name', null, array('class' =>'form-control')) }}
                    </div>
                
                     {{ Form::submit('Create', ['class' =>'btn btn-dark btn-lg btn-block']) }}
                    
                    {!! Form::close() !!}
    
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection