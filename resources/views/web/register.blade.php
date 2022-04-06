@extends('web.layouts.master')
@section('content')

    <!-- //breadcrumbs -->
    <!-- register -->
    <section id="form" ><!--form-->
		<div class="container" >
			<div class="row" >
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Sign in to your account!</h2>
						<form action="{{Route('web.login')}}">
							@csrf
							
							<button type="submit" class="btn btn-default">Login Here</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Register a new user!</h2>
						<form action="javascript:void(0)" id="form_register" class="animated wow slideInUp" data-wow-delay=".5s">
                            <input type="text" id="name" name="name" placeholder="Email Name" required>
                            <br>
                            <input type="email" id="email" name="email" placeholder="Email Address" required>
                            <input type="password" id="password" name="password" placeholder="Password" required>
                            <input type="password" name="password_confirm" placeholder="Password Confirmation" required>
                            <div class="register-check-box">
                                <div class="check">
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>I accept the terms
                                        and conditions</label>
                                </div>
                            </div>
                            <br/>
                            <button type="submit" id="myButton" class="btn btn-default">
                                Reggister
                            </button>
                        </form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section>
    <div class="register">
        <div class="container">
            <script>
                $(document).ready(function() {
                    $('#form_register').submit(function(e) {
                        e.preventDefault();
                        var name = $("#name").val();
                        var email = $("#email").val();
                        var password = $("#password").val();
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: "POST",
                            url: "{{ route('web.register.store') }}",
                            data: {
                                name: name,
                                email: email,
                                password: password
                            },
                            success: function(data) {
                                swal("Register Successfully !", "You clicked the button!", "success");
                                $('#form_register')[0].reset();
                            }
                        });
                    });
                });
            </script>
        </div>
    </div>

@endsection
