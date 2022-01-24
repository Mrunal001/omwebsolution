@extends('front.layouts.header')
@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
<section class="user">
  <div class="user_options-container">
    <div class="user_options-text">
      <div class="user_options-unregistered">
        <h2 class="user_unregistered-title">Don't have an account?</h2>
        <p class="user_unregistered-text">Banjo tote bag bicycle rights, High Life sartorial cray craft beer whatever street art fap.</p>
        <button class="user_unregistered-signup" id="signup-button">Sign up</button>
      </div>

      <div class="user_options-registered">
        <h2 class="user_registered-title">Have an account?</h2>
        <p class="user_registered-text">Banjo tote bag bicycle rights, High Life sartorial cray craft beer whatever street art fap.</p>
        <button class="user_registered-login" id="login-button">Login</button>
      </div>
    </div>
    
    <div class="user_options-forms" id="user_options-forms">
      <div class="user_forms-login">
        <h2 class="forms_title">Login</h2>
        <form class="forms_form" action="{{('userlogin')}}" method="post">
          @csrf
          <fieldset class="forms_fieldset">
            <div class="forms_field">
              <input type="email" placeholder="Email" name="email" class="forms_field-input" required autofocus />
            </div>
            <div class="forms_field">
              <input type="password" placeholder="Password" name="password" class="forms_field-input" required />
            </div>
          </fieldset>
          <div class="forms_buttons">
            <a href="{{route('forgetpassword')}}" class="forms_buttons-forgot" style="color: #6500f9;">Forgot password?</a>
            <input type="submit" value="Log In" class="forms_buttons-action">
          </div>
        </form>
      </div>
      <div class="user_forms-signup">
        <h2 class="forms_title">Sign Up</h2>
        <form class="forms_form" action="{{('register')}}" method="post">
          @csrf
          <fieldset class="forms_fieldset">
            <div class="forms_field">
              <input type="text" placeholder="Full Name" name="fullname" class="forms_field-input" required />
            </div>
            <div class="forms_field">
              <input type="email" placeholder="Your Email" name="email" class="forms_field-input" required />
            </div>
           
            <div class="forms_field">
              <input type="password" placeholder="Password" name="password" class="forms_field-input" required minlength="6" />
            </div>
            <div class="forms_field">
              <input type="text" placeholder="Your Phone" name="phone" class="forms_field-input" required maxlength="10" />
            </div>
            <div class="forms_field">
              <input type="radio" id="html" name="gender" value="Male">
              <label for="male">Male</label><br>
              <input type="radio" id="css" name="gender" value="Female">
              <label for="female">Female</label><br>
            </div>
          </fieldset>
          <div class="forms_buttons">
            <input type="submit" value="Sign up" class="forms_buttons-action">
          </div>
        </form>
      </div>
    </div>
  </div>
</section>


<!----------Designed By Pradeep Singh Tomar------------>
<script type="text/javascript">
	/**
 * Variables
 */
const signupButton = document.getElementById('signup-button'),
    loginButton = document.getElementById('login-button'),
    userForms = document.getElementById('user_options-forms')

/**
 * Add event listener to the "Sign Up" button
 */
signupButton.addEventListener('click', () => {
  userForms.classList.remove('bounceRight')
  userForms.classList.add('bounceLeft')
}, false)

/**
 * Add event listener to the "Login" button
 */
loginButton.addEventListener('click', () => {
  userForms.classList.remove('bounceLeft')
  userForms.classList.add('bounceRight')
}, false)
</script>
@endsection