<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Report</title>
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
                <a class="nav-link active" href="LaporanReport.php">Report</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="LaporanHistory.php">History</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <main> 
        <div class="container text-center">
          <div class="row my-5">
            <div class="col-5">
              <input type="date" class="form-control" id="InputTanggalFrom">
            </div>
            <div class="col-2">
              to
            </div>
            <div class="col-5">
              <input type="date" class="form-control" id="InputTanggalTo">
            </div>
            <div class="col-12 mt-2">
              <button type="button" class="btn btn-primary" id="ButtonInput">Cari</button>
            </div>
          </div>
          <div class="row g-2">
            <div class="col-12">
              <div class="border border-dark border-3">
                <div class="row g-2">
                  <div class="col-12">
                    <div class="p-3 text-start">Balance</div>
                  </div>
                  <div class="col-12">
                    <div class="h2 p-3 text-end" id="BalanceValue" >Rp.150.000</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="border border-dark border-3">
                <div class="row g-2">
                  <div class="col-12">
                    <div class="p-3 text-start">Income</div>
                  </div>
                  <div class="col-12">
                    <div class="h2 p-3 text-end" id="IncomeValue">Rp.150.000</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="border border-dark border-3">
                <div class="row g-2">
                  <div class="col-12">
                    <div class="p-3 text-start">Spending</div>
                  </div>
                  <div class="col-12">
                    <div class="h2 p-3 text-end" id="SpendingValue">Rp.150.000</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="script.js"></script>
    <script>
      getDataReport()
    </script>
  </body>
</html>