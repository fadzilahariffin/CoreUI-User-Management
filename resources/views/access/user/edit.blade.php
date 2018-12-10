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
<form action="{{ url('/access/user/'.$user->id) }}}" method="post">
    <input type="hidden" name="_method" value="PATCH">

    {{ csrf_field() }}

	<div class="row">
		<div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">Edit User #{{ $user->id }}</div> --}}
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-5">
                                <h4 class="card-title mb-0">
                                    User Management
                                    <small class="text-muted">Edit User</small>
                                </h4>
                            </div><!--col-->
                        </div><!--row-->
                        <!--row-->

                        <hr />



                        {{-- <a href="{{ url('/access/user') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br /> --}}



                        {{-- {!! Form::model($user, [
                            'method' => 'PATCH',
                            'url' => ['/access/user', $user->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('access.user.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!} --}}


                        {{-- New Form --}}

                                <div class="row">

                                    <div class="col">

                                        <div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}} mt-5">
                                            <label class="col-md-2 form-control-label">First Name</label>
                                            <div class="col-md-10">
                                                <input name="first_name" class="form-control" placeholder="" value="{{ $user->first_name }}">
                                            </div>
                                        </div>

                                        <div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
                                            <label class="col-md-2 form-control-label">Last Name</label>
                                            <div class="col-md-10">
                                            <input name="last_name" class="form-control" placeholder="" value="{{ $user->last_name }}">
                                            </div>
                                        </div>

                                        <div class="form-group row {{ $errors->has('email') ? 'has-error' : ''}}">
                                            <label class="col-md-2 form-control-label">Email</label>
                                            <div class="col-md-10">
                                            <input name="email" class="form-control" placeholder="" value="{{ $user->email }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Role</label>
                                        <div class="col-md-10">
                                        <select style="width: 100%;" class="user-manage-role-edit form-control" name="roles[]" multiple="multiple">
                                            @foreach ($roles as $role)

                                                <option value="{{ $role->id }}" @foreach ($selected as $select) @if( $select ==  $role->name ) selected="selected" @endif @endforeach>{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>



                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Status</label>

                                         <div class="col-md-10">
                                            <div class="radio">
                                                <label for="radio1">
                                                <input type="radio" name="active" id="radio1" value="1" required @if($user->active == '1') checked="" @endif> Active
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label for="radio2">
                                                <input type="radio" name="active" id="radio2" value="0" required @if($user->active == '0') checked="" @endif> Deactivated
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    </div>

                                </div>














                                 {{-- <div class="form-group">

                                    <input type="submit" class="btn btn-success pull-right" value="Save">
                                </div> --}}




                        {{-- New Form --}}

                    </div> {{-- card-body --}}

                    <div class="card-footer">
                        <div class="row">
                            <div class="col">

                                <a href="{{ url('/access/user') }}" class="btn btn-danger ">Cancel</a>
                            </div><!--col-->

                            <div class="col text-right">

                                <input type="submit" class="btn btn-success " value="Save">
                            </div><!--col-->
                        </div><!--row-->
                    </div><!--card-footer-->


                </div>
            </div>
	</div>

    </form>
{{-- </div> --}}
@endsection

@push('scripts')

<script>
$(document).ready(function() {
    $('.user-manage-role-edit').select2();
});
</script>

@endpush
