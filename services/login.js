$(function() {
    $("#formlogin").submit(function(e) {
        e.preventDefault()
        $.ajax({
            type: "POST",
            url: "./auth/ck-login.php",
            data: $(this).serialize()
        }).done(function(resp) {
            switch (resp) {
                case (resp = "superadmin"):
                    toastr.success("เข้าสู่ระบบสำเร็จ");
                    setTimeout(() => {
                        location.href = './BOS/Home/Superadmin/'
                    }, 800);
                    break
                case (resp = "admin"):
                    toastr.success("เข้าสู่ระบบสำเร็จ");
                    setTimeout(() => {
                        location.href = './BOS/Home/Admin/'
                    }, 800);
                    break
                case (resp = "editer"):
                    toastr.success("เข้าสู่ระบบสำเร็จ");
                    setTimeout(() => {
                        location.href = './BOS/Home/Editer/'
                    }, 800);
                    break
            };
        }).fail(function(resp) {
            toastr.error("เข้าสู่ระบบไม่สำเร็จ")
            location.reload()
        })
    })
})