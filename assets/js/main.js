$(document).ready(function () {
    LoadCalDataFun();
    LoadTimeFun();

    $("#retail-price").change(function(){
        LoadCalDataFun();
    });
    $("#daily-as-is-intake").change(function(){
        LoadCalDataFun();
    });

    $("#help_btn").click(function(){
        $("#main-help-modal").css({"display": "block", "opacity": "1"});
    });

    $("#ration_help_btn").click(function(){
        $("#main-ration-help-modal").css({"display": "block", "opacity": "1"});
    });

    $("#batch_weight_btn").click(function(){
        $("#main-batch-weight-modal").css({"display": "block", "opacity": "1"});
    });

    $("#archive_btn").click(function(){
        $("#main-archive-modal").css({"display": "block", "opacity": "1"});
    });

    $(window).click(function(e) {
        if (e.target.id == "main-help-modal") {
            CloseMainHelpModal();
        } else if (e.target.id == "main-ration-help-modal") {
            CloseMainRationHelpModal();
        } else if (e.target.id == "main-batch-weight-modal") {
            CloseBatchModal();
        } else if (e.target.id == "main-archive-modal") {
            CloseArchiveModal();
        }
    });

    $("#mainTable td:first-child").focusout(function(){
        var row_n = $(this).parent().attr('id');
        console.log(row_n);
        var update_val = $(this).text();
        var as_is_kg_t = $('#main-total-row td:nth-child(2)').text();
        $.ajax({
            url : 'connection.php',
            method  : 'post',
            data    : {mainTable_GetData: "Main Table Working", mat_ID : update_val},
            success : function (Result) {
                UpdateMainTableWithID(row_n, Result, as_is_kg_t);
            }
        });
    });
    $("#mainTable td:nth-child(3)").focusout(function(){
        var row_n = $(this).parent().attr('id');
        console.log(row_n);
        var id_val = $(this).parent().find('td:first-child').text();
        var as_is_kg_t = $('#main-total-row td:nth-child(2)').text();
        $.ajax({
            url : 'connection.php',
            method  : 'post',
            data    : {mainTable_GetData: "Main Table Working", mat_ID : id_val},
            success : function (Result) {
                UpdateMainTableWithID(row_n, Result, as_is_kg_t);
                LoadCalDataFun();
            }
        });
    });

    $('#printBtn').on('click', function () {
        $("#main-fc-print-modal").css({"display": "block", "opacity": "1"});
    });

    $(window).click(function(e) {
        if (e.target.id == "main-help-modal") {
            CloseMainHelpModal();
        } else if (e.target.id == "main-ration-help-modal") {
            CloseMainRationHelpModal();
        } else if (e.target.id == "main-batch-weight-modal") {
            CloseBatchModal();
        } else if (e.target.id == "main-archive-modal") {
            CloseArchiveModal();
        } else if (e.target.id == "main-fc-print-modal") {
            CloseFCPrintModal();
        }
    });


//Footer Time
    var x = setInterval(function() {
        LoadTimeFun();
    }, 1000);
    // $('#mainTable').DataTable({
    //     "scrollX": true
    // });

});

function LoadCalDataFun() {
    retail_price = $('#retail-price').val();
    daily_as_is_intake = $('#daily-as-is-intake').val();

// Calculate Total Vaule in the Main Table
    for (i = 3; i<=42; i++) {
        var total_indi_v = 0;
        $('#mainTable .data-row td:nth-child(' + i + ')').map(function () {
            total_indi_v += parseFloat(replaceAll($(this).text(), ",", ""));
        });
        if (i == 3) {
            $('#main-total-row td:nth-child(' + (i-1) + ')').text(total_indi_v.toFixed(3));
        } else if (i == 4 || i == 5) {
            $('#main-total-row td:nth-child(' + (i-1) + ')').text(total_indi_v.toFixed(1));
        } else if (i == 42) {
            $('#main-total-row td:nth-child(' + (i-1) + ')').text(total_indi_v.toFixed(2));
        } else {
            $('#main-total-row td:nth-child(' + (i - 1) + ')').text(total_indi_v);
        }
    }

// Calculate Analysis on a Dry Matter basis in the Main Table
    tem_rate = parseFloat(replaceAll($('#main-total-row td:nth-child(4)').text(), ",", ""))/parseFloat(replaceAll($('#main-total-row td:nth-child(2)').text(), ",", ""));

    for (i = 4; i<=41; i++) {
        var  tem_val = 0;
        var  tem_val_as = 0;
        tem_val = parseFloat(replaceAll($('#main-total-row td:nth-child(' + i + ')').text(), ",", ""))/parseFloat(replaceAll($('#main-total-row td:nth-child(4)').text(), ",", ""));
        switch(i) {
            case 5:
                tem_val = tem_val /10;
                break;
            case 6:
                tem_val = tem_val /10;
                break;
            case 7:
                tem_val = tem_val /10;
                break;
            case 11:
                tem_val = tem_val /10;
                break;
            case 12:
                tem_val = tem_val /10;
                break;
            case 13:
                tem_val = tem_val /10;
                break;
            case 14:
                tem_val = tem_val /10;
                break;
            case 31:
                tem_val = tem_val /10;
                break;
            case 32:
                tem_val = tem_val /10;
                break;
            case 33:
                tem_val = tem_val /10;
                break;
            case 34:
                tem_val = tem_val /10;
                break;
            case 35:
                tem_val = tem_val /10;
                break;
            case 36:
                tem_val = tem_val /10;
                break;
            case 41:
                tem_val = tem_val * 1000;
                break;
            default:
            // code block
        }

        tem_val_as = tem_val * tem_rate;

        if ( i > 19 && i < 31 || i > 36 && i < 41 ) {
            $('#mainTable .anal-row-matter td:nth-child(' + (i - 2) + ')').text(tem_val.toFixed(0));
            $('#mainTable .anal-row-as td:nth-child(' + (i - 2) + ')').text(tem_val_as.toFixed(0));
        } else if ( i == 41 ) {
            $('#mainTable .anal-row-matter td:nth-child(' + (i - 2) + ')').text(tem_val.toFixed(2));
            $('#mainTable .anal-row-as td:nth-child(' + (i - 2) + ')').text(tem_val_as.toFixed(2));
        }
        else {
            $('#mainTable .anal-row-matter td:nth-child(' + (i - 2) + ')').text(tem_val.toFixed(1));
            $('#mainTable .anal-row-as td:nth-child(' + (i - 2) + ')').text(tem_val_as.toFixed(1));
        }
    }
    $('#mainTable .anal-row-matter td:nth-child(2)').text(100);
    tem_rate *= 100;
    $('#mainTable .anal-row-as td:nth-child(2)').text(tem_rate.toFixed(1));

// Calculate Data Mix Analsis Table
    $('#mixAnalTable tr:first-child td:nth-child(2)').text($('#mainTable .anal-row-matter td:nth-child(3)').text() + "%");
    if ($('#main-total-row td:nth-child(12)').text() == 0) {
        $('#mixAnalTable tr:first-child td:nth-child(4)').text("NA");
        $('#cap_ratio').text("Ca:P ratio = NA");
    } else {
        tem_val = parseFloat(replaceAll($('#main-total-row td:nth-child(11)').text(), ",", ""))/parseFloat(replaceAll($('#main-total-row td:nth-child(12)').text(), ",", ""));
        $('#mixAnalTable tr:first-child td:nth-child(4)').text(tem_val.toFixed(1) + ":1" );
        $('#cap_ratio').text("Ca:P ratio = " + tem_val.toFixed(1) + ":1" );
    }
    $('#mixAnalTable tr:nth-child(2) td:nth-child(2)').text($('#mainTable .anal-row-matter td:nth-child(4)').text() + "%");
    if ($('#main-total-row td:nth-child(14)').text() == 0) {
        $('#mixAnalTable tr:nth-child(2) td:nth-child(4)').text("NA");
        $('#ns_ratio').text("B:S ratio = NA");
    } else {
        tem_val = parseFloat(replaceAll($('#main-total-row td:nth-child(13)').text(), ",", ""))/parseFloat(replaceAll($('#main-total-row td:nth-child(14)').text(), ",", ""));
        $('#mixAnalTable tr:nth-child(2) td:nth-child(4)').text(tem_val.toFixed(1) + ":1" );
        $('#ns_ratio').text("B:S ratio = " + tem_val.toFixed(1) + ":1" );
    }
    $('#mixAnalTable tr:nth-child(3) td:nth-child(2)').text($('#mainTable .anal-row-matter td:nth-child(5)').text() + "%");
    $('#mixAnalTable tr:nth-child(3) td:nth-child(4)').text($('#mainTable .anal-row-matter td:nth-child(33)').text() + "%");
    $('#mixAnalTable tr:nth-child(4) td:nth-child(2)').text($('#mainTable .anal-row-matter td:nth-child(6)').text() + "MJ/kg");
    $('#mixAnalTable tr:nth-child(4) td:nth-child(4)').text($('#mainTable .anal-row-as td:nth-child(2)').text() + "%");
    $('#mixAnalTable tr:nth-child(5) td:nth-child(2)').text($('#mainTable .anal-row-matter td:nth-child(9)').text() + "%");
    $('#mixAnalTable tr:nth-child(5) td:nth-child(4)').text($('#mainTable .anal-row-matter td:nth-child(10)').text() + "%");
    $('#mixAnalTable tr:nth-child(6) td:nth-child(2)').text($('#mainTable .anal-row-matter td:nth-child(30)').text() + "%");
    $('#mixAnalTable tr:nth-child(6) td:nth-child(4)').text($('#mainTable .anal-row-matter td:nth-child(31)').text() + "%");

    tem_val = 1000 * parseFloat(replaceAll($('#main-total-row td:nth-child(41)').text(), ",", ""))/parseFloat(replaceAll($('#main-total-row td:nth-child(2)').text(), ",", ""));

    $('#mixAnalTotalTable tr:first-child td:nth-child(2)').text("$" + tem_val.toFixed(2) + " /tonne");
    $('#retail-price').text(parseFloat(retail_price).toFixed(2));
    tem_val = 100 * (retail_price - tem_val) / tem_val;
    $('#mixAnalTotalTable tr:nth-child(3) td:nth-child(2)').text(tem_val.toFixed(1) + " %");
    tem_val = retail_price * 0.1;
    $('#mixAnalTotalTable tr:nth-child(4) td:nth-child(2)').text("$" + tem_val.toFixed(2));
    tem_val = retail_price * 1.1;
    $('#mixAnalTotalTable tr:nth-child(5) td:nth-child(2)').text("$" + tem_val.toFixed(2));

    $('#mixAnalRatioTable tr:nth-child(2) td:nth-child(2)').text($('#mainTable .anal-row-as td:nth-child(2)').text());
    $('#mixAnalRatioTable tr:nth-child(3) td:nth-child(2)').text($('#mainTable .anal-row-as td:nth-child(6)').text());
    $('#mixAnalRatioTable tr:nth-child(4) td:nth-child(2)').text($('#mainTable .anal-row-as td:nth-child(7)').text());
    $('#mixAnalRatioTable tr:nth-child(5) td:nth-child(2)').text($('#mainTable .anal-row-as td:nth-child(8)').text());
    $('#mixAnalRatioTable tr:nth-child(6) td:nth-child(2)').text($('#mainTable .anal-row-as td:nth-child(3)').text());
    $('#mixAnalRatioTable tr:nth-child(7) td:nth-child(2)').text($('#mainTable .anal-row-as td:nth-child(4)').text());
    $('#mixAnalRatioTable tr:nth-child(8) td:nth-child(2)').text($('#mainTable .anal-row-as td:nth-child(5)').text());
    $('#mixAnalRatioTable tr:nth-child(9) td:nth-child(2)').text($('#mainTable .anal-row-as td:nth-child(30)').text());
    $('#mixAnalRatioTable tr:nth-child(10) td:nth-child(2)').text($('#mainTable .anal-row-as td:nth-child(31)').text());
    $('#mixAnalRatioTable tr:nth-child(11) td:nth-child(2)').text($('#mainTable .anal-row-as td:nth-child(9)').text());
    $('#mixAnalRatioTable tr:nth-child(12) td:nth-child(2)').text($('#mainTable .anal-row-as td:nth-child(10)').text());
    $('#mixAnalRatioTable tr:nth-child(13) td:nth-child(2)').text($('#mainTable .anal-row-as td:nth-child(33)').text());
    $('#mixAnalRatioTable tr:nth-child(14) td:nth-child(2)').text($('#mainTable .anal-row-as td:nth-child(39)').text());
    $('#mixAnalRatioTable tr:nth-child(15) td:nth-child(2)').text(parseFloat(retail_price).toFixed(2));

    $('#mixAnalRatioTable tr:nth-child(2) td:nth-child(5)').text($('#mainTable .anal-row-matter td:nth-child(2)').text());
    $('#mixAnalRatioTable tr:nth-child(3) td:nth-child(5)').text($('#mainTable .anal-row-matter td:nth-child(6)').text());
    $('#mixAnalRatioTable tr:nth-child(4) td:nth-child(5)').text($('#mainTable .anal-row-matter td:nth-child(7)').text());
    $('#mixAnalRatioTable tr:nth-child(5) td:nth-child(5)').text($('#mainTable .anal-row-matter td:nth-child(8)').text());
    $('#mixAnalRatioTable tr:nth-child(6) td:nth-child(5)').text($('#mainTable .anal-row-matter td:nth-child(3)').text());
    $('#mixAnalRatioTable tr:nth-child(7) td:nth-child(5)').text($('#mainTable .anal-row-matter td:nth-child(4)').text());
    $('#mixAnalRatioTable tr:nth-child(8) td:nth-child(5)').text($('#mainTable .anal-row-matter td:nth-child(5)').text());
    $('#mixAnalRatioTable tr:nth-child(9) td:nth-child(5)').text($('#mainTable .anal-row-matter td:nth-child(30)').text());
    $('#mixAnalRatioTable tr:nth-child(10) td:nth-child(5)').text($('#mainTable .anal-row-matter td:nth-child(31)').text());
    $('#mixAnalRatioTable tr:nth-child(11) td:nth-child(5)').text($('#mainTable .anal-row-matter td:nth-child(9)').text());
    $('#mixAnalRatioTable tr:nth-child(12) td:nth-child(5)').text($('#mainTable .anal-row-matter td:nth-child(10)').text());
    $('#mixAnalRatioTable tr:nth-child(13) td:nth-child(5)').text($('#mainTable .anal-row-matter td:nth-child(33)').text());
    $('#mixAnalRatioTable tr:nth-child(14) td:nth-child(4)').text($('#mainTable .anal-row-matter td:nth-child(39)').text());

    $('#last-table-one tr:first-child td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(2)').text(), ",", "")) * daily_as_is_intake / 100).toFixed(1));
    $('#last-table-one tr:nth-child(2) td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(3)').text(), ",", "")) * daily_as_is_intake / 100).toFixed(1));
    $('#last-table-one tr:nth-child(3) td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(4)').text(), ",", "")) * daily_as_is_intake / 100).toFixed(1));
    $('#last-table-one tr:nth-child(4) td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(5)').text(), ",", "")) * daily_as_is_intake / 100).toFixed(1));
    $('#last-table-one tr:nth-child(6) td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(6)').text(), ",", "")) * daily_as_is_intake / 1000).toFixed(1));
    $('#last-table-one tr:nth-child(5) td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#last-table-one tr:nth-child(6) td:nth-child(2)').text(), ",", "")) * 8.4 * 0.8 * 0.7 + parseFloat($('#last-table-one tr:nth-child(4) td:nth-child(2)').text()) * 0.7).toFixed(1));
    $('#last-table-one tr:nth-child(7) td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(30)').text(), ",", "")) * daily_as_is_intake / 100).toFixed(1));
    $('#last-table-one tr:nth-child(8) td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(31)').text(), ",", "")) * daily_as_is_intake / 100).toFixed(1));
    $('#last-table-one tr:nth-child(9) td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(9)').text(), ",", "")) * daily_as_is_intake / 100).toFixed(1));
    $('#last-table-one tr:nth-child(10) td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(10)').text(), ",", "")) * daily_as_is_intake / 100).toFixed(1));
    $('#last-table-one tr:nth-child(11) td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(33)').text(), ",", "")) * daily_as_is_intake / 100).toFixed(1));
    $('#last-table-one tr:nth-child(12) td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(32)').text(), ",", "")) * daily_as_is_intake / 100).toFixed(1));
    $('#last-table-one tr:nth-child(13) td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(34)').text(), ",", "")) * daily_as_is_intake / 100).toFixed(1));
    $('#last-table-one tr:nth-child(14) td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(35)').text(), ",", "")) * daily_as_is_intake / 1000).toFixed(1));
    $('#last-table-one tr:nth-child(15) td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(36)').text(), ",", "")) * daily_as_is_intake / 1000).toFixed(1));
    $('#last-table-one tr:nth-child(16) td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(37)').text(), ",", "")) * daily_as_is_intake / 1000).toFixed(1));
    $('#last-table-one tr:nth-child(17) td:nth-child(2)').text(parseFloat(retail_price * daily_as_is_intake / 10000).toFixed(1));

    $('#last-table-two tr:first-child td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(12)').text(), ",", "")) * daily_as_is_intake / 100).toFixed(1));
    $('#last-table-two tr:nth-child(2) td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(13)').text(), ",", "")) * daily_as_is_intake / 1000).toFixed(1));
    $('#last-table-two tr:nth-child(3) td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(14)').text(), ",", "")) * daily_as_is_intake / 1000).toFixed(1));
    $('#last-table-two tr:nth-child(4) td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(15)').text(), ",", "")) * daily_as_is_intake / 1000).toFixed(1));
    $('#last-table-two tr:nth-child(5) td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(16)').text(), ",", "")) * daily_as_is_intake / 1000).toFixed(1));
    $('#last-table-two tr:nth-child(6) td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(17)').text(), ",", "")) * daily_as_is_intake / 1000).toFixed(1));
    $('#last-table-two tr:nth-child(7) td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(18)').text(), ",", "")) * daily_as_is_intake / 1000).toFixed(1));
    $('#last-table-two tr:nth-child(8) td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(19)').text(), ",", "")) * daily_as_is_intake / 1000).toFixed(1));
    $('#last-table-two tr:nth-child(9) td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(20)').text(), ",", "")) * daily_as_is_intake / 1000).toFixed(1));
    $('#last-table-two tr:nth-child(10) td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(21)').text(), ",", "")) * daily_as_is_intake / 1000).toFixed(1));
    $('#last-table-two tr:nth-child(11) td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(22)').text(), ",", "")) * daily_as_is_intake / 1000).toFixed(1));
    $('#last-table-two tr:nth-child(12) td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(23)').text(), ",", "")) * daily_as_is_intake / 1000).toFixed(1));
    $('#last-table-two tr:nth-child(13) td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(24)').text(), ",", "")) * daily_as_is_intake / 1000).toFixed(1));
    $('#last-table-two tr:nth-child(14) td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(25)').text(), ",", "")) * daily_as_is_intake / 1000).toFixed(1));
    $('#last-table-two tr:nth-child(15) td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(26)').text(), ",", "")) * daily_as_is_intake / 1000).toFixed(1));
    $('#last-table-two tr:nth-child(16) td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(27)').text(), ",", "")) * daily_as_is_intake / 1000).toFixed(1));
    $('#last-table-two tr:nth-child(17) td:nth-child(2)').text(parseFloat(parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(28)').text(), ",", "")) * daily_as_is_intake / 1000).toFixed(1));

// Calculate Footer Div
    if (parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(3)').text(), ",", "")) * 10 < 0.1) {
        $('#footer-table tr:first-child td:last-child').text("No protein");
    } else {
        tem_val = retail_price * 100 / (0.01 * parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(2)').text(), ",", "") * parseFloat(replaceAll($('#main-total-row td:nth-child(5)').text(), ",", "")) /parseFloat(replaceAll($('#main-total-row td:nth-child(4)').text(), ",", ""))));
        $('#footer-table tr:first-child td:last-child').text(tem_val.toFixed(1) + " cents");
    }
    if (parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(6)').text(), ",", "")) < 0.1) {
        $('#footer-table tr:first-child td:last-child').text("No Energy");
    } else {
        tem_val = retail_price * 0.1 / (0.01 * parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(2)').text(), ",", "") * parseFloat(replaceAll($('#main-total-row td:nth-child(8)').text(), ",", "")) / parseFloat(replaceAll($('#main-total-row td:nth-child(4)').text(), ",", ""))));
        $('#footer-table tr:nth-child(2) td:last-child').text(tem_val.toFixed(1) + " cents");
    }
    if (parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(10)').text(), ",", "")) * 10 < 0.1) {
        $('#footer-table tr:first-child td:last-child').text("No phosphorus");
    } else {
        tem_val = retail_price * 0.1 / parseFloat(replaceAll($('#mainTable .anal-row-as td:nth-child(10)').text(), ",", ""));
        $('#footer-table tr:nth-child(2) td:last-child').text("$" + tem_val.toFixed(1));
    }
}
function LoadTimeFun() {
    var fullDate = new Date()
    $('#current-day').text(fullDate.toLocaleDateString("en", {month: "short"}) + ' ' + fullDate.getDate() + ', ' + fullDate.getFullYear());
    var ampm = (fullDate.getHours() >= 12) ? "PM" : "AM";
    var hours = (fullDate.getHours() >= 12) ? fullDate.getHours()-12 : fullDate.getHours();
    $('#current-time').text(hours + ':' + fullDate.getMinutes() + ' ' + ampm);
}
function StartUnderstoodFun() {
    $('#main-div').css("display", "block");
    $('#start-modal').css({"display": "none", "opacity": "0"});
}
function StartExitFun() {
    $('#start-modal').css({"display": "none", "opacity": "0"});
}
function CloseMainHelpModal() {
    $("#main-help-modal").css("display", "none");
}
function CloseMainRationHelpModal() {
    $("#main-ration-help-modal").css("display", "none");
}
function CloseBatchModal() {
    $("#main-batch-weight-modal").css("display", "none");
}
function CloseArchiveModal() {
    $("#main-archive-modal").css("display", "none");
}
function CloseFCPrintModal() {
    $("#main-fc-print-modal").css("display", "none");
}
function BatchWeight() {
    batch_weight = $('#batch_weight_val').val();
    if (batch_weight == "") {

    } else {
        var total_indi_v = 0;
        $('#mainTable .data-row td:nth-child(3)').map(function () {
            total_indi_v += parseFloat(replaceAll($(this).text(), ",", ""));
        });

        $('#mainTable .data-row').map(function () {
            row_elem = $(this);
            BatchWeightUPdate(row_elem, total_indi_v, batch_weight);
        });
        LoadCalDataFun();
    }
    CloseBatchModal();
}
function ArchiveArchiveActive() {
    $('.archive-tab-menu button').removeClass('active');
    $('.archive-tab-menu button:first-child').addClass('active');
    $('.archive-tab-content').removeClass('active');
    $('#archive-archive').addClass('active');
}
function ArchiveDeleteActive() {
    $('.archive-tab-menu button').removeClass('active');
    $('.archive-tab-menu button:nth-child(2)').addClass('active');
    $('.archive-tab-content').removeClass('active');
    $('#archive-delete').addClass('active');
}
function ArchiveRecallActive() {
    $('.archive-tab-menu button').removeClass('active');
    $('.archive-tab-menu button:nth-child(3)').addClass('active');
    $('.archive-tab-content').removeClass('active');
    $('#archive-recall').addClass('active');
}
function BatchWeightUPdate(row_elem, total_indi_v, batch_weight) {
    if (parseFloat(row_elem.find('td:nth-child(1)').text()) < 1) {
        for (i = 3; i<=42; i++) {
            row_elem.find('td:nth-child(' + i + ')').text('0.000');
        }

    } else {
        var as_is_kg_val = parseFloat(replaceAll(row_elem.find('td:nth-child(3)').text(), ",", ""));
        var as_is_kg_cur = parseFloat(batch_weight * as_is_kg_val / total_indi_v);
        row_elem.find('td:nth-child(3)').text(as_is_kg_cur.toFixed(3));

        for (i = 5; i <= 42; i++) {
            var tem_val = parseFloat(replaceAll(row_elem.find('td:nth-child(' + i + ')').text(), ",", ""));
            if (as_is_kg_val == 0) {
                if (i == 4 ||i == 5) {
                    row_elem.find('td:nth-child(' + i + ')').text('0.0');
                } else if (i == 42) {
                    row_elem.find('td:nth-child(' + i + ')').text('0.00');
                } else {
                    row_elem.find('td:nth-child(' + i + ')').text('0');
                }
            } else {
                if (i == 4 || i == 5) {
                    row_elem.find('td:nth-child(' + i + ')').text(parseFloat(tem_val * as_is_kg_cur / as_is_kg_val).toFixed(1));
                } else if (i == 42) {
                    row_elem.find('td:nth-child(' + i + ')').text(parseFloat(tem_val * as_is_kg_cur / as_is_kg_val).toFixed(2));
                } else {
                    row_elem.find('td:nth-child(' + i + ')').text(parseFloat(tem_val * as_is_kg_cur / as_is_kg_val).toFixed(0));
                }
            }
        }
    }
}
function replaceAll(string, search, replace) {
    return string.split(search).join(replace);
}
function UpdateMainTableWithID(row_n, Result, as_is_kg_t) {
    console.log('============');
    console.log(Result);
    if (Result != "none") {
        var res = Result.split(";");
        var as_is_kg = $('#' + row_n + ' td:nth-child(3)').text();
        console.log(res[39]);
        // 5;5;Barley;90;12;12.7;8.62;0.86;0.07;0.42;1.93548;0.17;4.8;0.31;1.5;1.5;0.08;6.5;0;0;0;30;23.1;1;5;4.27;0;3.8;5.7;7;20;4;0;0;0;0;0;0;170;80;
        $('#' + row_n + ' td:nth-child(2)').text(res[2]);
        $('#' + row_n + ' td:nth-child(4)').text(parseFloat(as_is_kg * 100 / as_is_kg_t).toFixed(1));
        $('#' + row_n + ' td:nth-child(5)').text(parseFloat(as_is_kg * res[3] / 100).toFixed(1));
        var dm_kg = parseFloat(as_is_kg * res[3] / 100).toFixed(1);
        $('#' + row_n + ' td:nth-child(6)').text(parseFloat(dm_kg * replaceAll(res[4], ',', '') * 10).toFixed(0));
        $('#' + row_n + ' td:nth-child(7)').text(parseFloat(dm_kg * res[4] * (res[39] / 100) * 10).toFixed(0));
        $('#' + row_n + ' td:nth-child(8)').text(parseFloat(dm_kg * res[4] * (1 - res[39] / 100) * 10).toFixed(0));

        $('#' + row_n + ' td:nth-child(9)').text(parseFloat(dm_kg * replaceAll(res[5], ',', '')).toFixed(0));
        $('#' + row_n + ' td:nth-child(10)').text(parseFloat(dm_kg * replaceAll(res[6], ',', '')).toFixed(0));
        $('#' + row_n + ' td:nth-child(11)').text(parseFloat(dm_kg * replaceAll(res[7], ',', '')).toFixed(0));
        $('#' + row_n + ' td:nth-child(12)').text(parseFloat(dm_kg * replaceAll(res[8], ',', '') * 10).toFixed(0));
        $('#' + row_n + ' td:nth-child(13)').text(parseFloat(dm_kg * replaceAll(res[9], ',', '') * 10).toFixed(0));
        $('#' + row_n + ' td:nth-child(14)').text(parseFloat(dm_kg * replaceAll(res[10], ',', '') * 10).toFixed(0));
        $('#' + row_n + ' td:nth-child(15)').text(parseFloat(dm_kg * replaceAll(res[11], ',', '') * 10).toFixed(0));
        $('#' + row_n + ' td:nth-child(16)').text(parseFloat(dm_kg * replaceAll(res[12], ',', '') * 10).toFixed(0));
        $('#' + row_n + ' td:nth-child(17)').text(parseFloat(dm_kg * replaceAll(res[13], ',', '') * 10).toFixed(0));
        $('#' + row_n + ' td:nth-child(18)').text(parseFloat(dm_kg * replaceAll(res[14], ',', '') * 10).toFixed(0));
        $('#' + row_n + ' td:nth-child(19)').text(parseFloat(dm_kg * replaceAll(res[15], ',', '') * 10).toFixed(0));
        $('#' + row_n + ' td:nth-child(20)').text(parseFloat(dm_kg * replaceAll(res[16], ',', '') * 10).toFixed(0));
        $('#' + row_n + ' td:nth-child(21)').text(parseFloat(dm_kg * replaceAll(res[17], ',', '')).toFixed(0));
        $('#' + row_n + ' td:nth-child(22)').text(parseFloat(dm_kg * replaceAll(res[18], ',', '')).toFixed(0));
        $('#' + row_n + ' td:nth-child(23)').text(parseFloat(dm_kg * replaceAll(res[19], ',', '')).toFixed(0));
        $('#' + row_n + ' td:nth-child(24)').text(parseFloat(dm_kg * replaceAll(res[20], ',', '')).toFixed(0));
        $('#' + row_n + ' td:nth-child(25)').text(parseFloat(dm_kg * replaceAll(res[21], ',', '')).toFixed(0));
        $('#' + row_n + ' td:nth-child(26)').text(parseFloat(dm_kg * replaceAll(res[22], ',', '')).toFixed(0));
        $('#' + row_n + ' td:nth-child(27)').text(parseFloat(dm_kg * replaceAll(res[23], ',', '') * 1000).toFixed(0));
        $('#' + row_n + ' td:nth-child(28)').text(parseFloat(dm_kg * replaceAll(res[24], ',', '')).toFixed(0));
        $('#' + row_n + ' td:nth-child(29)').text(parseFloat(dm_kg * replaceAll(res[25], ',', '')).toFixed(0));
        $('#' + row_n + ' td:nth-child(30)').text(parseFloat(dm_kg * replaceAll(res[26], ',', '')).toFixed(0));
        $('#' + row_n + ' td:nth-child(31)').text(parseFloat(dm_kg * replaceAll(res[27], ',', '')).toFixed(0));
        $('#' + row_n + ' td:nth-child(32)').text(parseFloat(dm_kg * replaceAll(res[28], ',', '') * 10).toFixed(0));
        $('#' + row_n + ' td:nth-child(33)').text(parseFloat(dm_kg * replaceAll(res[29], ',', '') * 10).toFixed(0));
        $('#' + row_n + ' td:nth-child(34)').text(parseFloat(dm_kg * replaceAll(res[30], ',', '') * 10).toFixed(0));
        $('#' + row_n + ' td:nth-child(35)').text(parseFloat(dm_kg * replaceAll(res[31], ',', '') * 10).toFixed(0));
        $('#' + row_n + ' td:nth-child(36)').text(parseFloat(dm_kg * replaceAll(res[32], ',', '') * 10).toFixed(0));
        $('#' + row_n + ' td:nth-child(37)').text(parseFloat(dm_kg * replaceAll(res[33], ',', '') * 10).toFixed(0));
        $('#' + row_n + ' td:nth-child(38)').text(parseFloat(dm_kg * replaceAll(res[34], ',', '')).toFixed(0));
        $('#' + row_n + ' td:nth-child(39)').text(parseFloat(dm_kg * replaceAll(res[35], ',', '')).toFixed(0));
        $('#' + row_n + ' td:nth-child(40)').text(parseFloat(dm_kg * replaceAll(res[36], ',', '')).toFixed(0));
        $('#' + row_n + ' td:nth-child(41)').text(parseFloat(dm_kg * replaceAll(res[37], ',', '')).toFixed(0));
        $('#' + row_n + ' td:nth-child(42)').text(parseFloat(as_is_kg * replaceAll(res[38], ',', '') / 1000).toFixed(2));
    }

}
function PrintFeedCalc() {
    $('#fc-print-div').css({"display": "block", "opacity": "1"});
    CloseFCPrintModal();

    $('#print-fc-address').text($('#fc-address').val());
    $('#print-fc-postal-address').text($('#fc-postal-address').val());
    $('#print-fc-phone').text($('#fc-phone').val());
    $('#print-fc-fax').text($('#fc-fax').val());

    // Load Data
    var main_data_str = "";
    for (i = 1; i <= 24; i++) {
        main_data_str += "<tr>";
        if (i == 1) {
            main_data_str += "<td>" + $('#mainTable tbody tr:first-child td:nth-child(2)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:first-child td:nth-child(3)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:first-child td:nth-child(4)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:first-child td:nth-child(6)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:first-child td:nth-child(8)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:first-child td:nth-child(9)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:first-child td:nth-child(12)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:first-child td:nth-child(13)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:first-child td:nth-child(14)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:first-child td:nth-child(15)').text() + "</td>";
        } else if(i == 22) {
            main_data_str += "<td>" + $('#mainTable tbody tr:nth-child(' + (i + 4) + ') td:first-child').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:nth-child(' + i + ') td:nth-child(2)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:nth-child(' + i + ') td:nth-child(3)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:nth-child(' + (i + 4) + ') td:nth-child(3)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:nth-child(' + (i + 4) + ') td:nth-child(5)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:nth-child(' + (i + 4) + ') td:nth-child(6)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:nth-child(' + (i + 4) + ') td:nth-child(9)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:nth-child(' + (i + 4) + ') td:nth-child(10)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:nth-child(' + (i + 4) + ') td:nth-child(11)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:nth-child(' + (i + 4) + ') td:nth-child(12)').text() + "</td>";
        } else if(i == 23) {
            main_data_str += "<td>" + $('#mainTable tbody tr:nth-child(' + (i + 2) + ') td:first-child').text() + "</td>";
            main_data_str += "<td>---</td>";
            main_data_str += "<td>---</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:nth-child(' + (i + 2) + ') td:nth-child(3)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:nth-child(' + (i + 2) + ') td:nth-child(5)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:nth-child(' + (i + 2) + ') td:nth-child(6)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:nth-child(' + (i + 2) + ') td:nth-child(9)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:nth-child(' + (i + 2) + ') td:nth-child(10)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:nth-child(' + (i + 2) + ') td:nth-child(11)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:nth-child(' + (i + 2) + ') td:nth-child(12)').text() + "</td>";
        }  else if(i == 24) {
            main_data_str += "<td></td>";
            main_data_str += "<td style='font-weight: bold;'>kg</td>";
            main_data_str += "<td style='font-weight: bold;'>%</td>";
            main_data_str += "<td style='font-weight: bold;'>%CPE</td>";
            main_data_str += "<td style='font-weight: bold;'>%UDP</td>";
            main_data_str += "<td style='font-weight: bold;'>MJ/kg</td>";
            main_data_str += "<td style='font-weight: bold;'>%Ca</td>";
            main_data_str += "<td style='font-weight: bold;'>%P</td>";
            main_data_str += "<td style='font-weight: bold;'>%N</td>";
            main_data_str += "<td style='font-weight: bold;'>%S</td>";
        } else {
            main_data_str += "<td>" + $('#mainTable tbody tr:nth-child(' + i + ') td:nth-child(2)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:nth-child(' + i + ') td:nth-child(3)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:nth-child(' + i + ') td:nth-child(4)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:nth-child(' + i + ') td:nth-child(6)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:nth-child(' + i + ') td:nth-child(8)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:nth-child(' + i + ') td:nth-child(9)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:nth-child(' + i + ') td:nth-child(12)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:nth-child(' + i + ') td:nth-child(13)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:nth-child(' + i + ') td:nth-child(14)').text() + "</td>";
            main_data_str += "<td>" + $('#mainTable tbody tr:nth-child(' + i + ') td:nth-child(15)').text() + "</td>";
        }
        main_data_str += "</tr>";
    }

    $('#print-fc-dry-matter').text("Dry matter: " + $('#mixAnalTable tbody tr:nth-child(4) td:last-child').text());
    $('#print-fc-urea-equiv').text("Urea equivalent: " + $('#mixAnalRatioTable tbody tr:nth-child(13) td:nth-child(2)').text() +"%");
    $('#print-fc-ca-p-ratio').text("Ca:P ratio: " + $('#mixAnalTable tbody tr:first-child td:last-child').text());
    $('#print-fc-n-s-ratio').text("N:S ratio: " + $('#mixAnalTable tbody tr:nth-child(2) td:last-child').text());

    $('#print-fc-main-tb tbody').html(main_data_str);

    $('#fc-print-min-daily-intake').text($('#daily-as-is-intake').val());
    $('#fc-print-dry-matter-intake').text($('#last-table-one tr:first-child td:nth-child(2)').text());
    $('#fc-print-me').text($('#last-table-one tr:nth-child(6) td:nth-child(2)').text());
    $('#fc-print-cp-cpe').text($('#last-table-one tr:nth-child(2) td:nth-child(2)').text());
    $('#fc-print-rdp').text($('#last-table-one tr:nth-child(3) td:nth-child(2)').text());
    $('#fc-print-udp').text($('#last-table-one tr:nth-child(4) td:nth-child(2)').text());
    $('#fc-print-cal').text($('#last-table-one tr:nth-child(9) td:nth-child(2)').text());
    $('#fc-print-phosp').text($('#last-table-one tr:nth-child(10) td:nth-child(2)').text());
    $('#fc-print-sulphur').text($('#last-table-two tr:first-child td:nth-child(2)').text());
    $('#fc-print-fat-1').text($('#last-table-one tr:nth-child(12) td:nth-child(2)').text());
    $('#fc-print-salt-1').text($('#last-table-one tr:nth-child(13) td:nth-child(2)').text());
    $('#fc-print-urea-equ-1').text($('#last-table-one tr:nth-child(11) td:nth-child(2)').text());
    $('#fc-print-cost-head-day').text($('#last-table-one tr:nth-child(17) td:nth-child(2)').text());
    $('#fc-print-fat').text($('#mainTable tr.anal-row-matter td:nth-child(32)').text());
    $('#fc-print-salt').text($('#mainTable tr.anal-row-matter td:nth-child(34)').text());
    $('#fc-print-cobalt').text($('#mainTable tr.anal-row-matter td:nth-child(19)').text());
    $('#fc-print-copper').text($('#mainTable tr.anal-row-matter td:nth-child(18)').text());
    $('#fc-print-iodine').text($('#mainTable tr.anal-row-matter td:nth-child(21)').text());
    $('#fc-print-iron').text(parseFloat($('#mainTable tr.anal-row-matter td:nth-child(17)').text()) * 100 );
    $('#fc-print-selenium').text($('#mainTable tr.anal-row-matter td:nth-child(20)').text());
    $('#fc-print-zinc').text($('#mainTable tr.anal-row-matter td:nth-child(22)').text());
    $('#fc-print-vit-a').text($('#mainTable tr.anal-row-matter td:nth-child(24)').text());
    $('#fc-print-vit-d').text($('#mainTable tr.anal-row-matter td:nth-child(27)').text());
    $('#fc-print-vit-e').text($('#mainTable tr.anal-row-matter td:nth-child(28)').text());
    $('#fc-print-rm').text($('#mainTable tr.anal-row-matter td:nth-child(37)').text());

    $('#fc-print-day').text("Date: " + $('#current-day').text());
    $('#fc-print-price').text("Townsville Price: $" + $('#mixAnalRatioTable tbody tr:nth-child(15) td:nth-child(2)').text() + " per tonne");
    $('#fc-print-cost-cpe').text("Cost of 1kg CPE: " + $('#footer-table tbody tr:first-child td:nth-child(2)').text());
    $('#fc-print-cost-p').text("Cost of 1kg P: " + $('#footer-table tbody tr:last-child td:nth-child(2)').text());
    $('#fc-print-cost-energy').text("Cost of 1MJ Energy: " + $('#footer-table tbody tr:nth-child(2) td:nth-child(2)').text());

    $('#fc-print-invoice-num').text("Invoice number - " + $('#fc-invoice-number').val());
    $('#fc-print-tonnes').text("Tonnes - " + $('#fc-tonnes').val());

    $('#fc-print-div').css({"display": "block"});
    document.title = $('#fc-ration-name').val();
    $.print("#fc-print-div");
    $('#fc-print-div').css({"display": "none"});
}