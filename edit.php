<?php
//session check
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
require 'function.php';
$menu = query("SELECT * FROM menu");

//ambil data url
$id = $_GET["id"];
//query data berdasarkan id
$eMenu = query("SELECT * FROM menu WHERE id = $id")[0];

if (isset($_POST["submit"])) {
  // cek data berhasil
  if (edit($_POST) > 0) {
    echo "
          <script>
            alert('Data Berhasil Diubah!');
            document.location.href = 'index.php';
          </script>
        ";
  } else {
    echo "
        <script>
          alert('Data Gagal Diubah!');
          document.location.href = 'index.php';
        </script>
      ";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet' type='text/css'>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="./css/output.css" rel="stylesheet">
  <title>Edit Data Makanan</title>
</head>

<body>
  <!-- menu -->
  <div class="relative pt-32 pb-20">
    <div class="mx-auto container">
      <h1 class="text-center text-slate-800 text-4xl font-bold mb-2">Our Special Dish <button id="edit"><i class='bx bxs-edit'></i></button></h1>
      <p class="text-center text-slate-600 mb-10">Made with premium ingridients.</p>
      <form method="post" action="confirm.php">
        <div class="menu-items md:flex md:justify-between mb-20 md:flex-row flex-wrap">
          <?php foreach ($menu as $row) : ?>
            <div class="text-center rounded-3xl hover:shadow-lg shadow-md mb-10 w-96 mx-auto">
              <a class="right-0 float-right" href="edit.php?id=<?= $row["id"]; ?>"><span class="text-red-700 font-bold text-3xl"><i class='bx bxs-edit'></i></span></a>
              <a id="closeEdit" class="right-0 float-right hidden" href="delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('Hapus dari menu?')" ;><span class="text-red-700 font-bold text-3xl"><i class='bx bx-x'></i></span></a>
              <img src="img/<?php echo $row["image"]; ?>" class="w-80 h-80 flex justify-center mx-auto">
              <h3 class="font-semibold text-center text-xl"><?php echo $row["nama"]; ?></h3>
              <p class="text-center mb-5">$<?php echo $row["price"]; ?> (termauk pajak)</p>
              <h3 class="text-slate-600 text-center mb-5 px-5 md:px-10"><?php echo $row["desk"]; ?></h3>
              <div class="flex self-center justify-center">
                <span class="">Jumlah :</span>
                <input class="text-primary w-10 h-5 self-center ml-5" type="text" value="0" name="<?php echo $row["nama"] ?>">
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <input class="bg-primary text-center mx-auto flex text-white px-5 py-3 rounded-full" type="submit" value="Order">
      </form>
    </div>
    <!-- Edit menu -->
    <section id="tambahMenu" class="w-full bg-white bg-opacity-90 h-full absolute top-0">
      <div class="flex justify-center">
        <div class="bg-secondary py-20 px-14 mt-32 w-1/3">
          <div>
            <span id="close" class="font-bold text-3xl float-right text-red-600"><i class='bx bx-x'></i></span>
          </div>
          <h1 class="font-bold text-2xl mb-5">Edit Menu Makanan</h1>
          <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $eMenu["id"]; ?>">
            <input type="hidden" name="gambarLama" value="<?= $eMenu["image"]; ?>">
            <ul>
              <li>
                <p class="font-semibold mb-2"><span class="text-red-700 font-bold">*</span> Nama Makanan</p>
                <input type="text" name="nama" id="nama" class="rounded-md shadow-lg w-2/3 h-10 mb-5" placeholder=" Nama" value="<?= $eMenu["nama"]; ?>">
              </li>
              <li>
                <p class="font-semibold mb-2"><span class="text-red-700 font-bold">*</span> Harga Makanan</p>
                <input type="number" name="price" id="price" placeholder=" Harga" class="rounded-md shadow-lg w-2/3 h-10 mb-5" value="<?= $eMenu["price"]; ?>">
              </li>
              <li>
                <p class="font-semibold mb-2"><span class="text-red-700 font-bold">*</span> img</p>
                <img src="img/<?= $eMenu['image']; ?>" class="w-20">
                <input type="file" name="img" id="img" class="rounded-md shadow-lg w-2/3 h-10 mb-5" placeholder=" img">
              </li>
              <li>
                <p class="font-semibold mb-2"><span class="text-red-700 font-bold">*</span> Deskripsi</p>
                <input type="text" name="desk" id="desk" class="rounded-md shadow-lg w-2/3 h-16" placeholder=" Deskripsi" value="<?= $eMenu["desk"]; ?>">
              </li>
            </ul>
            <button type="submit" name="submit" class="py-2 px-3 bg-primary rounded-full text-white mt-5">Submit</button>
          </form>
        </div>
      </div>
    </section>
  </div>
  <script src="script.js"></script>
</body>

</html>