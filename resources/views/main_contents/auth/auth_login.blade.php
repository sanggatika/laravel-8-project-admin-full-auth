@extends('apps_auth')

{{-- title --}}
@section('title', $titlePage)

{{-- content --}}
@section('content')

<section id="auth-login" class="row flexbox-container">
    <div class="col-xl-10 col-11">
        <div class="card bg-authentication mb-0">
            <div class="row m-0">
                <!-- left section-login -->
                <div class="col-md-6 col-12 px-0">
                    <div class="card disable-rounded-right mb-0 h-100 d-flex justify-content-center">
                        <div class="card-header pb-0 d-flex justify-content-center">
                            <img class="img-fluid w-50" src="{{ asset('images/logo/web_logo.png') }}" alt="branding logo">
                            <div id="loading-spiner" class="loading-spiner w-100 text-center">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <div class="spinner-border text-secondary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <div class="spinner-border text-success" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-body mt-0">
                            <div class="divider">
                                <div class="divider-text text-uppercase text-muted">
                                    <small>Login Page Today</small>
                                </div>
                            </div>
                            <div id="alert-error" class="alert-error alert alert-warning alert-dismissible mb-1" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <div class="d-flex align-items-center">
                                    <i class="bx bx-error-circle"></i>
                                    <span class="alert-link" id="pesan-error">
                                        Masukan Pesan Error Disini..
                                    </span>
                                </div>
                            </div>
                            <form class="form form-vertical" id="form-login-user" action="{{ route('auth.act_login') }}" method="POST" autocomplete="off">
                                @csrf
                                <div class="form-group mb-50">
                                    <label for="inputusername">Username :</label>
                                    <input type="text" class="form-control" id="form_username" name="form_username" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-bold-600" for="exampleInputPassword1">Password :</label>
                                    <input type="password" class="form-control" id="form_password" name="form_password" placeholder="Password" required>
                                </div>
                                <div class="form-group d-flex flex-md-row flex-column justify-content-between align-items-center">
                                    <div class="text-left">
                                        <div class="checkbox checkbox-sm">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="checkboxsmall" for="exampleCheck1"><small>Keep me logged
                                                    in</small></label>
                                        </div>
                                    </div>
                                    <div class="text-right"><a href="{{ route('auth.forgot_password') }}" class="card-link"><small>Forgot Password?</small></a></div>
                                </div>
                                <button type="submit" class="btn btn-primary glow w-100 position-relative">Login<i id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                            </form>
                            <hr>
                            <div class="text-center"><small class="mr-25">Don't have an account?</small><a href="{{ route('auth.register') }}"><small>Sign up</small></a></div>
                        </div>
                    </div>
                </div>
                <!-- right section image -->
                <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
                    <img class="img-fluid" src="{{ asset('app-assets/images/pages/login.png') }}" alt="branding logo">
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{ asset('js/page_scripts/authentication.js?version=')}}{{uniqid() }}"></script>
@endsection