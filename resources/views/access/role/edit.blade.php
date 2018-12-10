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

                    <form action="{{ url('/access/role/'.$roles->id) }}}" method="post">
                        <input type="hidden" name="_method" value="PATCH">

                        {{ csrf_field() }}

                    {{-- <div class="card-header">Edit Role #{{ $role->id }}</div> --}}
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-5">
                                <h4 class="card-title mb-0">
                                    Role Management
                                    <small class="text-muted">Edit Role</small>
                                </h4>
                            </div><!--col-->
                        </div><!--row-->
                        <!--row-->

                        <hr />


                        {{-- <a href="{{ url('/access/role') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a> --}}




                        {{-- {!! Form::model($role, [
                            'method' => 'PATCH',
                            'url' => ['/access/role', $role->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('access.role.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!} --}}

                        <div class="row mt-5 mb-4">

                            <div class="col">

                                <div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
                                    <label class="col-md-2 form-control-label">Name</label>
                                    <div class="col-md-10">
                                        <input name="name" class="form-control" placeholder="" value="{{ $roles->name }}">
                                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 form-control-label">Permission</label>
                                    <div class="col-md-10">
                                    <select style="width: 100%;" class="role-manage-permission-edit form-control" name="permissions[]" multiple="multiple">
                                        @foreach ($permissions as $permission)
                                        {{-- {{ $role->id }} --}}
                                            <option value="{{ $permission->id }}" @foreach ($role_has_permission as $select) @if( $select->permission_id ==  $permission->id ) selected="selected" @endif @endforeach>{{ $permission->name }} </option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('permissions', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>

                            </div>

                        </div>



                    </div> <!-- card-body -->

                    <div class="card-footer">
                        <div class="row">
                            <div class="col">

                                <a href="{{ url('/access/role') }}" class="btn btn-danger ">Cancel</a>
                            </div><!--col-->

                            <div class="col text-right">

                                <input type="submit" class="btn btn-primary" value="Update">
                            </div><!--col-->
                        </div><!--row-->
                    </div><!--card-footer-->


                    </form>
                </div>
            </div>
	</div>
{{-- </div> --}}
@endsection

@push('scripts')

<script>
$(document).ready(function() {
    $('.role-manage-permission-edit').select2();
});
</script>

@endpush
