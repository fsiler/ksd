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
    <link href="datatables/media/css/jquery.dataTables.min.css" rel="stylesheet">
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
        $menu_items = ["Assets" => "assets", "Asset Types" => "asset_types", "Locations" => "locations"];
            foreach ($menu_items as $name => $url)
            {
//                echo "<li><a href=\"?page=$url\">$name</a></li>";
            }
        ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<div class="container">
{!! KSD_FMS\Asset::get()
    ->columns(array( 'Name', 'Serial', 'Date', 'Room', 'location', 'asset_type' => "Type" ))
    ->attributes(array(
        'id' => 'example',
        'class' => 'table table-striped',))
    ->modifyRow('mod1', function($asset) { return array('id' => $asset->id); })
    ->render()
!!}
</div>

<script src="jquery/dist/jquery.min.js"></script>
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<script src="datatables/media/js/jquery.dataTables.min.js"></script>
<script>$(document).ready(function(){
    $('#example').DataTable( { 'pageLength': 50 });
});
$('tbody tr').click(function() {
    window.location=("edit/" + $(this).attr('id'));
});
</script>
</body></html>
