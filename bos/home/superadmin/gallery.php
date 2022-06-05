<?php
include "../../include/superadmin_header.php";
include "../../database/connect.php";

// checking user logged or not
if (empty($_SESSION['user'])) {
    header('location: index.php');
}
?>

<body id="page-top">
    <div id="wrapper">
        <?php include "../../include/navbar.php"; ?>
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
                <?php include "./gallery/gallery_manager.php" ?>
                <?php include "../../include/footer.php"; ?>
                <?php include "../../include/script.php"; ?>
            </div>
        </div>
    </div>



    <script>
        $(function() { // เรียกใช้งาน datatable
            var action = "fetch";
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "../../services/Gallery/",
                data: {
                    action: action
                },
            }).done(function(data) {
                let tableData = []
                let n = 1
                data = data.result;
                for (var i = 0; i < data.length; i++) {
                    tableData.push([

                        `${n++}`,
                        `${data[i].name}`,
                        `${data[i].total}`,
                        `${data[i].size}`,
                        `<div class="btn-group" role="group">
                <button type="button" name="update"  data-id="${data[i].id}" data-name="${data[i].name}"  class="update btn btn-warning "><p class="m-0 p-0 font-weight-bold ">
                <i class="fas fa-pen m-0 p-0"></i>
                </p></button>
                <button type="button" name="delete"  data-id="${data[i].id}" data-name="${data[i].name}" class="delete btn btn-danger"><p class="m-0 p-0 font-weight-bold ">
                <i class="fas fa-trash m-0 p-0"></i>
                </p></button>
                </div>`,

                        `<div class="btn-group mx-auto  " role="group">
                <button type="button" name="upload" data-id="${data[i].id}" data-name="${data[i].name}" class="upload btn btn-primary"><p class="m-auto p-0 font-weight-bold ">
                <i class="fas fa-upload m-0 p-0"></i>
                </p></button> 
                <button type="button" name="view_files" data-id="${data[i].id}" data-name="${data[i].name}" class="view_files btn btn-success "><p class="m-0 p-0 font-weight-bold ">
                <i class="fas fa-eye"></i>
                </p></button>
                </div>`,
                    ]);
                };

                initDataTables(tableData);
            }).fail(function() {
                // Swal.fire({
                //     text: 'ไม่สามารถเรียกดูข้อมูลได้',
                //     icon: 'error',
                //     confirmButtonText: 'ตกลง',
                // }).then(function() {
                //     location.assign('./')
                // })
            })

            function initDataTables(tableData) { // สร้าง datatable
                $('#g_table').DataTable({
                    data: tableData,
                    order: [
                        ['0', 'desc']
                    ],
                    columns: [{
                            title: "ลำดับที่",
                            className: "align-middle",

                        },
                        {
                            title: "ชื่ออัลบั้ม",
                            className: "align-middle",
                            width: "40%"

                        },

                        {
                            title: "จำนวนภาพ",
                            className: "align-middle",

                        },

                        {
                            title: "ขนาดอัลบั้ม",
                            className: "align-middle"
                        },
                        {
                            title: "จัดการ",
                            className: "align-middle"
                        },

                        {
                            title: "อัพโหลด | เรียกดู",
                            className: "align-middle"
                        },
                    ],


                    initComplete: function() {},
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
                })
            }
        })

        $('#folder_name').on('change', function() {

            let gname = $('#folder_name').val()
            $('#ck_gname').hide()
            $('#ck_gname').removeClass()


            $.ajax({
                url: "../../services/Gallery/ck_galleryname.php",
                method: "GET",
                dataType: "JSON",
                data: {
                    gname: gname
                },
                success: function(resp) {
                    if (resp != false) {
                        $('#ck_gname').addClass("text-success")
                        $('#ck_gname').html("(*ชื่ออัลบั้มสามารถใช้ได้)")
                        $('#ck_gname').show()
                        $('#c_gallery').attr('disabled', false)

                    } else {
                        $('#ck_gname').addClass("text-danger")
                        $('#ck_gname').html("(*ชื่ออัลบั้มซ้ำไม่สามารถใช้ได้)")
                        $('#ck_gname').show()
                        $('#c_gallery').attr('disabled', true)
                    }
                }
            })
        })

        $(document).on('click', '#c_gallery', function() {
            var folder_name = $('#folder_name').val();
            var g_detail = $('#d_gallary').val();
            var user = $('#guser_id').val();
            var old_name = $('#old_name').val();
            var action = "create";

            if (folder_name != '') {

                $.ajax({
                    url: "../../services/Gallery/create.php",
                    method: "POST",
                    data: {
                        folder_name: folder_name,
                        user: user,
                        gd_name: g_detail,
                        old_name: old_name,
                        action: action
                    },
                    success: function(data) {
                        Swal.fire({
                            text: 'เพิ่มอัลบั้มภาพเรียบร้อย',
                            icon: 'success',
                            confirmButtonText: 'ตกลง',
                        }).then((data) => {
                            location.reload();
                        });
                    }
                });
            } else {

            }
        });

        $(document).on("click", ".update", function() {


            let id = $(this).data('id');

            $.ajax({
                url: "../../services/Gallery/update.php",
                method: "GET",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    $('#eid').val(data[0].g_id);
                    $('#old_name').val(data[0].g_name);
                    $('#efolder_name').val(data[0].g_name);
                    $('#ed_gallary').val(data[0].g_detail);
                    $('#gedit_name').modal("show");
                }
            });
        });

        $('#eg_update').on('click', function(e) { // เรียกใช้งาน [บันทึกข้อมูลแก้ไข] (สำคัญ)
            e.preventDefault();
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "../../services/Gallery/update.php",
                data: {

                    id: $('#eid').val(),
                    eold_name: $('#old_name').val(),
                    efolder_name: $('#efolder_name').val(),
                    ed_gallary: $('#ed_gallary').val()
                },
                success: function(response) {
                    Swal.fire({
                        text: 'อัพเดตข้อมูลเรียบร้อย',
                        icon: 'success',
                        confirmButtonText: 'ตกลง',
                    }).then((result) => {
                        // location.assign('./news.php');
                    });
                    // console.log("good", response);

                },
                error: function(err) {
                    // console.log("bad", err);
                }
            })

        })




        $(document).on('click', '.upload', function() {
            var folder_name = $(this).data("name");
            let id = $(this).data('id')
            $('#hidden_folder_name').val(folder_name);
            $('#uploadModal').modal('show');
            $('#g_id').val(id);
        });

        $(document).ready(function() {
            if (window.File && window.FileList && window.FileReader) {
                $("#files").on("change", function(e) {
                    var files = e.target.files,
                        filesLength = files.length;
                    for (var i = 0; i < filesLength; i++) {
                        var f = files[i]
                        var fileReader = new FileReader();
                        fileReader.onload = (function(e) {
                            let file = e.target;
                            let html = ''
                            html += `<li class="row m-0 p-0 mb-3 img_load ">
                                    <div class="col-4 w-100 ">
                                        <img src="${e.target.result}" width="50px" alt="">
                                    </div>
                                    <div class="col-6">
                                        <p></p>
                                    </div>
                                    <button class="col-2 btn btn-danger" id="remove">ลบ</button>
                                    </li>`
                            $(html).insertAfter("#preview");

                            $("#remove").click(function() {
                                $(this).parent(".img_load").remove();
                            });
                        });
                        fileReader.readAsDataURL(f);
                    }
                });
            } else {
                alert("Your browser doesn't support to File API")
            }
        });


        $('#files').change(function() {
            let file_check = $("#files").val();

            if (file_check !== "") {
                $("#submit").attr('disabled', false);
            } else {
                $("#submit").attr('disabled', true);

            }
        })

        $('#submit').on('click', function() {

            var form_data = new FormData();
            let id = $('#g_id').val();
            let folder = $('#hidden_folder_name').val();
            var totalfiles = document.getElementById('files').files.length;
            form_data.append("id", id)
            form_data.append("folder", folder)

            // Read selected files
            for (var index = 0; index < totalfiles; index++) {
                form_data.append("files[]", document.getElementById('files').files[index]);
            }
            $.ajax({
                url: "../../services/Gallery/upload.php",
                type: 'POST',
                data: form_data,
                id,
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    Swal.fire({
                        text: 'อัพเดตข้อมูลเรียบร้อย',
                        icon: 'success',
                        confirmButtonText: 'ตกลง',
                    }).then((response) => {
                        location.reload();
                    });
                }
            });
        });

        $(document).on("click", ".view_files", function() {
            let id = $(this).data('id');

            $.ajax({
                url: "../../services/Gallery/image_update.php",
                method: "GET",
                data: {
                    id: id,
                },
                dataType: "json",
                success: function(response) {
                    console.log(response)

                    $('#filelistModal').modal('show');
                    let html = '';

                    data = response.result;
                    for (var i = 0; i < data.length; i++) {

                        html += `
                     <tr>
                        <td>${data[i].id}</td>
                        <td><img src="../../uploads/${data[i].image}"  height="80" width="80" /></td>
                        <td>${data[i].name}</td>
                        <td><button name="remove_file" class="remove_file btn btn-danger" data-id="${data[i].id}" id="../../uploads/${data[i].image}">  
                            <p class="m-0 p-0 font-weight-bold ">
                            <i class="fas fa-trash m-0 p-0"></i>
                            </p>
                        </button>
                        </td>
                    </tr> 
                    `
                    }
                    $('#tbody').html(html);


                },
                error: function(err) {
                    // console.log("bad", err);
                }
            })
        })


        $(document).on('click', '.remove_file', function() {
            let id = $(this).data('id');
            var path = $(this).attr("id");
            var action = "remove_file";

            console.log(id)
            console.log(path)

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
                        url: "../../services/Gallery/delete.php",
                        method: "POST",
                        data: {
                            id: id,
                            path: path,
                            action: action
                        },
                        success: function(data) {
                            Swal.fire({
                                text: 'อัพเดตข้อมูลเรียบร้อย',
                                icon: 'success',
                                confirmButtonText: 'ตกลง',
                            }).then((response) => {
                                location.reload();
                            });
                        }
                    });
                }

            });
        });



        $(document).on('click', '.delete', function() {
            let id = $(this).data('id');
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
                        url: "../../services/Gallery/status.php",
                        method: "POST",
                        data: {
                            id: id,
                        },
                        success: function(data) {
                            Swal.fire({
                                text: 'อัพเดตข้อมูลเรียบร้อย',
                                icon: 'success',
                                confirmButtonText: 'ตกลง',
                            }).then((response) => {
                                location.reload();
                            });
                        }
                    });
                }

            });
        });
    </script>



</body>