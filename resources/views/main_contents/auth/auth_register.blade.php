@extends('apps_auth')

{{-- title --}}
@section('title', $titlePage)

{{-- content --}}
@section('content')

<section class="row flexbox-container">
    <div class="col-xl-10 col-11">
        <div class="card bg-authentication mb-0">
            <div class="row m-0">
                <!-- register section left -->
                <div class="col-md-7 col-12 px-0">
                    <div class="card disable-rounded-right mb-0 h-100 d-flex justify-content-center">
                        <div class="card-header pb-0 pt-1">
                            <div class="card-title d-flex justify-content-center">
                                <img class="img-fluid w-25" src="{{ asset('images/logo/web_logo.png') }}" alt="branding logo">
                            </div>
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
                        <div class="card-body">
                            <div class="divider">
                                <div class="divider-text text-uppercase text-muted">
                                    <small>Sign UP</small>
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
                            <form class="form form-vertical" id="form-tambah-master-user" action="{{ route('auth.act_register') }}" method="POST" autocomplete="off">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6 mb-50">
                                        <label for="inputname">Nama Lengkap :</label>
                                        <input type="text" class="form-control" id="form_namalengkap" name="form_namalengkap" placeholder="Nama Lengkap" required>
                                    </div>
                                    <div class="form-group col-md-6 mb-50">
                                        <label for="inputusername">Username :</label>
                                        <input type="text" class="form-control" id="form_username" name="form_username" placeholder="Username" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 mb-50">
                                        <label for="inputpassword">Password :</label>
                                        <input type="password" class="form-control" id="form_password" name="form_password" placeholder="Password" required>
                                    </div>
                                    <div class="form-group col-md-6 mb-50">
                                        <label for="inputpassword">Ulangi Password :</label>
                                        <input type="password" class="form-control" id="form_password-re" name="form_password-re" placeholder="Ulangi Password" required>
                                    </div>
                                </div>                                
                                <div class="form-group mb-50">
                                    <label class="text-bold-600" for="exampleInputEmail1">Alamat Email :</label>
                                    <input type="email" class="form-control" id="form_email" name="form_email" placeholder="Alamat Email" required>
                                </div>
                                <button type="submit" class="btn btn-primary glow position-relative w-50">SIGN UP<i id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                            </form>
                            <hr>
                            <div class="text-center"><small class="mr-25">Already have an account?</small><a href="{{ route('auth.login') }}"><small>Sign in</small> </a></div>
                        </div>
                    </div>
                </div>
                <!-- image section right -->
                <div class="col-md-5 d-md-block d-none text-center align-self-center p-3">
                    <img class="img-fluid" src="{{ asset('app-assets/images/pages/register.png') }}" alt="branding logo">
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