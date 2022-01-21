@extends('admin.app')

@section('title')
<x-custom.title></x-custom.title>
@endsection
@section('sidebar')
<x-side-bar></x-side-bar>
@endsection
@section('main-section')
@if (session()->has('status'))
    @include('admin.includes.status');
    
  @endif
<div class="container-fluid">
  <!--CONTENT GOES HERE-->
  <div class="card">
        <div class="card-header">
          <h3 class="card-title">Projects Detail</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Estimated budget</span>
                      <span class="info-box-number text-center text-muted mb-0">Kshs.{{$project->estBudget}}/=</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Total amount spent</span>
          
                      <span class="info-box-number text-center text-muted mb-0">Kshs.{{$project->amountSpent}}/=</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Estimated project duration</span>
                      <span class="info-box-number text-center text-muted mb-0">{{$project->duration}} weeks</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Recent Activity</h4>
                  
                  @forelse ($project->activities as $activity )
                  <div class="post">
                    <div class="user-block">
                      <img class="img-circle img-bordered-sm" src="{{asset('admin/dist/img/user1-128x128.jpg')}}" alt="user image">
                      <span class="username">
                        <a href="#">{{$activity->title}}</a>
                      </span>
                      <span class="description">created at {{\Carbon\Carbon::parse($activity->updated_at)->format('dD,Y')}}</span>
                    </div>
                    <!-- /.user-block -->
                    <p>
                      {{$activity->description}}
                    </p>

                    <p>
                      <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v2</a>
                    </p>
                  </div>

  @empty
     <div>
       You dont have a recent activity history
     </div>
    
  @endforelse
                 
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class="fas fa-paint-brush"></i> {{$project->name}}</h3>
              <p class="text-muted">{{$project->desc}}</p>
              <br>
              <div class="text-muted">
                <p class="text-sm">Project Domain
                  <b class="d-block">{{$project->domain}}</b>
                </p>
                <p class="text-sm">Project Supervisor
                  <b class="d-block">{{$project->supervisor}}</b>
                </p>
                <p class="text-sm">Remote Repository
                  <a href=""><b class="d-block">{{$project->repoUrl}}</b></a>
                </p>
                <p class="text-sm">live Url
                  <a href="">
                  <b class="d-block">{{$project->liveUrl}}</b>
                  </a>
                 
                </p>
              </div>

              <h5 class="mt-5 text-muted">Project files</h5>
              <ul class="list-unstyled">
                @if(count($files)>0)
                @foreach($files as $file)
                <li>
                  <a href="{{route('download',$file->id)}}" class="btn-link text-secondary">
                    <i class="far fa-fw fa-file-word"></i> {{$file->name}}</a>
                </li>
                @endforeach
                @else
                <li>
                  <a href="" class="btn-link text-secondary">
                    <i class="far fa-fw "></i> no file</a>
                </li>
                @endif
              </ul>
             
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
  
  <!--CONTENT GOES HERE-->
</div><!-- /.container-fluid -->
@endsection