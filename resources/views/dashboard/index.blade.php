@extends('dashboard.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="mb-3">
        <h4>Admin Dashboard</h4>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 d-flex">
            <div class="card flex-fill border-0 illustration">
                <div class="card-body p-0 d-flex flex-fill">
                    <div class="row g-0 w-100">
                        <div class="col-6">
                            <div class="p-3 m-1">
                                <h4>Welcome Back, Admin</h4>
                                <p class="mb-0 text-capitalize">Admin Dashboard, {{ auth('admin')->user()->name }}</p>
                            </div>
                        </div>
                        <div class="col-6 align-self-end text-end">
                            <img src="{{ asset('assets/image/customer-support.jpg') }}" class="img-fluid illustration-img"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- Table Element -->

  <div class="card bg-white">
      <div class="card-header">
          <h5 class="card-title text-black">
              Basic Table
          </h5>
          <hr>
      </div>
      <div class="card-body">

      </div>
  </div>
</div>
@endsection