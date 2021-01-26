<?php
/**
 * Created by Jacob Davidson
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
        <link rel="stylesheet" href="assets/css/blocks.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.dataTables.min.js"></script>
    </head>
    <body>
    <div id="feeds-db-div">
        <div class="full-width" style="padding-bottom: 0;">
            <div class="instruction-div">
                <div class="logo-div" style="text-align: center;">
                    <p><span style="font-weight: bold; font-size: 32px; font-family: 'Wide Latin'; color: red;">FEEDCALC</span> version 12.1c</p>
                    <div style="text-align: right;">
                        <p style="font-size: 30px; font-weight: bold;">PROTEIN BLOCKS & MIXES</p>
                        <p style="font-size: 14px;"><strong>Last price update: <strong> January 2000</strong></p>
                    </div>
                </div>
                <div class="main-menu-div">
                    <ul>
                        <li><a id="blocks_db_help_btn" class="menu-btn">HELP</a></li>
                        <li><a onclick="PrintProteinBlocks()" class="menu-btn">Print Protein Blocks</a></li>
                        <li><a id="feeds_db_edit_btn" style="cursor: pointer; display: none;">Insert/Delete Rows</a></li>
                        <li><a href="#phosphrus_table" class="menu-btn">GoTo Phosphorus Blocks & Mixes</a></li>
                        <li><a href="/feeds.php" class="menu-btn">Goto Feeds</a></li>
                        <li><a href="/index.php" class="menu-btn">Goto FeedCalc</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="full-width">
            <div class="main-table-div general-div">
                <div class="blue-color">
                    <label for="protein-intake">Insert required protein intake here: </label>
                    <input type="number" id="protein-intake" value="150" class="blue-color" style="width: 75px; text-align: center;"><span> gm/head/day</span>
                </div>
                <table id="protein_table" class="table table-striped table-bordered table-sm blue-color" cellspacing="0"
                       width="100%">
                    <thead class="white-background blue-border bold" style="border: solid;">
                    <tr>
                        <th rowspan="2">PRODUCT</th>
                        <th rowspan="2">Block or Mix</th>
                        <th>PACK</th>
                        <th>PACK</th>
                        <th>CPE</th>
                        <th>P</th>
                        <th>Ca</th>
                        <th>SALT</th>
                        <th>UREA</th>
                        <th>BLOCK INTAKE</th>
                        <th>P INTAKE</th>
                        <th>BEAST DAYS</th>
                        <th>COST/h/d</th>
                        <th>COST</th>
                    </tr>
                    <tr>
                        <th>SIZE</th>
                        <th>COST</th>
                        <th>%</th>
                        <th>%</th>
                        <th>%</th>
                        <th>%</th>
                        <th>%</th>
                        <th>gm/day</th>
                        <th>gm/day</th>
                        <th>per/block</th>
                        <th>cents</th>
                        <th>100hd/mth</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="bold">AGRICON PRODUCTS</td>
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
                    <tr>
                        <td>Driol*</td>
                        <td>B</td>
                        <td>20</td>
                        <td>$13.75</td>
                        <td>34.0</td>
                        <td>1.8</td>
                        <td>2.4</td>
                        <td>4.0</td>
                        <td>10.5</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Phos'N'Pro*</td>
                        <td>B</td>
                        <td>20</td>
                        <td>$18.80</td>
                        <td>49.0</td>
                        <td>5.5</td>
                        <td>8.0</td>
                        <td>2.0</td>
                        <td>15.5</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Optivite Cowmix5 #</td>
                        <td>M</td>
                        <td>40</td>
                        <td>$26.20</td>
                        <td>30.0</td>
                        <td>5.0</td>
                        <td>11.0</td>
                        <td>5.0</td>
                        <td>5.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Optivite Cowmix10 #</td>
                        <td>M</td>
                        <td>40</td>
                        <td>$27.60</td>
                        <td>44.4</td>
                        <td>5.0</td>
                        <td>10.5</td>
                        <td>3.8</td>
                        <td>10.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Optigro*</td>
                        <td>B</td>
                        <td>20</td>
                        <td>$15.75</td>
                        <td>33.6</td>
                        <td>2.5</td>
                        <td>4.0</td>
                        <td>5.0</td>
                        <td>9.5</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Optimate*</td>
                        <td>B</td>
                        <td>25</td>
                        <td>$22.75</td>
                        <td>33.5</td>
                        <td>6.0</td>
                        <td>8.5</td>
                        <td>10.0</td>
                        <td>11.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Optipro 90</td>
                        <td>B</td>
                        <td>20</td>
                        <td>$18.30</td>
                        <td>90.0</td>
                        <td>3.5</td>
                        <td>5.4</td>
                        <td>1.0</td>
                        <td>30.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="bold">BAYER</td>
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
                    <tr>
                        <td>Golden Pro CSM 50</td>
                        <td>B</td>
                        <td>16</td>
                        <td>$15.00</td>
                        <td>41.6</td>
                        <td>0.5</td>
                        <td>1.0</td>
                        <td>18.0</td>
                        <td>10.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Golden Pro 70-P</td>
                        <td>B</td>
                        <td>15</td>
                        <td>$15.00</td>
                        <td>49.3</td>
                        <td>1.1</td>
                        <td>0.4</td>
                        <td>15.0</td>
                        <td>14.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Nitro-Phos</td>
                        <td>B</td>
                        <td>18</td>
                        <td>$15.75</td>
                        <td>54.5</td>
                        <td>2.8</td>
                        <td>4.5</td>
                        <td>30.0</td>
                        <td>18.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Topromol</td>
                        <td>B</td>
                        <td>20</td>
                        <td>$15.50</td>
                        <td>35.5</td>
                        <td>1.8</td>
                        <td>2.5</td>
                        <td>1.0</td>
                        <td>10.5</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="bold">FOUR SEASON</td>
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
                    <tr>
                        <td>Droughtbuster 10</td>
                        <td>B</td>
                        <td>30</td>
                        <td>$13.64</td>
                        <td>28.0</td>
                        <td>1.0</td>
                        <td>8.0</td>
                        <td>75.0</td>
                        <td>10.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Droughtbuster 20</td>
                        <td>B</td>
                        <td>20</td>
                        <td>$15.15</td>
                        <td>56.0</td>
                        <td>1.0</td>
                        <td>8.0</td>
                        <td>65.0</td>
                        <td>20.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Droughtbuster 30</td>
                        <td>B</td>
                        <td>20</td>
                        <td>$16.65</td>
                        <td>84.0</td>
                        <td>1.0</td>
                        <td>8.0</td>
                        <td>55.0</td>
                        <td>30.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Bypass 65 *#</td>
                        <td>B</td>
                        <td>20</td>
                        <td>$16.00</td>
                        <td>39.0</td>
                        <td>1.0</td>
                        <td>3.0</td>
                        <td>25.0</td>
                        <td>9.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="bold">LNT</td>
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
                    <tr>
                        <td>Boost (Ultrapro) #</td>
                        <td>B</td>
                        <td>100</td>
                        <td>$95.00</td>
                        <td>31.5</td>
                        <td>0.6</td>
                        <td>0.8</td>
                        <td>3.0</td>
                        <td>7.1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Phosrite *</td>
                        <td>B</td>
                        <td>40</td>
                        <td>$35.70</td>
                        <td>47.0</td>
                        <td>5.2</td>
                        <td>10.0</td>
                        <td>4.0</td>
                        <td>15.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Secure 10% Urea *#</td>
                        <td>B</td>
                        <td>40</td>
                        <td>$30.85</td>
                        <td>31.6</td>
                        <td>1.5</td>
                        <td>9.0</td>
                        <td>5.0</td>
                        <td>10.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Turbo-Pro #</td>
                        <td>M</td>
                        <td>25</td>
                        <td>$14.50</td>
                        <td>40.0</td>
                        <td>0.6</td>
                        <td>0.7</td>
                        <td>5.0</td>
                        <td>7.2</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Uramol*</td>
                        <td>B</td>
                        <td>20</td>
                        <td>$16.50</td>
                        <td>86.0</td>
                        <td>3.7</td>
                        <td>7.5</td>
                        <td>32.0</td>
                        <td>30.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="bold">OLSSON</td>
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
                    <tr>
                        <td>Calcium molasses + 10% urea #</td>
                        <td>B</td>
                        <td>20</td>
                        <td>$11.80</td>
                        <td>32.1</td>
                        <td>1.2</td>
                        <td>6.5</td>
                        <td>53.0</td>
                        <td>10.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Cob & Co + 10% urea</td>
                        <td>B</td>
                        <td>20</td>
                        <td>$13.15</td>
                        <td>28.7</td>
                        <td>0.4</td>
                        <td>11.2</td>
                        <td>57.0</td>
                        <td>10.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Megaphos + 10% urea *</td>
                        <td>B</td>
                        <td>40</td>
                        <td>$41.10</td>
                        <td>28.0</td>
                        <td>6.0</td>
                        <td>8.5</td>
                        <td>2.5</td>
                        <td>10.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Minarea #</td>
                        <td>B</td>
                        <td>20</td>
                        <td>$13.80</td>
                        <td>12.6</td>
                        <td>4.2</td>
                        <td>9.2</td>
                        <td>43.0</td>
                        <td>3.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Peak 50 *</td>
                        <td>B</td>
                        <td>30</td>
                        <td>$28.90</td>
                        <td>41.0</td>
                        <td>4.0</td>
                        <td>4.2</td>
                        <td>12.0</td>
                        <td>7.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Qld Dry Season 10%*</td>
                        <td>B</td>
                        <td>40</td>
                        <td>$37.75</td>
                        <td>30.1</td>
                        <td>1.8</td>
                        <td>3.5</td>
                        <td>9.0</td>
                        <td>10.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Qld Dry Season 20%*</td>
                        <td>B</td>
                        <td>40</td>
                        <td>$41.10</td>
                        <td>59.8</td>
                        <td>1.8</td>
                        <td>3.5</td>
                        <td>9.0</td>
                        <td>20.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Qld Uraphos #</td>
                        <td>B</td>
                        <td>20</td>
                        <td>$13.25</td>
                        <td>47.0</td>
                        <td>1.8</td>
                        <td>3.6</td>
                        <td>43.0</td>
                        <td>15.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>NT Uraphos #</td>
                        <td>B</td>
                        <td>18</td>
                        <td>$14.70</td>
                        <td>90.5</td>
                        <td>1.8</td>
                        <td>3.6</td>
                        <td>29.0</td>
                        <td>30.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Sulfos #</td>
                        <td>B</td>
                        <td>20</td>
                        <td>$14.35</td>
                        <td>25.8</td>
                        <td>4.4</td>
                        <td>9.5</td>
                        <td>36.0</td>
                        <td>8.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>U15</td>
                        <td>B</td>
                        <td>20</td>
                        <td>$12.35</td>
                        <td>47.2</td>
                        <td>0.0</td>
                        <td>0.0</td>
                        <td>66.0</td>
                        <td>15.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>U30</td>
                        <td>B</td>
                        <td>20</td>
                        <td>$13.85</td>
                        <td>90.2</td>
                        <td>0.0</td>
                        <td>0.0</td>
                        <td>51.0</td>
                        <td>30.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Weanermaster *#</td>
                        <td>B</td>
                        <td>40</td>
                        <td>$45.30</td>
                        <td>32.5</td>
                        <td>3.0</td>
                        <td>7.0</td>
                        <td>6.0</td>
                        <td>10.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="bold">PRIMAC</td>
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
                    <tr>
                        <td>Hi-Phos 5*</td>
                        <td>B</td>
                        <td>25</td>
                        <td>$21.00</td>
                        <td>42.0</td>
                        <td>5.2</td>
                        <td>15.0</td>
                        <td>4.0</td>
                        <td>15.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Hi-Phos 8*</td>
                        <td>B</td>
                        <td>25</td>
                        <td>$24.00</td>
                        <td>40.0</td>
                        <td>8.2</td>
                        <td>18.0</td>
                        <td>4.0</td>
                        <td>15.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Pro Bloc 86*</td>
                        <td>B</td>
                        <td>20</td>
                        <td>$17.00</td>
                        <td>86.0</td>
                        <td>2.0</td>
                        <td>4.6</td>
                        <td>32.0</td>
                        <td>30.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Primix 8P-30</td>
                        <td>M</td>
                        <td>40</td>
                        <td>$29.00</td>
                        <td>29.0</td>
                        <td>8.0</td>
                        <td>11.0</td>
                        <td>15.0</td>
                        <td>8.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Primix 6P-60</td>
                        <td>M</td>
                        <td>40</td>
                        <td>$26.00</td>
                        <td>40.0</td>
                        <td>6.0</td>
                        <td>11.0</td>
                        <td>15.0</td>
                        <td>15.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Primix 3P-80</td>
                        <td>M</td>
                        <td>40</td>
                        <td>$23.90</td>
                        <td>91.1</td>
                        <td>3.0</td>
                        <td>11.0</td>
                        <td>15.0</td>
                        <td>28.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Primix 4.5P-90</td>
                        <td>M</td>
                        <td>40</td>
                        <td>$25.50</td>
                        <td>95.2</td>
                        <td>4.5</td>
                        <td>6.5</td>
                        <td>24.0</td>
                        <td>30.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="bold">RIDLEY AGRI PRODUCTS</td>
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
                    <tr>
                        <td>Rumevite Cattle Block - blue</td>
                        <td>B</td>
                        <td>18</td>
                        <td>$13.60</td>
                        <td>30.0</td>
                        <td>4.0</td>
                        <td>8.0</td>
                        <td>25.0</td>
                        <td>8.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Rumevite Dry Feed Block - green</td>
                        <td>B</td>
                        <td>18</td>
                        <td>$12.85</td>
                        <td>30.0</td>
                        <td>1.0</td>
                        <td>10.0</td>
                        <td>20.0</td>
                        <td>7.8</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Fosforlic 30%</td>
                        <td>B</td>
                        <td>18</td>
                        <td>$10.55</td>
                        <td>30.0</td>
                        <td>3.2</td>
                        <td>7.3</td>
                        <td>57.2</td>
                        <td>10.4</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Fosforlic 86%</td>
                        <td>B</td>
                        <td>18</td>
                        <td>$12.35</td>
                        <td>86.0</td>
                        <td>2.4</td>
                        <td>5.0</td>
                        <td>46.0</td>
                        <td>30.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Maxi Wean</td>
                        <td>B</td>
                        <td>100</td>
                        <td>$86.40</td>
                        <td>30.0</td>
                        <td>2.5</td>
                        <td>4.0</td>
                        <td>10.0</td>
                        <td>8.6</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Maxi Breed</td>
                        <td>B</td>
                        <td>100</td>
                        <td>$84.00</td>
                        <td>30.0</td>
                        <td>5.0</td>
                        <td>6.2</td>
                        <td>10.0</td>
                        <td>9.3</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>ProPhos</td>
                        <td>M</td>
                        <td>40</td>
                        <td>$23.50</td>
                        <td>30.7</td>
                        <td>4.2</td>
                        <td>10.8</td>
                        <td>30.0</td>
                        <td>8.6</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
                <div class="blue-color">
                    <p>* - Lager pack size available</p>
                    <p># - Includes > 5% true protein</p>
                </div>
            </div>
        </div>

        <div class="full-width">
            <div class="general-div">
                <div class="row">
                    <div class="col-sm-6">
                        <table id="totalRatioTable">
                            <tr>
                                <td></td>
                                <td class="yellow-background">Dry Mix</td>
                                <td class="green-background">Rollermix</td>
                                <td class="pink-background">CSM+</td>
                                <td class="sky-background">HomeBrew</td>
                            </tr>
                            <tr>
                                <td>Salt:</td>
                                <td class="yellow-background">10</td>
                                <td class="green-background">0</td>
                                <td class="pink-background">40</td>
                                <td class="sky-background">32</td>
                            </tr>
                            <tr>
                                <td>Molasses:</td>
                                <td class="yellow-background">0</td>
                                <td class="green-background">60</td>
                                <td class="pink-background">0</td>
                                <td class="sky-background">15</td>
                            </tr>
                            <tr>
                                <td>Urea:</td>
                                <td class="yellow-background">10</td>
                                <td class="green-background">15</td>
                                <td class="pink-background">0</td>
                                <td class="sky-background">10</td>
                            </tr>
                            <tr>
                                <td>Kynofos:</td>
                                <td class="yellow-background">10</td>
                                <td class="green-background">0</td>
                                <td class="pink-background">0</td>
                                <td class="sky-background">7</td>
                            </tr>
                            <tr>
                                <td>Gran-am:</td>
                                <td class="yellow-background">2</td>
                                <td class="green-background">0</td>
                                <td class="pink-background">0</td>
                                <td class="sky-background">0</td>
                            </tr>
                            <tr>
                                <td>Tech grade MAP:</td>
                                <td class="yellow-background">0</td>
                                <td class="green-background">0</td>
                                <td class="pink-background">0</td>
                                <td class="sky-background">0</td>
                            </tr>
                            <tr>
                                <td>CSM:</td>
                                <td class="yellow-background">0</td>
                                <td class="green-background">0</td>
                                <td class="pink-background">60</td>
                                <td class="sky-background">5</td>
                            </tr>
                            <tr>
                                <td>Grain:</td>
                                <td class="yellow-background">0</td>
                                <td class="green-background">0</td>
                                <td class="pink-background">0</td>
                                <td class="sky-background">32</td>
                            </tr>
                            <tr>
                                <td>Water:</td>
                                <td class="yellow-background">0</td>
                                <td class="green-background">90</td>
                                <td class="pink-background">0</td>
                                <td class="sky-background">0</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm-6">
                        <div class="main-menu-div">
                            <ul style="display: flex; justify-content: center;">
                                <li><a href="#protein_table" class="menu-btn">Goto Top of Protein sheet</a></li>
                                <li><a href="#phosphrus_table" class="menu-btn">Goto Phosphorus Blocks & Mixes</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="full-width lightblue-background" style="padding-bottom: 0;">
            <div class="instruction-div">
                <div class="logo-div" style="text-align: center;">
                    <div style="text-align: right;">
                        <p style="font-size: 30px; font-weight: bold;">PHOSPHORUS BLOCKS & MIXES</p>
                        <p style="font-size: 14px;"><strong>Last price update: <strong> January 2000</strong></p>
                    </div>
                </div>
                <div class="main-menu-div">
                    <ul>
                        <li><a id="blocks_db_help_btn" class="menu-btn">HELP</a></li>
                        <li><a onclick="PrintPhosphorusBlocks()" class="menu-btn">Print Phosphorus Blocks</a></li>
                        <li><a id="feeds_db_edit_btn" style="cursor: pointer; display: none;">Insert/Delete Rows</a></li>
                        <li><a href="#protein_table" class="menu-btn">GoTo Protein Blocks & Mixes</a></li>
                        <li><a href="/feeds.php" class="menu-btn">Goto Feeds</a></li>
                        <li><a href="/index.php" class="menu-btn">Goto FeedCalc</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="full-width lightblue-background">
            <div class="main-table-div general-div">
                <div class="blue-color">
                    <label for="protein-intake">Insert required phosphorus intake here: </label>
                    <input type="number" id="phosphrus-intake" value="5" class="blue-color" style="width: 75px; text-align: center;"><span> gm/head/day</span>
                </div>
                <table id="phosphrus_table" class="table table-striped table-bordered table-sm blue-color" cellspacing="0"
                       width="100%">
                    <thead class="white-background blue-border bold" style="border: solid;">
                    <tr>
                        <th rowspan="2" class="lightblue-background">PRODUCT</th>
                        <th rowspan="2" class="lightblue-background">Block or Mix</th>
                        <th class="lightblue-background">PACK</th>
                        <th class="lightblue-background">PACK</th>
                        <th class="lightblue-background">CPE</th>
                        <th class="lightblue-background">P</th>
                        <th class="lightblue-background">Ca</th>
                        <th class="lightblue-background">SALT</th>
                        <th class="lightblue-background">UREA</th>
                        <th class="lightblue-background">BLOCK INTAKE</th>
                        <th class="lightblue-background">P INTAKE</th>
                        <th class="lightblue-background">BEAST DAYS</th>
                        <th class="lightblue-background">COST/h/d</th>
                        <th class="lightblue-background">COST</th>
                    </tr>
                    <tr>
                        <th class="lightblue-background">SIZE</th>
                        <th class="lightblue-background">COST</th>
                        <th class="lightblue-background">%</th>
                        <th class="lightblue-background">%</th>
                        <th class="lightblue-background">%</th>
                        <th class="lightblue-background">%</th>
                        <th class="lightblue-background">%</th>
                        <th class="lightblue-background">gm/day</th>
                        <th class="lightblue-background">gm/day</th>
                        <th class="lightblue-background">per/block</th>
                        <th class="lightblue-background">cents</th>
                        <th class="lightblue-background">100hd/mth</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="bold">AGRICON PRODUCTS</td>
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
                    <tr>
                        <td>Optimate*</td>
                        <td>M</td>
                        <td>25</td>
                        <td>$22.75</td>
                        <td>33.5</td>
                        <td>6.0</td>
                        <td>8.5</td>
                        <td>10.0</td>
                        <td>11.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Optiphos</td>
                        <td>M</td>
                        <td>25</td>
                        <td>$18.85</td>
                        <td>0.0</td>
                        <td>5.5</td>
                        <td>11.0</td>
                        <td>4.0</td>
                        <td>5.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Optivite Cowmix 5 #</td>
                        <td>M</td>
                        <td>40</td>
                        <td>$26.20</td>
                        <td>30.0</td>
                        <td>5.0</td>
                        <td>11.0</td>
                        <td>5.0</td>
                        <td>5.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Optivite Cowmix 10 #</td>
                        <td>M</td>
                        <td>40</td>
                        <td>$27.50</td>
                        <td>44.4</td>
                        <td>5.0</td>
                        <td>10.5</td>
                        <td>3.8</td>
                        <td>10.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Optivite Phosmix</td>
                        <td>M</td>
                        <td>40</td>
                        <td>$30.00</td>
                        <td>0.0</td>
                        <td>8.6</td>
                        <td>20.0</td>
                        <td>5.0</td>
                        <td>0.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Optivite Phosmix Saltfree</td>
                        <td>M</td>
                        <td>40</td>
                        <td>$30.30</td>
                        <td>0.0</td>
                        <td>8.6</td>
                        <td>20.0</td>
                        <td>0.0</td>
                        <td>0.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Phos 'N' Pro *</td>
                        <td>M</td>
                        <td>20</td>
                        <td>$18.80</td>
                        <td>49.0</td>
                        <td>5.5</td>
                        <td>8.0</td>
                        <td>2.0</td>
                        <td>15.5</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="bold">BAYER</td>
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
                    <tr>
                        <td>Nitro-Phos</td>
                        <td>B</td>
                        <td>18</td>
                        <td>$15.75</td>
                        <td>54.5</td>
                        <td>2.8</td>
                        <td>4.5</td>
                        <td>30.0</td>
                        <td>18.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Palaphos</td>
                        <td>M</td>
                        <td>25</td>
                        <td>$30.00</td>
                        <td>2.4/td>
                        <td>15.5</td>
                        <td>16.0</td>
                        <td>0.0</td>
                        <td>0.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="bold">BRISBANE EXPORT CORPORATION</td>
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
                    <tr>
                        <td>Kynofos 21 ! *</td>
                        <td>M</td>
                        <td>25</td>
                        <td>$19.00</td>
                        <td>0.0</td>
                        <td>21.0</td>
                        <td>18.0</td>
                        <td>0.0</td>
                        <td>0.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="bold">CROP KING</td>
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
                    <tr>
                        <td>Liqui Fert P !</td>
                        <td>M</td>
                        <td>25</td>
                        <td>$125.00</td>
                        <td>75.0</td>
                        <td>26.0</td>
                        <td>0.0</td>
                        <td>0.0</td>
                        <td>0.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="bold">FOUR SEASON</td>
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
                    <tr>
                        <td>Purephos *</td>
                        <td>B</td>
                        <td>20</td>
                        <td>$15.00</td>
                        <td>0.0</td>
                        <td>9.0</td>
                        <td>17.0</td>
                        <td>40.0</td>
                        <td>0.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="bold">LNT(Coopers)</td>
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
                    <tr>
                        <td>Biofos !</td>
                        <td>M</td>
                        <td>50</td>
                        <td>$39.20</td>
                        <td>0.0</td>
                        <td>21.2</td>
                        <td>16.0</td>
                        <td>0.0</td>
                        <td>0.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Phosrite *</td>
                        <td>B</td>
                        <td>40</td>
                        <td>$35.70</td>
                        <td>47.0</td>
                        <td>5.2</td>
                        <td>10.0</td>
                        <td>4.0</td>
                        <td>15.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Turbo-Phos</td>
                        <td>B</td>
                        <td>25</td>
                        <td>$14.50</td>
                        <td>17.0</td>
                        <td>8.2</td>
                        <td>20.0</td>
                        <td>10.0</td>
                        <td>5.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Uramol*</td>
                        <td>B</td>
                        <td>20</td>
                        <td>$16.50</td>
                        <td>86.0</td>
                        <td>3.7</td>
                        <td>7.5</td>
                        <td>32.0</td>
                        <td>30.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="bold">OLSSON</td>
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
                    <tr>
                        <td>Megaphos *</td>
                        <td>M</td>
                        <td>40</td>
                        <td>$37.95</td>
                        <td>14.0</td>
                        <td>6.0</td>
                        <td>8.5</td>
                        <td>2.8</td>
                        <td>5.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Minarea #</td>
                        <td>B</td>
                        <td>20</td>
                        <td>$13.80</td>
                        <td>12.6</td>
                        <td>4.2</td>
                        <td>9.2</td>
                        <td>43.0</td>
                        <td>3.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Superphos 8% *</td>
                        <td>B</td>
                        <td>20</td>
                        <td>$14.25</td>
                        <td>0.0</td>
                        <td>8.0</td>
                        <td>15.0</td>
                        <td>50.0</td>
                        <td>0.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Sulfos #</td>
                        <td>B</td>
                        <td>20</td>
                        <td>$14.35</td>
                        <td>25.8</td>
                        <td>4.4</td>
                        <td>9.5</td>
                        <td>36.0</td>
                        <td>8.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="bold">PRIMAC</td>
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
                    <tr>
                        <td>Primix  Wet Weather</td>
                        <td>M</td>
                        <td>40</td>
                        <td>$32.00</td>
                        <td>12.7</td>
                        <td>11.5</td>
                        <td>10.0</td>
                        <td>25.0</td>
                        <td>10.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Hi-Phos 5*</td>
                        <td>B</td>
                        <td>25</td>
                        <td>$37.50</td>
                        <td>42.0</td>
                        <td>5.2</td>
                        <td>15.0</td>
                        <td>4.0</td>
                        <td>15.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Hi-Phos 8*</td>
                        <td>B</td>
                        <td>25</td>
                        <td>$37.50</td>
                        <td>40.0</td>
                        <td>8.2</td>
                        <td>18.0</td>
                        <td>4.0</td>
                        <td>15.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Primix  10P</td>
                        <td>M</td>
                        <td>40</td>
                        <td>$41.25</td>
                        <td>6.0</td>
                        <td>10.0</td>
                        <td>12.0</td>
                        <td>15.0</td>
                        <td>0.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Primix 8P-30</td>
                        <td>M</td>
                        <td>40</td>
                        <td>$36.25</td>
                        <td>29.0</td>
                        <td>8.0</td>
                        <td>11.0</td>
                        <td>15.0</td>
                        <td>8.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Primix 6P-60</td>
                        <td>M</td>
                        <td>40</td>
                        <td>$32.50</td>
                        <td>49.0</td>
                        <td>6.0</td>
                        <td>8.0</td>
                        <td>20.0</td>
                        <td>15.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Primix 4.5P-90</td>
                        <td>M</td>
                        <td>40</td>
                        <td>$30.00</td>
                        <td>90.0</td>
                        <td>4.5</td>
                        <td>6.5</td>
                        <td>24.0</td>
                        <td>30.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="bold">RIDLEY AGRI PRODUCTS</td>
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
                    <tr>
                        <td>Fermafos Bag</td>
                        <td>M</td>
                        <td>40</td>
                        <td>$35.00</td>
                        <td>1.5</td>
                        <td>8.0</td>
                        <td>14.0</td>
                        <td>10.0</td>
                        <td>0.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Fermafos Block</td>
                        <td>B</td>
                        <td>18</td>
                        <td>$15.00</td>
                        <td>20.0</td>
                        <td>6.0</td>
                        <td>16.0</td>
                        <td>25.0</td>
                        <td>0.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Fermafos Special</td>
                        <td>M</td>
                        <td>40</td>
                        <td>$35.00</td>
                        <td>27.9</td>
                        <td>7.3</td>
                        <td>16.5</td>
                        <td>10.0</td>
                        <td>9.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Fermafos12P Salt Free</td>
                        <td>M</td>
                        <td>40</td>
                        <td>$33.20</td>
                        <td>1.2</td>
                        <td>12.1</td>
                        <td>22.5</td>
                        <td>0.0</td>
                        <td>0.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Hi-Phos</td>
                        <td>M</td>
                        <td>40</td>
                        <td>$25.00</td>
                        <td>5.0</td>
                        <td>5.2</td>
                        <td>14.5</td>
                        <td>30.0</td>
                        <td>0.0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Maxi Breed</td>
                        <td>B</td>
                        <td>100</td>
                        <td>$90.00</td>
                        <td>30.0</td>
                        <td>5.0</td>
                        <td>6.2</td>
                        <td>10.0</td>
                        <td>9.3</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Pro-Phos</td>
                        <td>M</td>
                        <td>40</td>
                        <td>$22.55</td>
                        <td>30.7</td>
                        <td>4.2</td>
                        <td>10.8</td>
                        <td>30.0</td>
                        <td>8.6</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
                <div class="blue-color">
                    <p>! - requires a carrier</p>
                    <p># - larger pack sizes available</p>
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
    <script src="assets/js/blocks.js"></script>
    <script src="assets/js/arrow-table.js"></script>
    </body>
    </html>
<?php
$conn->close();
?>