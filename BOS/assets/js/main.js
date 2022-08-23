$('#profile').click(function() { // เรียกใช้งาน แก้ไขข้อมูล (MOdal previews)
    let salt = $("#profile_id").val();

    $.ajax({
        url: "../services/User/update.php",
        method: "GET",
        data: {
            salt: salt
        },
        dataType: "json",
        success: function(data) {
            data = data.result;

            console.log(data)


            $('#mdfull_name').html(data[0].name);
            $('#mduser_name').html(data[0].user_name);
            $('#mduser_email').html(data[0].email);
            $('#mduser_role_id').html(data[0].position);
            $('#mdetail_user').modal('show');
        }
    });
});





$("#setting").click(function() {
    var baseUrl = (window.location).href; // You can also use document.URL
    var salt = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "../services/user/update.php",
        data: {
            salt: salt,
        },
        success: function(data) {
            // $('#duser_id').html(data[0].user_id);
            $('#dfull_name').html(data[0].full_name);
            $('#duser_name').html(data[0].user_name);
            $('#duser_email').html(data[0].user_email);
            $('#duser_role_id').html(data[0].user_role);

        },
        error: function(err) {
            // console.log("bad", err)

        }
    })
})




// $(document).ready(function() {
//     var baseUrl = (window.location).href; // You can also use document.URL
//     var salt = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);
//     $.ajax({
//         type: "GET",
//         dataType: "json",
//         url: "../services/user/update.php",
//         data: {
//             salt: salt,
//         },
//         success: function(data) {
//             // $('#duser_id').html(data[0].user_id);
//             $('#dfull_name').html(data[0].full_name);
//             $('#duser_name').html(data[0].user_name);
//             $('#duser_email').html(data[0].user_email);
//             $('#duser_role_id').html(data[0].user_role);
//             console.log("good", data)
//         },
//         error: function(err) {
//             // console.log("bad", err)

//         }
//     })
// })

