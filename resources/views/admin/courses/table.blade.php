<table class="table table-hover align-middle mb-0">
    <thead class=" sticky-top">
      <tr>
        <th>Name</th>
        <th>Code</th>
        <th class="text-center" style="width: 160px;">Actions</th>
      </tr>
    </thead>
    <tbody>
      @if(count($courses) > 0)
        @foreach($courses as $course)
          <tr>
            <td>{!! $course->name !!}</td>
            <td>{!! $course->code !!}</td>
            <td class="text-center">
              <a href="/admin/{{ $section }}/{{ $course->id }}/fees"
                 class="btn btn-sm btn-outline-success me-1"
                 title="Manage Fees">
                <i class="mdi mdi-currency-rupee"></i>
              </a>
              <a href="javascript:;"
                 class="btn btn-sm btn-outline-warning me-1"
                 title="Edit"
                 data-modal="{{ $section }}_edit"
                 data-url="/admin/{{ $section }}/edit/{{ $course->id }}">
                <i class="mdi mdi-pencil"></i>
              </a>
              <a href="javascript:;"
                 class="btn btn-sm btn-outline-danger"
                 title="Delete"
                 data-modal="{{ $section }}_delete"
                 data-url="/admin/{{ $section }}/do_delete/{{ $course->id }}">
                <i class="mdi mdi-delete"></i>
              </a>
            </td>
          </tr>
        @endforeach
      @else
        <tr>
          <td colspan="3" class="text-center text-muted">No Records Found</td>
        </tr>
      @endif
    </tbody>
  </table>
 <div class="pagination-container" >
   {{ $courses->links('pagination::bootstrap-4') }}
</div>
