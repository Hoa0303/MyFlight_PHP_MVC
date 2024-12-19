<!-- Modal-login -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-center d-block">
                <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                <h1 data-translate="Log In" class="modal-title fs-5" id="staticBackdropLabel">Log In</h1>
            </div>
            <div class="modal-body">
                <form class="container" id="loginForm" method="post" action="/login">
                    <div class="mb-3">
                        <input name="username" class="form-control" placeholder="Email/Phone number">
                    </div>
                    <div class="mb-3">
                        <input name="pass" type="password" class="form-control" placeholder="Password">
                    </div>
                    <button name="login" type="submit" class="mb-3 btn btn-primary form-control"><span data-translate="login">Login</span></button>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label data-translate="remember" class="form-check-label" for="exampleCheck1">Remember me</label>
                        <a data-translate="forgot" class="float-end" href="" data-bs-target="#exampleModalToggle1" data-bs-toggle="modal">Forgot Password?</a>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="container text-center">
                    <p data-translate="continue">or continue with</p>
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-4 col-12 text-center">
                            <button type="submit" class="mb-3 btn btn-primary form-control"><i class="fa-brands fa-facebook"></i>
                                Facebook</button>
                        </div>
                        <div class="col-sm-4 col-12 text-center">
                            <button type="submit" class="mb-3 btn btn-primary form-control"><i class="fa-brands fa-google"></i>
                                Google</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer pb-0">
                <div class="container text-center mb-0">
                    <p><span data-translate="havean">Do not have an account?</span> <a data-translate="signup" href="" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal-reset_pass -->
<div class="modal fade" id="exampleModalToggle1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel1" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-center d-block">
                <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                <h1 data-translate="recover" class="modal-title fs-5" id="staticBackdropLabel">Recover password</h1>
            </div>
            <div class="modal-body">
                <form class="container">
                    <div class="mb-3">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                    </div>
                    <button type="submit" class="mb-3 btn btn-primary form-control"><span data-translate="recover">Recover
                            password</span></button>
                </form>
            </div>
            <div class="modal-footer">
                <div class="container text-center mb-0">
                    <p><span data-translate="Remember your password?">Remember your password?</span> <a data-translate="Log In" href="" data-bs-target="#staticBackdrop" data-bs-toggle="modal">Log In</a></p>
                </div>
                <!-- <button class="btn btn-primary" data-bs-target="#staticBackdrop" data-bs-toggle="modal">Back to first</button> -->
            </div>
        </div>
    </div>
</div>

<!-- Modal-Sign_Up -->
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-center d-block" role="alert">
                <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                <h1 data-translate="register" class="modal-title fs-5" id="staticBackdropLabel">Register</h1>
            </div>
            <div class="modal-body">
                <form class="container" id="signupForm" method="post" action="/register">
                    <div class="mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="confirm_pass" name="confirm_pass" placeholder="Confirm Password">
                    </div>
                    <button type="register" class="mb-3 btn btn-primary form-control" name="signup" value="Sign up"><span data-translate="register">Register</span></button>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="agree" name="agree" value="agree">
                        <label class="form-check-label" for="agree"><span data-translate="I have read and accept the">I
                                have read and accept the</span> <a data-translate="Terms and Privacy Policy" href="#">Terms and
                                Privacy Policy</a></label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="container text-center mb-0">
                    <p><span data-translate="Have an account?">Have an account?</span> <a data-translate="Log In" href="" data-bs-target="#staticBackdrop" data-bs-toggle="modal">Log In</a></p>
                </div>
                <!-- <button class="btn btn-primary" data-bs-target="#staticBackdrop" data-bs-toggle="modal">Back to first</button> -->
            </div>
        </div>
    </div>
</div>

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                <a class="btn btn-primary" href="/logout">Logout</a>
            </div>
        </div>
    </div>
</div>