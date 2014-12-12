<!DOCTYPE html>
<html lang="en">
<head>
    <title>Status <?php echo $result->getResult(); ?></title>
    <meta charset="utf-8">

    <style>
        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 14px;
            line-height: 140%;
        }
        #wrapper {
            margin: 20px auto;
            width: 800px;
        }
        h1 {
            text-align: center;
            width: 100%;
        }
        table {
            margin-top: 20px;
            width: 100%;
        }
        table tr td {
            border-top: 1px solid #EEE;
        }
        table tr th,
        table tr td {
            padding: 5px 8px;
            text-align: left;
            font-size: 16px;
        }
        table tr th {
            font-weight: bold;
        }
    </style>
</head>
<body>
<div id="wrapper">
    <h1>Status: <?php echo $result->getResult(); ?></h1>
    <table cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th>Url</th>
            <th style="text-align: center;">Status Code</th>
            <th style="text-align: right;">Result</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($result->all() as $item) { ?>
            <tr>
                <td><?php echo $item->getUrl(); ?></td>
                <td style="text-align: center;"><?php echo $item->getStatus(); ?></td>
                <td style="text-align: right;"><?php echo $item->getResult(); ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>