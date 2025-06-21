<table class="table ">
   <thead>
     <tr>
       <th> Name </th>
       <th></th>
     </tr>
   </thead>
   <tbody>
     
      @if(count($categories)>0)
         @foreach($categories as $category)
         <tr>
            <td>{!!$category->name!!}</td>
            
            <td style="max-width: 50px">
               <a href="javascript:;" class="btn btn-sm btn-warning" data-modal="{{$section}}_edit" data-url="/admin/{{$section}}/edit/{{$category->id}}" ><i class="mdi mdi-pencil btn-icon-append"></i></a>
               <a href="javascript:;" class="btn btn-sm btn-danger" data-modal="{{$section}}_delete" data-url="/admin/{{$section}}/do_delete/{{$category->id}}" ><i class="mdi mdi-delete btn-icon-append"></i></a>
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
   {{ $categories->links('pagination::bootstrap-4') }}
</div>
