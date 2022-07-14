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
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card footer -->
            <div class="card-footer py-4">
              <?php
              //first select the category based on $_GET['cat_id']
              $sql = "SELECT
                      cat_id,
                      cat_name,
                      cat_description
                      FROM
                      categories
                      WHERE
                      cat_id = " . mysqli_real_escape_string($connect, $_GET['id']);
              $result = mysqli_query($connect, $sql);
              if (!$result) {
                echo 'The category could not be displayed, please try again later.' . mysqli_error($connect);
              } else {
                if (mysqli_num_rows($result) == 0) {
                  echo 'This category does not exist.';
                } else {
                  //display category data
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo '<h2>Topics in ' . $row['cat_name'] . ' category</h2>';
                  }
              ?>
              <?php
                  //do a query for the topics
                  $sql = "SELECT  
                              topic_id,
                              topic_subject,
                              topic_date,
                              topic_cat
                          FROM
                              topics
                          WHERE
                              topic_cat = " . mysqli_real_escape_string($connect, $_GET['id']);
                  $result = mysqli_query($connect, $sql);
                  if (!$result) {
                    echo 'The topics could not be displayed, please try again later.';
                  } else {
                    if (mysqli_num_rows($result) == 0) {
                      echo 'There are no topics in this category yet. Add Topics from Discussion page';
                    }
                  }
                }
              }
              ?>
              <?php if (mysqli_num_rows($result) > 0) : ?>
              <?php $i = 0; ?>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Id</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                  <tr>
                    <th scope="row"><?= $i + 1; ?></th>
                    <td><?= $row["topic_id"] ?></td>
                    <td><a href="topic.php?id=<?= $row["topic_id"] ?>"><?= $row["topic_subject"] ?></a></td>
                    <td><?= date('d-m-Y', strtotime($row['topic_date'])) ?></td>
                  </tr>
                  <?php $i++; ?>
                  <?php endwhile; ?>
                </tbody>
              </table>
              <?php endif; ?>
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