@extends('layouts.app')
@section('content')

<div class="page-header">
   <h3 class="page-title">
     <span class="page-title-icon bg-gradient-secondary text-white me-2">
       <i class="mdi mdi-account"></i>
     </span> Subjects
   </h3>

   <nav aria-label="breadcrumb">
     <ul class="breadcrumb">
       <li class="breadcrumb-item active" aria-current="page">
        <a href="javascript:;" class="btn btn-secondary btn-icon-text" data-modal="{{$section}}_create" data-url="{{route("admin.$section.create")}}" > <i class="mdi mdi-account-plus-outline btn-icon-prepend"></i> Add Subject </a>
       </li>
     </ul>
   </nav>
 </div>
 <div class="card" style="height:600px">
   <div class="card-body"  id="table_{{$section}}">
    <div data-table class="table-responsive scroll-vertical" style="height: 440px">
      @include("admin.$section.table")

    </div>
   </div>
 </div>
@endsection
@section('scripts')
  <script>
    $(document).ready(function(){
      tables.set_config('table_{{$section}}', {
            url:'{{ route("admin.{$section}.index") }}',
        });
        $('#table_{{$section}}').on('click', '.page-link', function (e) {
        e.preventDefault(); // Prevent default link behavior

        // Get the href of the clicked pagination link
        let url = $(this).attr('href');
          tables.get('table_{{$section}}',`${url}`);
        });
        window['{{$section}}_create_modal_callback'] = function {{$section}}_create_modal_callback() {
            
            tables.get('table_{{$section}}',`{{route("admin.{$section}.index")}}`);
              toastr.success("Course created successfully", 'Success');
           
        }
        window['{{$section}}_edit_modal_callback'] = function {{$section}}_edit_modal_callback() {
            tables.get('table_{{$section}}',`{{route("admin.$section.index")}}`);
            toastr.success("Course updated successfully", 'Success');

        }
        window['{{$section}}_delete_modal_callback'] = function {{$section}}_delete_modal_callback() {
            tables.get('table_{{$section}}',`{{route("admin.$section.index")}}`);
            toastr.success("Course deleted successfully", 'Success');

        }
        $('body').on('change', '#course_id', function () {
          var courseId = $(this).val();
          if(courseId !== null && courseId !== undefined && courseId >0){
            let name = $('#name').length ? $('#name').val() : null; 
            $.ajax({
                    url: '{{ route("admin." . $section . ".create") }}',
                    type: 'GET', 
                    data: {
                        course_id: courseId,
                        name:name
                    },
                    beforeSend: function () {
                      loader.add($('#{{$section}}_create .card'));
                    },
                    success: function (response) {
                        
                        $('#{{$section}}_form').html(response);
                    },
                    error: function (xhr) {
                        toastr.error("It looks like something went wrong","Error");
                    },
                    complete: function () {
                      loader.remove ($('#{{$section}}_create .card'));
                    }
                  });
          }
        });
      })
  </script>
@endsection