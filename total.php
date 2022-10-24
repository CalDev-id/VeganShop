

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total</title>
</head>
<body>
    <div class="flex justify-center">
        <p>ayam</p>
    <div>
    <?php 

if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $harga=$_POST['harga'];
    $jumlah=$_POST['jumlah'];
  
    $total = $harga * $jumlah;
  
        if(isset($_POST['diskon'])){
            $diskon=$total * 95/100;
            echo"Nama Barang :$name <br>";
            echo"Harga Barang : $harga <br>";
            echo"Jumlah Barang : $jumlah <br>";
            echo"Diskon :5% <br>";
            echo"Total  : $diskon";
        }else{
            echo" Nama Barang :$name <br> 
            Harga Barang : $harga <br> 
            Jumlah Barang : $jumlah <br>
            Diskon :0% <br> Total  : $total";
        }
  
    }


// $name = $_POST['name'];
// $harga = $_POST['harga'];
// $jumlah = $_POST['jumlah'];

// $diskon = $_POST['diskon'];


// $total = $harga * $jumlah;

// echo "Nama Barang : $name <br>";
// echo "Harga Barang : $harga <br>";
// echo "Jumlah Barang : $jumlah <br>";



// if ($diskon == 1){
//     echo "Diskon : 5% <br>";
//     $diDiskon = $total * 95 / 100;
//     echo "Total : $diDiskon <br>";
// } else {
//     echo "Diskon : 0% <br>";
//     echo "Total : $total <br>";
// }
?>
    </div>
    </div>
</body>
</html>