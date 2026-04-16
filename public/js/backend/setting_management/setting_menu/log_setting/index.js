$(document).ready(function () {
    // ----------------------------
    // DataTable Init
    // ----------------------------
    const table = $("#logTables").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "/settings/logs", // safer than blade in JS file
            data: function (d) {
                d.range = $("select[name=range]").val();
                d.start_date = $("input[name=start_date]").val();
                d.end_date = $("input[name=end_date]").val();
            },
        },
        columns: [
            { data: "serial", name: "serial" },
            { data: "timestamp", name: "timestamp" },
            { data: "level", name: "level", orderable: false },
            { data: "message_display", name: "message", orderable: false },
            {
                data: "details",
                name: "details",
                orderable: false,
                searchable: false,
            },
        ],
        order: [[1, "desc"]],
        pageLength: 25,
    });

    // ----------------------------
    // Reload on Range Change
    // ----------------------------
    $("select[name=range]").on("change", function () {
        toggleCustomDates();
        table.ajax.reload();
    });

    // ----------------------------
    // Reload on Date Change (Custom)
    // ----------------------------
    $("input[name=start_date], input[name=end_date]").on("change", function () {
        if ($("#range").val() === "custom") {
            table.ajax.reload();
        }
    });

    // ----------------------------
    // Toggle Custom Date Inputs
    // ----------------------------
    function toggleCustomDates() {
        const range = $("#range").val();

        if (range === "custom") {
            $("input[name=start_date], input[name=end_date]").prop(
                "disabled",
                false,
            );
        } else {
            $("input[name=start_date], input[name=end_date]").prop(
                "disabled",
                true,
            );
        }
    }

    // Run on load
    toggleCustomDates();
});
