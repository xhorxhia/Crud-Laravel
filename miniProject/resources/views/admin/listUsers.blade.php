@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="text-align: center; font-size:3em; color:darkslategray;"> 
                        Admin Dashboard
                    </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>Users of This Departament</h4>
                </div>
            </div>
        </div>
    </div>
<div class="container">
    <div class="row">
    @if(count($users) > 0)
        <table class="table table-dark " style="text-align: center; color:floralwhite;">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
         
            
            <div class="col-md-4 col-md-offset-1">
                <div class="post">
                    <tr> 
                        <td>{{ $user->id }} </td>
                        <td>{{ $user->name }} </td>

                       
                    <hr>
                </tr>
                </div>
            </div>

   
        @endforeach
    </tbody>
    </table>
    
    
    @else
        <p>There is no user!</p>
    @endif
</div>
</div>

</div>

@endsection
