@extends('layouts.app')

@section('content')
{{-- <div class="container"> --}}

	<div class="row">
		<div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">Role</div> --}}
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-5">
                                <h4 class="card-title mb-0">
                                    Role Management
                                </h4>
                            </div><!--col-->

                            <div class="col-sm-7">
                                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                                    @can('user-add')
                                    <a href="{{ url('/access/role/create') }}" class="btn btn-success btn-sm ml-1" data-toggle="tooltip" title="Create New"><i class="fa fa-plus" aria-hidden="true"></i> New</a>
                                    @endcan
                                </div><!--btn-toolbar-->
                            </div><!--col-->
                        </div><!--row-->

                        <br>




                       {{--  <a href="{{ url('/access/role/create') }}" class="btn btn-success btn-sm" title="Add New Role">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a> --}}



                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Name</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($role as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td> {{ ucwords($item->name) }}</td>
                                        <td>
                                            <a href="{{ url('/access/role/' . $item->id) }}" title="View Role"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            @if($item->name != 'superadmin' && $item->name != 'administrator')
                                            <a href="{{ url('/access/role/' . $item->id . '/edit') }}" title="Edit Role"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/access/role', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete Role',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $role->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
	</div>
{{-- </div> --}}
@endsection
