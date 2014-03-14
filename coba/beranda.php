<body>
  <?php 
  session_start();
  if($_SESSION){
     $user = $_SESSION['user_admin'];
     ?>
<nav class="navbar-menu">
  <div class="wrapper">
     <h2><a href="#">Personal SIAKAD</a></h2>[ <a href="index.php">Logout &raquo;</a> ]
     <section class="topbar pull-right">
        <ul class="menu">
           <li><a href="#">Beranda</a></li>
           <li class="divide"></li>
           <li class="collapsible"><a href="#">Informasi Akademik</a>
              <ul>
                 <li><a href="#">Jadwal Kuliah</a></li>
                 <li class="divider"></li>
                 <li><a href="#">Tugas</a></li>
                 <li class="divider"></li>
                 <li><a href="#">Materi Perkuliahan</a></li>
                 <li class="divider"></li>
                 <li><a href="#">Transkrip Nilai</a></li>
                 <li class="divider"></li>
                 <li><a href="#">KRS</a></li>
              </ul>
           </li>
        </ul>
     </section>
  </div>
</nav>
<?php } else {
     echo "<script>alert('Login dulu!');</script>";
     echo "<meta http-equiv='Refresh' content='0; URL=index.php'>";
} 
?>