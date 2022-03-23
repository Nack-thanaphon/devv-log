<?php
include "./include/header.php";
include "../../database/connect.php";

// checking user logged or not
if (empty($_SESSION['user'])) {
    header('location: index.php');
}
?>

<body id="page-top">
    <div id="wrapper">
        <?php include "./include/navbar.php"; ?>
        <div id="content-wrapper" class="d-flex flex-column">

            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <ul class="navbar-nav ml-auto">
                    <?php include "./include/topbar.php"; ?>
                </ul>
            </nav>
            <div class="container-fluid">
                <?php include "./newsletter/newsletter_manager.php" ?>
                <?php include "./include/footer.php"; ?>
                <?php include "./include/script.php"; ?>
            </div>
        </div>
    </div>



    <script>
    $(function() { // เรียกใช้งาน datatable
        $.ajax({
            type: "GET",
            dataType: "JSON",
            url: "../../services/Newsletter/",
            data: {},
        }).done(function(data) {
            let tableData = []
            data = data.result;
            for (var i = 0; i < data.length; i++) {
                tableData.push([
                    `<a href="../../export/newsletter.php?id=${data[i].id}" target="_blank" class="btn btn-outline-primary p-1"> ${data[i].id} </a>`,
                    `${data[i].title}`,
                    `${data[i].date}`,
                    `${data[i].user}`,
                    `<div class="btn-group" role="group">
                    <a href="./newsletter_update.php?id=${data[i].id}" id="newsletter_edit" class="btn btn-warning "  data-id="${data[i].id}"  >
                        <i class="far fa-edit"></i> แก้ไข
                    </a>
                <button type="button" class="btn btn-danger" id="delete" data-id="${data[i].id}">
                    <i class="far fa-trash-alt"></i> ลบ
                </button>
            </div>`
                ]);
            };

            initDataTables(tableData);
        }).fail(function() {
            Swal.fire({
                text: 'ไม่สามารถเรียกดูข้อมูลได้',
                icon: 'error',
                confirmButtonText: 'ตกลง',
            }).then(function() {
                // location.assign('./')
            })
        })

        function initDataTables(tableData) { // สร้าง datatable
            $('#newsletter_table').DataTable({
                data: tableData,
                columns: [{
                        title: "ลำดับที่",
                        className: "align-middle"
                    },

                    {
                        title: "หัวข้อข่าว",
                        className: "align-middle",
                        width: "30%"
                    },

                    {
                        title: "ประจำเดือน",
                        className: "align-middle",

                    },

                    {
                        title: "ผู้จัดการ",
                        className: "align-middle"
                    },
                    {
                        title: "จัดการ",
                        className: "align-middle"
                    }
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
                                    url: "../../services/Newsletter/delete.php",

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
            })
        }
    })


    $('#Newsletter_ad').on('submit', function(e) { // เรียกใช้งาน เพิ่มข้อมูล (สำคัญ)
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "../../services/Newsletter/create.php",
            data: $('#Newsletter_ad').serialize()
        }).done(function(resp) {
            Swal.fire({
                text: 'เพิ่มข้อมูลเรียบร้อย',
                icon: 'success',
                confirmButtonText: 'ตกลง',
            }).then((result) => {
                location.assign('./newsletter.php');
            });
        })
    });



    $(function() { // เรียกใช้งาน Summernote
        $('#detail').summernote({
            height: 300,
        });
    })
    </script>
</body>