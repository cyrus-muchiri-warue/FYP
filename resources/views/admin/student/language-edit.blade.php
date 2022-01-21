@extends('admin.app')
@section('title')
<x-custom.title></x-custom.title>
@endsection


@section('sidebar')
<x-side-bar></x-side-bar>
@endsection
@section('main-section')
<div class="container-fluid">
  <!--CONTENT GOES HERE-->
  @if (session()->has('status'))
    @include('admin.includes.status')
    
  @endif
  <form action="{{route('languages.update',$language->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
  <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">project files</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
            <div class="form-group">
              <label for="">Enter language name</label>
              <input name="name" value="{{$language->name}}" class="form-control" type="text" placeholder="name">
            </div>
            <div class="form-group">
                        <label>language description</label>
                        <textarea class="form-control" name="desc" rows="3" placeholder="Enter ...">{{$language->desc}}</textarea>
                      </div>
            <div class="form-group">
              
              <input  type="file" name="logo" placeholder="{{$language->imageUrl}}">
            </div>
             
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          
        </div>
       
      </div>
  
  <input class="btn btn-primary" type="submit" value="submit">
  <a class="btn btn-warning" href="{{route('files.index')}}">cancle</a>
  </form>
  <!--CONTENT GOES HERE-->
</div><!-- /.container-fluid -->
@endsection