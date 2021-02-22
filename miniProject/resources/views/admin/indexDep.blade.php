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

                    <h4>List of Departaments</h4>
                </div>
            </div>
        </div>
    </div>
<div class="container">
    <div class="row">
    @if(count($deps) > 0)
        <table class="table table-dark " style="text-align: center; color:floralwhite;" id="tabela">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated_at</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th> 
            </tr>
        </thead>
        <tbody>
        @foreach($deps as $dep)
            <div class="col-md-4 col-md-offset-1">
                <div class="post">
                    <tr> 
                        <td>{{ $dep->id }} </td>
                        <td><a href="/{{$dep->id}}/listUsers" style='color:white' >{{ $dep->name }} </td>
                    
                        <td>{{date('M j, Y H:i', strtotime($dep-> created_at))}}</td>
                        <td>{{date('M j, Y H:i', strtotime($dep-> updated_at))}}</td>
                        <td><a href="/admin/{{$dep->id}}/editDep" class="btn btn-light">Edit</td>
                        <td><a href="/{{$dep->id}}/delete" class="btn btn-danger">Delete</td>

                       
                    <hr>
                </tr>
                </div>
            </div>
        @endforeach
    </tbody>
    </table>
    
    <div class="text-center">
    {!! $deps->links(); !!}  <!-- per pagination -->
    </div>
    @else
        <p>There is no departament!</p>
    @endif
</div>
</div>

</div>

@endsection
