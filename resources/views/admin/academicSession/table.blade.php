<table class="table table-hover table-striped align-middle">
  <thead class="sticky-top" >
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Start Date</th>
      <th scope="col">End Date</th>
      <th scope="col" class="text-center" style="width: 120px;"></th>
    </tr>
  </thead>
  <tbody>
    @if(count($academicSessions) > 0)
      @foreach($academicSessions as $academicSession)
        <tr>
          <td>{!! $academicSession->title !!}</td>
          <td>{!! $academicSession->from_date !!}</td>
          <td>{!! $academicSession->to_date !!}</td>
          <td class="text-center">
            <a href="javascript:;" 
               class="btn btn-sm btn-outline-warning me-1" 
               title="Edit" 
               data-modal="{{ $section }}_edit" 
               data-url="{{route("admin.$section.edit",['id'=> $academicSession->id])}}">
              <i class="mdi mdi-pencil"></i>
            </a>
            <a href="javascript:;" 
               class="btn btn-sm btn-outline-danger" 
               title="Delete" 
               data-modal="{{ $section }}_delete" 
               data-url="{{route("admin.$section.doDelete",['id'=> $academicSession->id])}}">
              <i class="mdi mdi-delete"></i>
            </a>
          </td>
        </tr>
      @endforeach
    @else
      <tr>
        <td colspan="4" class="text-center text-muted">No Records Found</td>
      </tr>
    @endif
  </tbody>
</table>

 <div class="pagination-container" >
   {{ $academicSessions->links('pagination::bootstrap-4') }}
</div>
