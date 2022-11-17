<?php require_once('data.php');
  //session check
  session_start();
    if(!isset($_SESSION["login"])){
    header("Location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Progate</title>
  <!-- <link rel="styleshet" type="text/css" href="stylesheet.css"> -->
  <link href="./css/output.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet' type='text/css'>
</head>
<body>
  <div class="container">
    <h2 class="text-3xl font-bold text-slate-800 text-center pt-20 mb-10">Keranjang</h2>
    <?php $totalPrice = 0 ?>
    
    <?php foreach ($menus as $menu): ?>
      <?php 
        $orderCount = $_POST[$menu->getName()];
        $menu->setOrderCount($orderCount);
        $totalPrice += $menu->getTotalPrice();
        
      ?>
      <div class="flex justify-around">
        <img class="w-80" src="<?php echo $menu->getImage() ?>">
        <?php echo $menu->getName() ?>
        x
        <?php echo $menu->getOrderCount() ?>
        <p class="order-price">$<?php echo $menu->getTotalPrice() ?></p>
      </div>

    <?php endforeach; ?>
    <h3>Total price: $<?php echo $totalPrice ?></h3>

    
    ?>
  </div>
</body>
</html>
