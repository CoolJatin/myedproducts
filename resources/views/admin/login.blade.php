<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Medstore Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('public/admin/') }}/vendors/feather/feather.css">
  <link rel="stylesheet" href="{{ asset('public/admin/') }}/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="{{ asset('public/admin/') }}/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('public/admin/') }}/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('public/admin/') }}/images/favicon.png" />
<style>
.error{
  color:red;
}
</style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="{{ asset('public/admin') }}/images/logo.png" alt="logo">
              </div>
              <h4>Hello! let s get started Admin</h4>
              <form class="pt-3" action="{{ url('adminlogin') }}" method="Post">
                @csrf
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                   @if ($errors->has('email'))
                    <span class="error">Please Enter Your UserName</span>
                   @endif
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                   @if ($errors->has('password'))
                    <span class="error">Please Enter Your Password</span>
                   @endif
                </div>
                @if(Session::has('error'))
                     {!! \Session::get('error') !!}
                @endif
                <div class="mt-3">
                <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="Login">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('public/admin/') }}/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('public/admin/') }}/js/off-canvas.js"></script>
  <script src="{{ asset('public/admin/') }}/js/hoverable-collapse.js"></script>
  <script src="{{ asset('public/admin/') }}/js/template.js"></script>
  <script src="{{ asset('public/admin/') }}/js/settings.js"></script>
  <script src="{{ asset('public/admin/') }}/js/todolist.js"></script>
  <!-- endinject -->
</body>
</html>
