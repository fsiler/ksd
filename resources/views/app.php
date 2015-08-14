<!DOCTYPE html>
<html>
<head>
    <title>KSD inventory example</title>
</head>
<body>
<h1>KSD Inventory Example</h1>
<?php //search ?>

<table>
<tr><?  // generate header row
foreach (Schema::getColumnListing('assets') as $index=>$name)
{
    if(ctype_upper($name[0]))
    {
        echo "<th>$name</th>";
    }
}
?></tr>
            </table>
<?
// "add new" stuff
?>


<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body></html>
