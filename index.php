<?php
/**
 * Created by PhpStorm.
 * User: Jacob Davidson
 * Date: 6/12/2020
 * Time: 11:33 AM
 */
include 'connection.php';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>FC12.1_Causeway</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/img/logo.png" type="image/gif" sizes="16x16">
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/jQuery.print.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
</head>
<body class="sky-background">
<div id="main-div">
    <div class="instruction-div">
        <div class="logo-div">
            <p><span style="font-weight: bold; font-size: 32px; font-family: 'Wide Latin';">FEEDCALC</span> version 12.1c</p>
            <p style="font-size: 14px; font-weight: bold;">A Ration Analysis Program</p>
            <p style="font-size: 14px;">R. Cheffins, Bundaberg</p>
        </div>
        <div class="main-menu-div">
            <ul>
                <li><a href="/temp.php" class="menu-btn" style="background-color: red; color: white;">Please Click Here</a></li>
                <li><a href="#mixAnalTable" class="menu-btn">Price</a></li>
                <li><a id="batch_weight_btn" class="menu-btn">Batch Weight</a></li>
                <li><a href="/feeds.php" class="menu-btn">Goto Feeds</a></li>
                <li><a id="printBtn" class="menu-btn">Print Ration</a></li>
                <li><a href="#daily-intake-div" class="menu-btn">Daily Intake</a></li>
                <li><a id="archive_btn" class="menu-btn">Archive</a></li>
                <li><a href="/blocks.php" class="menu-btn">Goto Blocks</a></li>
                <li><a id="help_btn" class="menu-btn">Help</a></li>
            </ul>
        </div>
    </div>
    <div class="full-width">
        <div class="main-table-div general-div">
            <h3>CONCENTRATE MIX</h3>
            <table id="mainTable" class="table table-striped table-bordered table-sm" cellspacing="0"
                   width="100%">
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
                    <th id="start">N°</th>
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
                <tbody>
                <?php
                $concentrate_mix = array(
                    array(70, 130),
                    array(128, 125),
                    array(63, 60),
                    array(136, 60),
                    array(69, 50),
                    array(65, 60),
                    array(110, 10),
                    array(79, 5),
                    array(54, 0),
                    array(90, 0),
                    array(109, 0),
                    array(43, 0),
                    array(76, 0),
                    array(75, 0),
                    array(42, 0),
                    array(60, 0),
                    array(133, 0),
                    array(121, 0),
                    array(62, 0),
                    array(64, 0),
                    array(115, 0)
                );
//                   $data_id = array(10, 128, 63, 136, 69, 65, 110, 79, 54, 90, 109, 43, 76, 75, 42, 60, 133, 121, 62, 64, 115);
//                   $as_is_kg = array(130, 125, 60, 60, 50, 60, 10, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $as_is_kg_total = 0;
                $DM_val = 0;
                foreach ($concentrate_mix as $row) {
                    $as_is_kg_total += $row[1];
                }

                $row_num = 1;
                foreach ($concentrate_mix as $row) {
                    $id_str = "'" . $row[0] . "'";
                    $as_is_kg_str = "'" . $row[1] . "'";
                ?>
                    <tr id="row-<?php echo $row_num; ?>" class="data-row">
                        <td contenteditable='true'><?php echo $row[0]; ?></td>
                        <td contenteditable='true'>
                            <?php
                            $sql = "SELECT Feed FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                            $result = mysqli_fetch_row($conn->query($sql));
                            echo $result[0];
                            ?>
                        </td>
                        <td contenteditable='true'>
                            <?php
                            echo number_format($row[1], 3);
                            ?>
                        </td>
                        <td contenteditable='true'>
                            <?php
                            if ($row[0] == 0) {
                                echo "0";
                            } else {
                                echo number_format($row[1] * 100 / $as_is_kg_total, 1);
                            }
                            ?>
                        </td>
                        <td contenteditable='true'>
                            <?php
                            if ($row[0] == 0) {
                                echo "0";
                            } else {
                                $sql = "SELECT D_M FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                                $result = mysqli_fetch_row($conn->query($sql));
                                echo number_format($row[1] * $result[0] /100, 1);
                                $DM_val = $row[1] * $result[0] /100;
                            }
                            ?>
                        </td>
                        <td contenteditable='true'>
                            <?php
                            if ($row[0] == 0) {
                                echo "0";
                            } else {
                                $sql = "SELECT CPE FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                                $result = mysqli_fetch_row($conn->query($sql));
                                echo number_format($result[0] * $DM_val * 10, 0);
                            }
                            ?>
                        </td>
                        <td contenteditable='true'>
                            <?php
                            if ($row[0] == 0) {
                                echo "0";
                            } else {
                                $sql = "SELECT CPE, Degradability FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                                $result = mysqli_fetch_row($conn->query($sql));
                                echo number_format(($result[0] * $result[1] / 100) * $DM_val * 10, 0);
                            }
                            ?>
                        </td>
                        <td contenteditable='true'>
                            <?php
                            if ($row[0] == 0) {
                                echo "0";
                            } else {
                                $sql = "SELECT CPE, Degradability FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                                $result = mysqli_fetch_row($conn->query($sql));
                                echo number_format(($result[0] * (100 - $result[1]) / 100) * $DM_val * 10, 0);
                            }
                            ?>
                        </td>
                        <td contenteditable='true'>
                            <?php
                            if ($row[0] == 0) {
                                echo "0";
                            } else {
                                $sql = "SELECT ME FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                                $result = mysqli_fetch_row($conn->query($sql));
                                echo number_format($result[0] * $DM_val, 0);
                            }
                            ?>
                        </td>
                        <td contenteditable='true'>
                            <?php
                            if ($row[0] == 0) {
                                echo "0";
                            } else {
                                $sql = "SELECT NEm FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                                $result = mysqli_fetch_row($conn->query($sql));
                                echo number_format($result[0] * $DM_val, 0);
                            }
                            ?>
                        </td>
                        <td contenteditable='true'>
                            <?php
                            if ($row[0] == 0) {
                                echo "0";
                            } else {
                                $sql = "SELECT NEg FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                                $result = mysqli_fetch_row($conn->query($sql));
                                echo number_format($result[0] * $DM_val, 0);
                            }
                            ?>
                        </td>
                        <td contenteditable='true'>
                        <?php
                        if ($row[0] == 0) {
                            echo "0";
                        } else {
                            $sql = "SELECT Ca FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                            $result = mysqli_fetch_row($conn->query($sql));
                            echo number_format($result[0] * $DM_val * 10, 0);
                        }
                        ?>
                        </td>
                        <td contenteditable='true'>
                        <?php
                        if ($row[0] == 0) {
                            echo "0";
                        } else {
                            $sql = "SELECT P FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                            $result = mysqli_fetch_row($conn->query($sql));
                            echo number_format($result[0] * $DM_val * 10, 0);
                        }
                        ?>
                        </td>
                        <td contenteditable='true'>
                        <?php
                        if ($row[0] == 0) {
                            echo "0";
                        } else {
                            $sql = "SELECT N FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                            $result = mysqli_fetch_row($conn->query($sql));
                            echo number_format($result[0] * $DM_val * 10, 0);
                        }
                        ?>
                        </td>
                        <td contenteditable='true'>
                        <?php
                        if ($row[0] == 0) {
                            echo "0";
                        } else {
                            $sql = "SELECT S FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                            $result = mysqli_fetch_row($conn->query($sql));
                            echo number_format($result[0] * $DM_val * 10, 0);
                        }
                        ?>
                        </td>
                        <td contenteditable='true'>
                        <?php
                        if ($row[0] == 0) {
                            echo "0";
                        } else {
                            $sql = "SELECT K FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                            $result = mysqli_fetch_row($conn->query($sql));
                            echo number_format($result[0] * $DM_val * 10, 0);
                        }
                        ?>
                        </td>
                        <td contenteditable='true'>
                        <?php
                        if ($row[0] == 0) {
                            echo "0";
                        } else {
                            $sql = "SELECT Na FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                            $result = mysqli_fetch_row($conn->query($sql));
                            echo number_format($result[0] * $DM_val * 10, 0);
                        }
                        ?>
                        </td>
                        <td contenteditable='true'>
                        <?php
                        if ($row[0] == 0) {
                            echo "0";
                        } else {
                            $sql = "SELECT Mg FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                            $result = mysqli_fetch_row($conn->query($sql));
                            echo number_format($result[0] * $DM_val * 10, 0);
                        }
                        ?>
                        </td>
                        <td contenteditable='true'>
                        <?php
                        if ($row[0] == 0) {
                            echo "0";
                        } else {
                            $sql = "SELECT Cl FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                            $result = mysqli_fetch_row($conn->query($sql));
                            echo number_format($result[0] * $DM_val * 10, 0);
                        }
                        ?>
                        </td>
                        <td contenteditable='true'>
                        <?php
                        if ($row[0] == 0) {
                            echo "0";
                        } else {
                            $sql = "SELECT Fe FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                            $result = mysqli_fetch_row($conn->query($sql));
                            echo number_format($result[0] * $DM_val * 10, 0);
                        }
                        ?>
                        </td>
                        <td contenteditable='true'>
                            <?php
                            if ($row[0] == 0) {
                                echo "0";
                            } else {
                                $sql = "SELECT Cu FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                                $result = mysqli_fetch_row($conn->query($sql));
                                echo number_format($result[0] * $DM_val, 0);
                            }
                            ?>
                        </td>
                        <td contenteditable='true'>
                            <?php
                            if ($row[0] == 0) {
                                echo "0";
                            } else {
                                $sql = "SELECT Co FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                                $result = mysqli_fetch_row($conn->query($sql));
                                echo number_format($result[0] * $DM_val, 0);
                            }
                            ?>
                        </td>
                        <td contenteditable='true'>
                            <?php
                            if ($row[0] == 0) {
                                echo "0";
                            } else {
                                $sql = "SELECT Se FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                                $result = mysqli_fetch_row($conn->query($sql));
                                echo number_format($result[0] * $DM_val, 0);
                            }
                            ?>
                        </td>
                        <td contenteditable='true'>
                            <?php
                            if ($row[0] == 0) {
                                echo "0";
                            } else {
                                $sql = "SELECT I FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                                $result = mysqli_fetch_row($conn->query($sql));
                                echo number_format($result[0] * $DM_val, 0);
                            }
                            ?>
                        </td>
                        <td contenteditable='true'>
                            <?php
                            if ($row[0] == 0) {
                                echo "0";
                            } else {
                                $sql = "SELECT Zn FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                                $result = mysqli_fetch_row($conn->query($sql));
                                echo number_format($result[0] * $DM_val, 0);
                            }
                            ?>
                        </td>
                        <td contenteditable='true'>
                            <?php
                            if ($row[0] == 0) {
                                echo "0";
                            } else {
                                $sql = "SELECT Mn FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                                $result = mysqli_fetch_row($conn->query($sql));
                                echo number_format($result[0] * $DM_val, 0);
                            }
                            ?>
                        </td>
                        <td contenteditable='true'>
                            <?php
                            if ($row[0] == 0) {
                                echo "0";
                            } else {
                                $sql = "SELECT VitA FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                                $result = mysqli_fetch_row($conn->query($sql));
                                echo number_format(1000 * $result[0] * $DM_val, 0);
                            }
                            ?>
                        </td>
                        <td contenteditable='true'>
                            <?php
                            if ($row[0] == 0) {
                                echo "0";
                            } else {
                                $sql = "SELECT VitB1 FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                                $result = mysqli_fetch_row($conn->query($sql));
                                echo number_format($result[0] * $DM_val, 0);
                            }
                            ?>
                        </td>
                        <td contenteditable='true'>
                            <?php
                            if ($row[0] == 0) {
                                echo "0";
                            } else {
                                $sql = "SELECT VitB6 FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                                $result = mysqli_fetch_row($conn->query($sql));
                                echo number_format($result[0] * $DM_val, 0);
                            }
                            ?>
                        </td>
                        <td contenteditable='true'>
                            <?php
                            if ($row[0] == 0) {
                                echo "0";
                            } else {
                                $sql = "SELECT VitD FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                                $result = mysqli_fetch_row($conn->query($sql));
                                echo number_format($result[0] * $DM_val, 0);
                            }
                            ?>
                        </td>
                        <td contenteditable='true'>
                            <?php
                            if ($row[0] == 0) {
                                echo "0";
                            } else {
                                $sql = "SELECT VitE FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                                $result = mysqli_fetch_row($conn->query($sql));
                                echo number_format($result[0] * $DM_val, 0);
                            }
                            ?>
                        </td>
                        <td contenteditable='true'>
                            <?php
                            if ($row[0] == 0) {
                                echo "0";
                            } else {
                                $sql = "SELECT CFibre FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                                $result = mysqli_fetch_row($conn->query($sql));
                                echo number_format($result[0] * $DM_val * 10, 0);
                            }
                            ?>
                        </td>
                        <td contenteditable='true'>
                            <?php
                            if ($row[0] == 0) {
                                echo "0";
                            } else {
                                $sql = "SELECT ADF FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                                $result = mysqli_fetch_row($conn->query($sql));
                                echo number_format($result[0] * $DM_val * 10, 0);
                            }
                            ?>
                        </td>
                        <td contenteditable='true'>
                            <?php
                            if ($row[0] == 0) {
                                echo "0";
                            } else {
                                $sql = "SELECT NDF FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                                $result = mysqli_fetch_row($conn->query($sql));
                                echo number_format($result[0] * $DM_val * 10, 0);
                            }
                            ?>
                        </td>
                        <td contenteditable='true'>
                            <?php
                            if ($row[0] == 0) {
                                echo "0";
                            } else {
                                $sql = "SELECT Fat FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                                $result = mysqli_fetch_row($conn->query($sql));
                                echo number_format($result[0] * $DM_val * 10, 0);
                            }
                            ?>
                        </td>
                        <td contenteditable='true'>
                            <?php
                            if ($row[0] == 0) {
                                echo "0";
                            } else {
                                $sql = "SELECT Urea FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                                $result = mysqli_fetch_row($conn->query($sql));
                                echo number_format($result[0] * $DM_val * 10, 0);
                            }
                            ?>
                        </td>
                        <td contenteditable='true'>
                            <?php
                            if ($row[0] == 0) {
                                echo "0";
                            } else {
                                $sql = "SELECT Salt FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                                $result = mysqli_fetch_row($conn->query($sql));
                                echo number_format($result[0] * $DM_val * 10, 0);
                            }
                            ?>
                        </td>
                        <td contenteditable='true'>
                            <?php
                            if ($row[0] == 0) {
                                echo "0";
                            } else {
                                $sql = "SELECT Avoparcin FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                                $result = mysqli_fetch_row($conn->query($sql));
                                echo number_format($result[0] * $DM_val, 0);
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($row[0] == 0) {
                                echo "0";
                            } else {
                                $sql = "SELECT Lasalocid FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                                $result = mysqli_fetch_row($conn->query($sql));
                                echo number_format($result[0] * $DM_val, 0);
                            }
                            ?>
                        </td>
                        <td contenteditable='true'>
                            <?php
                            if ($row[0] == 0) {
                                echo "0";
                            } else {
                                $sql = "SELECT Monensin FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                                $result = mysqli_fetch_row($conn->query($sql));
                                echo number_format($result[0] * $DM_val, 0);
                            }
                            ?>
                        </td>
                        <td contenteditable='true'>
                            <?php
                            if ($row[0] == 0) {
                                echo "0";
                            } else {
                                $sql = "SELECT Other FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                                $result = mysqli_fetch_row($conn->query($sql));
                                echo number_format($result[0] * $DM_val, 0);
                            }
                            ?>
                        </td>
                        <td contenteditable='true'>
                            <?php
                            if ($row[0] == 0) {
                                echo "0";
                            } else {
                                $sql = "SELECT Price FROM feed_db WHERE mat_ID='" . $row[0] . "'";
                                $result = mysqli_fetch_row($conn->query($sql));
                                echo number_format($row[1] * $result[0] / 1000, 2);
                            }
                            ?>
                        </td>
                    </tr>
                <?php
                    $row_num += 1;
                }
                ?>
                <tr id="main-total-row" class="gray-row">
                    <td colspan="2">TOTALS</td>
                    <td style="color: #000;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="red_row">
                    <th rowspan="2" colspan="2" class="white-cell"></th>
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
                <tr class="red_row">
                    <th colspan="3">MIX</th>
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
                <tr class="gray-row anal-row-matter">
                    <td colspan="4">Analysis on a Dry Matter basis:</td>
                    <td style="color: #000;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Dry Matter basis (calculated)</td>
                </tr>
                <tr class="gray-row anal-row-as">
                    <td colspan="4">Analysis on an "As Is" basis:</td>
                    <td style="color: #000;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>"As Is" basis (calculated)</td>
                </tr>
                <tr class="red_row">
                    <td colspan="5" style="text-align: right">%</td>
                    <td style="color: black;">%</td>
                    <td>%</td>
                    <td>%</td>
                    <td>%</td>
                    <td>MJ/kg</td>
                    <td>MJ/kg</td>
                    <td>MJ/kg</td>
                    <td>%</td>
                    <td>%</td>
                    <td>%</td>
                    <td>%</td>
                    <td>gm/kg</td>
                    <td>gm/kg</td>
                    <td>gm/kg</td>
                    <td>gm/kg</td>
                    <td>gm/kg</td>
                    <td>mg/kg</td>
                    <td>mg/kg</td>
                    <td>mg/kg</td>
                    <td>mg/kg</td>
                    <td>mg/kg</td>
                    <td>mg/kg</td>
                    <td>IU/kg</td>
                    <td>mg/kg</td>
                    <td>mg/kg</td>
                    <td>mg/kg</td>
                    <td>mg/kg</td>
                    <td>%</td>
                    <td>%</td>
                    <td>%</td>
                    <td>%</td>
                    <td>%</td>
                    <td>%</td>
                    <td>mg/kg</td>
                    <td>mg/kg</td>
                    <td>mg/kg</td>
                    <td>mg/kg</td>
                    <td>$/tonne</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="full-width" style="background-color: #CCFFFF;">
        <div class="general-div">
            <div class="instruction-div">
                <div class="logo-div">
                    <h3>CONCENTRATE MIX ANALYSIS ON A DRY MATTER BASIS</h3>
                </div>
                <div class="main-menu-div">
                    <ul>
                        <li><a href="" class="menu-btn">Notes to be added to the print-out</a></li>
                        <li><a href="#mainTable" class="menu-btn">Goto Ration Mix</a></li>
                        <li><a href="#daily-intake-div" class="menu-btn">Goto Daily Intake</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <table id="mixAnalTable">
                        <tr>
                            <td>Crude Protein Equiv.</td>
                            <td></td>
                            <td>Ca:P ratio : </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>RDP</td>
                            <td></td>
                            <td>N:S :</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>By pass Protein</td>
                            <td></td>
                            <td>Urea equivalent :</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Met Energy</td>
                            <td></td>
                            <td>Dry matter :</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Calcium</td>
                            <td></td>
                            <td>Phosphorus</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Acid detergent Fibre</td>
                            <td></td>
                            <td>Neutral Detergent Fibre</td>
                            <td></td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-6">
                    <table id="mixAnalTotalTable">
                        <tr>
                            <td>Calculated cost:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Retail Price:</td>
                            <td>$<input id="retail-price" type="text" value="892.25"> excluding GST</td>
                        </tr>
                        <tr style="background-color: #0000FF; color: white;">
                            <td>Mark up:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>GST will be:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Total Retail Price:</td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <div class="full-width" style="background-color: #CCFFCC;">
        <div class="general-div">
            <div class="row">
                <div class="col-sm-6">
                    <div class="main-menu-div">
                        <ul style="display: flex; justify-content: center;">
                            <li><a href="#mainTable" class="menu-btn">Goto Ration Mix</a></li>
                            <li><a href="#daily-intake-div" class="menu-btn">Goto Daily Intake</a></li>
                            <li><a id="ration_help_btn" class="menu-btn">HELP</a></li>

                        </ul>
                    </div>
                    <table id="totalRatioTable">
                        <tr class="red_row">
                            <td colspan="2">TOTAL RATION</td>
                            <td>Enter<br>ratio</td>
                            <td>DM<br>ratio</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="background-color: red;">Concentrate Mix</td>
                            <td style="background-color: #00FF00;">100</td>
                            <td style="background-color: #FFCC00;">100%</td>
                        </tr>
                        <tr class="data-row">
                            <td>0</td>
                            <td></td>
                            <td>0</td>
                            <td>0%</td>
                        </tr>
                        <tr class="data-row">
                            <td>0</td>
                            <td></td>
                            <td>0</td>
                            <td>0%</td>
                        </tr>
                        <tr class="data-row">
                            <td>0</td>
                            <td></td>
                            <td>0</td>
                            <td>0%</td>
                        </tr>
                        <tr class="data-row">
                            <td>0</td>
                            <td></td>
                            <td>0</td>
                            <td>0%</td>
                        </tr>
                        <tr class="data-row">
                            <td>0</td>
                            <td></td>
                            <td>0</td>
                            <td>0%</td>
                        </tr>
                        <tr class="data-row">
                            <td>0</td>
                            <td></td>
                            <td>0</td>
                            <td>0%</td>
                        </tr>
                        <tr class="data-row">
                            <td>0</td>
                            <td></td>
                            <td>0</td>
                            <td>0%</td>
                        </tr>
                        <tr class="data-row">
                            <td>0</td>
                            <td></td>
                            <td>0</td>
                            <td>0%</td>
                        </tr>
                        <tr class="data-row">
                            <td>0</td>
                            <td></td>
                            <td>0</td>
                            <td>0%</td>
                        </tr>
                        <tr class="red_row">
                            <td colspan="2">TOTALS</td>
                            <td>100</td>
                            <td>100%</td>
                        </tr>
                    </table>
                    <p id="cap_ratio"></p>
                    <p id="ns_ratio"></p>
                </div>
                <div class="col-sm-6">
                    <div style="background-color: #FFFF99; border: solid red 1px; max-width: 250px; text-align: center; padding: 5px 10px; margin: auto;">
                        Use this table to nominate the proportions of
                        other feeds, on an "as is" basis, to be fed
                        with the concentrate mix.  If just the
                        concentrate mix is to be fed, only enter a figure
                        (any figure) in the "Concentrate Mix" row.
                    </div>
                    <table id="mixAnalRatioTable">
                        <tr>
                            <td colspan="3" style="text-align: center;">Total Ration Analysis on an "as is"
                            <td>&</td>
                            <td colspan="2">on a DM basis</td>
                        </tr>
                        <tr class="data-row">
                            <td>Dry matter:</td>
                            <td></td>
                            <td>%</td>
                            <td>………</td>
                            <td></td>
                            <td>%</td>
                        </tr>
                        <tr class="data-row">
                            <td>ME:</td>
                            <td></td>
                            <td>MJ/kg</td>
                            <td>………</td>
                            <td></td>
                            <td>MJ/kg</td>
                        </tr>
                        <tr class="data-row">
                            <td>Nem:</td>
                            <td></td>
                            <td>MJ/kg</td>
                            <td>………</td>
                            <td></td>
                            <td>MJ/kg</td>
                        </tr>
                        <tr class="data-row">
                            <td>Neg:</td>
                            <td></td>
                            <td>MJ/kg</td>
                            <td>………</td>
                            <td></td>
                            <td>MJ/kg</td>
                        </tr>
                        <tr class="data-row">
                            <td>CPE:</td>
                            <td></td>
                            <td>%</td>
                            <td>………</td>
                            <td></td>
                            <td>%</td>
                        </tr>
                        <tr class="data-row">
                            <td>RDP:</td>
                            <td></td>
                            <td>%</td>
                            <td>………</td>
                            <td></td>
                            <td>%</td>
                        </tr>
                        <tr class="data-row">
                            <td>UDP:</td>
                            <td></td>
                            <td>%</td>
                            <td>………</td>
                            <td></td>
                            <td>%</td>
                        </tr>
                        <tr class="data-row">
                            <td>ADF:</td>
                            <td></td>
                            <td>%</td>
                            <td>………</td>
                            <td></td>
                            <td>%</td>
                        </tr>
                        <tr>
                            <td>NDF:</td>
                            <td></td>
                            <td>%</td>
                            <td>………</td>
                            <td></td>
                            <td>%</td>
                        </tr>
                        <tr class="data-row">
                            <td>Ca:</td>
                            <td></td>
                            <td>%</td>
                            <td>………</td>
                            <td></td>
                            <td>%</td>
                        </tr>
                        <tr>
                            <td>P:</td>
                            <td></td>
                            <td>%</td>
                            <td>………</td>
                            <td></td>
                            <td>%</td>
                        </tr>
                        <tr class="data-row">
                            <td>Urea equivalent:</td>
                            <td></td>
                            <td>%</td>
                            <td>………</td>
                            <td></td>
                            <td>%</td>
                        </tr>
                        <tr>
                            <td>Calculated Cost:</td>
                            <td></td>
                            <td colspan="2">$/tonne</td>
                            <td></td>
                            <td style="text-align: left;">%</td>
                        </tr>
                        <tr class="data-row">
                            <td>Retail Cost:</td>
                            <td></td>
                            <td colspan="4">$/tonne excluding GST</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="daily-intake-div" class="full-width">
        <div class="general-div">
            <div class="row">
                <div class="col-sm-6">
                    <p style="font-weight: bold; text-align: center;"><span style="color: red;">Enter daily "as is" supplement intake:</span><input id="daily-as-is-intake" type="text" value="175">grams per head</p>
                </div>
                <div class="col-sm-6"></div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <table id="last-table-one">
                        <tr>
                            <td>Daily dry matter intake:</td>
                            <td></td>
                            <td>grams</td>
                        </tr>
                        <tr>
                            <td>Total crude protein:</td>
                            <td></td>
                            <td>grams</td>
                        </tr>
                        <tr>
                            <td>Rumen degradable protein:</td>
                            <td></td>
                            <td>grams</td>
                        </tr>
                        <tr>
                            <td>By-pass protein:</td>
                            <td></td>
                            <td>grams</td>
                        </tr>
                        <tr>
                            <td>ADPLS:</td>
                            <td></td>
                            <td>grams</td>
                        </tr>
                        <tr>
                            <td>Met Energy (ME):</td>
                            <td></td>
                            <td>megajoules</td>
                        </tr>
                        <tr>
                            <td>ADF:</td>
                            <td></td>
                            <td>grams</td>
                        </tr>
                        <tr>
                            <td>NDF:</td>
                            <td></td>
                            <td>grams</td>
                        </tr>
                        <tr>
                            <td>Calcium:</td>
                            <td></td>
                            <td>grams</td>
                        </tr>
                        <tr>
                            <td>Phosphorus:</td>
                            <td></td>
                            <td>grams</td>
                        </tr>
                        <tr>
                            <td>Urea equivalent:</td>
                            <td></td>
                            <td>grams</td>
                        </tr>
                        <tr>
                            <td>Fat:</td>
                            <td></td>
                            <td>grams</td>
                        </tr>
                        <tr>
                            <td>Salt:</td>
                            <td></td>
                            <td>grams</td>
                        </tr>
                        <tr>
                            <td>Avoparcin:</td>
                            <td></td>
                            <td>milligrams</td>
                        </tr>
                        <tr>
                            <td>Lasalocid:</td>
                            <td></td>
                            <td>milligrams</td>
                        </tr>
                        <tr>
                            <td>Monensin:</td>
                            <td></td>
                            <td>milligrams</td>
                        </tr>
                        <tr>
                            <td>Cost/head/day:</td>
                            <td></td>
                            <td>cents</td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-6">
                    <table id="last-table-two">
                        <tr>
                            <td>S:</td>
                            <td></td>
                            <td>grams</td>
                        </tr>
                        <tr>
                            <td>K:</td>
                            <td></td>
                            <td>grams</td>
                        </tr>
                        <tr>
                            <td>Na:</td>
                            <td></td>
                            <td>grams</td>
                        </tr>
                        <tr>
                            <td>Mg:</td>
                            <td></td>
                            <td>grams</td>
                        </tr>
                        <tr>
                            <td>Cl:</td>
                            <td></td>
                            <td>grams</td>
                        </tr>
                        <tr>
                            <td>Fe:</td>
                            <td></td>
                            <td>grams</td>
                        </tr>
                        <tr>
                            <td>Cu:</td>
                            <td></td>
                            <td>milligrams</td>
                        </tr>
                        <tr>
                            <td>Co:</td>
                            <td></td>
                            <td>milligrams</td>
                        </tr>
                        <tr>
                            <td>Se:</td>
                            <td></td>
                            <td>milligrams</td>
                        </tr>
                        <tr>
                            <td>I:</td>
                            <td></td>
                            <td>milligrams</td>
                        </tr>
                        <tr>
                            <td>Zn:</td>
                            <td></td>
                            <td>milligrams</td>
                        </tr>
                        <tr>
                            <td>Mn:</td>
                            <td></td>
                            <td>milligrams</td>
                        </tr>
                        <tr>
                            <td>Vit A:</td>
                            <td></td>
                            <td>IU</td>
                        </tr>
                        <tr>
                            <td>Vit B1:</td>
                            <td></td>
                            <td>milligrams</td>
                        </tr>
                        <tr>
                            <td>Vit B6:</td>
                            <td></td>
                            <td>milligrams</td>
                        </tr>
                        <tr>
                            <td>Vit D:</td>
                            <td></td>
                            <td>milligrams</td>
                        </tr>
                        <tr>
                            <td>Vit E:</td>
                            <td></td>
                            <td>milligrams</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row footer-div">
                <div class="col-sm-4" style="background-color: #00CCFF; border: solid black 1px;">
                    <table>
                        <tr>
                            <td style="text-align: left;">Ration formulated by:</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">Causeway Producce Agency</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">Townsville</td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-4" style="background-color: #00CCFF; border: solid black 1px;">
                    <table id="footer-table">
                        <tr>
                            <td>Cost/kg CPE: </td>
                            <td>199.0 cents</td>
                        </tr>
                        <tr>
                            <td>Cost/MJ Energy: </td>
                            <td>105.0 cents</td>
                        </tr>
                        <tr>
                            <td>Cost/kg Phosphorus: </td>
                            <td>$10.72</td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-4" style="background-color: #00CCFF; border: solid black 1px;">
                    <table>
                        <tr>
                            <td id="current-day"></td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <td id="current-time"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <p style="font-weight: bold; text-align: right; width: 100%; font-size: 11px;">Feedcalc Ver: 12.1c - Roger Cheffins, Bundaberg.</p>
            </div>
        </div>
    </div>
    <div id="contact-info-div" class="full-width">
        <div style="max-width: 480px; margin: auto;">
            <p>Phone:</p>
            <input id="fc-phone" type="text" value="PH: 07 4729 0666" style="width: 100%;border: darkorange; max-width: none; margin: auto auto 10px; background-color: white;">
            <p>Address:</p>
            <input id="fc-address" type="text" value="1-3 Doyle Crt, Stuart, Q 4811" style="width: 100%;border: darkorange; max-width: none; margin: auto auto 10px; background-color: white;">
            <p>Postal Address:</p>
            <input id="fc-postal-address" type="text" value="PO Box 2562 Idalia, Q 4811" style="width: 100%;border: darkorange; max-width: none; margin: auto auto 10px; background-color: white;">
            <p>Fax:</p>
            <input id="fc-fax" type="text" value="FAX: 07 4729 0777" style="width: 100%;border: darkorange; max-width: none; margin: auto auto 10px; background-color: white;">
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="start-modal" role="dialog">
    <div id="modal-yellow-div" style="max-width: 300px;">
        <p>Feedcalc will not run without macros.<br>If this page remains after clicking<br>the "Understood" button below,<br>you have disabled the macros.</p>
        <p style="color: red;">Close Excel down and start again!</p>
    </div>
    <div id="modal-blue-div">
        <p style="color: white;">Caution!!  Feedcalc has been checked for accuracy,<br> but errors might still exist.</p>
        <p style="color: red;">It is the users responsibility to enter the<br>correct prices and feed analyses!</p>
        <p style="color: yellow;">As a result, use it at your own risk!</p>
    </div>
    <div class="start-btn-div">
        <input type="button" onclick="StartUnderstoodFun()" value="Understood!" class="start_btn" style="color: #00FF00;">
        <input type="button" onclick="StartExitFun()" value="EXIT" class="start_btn" style="color: red; font-style: italic;">
    </div>
</div>
<!--Help Modal-->
<div class="modal fade" id="main-help-modal" role="dialog">
    <div class="modal-box">
        <p style="margin-left: 10px; margin-bottom: 0; line-height: 2;">Selecting Feedstuffs</p>
        <div style="background-color: #8080FF; padding: 10px;">
            <div style="background-color: #FFFF80; padding: 20px 5px; text-align: center; font-weight: bold">
                <p>Up to 21 feedstuffs can be selected at any one time.  Select a feed by typing its ID number in the first column of the "Feedcalc" table.  Entering a zero, "0", will produce a blank space in the table.</p>
                <p>NB: Entering a zero in the ID column will delete the feed from the table but not the amount of the feed in the green column - this should be done manually.  As a safeguard the program will ignore any weights in the green column if their ID is "0".</p>
                <p>If you need reminding of the ID numbers, press the "Select ID Numbers" button at the top of the page.</p>
                <p>If you find any errors, or would like to suggest improvements please contact me at:</p>
                <p>roger @ cheffins.net</p>
            </div>
            <div style="margin-top: 20px; text-align: center;">
                <input type="button" onclick="CloseMainHelpModal()" value="OK" style="background-color: #80FF80; font-size: 18px; font-weight: bold; width: 200px;">
            </div>
        </div>
    </div>
</div>
<!--Help Ration Modal-->
<div class="modal fade" id="main-ration-help-modal" role="dialog">
    <div class="modal-box">
        <p style="margin-left: 10px; margin-bottom: 0; line-height: 2;">Changing Feeds in the Total Ration Table</p>
        <div style="background-color: #8080FF; padding: 10px;">
            <div style="background-color: #FFFF80; padding: 20px 5px; text-align: center; font-weight: bold">
                <p>The "Total Ration Table" has been deactivated.</p>
            </div>
            <div style="margin-top: 20px; text-align: center;">
                <input type="button" onclick="CloseMainRationHelpModal()" value="OK" style="background-color: #80FF80; font-size: 18px; font-weight: bold; width: 200px;">
            </div>
        </div>
    </div>
</div>
<!--Batch Weight Modal-->
<div class="modal fade" id="main-batch-weight-modal" role="dialog">
    <div class="modal-box">
        <p style="margin-left: 10px; margin-bottom: 0; line-height: 2;">Batch Weight</p>
        <div style="background-color: #F0F0F0; padding: 10px;">
            <div style="display: flex;">
                <div>
                    <p>Please enter the required batch weight in kilograms.  The program will change the weights of ingredients so the total weight of the mix equals this weight.</p>
                </div>
                <div>
                    <input type="button" onclick="BatchWeight()" value="OK" style="background-color: #E6E6E6; font-weight: bold; width: 90px; border: solid 1px; margin-bottom: 10px;">
                    <input type="button" onclick="CloseBatchModal()" value="Cancel" style="background-color: #E6E6E6; font-weight: bold; width: 90px; border: solid 1px;">
                </div>
            </div>
            <div style="margin-top: 20px; text-align: center;">
                <input type="text" id="batch_weight_val">
            </div>
        </div>
    </div>
</div>
<!--Archive Modal-->
<div class="modal fade" id="main-archive-modal" role="dialog">
    <div class="modal-box">
        <p style="margin-left: 10px; margin-bottom: 0; line-height: 2;">ARCHIVE</p>
        <div class="archive-tab-menu">
            <button class="active" onclick="ArchiveArchiveActive()">Archive</button>
            <button onclick="ArchiveDeleteActive()">Delete</button>
            <button onclick="ArchiveRecallActive()">Recall</button>
        </div>
        <div id="archive-archive" class="archive-tab-content active">
            <div>
                <div style="display: flex; justify-content: space-around;">
                    <input type="button" onclick="BatchWeight()" value="Archive Ration" style="background-color: #80FF80; font-weight: bold; padding: 10px; border: solid 1px;">
                    <input type="button" onclick="CloseBatchModal()" value="CANCEL" style="background-color: #FFC080; font-weight: bold; padding: 10px; border: solid 1px;">
                </div>
                <div>
                    <input type="text" style="width: 250px;border: darkorange; margin: auto; margin-top: 20px;max-width: none; display: flex; text-align: center; background-color: #C0FFFF;" value="Number of archived rations: 9">
                </div>
                <div>
                    <textarea style="resize: none; color: #0000FF; width: 250px; display: flex; margin: auto; margin-top: 20px; text-align: center;">Click the button to archive the ration. Maximum archives - 30</textarea>
                </div>
            </div>
        </div>
        <div id="archive-delete" class="archive-tab-content">
            <div>
                <div style="display: flex; justify-content: space-around;">
                    <input type="button" onclick="BatchWeight()" value="Delete Archived Ration" style="background-color: #80FF80; font-weight: bold; padding: 10px; border: solid 1px;">
                    <input type="button" onclick="CloseBatchModal()" value="CANCEL" style="background-color: #FFC080; font-weight: bold; padding: 10px; border: solid 1px;">
                </div>
                <div>
                    <textarea style="resize: none; color: #0000FF; width: 250px; display: flex; margin: auto; margin-top: 20px; text-align: center;">Select ration to delete from dropdown box below.</textarea>
                </div>
                <div>
                    <input type="text" style="width: 250px;border: darkorange; margin: auto; margin-top: 20px;max-width: none; display: flex; text-align: center; background-color: #C0FFFF;" value="Season High Phosphorus Mix">
                </div>
            </div>
        </div>
        <div id="archive-recall" class="archive-tab-content">
            <div>
                <div style="display: flex; justify-content: space-around;">
                    <input type="button" onclick="BatchWeight()" value="Archive Ration" style="background-color: #80FF80; font-weight: bold; padding: 10px; border: solid 1px;">
                    <input type="button" onclick="CloseBatchModal()" value="CANCEL" style="background-color: #FFC080; font-weight: bold; padding: 10px; border: solid 1px;">
                </div>
                <div>
                    <textarea style="resize: none; color: #0000FF; width: 250px; display: flex; margin: auto; margin-top: 20px; text-align: center;">Select ration to recall from the dropdown box below.</textarea>
                </div>
                <div>
                    <input type="text" style="width: 250px;border: darkorange; margin: auto; margin-top: 20px;max-width: none; display: flex; text-align: center; background-color: #C0FFFF;" value="Number of archived rations: 9">
                </div>
            </div>
        </div>
    </div>
</div>
<!--FC Print Modal-->
<div class="modal fade" id="main-fc-print-modal" role="dialog">
    <div class="modal-box">
        <p style="margin-left: 10px; margin-bottom: 0; line-height: 2;">Printout details</p>
        <div id="fc-pritnout-modal">
            <div style="display: flex; align-items: center;">
                <div style="width: 50%;">
                    <p>Invoice Number:</p>
                    <input id="fc-invoice-number" type="text" style="width: 90%;border: darkorange; max-width: none; margin: auto auto 10px; background-color: white;">
                    <p>Tonnes:</p>
                    <input id="fc-tonnes" type="text" style="width: 90%;border: darkorange; max-width: none; margin: auto auto 10px; background-color: white;">
                    <p>Enter Ration Name:</p>
                    <input id="fc-ration-name" type="text" style="width: 90%;border: darkorange; max-width: none; margin: auto auto 10px; background-color: white;">
                    <div style="display: flex; align-items: center;">
                        <p style="margin-right: 25px;">Print Notes</p>
                        <input type="checkbox">
                    </div>
                </div>
                <div style="width: 50%;">
                    <div style="width: 90%; margin: auto; padding: 10px; background-color: #FFFF80; padding: 5px; text-align: center; color: black;">
                        <p>Enter invoice number and weight.</p>
                        <p>Toggle Notes Button.</p>
                    </div>
                    <button onclick="PrintFeedCalc()" style="width: 100px; margin: 15px auto auto; display: block; border: solid 1px gray;">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="fc-print-div">
    <p style="font-family: 'Rockwell Extra Bold'; font-weight: bolder; background-color: #CCFFCC; color: #339966; font-size: 24px; padding: 0 10px; margin: auto; width: 100%; border: solid 2px;">CAUSEWAY  PRODUCE  AGENCY</p>
    <div style="display: flex; justify-content: space-between;">
        <p id="print-fc-address"></p>
        <p id="print-fc-postal-address"></p>
        <p id="print-fc-phone"></p>
        <p id="print-fc-fax"></p>
    </div>
    <p style="font-size: 12px; margin-left: 10px; margin-top: 10px; text-align: left;">Ration Name:</p>
    <div id="print-fc-main-tb">
        <table>
            <thead>
                <tr>
                    <th rowspan="2">Feed</th>
                    <th colspan="2">RATION</th>
                    <th>CPE</th>
                    <th>UDP</th>
                    <th>ME</th>
                    <th>Ca</th>
                    <th>P</th>
                    <th>N</th>
                    <th>S</th>
                </tr>
                <tr>
                    <th>kg</th>
                    <th>%</th>
                    <th>gm</th>
                    <th>gm</th>
                    <th>MJ</th>
                    <th>gm</th>
                    <th>gm</th>
                    <th>gm</th>
                    <th>gm</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <div style="display: flex; justify-content: space-between; margin-top: 10px; margin-bottom: 10px;">
        <p id="print-fc-dry-matter"></p>
        <p id="print-fc-urea-equiv"></p>
        <p id="print-fc-ca-p-ratio"></p>
        <p id="print-fc-n-s-ratio"></p>
    </div>
    <p style="text-align: right;">The concentrate dry matter also includes:</p>
    <div id="fc-print-mix-anal" style="display: flex;">
        <div style="width: 50%;">
            <table style="width: 100%;">
                <tr>
                    <td>MINIMUM DAILY INTAKE: </td>
                    <td id="fc-print-min-daily-intake"></td>
                    <td>gm/head/day</td>
                </tr>
                <tr>
                    <td>Dry matter intake: </td>
                    <td id="fc-print-dry-matter-intake"></td>
                    <td>gm/head/day</td>
                </tr>
                <tr>
                    <td>Met Energy (ME): </td>
                    <td id="fc-print-me"></td>
                    <td>gm/head/day</td>
                </tr>
                <tr>
                    <td>CP + CPE: </td>
                    <td id="fc-print-cp-cpe"></td>
                    <td>gm/head/day</td>
                </tr>
                <tr>
                    <td>RDP: </td>
                    <td id="fc-print-rdp"></td>
                    <td>gm/head/day</td>
                </tr>
                <tr>
                    <td>By-pass protein (UDP): </td>
                    <td id="fc-print-udp"></td>
                    <td>gm/head/day</td>
                </tr>
                <tr>
                    <td>Calcium: </td>
                    <td id="fc-print-cal"></td>
                    <td>gm/head/day</td>
                </tr>
                <tr>
                    <td>Phosphorus: </td>
                    <td id="fc-print-phosp"></td>
                    <td>gm/head/day</td>
                </tr>
                <tr>
                    <td>Sulphur: </td>
                    <td id="fc-print-sulphur"></td>
                    <td>gm/head/day</td>
                </tr>
                <tr>
                    <td>Fat: </td>
                    <td id="fc-print-fat-1"></td>
                    <td>gm/head/day</td>
                </tr>
                <tr>
                    <td>Salt: </td>
                    <td id="fc-print-salt-1"></td>
                    <td>gm/head/day</td>
                </tr>
                <tr>
                    <td>Urea equivalent: </td>
                    <td id="fc-print-urea-equ-1"></td>
                    <td>gm/head/day</td>
                </tr>
                <tr>
                    <td>Cost/head/day: </td>
                    <td id="fc-print-cost-head-day"></td>
                    <td>cents</td>
                </tr>
            </table>
        </div>
        <div style="width: 50%;">
            <table style="width: 100%;">
                <tr></tr>
                <tr>
                    <td>Fat:</td>
                    <td id="fc-print-fat"></td>
                    <td>%</td>
                </tr>
                <tr>
                    <td>Salt:</td>
                    <td id="fc-print-salt"></td>
                    <td>%</td>
                </tr>
                <tr>
                    <td>Cobalt:</td>
                    <td id="fc-print-cobalt"></td>
                    <td>mg/kg</td>
                </tr>
                <tr>
                    <td>Copper:</td>
                    <td id="fc-print-copper"></td>
                    <td>mg/kg</td>
                </tr>
                <tr>
                    <td>Lodine:</td>
                    <td id="fc-print-iodine"></td>
                    <td>mg/kg</td>
                </tr>
                <tr>
                    <td>Iron:</td>
                    <td id="fc-print-iron"></td>
                    <td>mg/kg</td>
                </tr>
                <tr>
                    <td>Selenium:</td>
                    <td id="fc-print-selenium"></td>
                    <td>mg/kg</td>
                </tr>
                <tr>
                    <td>Zinc:</td>
                    <td id="fc-print-zinc"></td>
                    <td>mg/kg</td>
                </tr>
                <tr>
                    <td>Vitamin A:</td>
                    <td id="fc-print-vit-a"></td>
                    <td>mg/kg</td>
                </tr>
                <tr>
                    <td>Vitamin D:</td>
                    <td id="fc-print-vit-d"></td>
                    <td>mg/kg</td>
                </tr>
                <tr>
                    <td>Vitamin E:</td>
                    <td id="fc-print-vit-e">1</td>
                    <td>mg/kg</td>
                </tr>
                <tr>
                    <td>Rumen Modifier (Monensin):</td>
                    <td id="fc-print-rm"></td>
                    <td>mg/kg</td>
                </tr>
            </table>
        </div>
    </div>
    <div style="display: flex; align-items: flex-end;">
        <div style="width: 50%; border-style: double;">
            <p id="fc-print-day" style="text-align: center; font-family: 'Comic Sans MS'; font-size: 12px;"></p>
            <p id="fc-print-price" style="text-align: center; font-size: 14px;"></p>
        </div>
        <div style="width: 20%; border-style: double;">
            <p style="font-size: 14px; color: red; text-align: center;">excluding GST</p>
        </div>
        <div style="width: 30%; border-style: double;">
            <p id="fc-print-cost-cpe"></p>
            <p id="fc-print-cost-p"></p>
            <p id="fc-print-cost-energy"></p>
        </div>
    </div>
    <div style="width: 100%; border: solid 2px;">
        <p style="font-weight: normal; text-align: center;"><span style="font-size: 12px; font-weight: bold;">CAUTION</span> - This  CUSTOM  LICK  contains  urea  which  is  poisonous  if  consumed  in  excessive  amounts.</p>
        <p style="font-weight: normal; text-align: center;">Mixtures should be kept dry.      <<<>>>      Ensure a plentiful supply of roughage is available.</p>
        <p style="font-weight: normal; text-align: center;">Use caution when feeding to starving stock.      <<<>>>      This Custom Lick is suitable for cattle only.</p>
    </div>
    <div style="width: 100%; border: solid 2px;">
        <div style="width: 100%; display: flex; justify-content: space-around;">
            <p style="font-weight: normal;">CPE = Crude Protein Equivalent</p>
            <p style="font-weight: normal;">RDP = Rumen Degradable Protein</p>
        </div>
        <div style="width: 100%; display: flex; justify-content: space-around;">
            <p style="font-weight: normal;">ME = Metabolizable Energy</p>
            <p style="font-weight: normal;">P = Phosphorus</p>
            <p style="font-weight: normal;">Ca = Calcium</p>
            <p style="font-weight: normal;">S = Sulphur</p>
        </div>
    </div>
    <div style="display: flex; justify-content: space-around;">
        <p id="fc-print-invoice-num" style="font-size: 12px;"></p>
        <p id="fc-print-tonnes" style="font-size: 12px;"></p>
    </div>
    <p style="font-size: 6px; text-align: right;">Feedcalc Ver: 12.1c - Roger Cheffins, Bundaberg.</p>
</div>
<script src="assets/js/main.js"></script>
<script src="assets/js/arrow-table.js"></script>
</body>
</html>