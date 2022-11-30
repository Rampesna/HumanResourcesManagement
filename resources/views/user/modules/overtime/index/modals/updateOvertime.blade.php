<div class="modal fade show" id="UpdateOvertimeModal" tabindex="-1" aria-modal="true" role="dialog" data-bs-backdrop="static">
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
                        <h1 class="mb-3">Mesai Güncelle</h1>
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                        <input type="hidden" id="update_overtime_id">
                        <input type="hidden" id="update_overtime_employee_id">
                        <div class="row mb-5">
                            <div class="col-xl-3 mt-3">
                                <label for="update_overtime_type_id" class="font-weight-bolder">Mesai Türü</label>
                            </div>
                            <div class="col-xl-9">
                                <div class="form-group">
                                    <select id="update_overtime_type_id" class="form-select form-select-solid select2Input" data-control="select2" data-placeholder="Mesai Türü"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-xl-3 mt-3">
                                <label for="update_overtime_status_id" class="font-weight-bolder">Mesai Durumu</label>
                            </div>
                            <div class="col-xl-9">
                                <div class="form-group">
                                    <select id="update_overtime_status_id" class="form-select form-select-solid select2Input" data-control="select2" data-placeholder="Mesai Durumu">
                                        <option value="1">Beklemede</option>
                                        <option value="2">Onaylandı</option>
                                        <option value="3">Reddedildi</option>
                                        <option value="4">Ekstra İzne Çevrildi</option>
                                        <option value="5">Ödemeye Çevrildi</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-xl-3 mt-3">
                                <label for="update_overtime_start_date" class="font-weight-bolder">Başlangıç Tarihi</label>
                            </div>
                            <div class="col-xl-9">
                                <div class="form-group">
                                    <input id="update_overtime_start_date" type="datetime-local" class="form-control form-control-solid">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-xl-3 mt-3">
                                <label for="update_overtime_end_date" class="font-weight-bolder">Bitiş Tarihi</label>
                            </div>
                            <div class="col-xl-9">
                                <div class="form-group">
                                    <input id="update_overtime_end_date" type="datetime-local" class="form-control form-control-solid">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-xl-3 mt-3">
                                <label for="update_overtime_description" class="font-weight-bolder">Açıklamalar</label>
                            </div>
                            <div class="col-xl-9">
                                <div class="form-group">
                                    <textarea id="update_overtime_description" class="form-control form-control-solid" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-light me-3">Vazgeç</button>
                        <button type="button" class="btn btn-success" id="UpdateOvertimeButton">Güncelle</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
