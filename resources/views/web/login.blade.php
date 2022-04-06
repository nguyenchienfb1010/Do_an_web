@extends('web.layouts.master')
@section('content')
<section id="form" ><!--form-->
    <div class="login">
    <div class="container" >
        <h3 class="animated wow zoomIn" data-wow-delay=".5s">Login Form</h3>
        <div class="row" >
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">
                    <h2>Log in to your account!</h2>
                    @if ($errors->any())
                    <div class="alert alert-warning">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
						<form action="{{ route('login.store.web') }}" method="post">
							@csrf
							<input type="email"  name="email" placeholder="Email Address " />
                            
							<input type="password" name="password" placeholder="Password" />
                            
                            
							<button type="submit" class="btn btn-default">Login</button>
                            <br/>
						</form>
                        <a class="btn btn-outline-dark" href="{{ route('login.google') }}" role="button" style="text-transform:none;">
                            <img width="20px" alt="Google sign-in"
                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
                            Login with Google
                        </a>
                        <br/>
                        <a href="{{ route('web.forget') }}" style="margin-left: 15px"> Forget Password!
                        </a>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>Register a new user!</h2>
                    <form action="{{ route('web.register') }}">
                        @csrf
                        <button type="submit" class="btn btn-default">Register Here</button>
                    </form>
                    
                </div><!--/sign up form-->
            </div>
</div>
    </div>
</section>
@endsection
