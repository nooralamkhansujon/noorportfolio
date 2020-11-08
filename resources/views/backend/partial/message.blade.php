<div class="row">
    <div class="col-md-12">
        @if(session()->has('message'))
         <div class="alert alert-{{session()->get('type')}}">
             {{session()->get('message')}}
         </div>
        @endif
    </div>
</div>
