@extends('user.layouts.master')
@section('title', 'İnsan Kaynakları / Personeller / Dosyalar | ')

@section('subheader')
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">İnsan Kaynakları / Personeller / Dosyalar</h1>
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">

        </div>
    </div>
@endsection

@section('content')

    @include('user.modules.employee.layouts.overview')

    @include('user.modules.employee.file.modals.show')

    <input type="file" id="fileSelector" style="display: none">

    <div class="row" id="filesRow">
        <div class="col-xl-2 mb-5">
            <div class="card h-100 flex-center border-dashed p-8 cursor-pointer" id="fileUploadArea">
                <img src="{{ asset('assets/media/svg/files/upload.svg') }}" class="mb-8" alt="" />
                <a class="font-weight-bolder text-dark-75 mb-2">Yeni Dosya</a>
                <div class="fs-7 fw-bold text-gray-400 mt-auto">Yüklemek İçin Tıklayın</div>
            </div>
        </div>
    </div>

@endsection

@section('customStyles')
    @include('user.modules.employee.file.components.style')
@endsection

@section('customScripts')
    @include('user.modules.employee.file.components.script')
@endsection
