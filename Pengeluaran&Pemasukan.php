<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Keuangan</title>
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
                <a class="nav-link active" aria-current="page" href="Pengeluaran&Pemasukan.php">Pengeluaran & Pemasukan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="LaporanCategory.php">Kategori </a>
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
      <main class="container">
          <div class="mb-3">
            <label  class="form-label">Judul</label>
            <input type="text" class="form-control" id="InputJudul">
          </div>
          <div class="mb-3">
            <label class="form-label">Nominal</label>
            <input type="number" class="form-control" id="InputNominal">
          </div>
          <div class="mb-3">
            <label class="form-label">Type</label>
            <select class="form-select" aria-label="Default select example" id="InputType">
              <option value="Pengeluaran">Pengeluaran</option>
              <option value="Pemasukan">Pemasukan</option>
            </select>

          </div>
          <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-select" aria-label="Default select example" id="InputCategory">
              <option selected>Open this select menu</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="InputTanggal">
          </div>
          
          <button class="btn btn-primary"  onclick="submitTransaksi()">Submit</button>
      </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script>
        getCategory()

        document.getElementById("InputTanggal").value = new Date().toISOString().substring(0, 10);

        function getCategory(){

          let InputCategory = ''
          
          xhr.open('GET', '/JsTrain/Laporan-Keuangan-app/php/get-kategori.php', true);
          xhr.send();
          
          xhr.onload = function () {
            let data = JSON.parse(xhr.response);
            console.log(data)
            for(var i = 0; i < data.length; i++){
              InputCategory += '<option value="' + data[i]["KategoriID"] + '">' + data[i]["namaKategori"] + '</option>'
            }
            document.getElementById("InputCategory").innerHTML = InputCategory

          };
        }
        function submitTransaksi(){

          let Judul = document.getElementById("InputJudul").value;
          let Nominal = document.getElementById("InputNominal").value;
          let Type = document.getElementById("InputType").value;
          let Category = document.getElementById("InputCategory").value;
          let Tanggal = document.getElementById("InputTanggal").value;

          if(Judul.length < 3){
            alert("Judul harus lebih dari 3 digit");
            document.getElementById("InputJudul").style = "border:1px solid red"
            return;
          }

          if(Nominal < 50000){
          alert("Nominal harus lebih dari Rp 50.000");
            document.getElementById("InputNominal").style = "border:1px solid red"
            return;
          }

          var data = {
            "Judul": Judul,
            "Nominal": Nominal,
            "Type": Type,
            "KategoriID": Category,
            "Tanggal": Tanggal
          }

          xhr.open('POST', '/JsTrain/Laporan-Keuangan-app/php/Add-transaksi.php', true);
          xhr.send(JSON.stringify(data));

          document.getElementById("InputJudul").value = "";
          document.getElementById("InputNominal").value = "0";

        }
      
    </script>
    
  </body>
</html>