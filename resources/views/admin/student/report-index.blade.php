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
        <a href="{{route('files.create')}}" class="nav-link">New Entry</a>
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
                <h3 class="card-title">Plagarism Report</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>s.no</th>
                    <th>url</th>
                    <th>search title</th>
                    <th>Matched </th>
                    <th>WordCounts</th>
                    <th>view Url</th>
                    
                    <th>Edit</th>
                    <th>delete</th>
                  </tr>
                  </thead>
                  
                  <tbody>
                 
                    @forelse ( $reports as $report)
                      
                  
                    <tr>
                      <td>{{$loop->index+1}}</td>
                      <td>
                       
                        
                      <a href="{{$report->url}}" target="_blank" rel="noopener noreferrer" class="btn-link text-secondary">
                       </i>{{$report->url}}</a>
                       </td>
                      <td>{{$report->title }}</td>
                     
                      <td>{{$report->minwordsmatched}}</td>
                      <td>{{$report->queryWords}}</td>
                      <td>
                      <a href="{{$report->viewurl}}" target="_blank" rel="noopener noreferrer" class="btn-link text-secondary">
                       </i>{{$report->viewurl}}</a>
                      </td>
                     
                        
                      
                      <td><a href=""><i class="fas fa-edit"></i></a></td>
                      <td>
                        <form id="delete-form-{{$report->id}}" action="{{route('files.reports.destroy',[$report->file->id,$report->id])}}" style="display:none" method="post">
                         @csrf
                         @method('DELETE')
                        </form>
                        
                      
                      <a href=""   onClick="if(confirm('Are you sure you want to delete this report?'))
                      {event.preventDefault();document.getElementById('delete-form-{{$report->id}}').submit();}else{
                        event.preventDefault();
                      }"><i class="fas fa-trash"></i></a>
                    </td>
                    </tr>
                   
                    @empty
                      <tr>
                        <td>you dont have file report</td>
                      </tr>
                    @endforelse
                 
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>s.no</th>
                    <th>url</th>
                    <th>search title</th>
                    <th>Matched </th>
                    <th>WordCounts</th>
                    <th>view Url</th>
                    
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