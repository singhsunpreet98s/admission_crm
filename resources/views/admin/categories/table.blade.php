<table class="table table-hover table-striped align-middle">
  <thead class="sticky-top" >
    <tr>
      <th scope="col">Category Name</th>
      <th scope="col" class="text-center" style="width: 120px;"></th>
    </tr>
  </thead>
  <tbody>
    @if(count($categories) > 0)
      @foreach($categories as $category)
        <tr>
          <td>{!! $category->name !!}</td>
          <td class="text-center">
            <a href="javascript:;" 
               class="btn btn-sm btn-outline-warning me-1" 
               title="Edit" 
               data-modal="{{ $section }}_edit" 
               data-url="{{route("admin.$section.edit",['id'=> $category->id])}}">
              <i class="mdi mdi-pencil"></i>
            </a>
            <a href="javascript:;" 
               class="btn btn-sm btn-outline-danger" 
               title="Delete" 
               data-modal="{{ $section }}_delete" 
               data-url="{{route("admin.$section.doDelete",['id'=> $category->id])}}">
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
   {{ $categories->links('pagination::bootstrap-4') }}
</div>
