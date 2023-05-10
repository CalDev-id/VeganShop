<?php require_once('data.php');
require 'function.php';
//session check
session_start();
// if (!isset($_SESSION["login"])) {
//   header("Location: login.php");
//   exit;
// }
//ambil data url
$id = $_GET["id"];
//query data berdasarkan id
$CMenu = query("SELECT * FROM menu WHERE id = $id")[0];


//submit data
if (isset($_POST["bayar"])) {
  // cek data berhasil
  if (checkout($_POST) > 0) {
    echo "
    <script>
      alert('Data Berhasil Ditambahkan!');
      document.location.href = 'index.php';
    </script>
  ";
  } else {
    echo "
  <script>
    alert('Data Gagal Ditambah!');
    document.location.href = 'index.php';
  </script>
";
  }
}
// $orderCount = $_POST['jumlahOrder'];
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
  <title>Check Out</title>
</head>

<body>

  <!--nav-->
  <header class="bg-transparent top-0 left-0 w-full flex items-center z-10 mb-5">
    <div class="md:container w-full md:px-0">
      <div class="flex items-center justify-between relative self-center">
        <div class="px-4">
          <a href="index.php" class="font-bold text-2xl block py-6">Vege<span class="text-green-600">ty</span></a>
        </div>
        <div class="flex items-center px-4 self-center">
          <button id="hamburger" class="block absolute right-4 lg:hidden">
            <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
            <span class="hamburger-line transition duration-300 ease-in-out"></span>
            <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
          </button>
          <nav id="nav-menu" class="hidden absolute md:py-0 py-5 bg-body w-full right-0 top-full lg:block lg:static lg:bg-transparent lg:max-w-full ">
            <ul class="block h-[100vh] lg:flex lg:h-full">
              <li class="group self-center">
                <a href="index.php" class="font-semibold text-primary py-10 mx-8 flex md:py-2 self-center">Beranda</a>
              </li>
              <li class="group">
                <a href="#" class="text-base text-black py-10 mx-8 flex group-hover:text-primary md:py-2">Artikel</a>
              </li>
              <li class="group">
                <a href="penjualan.php" class="text-base text-black py-10 mx-8 flex group-hover:text-primary md:py-2">Riwayat</a>
              </li>
              <li class="group">
                <a href="editPage.php" class="text-base text-black py-10 mx-8 flex group-hover:text-primary md:py-2">Tambah Menu</a>
              </li>
              <?php
              // $hasLogin = false;
              if (isset($_SESSION["login"])) {
                // var_dump($_SESSION);
                echo '<li class="group">
                  <a href="logout.php" class="text-base   text-black py-10 mx-8 flex group-hover:text-primary md:py-2">Logout</a>
                </li>';
              } else {
                // var_dump($_SESSION);
                echo '<li class="group ">
                <a href="logout.php" class="text-bas text-white mx-8 flex group-hover:text-primary md:py-2 px-4 bg-primary rounded-3xl group-hover:bg-white group-hover:shadow-lg py-2 justify-center">Login</a>
              </li>';
              }
              ?>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>

  <!--- point--->
  <div class="container lg:flex justify-center lg:mt-20">
    <div class="kiri lg:w-1/2 justify-center bg-secondary">
      <img class="md:w-[600px] md:h-[600px] flex justify-center mx-auto p-10" src="img/<?= $CMenu['image']; ?>" alt="">
    </div>
    <div class="kanan lg:w-1/2 self-center md:ml-10 lg:mt-0 md:mt-20 mt-5">
      <div class="mb-5">
        <h1 class="font-bold text-primary text-3xl"><?= $CMenu['nama']; ?></h1>
        <h1 class="text-slate-700 text-4xl font-bold mt-2 mb-2">Rp. <?= $CMenu['price']; ?></h1>
        <h1 class="text-slate-500 lg:pr-52"><?= $CMenu['desk']; ?></h1>
      </div>
      <form action="" method="post">
        <ul>
          <li class="">
            <p class="font-semibold mb-2"><span class="text-red-700 font-bold">*</span> Nama Pembeli</p>
            <input type="text" name="nama" id="nama" class="rounded-md shadow-lg w-2/3 h-10 mb-5" placeholder=" Nama Pembeli" required>
          </li>
          <li>
          <li class="">
            <p class="font-semibold mb-2"><span class="text-red-700 font-bold">*</span> Nomor Meja</p>
            <input type="number" name="noMeja" id="price" placeholder=" Nomor Meja" class="rounded-md shadow-lg w-2/3 h-10 mb-5" required>
          </li>
          <li class="hidden">
            <p class="font-semibold mb-2"><span class="text-red-700 font-bold">*</span> IDMENU</p>
            <input type="number" name="idmenu" id="price" placeholder=" Harga Makanan" class="rounded-md shadow-lg w-2/3 h-10 mb-5" required value="<?= $CMenu['id']; ?>">
          </li>
          <li class="hidden">
            <p class="font-semibold mb-2"><span class="text-red-700 font-bold">*</span> harga</p>
            <input type="number" name="harga" id="price" placeholder=" Harga Makanan" class="rounded-md shadow-lg w-2/3 h-10 mb-5" required value="<?= $CMenu['price']; ?>">
          </li>
        </ul>
        <div class="flex mt-2 md:mt-5 justify-between pb-10">
          <div class="flex justify-center md:px-0 px-5">
            <span class="font-semibold text-xl border-2 border-slate-500 text-slate-500 rounded-full px-1 self-center" id="minus"><i class='bx bx-minus'></i></span>
            <input id="qty2" type="text" value="1" name="jumlah" class="w-10 font-semibold text-xl text-center">
            <span class="font-semibold rounded-full outline-primary border-2 border-primary px-1 text-primary text-xl self-center"><i id="plus" class='bx bx-plus'></i></span>
          </div>

          <button id="beli" type="submit" name="bayar" class="bg-primary mx-auto text-white px-20 py-2 font-medium text-center self-center rounded-full flex justify-center"><span><i class='bx bx-cart'></span></i> Beli</button>
        </div>
      </form>
    </div>
  </div>

  <!-- footer -->
  <section>
        <div class="container self-center md:mb-32 md:flex mt-20">
            <div class="kiri md:w-1/2 mb-10 md:mb-0">
                <h1 class="font-bold text-3xl mb-5">Vege<span class="text-green-600">ty</span></h1>
                <p class="w-2/3 mb-10">Jl. Prof. DR. G.A. Siwabessy, Kampus Universitas Indonesia Depok 16425. Email: humas@pnj.ac.id. Phone: 021-7270036</p>
                <p>Follow Us</p>
                <div class="flex text-green-600 text-3xl">
                    <i class='bx bxl-facebook'></i>
                    <i class='bx bxl-twitter'></i>
                    <i class='bx bxl-youtube'></i>
                </div>
            </div>
            <div class="kanan md:flex justify-between md:w-1/2">
                <div class="mb-10">
                    <h1 class="font-semibold mb-2">Information</h1>
                    <ul>
                        <li>
                            <a href="#">About Us</a>
                        </li>
                        <li>
                            <a href="#">More Search</a>
                        </li>
                        <li>
                            <a href="#">Testimoni</a>
                        </li>
                        <li>
                            <a href="#">Events</a>
                        </li>
                    </ul>
                </div>
                <div class="mb-10">
                    <h1 class="font-semibold mb-2">Helpfull Links</h1>
                    <ul>
                        <li>
                            <a href="#">Service</a>
                        </li>
                        <li>
                            <a href="#">Support</a>
                        </li>
                        <li>
                            <a href="#">Term & Condition</a>
                        </li>
                        <li>
                            <a href="#">Privacy</a>
                        </li>
                    </ul>
                </div>
                <div class="mb-10">
                    <h1 class="font-semibold mb-2">Our Menu</h1>
                    <ul>
                        <li>
                            <a href="#">Special</a>
                        </li>
                        <li>
                            <a href="#">Popular</a>
                        </li>
                        <li>
                            <a href="#">Categories</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="w-full bg-primary">
        <div class="container py-5">
            <div class="flex lg:justify-between text-white flex-wrap justify-center">
                <p>Made by Dynavx / Heical Chandra</p>
                <p>All Right Reserved.</p>
            </div>
        </div>
    </div>

  <script>
    const plus = document.querySelector("#plus");
    const minus = document.querySelector("#minus");
    const outputqty = document.querySelector("#qty2");
    const hTotal = document.querySelector("#hTotal");
    const price = document.querySelector("#price");

    const beli = document.querySelector("#beli");

    let numqty = 1;

    plus.addEventListener("click", () => {
      numqty++;
      // console.log(qty);
      outputqty.value = numqty;
    });
    minus.addEventListener("click", () => {
      if (outputqty.value <= 0) {
        minus.disabled = true;
      } else {
        numqty--;
      }

      // console.log(qty);
      outputqty.value = numqty;
    });
  </script>
  <script src="script.js"></script>


</body>

</html>