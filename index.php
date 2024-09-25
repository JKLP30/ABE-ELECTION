<?php

  // TO CONNECT ON DATABASE
  require_once('Connection/conn.php'); 

  // START SESSION
  if(!isset($_SESSION)) 
  { 
    session_start(); 
  } 
  // CHECK IF THE ['restrictLogin'] 0 OR 1. IF 1 THE SESSION IS LOGGEDIN AND 0 IF THE USER LOGOUT
  $_SESSION['restrictLogin']=0;

  // QUERY TO GET THE ANNOUNCEMENT DESCRIPTION
  $sql="SELECT `desc`
  FROM tbl_announcement
  WHERE status = 1";
  $q = mysqli_query($conn,$sql);
?>

<?php require_once('includes/inc_header.php'); ?>

  <!-- LOGIN FORM -->
    <div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <center><img class="img-responsive" src="assets/img/imagesss.jpg"></center>
          </div>
          <div class="modal-body">
              <div class="row">
                          
                  <div class="col-xs-6">
                      <div class="well">
                        <?php if (isset($_SESSION['errors'])): ?>
    <div class="form-errors">
        <?php foreach($_SESSION['errors'] as $error): ?>
            <p><?php echo $error ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
                          <form id="loginForm" method="POST" action="process.php" novalidate="novalidate">
                              <div class="form-group">

                                  <label for="username" class="control-label">USN</label>
                                  <input type="text" class="form-control" id="usn" name="usn" value="" required="" title="USN" placeholder="USN" autofocus>
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password" placeholder="Password">
                                  <span class="help-block"></span>
                              </div>
                              <button type="submit" name="btnLogin" class="btn btn-success btn-block">Login</button>
                          </form>
                      </div>
                  </div>
                  <div class="col-xs-6 announcement">
                      <p class="lead">Announcement</p>
                      <?php while($row = mysqli_fetch_assoc($q)){ ?>
                      <ul>
                          <li><?= $row['desc'] ?></li>
                      </ul>
                      <?php } ?>  
                  </div>
              </div>
          </div>
      </div>
    </div>
