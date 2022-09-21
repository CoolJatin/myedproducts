@include('web.header')
<style>
.eroor{
    color:red;
}
</style>


<!-- Hero-Banner -->
<section class="account-main">
    <div class='container'>
        <!-- Pills navs -->
        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
            </li>
        </ul>
        <!-- Pills navs -->
<div class="row grid-margin" style="display:none;" id="del">
                            <div class="col-12">
                              <div class="alert alert-warning" role="alert">
                                  <strong id="msg">
                              </div>
                            </div>
                            @if(\Session::has('success'))
                      <div class="alert alert-info">
                         {!! \Session::get('success') !!} </ul>
                      </div>
                      @endif
                  </div> 
        <!-- Pills content -->
        <div class="tab-content">
            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                <form id='loginuser' method="post">
                  @csrf
                    <div class="text-center mb-3">
                        <p>Sign in with:</p>

                    </div>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="loginName" class="form-control" name="email" />
                        <label class="form-label" for="loginName">Email or username</label>
                        <span class="eroor" id="emailError"></span>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="loginPassword" class="form-control" name="password" />
                        <label class="form-label" for="loginPassword">Password</label>
                        <span class="eroor" id="passwordError"></span>
                    </div>

                    <!-- 2 column grid layout -->
                    <div class="row mb-4">
                        <div class="col-md-6 d-flex justify-content-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-3 mb-md-0">
                                <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                                <label class="form-check-label" for="loginCheck"> Remember me </label>
                            </div>
                        </div>

                        <div class="col-md-6 d-flex justify-content-center">
                            <!-- Simple link -->
                            <a href="{{ url('forgotpassword') }}">Forgot password?</a>
                        </div>
                    </div>
                    <!-- Submit button -->
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-primary mb-4" type="submit">Sign in</button>
                    </div>
                    <!-- Submit button -->
                    <!--<button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>-->

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>Not a member? <a href="#!">Register</a></p>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                <form id="register" method="Post">
                @csrf
                    <div class="text-center mb-3">
                        <p>Sign up with:</p>
                    </div>
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="registerName" class="form-control" name="name"/>
                        <label class="form-label" for="registerName">Name</label>
                        <span class="eroor" id="namess"></span>
                    </div>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="registerEmail" class="form-control" name="email" />
                        <label class="form-label" for="registerEmail">Email</label>
                        <span class="eroor" id="emailss"></span>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="registerPassword" class="form-control" name="password" />
                        <label class="form-label" for="registerPassword">Password</label>
                        <span class="eroor" id="passwordss"></span>

                    </div>

                    <!-- Repeat Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="registerRepeatPassword" class="form-control" name="cpassword" />
                        <label class="form-label" for="registerRepeatPassword">Repeat password</label>
                        <span class="eroor" id="cpasswordss"></span>

                    </div>

                    <!-- Checkbox -->
                    {{-- <div class="form-check d-flex justify-content-center mb-4">
                        <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked aria-describedby="registerCheckHelpText" />
                        <label class="form-check-label" for="registerCheck">
                            I have read and agree to the terms
                        </label>
                    </div> --}}

                    <!-- Submit button -->
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-primary mb-4" type="submit">Sign in</button>
                    </div>
                    <!--<button type="submit" class="btn btn-primary btn-block mb-3">Sign in</button>-->
                </form>
            </div>
        </div>
        <!-- Pills content -->
    </div>
</section>
<!-- Hero-Banner -->

<!--End header-->
@include('web.footer')
<script>
    $(function(){
      $('#loginuser').on('submit', function (e) {
            e.preventDefault();
            var token = $(this).data("token");
               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
            $.ajax({
              type: 'Post',
              url:"{{ url("loginuser") }}",
              data:new FormData(this),
              dataType:'JSON',
              contentType: false,
              cache: false,
              processData: false,
              success: function (data) {
               
                if(data.status==201){
                    $('#emailError').html(data.error.email);
                    $('#passwordError').html(data.error.password);
                    return false;
                 } if(data.status==203){
                  $('#del').show();
                  $("#del,msg").show().delay(5000).fadeOut();
                  $('#msg').html(data.wrongdetaisl);
                  return false;
                 }else {
                    $('#emailError').html("");
                    $('#passwordError').html("");
                     setTimeout(function(){
                       window.location.href = "{{ url('/') }}";
                     }, 1000);
                }
              }
             });
            });
    });


     $(function(){
      $('#register').on('submit', function (e) {
            e.preventDefault();
            var token = $(this).data("token");
               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
            $.ajax({
              type: 'Post',
              url:"{{ url("register") }}",
              data:new FormData(this),
              dataType:'JSON',
              contentType: false,
              cache: false,
              processData: false,
              success: function (data) {
                if(data.status==201){
                    $('#emailss').html(data.error.email);
                    $('#namess').html(data.error.name);
                    $('#passwordss').html(data.error.password);
                    if(data.error.cpassword !==""){
                        $('#cpasswordss').html("THE REPEAT PASSWORD FIELD IS REQUIRED");
                    }
                 } if(data.status==203){
                     $('#emailss').html(data.email);
                 } else  {
                    $('#emailss').html("");
                    $('#namess').html("");
                    $('#passwordss').html("");
                    $('#cpasswordss').html("");
                  $('#del').show();
                  $("#del,msg").show().delay(5000).fadeOut();
                  $('#msg').html(data.success);
                     setTimeout(function(){
                       window.location.reload(1);
                     },1000);
                }
              }
             });
            });
    });
</script>