<nav class="sidebar sidebar-offcanvas bg-dark" id="sidebar">
   <ul class="nav">
     
    @if(Auth::user()->isAdmin())
     <li class="nav-item {{ request()->is('admin/categories*') ? 'bg-primary active' : ''}}">
       <a class="nav-link" href="{{route('admin.categories.index')}}">
         <span class="menu-title text-light">Categories</span>
         <i class="mdi mdi-account-file-text-outline menu-icon"></i>
       </a>
     </li>
     <li class="nav-item {{ request()->is('admin/courses*') ? 'bg-primary active' : ''}}">
       <a class="nav-link" href="{{route('admin.courses.index')}}">
         <span class="menu-title text-light">Courses</span>
         <i class="mdi mdi-bookshelf menu-icon"></i>
       </a>
     </li>
       <li class="nav-item {{ request()->is('admin/academic_session*') ? 'bg-primary active' : ''}}">
       <a class="nav-link" href="{{route('admin.academicSession.index')}}">
         <span class="menu-title text-light">Sessions</span>
         <i class="mdi mdi-school-outline menu-icon"></i>
       </a>
     </li>
     </li>
       <li class="nav-item {{ request()->is('admin/subjects*') ? 'bg-primary active' : ''}}">
       <a class="nav-link" href="{{route('admin.subjects.index')}}">
         <span class="menu-title text-light">Subjects</span>
         <i class="mdi mdi-book-open-outline menu-icon"></i>
       </a>
     </li>
     @endif
     
     {{-- <li class="nav-item {{ request()->is('email/index*') ? 'active' : ''}}">
      <a class="nav-link" href="{{route('email.index')}}">
        <span class="menu-title">Bulk Email</span>
        <i class="mdi mdi-email-multiple menu-icon"></i>
      </a>
    </li>
    <li class="nav-item {{ request()->is('unsubscribed*') ? 'active' : ''}}">
      <a class="nav-link" href="{{route('unsubscribed.index')}}">
        <span class="menu-title">Unsubscribed Users</span>
        <i class="mdi mdi-email-off  menu-icon"></i>
      </a>
    </li>
    <li class="nav-item {{ request()->is('email/import*') ? 'active' : ''}}">
      <a class="nav-link" href="{{route('email.import')}}">
        <span class="menu-title">Import Contacts</span>
        <i class="mdi mdi-file-import  menu-icon"></i>
      </a>
    </li>
     <li class="nav-item {{ request()->is('carrier*') ? 'active' : ''}}">
      <a class="nav-link" href="{{route('carrierPacket.index')}}">
        <span class="menu-title">Carrier Packet</span>
        <i class="mdi mdi-file-import  menu-icon"></i>
      </a>
    </li>
    @if(Auth::user()->isAdmin())
    <li class="nav-item {{ request()->is('users*') ? 'active' : ''}}">
      <a class="nav-link" href="{{route('users')}}">
        <span class="menu-title">Users</span>
        <i class="mdi mdi-account menu-icon"></i>
      </a>
    </li>
     @endif --}}
   </ul>
 </nav>