@extends('layouts.app')

@section('content')
{{-- <div class="container"> --}}

	<div class="row">
		<div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">{{ $user->name }}</div> --}}
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-5">
                                <h4 class="card-title mb-0">
                                    User Management <small class="text-muted">User Details</small>
                                </h4>
                            </div><!--col-->

                            <div class="col-sm-7">
                                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                                   {{--  @can('user-add')
                                    <a href="{{ url('/access/user/create') }}" class="btn btn-success btn-sm ml-1" data-toggle="tooltip" title="Create New"><i class="fa fa-plus" aria-hidden="true"></i> New</a>
                                    @endcan --}}



                                        <div class="pull-right">
                                           <a href="{{ url('/access/user/' . $user->id . '/edit') }}" title="Edit user"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                        {!! Form::open([
                                            'method'=>'DELETE',
                                            'url' => ['user', $user->id],
                                            'style' => 'display:inline'
                                        ]) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-sm',
                                                    'title' => 'Delete user',
                                                    'onclick'=>'return confirm("Confirm delete?")'
                                            ))!!}
                                        {!! Form::close() !!}
                                        </div>



                                </div><!--btn-toolbar-->
                            </div><!--col-->
                        </div><!--row-->

                        <hr class="mb-5">

                        <br>





                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    {{-- <tr>
                                        <th>ID</th><td>{{ $user->id }}</td>
                                    </tr> --}}
                                    <tr>
                                        <th>First Name </th>
                                        <td> {{ $user->first_name }} </td>
                                    </tr>
                                    <tr>
                                        <th> Last Name </th>
                                        <td> {{ $user->last_name }} </td>
                                    </tr>
                                    <tr><th> Email </th>
                                        <td> {{ $user->email }} </td>
                                    </tr>
                                    <tr>
                                        <th> Roles </th>
                                        <td>
                                            @if(!empty($user->getRoleNames()))
                                                @foreach($user->getRoleNames() as $role)
                                                  <span class="badge badge-info"> {{ ucwords($role) }} </span>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col">

                                <a href="{{ url('/access/user') }}" class="btn btn-warning ">Back</a>
                                {{-- <a href="{{ url('/access/user') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a> --}}
                            </div><!--col-->

                            <div class="col text-right">

                                {{-- <input type="submit" class="btn btn-success " value="Save"> --}}
                            </div><!--col-->
                        </div><!--row-->
                    </div><!--card-footer-->



                </div>
            </div>
	</div>
{{-- </div> --}}
@endsection
