<?php
$global = file_get_contents('https://api.covid19api.com/summary');
$global_cases = json_decode($global, true);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="table/style.css">
    <link rel="stylesheet" type="text/css" href="table/datatables.min.css"/>
    <script src="table/jquery.js"></script>
    <script src="table/jquery.dataTables.js"></script>
    <title>COVID 19 TRACKER</title>
</head>
<body>
    <h3>COVID 19 GLOBAL WISE CASES</h3>
    <table class= "global">
        <tr>
            <th>New Confirmed</th>
            <th>Total Confirmed</th>
            <th>New Deaths</th>
            <th>Total Deaths</th>
            <th>New Recovered</th>
            <th>Total Recovered</th>
        </tr>
        <tr>
            <td><?=$global_cases['Global']['NewConfirmed']?></td>
            <td><?=$global_cases['Global']['TotalConfirmed']?></td>
            <td><?=$global_cases['Global']['NewDeaths']?></td>
            <td><?=$global_cases['Global']['TotalDeaths']?></td>
            <td><?=$global_cases['Global']['NewRecovered']?></td>
            <td><?=$global_cases['Global']['TotalRecovered']?></td>
        </tr>            
    </table>
    <h3>COVID 19 COUNTRY WISE CASES</h3>
    <table id = "country" class="display">
        <thead>

            <tr>
                <th>Country Code</th>
                <th>Country</th>
                <th>New Confirmed</th>
                <th>Total Confirmed</th>
                <th>New Deaths</th>
                <th>Total Deaths</th>
                <th>New Recovered</th>
                <th>Total Recovered</th>
                <th>Last Update</th>
            </tr>
        </thead>
        <tbody>

            <?php
                $total_countries = count($global_cases['Countries']);
                $i = 0;
                while($i<$total_countries){?>
                
                <tr>
                    <td><?=$global_cases['Countries'][$i]['CountryCode']?></td>
                    <td><?=$global_cases['Countries'][$i]['Country']?></td>
                    <td><?=$global_cases['Countries'][$i]['NewConfirmed']?></td>
                    <td><?=$global_cases['Countries'][$i]['TotalConfirmed']?></td>
                    <td><?=$global_cases['Countries'][$i]['NewDeaths']?></td>
                    <td><?=$global_cases['Countries'][$i]['TotalDeaths']?></td>
                    <td><?=$global_cases['Countries'][$i]['NewRecovered']?></td>
                    <td><?=$global_cases['Countries'][$i]['TotalRecovered']?></td>
                    <td><?=$global_cases['Countries'][$i]['Date']?></td>
                    </tr>
                    
                    <?php   $i++;
            }?>
        </tbody>
            
    </table>
    <script>
        $(document).ready( function () {
            $('#country').DataTable();
        } );
        </script>
</body>
</html>