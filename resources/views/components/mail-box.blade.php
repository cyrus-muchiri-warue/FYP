
   <form action="{{route('notification.send')}}" method="post">
 
   @csrf
   <div class="card card-primary card-outline">
   <div class="mt-2 ">

     <div class="card-header">
    
     <div class="form-group">
                
                  <select class="select2" multiple="multiple" name ="users[]"data-placeholder="select recipents or Leave empty to send to all students" style="width: 100%;">
                  @foreach($users as $user)
                    <option value="{{$user->email}}">{{$user->name}}</option>
                  @endforeach
                    
                  </select>
                </div>
     <div class="form-group">
                  <input name="subject" class="form-control" placeholder="Subject:" required>
    </div>
     </div>
     <div class="card card-outline card-info m-4">
            <div class="card-header">
              <h3 class="card-title">
               Notification Body
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body ">
              <textarea id="summernote" name="body">
                Place <em>only</em> <u>text</u> <strong>here</strong>
              </textarea>
            </div>
            <div class="card-footer">
           
            </div>
          </div>
            <div class="card-footer">
                  <button type="submit" class="btn btn-primary ">send</button>
                </div>

                </div>
</div>
  </form>
