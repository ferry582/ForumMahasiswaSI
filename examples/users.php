<?php
session_start();
include "koneksi.php";
$name = $_SESSION['name'];
$id = $_SESSION['id'];
if (empty($_SESSION['name'])) {
  header("location:login.php?pesan=belum_login");
}

if ($name != "ferry") {
  echo "<script> alert('Access forbidden for user!');
  window.location.href='dashboard.php'; </script>";
}
?>

<?php include("../includes/header.php") ?>

<body>
  <!-- Sidenav -->
  <?php include("../includes/navbar.php") ?>

  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <?php include("../includes/top_nav.php") ?>

    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Users List</h6>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <div class="col">
                <h3 class="mb-0">Hi Admin, You can choose which users to delete</h3>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <section class="panel">
                  <table class="table table-striped table-advance table-hover">
                    <tbody>
                      <tr>
                        <th> ID User</th>
                        <th><i class="icon_profile"></i> Name</th>
                        <th><i class="icon_mail_alt"></i> College</th>
                        <th><i class="icon_calendar"></i> Email</th>
                        <th><i class="icon_cogs"></i> Action</th>
                      </tr>
                      <?php

                      $query = mysqli_query($connect, "SELECT * FROM users");
                      while ($data = mysqli_fetch_array($query)) { ?>
                      <tr>
                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['name']; ?></td>
                        <td><?php echo $data['college']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <td>
                          <div class="btn-group">
                            <a class="btn btn-danger" href=delete.php?id=<?php echo $data['id']; ?>>Delete</a>
                          </div>
                        </td>
                        <?php }
                        ?>
                      </tr>
                    </tbody>
                  </table>
                </section>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>