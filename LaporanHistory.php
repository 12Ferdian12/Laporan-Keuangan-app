<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
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
                <a class="nav-link" href="LaporanCategory.php">Kategori </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="LaporanReport.php">Report</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="LaporanHistory.php">History</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <main class="container pt-3"> 
        <div id="dataTransaksi"></div>
      
        
      </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script  type="text/javascript" src="script.js"></script>

    <script>


      getDataTransaksi();

      function onDelete(TransaksiID){
            var data = {
                'TransaksiID': TransaksiID
            }

            xhr.open('POST', '/JsTrain/Laporan-Keuangan-app/php/Delete-transaksi.php', true);
            xhr.send(JSON.stringify(data));

            xhr.onload = function () {
              getDataTransaksi();
            };
        }

    </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
          $('#tableTransaksi').DataTable({
              order: [[0, 'asc']],
          });
        });
    </script>
  </body>
</html>