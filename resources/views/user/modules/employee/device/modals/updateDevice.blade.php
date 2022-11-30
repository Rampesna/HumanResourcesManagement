<div class="modal fade show" id="UpdateDeviceModal" tabindex="-1" aria-modal="true" role="dialog" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered mw-800px">
        <div class="modal-content rounded">
            <div class="modal-header pb-0 border-0 justify-content-end">
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <div class="form fv-plugins-bootstrap5 fv-plugins-framework">
                    <div class="mb-13 text-center">
                        <h1 class="mb-3">Cihaz Güncelle</h1>
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                        <input type="hidden" id="update_device_id">
                        <div class="row mb-5">
                            <div class="col-xl-3 mt-3">
                                <label for="update_device_company_id" class="font-weight-bolder">Firma</label>
                            </div>
                            <div class="col-xl-9">
                                <div class="form-group">
                                    <select id="update_device_company_id" class="form-select form-select-solid select2Input" data-control="select2" data-placeholder="Firma"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-xl-3 mt-3">
                                <label for="update_device_employee_id" class="font-weight-bolder">Personel</label>
                            </div>
                            <div class="col-xl-9">
                                <div class="form-group">
                                    <select id="update_device_employee_id" class="form-select form-select-solid select2Input" data-control="select2" data-placeholder="Personel"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-xl-3 mt-3">
                                <label for="update_device_category_id" class="font-weight-bolder">Kategori</label>
                            </div>
                            <div class="col-xl-9">
                                <div class="form-group">
                                    <select id="update_device_category_id" class="form-select form-select-solid select2Input" data-control="select2" data-placeholder="Kategori"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-xl-3 mt-3">
                                <label for="update_device_status_id" class="font-weight-bolder">Cihaz Durumu</label>
                            </div>
                            <div class="col-xl-9">
                                <div class="form-group">
                                    <select id="update_device_status_id" class="form-select form-select-solid select2Input" data-control="select2" data-placeholder="Cihaz Durumu"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-xl-3 mt-3">
                                <label for="update_device_name" class="font-weight-bolder">Cihaz Adı</label>
                            </div>
                            <div class="col-xl-9">
                                <div class="form-group">
                                    <input id="update_device_name" type="text" class="form-control form-control-solid">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-xl-3 mt-3">
                                <label for="update_device_brand" class="font-weight-bolder">Marka</label>
                            </div>
                            <div class="col-xl-9">
                                <div class="form-group">
                                    <input id="update_device_brand" type="text" class="form-control form-control-solid">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-xl-3 mt-3">
                                <label for="update_device_model" class="font-weight-bolder">Model</label>
                            </div>
                            <div class="col-xl-9">
                                <div class="form-group">
                                    <input id="update_device_model" type="text" class="form-control form-control-solid">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-xl-3 mt-3">
                                <label for="update_device_serial_number" class="font-weight-bolder">Seri No</label>
                            </div>
                            <div class="col-xl-9">
                                <div class="form-group">
                                    <input id="update_device_serial_number" type="text" class="form-control form-control-solid">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-xl-3 mt-3">
                                <label for="update_device_ip_address" class="font-weight-bolder">IP Adresi</label>
                            </div>
                            <div class="col-xl-9">
                                <div class="form-group">
                                    <input id="update_device_ip_address" type="text" class="form-control form-control-solid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-light me-3">Vazgeç</button>
                        <button type="button" class="btn btn-success" id="UpdateDeviceButton">Güncelle</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
