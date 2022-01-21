@extends('admin.app')
@section('title')
<x-custom.title></x-custom.title>
@endsection
@section('stylesheet')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('add-btn')
<li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('languages.create')}}" class="nav-link">New Entry</a>
</li>
@endsection

@section('sidebar')
<x-side-bar></x-side-bar>
@endsection
@section('main-section')
@if (session()->has('status'))
    @include('admin.includes.status');
    
  @endif
<div class="card">
              <div class="card-header">
                <h3 class="card-title">project files</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>s.no</th>
                    <th>name</th>
                    <th>Logo</th>
                    <th>Description</th>
                    
                    <th>Edit</th>
                    <th>delete</th>
                  </tr>
                  </thead>
                  <tbody>
                    @forelse ( $languages as $language )
                      @can('view',$language)
                        
                      <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>
                          
                        <a href="{{route('languages.show',$language->id)}}" target="_blank" rel="noopener noreferrer" class="btn-link text-secondary"><i class="far fa-fw fa-language-word"></i> {{$language->name}}</a>
                         </td>
                        <td class="list-inline-item"><a href="http://" target="_blank" rel="noopener noreferrer"> 
                          <img alt="Avatar" class="table-avatar" height="35px" width="50px" 
                          src="{{Storage::url($language->imageUrl)}}">
                         
                        </a></td>
                        <td>{{$language->desc}}</td>
                       
                          
                        
                        <td><a href="{{route('languages.edit',$language->id)}}"><i class="fas fa-edit"></i></a></td>
                        <td>
                          <form id="delete-form-{{$language->id}}" action="{{route('languages.destroy',$language->id)}}" style="display:none" method="post">
                           @csrf
                           @method('DELETE')
                          </form>
                          
                        
                        <a href=""   onClick="if(confirm('Are you sure you want to delete this Language?'))
                        {event.preventDefault();document.getElementById('delete-form-{{$language->id}}').submit();}else{
                          event.preventDefault();
                        }"><i class="fas fa-trash"></i></a>
                      </td>
                      </tr>
                      @endcan
                      
                    @empty
                      
                    @endforelse
                
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>s.no</th>
                  <th>name</th>
                    <th>Logo</th>
                    <th>Description</th>
                    
                    <th>Edit</th>
                    <th>delete</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
@endsection
@section('js')
<!-- DataTables  & Plugins -->
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection