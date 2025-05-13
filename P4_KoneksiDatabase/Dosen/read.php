<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

</head>

<body>

  <?php
  session_start();
  if (!isset($_SESSION['login'])) {
    header("location:login.php");
  }
  ?>
  
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
</nav>

  <h1>Halo <?= $_SESSION['username'] ?></h1> <br> <br>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">NIM</th>
        <th scope="col">Nama</th>
        <th scope="col">Gender</th>
        <th scope="col">Jabatan</th>
        <th scope="col">Email</th>
        <th scope="col">Ponsel</th>
        <th scope="col">Foto</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include('koneksi.php');
      $username=$_SESSION['username'];
      $sql = "select * from dosen where username='$username'";
      $result = $conn->query($sql);
      while ($data = $result->fetch_assoc()) {
      ?>

        <tr>
          <td><?php echo $data['nidn'] ?></td>
          <td><?php echo $data['nama'] ?></td>
          <td><?php echo $data['gender'] ?></td>
          <td><?php echo $data['jabatan'] ?></td>
          <td><?php echo $data['email'] ?></td>
          <td><?php echo $data['ponsel'] ?></td>
          <td>
            <img src="foto/<?= $data['foto']; ?>"
              width="200" height="200">
          </td>
          <td>
            <!-- untuk memfokuskan ke nim -->
            <a href="edit.php?nidn=<?= $data['nidn'] ?>"><button type="button" class="btn btn-warning">Edit</button></a>
            <a href="delete.php?nidn=<?= $data['nidn'] ?> " onclick="return confirm ('Yakin Nih?')"><button type="button" class="btn btn-danger">Delete</button></a>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>