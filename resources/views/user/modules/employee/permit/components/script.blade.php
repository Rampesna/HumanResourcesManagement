<script>

    var updatePermission = `true`;
    var deletePermission = `true`;

    var employee = null;

    var employeeId = `{{ $id }}`;

    var employeeImageSpan = $('#employeeImageSpan');
    var employeeNameSpan = $('#employeeNameSpan');
    var employeeIdentitySpan = $('#employeeIdentitySpan');
    var employeeEmailSpan = $('#employeeEmailSpan');
    var employeePhoneSpan = $('#employeePhoneSpan');

    function getEmployeeById() {
        $.ajax({
            type: 'get',
            url: '{{ route('user.api.employee.getById') }}',
            headers: {
                'Accept': 'application/json',
                'Authorization': token
            },
            data: {
                id: employeeId,
            },
            success: function (response) {
                employee = response.response;
                if (response.response.image) employeeImageSpan.attr('src', `${baseAssetUrl}${response.response.image}`);
                employeeNameSpan.html(response.response.name);
                employeeIdentitySpan.html(`<i class="far fa-user-circle me-4"></i><span class="mt-n1">${response.response.identity}</span>`);
                employeeEmailSpan.html(`<i class="far fa-envelope me-4"></i><span class="mt-n1">${response.response.email}</span>`);
                employeePhoneSpan.html(`<i class="fas fa-phone-square-alt me-4"></i><span class="mt-n1">${response.response.phone}</span>`);
                $('#loader').hide();
            },
            error: function (error) {
                console.log(error);
                $('#loader').hide();
                toastr.error('Personel Bilgileri Alınırken Serviste Bir Sorun Oluştu.');
            }
        });
    }

    getEmployeeById();

</script>

<script>

    var permits = $('#permits');

    var page = $('#page');
    var pageUpButton = $('#pageUp');
    var pageDownButton = $('#pageDown');
    var pageSizeSelector = $('#pageSize');
    var FilterButton = $('#FilterButton');
    var ClearFilterButton = $('#ClearFilterButton');

    var typeIdFilter = $('#typeId');
    var statusIdFilter = $('#statusId');
    var startDateFilter = $('#startDate');
    var endDateFilter = $('#endDate');

    var CreatePermitButton = $('#CreatePermitButton');
    var UpdatePermitButton = $('#UpdatePermitButton');
    var DeletePermitButton = $('#DeletePermitButton');

    var createPermitTypeId = $('#create_permit_type_id');
    var updatePermitTypeId = $('#update_permit_type_id');

    var createPermitStatusId = $('#create_permit_status_id');
    var updatePermitStatusId = $('#update_permit_status_id');

    function createPermit() {
        createPermitTypeId.val('');
        createPermitStatusId.val('');
        $('#create_permit_start_date').val('');
        $('#create_permit_end_date').val('');
        $('#create_permit_description').val('');
        $('#CreatePermitModal').modal('show');
    }

    function updatePermit(id) {
        $('#loader').show();
        $('#update_permit_id').val(id);
        $.ajax({
            type: 'get',
            url: '{{ route('user.api.permit.getById') }}',
            headers: {
                'Accept': 'application/json',
                'Authorization': token
            },
            data: {
                id: id,
            },
            success: function (response) {
                updatePermitTypeId.val(response.response.type_id);
                updatePermitStatusId.val(response.response.status_id);
                $('#update_permit_start_date').val(reformatDatetimeForInput(response.response.start_date));
                $('#update_permit_end_date').val(reformatDatetimeForInput(response.response.end_date));
                $('#update_permit_description').val(response.response.description);
                $('#UpdatePermitModal').modal('show');
                $('#loader').hide();
            },
            error: function (error) {
                console.log(error);
                toastr.error('İzin Verileri Alınırken Serviste Bir Sorun Oluştu!');
                $('#loader').hide();
            }
        });
    }

    function deletePermit(id) {
        $('#delete_permit_id').val(id);
        $('#DeletePermitModal').modal('show');
    }

    function getPermitTypes() {
        $.ajax({
            type: 'get',
            url: '{{ route('user.api.permitType.getAll') }}',
            headers: {
                'Accept': 'application/json',
                'Authorization': token
            },
            data: {},
            success: function (response) {
                createPermitTypeId.empty();
                updatePermitTypeId.empty();
                typeIdFilter.empty();
                $.each(response.response, function (i, permitType) {
                    createPermitTypeId.append($('<option>', {
                        value: permitType.id,
                        text: permitType.name
                    }));
                    updatePermitTypeId.append($('<option>', {
                        value: permitType.id,
                        text: permitType.name
                    }));
                    typeIdFilter.append($('<option>', {
                        value: permitType.id,
                        text: permitType.name
                    }));
                });
                typeIdFilter.val('');
            },
            error: function (error) {
                console.log(error);
                toastr.error('İzin Türleri Alınırken Serviste Bir Sorun Oluştu!');
            }
        });
    }

    function getPermits() {
        permits.html(`<tr><td colspan="7" class="text-center fw-bolder"><i class="fa fa-lg fa-spinner fa-spin"></i></td></tr>`);
        var employeeId = parseInt(`{{ $id }}`);
        var pageIndex = parseInt(page.html()) - 1;
        var pageSize = pageSizeSelector.val();
        var startDate = startDateFilter.val();
        var endDate = endDateFilter.val();
        var statusId = statusIdFilter.val();
        var typeId = typeIdFilter.val();

        $.ajax({
            type: 'get',
            url: '{{ route('user.api.permit.getByEmployeeId') }}',
            headers: {
                'Accept': 'application/json',
                'Authorization': token
            },
            data: {
                employeeId: employeeId,
                pageIndex: pageIndex,
                pageSize: pageSize,
                startDate: startDate ? startDate + ' 00:00:00' : null,
                endDate: endDate ? endDate + ' 23:59:59' : null,
                statusId: statusId,
                typeId: typeId,
            },
            success: function (response) {
                permits.empty();
                $('#totalCountSpan').text(response.response.totalCount);
                $('#startCountSpan').text(parseInt(((pageIndex) * pageSize)) + 1);
                $('#endCountSpan').text(parseInt(parseInt(((pageIndex) * pageSize)) + 1) + parseInt(pageSize) > response.response.totalCount ? response.response.totalCount : parseInt(((pageIndex) * pageSize)) + 1 + parseInt(pageSize));
                $.each(response.response.permits, function (i, permit) {
                    permits.append(`
                    <tr>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary btn-icon btn-sm" type="button" id="${permit.id}_Dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-th"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="${permit.id}_Dropdown" style="width: 175px">
                                    ${updatePermission === 'true' ? `
                                    <a class="dropdown-item cursor-pointer mb-2 py-3 ps-6" onclick="updatePermit(${permit.id})" title="Düzenle"><i class="fas fa-edit me-2 text-primary"></i> <span class="text-dark">Düzenle</span></a>
                                    ` : ``}
                                    ${deletePermission === 'true' ? `
                                    <hr class="text-muted">
                                    <a class="dropdown-item cursor-pointer py-3 ps-6" onclick="deletePermit(${permit.id})" title="Sil"><i class="fas fa-trash-alt me-3 text-danger"></i> <span class="text-dark">Sil</span></a>
                                    ` : ``}
                                </div>
                            </div>
                        </td>
                        <td>
                            ${permit.employee ? permit.employee.name : ''}
                        </td>
                        <td>
                            <span class="badge badge-${permit.status ? permit.status.color : ''}">${permit.status ? permit.status.name : ''}</span>
                        </td>
                        <td class="hideIfMobile">
                            ${permit.type ? permit.type.name : ''}
                        </td>
                        <td class="hideIfMobile">
                            ${reformatDatetimeToDatetimeForHuman(permit.start_date)}
                        </td>
                        <td class="hideIfMobile">
                            ${reformatDatetimeToDatetimeForHuman(permit.end_date)}
                        </td>
                        <td class="hideIfMobile">
                            ${minutesToString(getMinutesBetweenTwoDates(permit.start_date, permit.end_date))}
                        </td>
                    </tr>
                    `);
                });

                checkScreen();

                if (response.response.totalCount <= (pageIndex + 1) * pageSize) {
                    pageUpButton.attr('disabled', true);
                } else {
                    pageUpButton.attr('disabled', false);
                }
            },
            error: function (error) {
                console.log(error);
                toastr.error('İzinler Alınırken Serviste Bir Sorun Oluştu.');
                $('#loader').hide();
            }
        });
    }

    getPermitTypes();
    getPermits();

    SelectedCompanies.change(function () {
        getPermits();
    });

    function changePage(newPage) {
        if (newPage === 1) {
            pageDownButton.attr('disabled', true);
        } else {
            pageDownButton.attr('disabled', false);
        }

        page.html(newPage);
        getPermits();
    }

    pageUpButton.click(function () {
        changePage(parseInt(page.html()) + 1);
    });

    pageDownButton.click(function () {
        changePage(parseInt(page.html()) - 1);
    });

    pageSizeSelector.change(function () {
        changePage(1);
    });

    FilterButton.click(function () {
        changePage(1);
    });

    ClearFilterButton.click(function () {
        typeIdFilter.val('').trigger('change');
        statusIdFilter.val('').trigger('change');
        startDateFilter.val('');
        endDateFilter.val('');
        changePage(1);
    });

    CreatePermitButton.click(function () {
        var employeeId = parseInt(`{{ $id }}`);
        var typeId = createPermitTypeId.val();
        var statusId = createPermitStatusId.val();
        var startDate = $('#create_permit_start_date').val();
        var endDate = $('#create_permit_end_date').val();
        var description = $('#create_permit_description').val();

        if (!employeeId) {
            toastr.warning('Personel Seçimi Zorunludur!');
        } else if (!typeId) {
            toastr.warning('İzin Türü Seçimi Zorunludur!');
        } else if (!statusId) {
            toastr.warning('İzin Durumu Seçimi Zorunludur!');
        } else if (!startDate) {
            toastr.warning('Başlangıç Tarihi Seçimi Zorunludur!');
        } else if (!endDate) {
            toastr.warning('Bitiş Tarihi Seçimi Zorunludur!');
        } else {
            CreatePermitButton.attr('disabled', true).html(`<i class="fas fa-spinner fa-spin"></i>`);
            $.ajax({
                type: 'post',
                url: '{{ route('user.api.permit.create') }}',
                headers: {
                    'Accept': 'application/json',
                    'Authorization': token
                },
                data: {
                    employeeId: employeeId,
                    typeId: typeId,
                    statusId: statusId,
                    startDate: startDate,
                    endDate: endDate,
                    description: description,
                },
                success: function () {
                    toastr.success('İzin Başarıyla Oluşturuldu!');
                    changePage(1);
                    $('#CreatePermitModal').modal('hide');
                    CreatePermitButton.attr('disabled', false).html(`Oluştur`);
                },
                error: function (error) {
                    console.log(error);
                    toastr.error('İzin Oluşturulurken Serviste Bir Sorun Oluştu!');
                    CreatePermitButton.attr('disabled', false).html(`Oluştur`);
                }
            });
        }
    });

    UpdatePermitButton.click(function () {
        var id = $('#update_permit_id').val();
        var employeeId = parseInt(`{{ $id }}`);
        var typeId = updatePermitTypeId.val();
        var statusId = updatePermitStatusId.val();
        var startDate = $('#update_permit_start_date').val();
        var endDate = $('#update_permit_end_date').val();
        var description = $('#update_permit_description').val();

        if (!typeId) {
            toastr.warning('İzin Türü Seçimi Zorunludur!');
        } else if (!statusId) {
            toastr.warning('İzin Durumu Seçimi Zorunludur!');
        } else if (!startDate) {
            toastr.warning('Başlangıç Tarihi Seçimi Zorunludur!');
        } else if (!endDate) {
            toastr.warning('Bitiş Tarihi Seçimi Zorunludur!');
        } else {
            UpdatePermitButton.attr('disabled', true).html(`<i class="fas fa-spinner fa-spin"></i>`);
            $.ajax({
                type: 'put',
                url: '{{ route('user.api.permit.update') }}',
                headers: {
                    'Accept': 'application/json',
                    'Authorization': token
                },
                data: {
                    id: id,
                    employeeId: employeeId,
                    typeId: typeId,
                    statusId: statusId,
                    startDate: startDate,
                    endDate: endDate,
                    description: description,
                },
                success: function () {
                    toastr.success('İzin Başarıyla Güncellendi!');
                    changePage(parseInt(page.html()));
                    $('#UpdatePermitModal').modal('hide');
                    UpdatePermitButton.attr('disabled', false).html(`Güncelle`);
                },
                error: function (error) {
                    console.log(error);
                    toastr.error('İzin Güncellenirken Serviste Bir Sorun Oluştu!');
                    UpdatePermitButton.attr('disabled', false).html(`Güncelle`);
                }
            });
        }
    });

    DeletePermitButton.click(function () {
        var id = $('#delete_permit_id').val();
        DeletePermitButton.attr('disabled', true).html(`<i class="fas fa-spinner fa-spin"></i>`);
        $.ajax({
            type: 'delete',
            url: '{{ route('user.api.permit.delete') }}',
            headers: {
                'Accept': 'application/json',
                'Authorization': token
            },
            data: {
                id: id,
            },
            success: function () {
                toastr.success('İzin Başarıyla Silindi!');
                changePage(parseInt(page.html()));
                $('#DeletePermitModal').modal('hide');
                DeletePermitButton.attr('disabled', false).html(`Sil`);
            },
            error: function (error) {
                console.log(error);
                toastr.error('İzin Silinirken Serviste Bir Sorun Oluştu!');
                DeletePermitButton.attr('disabled', false).html(`Sil`);
            }
        });
    });

</script>
