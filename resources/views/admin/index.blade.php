
@extends('layouts.app')
@section('content')
<div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-secondary text-white me-2">
        <i class="mdi mdi-home"></i>
      </span> Dashboard
    </h3>
    <nav aria-label="breadcrumb">
      <ul class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
        </li>
      </ul>
    </nav>
  </div>
  <div class="row">
    <div class="col-md-4 stretch-card grid-margin">
      <div class="card bg-gradient-info card-img-holder text-white">
        <div class="card-body">
          <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
          <h4 class="font-weight-normal mb-3">Total Emails <i class="mdi mdi-chart-line mdi-24px float-end"></i>
          </h4>
          {{-- <h2 class="mb-5">{{formatIndianNumber($data['total'])}}</h2> --}}
        </div>
      </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
      <div class="card bg-gradient-danger card-img-holder text-white">
        <div class="card-body">
          <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
          <h4 class="font-weight-normal mb-3">Spam Emails <i class="mdi mdi-bookmark-outline mdi-24px float-end"></i>
          </h4>
          {{-- <h2 class="mb-5">{{formatIndianNumber($data['spam'])}}</h2> --}}
        </div>
      </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
      <div class="card bg-gradient-success card-img-holder text-white">
        <div class="card-body">
          <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
          <h4 class="font-weight-normal mb-3">Delivered <i class="mdi mdi-bookmark-outline mdi-24px float-end"></i>
          </h4>
          {{-- <h2 class="mb-5">{{formatIndianNumber($data['delivered'])}}</h2> --}}
        </div>
      </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
      <div class="card bg-gradient-success card-img-holder text-white">
        <div class="card-body">
          <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
          <h4 class="font-weight-normal mb-3">Opens <i class="mdi mdi-bookmark-outline mdi-24px float-end"></i>
          </h4>
          {{-- <h2 class="mb-5">{{formatIndianNumber($data['opens'])}}</h2> --}}
        </div>
      </div>
      
    </div>
    <div class="col-md-4 stretch-card grid-margin">
      <div class="card bg-gradient-warning card-img-holder text-white">
        <div class="card-body">
          <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
          <h4 class="font-weight-normal mb-3">Clicks <i class="mdi mdi-bookmark-outline mdi-24px float-end"></i>
          </h4>
          {{-- <h2 class="mb-5">{{formatIndianNumber($data['clicks'])}}</h2> --}}
        </div>
      </div>
      
    </div>
    <div class="col-md-4 stretch-card grid-margin">
      <div class="card bg-gradient-danger card-img-holder text-white">
        <div class="card-body">
          <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
          <h4 class="font-weight-normal mb-3">Blocked  <i class="mdi mdi-bookmark-outline mdi-24px float-end"></i>
          </h4>
          {{-- <h2 class="mb-5">{{formatIndianNumber($data['blocks'])}}</h2> --}}
        </div>
      </div>
      
    </div>
  </div>
@endsection