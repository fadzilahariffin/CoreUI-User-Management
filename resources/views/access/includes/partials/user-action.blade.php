<div class="btn-group" role="group" aria-label="Button group with nested dropdown">

  @can('user-view')
    <a href="{{ url('/access/user/' . $id) }}" title="View user"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
    @endcan

    @can('user-edit')
    <a href="{{ url('/access/user/' . $id . '/edit') }}" title="Edit user"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
    @endcan

  <div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      More
    </button>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">

    	{{-- && ! $item->hasRole('superadmin') --}}

    @if(auth()->user()->id != $id  )
      @can('user-delete')
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['/access/user', $id],
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

        @if($active == true)
        {!! Form::open([
            'method'=>'GET',
            'url' => ['/access/user/'. $id.'/deactivate'],
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
            'url' => ['/access/user/'. $id.'/reactivate'],
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


        <a href="{{ url('/access/user/' . $id . '/password') }}" title="Change Password"><button class="btn btn-primary btn-sm dropdown-item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Change Password </button></a>
    </div>
  </div>
</div>
