@extends('FrontEnd.master');

@section('title')
    Check Out
@endsection

@section('content')
    <!-- login-page -->
	<div class="login-page about">
		<img class="login-w3img" src="{{asset('/')}}FrontEndSourceFile/images/img3.jpg" alt="">
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1">Login to your account</h3> 
            
                <strong class="text-center"style="color: red">{{Session::get('sms')}}</strong>
  
			<div class="login-agileinfo"> 
				<form action="{{ route('Check_login') }}" method="post"> 
                    @csrf
					<input class="agile-ltext" type="email" name="email" placeholder="email" required="">
					<input class="agile-ltext" type="password" name="password" placeholder="Password" required="">
					<div class="wthreelogin-text"> 
						<ul> 
							<!-- <li><a href="#">Forgot password?</a> </li> -->
						</ul>
						<div class="clearfix"> </div>
					</div>   
					<input type="submit" value="LOGIN">
				</form>
				<p>Don't have an Account? <a href="{{ route('sign_up') }}"> Sign Up Now!</a></p> 
			</div>	 
		</div>
	</div>
	<!-- //login-page -->  
@endsection
