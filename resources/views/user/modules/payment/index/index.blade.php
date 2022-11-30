@extends('user.layouts.master')
@section('title', 'Ödeme | ')

@section('subheader')
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Ödemeler</h1>
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">

        </div>
    </div>
@endsection

@section('content')

    @include('user.modules.payment.index.modals.createPayment')
    @include('user.modules.payment.index.modals.updatePayment')
    @include('user.modules.payment.index.modals.deletePayment')

    <div class="row">
        <div class="col-xl-8 mb-5">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6 mb-5">
                            <div class="form-group">
                                <label for="keyword">Personel Adı</label>
                                <input id="keyword" type="text" class="form-control form-control-solid filterInput" placeholder="Personel Adı">
                            </div>
                        </div>
                        <div class="col-xl-3 mb-5">
                            <div class="form-group">
                                <label for="date">Tarih</label>
                                <input id="date" type="date" class="form-control form-control-solid filterInput">
                            </div>
                        </div>
                        <div class="col-xl-3 mb-5">
                            <div class="form-group">
                                <label for="amount">Miktar</label>
                                <input id="amount" type="number" class="form-control form-control-solid filterInput onlyNumber">
                            </div>
                        </div>
                        <div class="col-xl-3 mb-5">
                            <div class="form-group">
                                <label for="statusId">Ödeme Durumu</label>
                                <select id="statusId" class="form-select form-select-solid select2Input" data-control="select2" data-placeholder="Ödeme Durumu">
                                    <option value="" selected hidden disabled></option>
                                    <option value="1">Beklemede</option>
                                    <option value="2">Onaylandı</option>
                                    <option value="3">Reddedildi</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-3 mb-5">
                            <div class="form-group">
                                <label for="typeId">Ödeme Türü</label>
                                <select id="typeId" class="form-select form-select-solid select2Input" data-control="select2" data-placeholder="Ödeme Türü"></select>
                            </div>
                        </div>
                        <div class="col-xl-6 mb-5">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group d-grid">
                                        <button class="btn btn-primary mt-6" id="FilterButton">Filtrele</button>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group d-grid">
                                        <button class="btn btn-secondary mt-6" id="ClearFilterButton">Temizle</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 mb-5 text-end">
            <div class="row">
                <div class="col-xl-12 d-grid">
                    <button class="btn btn-primary" onclick="createPayment()">Yeni Ödeme Oluştur</button>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body pt-0">
                    <br>
                    <div class="row">
                        <div class="col-xl-1">
                            <div class="form-group">
                                <label>
                                    <select data-control="select2" id="pageSize" data-hide-search="true" class="form-select border-0">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="col-xl-11 text-end">
                            <button class="btn btn-sm btn-icon bg-transparent bg-hover-opacity-0 text-dark" id="pageDown" disabled>
                                <i class="fas fa-angle-left"></i>
                            </button>
                            <button class="btn btn-sm btn-icon bg-transparent bg-hover-opacity-0 text-dark cursor-default" disabled>
                                <span class="text-muted" id="page">1</span>
                            </button>
                            <button class="btn btn-sm btn-icon bg-transparent bg-hover-opacity-0 text-dark" id="pageUp">
                                <i class="fas fa-angle-right"></i>
                            </button>
                        </div>
                    </div>
                    <hr class="text-muted">
                    <table class="table align-middle table-row-dashed fs-6 gy-5">
                        <thead>
                        <tr class="text-start text-dark fw-bolder fs-7 gs-0">
                            <th class="">#</th>
                            <th class="">Personel</th>
                            <th class="">Durum</th>
                            <th class="hideIfMobile">Ödeme Türü</th>
                            <th class="hideIfMobile">Tarih</th>
                            <th class="hideIfMobile">Miktar</th>
                        </tr>
                        </thead>
                        <tbody class="fw-bold text-gray-600" id="payments"></tbody>
                    </table>
                    <hr class="text-muted">
                    <div class="row">
                        <div class="col-xl-12 text-end">
                            <span class="text-muted">Toplam <span id="totalCountSpan">%</span> Kayıttan <span id="startCountSpan">%</span> - <span id="endCountSpan">%</span> Arasındakiler Gösteriliyor</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('customStyles')
    @include('user.modules.payment.index.components.style')
@endsection

@section('customScripts')
    @include('user.modules.payment.index.components.script')
@endsection
