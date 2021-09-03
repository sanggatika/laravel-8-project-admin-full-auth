@extends('apps_auth')

{{-- title --}}
@section('title', $titlePage)

{{-- content --}}
@section('content')

<section class="row flexbox-container">
    <div class="col-xl-10 col-md-10 col-10  px-0">
        <div class="card bg-authentication mb-0">
            <div class="row m-0">
                <!-- left section-forgot password -->
                <div class="col-md-6 col-12 px-0">
                    <div class="card disable-rounded-right mb-0 p-2">
                        <div class="card-header pb-0 pt-0">
                            <div class="card-title d-flex justify-content-center">
                                <img class="img-fluid w-50" src="{{ asset('images/logo/web_logo.png') }}" alt="branding logo">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-muted text-center mb-2"><small>Enter the email or phone number you
                                    used
                                    when you joined
                                    and we will send you temporary password</small></div>
                            <form class="mb-2" action="index.html">
                                <div class="form-group mb-2">
                                    <label class="text-bold-600" for="exampleInputEmailPhone1">Email or
                                        Phone</label>
                                    <input type="text" class="form-control" id="exampleInputEmailPhone1" placeholder="Email or Phone"></div>
                                <button type="submit" class="btn btn-primary glow position-relative w-100">SEND
                                    PASSWORD<i id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                            </form>
                            
                            <div class="form-group d-flex justify-content-between align-items-center mb-2">
                                <div class="text-left">
                                    <div class="ml-3 ml-md-2 mr-1"><a href="{{ route('auth.login') }}" class="card-link btn btn-outline-primary text-nowrap">Sign
                                            in</a></div>
                                </div>
                                <div class="mr-3"><a href="{{ route('auth.register') }}" class="card-link btn btn-outline-primary text-nowrap">Sign
                                        up</a></div>
                            </div>
                            <div class="divider mb-2">
                                <div class="divider-text">FORGOT PASSWORD</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- right section image -->
                <div class="col-md-6 d-md-block d-none text-center align-self-center">
                    <img class="img-fluid" src="{{ asset('app-assets/images/pages/forgot-password.png') }}" alt="branding logo" width="300">
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{ asset('app-assets/js/scripts/pages/faq.js?version=')}}{{uniqid() }}"></script>
@endsection