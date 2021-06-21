<h3>Hello {{$name}}</h3>
<p>
	Please click the password reset button to reset your password
	<a href="{{ url('/passwordreset/token='.$code)}}">Reset Password</a>
</p>