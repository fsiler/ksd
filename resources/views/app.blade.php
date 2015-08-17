<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="District of Kansas example inventory application">
    <meta name="author" content="Franklin M. Siler <me@franksiler.com>">
    <title>KSD inventory example</title>
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">KSD Inventory Example</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
        <? // create menu items
            foreach (["Assets" => "assets", "Asset Types" => "asset_types", "Locations" => "locations"] as $name => $url)
            {
                echo "<li><a href=\"?page=$url\">$name</a></li>";
            }
        ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
<?php //search ?>

<table>
<?
// ADD NEW ITEMS
?>
<tr><?  // generate header row
foreach (Schema::getColumnListing('assets') as $index=>$name)
{
    if(ctype_upper($name[0]))
    {
        echo "<th>$name</th>";
    }
}
?></tr>
<?
// display data, probably best done in a view
// echo htmlentities($output, ENT_QUOTES, 'UTF-8');
//var_dump(KSD_FMS\Asset::all());
//var_dump(KSD_FMS\AssetType::all());
//var_dump(KSD_FMS\Location::all());

?>
</table>

{{ KSD_FMS\Asset::all() }}
</div>

<script src="jquery/dist/jquery.min.js"></script>
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
</body></html>
