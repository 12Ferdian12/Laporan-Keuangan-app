<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
  </head>
  <body >
    <nav class="navbar navbar-expand-lg bg-body-tertiary background-color-blue">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Laporan Keuangan </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="Pengeluaran&Pemasukan.php">Pengeluaran & Pemasukan</a>
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
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
          ADD
        </button>
        <div id="dataKategori"></div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah kategori</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-4">
                    Nama Kategori :
                  </div>
                  <div class="col-8">
                    <input type="text" id="NamaKategori" placeholder="Masukan Nama Kategori" onkeyup="onChange()">
                  </div>
                  <div class="col-12">
                    <span id="alert" class=""></span>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="createKategori()"  data-bs-dismiss="modal">Save</button>
              </div>
            </div>
          </div>
        </div>
     </main>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="script.js"></script>
    
    <script>
      function onChange(){
        let NamaKategori = document.getElementById("NamaKategori").value;
        if(NamaKategori.length > 3 && NamaKategori.length < 10){
          document.getElementById("alert").innerText = "";
          document.getElementById("NamaKategori").style = ""
        } else{
          document.getElementById("NamaKategori").style = "border:1px solid red"
          document.getElementById("alert").innerText = "Nama harus lebih dari 3 digit atau kurang dari 10 digit";
        }
      }

      getDataKategori();

      function createKategori(){

        let NamaKategori = document.getElementById("NamaKategori").value;

        if(NamaKategori.length < 3){
          alert("Nama harus lebih dari 3 digit");
          document.getElementById("NamaKategori").style = "border:1px solid red"
          return;
        }

        if(NamaKategori.length > 10){
          alert("Nama harus kurang dari 10 digit");
          document.getElementById("NamaKategori").style = "border:1px solid red"
          return;
        }

        var data = {
            'NamaKategori' : NamaKategori
        }

        xhr.open('POST', '/JsTrain/Laporan-Keuangan-app/php/Add-kategori.php', true);
        xhr.send(JSON.stringify(data));

        xhr.onload = function () {
            getDataKategori();
        };

        document.getElementById("NamaKategori").value = "";

      }

      function onDelete(KategoriID){
            var data = {
                'KategoriID': KategoriID
            }

            xhr.open('POST', '/JsTrain/Laporan-Keuangan-app/php/Delete-category.php', true);
            xhr.send(JSON.stringify(data));

            xhr.onload = function () {
              getDataKategori();
            };
        }

    </script>
  </body>
</html>