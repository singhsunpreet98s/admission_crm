<table class="table table-hover table-striped align-middle mb-0">
   <thead class="sticky-top">
     <tr>
       <th> Category </th>
       <th> Fee Head </th>
       <th> Amount </th>
       <th> Period Number </th>
       <th class="text-center" style="width: 120px;"></th>
     </tr>
   </thead>
   <tbody>
     
      @if(count($courseFees)>0)
         @foreach($courseFees as $courseFee)
         <tr>
            <td>{!!$courseFee->category->name!!}</td>
            <td>
               {!!$courseFee->fee_head!!}
            </td>
            <td>
               {!!$courseFee->amount!!}
            </td>
             <td>
               {!!$courseFee->period_number!!}
            </td>
            <td style="max-width: 50px">
               <a href="javascript:;" class="btn btn-sm btn-outline-warning" data-modal="{{normalizeSection($section)}}_edit" data-url="{{route("admin.$section.edit",['courseId'=>$courseId,'id'=>$courseFee->id])}}" ><i class="mdi mdi-pencil btn-icon-append"></i></a>
               <a href="javascript:;" class="btn btn-sm btn-outline-danger" data-modal="{{normalizeSection($section)}}_delete" data-url="{{route("admin.$section.doDelete",['courseId'=>$courseId,'id'=>$courseFee->id])}}" ><i class="mdi mdi-delete btn-icon-append"></i></a>
            </td>
         </tr>
         @endforeach
      @else
      <tr>
         <td colspan="5" class="text-center"> No Records Found </td>
       </tr>
      @endif
   
       
   </tbody>
 </table>
 <div class="pagination-container" >
   {{ $courseFees->links('pagination::bootstrap-4') }}
</div>
