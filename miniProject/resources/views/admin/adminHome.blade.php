@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: center; font-size:3em; color:darkslategray;"> 
                    Welcome admin!
                </div>

                <div class="card-body" style="text-align: center;color:darkslategray;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in successfully!
                </div>
            </div>
        </div>
    </div><br>
  
  <div class="container" >
  <div class="row justify-content-center">
    <div class="col-md-7">
          
                <a href="/createUser" class="btn btn-dark">Create User</a>
             
                <a href="/indexAdmin" class="btn btn-dark">List User</a>

                <a href="/createDep" class="btn btn-dark"> Create Departament</a>

                <a href="/indexDep" class="btn btn-dark"> List Departaments</a>
                
                 <a href="/chat"><button class="btn btn-dark" name="chat">Chat</button></a>
              </div>
     </div>
    </div>
     </div>
@endsection