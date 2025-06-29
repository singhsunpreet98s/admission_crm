<table class="table table-hover table-striped align-middle">
  <thead class="sticky-top" >
    <tr>
      <th scope="col">File Name</th>
      <th scope="col" class="text-center" style="width: 120px;"></th>
    </tr>
  </thead>
  <tbody>
    @if(count($meritList) > 0)
      @foreach($meritList as $meritListItem)
        <tr>
          <td>{!! $meritListItem->file_name !!}</td>
          <td class="text-center">
            <a href="javascript:;" 
               class="btn btn-sm btn-outline-danger" 
               title="Delete" 
               data-modal="{{ $section }}_delete" 
               data-url="{{route("admin.$section.doDelete",['id'=> $meritListItem->id])}}">
              <i class="mdi mdi-delete"></i>
            </a>
          </td>
        </tr>
      @endforeach
    @else
      <tr>
        <td colspan="2" class="text-center text-muted">No Records Found</td>
      </tr>
    @endif
  </tbody>
</table>

 <div class="pagination-container" >
   {{ $meritList->links('pagination::bootstrap-4') }}
</div>
