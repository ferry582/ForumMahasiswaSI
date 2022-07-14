<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title><?php
          if ($myvar_not_replicated == "dashboard.php") {
            echo "Home";
          } else if ($myvar_not_replicated == "profile.php" || $myvar_not_replicated == "profileAdmin.php") {
            echo "Profile";
          } else if ($myvar_not_replicated == "category.php") {
            echo "Category/Tags";
          } else if (
            $myvar_not_replicated == "discussion.php" ||
            $myvar_not_replicated == "topicCategory.php" ||
            $myvar_not_replicated == "topic.php" ||
            $myvar_not_replicated == "reply.php" ||
            $myvar_not_replicated == "createTopic.php"
          ) {
            echo "Discussion";
          } else if ($myvar_not_replicated == "users.php") {
            echo "Users";
          } else {
            echo "Forum";
          } ?></title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
</head>