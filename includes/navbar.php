<style>
.navbar {
  /*overflow: hidden;*/
  background-color: #333;
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 2;
  
}
.navbar a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 5px 5px;
  text-decoration: none;
  font-size: 17px;
}
.navbar a:hover {
  background: #ddd;
  color: black;
}
.main {
  padding: 16px;
  margin-top: 30px;
  height: 1500px; /* Used in this example to enable scrolling */
}</style>

<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <a class="navbar-brand" href="index.php">NavBar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <?php if(isset($_SESSION['id'])){ ?>
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION['name']; ?>
                </a>
                    <div class="dropdown-menu ml-auto" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="profile.php">Profile</a>
                    <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="php/logout.php">LogOut</a>
                    </div>
            </li>

            <?php }else{ ?>

            <li class="nav-item ml-auto">
                <a class="btn btn-success mt-1 m-md-1 px-4" href="login.php">Login</a>
            </li>
            <li class="nav-item ml-auto">
                <a class="btn btn-info mt-1 m-md-1 px-3" href="regis.php">Regis</a>
            </li>
            <?php } ?>
        </ul>
    </div>
</nav>