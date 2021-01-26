<?php
/**
 * Created by PhpStorm.
 * User: SilverStar
 * Date: 6/20/2020
 * Time: 11:03 PM
 */
include 'connection.php';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT mat_ID, Feed, D_M, CPE, ME, NEm, NEg, Ca, P, N, S, K, Na, Mg, Cl, Fe, Cu, Co, Se, I, Zn, Mn, VitA, VitB1, VitB6, VitD, VitE, CFibre, ADF, NDF, Fat, Urea, Salt, Avoparcin, Lasalocid, Monensin, Other, Price, Degradability  FROM feed_db ORDER BY mat_ID";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>FC12.1_Causewa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/img/logo.png" type="image/gif" sizes="16x16">
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/jQuery.print.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/feeds_db.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
</head>
<body>
<div id="feeds-db-div">
    <div class="full-width" style="background-color: #00CCFF">
        <div class="instruction-div">
            <div class="logo-div" style="text-align: center;">
                <p><span style="font-weight: bold; font-size: 32px; font-family: 'Wide Latin'; color: red;">FEEDCALC</span> version 12.1c</p>
                <div style="display: flex; justify-content: space-evenly;">
                    <p style="font-size: 14px;">A Ration Analysis Program</p>
                    <p style="font-size: 14px;">R. Cheffins, Bundaberg</p>
                </div>
                <p style="color: #0000FF; font-weight: bold; letter-spacing: 3px;">FEEDSTUFFS  ANALYSIS TABLE(<span style="color: red; font-weight: bold;">a dry matter basis</span>)</p>
            </div>
            <div class="main-menu-div">
                <ul>
                    <li><a id="feeds_db_edit_btn" style="cursor: pointer;">EDIT</a></li>
                    <li><a id="feeds_db_help_btn" class="menu-btn">HELP</a></li>
                    <li><a onclick="PrintFeedsDataBase()" class="menu-btn">Print Feeds DataBase</a></li>
                    <li><a href="/index.php" class="menu-btn">GoTo</a></li>
                    <li><a href="/blocks.php" class="menu-btn">Goto Blocks</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="full-width" style="background-color: #00CCFF;">
        <div class="main-table-div general-div">
            <table id="feeds_db_table" class="table table-striped table-bordered table-sm" cellspacing="0"
                   width="100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th rowspan="2">FEEDS</th>
                    <th>D/M</th>
                    <th>CPE</th>
                    <th colspan="2">Protein %</th>
                    <th>ME</th>
                    <th>NEm</th>
                    <th>NEg</th>
                    <th>Ca</th>
                    <th>P</th>
                    <th>N</th>
                    <th>S</th>
                    <th>K</th>
                    <th>Na</th>
                    <th>Mg</th>
                    <th>Cl</th>
                    <th>Fe</th>
                    <th>Cu</th>
                    <th>Co</th>
                    <th>Se</th>
                    <th>I</th>
                    <th>Zn</th>
                    <th>Mn</th>
                    <th>VitA</th>
                    <th>VitB1</th>
                    <th>VitB6</th>
                    <th>VitD</th>
                    <th>VitE</th>
                    <th>CFibre</th>
                    <th>ADF</th>
                    <th>NDF</th>
                    <th>Fat</th>
                    <th>Urea</th>
                    <th>Salt</th>
                    <th>Avoparcin</th>
                    <th>Lasalocid</th>
                    <th>Monensin</th>
                    <th>Other</th>
                    <th>Price</th>
                    <th>Protein</th>
                    <th>Energy</th>
                    <th>Phosphorus</th>
                    <th rowspan="2">Feed</th>
                    <th>Degradability</th>
                </tr>
                <tr>
                    <th>N°</th>
                    <th>%</th>
                    <th>%</th>
                    <th>RDP</th>
                    <th>UDP</th>
                    <th>MJ/kg</th>
                    <th>MJ/kg</th>
                    <th>MJ/kg</th>
                    <th>%</th>
                    <th>%</th>
                    <th>%</th>
                    <th>%</th>
                    <th>g/kg</th>
                    <th>g/kg</th>
                    <th>g/kg</th>
                    <th>g/kg</th>
                    <th>g/kg</th>
                    <th>mg/kg</th>
                    <th>mg/kg</th>
                    <th>mg/kg</th>
                    <th>mg/kg</th>
                    <th>mg/kg</th>
                    <th>mg/kg</th>
                    <th>IU/g</th>
                    <th>mg/kg</th>
                    <th>mg/kg</th>
                    <th>mg/kg</th>
                    <th>mg/kg</th>
                    <th>%</th>
                    <th>%</th>
                    <th>%</th>
                    <th>%</th>
                    <th>%</th>
                    <th>%</th>
                    <th>mg/kg</th>
                    <th>mg/kg</th>
                    <th>mg/kg</th>
                    <th>mg/kg</th>
                    <th>$/t</th>
                    <th>c/kg</th>
                    <th>c/MJ</th>
                    <th>$/kg</th>
                    <th>factor</th>
                </tr>
                </thead>
                <tbody>

                <?php
                    $mat_id = 0;
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $row_tem_str = "";
                            $mat_id = $row["mat_ID"];
                            if ($row["mat_ID"] == 4 || $row["mat_ID"] == 15 || $row["mat_ID"] == 22 || $row["mat_ID"] == 41 || $row["mat_ID"] == 59 || $row["mat_ID"] == 73 || $row["mat_ID"] == 91 || $row["mat_ID"] == 100 || $row["mat_ID"] == 139) {
                                $row_tem_str .= "<tr class=\"feed-db-row blue-highlight-row\">";
                                $row_tem_str .= "<td>" . $row["mat_ID"] . "</td>";
                                $row_tem_str .= "<td style=\"text-align: left; color: white; background-color: #0000FF; font-style: italic;\">" . $row["Feed"] . "</td>";
                                for ($x = 0; $x <= 43; $x++) {
                                    $row_tem_str .= "<td style='background-color: #0000FF'></td>";
                                }
                                $row_tem_str = $row_tem_str . "</tr>";
                            } else {
                                $row_tem_str .= "<tr id=\"mat-" . $row["mat_ID"] . "\" class=\"feed-db-row\" data-id=\"" . $row["mat_ID"] . "\">";
                                $row_tem_str .= "<td data-target='mat_ID'>" . $row["mat_ID"] . "</td>";
                                $row_tem_str .= "<td data-target='Feed'>" . $row["Feed"] . "</td>";
                                $row_tem_str .= "<td data-target='D_M'>" . $row["D_M"] . "</td>";
                                $row_tem_str .= "<td data-target='CPE'>" . $row["CPE"] . "</td>";
                                $row_tem_str .= "<td data-target='Protein_RDP'>" . $row["CPE"] * $row["Degradability"] / 100 . "</td>";
                                $row_tem_str .= "<td data-target='Protein_UDP'>" . $row["CPE"] * (100 - $row["Degradability"]) / 100 . "</td>";
                                $row_tem_str .= "<td data-target='ME'>" . $row["ME"] . "</td>";
                                $row_tem_str .= "<td data-target='NEm'>" . $row["NEm"] . "</td>";
                                $row_tem_str .= "<td data-target='NEg'>" . $row["NEg"] . "</td>";
                                $row_tem_str .= "<td data-target='Ca'>" . $row["Ca"] . "</td>";
                                $row_tem_str .= "<td data-target='P'>" . $row["P"] . "</td>";
                                $row_tem_str .= "<td data-target='N'>" . $row["N"] . "</td>";
                                $row_tem_str .= "<td data-target='S'>" . $row["S"] . "</td>";
                                $row_tem_str .= "<td data-target='K'>" . $row["K"] . "</td>";
                                $row_tem_str .= "<td data-target='Na'>" . $row["Na"] . "</td>";
                                $row_tem_str .= "<td data-target='Mg'>" . $row["Mg"] . "</td>";
                                $row_tem_str .= "<td data-target='Cl'>" . $row["Cl"] . "</td>";
                                $row_tem_str .= "<td data-target='Fe'>" . $row["Fe"] . "</td>";
                                $row_tem_str .= "<td data-target='Cu'>" . $row["Cu"] . "</td>";
                                $row_tem_str .= "<td data-target='Co'>" . $row["Co"] . "</td>";
                                $row_tem_str .= "<td data-target='Se'>" . $row["Se"] . "</td>";
                                $row_tem_str .= "<td data-target='I'>" . $row["I"] . "</td>";
                                $row_tem_str .= "<td data-target='Zn'>" . $row["Zn"] . "</td>";
                                $row_tem_str .= "<td data-target='Mn'>" . $row["Mn"] . "</td>";
                                $row_tem_str .= "<td data-target='VitA'>" . $row["VitA"] . "</td>";
                                $row_tem_str .= "<td data-target='VitB1'>" . $row["VitB1"] . "</td>";
                                $row_tem_str .= "<td data-target='VitB6'>" . $row["VitB6"] . "</td>";
                                $row_tem_str .= "<td data-target='VitE'>" . $row["VitE"] . "</td>";
                                $row_tem_str .= "<td data-target='VitD'>" . $row["VitD"] . "</td>";
                                $row_tem_str .= "<td data-target='CFibre'>" . $row["CFibre"] . "</td>";
                                $row_tem_str .= "<td data-target='ADF'>" . $row["ADF"] . "</td>";
                                $row_tem_str .= "<td data-target='NDF'>" . $row["NDF"] . "</td>";
                                $row_tem_str .= "<td data-target='Fat'>" . $row["Fat"] . "</td>";
                                $row_tem_str .= "<td data-target='Urea'>" . $row["Urea"] . "</td>";
                                $row_tem_str .= "<td data-target='Salt'>" . $row["Salt"] . "</td>";
                                $row_tem_str .= "<td data-target='Avoparcin'>" . $row["Avoparcin"] . "</td>";
                                $row_tem_str .= "<td data-target='Lasalocid'>" . $row["Lasalocid"] . "</td>";
                                $row_tem_str .= "<td data-target='Monensin'>" . $row["Monensin"] . "</td>";
                                $row_tem_str .= "<td data-target='Other'>" . $row["Other"] . "</td>";
                                $row_tem_str .= "<td data-target='Price'>" . $row["Price"] . "</td>";
                                if ($row["Price"] <= 0) {
                                    $row_tem_str .= "<td>No Price</td>";
                                } else {
                                    if ($row["CPE"] < 5) {
                                        $row_tem_str .= "<td>No Price</td>";
                                    } else {
                                        $row_tem_str .= "<td>" . number_format($row["Price"] * 10 / $row["CPE"], 1) . "</td>";
                                    }
                                }
                                if ($row["Price"] <= 0) {
                                    $row_tem_str .= "<td>No Price</td>";
                                } else {
                                    if ($row["ME"] < 1) {
                                        $row_tem_str .= "<td>No Price</td>";
                                    } else {
                                        $row_tem_str .= "<td>" . number_format($row["Price"] * 0.1 / $row["ME"], 1) . "</td>";
                                    }
                                }
                                if ($row["Price"] <= 0) {
                                    $row_tem_str .= "<td>No Price</td>";
                                } else {
                                    if ($row["P"] <= 1) {
                                        $row_tem_str .= "<td>No Price</td>";
                                    } else {
                                        $row_tem_str .= "<td>$" . number_format($row["Price"] * 0.1 / $row["P"], 2) . "</td>";
                                    }
                                }
                                $row_tem_str .= "<td>" . $row["Feed"] . "</td>";
                                $row_tem_str .= "<td data-target='Degradability'>" . $row["Degradability"] . "</td>";
                                $row_tem_str = $row_tem_str . "</tr>";
                            }
                            echo $row_tem_str;
                        }
                    } else {
                        echo "0 results";
                    }

                    $x = 1;

                    while($x <= 5) {
                        $row_tem_str = "";
                        $row_tem_str .= "<tr id=\"mat-" . ($mat_id + 1) . "\" class=\"feed-db-row\" data-id=\"" . ($mat_id + 1) . "\">";
                        $row_tem_str .= "<td data-target='mat_ID'></td>";
                        $row_tem_str .= "<td data-target='Feed'></td>";
                        $row_tem_str .= "<td data-target='D_M'></td>";
                        $row_tem_str .= "<td data-target='CPE'></td>";
                        $row_tem_str .= "<td data-target='Protein_RDP'></td>";
                        $row_tem_str .= "<td data-target='Protein_UDP'></td>";
                        $row_tem_str .= "<td data-target='ME'></td>";
                        $row_tem_str .= "<td data-target='NEm'></td>";
                        $row_tem_str .= "<td data-target='NEg'></td>";
                        $row_tem_str .= "<td data-target='Ca'></td>";
                        $row_tem_str .= "<td data-target='P'></td>";
                        $row_tem_str .= "<td data-target='N'></td>";
                        $row_tem_str .= "<td data-target='S'></td>";
                        $row_tem_str .= "<td data-target='K'></td>";
                        $row_tem_str .= "<td data-target='Na'></td>";
                        $row_tem_str .= "<td data-target='Mg'></td>";
                        $row_tem_str .= "<td data-target='Cl'></td>";
                        $row_tem_str .= "<td data-target='Fe'></td>";
                        $row_tem_str .= "<td data-target='Cu'></td>";
                        $row_tem_str .= "<td data-target='Co'></td>";
                        $row_tem_str .= "<td data-target='Se'></td>";
                        $row_tem_str .= "<td data-target='I'></td>";
                        $row_tem_str .= "<td data-target='Zn'></td>";
                        $row_tem_str .= "<td data-target='Mn'></td>";
                        $row_tem_str .= "<td data-target='VitA'></td>";
                        $row_tem_str .= "<td data-target='VitB1'></td>";
                        $row_tem_str .= "<td data-target='VitB6'></td>";
                        $row_tem_str .= "<td data-target='VitE'></td>";
                        $row_tem_str .= "<td data-target='VitD'></td>";
                        $row_tem_str .= "<td data-target='CFibre'></td>";
                        $row_tem_str .= "<td data-target='ADF'></td>";
                        $row_tem_str .= "<td data-target='NDF'></td>";
                        $row_tem_str .= "<td data-target='Fat'></td>";
                        $row_tem_str .= "<td data-target='Urea'></td>";
                        $row_tem_str .= "<td data-target='Salt'></td>";
                        $row_tem_str .= "<td data-target='Avoparcin'></td>";
                        $row_tem_str .= "<td data-target='Lasalocid'></td>";
                        $row_tem_str .= "<td data-target='Monensin'></td>";
                        $row_tem_str .= "<td data-target='Other'></td>";
                        $row_tem_str .= "<td data-target='Price'></td>";
                        echo $row_tem_str;
                        $x++;
                    }
                ?>

                </tbody>
                <thead>
                <tr>
                    <th>ID</th>
                    <th rowspan="2">FEEDS</th>
                    <th colspan="3">RATION</th>
                    <th>CPE gm</th>
                    <th colspan="2">Protein</th>
                    <th>ME</th>
                    <th>NEm</th>
                    <th>NEg</th>
                    <th>Ca</th>
                    <th>P</th>
                    <th>N</th>
                    <th>S</th>
                    <th>K</th>
                    <th>Na</th>
                    <th>Mg</th>
                    <th>Cl</th>
                    <th>Fe</th>
                    <th>Cu</th>
                    <th>Co</th>
                    <th>Se</th>
                    <th>I</th>
                    <th>Zn</th>
                    <th>Mn</th>
                    <th>VitA</th>
                    <th>VitB1</th>
                    <th>VitB6</th>
                    <th>VitD</th>
                    <th>VitE</th>
                    <th>CFibre</th>
                    <th>ADF</th>
                    <th>NDF</th>
                    <th>Fat</th>
                    <th>Urea</th>
                    <th>Salt</th>
                    <th>Avoparcin</th>
                    <th>Lasalocid</th>
                    <th>Monensin</th>
                    <th>Other</th>
                    <th>Price</th>
                </tr>
                <tr>
                    <th>N°</th>
                    <th>As Is kg</th>
                    <th>%</th>
                    <th>DM (kg)</th>
                    <th>gm</th>
                    <th>RDP</th>
                    <th>UDP</th>
                    <th>MJ</th>
                    <th>MJ</th>
                    <th>MJ</th>
                    <th>gm</th>
                    <th>gm</th>
                    <th>gm</th>
                    <th>gm</th>
                    <th>gm</th>
                    <th>gm</th>
                    <th>gm</th>
                    <th>gm</th>
                    <th>gm</th>
                    <th>mg</th>
                    <th>mg</th>
                    <th>mg</th>
                    <th>mg</th>
                    <th>mg</th>
                    <th>mg</th>
                    <th>IU</th>
                    <th>mg</th>
                    <th>mg</th>
                    <th>mg</th>
                    <th>mg</th>
                    <th>gm</th>
                    <th>gm</th>
                    <th>gm</th>
                    <th>gm</th>
                    <th>gm</th>
                    <th>gm</th>
                    <th>mg</th>
                    <th>mg</th>
                    <th>mg</th>
                    <th>mg</th>
                    <th>$</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="full-width" style="background-color: #33CCCC;">
        <div class="general-div">
            <div class="row">
                <div class="feed-db-notes-div">
                    <p style="color: black;">Notes</p>
                    <p>Molasses - kg/litre = <span style="color: black;">1.35</span> <span style="color: red;">= 6.13 kg/gallon</span> <span style="color: black;"> <<<<  change the kg/litre value if required
</span></p>
                    <p>Salt = 40%Na + 60%Cl</p>
                    <p>Palm Kernal Meal - Usully eat no more than 1 - 2 kg/day</p>
                    <p>CSM - Maximum 0.1% free gossypol.  Free gossypol in diet: 100ppm - to 3wks; 200ppm - 3 to 24wks; and up to 600ppm at >24wks.</p>
                    <p>Whole cottonseed: 0.72%w/w gossypol.  Feed up to 20% WCS in total ration.////</p>
                    <p>Feed iron & calcium salts with gossypol to reduce toxicity & anaemia.</p>
                    <p>1mg tocopherol = 1IU VitE</p>
                    <p>1 mg carotene = 1667 IU Vit A = 400 IU (24% of rat value)</p>
                    <p>Bluestone = 25.5% Cu</p>
                    <p>0.025 mg cholecalciferol = 1 IU vit D3.  40 IU D3 = 1mg cholecalciferol.</p>
                    <p>Vit D requirements of beef cattle = 275 IU/kg diet DM.</p>
                    <p>Dolomite (CaMg)CO3</p>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="feed-db-help-modal" role="dialog">
    <div class="modal-box">
        <p style="margin-left: 10px; margin-bottom: 0; line-height: 2;">FEEDS DATABASE</p>
        <div style="background-color: #8080FF; padding: 10px;">
            <div style="background-color: #FFFF80; padding: 20px 5px; text-align: center; font-weight: bold">
                <p>Entering the correct feed analyses for your situation is YOUR responsibility!</p>
                <p>The analyses that have been used in the Feeds Database are generally bballpark averages, but could be the figures from just one sample.</p>
                <p> For easier editing and updating the database, use the "EDIT" button.</p>
                <p>The database's first 3 entry points may be used for new feedstuffs, as can points 101 - 138. Alternatively, use any spare row or overwrite any of the unused existing feeds.</p>
                <p>The "Protein Degradability" factors can be found in the last column (far right) of the Feeds Database.  These are used to calculate RDP and UDP from Crude Protein.  To go to the "Protein Degradability" column, hit the button below.</p>
            </div>
            <div style="margin-top: 20px; text-align: center;">
                <input type="button" onclick="CloseFeedHelpModal()" value="EXIT" style="background-color: #80FF80; font-size: 18px; font-weight: bold; width: 200px;">
            </div>
        </div>
    </div>
</div>
<script src="assets/js/main.js"></script>
<script src="assets/js/feeds_db.js"></script>
<script src="assets/js/arrow-table.js"></script>
</body>
</html>
<?php
$conn->close();
?>