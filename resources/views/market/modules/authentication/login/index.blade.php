@extends('market.layouts.auth')
@section('title', 'Market Girişi | ')

@section('content')

    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
        <a href="{{ route('home') }}" class="mb-12">
            <img alt="Logo" src="{{ asset('assets/media/logos/favicon.png') }}" class="h-75px" />
        </a>
        <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
            <div class="form w-100">
                <div class="fv-row mb-10">
                    <label for="code" class="form-label fs-6 fw-bolder text-dark">Market Kodunuz</label>
                    <input id="code" type="text" class="form-control form-control-lg form-control-solid" autocomplete="off" />
                </div>
                <div class="fv-row mb-10">
                    <div class="d-flex flex-stack mb-2">
                        <label for="password" class="form-label fw-bolder text-dark fs-6 mb-0">Şifreniz</label>
                        <a href="#" class="link-primary fs-6 fw-bolder" tabindex="-1">Şifremi Unuttum</a>
                    </div>
                    <input id="password" type="password" class="form-control form-control-lg form-control-solid" autocomplete="off" />
                </div>
                <div class="fv-row mb-10">
                    <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="" id="remember" checked />
                        <label class="form-check-label" for="remember">
                            Oturumu Açık Tut
                        </label>
                    </div>
                </div>
                <div class="text-center">
                    <button type="button" id="LoginButton" class="btn btn-lg btn-primary w-100 mb-5">Giriş Yap</button>
                    <a href="{{ route('home') }}" class="btn btn-lg btn-secondary w-100 mb-5">Ana Ekran</a>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('customStyles')
    @include('market.modules.authentication.login.components.style')
@endsection

@section('customScripts')
    @include('market.modules.authentication.login.components.script')
@endsection
