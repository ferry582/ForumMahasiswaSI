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
                <h2> <b> Create a topic <b></h2>
                <hr width="870px">
                <?php
                if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                  //the form hasn't been posted yet, display it
                  //retrieve the categories from the database for use in the dropdown
                  $result = $connect->query("SELECT cat_id, cat_name, cat_description FROM categories");
                  if (!$result) {
                    //the query failed, uh-oh :-(
                    echo 'Error while selecting from database. Please try again later.';
                  } else {
                    if (mysqli_num_rows($result) == 0) {
                      echo 'Belum ada kategori yang dibuat, silahkan buat kategori terlebih dahulu';
                    } else {
                      echo '<form method="post" action="">'
                ?>
                <div class="card-body">
                  <input type="hidden" name="id">
                  <div class="form-group">
                    <label class="control-label">Subject</label>
                    <input type="text" class="form-control" name="topic_subject">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1" class="">Category</label>
                    <select name="topic_cat" class="form-control" id="exampleFormControlSelect1">
                      <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                              echo '<option value="' . $row['cat_id'] . '">' . $row['cat_name'] . '</option>';
                            } ?>
                    </select>
                  </div>
                  <input type="hidden" name="id">
                  <div class="form-group">
                    <label class="control-label">Message</label>
                    <textarea class="form-control texteditor" name="post_content" cols="15" rows="10"></textarea>
                  </div>
                  <div class="row">
                    <div class="col-md-8">
                      <button class="btn btn-sm btn-primary col-sm-3 offset-md-8" type="submit"> Create Topic</button>
                    </div>
                  </div>
                </div>
                <?php
                      '</form>';
                    }
                  }
                } else {
                  //start the transaction
                  $query  = "BEGIN WORK;";
                  $result = mysqli_query($connect, $query);
                  if (!$result) {
                    //Damn! the query failed, quit
                    echo 'An error occured while creating your topic. Please try again later.';
                  } else {
                    //the form has been posted, so save it
                    //insert the topic into the topics table first, then we'll save the post into the posts table
                    $sql = "INSERT INTO 
                          topics(topic_subject,
                                topic_date,
                                topic_cat,
                                topic_by)
                    VALUES('" . mysqli_real_escape_string($connect, $_POST['topic_subject']) . "',
                                NOW(),
                                " . mysqli_real_escape_string($connect, $_POST['topic_cat']) . ",
                                " . $_SESSION['id'] . "
                                )";

                    $result = mysqli_query($connect, $sql);
                    if (!$result) {
                      //something went wrong, display the error
                      echo 'An error occured while inserting your data. Please try again later.' . mysqli_error($connect);
                      $sql = "ROLLBACK;";
                      $result = mysqli_query($connect, $sql);
                    } else {
                      //the first query worked, now start the second, posts query
                      //retrieve the id of the freshly created topic for usage in the posts query
                      $topicid = mysqli_insert_id($connect,);

                      $sql = "INSERT INTO
                              posts(post_content,
                                    post_date,
                                    post_topic,
                                    post_by)
                          VALUES
                              ('" . mysqli_real_escape_string($connect, $_POST['post_content']) . "',
                                    NOW(),
                                    " . $topicid . ",
                                    " . $_SESSION['id'] . "
                              )";
                      $result = mysqli_query($connect, $sql);
                      if (!$result) {
                        //something went wrong, display the error
                        echo 'An error occured while inserting your post. Please try again later.' . mysqli_error($connect);
                        $sql = "ROLLBACK;";
                        $result = mysqli_query($connect, $sql);
                      } else {
                        $sql = "COMMIT;";
                        $result = mysqli_query($connect, $sql);
                        //after a lot of work, the query succeeded!
                        echo 'You have successfully created <a href="topic.php?id=' . $topicid . '">your new topic</a>';
                      }
                    }
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

  <!-- panggil ckeditor.js -->
  <script type="text/javascript" src="../assets/ckeditor/ckeditor.js"></script>
  <!-- panggil adapter jquery ckeditor -->
  <script type="text/javascript" src="../assets/ckeditor/adapters/jquery.js"></script>
  <!-- setup selector -->
  <script type="text/javascript">
  $('textarea.texteditor').ckeditor();
  </script>

  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>