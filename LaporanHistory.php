<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan History</title>
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
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Transaksi-ID</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Type</th>
              <th scope="col">Category Name</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Judul</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>
                  <button type="button" class="btn btn-warning">EDIT</button>
                  <button type="button" class="btn btn-danger">DELETE</button>
              </td>
              <td>#</td>
              <td>#</td>
              <td>#</td>
            </tr>
          </tbody>
        </table>
      </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>