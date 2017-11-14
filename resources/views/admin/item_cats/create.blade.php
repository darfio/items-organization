@extends('admin.layouts.admin_app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        New Category
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">New Category</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            @foreach ($errors->all() as $error)
                <h4>{{ $error }}</h4>
            @endforeach
        </div>
    @endif

      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">

            {{ Form::Open(['route'=>['categories.store'], 'method'=>'POST']) }}
              <div class="box-body">
                <div class="form-group"> 
                  {{ Form::Label('Title') }}
                  {{ Form::text('title', '', ['class'=>'form-control']) }}
                </div>
              </div>

              <div class="box-footer"> 
                {{ Form::submit('Submit', ['class'=>'btn btn-primary']) }}
              </div>                                                   
            {{ Form::Close() }}

            </div>
          </div>

        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection