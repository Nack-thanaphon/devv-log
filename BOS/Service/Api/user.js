$(document).ready(function() {
    $('#add_button').click(function() {
        $('#user_form')[0].reset();
        $('.modal-title').html("<i class='fa fa-plus'></i> เพิ่มผู้ใช้งาน");
        $('#action').val("Add");
        $('#btn_action').val("Add");
    });

    var userdataTable = $('#user_data').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            type: "POST",
            dataType: "JSON",
            url: "../../Service/User/",
            data: {},

        },
        "columnDefs": [{
            "target": [4, 5],
            "orderable": false
        }],
        "pageLength": 25
    });

    $(document).on('submit', '#user_form', function(event) {
        event.preventDefault();
        $('#action').attr('disabled', 'disabled');
        var form_data = $(this).serialize();
        $.ajax({
            url: "../../Service/User/user_action.php",

            method: "POST",
            data: form_data,
            success: function(data) {
                $('#user_form')[0].reset();
                $('#userModal').modal('hide');
                $('#alert_action').fadeIn().html(
                    '<div class="alert alert-success">' + data +
                    '</div>');
                $('#action').attr('disabled', false);
                userdataTable.ajax.reload();
            }
        })
    });

    $(document).on('click', '.update', function() {
        var user_id = $(this).attr("id");
        var btn_action = 'fetch_single';
        $.ajax({
            url: "../../Service/User/user_action.php",
            method: "POST",
            data: {
                user_id: user_id,
                btn_action: btn_action
            },
            dataType: "json",
            success: function(data) {
                $('#userModal').modal('show');
                $('#user_name').val(data.user_name);
                $('#user_email').val(data.user_email);
                $('#user_role_id').val(data.user_role_id);
                $('.modal-title').html("<i class='fas fa-user-edit'></i> Edit User");
                $('#user_id').val(user_id);
                $('#user_password').attr('required', true);
                $('#action').val('Edit');
                $('#btn_action').val('Edit');
            }
        })
    });


    $(document).on('click', '.delete', function() {
        var user_id = $(this).attr("id");
        var status = $(this).data('status');
        var btn_action = "delete";
        Swal.fire({
            icon: 'warning',
            title: 'ต้องการเปลี่ยนแปลงสถานะ?',
            showConfirmButton: false,
            showDenyButton: true,
            showCancelButton: true,
            denyButtonText: `ยืนยันการเปลี่ยนแปลง`,
            cancelButtonText: `ยกเลิก`,
        }).then((result) => {
            if (result.isDenied) {
                $.ajax({
                    url: "../../Service/User/user_action.php",

                    method: "POST",
                    data: {
                        user_id: user_id,
                        status: status,
                        btn_action: btn_action
                    },
                    success: function(data) {
                        $('#alert_action').fadeIn().html(
                            '<div class="alert alert-info">' + data + '</div>');
                        Swal.fire({
                            icon: 'success',
                            title: 'การดำเนินการสำเร็จ',
                            text: 'เปลี่ยนสถานะสำเร็จ'
                        })
                        userdataTable.ajax.reload();
                    }
                })
            }
        });

    });
});