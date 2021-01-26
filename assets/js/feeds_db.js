$(document).ready(function () {
    $("#feeds_db_edit_btn").click(function(){
        if ($(this).text().toLowerCase() == "edit") {
            FeedsDbEditFun();
        } else {
            FeedsDbEditCloseFun();
        }
    });

    $("#feeds_db_help_btn").click(function(){
        $("#feed-db-help-modal").css({"display": "block", "opacity": "1"});
    });

    $(window).click(function(e) {
        if (e.target.id == "feed-db-help-modal") {
            $("#feed-db-help-modal").css("display", "none");
        }
    });

    $("#feeds_db_table td").focusout(function(){
        var row_n = $(this).parent().attr('data-id');
        var col_n = $(this).attr('data-target');
        var update_val = $(this).text();

        $.ajax({
            url : 'connection.php',
            method  : 'post',
            data    : {feedDB_update: "Feed Db Update", mat_ID : row_n, FieldName: col_n, UpdateValue: update_val},
            success : function (response) {
                console.log(response);
            }
        });

        // UpdateFeedsDBFun(row_n, col_n, update_val);
    });
});

function FeedsDbEditFun() {
    // $("#feeds_db_table td:not(:first-child, :nth-child(5), :nth-child(6), :nth-child(41), :nth-child(42), :nth-child(43), :nth-child(44))").attr('contenteditable', 'true');
    $("#feeds_db_table td:not(:first-child, :nth-child(2))").attr('contenteditable', 'true');
    $("#feeds_db_edit_btn").text("CLOSE");
    $("#feeds_db_edit_btn").css({"background-color": "red", "color": "white"})
}
function FeedsDbEditCloseFun() {
    $("#feeds_db_table td").attr('contenteditable', 'false');
    $("#feeds_db_edit_btn").text("EDIT");
    $("#feeds_db_edit_btn").css({"background-color": "white", "color": "red"})
}
function UpdateFeedsDBFun(row_n, col_n, update_val) {
    switch(col_n) {
        case "CPE":
            $('#mat-' + row_n + ':nth-child(5)').text(update_val);
            break;
        // case y:
        //     // code block
        //     break;
        default:
        // code block
    }
}
function CloseFeedHelpModal() {
    $("#feed-db-help-modal").css("display", "none");
}

function PrintFeedsDataBase() {
    // document.title = $('#fc-ration-name').val();
    $.print("#feeds_db_table");
}