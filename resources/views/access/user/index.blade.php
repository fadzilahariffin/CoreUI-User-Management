@extends('layouts.app')

@section('content')


	<div class="row">
		<div class="col-md-12 col-lg-12">
                <div class="card">
                    {{-- <div class="card-header">User Management</div> --}}
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-5">
                                <h4 class="card-title mb-0">
                                    User Management
                                </h4>
                            </div><!--col-->

                            <div class="col-sm-7">
                                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                                    @can('user-add')
                                    <a href="{{ url('/access/user/create') }}" class="btn btn-success btn-sm ml-1" data-toggle="tooltip" title="Create New"><i class="fa fa-plus" aria-hidden="true"></i> New</a>
                                    @endcan
                                </div><!--btn-toolbar-->
                            </div><!--col-->
                        </div><!--row-->




                        {{-- @can('user-add')
                        <a href="{{ url('/access/user/create') }}" class="btn btn-success btn-sm" title="Add New user">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        @endcan --}}



                        <br>
                        <br>


                        {{-- DT --}}
                        <div class="table-responsive">
                            <table class="table table-borderless" id="users-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Role</th>
                                        <th>Last Updated</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        {{-- DT --}}





                                            {{-- Group Button --}}
                                           {{--  <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

                                              @can('user-view')
                                                <a href="{{ url('/access/user/' . $item->id) }}" title="View user"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                                @endcan

                                                @can('user-edit')
                                                <a href="{{ url('/access/user/' . $item->id . '/edit') }}" title="Edit user"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                                @endcan

                                              <div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  More
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">

                                                @if(auth()->user()->id != $item->id && ! $item->hasRole('superadmin') )
                                                  @can('user-delete')
                                                    {!! Form::open([
                                                        'method'=>'DELETE',
                                                        'url' => ['/access/user', $item->id],
                                                        'style' => 'display:inline'
                                                    ]) !!}
                                                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                                'type' => 'submit',
                                                                'class' => 'btn btn-danger btn-sm dropdown-item',
                                                                'title' => 'Delete user',
                                                                'onclick'=>'return confirm("Confirm delete?")'
                                                        )) !!}
                                                    {!! Form::close() !!}
                                                    @endcan

                                                    @if($item->active == true)
                                                    {!! Form::open([
                                                        'method'=>'GET',
                                                        'url' => ['/access/user/'. $item->id.'/deactivate'],
                                                        'style' => 'display:inline'
                                                    ]) !!}
                                                        {!! Form::button('<i class="fa fa-times" aria-hidden="true"></i> Deactivate', array(
                                                                'type' => 'submit',
                                                                'class' => 'btn btn-info btn-sm dropdown-item',
                                                                'title' => 'Deactivate user',
                                                                'onclick'=>'return confirm("Confirm deactivate?")'
                                                        )) !!}
                                                    {!! Form::close() !!}
                                                    @else
                                                    {!! Form::open([
                                                        'method'=>'GET',
                                                        'url' => ['/access/user/'. $item->id.'/reactivate'],
                                                        'style' => 'display:inline'
                                                    ]) !!}
                                                        {!! Form::button('<i class="fa fa-check" aria-hidden="true"></i> Reactivate', array(
                                                                'type' => 'submit',
                                                                'class' => 'btn btn-default btn-sm dropdown-item',
                                                                'title' => 'Reactivate user',
                                                                'onclick'=>'return confirm("Confirm deactivate?")'
                                                        )) !!}
                                                    {!! Form::close() !!}
                                                    @endif
                                                @endif


                                                    <a href="{{ url('/access/user/' . $item->id . '/password') }}" title="Change Password"><button class="btn btn-primary btn-sm dropdown-item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Change Password </button></a>
                                                </div>
                                              </div>
                                            </div> --}}
                                            {{-- Group Button --}}





                    </div>
                </div>
            </div>
	</div>

@endsection

@push('scripts')

<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! url('access/user') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'first_name', name: 'first_name' },
            { data: 'email', name: 'email' },
            { data: 'active', name: 'active' },
            { data: 'roles', name: 'roles' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'actions', name: 'actions', orderable: false, searchable: false }
        ],
        aLengthMenu: [ [10, 20, 30, 40, 50, 100, -1], [10, 20, 30, 40, 50, 100, "All"] ],
        iDisplayLength: 10,
    });
});
</script>

@endpush
