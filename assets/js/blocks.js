$(document).ready(function () {
    LoadCalProtein();
});

function LoadCalProtein() {
    protein_intake = $('#protein-intake').val();
    phosphorus_intake = $('#phosphrus-intake').val();
    no_protein = "No Protein";
    unrealistic_intake = "Unrealistic intake";
    protein_factor = 500;
    daily_as_is_intake = $('#daily-as-is-intake').val();
    no_value = "N.A.";

    // Calculate Total Vaule in the Protein Blocks  Mixes Table
    for (i = 1; i <= 54; i++) {
        if ($('#protein_table tbody tr:nth-child(' + i +') td:nth-child(2)').text() != "") {
            if (parseFloat($('#protein_table tbody tr:nth-child(' + i +') td:nth-child(5)').text()) <= 0) {
                $('#protein_table tbody tr:nth-child(' + i +') td:nth-child(10)').text(no_protein);
                $('#protein_table tbody tr:nth-child(' + i +') td:nth-child(11)').text(no_value);
                $('#protein_table tbody tr:nth-child(' + i +') td:nth-child(12)').text(no_value);
                $('#protein_table tbody tr:nth-child(' + i +') td:nth-child(13)').text(no_value);
                $('#protein_table tbody tr:nth-child(' + i +') td:nth-child(14)').text(no_value);
            } else {
                tem_v = 100 * protein_intake / parseFloat($('#protein_table tbody tr:nth-child(' + i +') td:nth-child(5)').text());
                if (tem_v > protein_factor) {
                    $('#protein_table tbody tr:nth-child(' + i +') td:nth-child(10)').text(unrealistic_intake);
                    $('#protein_table tbody tr:nth-child(' + i +') td:nth-child(11)').text(no_value);
                    $('#protein_table tbody tr:nth-child(' + i +') td:nth-child(12)').text(no_value);
                    $('#protein_table tbody tr:nth-child(' + i +') td:nth-child(13)').text(no_value);
                    $('#protein_table tbody tr:nth-child(' + i +') td:nth-child(14)').text(no_value);
                } else {
                    $('#protein_table tbody tr:nth-child(' + i +') td:nth-child(10)').text(parseInt(tem_v));
                    $('#protein_table tbody tr:nth-child(' + i +') td:nth-child(11)').text(parseFloat(tem_v * parseFloat($('#protein_table tbody tr:nth-child(' + i +') td:nth-child(6)').text()) / 100).toFixed(1));
                    $('#protein_table tbody tr:nth-child(' + i +') td:nth-child(12)').text(parseInt(parseFloat($('#protein_table tbody tr:nth-child(' + i +') td:nth-child(3)').text()) * 1000 / tem_v));
                    temp_cost = parseFloat(tem_v * parseFloat($('#protein_table tbody tr:nth-child(' + i +') td:nth-child(4)').text().replace('$', '')) / parseFloat($('#protein_table tbody tr:nth-child(' + i +') td:nth-child(3)').text()) / 10);
                    $('#protein_table tbody tr:nth-child(' + i +') td:nth-child(13)').text(temp_cost.toFixed(1));
                    $('#protein_table tbody tr:nth-child(' + i +') td:nth-child(14)').text("$" + parseInt(temp_cost * 30));
                }
            }
        }
    }

    // Calculate Total Vaule in the Phosphorus Blocks  Mixes Table
    for (i = 1; i <= 45; i++) {
        if ($('#phosphrus_table tbody tr:nth-child(' + i +') td:nth-child(2)').text() != "") {
            if (parseFloat($('#phosphrus_table tbody tr:nth-child(' + i +') td:nth-child(6)').text()) <= 0) {
                $('#phosphrus_table tbody tr:nth-child(' + i +') td:nth-child(10)').text(no_protein);
                $('#phosphrus_table tbody tr:nth-child(' + i +') td:nth-child(12)').text(no_value);
                $('#phosphrus_table tbody tr:nth-child(' + i +') td:nth-child(13)').text(no_value);
                $('#phosphrus_table tbody tr:nth-child(' + i +') td:nth-child(14)').text(no_value);
            } else {
                tem_v = 100 * phosphorus_intake / parseFloat($('#phosphrus_table tbody tr:nth-child(' + i +') td:nth-child(6)').text());
                if (tem_v > protein_factor) {
                    $('#phosphrus_table tbody tr:nth-child(' + i +') td:nth-child(10)').text(unrealistic_intake);
                    $('#phosphrus_table tbody tr:nth-child(' + i +') td:nth-child(12)').text(no_value);
                    $('#phosphrus_table tbody tr:nth-child(' + i +') td:nth-child(13)').text(no_value);
                    $('#phosphrus_table tbody tr:nth-child(' + i +') td:nth-child(14)').text(no_value);
                } else {
                    $('#phosphrus_table tbody tr:nth-child(' + i +') td:nth-child(10)').text(parseInt(tem_v));
                    $('#phosphrus_table tbody tr:nth-child(' + i +') td:nth-child(12)').text(parseInt(parseFloat($('#phosphrus_table tbody tr:nth-child(' + i +') td:nth-child(3)').text()) * 1000 / tem_v));
                    temp_cost = parseFloat(tem_v * parseFloat($('#phosphrus_table tbody tr:nth-child(' + i +') td:nth-child(4)').text().replace('$', '')) / parseFloat($('#phosphrus_table tbody tr:nth-child(' + i +') td:nth-child(3)').text()) / 10);
                    $('#phosphrus_table tbody tr:nth-child(' + i +') td:nth-child(13)').text(temp_cost.toFixed(1));
                    $('#phosphrus_table tbody tr:nth-child(' + i +') td:nth-child(14)').text("$" + parseInt(temp_cost * 30));
                }
            }

            if (parseFloat($('#phosphrus_table tbody tr:nth-child(' + i +') td:nth-child(5)').text()) <= 0) {
                $('#phosphrus_table tbody tr:nth-child(' + i + ') td:nth-child(11)').text(no_protein);
            } else {
                tem_v = 100 * phosphorus_intake / parseFloat($('#phosphrus_table tbody tr:nth-child(' + i +') td:nth-child(6)').text());
                $('#phosphrus_table tbody tr:nth-child(' + i +') td:nth-child(11)').text(parseFloat(tem_v * parseFloat($('#phosphrus_table tbody tr:nth-child(' + i +') td:nth-child(5)').text()) / 100).toFixed(1));
            }
        }
    }
}


function PrintProteinBlocks() {
    // document.title = $('#fc-ration-name').val();
    $.print("#protein_table");
}
function PrintPhosphorusBlocks() {
    // document.title = $('#fc-ration-name').val();
    $.print("#phosphrus_table");
}