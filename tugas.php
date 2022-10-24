<?php
$conn = mysqli_connect("localhost", "root", "", "Mahasiswa");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);

    $rows = [];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
};

if(isset($_POST["submit"])) {
    //get data
    $nama = $_POST["nama"];
    $tugas = $_POST["tugas"];
    $uts = $_POST["uts"];
    $uas = $_POST["uas"];
    $image = $_POST["image"];
    //insert data
    $query = "INSERT INTO menu VALUES ('', '$nama', '$tugas', '$uts', '$uas', '$image')";
    mysqli_query($conn, $query);
  
};
$mhsw = query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/output.css" rel="stylesheet">
    <title>Tugas</title>
</head>
<body>
    <section class="flex justify-center mt-20">
        <div class="mx-auto w-full mb-96">
            <div class="flex self-center justify-center">
                <img class="w-20" src="./img/png.png" alt="">
                <div class="self-center">
                    <h1 class="font-semibold text-xl">Data Nilai Mahasiswa</h1>
                    <h1 class="font-bold text-[#008797] text-2xl">Politeknik Negeri Jakarta</h1>
                </div>
            </div>

            <div class="">
            <form method="post" class="mt-20 container">
                <div class="menu-items md:flex md:justify-between mb-20 md:flex-row flex-wrap">
                    <?php foreach($mhsw as $row): ?>
                        <div class="text-center rounded-3xl hover:shadow-lg shadow-md mb-10 w-96 mx-auto">
                            <img src="<?php echo $row["image"]; ?>" class="w-80 h-80 flex justify-center mx-auto rounded-2xl">
                            <h3 class="font-semibold text-center text-xl"><?php echo $row["nama"]; ?></h3>
                            <p class="text-center mb-5">Tugas : <?php echo $row["tugas"]; ?></p>
                            <p class="text-center mb-5">UTS : <?php echo $row["uts"]; ?></p>
                            <p class="text-center mb-5">UAS : <?php echo $row["uas"]; ?></p>
                            <h3 class="text-slate-600 text-center mb-5 px-5 md:px-10">Nilai Akhir : <?php echo ($row["tugas"] + $row["uts"] + $row["uas"]) /3 ; ?></h3>
                    </div>
                <?php endforeach; ?>
                </div>
            </form>
            <button class="bg-[#008797] text-center mx-auto flex text-white px-5 py-3 rounded-full" id="tambah">Tambah Mahasiswa</button>

            <!-- tambah menu -->
            <section id="tambahMenu2" class="w-full bg-white bg-opacity-90 h-full top-0 absolute hidden">
                <div class="flex justify-center">
                <div class="bg-secondary py-20 px-14 mt-32 w-1/3">
                <div>
                <span id="close2" class="font-bold text-3xl float-right text-red-600 cursor-pointer">x</span>
                </div>
                <h1 class="font-bold text-2xl mb-5">Tambah Data Mahasiswa</h1>
                <form action="" method="post">
                    <ul>
                        <li>
                            <p class="font-semibold mb-2"><span class="text-red-700 font-bold">*</span> Nama Mahasiswa</p>
                            <input type="text" name="nama" id="nama" class="rounded-md shadow-lg w-2/3 h-10 mb-5" placeholder=" Nama">
                        </li>
                        <li>
                            <p class="font-semibold mb-2"><span class="text-red-700 font-bold">*</span> Nilai Tugas</p>
                            <input type="number" name="price" id="price" placeholder=" TUGAS" class="rounded-md shadow-lg w-2/3 h-10 mb-5">
                        </li>
                        <li>
                            <p class="font-semibold mb-2"><span class="text-red-700 font-bold">*</span> Nilai UTS</p>
                            <input type="number" name="price" id="price" placeholder=" UTS" class="rounded-md shadow-lg w-2/3 h-10 mb-5">
                        </li>
                        <li>
                            <p class="font-semibold mb-2"><span class="text-red-700 font-bold">*</span> Nilai UAS</p>
                            <input type="number" name="price" id="price" placeholder=" UAS" class="rounded-md shadow-lg w-2/3 h-10 mb-5">
                        </li>
                        <li>
                            <p class="font-semibold mb-2"><span class="text-red-700 font-bold">*</span> Foto Mahasiswa</p>
                            <input type="number" name="price" id="price" placeholder=" Foto" class="rounded-md shadow-lg w-2/3 h-10 mb-5">
                        </li>
                    </ul>
                    <button type="submit" name="submit" class="py-2 px-3 bg-[#008797] rounded-full text-white mt-5">Submit</button>
                </form>
                </div>
                </div>
            </section>
            </div>
        </div>
    </section>

<script src="tugas.js"></script>
</body>
</html>