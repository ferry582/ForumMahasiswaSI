<?php
session_start();
$name = $_SESSION['name'];
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
      <div class="row- d-flex justify-content-center">
        <div class="col">
          <div class="card-header border-0">

            <?php
            //first select the category based on $_GET['cat_id']
            $sql = "SELECT
                        topic_id,
                        topic_subject
                      FROM
                          topics
                      WHERE
                          topic_id = " . mysqli_real_escape_string($connect, $_GET['id']);
            $result = mysqli_query($connect, $sql);
            if (!$result) {
              echo 'The Topics could not be displayed, please try again later.' . mysqli_error($connect);
            } else {
              if (mysqli_num_rows($result) == 0) {
                echo 'This Topic does not exist.';
              } else {
                //display category data
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<h2>Topics in ' . $row['topic_subject'] . '</h2>';
                }
                //do a query for the topics
                $sql = "SELECT
                posts.post_topic,
                posts.post_content,
                posts.post_date,
                posts.post_by,
                users.id,
                users.name
            FROM
                posts
            LEFT JOIN
                users
            ON
                posts.post_by = users.id
            WHERE
                posts.post_topic = " . mysqli_real_escape_string($connect, $_GET['id']);
                $result = mysqli_query($connect, $sql);
                if (!$result) {
                  echo 'The topics could not be displayed, please try again later.';
                } else {
                  if (mysqli_num_rows($result) == 0) {
                    echo 'There are no content in this topic yet.';
                  }
                }
              }
            }
            ?>
            <div class="card">
              <?php if (mysqli_num_rows($result) > 0) : ?>
              <?php while ($row = mysqli_fetch_assoc($result)) : ?>
              <div class="card-body mt--2 mb--4">
                <div class="d-flex flex-start align-items-center">
                  <img class="rounded-circle shadow-1-strong me-3" src="../assets/img/theme/profile_photo.png"
                    alt="avatar" width="60" height="60" />
                  <div class="ml-3">
                    <h5 class="fw-bold text-primary mb-1"><?= $row["name"] ?></h5>
                    <p class="text-muted small mb-0">
                      Shared publicly - <?= $row["post_date"] ?>
                    </p>
                  </div>
                </div>
                <p class="mt-3 mb-4 pb-2">
                  <?= $row["post_content"] ?>
                </p>
              </div>
              <?php endwhile; ?>
              <?php endif; ?>

              <!-- Card footer -->
              <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                <div class="d-flex flex-start w-100">
                  <img class="rounded-circle shadow-1-strong me-3" src="../assets/img/theme/profile_photo.png"
                    alt="avatar" width="40" height="40" />
                  <form method="post" action="reply.php?id=<?php echo $_GET['id'] ?>" class="form-outline w-100 ml-3">
                    <textarea class="form-control" name="reply-content" id="textAreaExample" rows="4"
                      style="background: #fff;"></textarea>
                    <button type="submit" class="btn btn-primary btn-sm mt-3">Post comment</button>
                  </form>
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
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>

  <!-- panggil ckeditor.js -->
  <script type="text/javascript" src="../assets/ckeditor/ckeditor.js"></script>
  <!-- panggil adapter jquery ckeditor -->
  <script type="text/javascript" src="../assets/ckeditor/adapters/jquery.js"></script>
  <!-- setup selector -->
  <script type="text/javascript">
  $('textarea.texteditor').ckeditor();
  </script>
</body>

</html>