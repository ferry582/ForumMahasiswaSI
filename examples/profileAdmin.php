<?php
session_start();
$name = $_SESSION['name'];
$id = $_SESSION['id'];
if (empty($_SESSION['name'])) {
  header("location:login.php?pesan=belum_login");
}

?>
<?php include("../includes/header.php") ?>

<body>
  <!-- Sidenav -->
  <?php
  $myvar_not_replicated = basename(__FILE__);;
  include("../includes/navbar.php") ?>

  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <?php include("../includes/top_nav.php") ?>

    <?php
    include 'koneksi.php';
    $data = mysqli_query($connect, "SELECT * FROM users WHERE id='$id'");
    while ($hasil = mysqli_fetch_array($data)) {
    ?>
    <!-- Header -->
    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center"
      style="min-height: 500px; background-image: url(../assets/img/theme/cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello <?php echo $hasil['name']; ?>
              <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your
                forum</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="../assets/img/theme/profile_photo.png" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div style="height: 50px;" class="d-flex justify-content-between">
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                </div>
              </div>
              <div class="text-center">
                <h5 class="h3">
                  <?php echo $hasil['name']; ?>
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i><?php echo $hasil['email']; ?>
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i><?php echo $hasil['college']; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Profile </h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" class="form-control" placeholder="Username"
                          value="<?php echo $hasil['name']; ?>" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control"
                          placeholder="<?php echo $hasil['email']; ?>" readonly>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">College information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">University</label>
                        <input id="input-address" class="form-control" placeholder="Home Address"
                          value="<?php echo $hasil['college']; ?>" type="text" readonly>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
              </form>
              <div class="col text-right">
                <a href="users.php" class="btn btn-sm btn-primary">Control Users</a>
              </div>
            </div>
            <?php } ?>
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