<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Current Status [<?php echo $result->getResult(); ?>]</title>

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
                border-top: #CCC;
            }
            table tr {
                border-bottom: 1px solid #CCC;
            }
            table tr td {
                padding: 3px 5px;
                text-align: left;
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <h1><?php echo $result->getResult(); ?></h1>
            <table>
                <tbody>
                    <?php foreach($result->all() as $item) { ?>
                    <tr>
                        <td><?php echo $item->getUrl(); ?></td>
                        <td><?php echo $item->getStatus(); ?></td>
                        <td><?php echo $item->getResult(); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </body>
</html>