$(document).ready(function () {
    let lastChecked = null;

    // ----------------------------
    // Shift + Click Range Select
    // ----------------------------
    $(document).on("click", ".row-checkbox", function (e) {
        if (!lastChecked) {
            lastChecked = this;
            return;
        }

        if (e.shiftKey) {
            let start = $(".row-checkbox").index(this);
            let end = $(".row-checkbox").index(lastChecked);

            $(".row-checkbox")
                .slice(Math.min(start, end), Math.max(start, end) + 1)
                .prop("checked", lastChecked.checked);
        }

        lastChecked = this;

        updateSelectAll();
        toggleDeleteButton();
    });

    // ----------------------------
    // Select / Deselect All
    // ----------------------------
    $("#select-all").on("click", function () {
        const checked = $(this).prop("checked");
        $(".row-checkbox").prop("checked", checked);
    });

    // ----------------------------
    // Update Select All state
    // ----------------------------
    $(document).on("change", ".row-checkbox", function () {
        updateSelectAll();
        toggleDeleteButton();
    });

    function updateSelectAll() {
        const all = $(".row-checkbox").length;
        const checked = $(".row-checkbox:checked").length;

        $("#select-all").prop("checked", all === checked);
    }

    function toggleDeleteButton() {
        const selected = $(".row-checkbox:checked").length;

        // Toggle delete button
        if (selected > 0) {
            $("#delete-selected").removeClass("d-none");
        } else {
            $("#delete-selected").addClass("d-none");
        }

        // Toggle selection message
        if (selected > 0) {
            $("#selection-info").removeClass("d-none");

            $("#selection-text").text(
                selected === 1
                    ? "1 permission selected"
                    : selected + " permissions selected",
            );
        } else {
            $("#selection-info").addClass("d-none");
        }
    }

    // Clear selection button
    $("#clear-selection").on("click", function () {
        $(".row-checkbox").prop("checked", false);
        $("#select-all").prop("checked", false);

        toggleDeleteButton();
    });

    // ----------------------------
    // Bulk Delete
    // ----------------------------
    $("#delete-selected").on("click", function () {
        const ids = $(".row-checkbox:checked")
            .map(function () {
                return $(this).val();
            })
            .get();

        if (ids.length === 0) {
            alert("Please select at least one row to delete.");
            return;
        }

        if (!confirm("Are you sure you want to delete selected permissions?"))
            return;

        $.ajax({
            url: window.deletePermissionUrl,
            method: "POST",
            data: {
                _token: window.csrfToken,
                ids: ids,
            },
            success: function (res) {
                alert(
                    res.message || "Selected permissions deleted successfully.",
                );
                location.reload();
            },
            error: function () {
                alert("Something went wrong!");
            },
        });
    });
});
