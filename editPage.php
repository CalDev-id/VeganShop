<?php
require 'function.php';
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

//pagination
$MaxData = 8;
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

//submit data
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet' type='text/css'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="./css/output.css" rel="stylesheet">
    <title>Edit Menu</title>
</head>

<body>
    <!-- NAVBAR -->
    <header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10 mb-5">
        <div class="md:container w-full px-4 md:px-0">
            <div class="flex items-center justify-between relative self-center">
                <div class="px-4">
                    <a href="index.php" class="font-bold text-2xl block py-6">Vege<span class="text-green-600">ty</span></a>
                </div>
                <div class="flex items-center px-4 self-center">
                    <button id="hamburger" class="block absolute right-4 md:hidden">
                        <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
                    </button>
                    <nav id="nav-menu" class="hidden absolute md:py-0 py-5 bg-body w-full right-0 top-full md:block md:static md:bg-transparent md:max-w-full ">
                        <ul class="block h-[100vh] md:flex md:h-full">
                            <li class="group self-center">
                                <a href="index.php" class=" text-black py-10 mx-8 flex md:py-2 self-center">Beranda</a>
                            </li>
                            <li class="group">
                                <a href="#" class="text-base text-black py-10 mx-8 flex group-hover:text-primary md:py-2">Artikel</a>
                            </li>
                            <li class="group">
                                <a href="penjualan.php" class="text-base text-black py-10 mx-8 flex group-hover:text-primary md:py-2">Riwayat</a>
                            </li>
                            <li class="group">
                                <a href="editPage.php" class="text-base   text-primary font-semibold py-10 mx-8 flex group-hover:text-primary md:py-2">Tambah Menu</a>
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
                <a href="logout.php" class="text-bas text-white mx-8 flex group-hover:text-primary md:py-2 px-4 bg-primary rounded-3xl group-hover:bg-white group-hover:shadow-lg">Login</a>
              </li>';
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- menu -->
    <div class="relative pt-40 pb-20">
        <div class="mx-auto container">
            <h1 class="text-center text-slate-800 text-4xl font-bold mb-2">Tambah Menu Makanan <button id="edit"><i class='bx bxs-edit'></i></button></h1>
            <p class="text-center text-slate-600 mb-10">Selalu siap selalu segar.</p>

            <form action="" method="post" class="flex justify-center mb-10">
                <input id="keyword" type="text" name="keyword" placeholder=" Cari Makanan..." autocomplete="off" class="outline-none p-2 rounded-full border-black shadow-xl mr-3">
                <button id="btnSearch" type="submit" name="cari" class="py-2 px-4 bg-primary rounded-full text-white hover:bg-secondary hover:text-primary">Cari</button>
            </form>

            <div id="tableMenu">
                <form method="post" action="confirm.php">
                    <div class="menu-items grid md:grid-cols-2 grid-cols-1">
                        <?php foreach ($menu as $row) : ?>
                            <div class="text-center rounded-3xl hover:shadow-lg shadow-md mb-10 w-[95%] mx-auto">
                                <a id="closeEdit" class="right-0 float-right" href="delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('Hapus dari menu?')" ;><span class="text-red-700 font-bold text-3xl"><i class='bx bx-x'></i></span></a>
                                <a class="right-0 float-right" href="edit.php?id=<?= $row["id"]; ?>"><span class="text-red-700 font-bold text-3xl"><i class='bx bxs-edit'></i></span></a>
                                <div class="flex justify-center self-center">
                                    <div class="self-center">
                                        <img src="img/<?php echo $row["image"]; ?>" class="md:w-32 md:h-32 w-24 h-2/4 flex justify-center mx-auto self-center">
                                    </div>
                                    <div class="w-2/3 self-center">
                                        <h3 class="font-semibold text-center text-xl"><?php echo $row["nama"]; ?></h3>
                                        <p class="text-center mb-5">$<?php echo $row["price"]; ?> (termauk pajak)</p>
                                        <h3 class="text-slate-600 text-center mb-5 px-5 md:px-10 md:block hidden"><?php echo $row["desk"]; ?></h3>
                                    </div>
                                </div>
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
                </form>
            </div>
        </div>
        <!-- tambah menu -->
        <section id="tambahMenu" class="w-full bg-white bg-opacity-90 h-full absolute top-0 hidden">
            <div class="flex justify-center">
                <div class="bg-secondary py-20 px-14 mt-32 w-1/3">
                    <div>
                        <span id="close" class="font-bold text-3xl float-right text-red-600"><i class='bx bx-x'></i></span>
                    </div>
                    <h1 class="font-bold text-2xl mb-5">Tambah Menu Makanan</h1>
                    <form action="" method="post" enctype="multipart/form-data">
                        <ul>
                            <li>
                                <p class="font-semibold mb-2"><span class="text-red-700 font-bold">*</span> Nama Makanan</p>
                                <input type="text" name="nama" id="nama" class="rounded-md shadow-lg w-2/3 h-10 mb-5" placeholder=" Nama" required>
                            </li>
                            <li>
                                <p class="font-semibold mb-2"><span class="text-red-700 font-bold">*</span> Harga Makanan</p>
                                <input type="number" name="price" id="price" placeholder=" Harga" class="rounded-md shadow-lg w-2/3 h-10 mb-5" required>
                            </li>
                            <li>
                                <p class="font-semibold mb-2"><span class="text-red-700 font-bold">*</span> img</p>
                                <input type="file" name="img" id="img" class="rounded-md shadow-lg w-2/3 h-10 mb-5" placeholder=" img">
                            </li>
                            <li>
                                <p class="font-semibold mb-2"><span class="text-red-700 font-bold">*</span> Deskripsi</p>
                                <input type="text" name="desk" id="desk" class="rounded-md shadow-lg w-2/3 h-16" placeholder=" Deskripsi" required>
                            </li>
                        </ul>
                        <button type="submit" name="submit" class="py-2 px-3 bg-primary rounded-full text-white mt-5">Submit</button>
                    </form>
                </div>
            </div>
        </section>
    </div>

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
    <div class="w-full bg-green-700">
        <div class="container py-5">
            <div class="flex justify-between text-white">
                <p>Made by Dynavx / Heical Chandra</p>
                <p>All Right Reserved.</p>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="script.js"></script>
</body>



</html>