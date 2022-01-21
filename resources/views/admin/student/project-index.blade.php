@extends('admin.app')

@section('title')
<x-custom.title></x-custom.title>
@endsection
@section('add-btn')
<li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('projects.create')}}" class="nav-link">New Entry</a>
</li>
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
  <div class="card">
        <div class="card-header">
          <h3 class="card-title">Projects</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
              @if (count($projects)>0)
              <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                          Project Name
                      </th>
                      <th style="width: 30%">
                         Language/FrameWork Used
                      </th>
                      <th>
                          Project Progress
                      </th>
                      <th style="width: 8%" class="text-center">
                          Status
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
                
              @endif
              </thead>
              <tbody>
                @forelse ( $projects as $project )
                @can('view',$project)
                <tr>
                    <td>
                       {{$loop->index+1}}
                    </td>
                    <td>
                        <a>
                           {{$project->name}}
                        </a>
                        <br>
                        <small>
                          
                            Created {{\Carbon\Carbon::parse($project->created_at)->format('M d,Y')}}
                        </small>
                    </td>
                    <td>
                        <ul class="list-inline">
                          @foreach($project->languages as $language)
                            
                            @if($loop->index<=5)
                            <li class="list-inline-item">
                                <img alt="Avatar" class="table-avatar" height="50px" width="750px" src="{{asset(Storage::url($language->imageUrl))}}">
                            </li>
                            @else
                                  break;
                            @endif
                          @endforeach
                        </ul>
                    </td>
                    <td class="project_progress">
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%">
                            </div>
                        </div>
                        <small>
                            57% Complete
                        </small>
                    </td>
                    <td class="project-state">
                        <span class="badge badge-success">{{$project->status}}</span>
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="{{route('projects.show',$project->id)}}">
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a>
                        <a class="btn btn-info btn-sm" href="{{route('projects.edit',$project->id)}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="#" onclick="if(confirm('Are you sure you want to delete this project')){
                          event.preventDefault;
                          document.getElementById('delete-form-{{$project->id}}').submit();
                        }else{
                          event.preventDefault();
                          }
                        
                        ">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
                    </td>
                    <form id="delete-form-{{$project->id}}" action="{{route('projects.destroy',$project->id)}}" method="post">
                      @csrf
                      @method('DELETE')

                    </form>
                </tr>
                @endcan
                  
                @empty
                  <tr>
                    <td>you dont have a project</td>
                  </tr>
                @endforelse
              
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
  <!--CONTENT GOES HERE-->
</div><!-- /.container-fluid -->
@endsection

