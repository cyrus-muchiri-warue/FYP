<div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Read Mail</h3>

              <div class="card-tools">
                <a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
                <a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-info">
                <h5>Subject: {{$notification->data['subject']}}</h5>
                <h6>From: {{$notification->data['from']}}
                  <span class="mailbox-read-time float-right">{{\Carbon\Carbon::parse($notification->created_at)->format('d M,Y h:m:s')}}</span></h6>
              </div>
              <!-- /.mailbox-read-info -->
           
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
              

                

                <p>{!! $notification->data['body'] !!}</p>

               
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-white">
             
            </div>
            <!-- /.card-footer -->
            <div class="card-footer">
              <div class="float-right">
               
               <a href=""  class="btn btn-default"><i class="fas fa-reply"></i>Reply</a>
            </div>
            <!-- /.card-footer -->
          </div>