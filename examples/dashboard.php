<?php
session_start();
$name = $_SESSION['name'];
$id = $_SESSION['id'];
if (empty($_SESSION['name'])) {
  header("location:login.php?pesan=belum_login");
}
include "koneksi.php";
include("../includes/header.php");
?>

<body>
  <!-- Sidenav -->
  <?php include("../includes/navbar.php") ?>

  <!-- Main content -->
  <div class="main-content" id="panel">

    <!-- Topnav -->
    <?php include("../includes/top_nav.php") ?>

    <!-- Header -->
    <div class="header bg-primary">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Home</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header bg-primary">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <a href="users.php" class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Users</h5>
                      <span
                        class="h2 font-weight-bold mb-0"><?php echo $connect->query("SELECT * FROM users")->num_rows; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-satisfied"></i>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <a href="category.php" class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Forum Topics</h5>
                      <span
                        class="h2 font-weight-bold mb-0"><?php echo $connect->query("SELECT * FROM topics")->num_rows; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-send"></i>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <a href="category.php" class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Tags</h5>
                      <span
                        class="h2 font-weight-bold mb-0"><?php echo $connect->query("SELECT * FROM categories")->num_rows; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-key-25"></i>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->
    <div class="row">
      <div class="col-xl-12 col-md-6">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col-xl-12 containe-fluid">
              <div class="row mt-3 ml-3 mr-3">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                      <h4><i class="fa fa-tags text-primary"></i> Tags</h4>
                      <hr class="divider" style="max-width: 100%">
                      <div class="row">
                        <?php
                        include "koneksi.php";
                        $tags = $connect->query("SELECT * FROM categories order by cat_name asc");
                        while ($row = $tags->fetch_assoc()) :
                        ?>
                        <div class="col-md-3">
                          <div class="card mb-3">
                            <div class="card-body">
                              <p>
                                <large><i class="fa fa-tag text-primary"></i> <b><?php echo $row['cat_name'] ?></b>
                                </large>
                              </p>
                              <hr class="divider" style="max-width: 100%">
                              <p><small><i><?php echo $row['cat_description'] ?></i></small></p>
                            </div>
                          </div>
                        </div>
                        <?php endwhile; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="../assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="../assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>