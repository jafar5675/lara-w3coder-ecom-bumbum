$(document).on("click", "#delete", function (e) {
    e.preventDefault();
    var link = $(this).attr("href");
    swal({
        title: "Are you sure to Delete?",
        text: "once deleted, you will not find data.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                window.location.href = link;
            } else {
                swal("Your imaginary file in safe");
            }
        })
})
$(document).on("click", "#confirm", function (e) {
    e.preventDefault();
    var link = $(this).attr("href");
    swal({
        title: "Are you sure to confirm?",
        text: "once confirmed, you will not be able to pending order.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                window.location.href = link;
            } else {
                swal("Not Confirmed");
            }
        })
})
$(document).on("click", "#processing", function (e) {
    e.preventDefault();
    var link = $(this).attr("href");
    swal({
        title: "Are you sure to process?",
        text: "once Processing, you can't go back.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                window.location.href = link;
            } else {
                swal("Not Confirmed");
            }
        })
})
$(document).on("click", "#order", function (e) {
    e.preventDefault();
    var link = $(this).attr("href");
    swal({
        title: "Are you sure to Confirm?",
        text: "once confirm, you can't go back.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                window.location.href = link;
            } else {
                swal("Not Confirmed");
            }
        })
})
$(document).on("click", "#cancel", function (e) {
    e.preventDefault();
    var link = $(this).attr("href");
    swal({
        title: "Are you sure to Cancel?",
        text: "once cancel, you can't go back.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                window.location.href = link;
            } else {
                swal("Not Cancel");
            }
        })
})


