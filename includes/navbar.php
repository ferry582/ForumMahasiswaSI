<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header  align-items-center">
      <a class="navbar-brand" href="javascript:void(0)">
        <img src="../assets/img/brand/blue2.png" class="navbar-brand-img" alt="...">
      </a>
    </div>

    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="<?php 
            if ($myvar_not_replicated == "dashboard.php") {
              echo "nav-link active";
            }else{
              echo "nav-link";
            }?>" href="dashboard.php">
              <i class="ni ni-tv-2 text-primary"></i>
              <span class="nav-link-text">Home</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="<?php 
            if ($myvar_not_replicated == "profile.php" || $myvar_not_replicated == "profileAdmin.php") {
              echo "nav-link active";
            }else{
              echo "nav-link";
            }?>" href="profile.php">
              <i class="ni ni-single-02 text-yellow"></i>
              <span class="nav-link-text">Profile</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="<?php 
            if ($myvar_not_replicated == "category.php") {
              echo "nav-link active";
            }else{
              echo "nav-link";
            }?>" href="category.php">
              <i class="ni ni-tag text-pink"></i>
              <span class="nav-link-text">Category/Tags</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="<?php 
            if ($myvar_not_replicated == "discussion.php" || 
            $myvar_not_replicated == "topicCategory.php" ||
            $myvar_not_replicated == "topic.php" ||
            $myvar_not_replicated == "reply.php" ||
            $myvar_not_replicated == "createTopic.php") {
              echo "nav-link active";
            }else{
              echo "nav-link";
            }?>" href="discussion.php">
              <i class="ni ni-chat-round text-pinkt"></i>
              <span class="nav-link-text">Discussion</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="<?php 
            if ($myvar_not_replicated == "users.php") {
              echo "nav-link active";
            }else{
              echo "nav-link";
            }?>" href="users.php">
              <i class="ni ni-circle-08 text-cyan"></i>
              <span class="nav-link-text">Users</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>