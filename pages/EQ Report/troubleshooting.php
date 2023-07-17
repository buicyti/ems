<?php
if (isset($_GET['ac'])) $ac = trim(addslashes(htmlspecialchars($_GET['ac'])));
else $ac = '';
//nếu không có biến action
if ($ac == '') {
?>
    <link rel="stylesheet" href="<?php echo $_DOMAIN; ?>assets/plugins/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?php echo $_DOMAIN; ?>assets/plugins/scrollbar/scroll.min.css">

    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-sub-header">
                    <h3 class="page-title">Sự cố bất thường</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo $_DOMAIN; ?>eq-report-troubleshooting">Troubleshoting</a></li>
                        <li class="breadcrumb-item active">All Trouble</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="student-group-form">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Tìm kiếm theo Line ...">
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Tìm kiếm theo Machine ...">
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Tìm kiếm theo Time ...">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="search-student-btn">
                    <button type="btn" class="btn btn-primary">Search</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table comman-shadow">
                <div class="card-body">
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">Students</h3>
                            </div>
                            <div class="col-auto text-end float-end ms-auto download-grp">
                                <a href="students.html" class="btn btn-outline-gray me-2 active"><i class="feather-list"></i></a>
                                <a href="students-grid.html" class="btn btn-outline-gray me-2"><i class="feather-grid"></i></a>
                                <a href="" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Download</a>
                                <a href="<?php echo $_DOMAIN; ?>eq-report-troubleshooting/add" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table border-1 star-student table-hover table-center mb-1 datatable table-striped">
                            <thead class="student-thread">
                                <tr>
                                    <th>No.</th>
                                    <th>Tên sự cố</th>
                                    <th>Line</th>
                                    <th>Machine</th>
                                    <th>Phân tích</th>
                                    <th>Phương pháp xử lí</th>
                                    <th>Thời gian lỗi</th>
                                    <th>Thời gian hoạt động</th>
                                    <th>Losstime</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal view trouble -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fw-bold" id="staticBackdropLabel">Machine Troubleshooting Report</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body vertical-scroll">
                    <table class="table table-bordered" id="tabModalView">
                        <tbody class="text-center">
                            <tr>
                                <td class="fw-bold p-2" style="width: 15%">Date Error</td>
                                <td class="p-2" style="width: 20%"></td>
                                <td class="fw-bold p-2" style="width: 15%">Machine</td>
                                <td class="p-2" style="width: 20%"></td>
                                <td class="fw-bold p-2" style="width: 15%">Maker</td>
                                <td class="p-2" style="width: 15%"></td>
                            </tr>
                            <tr>
                                <td class="fw-bold p-2">Line Name</td>
                                <td class="p-2"></td>
                                <td class="fw-bold p-2">Model</td>
                                <td class="p-2"></td>
                                <td colspan="2" class="fw-bold p-2">Running Hours</td>
                            </tr>
                            <tr>
                                <td class="fw-bold p-2">Time Error</td>
                                <td class="p-2"></td>
                                <td class="fw-bold p-2">Serial No.</td>
                                <td class="p-2"></td>
                                <td colspan="2" class="p-2"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="border-top mb-4"></div>
                    <div class="heading-detail">
                        <h4>I.Vấn đề phát sinh</h4>
                    </div>
                    <div class="hello-park">
                        <p id="err_problem">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    </div>
                    <div class="heading-detail">
                        <h4>II. Hình ảnh</h4>
                    </div>
                    <div id="carouselExampleCaption" class="carousel slide mb-4" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <!-- Hiện ảnh ở đây -->
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaption" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaption" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>

                    <div class="heading-detail">
                        <h4>III. Phân tích sự cố</h4>
                    </div>
                    <div class="hello-park">
                        <p id="err_analysis">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    </div>
                    <div class="heading-detail">
                        <h4>IV. Phương pháp xử lí và đối sách</h4>
                    </div>
                    <div class="hello-park ms-4">
                        <h5>1.Phương pháp xử lí</h5>
                        <p id="treatment_method">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
                    </div>
                    <div class="hello-park ms-4">
                        <h5>2.Đối sách</h5>
                        <div class="hello-park ms-4">
                            <h6>a.Tạm thời</h6>
                            <p id="provisional_countermeasures">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur officia deserunt mollit anim id est laborum.</p>
                        </div>
                        <div class="hello-park ms-4">
                            <h6>a.Lâu dài</h6>
                            <p id="long_term_countermeasures">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
                        </div>
                    </div>

                </div>
                <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div> -->
            </div>
        </div>
    </div>

    <script src="<?php echo $_DOMAIN; ?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?php echo $_DOMAIN; ?>assets/plugins/datatables/datatables.min.js"></script>
    <script src="<?php echo $_DOMAIN; ?>assets/plugins/datatables/fixedColumns.min.js"></script>
    <script src="<?php echo $_DOMAIN; ?>assets/plugins/scrollbar/scrollbar.min.js"></script>
    <script src="<?php echo $_DOMAIN; ?>assets/plugins/scrollbar/custom-scroll.js"></script>
    <!-- <script src=""></script> -->
    <script>
        $(document).attr('title', 'EM - Báo cáo sự cố bất thường')
        const loadDataTable = () => {
            $.ajax({
                type: "POST",
                url: "<?php echo $_DOMAIN; ?>php/eq-report-trouble.php",
                data: {
                    action: 'loadTable'
                },
                dataType: "json",
                success: function(data) {
                    //console.log(data)
                    tableData.clear().rows.add(data).draw();
                }
            });
        }
        const tableData = $('.datatable').DataTable({
            columns: [{
                    data: 'ids',
                    title: 'No.'
                },
                {
                    data: 'err_problems',
                    title: 'Tên sự cố'
                },
                {
                    data: 'line_names',
                    title: 'Line'
                },
                {
                    data: 'machine_names',
                    title: 'Machine'
                },
                {
                    data: 'err_analysis',
                    title: 'Phân tích'
                },
                {
                    data: 'treatment_methods',
                    title: 'Phương pháp xử lí'
                },
                {
                    data: 'err_date_times',
                    title: 'Thời gian lỗi'
                },
                {
                    data: 'running_hours',
                    title: 'Thời gian hoạt động'
                },
                {
                    data: 'lossTime',
                    title: 'Losstime'
                },
                {
                    data: null,
                    orderable: false,
                    title: 'Action',
                    defaultContent: '<div class="actions ">' +
                        '<p class="btn btn-sm bg-info-light me-2"><i class="feather-eye"></i></p>' +
                        '<p class="btn btn-sm bg-success-light me-2"><i class="feather-edit"></i></p>' +
                        '<p class="btn btn-sm bg-danger-light"><i class="feather-delete"></i></p>' +
                        '</div>'
                }
            ],
            fixedColumns: {
                left: 2,
                right: 1
            },
            scrollCollapse: true,
            scrollX: true,
            drawCallback: (setting) => {

                //nút xem
                $('.datatable tbody tr').off('click')
                $('.datatable tbody tr').on('click', 'td:eq(0), td:eq(1), td:eq(2), td:eq(3), td:eq(4), td:eq(5), td:eq(6), td:eq(7), td:eq(8)', function() {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo $_DOMAIN; ?>php/eq-report-trouble.php",
                        data: {
                            action: 'showModal',
                            ids: tableData.row($(this).parent()).data()['ids']
                        },
                        dataType: "json",
                        success: function(data) {
                            //console.log(data)
                            //in dữ liệu vào bảng
                            $('#tabModalView tr:eq(0) td:eq(1)').html(moment(data['err_date_time']).format('DD/MM/YYYY'))
                            $('#tabModalView tr:eq(0) td:eq(3)').html(data['machine_name'])
                            $('#tabModalView tr:eq(0) td:eq(5)').html(data['maker'])
                            $('#tabModalView tr:eq(1) td:eq(1)').html(data['line_name'])
                            $('#tabModalView tr:eq(1) td:eq(3)').html(data['model_name'])
                            $('#tabModalView tr:eq(2) td:eq(1)').html(moment(data['err_date_time']).format('HH:mm'))
                            $('#tabModalView tr:eq(2) td:eq(3)').html(data['serial_no'])
                            $('#tabModalView tr:eq(2) td:eq(4)').html(moment(data['running_hour']).format('HH:mm DD/MM/YYYY'))
                            //in dữ liệu
                            $('#err_problem').html(data['err_problem'])
                            $('#err_analysis').html(data['err_analysis'])
                            $('#treatment_method').html(data['treatment_method'])
                            $('#provisional_countermeasures').html(data['provisional_countermeasures'])
                            $('#long_term_countermeasures').html(data['long_term_countermeasures'])
                            //in hình ảnh

                            $('.carousel-inner').html('')
                            if (data['err_pictures'].length < 2) {
                                //ko có ảnh
                            } else {
                                iii = 1;
                                imgs = JSON.parse(data['err_pictures'])
                                $.each(imgs, (link, comment) => {
                                    $('.carousel-inner').append('<div class="carousel-item ' + (iii == 1 ? 'active' : '') + '">' +
                                        '<img src="' + link + '" alt="Hình ảnh lỗi" class="d-block img-fluid">' +
                                        '<div class="carousel-caption d-none d-md-block">' +
                                        '<h3 class="text-white">Hình ảnh lỗi ' + iii + '</h3>' +
                                        '<p>' + comment + '</p>' +
                                        '</div>' +
                                        '</div>')
                                    iii++
                                })
                            }


                        }
                    });
                    $('#staticBackdrop').modal('show')
                })
                //nút sửa
                $('.datatable tbody tr td:nth-child(10) p:nth-child(2)').off('click')
                $('.datatable tbody tr td:nth-child(10) p:nth-child(2)').on('click', function() {
                    console.log(tableData.row($(this).parent().parent().parent()).data()['ids'])
                    $(location).attr('href', '<?php echo $_DOMAIN; ?>eq-report-troubleshooting/edit/' + tableData.row($(this).parent().parent().parent()).data()['ids'])
                })
            },
            language: {
                "sProcessing": "Đang xử lý...",
                "sLengthMenu": "Xem _MENU_ mục",
                "sZeroRecords": "Không tìm thấy dòng nào phù hợp",
                "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
                "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                "sInfoPostFix": "",
                "sSearch": "Tìm:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Đầu",
                    "sPrevious": "Trước",
                    "sNext": "Tiếp",
                    "sLast": "Cuối"
                }
            },
            processing: true,
            order: [
                [0, 'desc']
            ]
        })
        $(document).ready(() => {
            loadDataTable();
        })
    </script>

<?php
} //kết thúc biến home
elseif ($ac == 'add' || $ac == 'edit') {
    if ($ac == 'edit') {
        if (isset($_GET['id'])) $id = trim(addslashes(htmlspecialchars($_GET['id'])));
        else $id = '';
        //kiểm tra dữ liệu
    }
?>

    <link rel="stylesheet" href="<?php echo $_DOMAIN; ?>assets/plugins/daterangepicker/daterangepicker.css">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-sub-header">
                    <h3 class="page-title">Thêm mới</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo $_DOMAIN; ?>eq-report-troubleshooting">Troubleshoting</a></li>
                        <li class="breadcrumb-item active">Add</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card comman-shadow">
                <div class="card-body">
                    <div class="row">
                        <!-- Khai báo line -->
                        <div class="col-12">
                            <h5 class="form-title student-info">
                                Thông tin máy
                                <span>
                                    <p><i class="feather-more-vertical"></i></p>
                                </span>
                            </h5>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="form-group local-forms">
                                <label>Line Name<span class="login-danger">*</span></label>
                                <select class="form-control form-select" id="slLine">
                                    <option>Chọn Line</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="form-group local-forms">
                                <label>Machine Name<span class="login-danger">*</span></label>
                                <select class="form-control form-select" id="slMachine">
                                    <option>Chọn Máy</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="form-group local-forms">
                                <label>Maker<span class="login-danger">*</span></label>
                                <input class="form-control" id="slMaker" type="text" placeholder="Nhập tên nhà sản xuất">
                            </div>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="form-group local-forms">
                                <label>Model<span class="login-danger">*</span></label>
                                <input class="form-control" type="text" id="slModel" placeholder="Nhập chủng loại máy">
                            </div>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="form-group local-forms">
                                <label>Serial No.<span class="login-danger">*</span></label>
                                <input class="form-control" type="text" id="slSerial" placeholder="Nhập số sêri">
                            </div>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="form-group local-forms">
                                <label>Date Error<span class="login-danger">*</span></label>
                                <input class="form-control datetimepicker" type="text" id="slDateErr" placeholder="Nhập số thời gian lỗi">
                            </div>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="form-group local-forms">
                                <label>Running Hours<span class="login-danger">*</span></label>
                                <input class="form-control datetimepicker" type="text" id="slDateOK" placeholder="Nhập số thời gian hoạt động lại">
                            </div>
                        </div>
                        <!-- Khai báo lỗi -->
                        <div class="col-12">
                            <h5 class="form-title student-info">
                                Hình ảnh
                            </h5>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group students-up-files">
                                <label><span class="login-danger">*</span> Upload ảnh <= 10Mb, số lượng ảnh <=10</label>
                                        <div class="upload">
                                            <label class="file-upload image-upbtn mb-0">
                                                Choose File <input type="file" accept="image/*" name="img_up[]" id="img_up" onchange="preUpImg();" multiple>
                                            </label>
                                        </div>
                            </div>
                        </div>
                        <div class="form-group box-pre-img hidden row"><!-- hiện ảnh xem trước --></div>
                        <!-- Khai báo lỗi -->
                        <div class="col-12">
                            <h5 class="form-title student-info">
                                Thông tin lỗi
                            </h5>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Vấn đề phát sinh</label>
                            <div class="col-lg-9">
                                <textarea rows="2" class="form-control" id="err_problem" placeholder="Nêu ngắn gọn vế đề xảy ra"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Phân tích sự cố</label>
                            <div class="col-lg-9">
                                <textarea rows="3" class="form-control" id="err_analysis" placeholder="Phân tích các vấn đề liên quan có thể gây ra lỗi"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Phương pháp xử lí</label>
                            <div class="col-lg-9">
                                <textarea rows="5" class="form-control" id="treatment_method" placeholder="Các bươc tiến hành xử lí. Nêu chi tiết"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Đối sách tạm thời</label>
                            <div class="col-lg-9">
                                <textarea rows="3" class="form-control" id="pro_coun" placeholder="Biện pháp xử lí có thể áp dụng ngay để máy có thể tiếp tục sản xuất"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Đối sách lâu dài</label>
                            <div class="col-lg-9">
                                <textarea rows="3" class="form-control" id="lg_coun" placeholder="Biện pháp hạn chế rủi ro dài hạn"></textarea>
                            </div>
                        </div>
                        <div id="addStatus" style="display: none"></div>
                        <div class="col-12">
                            <div class="student-submit">
                                <button class="btn btn-primary" id="addTrouble">Submit</button>
                            </div>
                        </div>
                        <div class="form-group box-progress-bar hidden mt-3">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo $_DOMAIN; ?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?php echo $_DOMAIN; ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script>
        $(document).attr('title', 'EM - Thêm báo cáo')

        $('.datetimepicker').daterangepicker({
            timePicker: true,
            locale: {
                format: 'HH:mm DD/MM/YYYY'
            },
            singleDatePicker: true,
            showDropdowns: true,
            drops: "down",
        })
        const loadData = () => {
            $.ajax({
                type: "POST",
                url: "<?php echo $_DOMAIN; ?>php/eq-report-trouble.php",
                data: {
                    action: 'loadInfo'
                },
                dataType: "json",
                success: function(data) {
                    //console.log(data)
                    $('#slLine').html('<option>Chọn tên Line</option>')
                    $.each(data[0], (id, line) => {
                        $('#slLine').append('<option value="' + line + '">' + line + '</option>')
                    })
                    $('#slMachine').html('<option>Chọn tên Machine</option>')
                    $.each(data[1], (id, machine) => {
                        $('#slMachine').append('<option value="' + machine + '">' + machine + '</option>')
                    })
                },
                error: (a, b, c) => {
                    console.error(b)
                }
            });
        }
        // Xem ảnh trước
        const preUpImg = () => {
            img_up = $('#img_up').val();
            count_img_up = $('#img_up').get(0).files.length;
            //$('.box-pre-img').html('<p><strong>Ảnh xem trước</strong></p>');
            //$('.box-pre-img').removeClass('hidden');

            // Nếu đã chọn ảnh
            if (img_up != '') {
                $('.box-pre-img').html('<p><strong>Ảnh xem trước</strong></p>');
                $('.box-pre-img').removeClass('hidden');
                for (i = 0; i < count_img_up; i++) {
                    $('.box-pre-img').append('<div class="col-auto">' +
                        '<img src="' + URL.createObjectURL(event.target.files[i]) + '" style="border: 1px solid #ddd; width: 250px; height: 250px; margin-right: 5px; margin-bottom: 5px;"/>' +
                        '<input class="form-control" id="cmtImg' + i + '" type="text" placeholder="Nhập tên lỗi" style="width: 250px;"/>' +
                        '</div>');
                }
            }
            // Ngược lại chưa chọn ảnh
            else {
                $('.box-pre-img').html('');
                $('.box-pre-img').addClass('hidden');
            }
        }

        const submitAdd = (e) => {
            e.preventDefault();
            $('.status').empty()
            var formData = new FormData();
            $('#addStatus').html('')
            $('#addStatus').css('display', 'block'); //hiện vị trí thông báo
            formData.append("action", "addTrouble");
            img_up = $('#img_up').val(); //biến hình ảnh added
            count_img_up = $('#img_up').get(0).files.length;
            error_size_img = 0;
            error_type_img = 0;

            //Thêm dữ liệu line
            if ($('#slLine').val().indexOf('Chọn') == -1) formData.append("lineName", $('#slLine').val());
            else {
                $('#addStatus').html('<div class="alert alert-danger">Chưa chọn Line.</div>');
                return;
            }
            if ($('#slMachine').val().indexOf('Chọn') == -1) formData.append("machineName", $('#slMachine').val());
            else {
                $('#addStatus').html('<div class="alert alert-danger">Chưa chọn Machine.</div>');
                return;
            }
            if ($('#slMaker').val() != '') formData.append("machineMaker", $('#slMaker').val());
            else {
                $('#addStatus').html('<div class="alert alert-danger">Maker không được để trống.</div>');
                return;
            }
            if ($('#slModel').val() != '') formData.append("machineModel", $('#slModel').val());
            else {
                $('#addStatus').html('<div class="alert alert-danger">Model không được để trống.</div>');
                return;
            }
            if ($('#slSerial').val() != '') formData.append("machineSerial", $('#slSerial').val());
            else {
                $('#addStatus').html('<div class="alert alert-danger">Serial không được để trống.</div>');
                return;
            }
            formData.append("dateErr", moment($('#slDateErr').val(), 'HH:mm DD/MM/YYYY').format('YYYY-MM-DD HH:mm:ss'));
            formData.append("dateOK", moment($('#slDateOK').val(), 'HH:mm DD/MM/YYYY').format('YYYY-MM-DD HH:mm:ss'));

            // Thêm dữ liệu ảnh
            if (img_up) {
                // Kiểm tra dung lượng ảnh
                for (i = 0; i < count_img_up; i++) {
                    size_img_up = $('#img_up')[0].files[i].size;
                    if (size_img_up > 10485760) { // 10485760 byte = 10MB 
                        error_size_img += 1; // Lỗi
                    } else {
                        error_size_img += 0; // Không lỗi
                    }
                }
                // Kiểm tra định dạng ảnh
                for (i = 0; i < count_img_up; i++) {
                    type_img_up = $('#img_up')[0].files[i].type;
                    if (type_img_up == 'image/jpeg' || type_img_up == 'image/png' || type_img_up == 'image/gif') {
                        error_type_img += 0;
                    } else {
                        error_type_img += 1;
                    }
                }
                // Nếu lỗi về size ảnh
                if (error_size_img >= 1) {
                    $('#addStatus').html('<div class="alert alert-danger">Một trong các tệp đã chọn có dung lượng lớn hơn mức cho phép.</div>');
                    return
                } else if (count_img_up > 10) { // Nếu số lượng ảnh vượt quá 20 file
                    $('#addStatus').html('<div class="alert alert-danger">Số file upload cho mỗi lần vượt quá mức cho phép.</div>');
                    return
                } else if (error_type_img >= 1) {
                    $('#addStatus').html('<div class="alert alert-danger">Một trong những file ảnh không đúng định dạng cho phép.</div>');
                    return
                } else { //nếu không lỗi thì thêm vào form
                    for (i = 0; i < count_img_up; i++) {
                        formData.append("fileUpload[]", $('#img_up').get(0).files[i]);
                        formData.append("imgComment[]", $('#cmtImg' + i).val());
                    }
                }
            } else {
                $('#addStatus').html('<div class="alert alert-danger">Không có ảnh là ko được à nha</div>');
                return
            }
            //Thêm dữ liệu lỗi
            formData.append("err_problem", $('#err_problem').val());
            formData.append("err_analysis", $('#err_analysis').val());
            formData.append("treatment_method", $('#treatment_method').val());
            formData.append("pro_coun", $('#pro_coun').val());
            formData.append("lg_coun", $('#lg_coun').val());


            $('.box-progress-bar').removeClass('hidden');
            $('.progress-bar').width('0%');
            $.ajax({
                url: '<?php echo $_DOMAIN; ?>php/eq-report-trouble.php',
                type: 'POST',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    if (myXhr.upload) {
                        myXhr.upload.addEventListener('progress', function(event) {
                            var percent = 0;
                            if (event.lengthComputable) {
                                percent = Math.ceil(event.loaded / event.total * 100);
                            }
                            $('.progress-bar').animate({
                                width: percent + '%'
                            });
                            $('.progress-bar').html(percent + '%');
                        }, false);
                    }
                    return myXhr;
                },
                success: function(data) {
                    console.log(data)
                },
                error: function(a, b, c) {
                    console.error(b)
                },
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            })
            return false;
        }
        $('#addTrouble').on('click', async (e) => {
            if ($ac == 'add') submitAdd(e)
        })

        $(document).ready(() => {
            loadData();
        })
    </script>

<?php
} else {
    include_once './pages/authentication/404.php';
}

?>