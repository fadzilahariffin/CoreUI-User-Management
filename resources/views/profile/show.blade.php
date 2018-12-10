@extends('layouts.app')

@section('content')


<div class="row">
		<div class="col-md-12">

			<div class="card">
		        <div class="card-body">

		        	<div class="row mt-2">
		        		<div class="col-sm-8 offset-md-2">
		        			<h3 class=""><b>My Profile</b></h3>
		        		</div>
		        		
		        	</div>
		            <div class="row mt-5 mb-5">

		            	
						
		            	<div class="col-md-2 offset-md-2" align="center">
		                    <img class="profile-icon img-avatar" src="https://www.gravatar.com/avatar/{{md5(strtolower(trim(Auth::user()->email)))}}?s=160&d=retro" alt="Profile picture" style="width: 70px; text-align: center; margin-bottom: 20px;">
		                    <br>
		                    <b style="margin-top: -100px;">{{ $users->first_name }} {{ $users->last_name }}</b>
		                    
		                </div>

						<div class="col-md-6 {{-- offset-md-2 --}}">
                                
		                        <table class="table">
		                            
		                            <tr>
		                                <th>Email</th>
		                                <td>{{ $users->email }}</td>
		                            </tr>
		                            <tr>
		                                <th>Status</th>
		                                <td>@if($users->active) Active @else Deactivated @endif</td>
		                            </tr>
		                            <tr>
		                                <th>Role</th>
		                                <td>
		                                	 @if(!empty($users->getRoleNames()))
                                                @foreach($users->getRoleNames() as $role)
                                                  <span class="badge badge-info"> {{ ucwords($role) }} </span>
                                                @endforeach
                                            @endif 
		                                </td>
		                            </tr>
		                           
		                          
		                          
		                           
		                        </table>

		                </div>

		           

		            </div>

		        </div>
		         <div class="card-footer">
		            <div class="row">
		                <div class="col">
		                    
                        	{{-- <a class="btn btn-danger btn-sm" href="{{ url('/access/user') }}">Back</a> --}}

			                </div><!--col-->

			                <div class="col text-right">
			                   
			                    <a class="btn btn-success btn-sm pull-right" href="/profile/{{ $users->id }}/edit">Update Profile</a>
			                </div><!--row-->
		            </div><!--row-->

					

		        </div><!--card-footer-->
		    </div>

		</div>
</div>

@endsection