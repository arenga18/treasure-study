$(document).ready(function () {
    $("#myTable").hide();
    $("#tableLoading").show();

    // Inisialisasi DataTable
    var table = $("#myTable").DataTable({
        paging: false,
        searching: true,
        language: {
            search: "Pencarian data:",
            lengthMenu: "20",
        },
        order: [[1, "asc"]],
        rowCallback: function (row, data, index) {
            $("td:eq(0)", row).html(index + 1);
        },
        columnDefs: [
            {
                targets: 0,
                orderable: false,
                render: function (data, type, row, meta) {
                    return meta.row + 1;
                },
            },
        ],
        initComplete: function () {
            $("#tableLoading").hide();
            $("#myTable").removeClass("hidden").fadeIn();
        },
    });

    $("#tahunLulusFilter").on("change", function () {
        var selectedYear = $(this).val();
        table.column(6).search(selectedYear).draw();

        var title =
            "Daftar Siswa-Siswi SMA Labschool Cirendeu Yang diterima di Perguruan Tinggi Tahun Akademik ";
        if (selectedYear) {
            $("#judul").text(
                title + selectedYear + "-" + (parseInt(selectedYear) + 1)
            );
        } else {
            $("#judul").text(title + "2023-2024");
        }
    });

    $("#tahunLulusFilter").trigger("change");
});
