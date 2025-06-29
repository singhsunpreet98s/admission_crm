@extends('layouts.app')
@section('title')
<i class="mdi mdi-account-plus-outline"></i> Add New Category
@endsection
@section('content')
<div id="{{$section}}_create">
<div class="card">
   <div class="card-body">
     <form method="POST" action="{{route("admin.$section.store")}}" enctype="multipart/form-data">
      @csrf
       @if(session('error'))
              <span class="alert alert-danger">Error Occured</span>
      @endif
      <div id="{{$section}}_form">
       @include('admin.meritlist.create_partial')
      </div>
       <button type="submit" class="btn btn-secondary">Submit</button>
     </form>
   </div>
 </div>
</div>
@endsection
@section('scripts')
  <script>
    $(document).ready(function(){
      @if(session('error'))
              toastr.error("{{ session('error') }}","Error");
      @endif
      tables.set_config('table_{{$section}}', {
            url:'{{ route("admin.{$section}.index") }}',
        });
        $('#table_{{$section}}').on('click', '.page-link', function (e) {
        e.preventDefault(); 

       
        let url = $(this).attr('href');
          tables.get('table_{{$section}}',`${url}`);
        });
        
        $('#{{$section}}_create').on('change', '#program', function () {
          var program = $(this).val();
          var listNumber = $('#list_number').val();
          if(program !== null && program !== undefined){
            sendAjax('{{ route("admin." . $section . ".create") }}',
              'GET',
              {
                program:program,
                list_number:listNumber
              },
              $('#{{$section}}_create'),
              $('#{{$section}}_form')
            )
          }
        });
        $('#{{$section}}_create').on('change', '#course_id', function () {
          var course_id = $(this).val();
          var program = $('#program').val();
          var listNumber = $('#list_number').val();
          if(course_id !== null && course_id !== undefined){
            sendAjax('{{ route("admin." . $section . ".create") }}',
              'GET',
              {
                program:program,
                course_id,course_id,
                list_number:listNumber
              },
              $('#{{$section}}_create'),
              $('#{{$section}}_form')
            )
          }
        });
      })
  </script>
@endsection