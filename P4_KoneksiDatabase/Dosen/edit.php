<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

</head>
<body>
<nav class="navbar bg-primary fixed-top">
  <div class="container-fluid"> 
    <a class="navbar-brand" href="read.php">SIMAK</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">SIMAK</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="read.php">Dashboard</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Aksi
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="form.php">Add Data</a></li>
              <li><a class="dropdown-item" href="edit.php">Edit Data</a></li>
              <li><a class="dropdown-item" href="delete.php">Delete Data</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div>
</nav>
    <?php
    include ('koneksi.php');
    $x=$_GET['nidn']; //x itu nim
    $sql= "select * from dosen where nidn= '$x'";
    $exe= $conn -> query($sql);
    $data=$exe->fetch_assoc();
    ?>
    
    <div class="card">
        <div class="card-header">
            Create/Edit Data
        </div>
        <div class="card-body">
        <form action="update.php" method="post">
                <div class="mb-3 row">
                    <label for="nim" class="col-sm-2 col-form-label">NIDN</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nidn" value="<?=$data['nidn'] ?>" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" value="<?=$data['nama'] ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Gender" class="col-sm-2 col-form-label">Gender</label>
                    <div class="col-sm-10">
                    <select name="gender" class="form-select" aria-label="Default select example" value="<?=$data['gender'] ?>">
                        <option selected>Pilih jenis kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                    <select name="jabatan" class="form-select" aria-label="Default select example">
                        <option selected>Pilih jabatan</option>
                        <option value="Rektor">Rektor</option>
                        <option value="Wakil Rektor">Wakil Rektor</option>
                        <option value="Dekan">Dekan</option>
                        <option value="Kaprodi">Kaprodi</option>
                        <option value="Dosen">Dosen</option>
                    </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" value="<?=$data['email'] ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="ponsel" class="col-sm-2 col-form-label">Ponsel</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="ponsel" name="ponsel" value="<?=$data['ponsel'] ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input class="form-control" type="file" name="foto" value="<?=$data['foto'] ?>">
                </div>
                <div class="col-12">
                    <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

</html>