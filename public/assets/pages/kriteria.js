$(document).ready(function () {
    let baseUrl = $('meta[name="base-url"]').attr("content");

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#addKriteria").submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: `${baseUrl}/kriteria`,
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
                $("#addKriteria")[0].reset();
                $("#create-kriteria").modal("hide");
            },
            error: function (response) {
                alert(response.message);
            },
        });
    });

    $(document).on("click", ".edit-record", function () {
        let id = $(this).data("id");
        console.log(id);
        $.ajax({
            url: `${baseUrl}/kriteria/${id}`,
            method: "GET",
            success: function (response) {
                $("#id").val(response.data.id_kriteria);
                $("#nama_kriteria").val(response.data.nama_kriteria);
                $("#deskripsi").val(response.data.deskripsi);
                $("#bobot").val(response.data.bobot);
                $("#edit-kriteria").modal("show");
            },
        });
    });

    $("#editKriteria").submit(function (e) {
        e.preventDefault();
        let id = $("#id").val();
        $.ajax({
            url: `${baseUrl}/kriteria/${id}/update`,
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
                $("#edit-kriteria").modal("hide");
                $("#editKriteria")[0].reset();
            },
            error: function (response) {
                alert(response);
            },
        });
    });

    $(document).on("click", ".delete-kriteria", function (e) {
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
        }).then(function (result) {
            if (result.isConfirmed) {
                $.ajax({
                    url: `${baseUrl}/kriteria/${id}`,
                    method: "DELETE",
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
                    },
                    error: function (response) {
                        alert(response.message);
                    },
                });
            }
        });
    });
});
