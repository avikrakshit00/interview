@include('inc.css')

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="backend/images/icon/logo.png" alt="CoolAdmin">
                            </a>
                        </div>
                        {!! Toastr::message() !!}
                        <div class="login-form">
                            <form action="{{route('userlogin')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input class="au-input au-input--full" type="text" name="mobile" placeholder="Registered Mobile Number">
                                    <span style="color: red">@error('mobile'){{ $message}}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                    <span style="color: red">@error('password'){{ $message}}@enderror</span>
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                    <label>
                                        <a href="#">Forgotten Password?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Login</button>

                            </form>
                            <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="{{route('register')}}">Sign Up Here</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('inc.js')
