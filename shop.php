<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "test";

//connecting to the database

$con = mysqli_connect($serverName, $userName , $password , $dbName);

?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="Sstyle.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <link rel=<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     <title>myShop</title>
   </head>
   <body>
     <div class="contianer" style=width: 700px;>
     <h3>Shopping Cart</h3><br/>
  <?php
  $query = "SELECT * FROM items";

  $res = mysqli_query($con ,"SELECT * FROM items");

  if(mysqli_query($con ,"SELECT * FROM items") > 0){
    while($row = mysqli_fetch_array($res)){

 
  ?>
         <div class="col-md-4">
              <form method="post" action='aShopCart.php?action = add&id=<?php echo $row["ID"]  ?>' >
                <div style="border: 5px solid #eaeaec; margin:-1px -30px 10px -1px; box-shadow: 0 1px 2px rgba(0,0,0,0.05); padding:20px; align="center">
                <img src="<?php echo $row["image"];?>" class="image_responsive" />
                <h4 class="text-info"><?php echo $row["Description"];  ?></h4>
                <h4 class="text-price"> R<?php echo $row["Sell_Price"];  ?></h4>
                <input type="text" name="quantity" class="form-control" value="1"/>
                <input type="hidden" name="hidden_name" value="<?php  echo $row["Description"]?>"/>
                <input type="hidden" name="hidden_price" value="<?php  echo $row["Sell_Price"]?>"/>
                <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart"/>



        </div>
              </form>

         </div>

         <?php
   }
  }
         ?>
        
      <div style="clear:both"></div>
      <br />
      <h3>My Shopping Cart </h3>
      <div class = "table-resposnsive">
        <table class="table table-bordered">
          <tr>
            <th width="40%">Item Name</th>
            <th width="10%">Quantity</th>
            <th width="10%">Price</th>
            <th width="15%">Total</th>
            <th width="5%">Action</th>
          </tr>
          <?php
          if (!empty($_SESSION["cart"])) {
            $total = 0;
            foreach ($_SESSION["cart"] as $key => $value) {
              ?>
              <tr>
                <td><?php echo "$value[item_name]";  ?></td>
                <td><?php echo "$value[item_quantity]";  ?></td>
                <td>R<?php echo "$value[item_price]";  ?></td>
                <td>R<?php echo number_format($value["item_quantity"] * $value["item_price"],2); ?></td>
                <td><a href="aShopCart.php?action=delete&id=<?php echo $value["item_id"];  ?>"><span class="text-danger">Remove</span></a></td>
              </tr>
              <?php
                  $total = $total + ($value["item_quantity"] * $value["item_price"]);
            }
            ?>
            <tr>
              <td colspan="3" alig="right">Total</td>
              <td>R <?php  echo number_format($total,2); ?></td>
              <td></td>


            </tr>
          <?php
          }

           ?>
         </table>
        </div>



     </div>
     <div>
        <a href="Cashout" class="btn btn-outline-success">Cash Out</a>
     </div>
   </body>
 </html>

