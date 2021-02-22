@extends('layouts.app')

@section('content')

 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: center; font-size:3em; color:darkslategray;"> 
                    Welcome user!</div>
                    <div class="card-body" style="text-align: center;color:darkslategray;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        You are logged in! 
                    <p> You can Visit or Edit your profile</p>
                </div>
 
                {{-- <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-5">
                        <a href="/employees/create">
                        <button type="submit" class="tn btn-dark">
                            {{ __('Create') }}
                        </button>
                                
                        
                    </div>
                 </div> --}}
                
    </div>
</div>


<!--div class="container">
    <div class="row">
	@ if(count($emp) > 1)
		@ foreach($employees as $emp)
			<div class="col-md-4 col-md-offset-1">
				<div class="emp">
					<h2>{ { $emp->name }}</h2>
					<div clas="col-md-4 col-sm-4">
							<img style="width:80%" src="/storage/cover_image/{ {$post->cover_image}}">
						</div>
					
					<a href='/employees/{ {$emp->name}}' class="btn btn-danger"> Visit profile </a><br>
					<small>Created in { {date('M j, Y H:i', strtotime($emp -> created_at))}}</small>
					<hr>
				</div>
			</div>
		@ endforeach
	@ else
		<p>You haven't created your profile yet </p>
	@ endif
</div>
</div>
@endsection
