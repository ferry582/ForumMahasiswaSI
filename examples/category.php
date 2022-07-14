<?php
session_start();
$name = $_SESSION['name'];
$id = $_SESSION['id'];
if (empty($_SESSION['name'])) {
  header("location:login.php?pesan=belum_login");
}

include "koneksi.php";
?>
<?php 
$myvar_not_replicated = basename(__FILE__);
include("../includes/header.php") ?>

<body>
  <!-- Sidenav -->
  <?php
  include("../includes/navbar.php") ?>

  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <?php include("../includes/top_nav.php") ?>

    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Category</h6>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <div class="card-header">
              <b> Category Form</b>
            </div>
            <div class="card-header border-0">
              <div class="row align-items-center">
                <form action="inputCategory.php" id="manage-category" method="POST">

                  <div class="card-body">
                    <input type="hidden" name="id">
                    <div class="form-group">
                      <label class="control-label">Name</label>
                      <input type="text" class="form-control" name="cat_name">
                    </div>
                  </div>
                  <div class="card-body">
                    <input type="hidden" name="id">
                    <div class="form-group">
                      <label class="control-label">Description</label>
                      <textarea class="form-control" name="cat_description" cols="30" rows="10"></textarea>
                    </div>
                  </div>

                  <div class="card-footer">
                    <div class="row">
                      <div class="col-md-12">
                        <button class="btn btn-sm btn-primary col-sm-5 offset-md-1" type="submit"> Save</button>
                        <button class="btn btn-sm btn-default col-sm-5" type="reset"> Cancel</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8">

          <div class="card">
            <div class="card-header">
              <b>Category List</b>
            </div>
            <div class="card-header border-0">
              <div class="row align-items-center">

                <div class="card-body">
                  <table class="table table-bordered table-hover">
                    <colgroup>
                      <col width="5%">
                      <col width="75%">
                      <col width="20%">
                    </colgroup>
                    <thead>
                      <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Information</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i = 1;
                      $category = $connect->query("SELECT * FROM categories order by cat_name asc");
                      while ($row = $category->fetch_assoc()) :
                      ?>
                      <tr>
                        <td class="text-center"><?php echo $i++ ?></td>
                        <td class="">
                          <p>Name: <b><?php echo $row['cat_name'] ?></b></p>

                          <p>Description</p>

                          <p><small><i><?php echo $row['cat_description'] ?></i></small></p>

                        </td>
                        <td class="text-center">
                          <a href="topicCategory.php?id=<?php echo $row['cat_id'] ?>">Topic subject</a>
                        </td>
                      </tr>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <style>
  td {
    vertical-align: middle !important;
  }
  </style>
  <!-- Argon Scripts -->
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