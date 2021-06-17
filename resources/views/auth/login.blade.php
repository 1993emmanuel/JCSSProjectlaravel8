<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/melody/template/pages/samples/register-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:54 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Iniciar Sesion</title>
  <!-- plugins:css -->
  {!! Html::style('melody/vendors/iconfonts/font-awesome/css/all.min.css') !!}
  {!! Html::style('melody/vendors/css/vendor.bundle.base.csss') !!}
  {!! Html::style('melody/vendors/css/vendor.bundle.addons.css') !!}
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  {!! Html::style('melody/css/style.css') !!}
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="../../images/logo.svg" alt="logo">
              </div>

              @if(session('status'))
	              <div class="mt-3 mb-3 border border-danger text-center">
	              	<h3 class="text-uppercase font-weight-bold text-danger">Error!!</h3>
	              	<span class="text-danger lead">{{session('status')}}</span>
	              </div>
              @endif


              <h4>Que esperas inicia session</h4>
              <h6 class="font-weight-light">Ingresa tus datos por favor....</h6>
              	{!! Form::open(['route'=>'login.store', 'method'=>'POST']) !!}

	                <div class="form-group">
	                	<label>Email</label>
	                  		<div class="input-group">
	                    		<div class="input-group-prepend bg-transparent">
	                      			<span class="input-group-text bg-transparent border-right-0">
	                        			<i class="far fa-envelope-open text-primary"></i>
	                      			</span>
	                    		</div>
	                    		<input 
	                    			type="email" id="email" name="email" value="{{old('email')}}" 
	                    			class="form-control form-control-lg border-left-0" placeholder="Email">
	                  		</div>
	                  		@error('email')
	                  			<span class="text-danger lead">{{$message}}</span>
	                  		@enderror
	                </div>
	                <div class="form-group">
	                	<label>Password</label>
	                  		<div class="input-group">
	                    		<div class="input-group-prepend bg-transparent">
	                      			<span class="input-group-text bg-transparent border-right-0">
	                        			<i class="fa fa-lock text-primary"></i>
	                      			</span>
	                    		</div>
	                    		<input 
	                    			type="password" id="password" name="password" 
	                    			class="form-control form-control-lg border-left-0" placeholder="Password">
	                  		</div>
	                  		@error('password')
	                  			<span class="text-danger lead">{{$message}}</span>
	                  		@enderror
	                </div>

	                <div class="form-group">
	                	<button
	                		class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
	                		type="submit">
	                		Login
	                	</button>
	                </div>

                  <div class="form-group">
                      <input type="checkbox" name="remember" id="remember" class="mr-2">
                      <label for="remember">Recuerdame!!</label>
                  </div>

                {!! Form::close() !!}
{{--                 <div class="mt-3">
                	<a 
                		href="../../index-2.html"
                		class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >
                  		Registrarse
                  	</a>
                </div> --}}

                <div class="text-center mt-4 font-weight-light">
                	Ya tienes una cuenta? <a href="login.html" class="text-primary">Login</a>
                </div>
            </div>
          </div>

          	<div class="col-lg-6 register-half-bg d-flex flex-row">
            	<p class="text-white font-weight-medium text-center flex-grow align-self-end">
            		Copyright &copy; 2018  All rights reserved.
            	</p>
          	</div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  {!! Html::script('melody/vendors/js/vendor.bundle.base.js') !!}
  {!! Html::script('melody/vendors/js/vendor.bundle.addons.js') !!}
  <!-- endinject -->
  <!-- inject:js -->
  {!! Html::script('melody/js/off-canvas.js') !!}
  {!! Html::script('melody/js/hoverable-collapse.js') !!}
  {!! Html::script('melody/js/misc.js') !!}
  {!! Html::script('melody/js/settings.js') !!}
  {!! Html::script('melody/js/todolist.js') !!}
  {{-- {!! Html::script('melody/js/dashboard.js') !!} --}}
  <!-- endinject -->
</body>


<!-- Mirrored from www.urbanui.com/melody/template/pages/samples/register-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:54 GMT -->
</html>

