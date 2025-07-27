$(document).ready(function () {
    let baseUrl = $('meta[name="base-url"]').attr("content");

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#formulisEvaluasi").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: `${baseUrl}/evaluasi`,
            method: "POST",
            data: $(this).serialize(),
            success: function (response) {
                Swal.fire({
                    title: "Good job!",
                    text: `${response.message}`,
                    icon: "success",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    },
                    buttonsStyling: false,
                });
                setTimeout(() => {
                    window.location.href =
                        "http://evaluasi-kinerja-tutor-main.test/evaluasi/berhasil";
                }, 3000);
            },
            error: function (response) {
                Swal.fire({
                    title: "Error!",
                    text: `Evaluasi Gagal`,
                    icon: "error",
                    customClass: {
                        confirmButton: "btn btn-warning",
                    },
                    buttonsStyling: false,
                });
            },
        });
    });
});
