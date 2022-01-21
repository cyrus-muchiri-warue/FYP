@extends('admin.app')
@section('title')
<x-custom.title></x-custom.title>
@endsection
@section("stylesheet")
 <!-- Select2 -->
 <link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection

@section('sidebar')
<x-side-bar></x-side-bar>
@endsection
@section('main-section')
<div class="container-fluid">
  <!--CONTENT GOES HERE-->
  @if (session()->has('status'))
    @include('admin.includes.status');
    
  @endif
  <form action="{{route('projects.update',$project->id)}}" method="post">
    @csrf
    @method('put')
  <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="name">Project Name</label>
                <input name="name" value="{{$project->name}}" type="text" id="name" class="form-control">
              </div>
              <div class="form-group">
                <label for="desc">Project Description</label>
                <textarea name="desc"  id="desc" class="form-control" rows="4">{{$project->desc}}</textarea>
              </div>
              <div class="form-group">
                <label for="status">Status</label>
                <select name="status"  id="status" class="form-control custom-select">
                  <option selected hidden>{{$project->status}}</option>
                  <option value="inprogress">in progress</option>
                  <option value="cancelled">Canceled</option>
                  <option value="completed">Completed</option>
                </select>
              </div>
              <div class="form-group">
                <label for="domain">Project Domain</label>
                <input name="domain" value="{{$project->domain}}" type="text" id="domain" class="form-control">
              </div>
              <div class="form-group">
                <label for="supervisor">Project Leader</label>
                <input name="supervisor" value="{{$project->supervisor}}" type="text" id="supervisor" class="form-control">
              </div>
              <div class="form-group">
                <label for="repoUrl">Remote Repository Url</label>
                <input name="repoUrl" value="{{$project->repoUrl}}" type="text" id="repoUrl" class="form-control">
              </div> 
              <div class="form-group">
                <label for="liveUrl">Live Url</label>
                <input name="liveUrl" value="{{$project->liveUrl}}"type="text" id="liveUrl" class="form-control">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Budget</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="estBudget">Estimated budget</label>
                <input  name="estBudget" value="{{$project->estBudget}}" type="number" id="estBudget" class="form-control">
              </div>
              <div class="form-group">
                <label for="amountSpent">Total amount spent</label>
                <input name="amountSpent" value="{{$project->amountSpent}}" type="number" id="amountSpent" class="form-control">
              </div>
              <div class="form-group">
                <label for="duration">Estimated project duration</label>
                <input name="duration" value="{{$project->duration}}" type="number" id="duration" class="form-control">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
         
          <!-- /.card -->
          <div class="form-group">
                  <label>select language/framework</label>
                  <select  name="languages[]"class="select2 select2-hidden-accessible" multiple="multiple" data-dropdown-css-class="select2-purple" name ="languages[]"data-placeholder="" style="width: 100%;">
                  @foreach($languages as $language)
                    <option value="{{$language->id}}" >{{$language->name}}</option>
                    @endforeach
                    
                  </select>
          </div>
         
        </div>
      </div>
  
  <input class="btn btn-primary btn-block" type="submit" value="submit">
  <a class="btn btn-primary btn-block" href="{{route('projects.index')}}">cancel</a>
  </form>
  <!--CONTENT GOES HERE-->
</div><!-- /.container-fluid -->
@endsection
@section("js")
<script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>
@endsection