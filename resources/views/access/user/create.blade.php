@extends('layouts.app')

@push('after-styles')
    <style type="text/css">
        .select2-container--default .select2-selection--multiple{
            border-radius: 0px;
            border: 1px solid #c2cfd6;
        }
        .select2-container--default.select2-container--focus .select2-selection--multiple{
            color: #3e515b;
            background-color: #fff;
            border-color: #8ad4ee;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(32,168,216,.25)
        }
    </style>
@endpush

@section('content')
{{-- <div class="container"> --}}

	<div class="row">
		 <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">Create New User</div> --}}



                    <form action="{{ url('access/user') }}" method="post">
                            <input type="hidden" name="_method" value="POST">

                            {{ csrf_field() }}

                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-5">
                                <h4 class="card-title mb-0">
                                    User Management
                                    <small class="text-muted">New User</small>
                                </h4>
                            </div><!--col-->
                        </div><!--row-->
                        <!--row-->

                        <hr />






                        {{-- New Form --}}

                        <div class="row mt-5">
                            <div class="col">

                                <div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
                                    <label class="col-md-2 form-control-label">First Name</label>
                                    <div class="col-md-10">
                                    <input name="first_name" class="form-control" placeholder="" value="{{ old('first_name') }}">
                                    </div>
                                </div>

                                 <div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
                                    <label class="col-md-2 form-control-label">Last Name</label>
                                    <div class="col-md-10">
                                    <input name="last_name" class="form-control" placeholder="" value="{{ old('last_name') }}">
                                    </div>
                                </div>

                                 <div class="form-group row {{ $errors->has('email') ? 'has-error' : ''}}">
                                    <label class="col-md-2 form-control-label">Email</label>
                                    <div class="col-md-10">
                                    <input name="email" class="form-control" placeholder="" value="{{ old('email') }}">
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('password') ? 'has-error' : ''}}">
                                    <label class="col-md-2 form-control-label">Password</label>
                                    <div class="col-md-10">
                                    <input type="password" name="password" class="form-control" placeholder="" value="{{ old('password') }}">
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label class="col-md-2 form-control-label">Role</label>
                                    <div class="col-md-10">
                                    <select style="width: 100%;" class="user-manage-role-new form-control" name="roles[]" multiple="multiple">
                                        @foreach ($roles as $role)
                                        {{ $role->id }}
                                            <option value="{{ $role->id }}">{{ $role->name }} </option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-md-2 form-control-label">Status</label>
                                     <div class="col-md-10">
                                        <div class="radio">
                                            <label for="radio1">
                                            <input type="radio" name="active" id="radio1" value="1" required checked=""> Active
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label for="radio2">
                                            <input type="radio" name="active" id="radio2" value="0" required> Deactivated
                                            </label>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>



                    </div> {{-- Card Body --}}


                      <div class="card-footer">
                    <div class="row">
                        <div class="col">

                            <a class="btn btn-danger btn-sm" href="{{ url('/access/user') }}">{{ __('buttons.general.cancel') }}</a>

                            {{-- <a href="{{ url('/access/user') }}" title="Back">
                            <button class="btn btn-warning btn-sm">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a> --}}

                        </div><!--col-->

                        <div class="col text-right">
                            <input type="submit" class="btn btn-primary btn-sm pull-right" value="Save">
                        </div><!--row-->
                    </div><!--row-->

                    </form>
                        {{-- New Form --}}

                </div>
            </div>
	</div>
{{-- </div> --}}
@endsection

@push('scripts')

<script>
$(document).ready(function() {
    $('.user-manage-role-new').select2();
});
</script>

@endpush
