@extends('layouts.app')

@section('content')
{{-- <div class="container"> --}}

	<form action="{{ url('/access/users/change/'.$user->id) }}}" method="post">
      <input type="hidden" name="_method" value="PATCH">

        {{ csrf_field() }}

	<div class="row">
		<div class="col-md-12">

			<div class="card">
		        <div class="card-body">
		            <div class="row">
		                <div class="col-sm-5">
		                    <h4 class="card-title mb-0">
		                        {{ __('labels.backend.access.users.management') }}
		                        <small class="text-muted">{{ __('labels.backend.access.users.change_password') }}</small>
		                    </h4>

		                    <div class="small text-muted">
		                        {{ __('labels.backend.access.users.change_password_for', ['user' => $user->first_name ." ". $user->last_name]) }}
		                    </div>
		                </div><!--col-->
		            </div><!--row-->

		            <hr />

		            {{-- <form action="{{ url('access/user/'.{{ $user->id }}.'/password') }}" method="post">
                        <input type="hidden" name="_method" value="POST"> --}}



		            <div class="row mt-5 mb-3">
		                <div class="col">
		                    <div class="form-group row">
		                        {{-- {{ html()->label(__('validation.attributes.backend.access.users.password'))->class('col-md-2 form-control-label')->for('password') }} --}}
		                        <label class="col-md-2 form-control-label">{{ __('validation.attributes.backend.access.users.password') }}</label>

		                        <div class="col-md-10">
		                           {{--  {{ html()->password('password')
		                                ->class('form-control')
		                                ->placeholder( __('validation.attributes.backend.access.users.password'))
		                                ->required()
		                                ->autofocus() }} --}}

		                                <input type="password" name="password" class="form-control" placeholder="{{ __('validation.attributes.backend.access.users.password') }}" value="{{ old('password') }}" required="">
		                        </div><!--col-->
		                    </div><!--form-group-->

		                    <div class="form-group row">
		                        {{-- {{ html()->label(__('validation.attributes.backend.access.users.password_confirmation'))->class('col-md-2 form-control-label')->for('password_confirmation') }} --}}
		                        <label class="col-md-2 form-control-label">{{ __('validation.attributes.backend.access.users.password_confirmation') }}</label>

		                        <div class="col-md-10">
		                            {{-- {{ html()->password('password_confirmation')
		                                ->class('form-control')
		                                ->placeholder( __('validation.attributes.backend.access.users.password_confirmation'))
		                                ->required() }} --}}

		                                <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('validation.attributes.backend.access.users.password_confirmation') }}" value="{{ old('password_confirmation') }}" required="">
		                        </div><!--col-->
		                    </div><!--form-group-->
		                </div><!--col-->
		            </div><!--row-->
		        </div><!--card-body-->

		        <div class="card-footer">
		            <div class="row">
		                <div class="col">
		                    {{-- {{ form_cancel(route('admin.auth.user.index'), __('buttons.general.cancel')) }} --}}
		                    {{-- <a href="{{ url('/access/user') }}" title="{{ __('buttons.general.cancel') }}">
	                            <button class="btn btn-warning">
	                            	<i class="fa fa-arrow-left" aria-hidden="true"></i>
	                        	</button>
                        	</a> --}}
                        	<a class="btn btn-danger btn-sm" href="{{ url('/access/user') }}">{{ __('buttons.general.cancel') }}</a>

		                </div><!--col-->

		                <div class="col text-right">
		                    {{-- {{ form_submit(__('buttons.general.crud.update')) }} --}}
		                    <input type="submit" class="btn btn-success btn-sm pull-right" value="{{ __('buttons.general.crud.update') }}">
		                </div><!--row-->
		            </div><!--row-->



		        </div><!--card-footer-->
		    </div><!--card-->

        </div>
	</div>
{{-- </div> --}}
</form><!-- Form -->
@endsection
