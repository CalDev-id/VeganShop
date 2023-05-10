<?php
require 'function.php';
session_start();

$riwayat = query("SELECT penjualan.namaPembeli, penjualan.nomorMeja, penjualan.jumlahBeli, penjualan.hargaTotal, menu.nama, menu.image FROM penjualan
    join menu on penjualan.idMenu = menu.id
");

?>

<!DOCTYPE html>
<html lang="en" data-thema="cupcake">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet' type='text/css'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="./css/output.css" rel="stylesheet">
    <title>Riwayat</title>

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
                                <a href="index.php" class="text-black py-10 mx-8 flex md:py-2 self-center">Beranda</a>
                            </li>
                            <li class="group">
                                <a href="#" class="text-base text-black py-10 mx-8 flex group-hover:text-primary md:py-2">Artikel</a>
                            </li>
                            <li class="group">
                                <a href="penjualan.php" class="text-base text-primary font-semibold py-10 mx-8 flex group-hover:text-primary md:py-2">Riwayat</a>
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
                <a href="logout.php" class="text-base text-white mx-8 flex group-hover:text-primary md:py-2 px-4 bg-primary rounded-3xl group-hover:bg-white group-hover:shadow-lg py-2 justify-center">Login</a>
              </li>';
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="container flex justify-between mb-20 flex-wrap">
        <div class="kiri md:w-2/3 w-full lg:mr-5">
            <table class="md:w-full mx-auto text-center">
                <tr class="mb-10 shadow-md py-5 h-14">
                    <th class="font-semibold text-sm md:text-base">Produk</th>
                    <th class="font-semibold text-sm md:text-base">Nama Pembeli</th>
                    <th class="font-semibold text-sm md:text-base">Kuantitas</th>
                    <th class="font-semibold text-sm md:text-base">Total Harga</th>
                    <th class="font-semibold text-sm md:text-base">Meja</th>
                </tr>
                <?php foreach ($riwayat as $row) : ?>
                    <tr class="shadow-md h-36">
                        <td>
                            <div class="mx-auto">
                                <h3 class="font-bold mx-auto text-center text-sm md:mx-4 md:text-base text-primary"><?php echo $row["nama"]; ?></h3>
                                <img class="text-center mx-auto md:w-28 w-14 h-14 md:h-28" src="img/<?php echo $row["image"]; ?>" alt="">
                            </div>
                        </td>
                        <td>
                            <h3 class="md:mx-16 flex justify-center text-sm md:text-base mb-2 mx-auto sm:mx-5"><?php echo $row["namaPembeli"]; ?></h3>
                        </td>
                        <td>
                            <h3 class="md:mx-16 mb-2 text-center text-sm md:text-base sm:mx-5"><?php echo $row["jumlahBeli"]; ?></h3>
                        </td>
                        <td>
                            <h3 class="md:mx-5 mb-2 text-center text-sm md:text-base sm:mx-5">Rp. <?php echo $row["hargaTotal"]; ?></h3>
                        </td>
                        <td>
                            <h3 class="md:mx-16 mb-2 text-center text-sm md:text-base sm:mx-5"><?php echo $row["nomorMeja"]; ?></h3>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="kanan shadow-md px-5 h-fit mx-auto w-full md:w-fit">
            <h1 class="mt-5 pr-28 font-bold mb-3">Ringkasan Belanja</h1>
            <div class="flex justify-between">
                <p>Total Terjual</p>
                <p>Rp. <?php echo ($row["hargaTotal"]); ?></p>
            </div>
            <div class="flex justify-between mb-5">
                <p>Barang Terjual</p>
                <p><?php echo ($row["jumlahBeli"]); ?></p>
            </div>
            <div class="flex justify-between mb-5">
                <p class="font-bold">Total Pendapatan</p>
                <p class="font-bold">Rp. <?php echo ($row["hargaTotal"]); ?></p>
            </div>
            <button class="bg-primary text-white font-semibold px-10 py-2 flex mx-auto mb-5 rounded-lg">Tarik</button>
        </div>
    </div>

    <!-- tugas -->
    <canvas id="myChart" style="height:40vh; width:40vw; margin:0 auto;"></canvas>


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
    <script src="script.js"></script>

    <!-- tugas -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const data = {
            labels: [
                'Nut Salad',
                'Green Salad',
                'Steak Sapi',
                'Sate Taichan',
                'Daging'
            ],
            datasets: [{
                label: 'My First Dataset',
                data: [
                    <?php
                    $qry = $conn->query("SELECT idMenu FROM penjualan WHERE idMenu='3'");
                    $resF = $qry->num_rows;
                    echo $resF;
                    ?>,
                    <?php
                    $qry = $conn->query("SELECT idMenu FROM penjualan WHERE idMenu='1'");
                    $resF = $qry->num_rows;
                    echo $resF;
                    ?>,
                                        <?php
                    $qry = $conn->query("SELECT idMenu FROM penjualan WHERE idMenu='38'");
                    $resF = $qry->num_rows;
                    echo $resF;
                    ?>,
                                        <?php
                    $qry = $conn->query("SELECT idMenu FROM penjualan WHERE idMenu='39'");
                    $resF = $qry->num_rows;
                    echo $resF;
                    ?>,
                                        <?php
                    $qry = $conn->query("SELECT idMenu FROM penjualan WHERE idMenu='40'");
                    $resF = $qry->num_rows;
                    echo $resF;
                    ?>
                ],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 62, 235)',
                    'rgb(77, 262, 222)',
                    'rgb(11, 122, 233)',
                    'rgb(90, 112, 255)'
                ],
                hoverOffset: 4
            }]
        };
        const config = {
            type: 'bar',
            data: data,
        };
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</body>

</html>