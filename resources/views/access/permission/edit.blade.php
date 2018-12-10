@extends('layouts.app')

@section('content')
{{-- <div class="container"> --}}
	<div class="row">
		<div class="col-md-12">
                <div class="card">
                    <form action="{{ url('/access/permission/'.$permission->id) }}}" method="post">
                        <input type="hidden" name="_method" value="PATCH">

                        {{ csrf_field() }}

                    {{-- <div class="card-header">Edit Permission #{{ $permission->id }}</div> --}}
                    <div class="card-body">

                         <div class="row">
                            <div class="col-sm-5">
                                <h4 class="card-title mb-0">
                                    Permission Management
                                    <small class="text-muted">Edit Permission</small>
                                </h4>
                            </div><!--col-->
                        </div><!--row-->
                        <!--row-->

                        <hr />


                        {{-- <a href="{{ url('/access/permission') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br /> --}}





                        <div class="row mt-5 mb-3">

                            <div class="col">
                                <div class="form-group row">

                                    <label class="col-md-2 form-control-label">Name</label>

                                    <div class="col-md-10">


                                            <input type="name" name="name" class="form-control" value="{{ $permission->name }}">
                                    </div><!--col-->
                                </div><!--form-group-->

                            </div>
                        </div>



                    </div>

                      <div class="card-footer">
                        <div class="row">
                            <div class="col">

                                <a href="{{ url('/access/permission') }}" class="btn btn-danger ">Cancel</a>
                            </div><!--col-->

                            <div class="col text-right">

                                <input type="submit" class="btn btn-primary " value="Update">
                            </div><!--col-->
                        </div><!--row-->
                    </div><!--card-footer-->




                    </form>
                </div>
            </div>
	</div>
{{-- </div> --}}
@endsection
