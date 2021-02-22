@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
             
            </div>
        </div>
<div class="container">
        <div class="col-md-8 col-md-offset-2">
            <h1>Edit Departament </h1>
            <hr>        
     
         <form action='/{{$dep->id}}/Dep' method='POST'>

                  @csrf
                {{ @method_field('PATCH') }}


                    <div class="form-group">
                       <label for="name">Name</label>
                        <input class="form-control" type="text" name='name' placeholder='name' value='{{$dep->name}}'>
                    </div>

                  
                 <div class="row">
                 <div class="col-sm-6">
                 {!! Html::linkRoute('adminHome', 'Cancel', array($dep->id), array('class'=>'btn btn-danger btn-block'))  !!} 

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