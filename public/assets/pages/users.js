$(function (e) {
    let baseUrl = $('meta[name="base-url"]').attr("content");

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(".delete-record").on("click", function () {
        let id = $(this).data("id");
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
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `${baseUrl}/users/${id}`,
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

    $(document).on("click", ".edit-user", function () {
        let id = $(this).data("id");
        $.ajax({
            url: `${baseUrl}/users/${id}`,
            method: "GET",
            success: function (response) {
                $("#idUser").val(response.data.id_user);
                $("#namaUser").val(response.data.nama);
                $("#emailUser").val(response.data.email);
                $("#roleUser").val(response.data.role);
                $("#edit-user").modal("show");
            },
            error: function () {
                alert("error");
            },
        });
    });

    $("#editUser").submit(function () {
        let id_user = $("#idUser").val();
        $.ajax({
            url: `${baseUrl}/users/${id_user}`,
            method: "PUT",
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

                $("#editUser")[0].reset();
                $("#edit-user").modal("hide");
            },
            error: function () {
                alert("error");
            },
        });
    });

    $("#addUser").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: `${baseUrl}/users`,
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
                $("#addUser")[0].reset();
                $("#create-user").modal("hide");
            },
            error: function (response) {
                Swal.fire({
                    title: "Error!",
                    text: `${response.message}`,
                    icon: "error",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    },
                    buttonsStyling: false,
                });
                $("#create-user").modal("hide");
            },
        });
    });
});
