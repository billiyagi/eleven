$(document).ready(function () {

    /** 
     * Loading indicator
    */
    setTimeout(function () {
        $('#loadPage').addClass('close-loading');
        $('#loadPageBg').addClass('close-loading-bg');
    }, 1500)

    /** 
     * Humberger menu Action
    */
    $('#menuCloseBtn').click(function () {
        $('#menu').addClass('menu-close').removeClass('menu-open');
    })
    $('#menuOpenBtn').click(function () {
        $('#menu').addClass('menu-open').removeClass('menu-close');
    });


    if (window.location.pathname == '/eleven/admin/index.php' || window.location.pathname == '/admin/index.php') {
        if ($(window).width() <= 768) {
            $('#adminMenuBtnIcon').addClass('fa-arrow-right').removeClass('fa-bars');
            $('#adminMenuBtn').addClass('menu-hide btn-lg');
            $('#titlePage').addClass('title-move');
        }
    }


    /** 
     * Humberger menu admin action
    */
    $('#adminMenuBtn').click(function () {

        // Mobile
        if ($(window).width() <= 768) {

            // Kondisi menu ditutup
            if ($(this).hasClass('menu-hide')) {
                $('#adminMenuBtnIcon').removeClass('fa-arrow-right').addClass('fa-bars');
                $(this).removeClass('menu-hide').removeClass('btn-lg');
                // $('#adminMenu').removeClass('menu-open');
                $('#adminMenu').addClass('menu-open');
                // $('#adminTopBar').removeClass('admin-menu-close');
                // $('#adminMainContent').removeClass('admin-menu-close');
                // $('#adminFooter').removeClass('admin-menu-close');
                // $('#titlePage').removeClass('title-move');
                // Kondisi menu dibuka
            } else {
                $('#titlePage').addClass('title-move');
                $('#adminMenuBtnIcon').removeClass('fa-bars').addClass('fa-arrow-right');
                $(this).addClass('menu-hide btn-lg');
                $('#adminMenu').removeClass('menu-open');
                // $('#adminTopBar').addClass('admin-menu-close');
                // $('#adminMainContent').addClass('admin-menu-close');
                // $('#adminFooter').addClass('admin-menu-close');
            }

            // Desktop
        } else {
            // Kondisi menu ditutup
            if ($(this).hasClass('menu-hide')) {
                $('#adminMenuBtnIcon').removeClass('fa-arrow-right').addClass('fa-bars');
                $(this).removeClass('menu-hide').removeClass('btn-lg');
                $('#adminMenu').removeClass('menu-close');
                $('#adminTopBar').removeClass('admin-menu-close');
                $('#adminMainContent').removeClass('admin-menu-close');
                $('#adminFooter').removeClass('admin-menu-close');
                $('#titlePage').removeClass('title-move');
                // Kondisi menu dibuka
            } else {
                $('#titlePage').addClass('title-move');
                $('#adminMenuBtnIcon').removeClass('fa-bars').addClass('fa-arrow-right');
                $(this).addClass('menu-hide btn-lg');
                $('#adminMenu').addClass('menu-close');
                $('#adminTopBar').addClass('admin-menu-close');
                $('#adminMainContent').addClass('admin-menu-close');
                $('#adminFooter').addClass('admin-menu-close');
            }
        }
    })
});

const loadingButton = function (buttonId) {
    $(buttonId).empty().html(`
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`)
        .attr('disabled', 'disabled');
}

const removeLoadingButton = function (buttonId, buttonText = 'submit') {
    $(buttonId).html(buttonText).removeAttr('disabled');
}



/** 
     * Signup 
    */
$('#signupForm').submit(function (event) {

    // Buat loading button
    loadingButton('#user_signup_btn');

    // Form Data Signup
    let signupForm = {
        first_name: $('#first_name').val(),
        last_name: $('#last_name').val(),
        username: $('#signup_username').val(),
        email: $('#signup_email').val(),
        password: $('#signup_password').val(),
        user_signup: $('#user_signup_btn').val()
    }

    // Make Form dont do redirect
    event.preventDefault();

    /** 
     * Melakukan pendaftaran dengan metode AJAX
     */
    $.ajax({
        type: 'POST',
        url: 'system/request.php',
        data: signupForm,
        dataType: 'json',
        encode: true,
        success: function (response) {
            console.log(response);
            /** 
             * Response untuk pendafataran yang dilakukan.
             */
            if (response.status == 'success') {

                // Feedback Berhasil dan redirect
                Swal.fire({
                    title: 'Pendaftaran Berhasil',
                    text: 'Login untuk mulai berbelanja.',
                    icon: 'success',
                }).then(setTimeout(function () {
                    location.reload();
                }, 2000))

                // Feedback Gagal dan berikan peringatan
            } else {

                // Remove Loading button
                removeLoadingButton('#user_signup_btn', 'Submit')

                // Validation Message
                $('#first_name_feedback').addClass('text-danger invalid-feedback d-block').html(response.first_name);
                $('#last_name_feedback').addClass('text-danger invalid-feedback d-block').html(response.last_name);
                $('#signup_email_feedback').addClass('text-danger invalid-feedback d-block').html(response.email);
                $('#signup_username_feedback').addClass('text-danger invalid-feedback d-block').html(response.username);
                $('#signup_password_feedback').addClass('text-danger invalid-feedback d-block').html(response.username);

                // Warning validation
                Swal.fire({
                    title: 'Pendaftaran gagal',
                    text: 'Mohon periksa semua kolom.',
                    icon: 'warning',
                })
            }
        },

        /** 
         * Ketika ada error dalam jaringan, minta pengguna untuk merefresh halaman
         */
        error: function (textStatus, errorThrown) {
            alert('Terjadi Kesalahan, Mohon muat ulang halaman ini.');
        }
    })
})



/** 
     * Melakukan Login dengan AJAX
    */
$('#signInForm').submit(function (event) {

    // Form data
    let formSignin = {
        email: $('#email').val(),
        password: $('#password').val(),
        user_login: $('#user_signin_btn').val()
    }

    // Reset redirect Form
    event.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'system/request.php',
        data: formSignin,
        dataType: 'json',
        encode: true,
        success: function (response) {
            if (response.status == 'success') {

                if (response.role == 1) {
                    Swal.fire({
                        title: 'Login berhasil',
                        text: 'Kamu akan segera dialihkan ke dashboard.',
                        icon: 'success',
                    })

                    setTimeout(function () {
                        location.replace('admin/index.php');
                    }, 1000)
                } else if (response.role == 2) {
                    Swal.fire({
                        title: 'Login berhasil',
                        text: 'Selamat berbelanja di eleven.',
                        icon: 'success',
                    })
                    setTimeout(function () {
                        location.reload();
                    }, 1300)
                }

            } else {
                Swal.fire({
                    title: 'Login gagal',
                    text: response.message,
                    icon: 'info',
                })
            }
        },
        error: function (textStatus, errorThrown) {
            alert('Terjadi Kesalahan, Mohon muat ulang halaman ini.');
        }
    })
})


/** 
 * Cuaca API
*/
$.getJSON("http://api.weatherapi.com/v1/current.json?key=71441368a2594f4a925103250232704&q=Bogor",
    function (weather) {
        $('#weatherLocation').text(`${weather.location.name}, ${weather.location.country}`)
        $('#weatherTemperature').text(`Suhu ${weather.current.temp_c} C`)
        $('#weatherIcon').attr('src', `https:${weather.current.condition.icon}`);
    }
);

/** 
 * Logout
*/

$('#logoutBtn').click(function (e) {
    Swal.fire({
        title: 'Keluar dari akun?',
        showCancelButton: true,
        confirmButtonText: 'Logout',
    }).then((result) => {
        if (result.isConfirmed) {
            $('#logoutForm').submit();
        }
    })
})

$('.delete-btn').click(function () {
    Swal.fire({
        title: 'Hapus data?',
        text: 'Data yang dihapus tidak akan bisa dipulihkan kembali',
        showCancelButton: true,
        confirmButtonText: 'Hapus',
    }).then((result) => {
        if (result.isConfirmed) {
            $(this).parent().submit();
        }
    })
})

$('.user-active').click(function () {
    Swal.fire({
        title: 'Nonaktifkan Pengguna?',
        showCancelButton: true,
        confirmButtonText: 'Nonaktifkan',
    }).then((result) => {
        if (result.isConfirmed) {
            $(this).parent().submit();
        }
    })
})

$('.user-non-active').click(function () {
    Swal.fire({
        title: 'Aktifkan Pengguna?',
        showCancelButton: true,
        confirmButtonText: 'Aktifkan',
    }).then((result) => {
        if (result.isConfirmed) {
            $(this).parent().submit();
        }
    })
})