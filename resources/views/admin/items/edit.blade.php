@extends('admin.layouts.admin_app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Item
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Edit Item</li>
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

            {{ Form::Open(['route'=>['items.update', $item->id], 'method'=>'PUT']) }}
              <div class="box-body">
                <div class="form-group"> 
                  {{ Form::Label('Title') }}
                  {{ Form::text('title', $item->title, ['class'=>'form-control']) }}
                </div>

                <div class="form-group">
                  {{ Form::Label('Category') }}
                  <select class="form-control" name="cat_id" value="{{ $item->cat_id }}">
                    @foreach($item_cats as $category)
                      @php $selected = '' @endphp
                      @if($category->id == $item->cat_id)
                        @php $selected = 'selected' @endphp
                      @endif
                      <option {{$selected}} value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                  </select>
                </div>


                <div class="form-group"> 
                  {{ Form::Label('Count') }}
                  {{ Form::text('count', $item->count, ['class'=>'form-control']) }}
                </div>  
                <div class="form-group"> 
                  {{ Form::Label('Price') }}
                  {{ Form::text('price', $item->price, ['class'=>'form-control']) }}
                </div>  
                <div class="form-group"> 
                  {{ Form::Label('Descripton') }}
                  {{ Form::textarea('description', $item->description, ['class'=>'form-control']) }}
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