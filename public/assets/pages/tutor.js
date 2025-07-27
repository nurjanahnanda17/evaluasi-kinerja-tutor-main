$(document).ready(function () {
    let baseUrl = $('meta[name="base-url"]').attr("content");

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#addTutor").submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: `${baseUrl}/tutors`,
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
                $("#addTutor")[0].reset();
                $("#create-tutor").modal("hide");
            },
        });
    });

    $(document).on("click", ".delete-record", function (e) {
        let id_tutor = $(this).data("id");

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            customClass: {
                confirmButton: "btn btn-primary me-3",
                cancelButton: "btn btn-label-secondary",
            },
            buttonsStyling: false,
        }).then(function (result) {
            if (result.isConfirmed) {
                $.ajax({
                    url: `${baseUrl}/tutors/${id_tutor}`,
                    method: "DELETE",
                    success: function (response) {
                        Swal.fire({
                            icon: "success",
                            title: "Deleted!",
                            text: `${response.message}`,
                            customClass: {
                                confirmButton: "btn btn-success",
                            },
                        });
                    },
                    error: function (response) {
                        alert(response.message);
                    },
                });
            }
        });
    });

    $(document).on("click", ".edit-record", function (e) {
        let id_tutor = $(this).data("id");
        $.ajax({
            url: `${baseUrl}/tutors/${id_tutor}`,
            method: "GET",
            success: function (response) {
                console.log(response.data);
                $("#id").val(response.data.id_tutor);
                $("#namaTutor").val(response.data.nama_tutor);
                $("#nomorInduk").val(response.data.nomor_induk);
                $("#edit-tutor").modal("show");
            },
            error: function (response) {
                alert(response.message);
            },
        });
    });

    $("#editTutor").submit(function (e) {
        e.preventDefault();
        let id = $("#id").val();
        $.ajax({
            url: `${baseUrl}/tutors/${id}`,
            method: "PUT",
            data: $(this).serialize(),
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    title: "Updated!",
                    text: `${response.message}`,
                    customClass: {
                        confirmButton: "btn btn-success",
                    },
                });
                $("#edit-tutor").modal("hide");
            },
            error: function (response) {
                alert("error");
            },
        });
    });
});
