@extends('admin.app')
@section('title')
<x-custom.title></x-custom.title>
@endsection


@section('sidebar')
<x-side-bar></x-side-bar>
@endsection
@section('main-section')
<div class="container-fluid">
  @if (session()->has('status'))
    @include('admin.includes.status');
    
  @endif
  <!--CONTENT GOES HERE-->
  <form action="{{route('files.store')}}" method="post" enctype="multipart/form-data">
    @csrf
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
                <label for="chapter">select parent project</label>
                <select name="project_id" id="chapter" class="form-control custom-select">
                  <option selected="" disabled="">Select one</option>
                  @foreach($projects as $project)
                     @can('view',$project)
                       
                     <option value="{{$project->id}}">{{$project->name}}</option>
                     @endcan
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="chapter">select chapter</label>
                <select name="chapter" id="chapter" class="form-control custom-select">
                  <option selected="" disabled="">Select one</option>
                  <option value="chapter1">chapter 1</option>
                  <option value="chapter2">chapter 2</option>
                  <option value="chapter3">chapter 3</option>
                  <option value="chapter4">chapter 4</option>
                  <option value="chapter5">chapter 5</option>
                  <option value="chapter6">chapter 6</option>
                  <option value="chapter7">chapter 7</option>
                  <option value="propasal">propasal document</option>
                  <option value="finaldocument">final document</option>
                </select>
              </div>
              <div class="form-group">
                
                <input name="name" type="file" id="file" >
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