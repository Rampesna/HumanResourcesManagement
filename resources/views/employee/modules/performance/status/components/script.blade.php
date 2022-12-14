<script src="{{ asset('assets/jqwidgets/jqxcore.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxbuttons.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxscrollbar.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxlistbox.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxdropdownlist.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxmenu.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxgrid.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxgrid.selection.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxgrid.columnsreorder.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxgrid.columnsresize.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxgrid.filter.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxgrid.sort.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxdata.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxgrid.pager.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxnumberinput.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxwindow.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxdata.export.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxgrid.export.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxexport.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxgrid.grouping.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/globalization/globalize.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqgrid-localization.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jszip.min.js') }}"></script>

<script>

    $(document).ready(function () {
        $('#loader').hide();
    });

    console.log(getNextSaturday(new Date()))

    var reportDiv = $('#report');

    var penaltyCard = $('#penaltyCard');

    function getPersonPenalties() {
        $.ajax({
            type: 'get',
            url: '{{ route('employee.api.operationApi.personReport.getPersonPenalties') }}',
            headers: {
                'Accept': 'application/json',
                'Authorization': token
            },
            data: {},
            success: function (response) {
                $.each(response.response, function (i, data) {
                    if (data.tur === 'Ba??ar??') {
                        $('#totalSuccessSpan').html(data.puan);
                    } else if (data.tur === 'Ceza') {
                        $('#totalPenaltySpan').html(data.puan);
                    }
                });
            },
            error: function (error) {
                console.log(error);
                toastr.error('Ba??ar??/Ceza Verileri Al??n??rken Serviste Bir Sorun Olu??tu. L??tfen Geli??tirici Ekibi ??le ??leti??ime Ge??in!');
            }
        });
    }

    function getPersonnelAchievementRanking() {
        $.ajax({
            type: 'get',
            url: '{{ route('employee.api.operationApi.personReport.getPersonnelAchievementRanking') }}',
            headers: {
                'Accept': 'application/json',
                'Authorization': token
            },
            data: {},
            success: function (response) {
                var employee = response.response.find(employees => employees.kullaniciId === authEmployeeGuid);
                $('#nowSort').html(employee.row_num);
                $('#nowPoint').html(employee.puan);
            },
            error: function (error) {
                console.log(error);
                toastr.error('Ba??ar?? S??ralamas?? Verileri Al??n??rken Serviste Bir Sorun Olu??tu. L??tfen Geli??tirici Ekibi ??le ??leti??ime Ge??in!');
            }
        });
    }

    function getShiftByDate() {
        var date = getNextSaturday(new Date());
        $.ajax({
            type: 'get',
            url: '{{ route('employee.api.shift.getByDateAndEmployeeId') }}',
            headers: {
                'Accept': 'application/json',
                'Authorization': token
            },
            data: {
                date: date,
            },
            success: function (response) {
                $('#saturdayPermitStatusSpan').html(`${response.response ? '??al??????yor' : '??al????m??yor'}`);
            },
            error: function (error) {
                console.log(error);
                toastr.error('Gelecek Cumartesi ??al????ma Durumu Verisi Al??n??rken Serviste Bir Sorun Olu??tu! L??tfen Yaz??l??m Ekibi ??le ??leti??ime Ge??in!');
            }
        });
    }

    getPersonPenalties();
    getPersonnelAchievementRanking();
    getShiftByDate();

    penaltyCard.click(function () {
        $('#loader').show();
        $.ajax({
            type: 'get',
            url: '{{ route('employee.api.operationApi.personReport.getPersonPenaltiesDetails') }}',
            headers: {
                'Accept': 'application/json',
                'Authorization': token
            },
            data: {},
            success: function (response) {
                console.log(response);


                var source = {
                    localdata: response.response,
                    datatype: "array",
                    datafields:
                        [
                            {name: 'cezaPuani', type: 'integer'},
                            {name: 'adi', type: 'string'},
                            {name: 'cezaAciklama', type: 'string'},
                        ]
                };
                var dataAdapter = new $.jqx.dataAdapter(source);
                reportDiv.jqxGrid({
                    width: '100%',
                    height: '600',
                    source: dataAdapter,
                    columnsresize: true,
                    groupable: true,
                    theme: jqxGridGlobalTheme,
                    filterable: true,
                    showfilterrow: true,
                    pageable: false,
                    sortable: true,
                    pagesizeoptions: ['10', '20', '50', '1000'],
                    localization: getLocalization('tr'),
                    columns: [
                        {
                            text: 'Ceza Puan??',
                            dataField: 'cezaPuani',
                            columntype: 'textbox',
                            width: '5%'
                        },
                        {
                            text: 'Ceza Ad??',
                            dataField: 'adi',
                            columntype: 'textbox',
                            width: '15%'
                        },
                        {
                            text: 'A????klamalar',
                            dataField: 'cezaAciklama',
                            columntype: 'textbox',
                            width: '80%'
                        }
                    ],
                });
                reportDiv.on('rowclick', function (event) {
                    reportDiv.jqxGrid('selectrow', event.args.rowindex);
                    var rowindex = reportDiv.jqxGrid('getselectedrowindex');
                    $('#selected_survey_row_index').val(rowindex);
                    var dataRecord = reportDiv.jqxGrid('getrowdata', rowindex);
                    $('#selected_survey_id').val(dataRecord.id);
                    $('#selected_survey_code').val(dataRecord.kodu);
                    return false;
                });
                reportDiv.jqxGrid('sortby', 'id', 'desc');


                $('#loader').hide();
            },
            error: function (error) {
                console.log(error);
                toastr.error('Ceza Detay Listesi Al??n??rken Serviste Bir Sorun Olu??tu. L??tfen Yaz??l??m Ekibi ??le ??leti??ime Ge??in!');
                $('#loader').hide();
            }
        });
    });

</script>
