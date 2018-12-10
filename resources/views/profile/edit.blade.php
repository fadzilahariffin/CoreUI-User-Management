@extends('layouts.app')

@section('content')

<form action="{{ url('/profile/'.$user->id) }}}" method="post">
      <input type="hidden" name="_method" value="PATCH">

        {{ csrf_field() }}


<div class="row">
		<div class="col-md-12">

			<div class="card">
		        <div class="card-body">

		        	<div class="row">
		                <div class="col-sm-5">
		                    <h4 class="card-title mb-0">
		                        User Profile
		                        {{-- <small class="text-muted">{{ __('labels.backend.access.users.change_password') }}</small> --}}
		                    </h4>

		                    <div class="small text-muted">
		                        {{-- {{ __('labels.backend.access.users.change_password_for', ['user' => $user->name]) }} --}}
		                        Update profile for {{ $user->last_name }}
		                    </div>
		                </div><!--col-->
		            </div><!--row-->

		            <hr />


		             <div class="row mt-4 mb-4">
		                <div class="col">
		                    <div class="form-group row">
		                        
		                        <label class="col-md-2 form-control-label">Picture Profile</label>

		                        <div class="col-md-6">
		                           
		                                <input type="text" name="profile_location" class="form-control" placeholder="" value="{{ $user->profile_location }}" required=""> 

		                        </div><!--col-->
		                    </div><!--form-group-->

		                    <div class="form-group row">
		                        <label class="col-md-2 form-control-label">First Name</label>

		                        <div class="col-md-6">

		                                <input type="text" name="first_name" class="form-control" placeholder="Enter first name" value="{{ $user->first_name }}" required=""> 

		                        </div><!--col-->
		                    </div><!--form-group-->

		                    <div class="form-group row">
		                        <label class="col-md-2 form-control-label">Last Name</label>

		                        <div class="col-md-6">

		                                <input type="text" name="last_name" class="form-control" placeholder="Enter last name" value="{{ $user->last_name }}" required=""> 

		                        </div><!--col-->
		                    </div><!--form-group-->

		                </div><!--col-->
		            </div><!--row-->

		        </div>

		        <div class="card-footer">
		            <div class="row">
		                <div class="col">
		                    
                        	<a class="btn btn-danger btn-sm" href="{{ url('/profile') }}">Back to profile</a>

		                </div><!--col-->

		                <div class="col text-right">

		                    <input type="submit" class="btn btn-success btn-sm pull-right" value="{{ __('buttons.general.crud.update') }}"> 

		                </div><!--row-->
		            </div><!--row-->

					

		        </div><!--card-footer-->
		       

		</div>
</div>

</form><!-- Form -->
@endsection