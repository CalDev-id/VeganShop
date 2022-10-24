<?php 
//koneksi
$conn = mysqli_connect("localhost", "root", "", "menuVShop");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);

    $rows = [];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;

    //get data
    $nama = htmlspecialchars($data["nama"]);
    $price = htmlspecialchars($data["price"]);
    $desk = htmlspecialchars($data["desk"]);

    //upload gambar
    $img = upload();
    if(!$img){
        return false;
    }

    //insert data
    $query = "INSERT INTO menu VALUES ('', '$nama', '$price', '$desk', '$img')";
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES['img'] ['name'];
    $ukuranFile = $_FILES['img'] ['size'];
    $error = $_FILES['img'] ['error'];
    $tmpName = $_FILES['img'] ['tmp_name'];

    //upload check
    if($error === 4){
        echo "
        <script>
          alert('Insert Gambar Makanan!');
        </script>
      ";  
      return false;
    }

    // !image check
    $ekstensiValid = ['jpg', 'png', 'jpeg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if(!in_array($ekstensiGambar, $ekstensiValid)){
        echo "
        <script>
          alert('Yang anda upload bukan gambar');
        </script>
      ";  
      return false;
    }

    // size check
    if($ukuranFile > 4000000){
        echo "
        <script>
          alert('Ukuran gambar terlalu besar!');
        </script>
      ";  
      return false;
    }

    //siap upload
    //generate new file name
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM menu WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function edit($data){
    global $conn;

    //get data
    $id = $data["id"];

    $nama = htmlspecialchars($data["nama"]);
    $price = htmlspecialchars($data["price"]);
    $desk = htmlspecialchars($data["desk"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // check update gambar
    if($_FILES['img']['error']=== 4){
        $img = $gambarLama;
    }else{
        $img = upload();
    }

    //insert data
    $query = "UPDATE menu SET nama = '$nama', price = '$price', desk = '$desk', image = '$img' WHERE id = $id";
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM menu 
        WHERE 
    nama LIKE '%$keyword%'
    ";

    return query($query);
}

function register($data){
    //koneksi
    global $conn;
    
    $namaLengkap = $data["namaLengkap"];
    $email = $data["email"];
    $username = strtolower( stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);

    // username available check
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if(mysqli_fetch_assoc($result)){
        echo "
        <script>
          alert('Username sudah ada!');
        </script>
      "; 
      return false;
    }
    
    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambah user
    mysqli_query($conn, "INSERT INTO user VALUES('', '$namaLengkap', '$email', '$username', '$password' )");
    return mysqli_affected_rows($conn);
}
?>