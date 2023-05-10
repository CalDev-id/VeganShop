<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet' type='text/css'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="./css/output.css" rel="stylesheet">
    <title>Artikel</title>
</head>

<body>
    <!-- NAVBAR -->
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
    <!-- cheff -->
    <section>
        <div class="container mb-40">
            <div class="md:flex flex-wrap">
                <div class="md:w-1/2 self-center md:pr-32">
                    <img class="md:hidden" src="img/chef.png" alt="">
                    <h1 class="font-bold md:text-5xl mb-3 text-3xl md:pr-32">
                        Selamat Datang Di Resort Vegety
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
    <script src="script.js"></script>
</body>

</html>