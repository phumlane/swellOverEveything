<?php


$serverName = "localhost";
$UserName = "root";
$Password = "";
$dbName = "test";
// connectind to database
$con=mysqli_connect( $serverName,$UserName,$Password,$dbName);

if (isset($_POST["add_to_cart"])) {
  if (isset($_SESSION["cart"])) {
    $item_array_id = array_column($_SESSION["cart"], "item_id");
    if (!in_array($_GET["id"], $item_array_id)) {
      $count = count($_SESSION["cart"]);
      $item_array  = array(
        'item_id'       =>$_GET["id"],
        'item_name'     =>$_POST["hidden_name"],
        'item_price'    =>$_POST["hidden_price"],
        'item_quantity' =>$_POST["quantity"]
      );
      $_SESSION["cart"][$count] = $item_array;
      echo '<script>window.location="shop.php"</script>';
    }else {
        echo '<script>alert("Item Added")</script>';
        echo '<script>window.location="shop.php"</script>';

    }
  }else {
    $item_array  = array(
      'item_id'       =>$_GET["id"],
      'item_name'     =>$_POST["hidden_name"],
      'item_price'    =>$_POST["hidden_price"],
      'item_quantity' =>$_POST["quantity"]
    );
    $_SESSION["cart"][0] = $item_array;
  }
}
$_SESSION["cart"][0] = $item_array;

if (isset($_GET["action"]))
{
  if ($_GET["action"]=="delete")
  {
      foreach ($_SESSION["cart"] as $key => $value)
      {
        if ($value["item_id"] == $_GET["id"])
         {
        unset($_SESSION["cart"][$key]);
        echo '<script>alert("item Removed")</script>';
        echo '<script>window.location="shop.php"</script>';
        }
      }
  }
}
 ?>
