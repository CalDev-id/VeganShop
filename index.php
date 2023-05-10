<?php
//session check
session_start();
// if (!isset($_SESSION["login"])) {
//   header("Location: login.php");
//   exit;
// }

require_once 'data.php';
require 'function.php';

//pagination
$MaxData = 3;
$jumlahData = count(query("SELECT * FROM menu"));
$jumlahHalaman = ceil($jumlahData / $MaxData);

if (isset($_GET["page"])) {
  $activePage = $_GET["page"];
} else {
  $activePage = 1;
}
//ternary $activePage = (isset($_GET["page"])) ? $_GET["page"] : 1;
// data start
$dataStart = ($MaxData * $activePage) - $MaxData;

$menu = query("SELECT * FROM menu LIMIT $dataStart, $MaxData");

if (isset($_POST["submit"])) {
  // cek data berhasil
  if (tambah($_POST) > 0) {
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

//search function
if (isset($_POST["cari"])) {
  $menu = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>VeganShop</title>
  <!-- <link rel="stylesheet" type="text/css" href="stylesheet.css"> -->
  <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet' type='text/css'>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="./css/output.css" rel="stylesheet">
</head>

<body>

  <!-- NAVBAR -->
  <header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10 mb-5">
    <div class="md:container w-full md:px-0">
      <div class="flex items-center justify-between relative self-center">
        <div class="px-4">
          <a href="index.php" class="font-bold text-2xl block py-6 text-amber-500">Sub<span class="text-green-600">way</span></a>
        </div>
        <div class="flex items-center px-4 self-center">
          <button id="hamburger" class="block absolute right-4 lg:hidden">
            <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
            <span class="hamburger-line transition duration-300 ease-in-out"></span>
            <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
          </button>
          <nav id="nav-menu" class="hidden absolute lg:py-0 py-5 bg-body w-full right-0 top-full lg:block lg:static lg:bg-transparent lg:max-w-full ">
            <ul class="block h-[100vh] lg:flex lg:h-full">
              <li class="group self-center">
                <a href="index.php" class="font-semibold text-primary py-10 mx-8 flex md:py-2 self-center">Beranda</a>
              </li>
              <li class="group">
                <a href="artikel.php" class="text-base text-black py-10 mx-8 flex group-hover:text-primary md:py-2">Artikel</a>
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
                <a href="logout.php" class="text-bas text-white mx-8 flex group-hover:text-primary md:py-2 py-2 px-4 bg-primary rounded-3xl group-hover:bg-white group-hover:shadow-lg justify-center">Login</a>
              </li>';
              }
              ?>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>

  <!-- HERO -->
  <section id="hero" class="pt-20 md:pt-32 mb-24">
    <div class="container">
      <div class="flex flex-wrap justify-center">
        <div class="md:hidden w-full self-end px-4 md:w-1/2">
          <div class="relative md:mt-0 right-0">
            <img id="heroIMG" src="img/banner.png" alt="Heical" class="mx-auto max-w-full">
          </div>
        </div>

        <div class="hero-left md:w-1/2  md:block md:justify-center md:mx-auto self-center">
          <h3 class="text-primary font-bold mx-4 text-4xl md:text-6xl text-center md:text-left mt-4">
            Healthy food to <br> live a healthier life <br> in the future
          </h3>
          <h5 class="mt-4 font-medium text-lg mb-4 text-center md:text-left md:mx-4 md:pr-20 text-slate-400">Enjoy a healty life by eating healty foods that have extraordinary flavors that make your life healthier for today and in the future</h5>
          <div class="flex mx-auto justify-center md:justify-start">
            <a id="mulai" class="mx-2 px-6 py-3 bg-slate-800 rounded-full text-white hover:bg-white hover:text-primary text-[13px] font-semibold" href="#artikel">Get Started</a>
          </div>
        </div>

        <div class="hidden md:block w-full self-end px-4 md:w-1/2">
          <div class="mt-10 md:mt-0 right-0">
            <img id="heroIMG" src="img/banner.png" alt="Heical" class="mx-auto max-w-[50opacity-50%]">
          </div>
        </div>

        <section id="copyright" class="mt-10 w-full">
          <div class="container">
            <div class="block md:flex md:justify-between">
              <div class="Ckiri text-center md:text-start">
                <p class="text-primary font-semibold">Copyright © 2022 | All rights reserved.</p>
              </div>
              <div class="Ckanan mt-3 md:mt-0 md:mr-5">
                <ul class="flex justify-center">
                  <li>
                    <a href="#"><img class="w-[25px] m-1" src="img/dc.png" alt=""></a>
                  </li>
                  <li>
                    <a href="#"><img class="w-[25px] m-1" src="img/linkin.png" alt=""></a>
                  </li>
                  <li>
                    <a href="#"><img class="w-[25px] m-1" src="img/slack.dbb85b3a.png" alt=""></a>
                  </li>
                  <li>
                    <a href="#"><img class="w-[25px] m-1" src="img/twitter.9858c373.png" alt=""></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>

        </section>
      </div>
    </div>
  </section>

  <!-- menu -->
  <div class="relative pb-20">
    <div class="mx-auto container">
      <h1 class="text-center text-slate-800 text-4xl font-bold mb-2">Our Special Dish <button class="hidden" id="edit"><i class='bx bxs-edit'></i></button></h1>
      <p class="text-center text-slate-600 mb-10">Made with premium ingridients.</p>

      <form action="" method="post" class="flex justify-center mb-10">
        <input id="keyword" type="text" name="keyword" placeholder=" Cari Makanan..." autocomplete="off" class="outline-none p-2 rounded-full border-black shadow-xl mr-3">
        <button id="btnSearch" type="submit" name="cari" class="py-2 px-4 bg-primary rounded-full text-white hover:bg-secondary hover:text-primary">Cari</button>
      </form>

      <div id="tableMenu">

        <div class="menu-items lg:grid lg:grid-cols-3 grid md:grid-cols-2 grid-cols-1">
          <?php foreach ($menu as $row) : ?>
            <div onclick="window.location.href=`confirm.php?id=<?= $row['id']; ?>`" id="menumakanan" class="rounded-3xl hover:shadow-lg shadow-md mb-10 md:w-96 mx-auto w-72 cursor-pointer">
              <form method="post" action="confirm.php?id=<?= $row["id"]; ?>">
                <a class="right-0 float-right hidden" href="confirm.php?id=<?= $row["id"]; ?>"><span class="text-red-700 font-bold text-3xl"><i class='bx bxs-edit'></i></span></a>
                <a id="closeEdit" class="right-0 float-right hidden" href="delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('Hapus dari menu?')" ;><span class="text-red-700 font-bold text-3xl"><i class='bx bx-x'></i></span></a>
                <div class="m-7">
                  <img src="img/<?php echo $row["image"]; ?>" class="md:w-80 md:h-80 w-44 h-44 flex justify-center mx-auto">
                </div>
                <h3 class="ml-10 font-bold text-left text-2xl mb-2"><?php echo $row["nama"]; ?></h3>
                <h3 id="deskripsi" class="text-slate-500 mb-2 px-10 text-sm md:text-base"><?php echo $row["desk"]; ?></h3>
                <div class="flex self-center mb-5 justify-between bottom-0">
                  <p class="pl-10 font-bold text-2xl self-center">Rp. <?php echo $row["price"]; ?></p>
                  <button type="submit" name="tambah" class="py-2 px-3 bg-primary rounded-xl text-white hover:bg-secondary hover:text-primary self-center mx-10"><i class='bx bx-plus'></i></button>
                </div>
              </form>
            </div>
          <?php endforeach; ?>
        </div>
        <!-- pagination -->
        <div class="flex justify-center mb-10">
          <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
            <?php if ($i == $activePage) : ?>
              <a class="bg-secondary px-4 py-2 rounded-full text-black hover:shadow-2xl shadow-md m-2" href="?page=<?= $i; ?>"><?= $i; ?></a>
            <?php else : ?>
              <a class="bg-white px-4 py-2 rounded-full text-black hover:shadow-2xl shadow-md m-2" href="?page=<?= $i; ?>"><?= $i; ?></a>
            <?php endif; ?>
          <?php endfor; ?>
        </div>
      </div>
    </div>
  </div>

  <!-- cheff -->
  <section>
    <div class="container mb-40">
      <div class="md:flex flex-wrap">
        <div class="md:w-1/2 self-center md:pr-32">
          <img class="md:hidden" src="img/chef.png" alt="">
          <h1 class="font-bold md:text-5xl mb-3 text-3xl md:pr-32">
            Cooked by the Best Chefs in the world
          </h1>
          <p class="text-slate-500 mb-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam accusantium minus quibusdam fugiat sint velit.</p>
          <p class="font-bold md:pr-52 text-slate-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis eveniet sapiente quisquam aut?</p>
        </div>
        <div class="md:w-1/2 hidden md:block">
          <img src="img/chef.png" alt="">
        </div>
      </div>
    </div>
  </section>

  <!-- customer -->
  <section class="mb-36">
    <div class="container">
      <div class="md:flex flex-wrap">
        <div class="md:w-1/2">
          <img class="md:max-w-[500px]" src="img/vegan4.png" alt="">
        </div>
        <div class="md:w-1/2 self-center md:pr-32">
          <h1 class="font-bold md:text-5xl text-4xl mb-5">
            Customer <br> Say about us
          </h1>
          <div class="flex self-center">
            <img class="w-12 md:w-10 mb-5 md:h-10 mr-2 rounded-full" src="img/saya.jpg" alt="">
            <div>
              <h1 class="font-semibold">Heical Chandra</h1>
              <p class="text-sm">Software Developer</p>
            </div>
          </div>
          <p class="text-slate-500 mb-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam accusantium minus quibusdam fugiat sint velit Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam accusantium minus quibusdam fugiat sint velit.</p>
          <div class="flex text-[#eea042] self-center">
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <p class="ml-5">
              {5.0}
            </p>
          </div>

          <div class="flex float-right">
            <div class="bg-white px-4 py-2 rounded-full text-black font-bold text-lg mr-5 hover:shadow-2xl">
              <i class='bx bx-left-arrow-alt'></i>
            </div>
            <div class="bg-white px-4 py-2 rounded-full text-black hover:shadow-2xl shadow-md">
              <i class='bx bx-right-arrow-alt'></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- banner bottom -->
  <!-- <section class="container flex justify-center mb-36 relative">
    <div style="background-image: url('img/food.jpg');" class="flex justify-center">
      <img class="rounded-3xl w-full h-52 md:h-full" src="img/food.jpg" alt="">
    </div>
    <div class="mx-auto h-full absolute top-0 self-center z-10 md:pt-20 rounded-3xl w-full bg-black bg-opacity-70">
      <div class="flex justify-center mx-auto">
        <div class="mx-auto text-center bg-cover md:pt-10 pt-5 mb-5 text-white">
          <p class="text-center font-semibold md:text-3xl text-2xl mb-5">
            Join our member and <br> get discount up to 50%
          </p>
          <div>
            <form action="" class="flex text-center mx-auto justify-center mb-5">
              <input class="rounded-full mr-2 outline-none text-black px-3" type="text" placeholder="Enter your email">
              <button class="bg-primary rounded-full py-3 px-5 text-white hover:bg-secondary hover:text-primary ">Sign in</button>
            </form>
            <a href="#" class="mt-5">i'am new member</a>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <!-- banner bottom -->
  <section class="container flex justify-center mb-36 relative">
    <div class="flex justify-center">
      <img class="rounded-3xl w-full h-52 md:h-full" src="img/food.jpg" alt="">
    </div>
    <div style="background-image: url('img/food.jpg'); background-position: center;" class="contianer mx-auto h-full absolute top-0 self-center z-10 rounded-3xl w-full">
      <div class="flex justify-center mx-auto h-full bg-black bg-opacity-70 rounded-3xl md:pt-20">
        <div class="mx-auto text-center bg-cover md:pt-10 pt-5 mb-5 text-white">
          <p class="text-center font-semibold md:text-3xl text-2xl mb-5">
            Join our member and <br> get discount up to 50%
          </p>
          <div>
            <form action="" class="flex text-center mx-auto justify-center mb-5">
              <input class="rounded-full mr-2 outline-none text-black px-3" type="text" placeholder="Enter your email">
              <button class="bg-primary rounded-full py-3 px-5 text-white hover:bg-secondary hover:text-primary ">Sign in</button>
            </form>
            <a href="#" class="mt-5">i'am new member</a>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Footer -->
  <section>
    <div class="container self-center md:mb-32 md:flex">
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

  <script src="js/jquery-3.6.1.min.js"></script>
  <script src="script.js"></script>
</body>

</html>