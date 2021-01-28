<?php
require('conn.php');
?>
<!DOCTYPE html>
    <head>
        <title>Bootstrap 5 star rating example using jQuery star rating plugin</title>
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
    </head>
    <body>
        <?php
//$q = "SELECT * FROM url LIMIT 0,5";
$q = "SELECT * FROM url";
$result = mysqli_query($link, $q);
while ($row = mysqli_fetch_array($result)){
    $id = $row['id'];
    $img = $row['img'];
    //if (isset($value)) {
        $value = $row['rating'];
        //} else {
            //  $value = "0";
            //} //end if
            ?><div class="container">
            <br>
            <?php
            ?><img src="<?php echo $img; ?>" class="img-responsive img-circle img-thumbnail">
            <p><?php echo $id; ?></p>
            <input id="input-1" name="input-1" class="rating rating-loading" value="<?php echo $value ?>" data-min="0" data-max="5" data-step="1" data-size="sm">
            <!-- <input id="input-1" name="input-1" class="rating rating-loading" value="2" data-min="0" data-max="5"
            data-step="0.5" data-size="sm"> -->
            <br />
        </div>
            <?php
            }
            ?>
        <script>
            $("#input-id").rating();
        </script>
    </body>
    </html>