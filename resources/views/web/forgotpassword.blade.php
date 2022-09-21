@include('web.header')

<div class="login-register-area">
   <div class="container">
      <h2 class="text-center">Forgot Password </h2>
      <div class="row" >
          <div class="col-lg-3 col-md-3"></div>
         <div class="col-lg-6 col-md-6">
            <div class="forgotpwd-wrapper">
               <h4 class="login-signup-header"> REGISTERED EMAIL  </h4>
               <div class="login-form">
                  <form method="Post" action="{{ url('emailmatch') }}">
                     @csrf
                     <div class="form-group row">
                        <div class="col-lg-12">
                           <label>*Email Address</label>
                           <input type="email" id="email" class="form-control" name="email" placeholder="Enter Your Email"/>
                           @if ($errors->has('email'))
                           <span class="error" style="color:red">{{ $errors->first('email') }}</span>
                           @endif
                           @if (\Session::has('success'))
                            <span class="error" style="color:red">{!! \Session::get('success') !!}</span>
                           @endif
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-lg-12">
                           <div class="button-box">
                             
                              <input type="submit" value="Submit" name="submit" class="login-signup-btn">
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-3"></div>
      </div>
   </div>
</div>
<!--<div id="open_cart_msg">-->
<!--    <a href="javascript:void(0)" class="closebtn" onclick="CloseCartMsgs()">×</a>-->
<!--    <p><span><i class="fa fa-hand-o-right"></i><span id="alerted"> </span></span>-->
<!--</p>-->
<!--</div>-->





@include('web.footer')

 @if (\Session::has('successs'))
        <script>
        	$(document).ready(function(){
        		$("#myModal").modal('show');
        	});
        </script>
        
        @endif



<script>
// function OpenCartMsgs() {
//   document.getElementById("open_cart_msg").style.display= "block";
 
 
// }
// function CloseCartMsgs() {
//   document.getElementById("open_cart_msg").style.display= "none";
// }
</script>
