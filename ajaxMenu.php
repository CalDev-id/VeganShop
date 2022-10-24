<?php
require 'function.php';

//pagination
$MaxData = 3;
$jumlahData = count( query("SELECT * FROM menu"));
$jumlahHalaman = ceil( $jumlahData / $MaxData );

if(isset($_GET["page"])){
  $activePage = $_GET["page"];
} else{
  $activePage = 1;
}
//ternary $activePage = (isset($_GET["page"])) ? $_GET["page"] : 1;
// data start
$dataStart = ($MaxData * $activePage) - $MaxData;


$menu = query("SELECT * FROM menu LIMIT $dataStart, $MaxData");

//start here

$keyword = $_GET["keyword"];
$query = "SELECT * FROM menu 
    WHERE 
nama LIKE '%$keyword%'
";

$menu = query($query);
?>

<form method="post" action="confirm.php">
    <div class="menu-items md:flex md:justify-between mb-2 md:flex-row flex-wrap">
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
    <input class="bg-primary text-center mx-auto flex text-white px-5 py-3 rounded-full hover:bg-secondary hover:text-primary cursor-pointer" type="submit" value="Order">
</form>