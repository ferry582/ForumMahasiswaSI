<?php
session_start();
$name = $_SESSION['name'];
$id = $_SESSION['id'];
if (empty($_SESSION['name'])) {
  header("location:login.php?pesan=belum_login");
}

include "koneksi.php";
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

    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Discussion</h6>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="col">
        <div class="card">
          <div class="col-xl-4">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <br>
                <h2> <b> Reply <b></h2>
                <hr width="970px">
                <?php
                if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                  //someone is calling the file directly, which we don't want
                  echo 'This file cannot be called directly.';
                } else {
                  $sql = "INSERT INTO 
                            posts(post_content,
                                  post_date,
                                  post_topic,
                                  post_by) 
                        VALUES ('" . $_POST['reply-content'] . "',
                                NOW(),
                                " . mysqli_real_escape_string($connect, $_GET['id']) . ",
                                " . $_SESSION['id'] . ")";
                  $result = mysqli_query($connect, $sql);
                  if (!$result) {
                    echo 'Your reply has not been saved, please try again later.';
                  } else {
                    echo 'Your reply has been saved, check out <a href="topic.php?id=' . htmlentities($_GET['id']) . '">the topic</a>.';
                  }
                }
                ?>
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