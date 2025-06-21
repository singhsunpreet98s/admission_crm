<div class="modal-dialog @yield('modal_class') custom-slide-dialog" >
   <div class="modal-content" style="background-color: white">
       <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLongTitle">@yield('title')</h5>
           <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
           </button>
       </div>
       <div class="modal-body" >
           @yield('body')
           @section('content')
           @show
       </div>
       <div class="modal-footer">
               @section('buttons')
               <div class="buttons">

               <button type="button" data-submit="modal" class="btn btn-secondary">Save</button>
                   <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
               </div>

           @show
       </div>
   </div>

   @yield('scripts')
</div>
