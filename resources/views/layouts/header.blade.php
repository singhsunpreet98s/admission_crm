<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
   <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
     <a class="navbar-brand brand-logo"  ></a>
     <a class="navbar-brand brand-logo-mini" href="index.html"></a>
   </div>
   <div class="navbar-menu-wrapper d-flex align-items-stretch">
     <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
       <span class="mdi mdi-menu"></span>
     </button>
    
     <ul class="navbar-nav navbar-nav-right">
       
       <li class="nav-item d-none d-lg-block full-screen-link">
         <a class="nav-link">
           <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
         </a>
       </li>
      
       <li class="nav-item nav-profile dropdown">
         <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
           <div class="nav-profile-img" style="background-color: red;border-radius:20px;display:flex;justify-content:center;allign">
             <span style="font-size: 18px;color:white;font-weight:800;text-transform: capitalize;">{{Auth::user()->name[0]}}</span>
             {{-- <span class="availability-status online"></span> --}}
           </div>
           <div class="nav-profile-text " >
             <p class="mb-1 text-black">{{Auth::user()->name}}</p>
           </div>
         </a>
         <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
           {{-- <a class="dropdown-item" href="#">
             <i class="mdi mdi-account me-2 text-success"></i>Profile</a>
           <div class="dropdown-divider"></div> --}}
           <span class="dropdown-item" id="reset-password">
            <i class="mdi mdi-key me-2 text-secondary"></i> Forgot password </span>
           <a class="dropdown-item" href="{{route('signOut')}}">
             <i class="mdi mdi-logout me-2 text-secondary"></i> Signout </a>
         </div>
       </li>
     </ul>
     <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
       <span class="mdi mdi-menu"></span>
     </button>
   </div>
 </nav>
 