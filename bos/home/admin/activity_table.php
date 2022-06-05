<?php
include "../../include/admin_header.php";
include "../../database/connect.php";

// checking user logged or not
if (empty($_SESSION['user'])) {
    header('location: index.php');
}
?>

<body id="page-top">
    <div id="wrapper">
        <?php include "../../include/admin_navbar.php"; ?>
        <div id="content-wrapper" class="d-flex flex-column">

            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <ul class="navbar-nav ml-auto">
                    <?php include "../../include/topbar.php"; ?>
                </ul>
            </nav>
            <div class="container-fluid">
                <?php include "./activity/activity_table_manager.php" ?>
                <?php include "../../include/footer.php"; ?>
                <?php include "../../include/script.php"; ?>
            </div>
        </div>
    </div>

    <script>
        $(function() { // เรียกใช้งาน datatable

            $.ajax({
                type: "GET",
                dataType: "JSON",
                url: "../../services/Activity/table.php",
                data: {

                },
            }).done(function(data) {
                let tableData = []
                data = data.result;
                for (var i = 0; i < data.length; i++) {
                    tableData.push([
                        `${data[i].id}`,
                        `${data[i].title}`,
                        `${data[i].address}`,
                        `${data[i].status}`,
                        `${data[i].start}`,
                        `${data[i].end}`,
                    ]);
                };

                initDataTables(tableData);
            }).fail(function() {
                Swal.fire({
                    text: 'ไม่สามารถเรียกดูข้อมูลได้',
                    icon: 'error',
                    confirmButtonText: 'ตกลง',
                }).then(function() {

                })
            })

            function initDataTables(tableData) { // สร้าง datatable
                $('#activity_table').DataTable({
                    data: tableData,
                    columns: [{
                            title: "ลำดับ",
                            className: "align-middle"
                        },
                        {
                            title: "กิจกรรม",
                            className: "align-middle",
                            width: "30%"
                        },
                        {
                            title: "สถานที่",
                            className: "align-middle"

                        },
                        {
                            title: "สถานะ",
                            className: "align-middle"
                        },

                        {
                            title: "วันเริ่มต้น",
                            className: "align-middle",

                        },

                        {
                            title: "วันสิ้นสุด",
                            className: "align-middle"
                        },

                    ],
                    initComplete: function() { // เรียกใช้งาน ลบข้อมูล datatable
                        $(document).on('click', '#delete', function() {
                            let id = $(this).data('id')
                            Swal.fire({
                                text: "คุณแน่ใจหรือไม่...ที่จะลบรายการนี้?",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'ใช่! ลบเลย',
                                cancelButtonText: 'ยกเลิก'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                        type: "POST",
                                        url: "../../services/Banner/delete.php",

                                        data: {
                                            id: id
                                        }
                                    }).done(function() {
                                        Swal.fire({
                                            text: 'รายการของคุณถูกลบเรียบร้อย',
                                            icon: 'success',
                                            confirmButtonText: 'ตกลง',
                                        }).then((result) => {
                                            location.reload();
                                        });
                                    })
                                }
                            })
                        }).on('change', '.toggle-event', function() {
                            toastr.success('อัพเดทข้อมูลเสร็จเรียบร้อย')
                        })
                    },
                    fnDrawCallback: function() {
                        $('.toggle-event').bootstrapToggle();
                    },
                    responsive: {
                        details: {

                            renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                                tableClass: 'table'
                            })
                        }
                    },
                    language: {
                        "lengthMenu": "แสดงข้อมูล _MENU_ แถว",
                        "zeroRecords": "ไม่พบข้อมูลที่ต้องการ",
                        "info": "แสดงหน้า _PAGE_ จาก _PAGES_",
                        "infoEmpty": "ไม่พบข้อมูลที่ต้องการ",
                        "infoFiltered": "(filtered from _MAX_ total records)",
                        "search": 'ค้นหา',
                        "paginate": {
                            "previous": "ก่อนหน้านี้",
                            "next": "หน้าต่อไป"
                        }
                    }
                });
            }

        })


        $('#adbanner').on('submit', function(e) { // เรียกใช้งาน เพิ่มข้อมูล (สำคัญ)
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "../../services/Banner/create.php",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
            }).done(function(resp) {
                Swal.fire({
                    text: 'เพิ่มข้อมูลเรียบร้อย',
                    icon: 'success',
                    confirmButtonText: 'ตกลง',
                }).then((result) => {
                    location.reload();

                });
            })

        });

        $(document).ready(function() {

            var _URL = window.URL || window.webkitURL;

            $('#b_file').change(function() {
                var file = $(this)[0].files[0];

                img = new Image();
                var imgwidth = 0;
                var imgheight = 0;
                var maxwidth = 1140;
                var maxheight = 400;

                img.src = _URL.createObjectURL(file);
                img.onload = function() {
                    imgwidth = this.width;
                    imgheight = this.height;

                    $("#width").text(imgwidth);
                    $("#height").text(imgheight);
                    if (imgwidth <= maxwidth && imgheight <= maxheight) {
                        $("#submit").attr('disabled', false);
                    } else {
                        $("#submit").attr('disabled', true);
                        $('#response').show();
                        $("#response").html("รูปภาพต้องมีขนาด " + maxwidth + "X" + maxheight +
                            " เท่านั้น");
                    }
                };
                img.onerror = function() {

                    $("#response").text("not a valid file: " + file.type);
                }

            });
        });


        $(document).on('click', '.edit_data', function() { // เรียกใช้งาน แก้ไขข้อมูล (MOdal previews)
            let id = $(this).data('id');

            $.ajax({
                url: "../../services/Banner/update.php",
                method: "GET",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    $('#eb_id').val(data[0].b_id);
                    $('#eb_title').val(data[0].b_title);
                    $('#eb_detail').val(data[0].b_detail);
                    $('#eb_link').val(data[0].b_link);
                    $('#eb_by').val(data[0].b_by);
                    $('#eb_date').val(data[0].b_date);
                    $('#eb_name').val(data[0].b_image);
                    $('#ebshowimg').html('<img src="../../uploads/banner/' + data[0].b_image +
                        '" class=" py-2 w-100" width="100px">');
                    $('#eresponse').html(data[0].b_image);
                    $('#ebanner_uploads').modal('show');
                }
            });
        });

        $('#eadbanner').on('submit', function(e) { // เรียกใช้งาน เพิ่มข้อมูล (สำคัญ)

            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "../../services/Banner/update.php",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
            }).done(function(resp) {
                Swal.fire({
                    text: 'อัพเดตข้อมูลเรียบร้อย',
                    icon: 'success',
                    confirmButtonText: 'ตกลง',
                }).then((result) => {
                    location.reload();
                });
            })

        });


        $("#e_image").change((e) => { // เรียกใช้งาน UPLOADFILE แก้ไข (สำคัญ)

            var form_data = new FormData();
            var ins = document.getElementById(e.target.id).files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById(e.target.id).files[x]);
            }
            $.ajax({
                // url: './api/uploadfile.php', // point to server-side PHP script 
                url: "../../services/News/uploadfile.php", // point to server-side PHP script
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {
                    $("#e_imgname").val(response)
                },
                error: function(err) {
                    console.log('bad', err)
                }
            });
        })


        $(document).on('change', '.toggle-event', function(e) { // เรียกใช้งาน สถานะ datatable

            let id = $(this).data("id");
            let status = '';

            if ($("#" + e.target.id).prop('checked')) {
                status = '1';
            } else {
                status = '0';
            } {
                Swal.fire({
                    text: 'อัพเดตข้อมูลเรียบร้อย',
                    icon: 'success',
                    confirmButtonText: 'ตกลง',
                }).then((result) => {
                    $.ajax({
                        url: "../../services/Banner/status.php",
                        method: "POST",
                        data: {
                            id: id,
                            status: status
                        },
                        dataType: "json",
                        success: function(data) {
                            location.reload();
                        }
                    })
                });
            }
        });


        function preview_image(event) { // เรียกใช้งาน preview imagebefore (สำคัญ)
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('showimg');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        function preview_image(event) { // เรียกใช้งาน preview imagebefore (สำคัญ)
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('ebshowimg');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }


        $("#b_file").change(function() {
            $("#file_name").text(this.files[0].name);
        });

        $("#eb_file").change(function() {
            $("#eresponse").text(this.files[0].name);

        });
    </script>



</body>