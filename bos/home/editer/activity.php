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
                <?php include "./activity/activity_manager.php" ?>
                <?php include "./include/footer.php"; ?>

            </div>
        </div>
    </div>


    <?php include "./include/script.php"; ?>
    <script>
    $(document).ready(function() {
        var eventobj;
        $.ajax({
            method: 'post',
            url: '../../services/Activity',
            success: function(response) {
                console.log('good', JSON.parse(response))
                eventobj = JSON.parse(response)


                var calendar = $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    events: eventobj,
                    height: 590,
                    businessHours: {
                        dow: [1, 2, 3, 4, 5],

                        start: '8:00',
                        end: '17:00',
                    },
                    nowIndicator: true,

                    scrollTime: '08:00:00',

                    editable: true,

                    navLinks: true,
                    eventLimit: true, // allow "more" link when there are too many events
                    selectable: true,
                    // selectHelper: true,
                    select: function(start, end, ) {
                        console.log(start)

                        $('#ad_activity #start').val(moment(start).format(
                            'DD-MMM-YYYY'));
                        $('#ad_activity #end').val(moment(end).format(
                            'DD-MMM-YYYY'));
                        $('#ad_activity #s_time').val(moment(start).format('HH:mm'));
                        $('#ad_activity #e_time').val(moment(end).format('HH:mm'));
                        $('#es_time').val(moment(start).format('HH:mm'));
                        $('#ee_time').val(moment(end).format('HH:mm'));
                        $('#ad_activity').modal('show');

                        $('#event_create').click(function(event) {
                            event.preventDefault();

                            var dateSTD = $('#start').val();
                            var d = new Date(dateSTD)
                            var dd = d.getDate() < 10 ? '0' + d.getDate() : d
                                .getDate();
                            var dm = (d.getMonth() + 1) < 10 ? '0' + (d
                                .getMonth() + 1) : (d.getMonth() + 1);
                            var dy = d.getFullYear();
                            var time = $('#s_time').val();
                            var std = dy + '-' + dm + '-' + dd + 'T' + time;
                            // console.log('std : ', std)

                            var dateEXP = $('#end').val();
                            d = new Date(dateEXP)
                            dd = d.getDate() < 10 ? '0' + d.getDate() : d
                                .getDate();
                            dm = (d.getMonth() + 1) < 10 ? '0' + (d.getMonth() +
                                1) : (d.getMonth() + 1);
                            dy = d.getFullYear();
                            time = $('#e_time').val();
                            var exp = dy + '-' + dm + '-' + dd + 'T' + time;
                            // console.log('exp : ', exp)


                            $.ajax({
                                url: '../../services/Activity/create.php',
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    user_create: $('#user_create')
                                        .val(),
                                    title: $('#e_name').val(),
                                    type: $('#e_type').val(),
                                    detail: $('#e_detail').val(),
                                    address: $('#e_address').val(),
                                    link: $('#e_link').val(),
                                    start: std,
                                    // start: $('#start').val(),
                                    end: exp,
                                    // end: $('#end').val(),
                                    t_start: $('#s_time').val(),
                                    t_end: $('#e_time').val(),
                                }
                            }).done(function(resp) {
                                Swal.fire({
                                    text: 'เพิ่มข้อมูลเรียบร้อย',
                                    icon: 'success',
                                    confirmButtonText: 'ตกลง',
                                }).then((result) => {
                                    location.reload();
                                });
                            })
                        })

                    },


                    eventClick: function(event) {
                        $.ajax({
                            type: "GET",
                            url: "../../services/Activity/update.php",
                            data: "&id=" + event.id,
                            success: function(data) {

                                console.log(data)
                                data = JSON.parse(data)
                                if (data.length > 0) {
                                    // .format('HH:mm:ss')
                                    $("#e_id").val(data[0].id)
                                    $("#ee_name").val(data[0].title)
                                    $("#ee_detail").val(data[0].e_detail)
                                    $('#ee_link').val(data[0].e_link);
                                    $("#eet_type").val(data[0].et_id)
                                    $('#es_time').val(data[0].time_start);
                                    $('#ee_time').val(data[0].time_end);
                                    $('#ee_address').val(data[0].e_address);
                                    $("#e_start").val(moment(data[0].start)
                                        .format(
                                            'DD-MMM-YYYY'))
                                    $("#e_end").val(moment(data[0].end)
                                        .format('DD-MMM-YYYY'))
                                    $("#e_address").val(data[0].e_address)
                                    $('#ead_activity').modal('show');
                                }
                            }
                        });




                        $('#event_delete').click(function(event) {
                            let e_id = $("#e_id").val()

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
                                        url: "../../services/Activity/delete.php",
                                        data: "&id=" + e_id,
                                    }).done(function() {
                                        Swal.fire({
                                            text: 'รายการของคุณถูกลบเรียบร้อย',
                                            icon: 'success',
                                            confirmButtonText: 'ตกลง',
                                        }).then((
                                            result) => {
                                            location
                                                .reload();
                                        });
                                    })
                                }

                            });
                        });
                    }

                });
            }
        })
    });


    $('#event_submit').click(function(event) {



        var dateSTD = $('#e_start').val();
        var d = new Date(dateSTD)
        var dd = d.getDate() < 10 ? '0' + d.getDate() : d
            .getDate();
        var dm = (d.getMonth() + 1) < 10 ? '0' + (d
            .getMonth() + 1) : (d.getMonth() + 1);
        var dy = d.getFullYear();
        var time = $('#es_time').val();
        var estd = dy + '-' + dm + '-' + dd + 'T' + time;
        // console.log('std : ', std)

        var dateEXP = $('#e_end').val();
        d = new Date(dateEXP)
        dd = d.getDate() < 10 ? '0' + d.getDate() : d
            .getDate();
        dm = (d.getMonth() + 1) < 10 ? '0' + (d.getMonth() +
            1) : (d.getMonth() + 1);
        dy = d.getFullYear();
        time = $('#ee_time').val();
        var eexp = dy + '-' + dm + '-' + dd + 'T' + time;
        // console.log('exp : ', exp)

        let e_id = $("#e_id").val()
        $.ajax({
            type: "POST",
            url: "../../services/Activity/update.php",
            data: {
                id: e_id,
                title: $("#ee_name").val(),
                detail: $("#ee_detail").val(),
                link: $('#ee_link').val(),
                type: $("#eet_type").val(),
                address: $('#ee_address').val(),
                start: estd,
                end: eexp,
                time_start: $('#es_time').val(),
                time_end: $('#ee_time').val()
            },
            success: function(data) {
                console.log(data)
                Swal.fire({
                    text: 'อัพเดตข้อมู,เรียบร้อย',
                    icon: 'success',
                    confirmButtonText: 'ตกลง',
                }).then((result) => {
                    location.reload();
                });
            }
        });
    });



    $('#e_name').change(function() {
        let data_check = $("#e_name").val();

        if (data_check !== "") {
            $("#event_create").attr('disabled',
                false);
        } else {
            $("#event_create").attr('disabled',
                true);
            $('#msg').show()
            $('#msg').html(
                'กรุณาใส่ข้อมูลก่อนกดเพิ่มข้อมูล'
            )
        }
    })


    $(function() {
        $("#datepicker,#editdatepicker").datepicker({
            todayHighlight: true, // to highlight the today's date
            format: 'dd-M-yyyy',
            autoclose: true,
            todayHighlight: true
        }).datepicker('update', new Date());
    });

    function displayMessage(message) {
        $(".response").html("<div class='success'>" + message + "</div>");
        setInterval(function() {
            $(".success").fadeOut();
        }, 1000);
    }
    </script>



</body>