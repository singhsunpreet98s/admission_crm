<table class="table ">
   <thead>
     <tr>
       <th> Name </th>
       <th> Code </th>
       <th></th>
     </tr>
   </thead>
   <tbody>
     
      @if(count($courses)>0)
         @foreach($courses as $course)
         <tr>
            <td>{!!$course->name!!}</td>
            <td>
               {!!$course->code!!}
            </td>
            <td style="max-width: 50px">
               <a href="javascript:;" class="btn btn-sm btn-warning" data-modal="{{$section}}_edit" data-url="/admin/{{$section}}/edit/{{$course->id}}" ><i class="mdi mdi-pencil btn-icon-append"></i></a>
               <a href="javascript:;" class="btn btn-sm btn-danger" data-modal="{{$section}}_delete" data-url="/admin/{{$section}}/do_delete/{{$course->id}}" ><i class="mdi mdi-delete btn-icon-append"></i></a>
            </td>
         </tr>
         @endforeach
      @else
      <tr>
         <td colspan="3" class="text-center"> No Records Found </td>
       </tr>
      @endif
   
       
   </tbody>
 </table>
 <div class="pagination-container" >
   {{ $courses->links('pagination::bootstrap-4') }}
</div>
