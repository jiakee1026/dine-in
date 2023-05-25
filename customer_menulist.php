<?php

print "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css' rel='stylesheet'
integrity='sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT' crossorigin='anonymous'>
<link rel='stylesheet' href='https://www.w3schools.com/w3css/4/w3.css'>
<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65' crossorigin='anonymous'>
<link rel='stylesheet' href='design.css'>
<link rel='stylesheet' href='nav.css'>";
echo '
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
</script>';

include_once("dbconnect.php");
$tbl_no=$_GET['tbl_no'];
$order_id=$_GET['order_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href = "../css/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu List</title>
    <style>

    /* Float four columns side by side */
    .column {
    float: left;
    width: 25%;
    padding: 0 10px;
    }

    /* Remove extra left and right margins, due to padding */
    .row {margin: 0 -5px;}

    /* Clear floats after the columns */
    .row:after {
    content: "";
    display: table;
    clear: both;
    }

    /* Responsive columns */
    @media screen and (max-width: 600px) {
    .column {
        width: 100%;
        display: block;
        margin-bottom: 20px;
    }
    }

    

        
    </style>  
    
</head>
<body>
   
<div class="topnav">
    <div class="topnav-left">
        <a href="tbl_no.html" >Back</a>
    </div>
    <div class="topnav-right">
        <a href="cart.php?tbl_no=<?php echo $tbl_no; ?>&order_id=<?php echo $order_id; ?>">Cart</a>
    </div>
</div>

<div class="row">
<?php
$sqlread = "SELECT * FROM tbl_menu";
    $result = $conn->query($sqlread);
    
    
    while ($row = mysqli_fetch_assoc($result)) {
?>
<div class="column">
<form method=POST form action = "addCartForm.php?tbl_no=<?php echo $tbl_no; ?>&order_id=<?php echo $order_id; ?>">
    <div class="card" style="width: auto; height: auto;">
    <input type="hidden" name="menu_id" value="<?php echo $row['menu_id'];?>">
    <input type="hidden" name="name" value="<?php echo $row['name'];?>">
    <input type="hidden" name="price" value="<?php echo $row['price'];?>">

        <img class="card-img-top" style = "height: 10rem;" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']);?>" alt="menu image">
            <div class="card-body">
                <h5 class="card-title" style="font-weight:bold;"><?php echo $row['menu_id'];?></h5>
                <h6 class="card-title" style="font-weight:bold;"><?php echo $row['name']; ?></h6>
                <p class="card-text"><?php echo $row['description']; ?></p>
                <strong><p class="card-text">RM <?php echo $row['price']; ?></p></strong>
                <a href="addCartForm.php"><button type="submit" class="btn btn-primary btn-sm" name="addCart" value="<?php echo $row['menu_id'];?>">Add To Cart</button></a>
            </div>
    </div>
</form>
</div>

<?php
    }
?>
</div>
</body>
</html>