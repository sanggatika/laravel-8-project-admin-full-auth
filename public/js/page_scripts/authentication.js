function ActLoginUsers()
{
    $("#form-login-user").on("submit", (e) => {
        e.preventDefault();

        $('#alert-error').hide();

        let token = $('input[name=_token]').val();
        let tmp_username = $("#form_username").val();
        let tmp_password = $("#form_password").val();

        if(tmp_username != "" && tmp_password != "")
        {
            $.ajax({
                url: BaseURL + "/auth/act_login",
                data: {
                    token,
                    tmp_username,
                    tmp_password
                },
                method: "POST",
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function () {
                    $('#loading-spiner').show();                                
                },
                success: function (data) {
                    $('#loading-spiner').hide(1000);
                    
                    let dataKeluaran = data;

                    if(dataKeluaran.status == true)
                    {        
                        Swal.fire({
                            title: 'Insert Success !',
                            text: dataKeluaran.message,
                            icon: "success",
                            showDenyButton: false,
                            showCancelButton: false,
                            confirmButtonText: 'Oke',
                            allowOutsideClick: false
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            window.location.replace(BaseURL + "/adm/dashboard");
                        })

                    }else{
                        $('#alert-error').show(1000);
                        $("#pesan-error").html(dataKeluaran.message);
                    }
                },
                error: function () {
                    $('#loading-spiner').hide(1000);
                    Swal.fire({
                        title: "Informasi",
                        text: "Harap Hubungi Petugas, Data Tidak Terkirim",
                        icon: "warning",
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    });
                }
            });
        }else{
            $('#alert-error').show(1000);
            $("#pesan-error").html("Username dan Password Wajib Diisi..");
        }
    });
}

function ActTambahUsers()
{
    $("#form-tambah-master-user").on("submit", (e) => {
        e.preventDefault();

        $('#alert-error').hide();

        let token = $('input[name=_token]').val();
        let tmp_namauser = $("#form_namalengkap").val();
        let tmp_username = $("#form_username").val();
        let tmp_password = $("#form_password").val();
        let tmp_password_re = $("#form_password-re").val();
        let tmp_email = $("#form_email").val();

        if(tmp_namauser != "" && tmp_username != "" && tmp_password != "" && tmp_email != "")
        {
            if(tmp_username.length >= 4 )
            {
                if(tmp_password.length >= 8)
                {
                    if(tmp_password == tmp_password_re)
                    {
                        $.ajax({
                            url: BaseURL + "/auth/act_register",
                            data: {
                                token,
                                tmp_namauser,
                                tmp_username,
                                tmp_password,
                                tmp_email
                            },
                            method: "POST",
                            dataType: "json",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            beforeSend: function () {
                                $('#loading-spiner').show();                                
                            },
                            success: function (data) {
                                $('#loading-spiner').hide(1000);
                                let dataKeluaran = data;

                                if(dataKeluaran.status == true)
                                {        
                                    Swal.fire({
                                        title: 'Insert Success !',
                                        text: dataKeluaran.message,
                                        icon: "success",
                                        showDenyButton: false,
                                        showCancelButton: false,
                                        confirmButtonText: 'Oke',
                                    }).then((result) => {
                                        /* Read more about isConfirmed, isDenied below */
                                        window.location.replace(BaseURL + "/auth/login");
                                    })
        
                                }else{
                                    Swal.fire({
                                        title: "Informasi",
                                        text: dataKeluaran.message,
                                        icon: "warning",
                                        confirmButtonClass: 'btn btn-primary',
                                        buttonsStyling: false,
                                    });
                                }
                            },
                            error: function () {
                                $('#loading-spiner').hide(1000);
                                Swal.fire({
                                    title: "Informasi",
                                    text: "Harap Hubungi Petugas, Data Tidak Terkirim",
                                    icon: "warning",
                                    confirmButtonClass: 'btn btn-primary',
                                    buttonsStyling: false,
                                });
                            },
                        });
                    }else{
                        $('#alert-error').show(1000);
                        $("#pesan-error").html("Password Tidak Sama Dengan Re-Password");
                    }
                }else{
                    $('#alert-error').show(1000);
                    $("#pesan-error").html("Username Harus Lebih Dari 8 Karakter");
                }
            }else{
                $('#alert-error').show(1000);
                $("#pesan-error").html("Username Harus Lebih Dari 4 Karakter");
            }
        }else {
            $('#alert-error').show(1000);
            $("#pesan-error").html("Semua Form Wajib Diisi, Terimakasih..");
        }
    });
}

$(document).ready(function() {
    ActLoginUsers();     
    ActTambahUsers();
});