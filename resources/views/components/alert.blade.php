<div>
    @if(session()->has('info'))
     <div class="btn btn-info">
         {{session()->get('info')}}
     </div>
     @elseif(session()->has('error'))
     <div class="btn btn-danger">
         {{session()->get('error')}}
     </div>
     @endif
</div>