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

                    <h4>List of Users</h4>
                </div>
            </div>
        </div>
    </div>
<div class="container">
    <div class="row">
    @if(count($admins) > 0)
        <table class="table table-dark " style="text-align: center; color:floralwhite;">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">isAdmin</th>
                <th scope="col">Email</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated_at</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        @foreach($admins as $admin)
            <div class="col-md-4 col-md-offset-1">
                <div class="post">
                    <tr> 
                        <td>{{ $admin->id }} </td>
                        <td>{{ $admin->name }} </td>
                        <td>{{ $admin->isAdmin }}</td>
                        <td>{{ $admin->email }} </td>
                        <td>{{date('M j, Y H:i', strtotime($admin-> created_at))}}</td>
                        <td>{{date('M j, Y H:i', strtotime($admin-> updated_at))}}</td>
                        <td><a href="/admin/{{$admin->id}}/editUser" class="btn btn-light">Edit</td>
                        <td><a href="/{{$admin->id}}/deleteUser" class="btn btn-danger">Delete</td>

                       
                    <hr>
                </tr>
                </div>
            </div>
        @endforeach
    </tbody>
    </table>
    <div class="text-center">
    {!! $admins->links(); !!}  <!-- per pagination -->
    </div>
    @else
        <p>There is no admin!</p>
    @endif
</div>
</div>

</div>
@endsection


<!-- 
<td><a href="/{ {$admin->id}}/editUser" class="btn btn-primary">Edit</a></td>
                        <td><form method="POST" action="/{ {$admin->id}}">
                                { { csrf_field() }}
                                 { { method_field('DELETE') }}
                        
                                <div class="form-group">
                                    <input type="submit" class="btn btn-danger delete-user" value="Delete user">
                                </div>
                            </form>
                        </td>





                        

                        -->