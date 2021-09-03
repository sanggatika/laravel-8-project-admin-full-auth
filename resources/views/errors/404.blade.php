@extends('apps_auth')

{{-- title --}}
@section('title', 'Not-authorized')

{{-- content --}}
@section('content')

<section class="row flexbox-container">
    <div class="col-xl-6 col-md-7 col-9">
        <div class="card bg-transparent shadow-none">
            <div class="card-body text-center bg-transparent">
                <h1 class="error-title">Page Not Found :(</h1>
                <p class="pb-3">we couldn't find the page you are looking for</p>
                <img class="img-fluid" src="{{asset('app-assets/images/pages/404.png') }}" alt="404 error">
                <a href="{{ route('auth.login') }}" class="btn btn-primary round glow mt-3">BACK TO HOME</a>
            </div>
        </div>
    </div>
</section>

@endsection

{{-- page scripts --}}
@section('page-scripts')
@endsection