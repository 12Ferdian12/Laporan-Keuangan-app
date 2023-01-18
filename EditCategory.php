<?php
// include database connection file
include_once("./php/database.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id'];
    
    $name=$_POST['name'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
        
    // update user data
    $result = mysqli_query($conn, "UPDATE users SET name='$name',email='$email',mobile='$mobile' WHERE id=$id");
    
    // Redirect to homepage to display updated user in list
    header("Location: LaporanCategory.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetch user data based on id
$result = mysqli_query($conn, "SELECT * FROM kategori WHERE KategoriID=$id");
 
while($kategori_data = mysqli_fetch_array($result))
{
    $kategori_ID = $kategori_data['KategoriID'];
    $nama_kategori = $kategori_data['namaKategori'];
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit LaporanCategory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary ">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Laporan Keuangan </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="Pengeluaran&Pemasukan.php">Pengeluaran & Pemasukan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="LaporanCategory.php">Kategori </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="LaporanReport.php">Report</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="LaporanHistory.php">History</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <main class="container pt-3">
        <form method="post" >
            <div class="mb-3">
              <label for="InputCategoryName" class="form-label">Category Name</label>
              <input type="text" name="CategoryName" class="form-control" 
                id="InputCategoryName" placeholder="Category..." required
                value=<?php echo $nama_kategori;?>>
                <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>