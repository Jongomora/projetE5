<?php 
include "connexion2.php";
session_start();
if (isset ($_SESSION['id'])){
 $id = $_SESSION ['id'];
$user = $_SESSION['id'];

$users = $con->query("SELECT * FROM users where username = '$user' ");
$donnees = $users->fetch();
$type = $donnees['type'];
$data = $donnees['id_User'];

if(isset( $_SESSION['id'])){  
?>
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
    
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
    
        <title>GSB Admin 2 - Accueil</title>
    
        <!-- Custom fonts for this template-->
        <link href="/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
    
        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
    
    </head>
    
    <body id="page-top">
    
        <!-- Page Wrapper -->
        <div id="wrapper">
    
       <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                    <!-- Sidebar - Brand -->
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                        <div class="sidebar-brand-icon rotate-n-15">
                            <i class="fas fa-laugh-wink"></i>
                        </div>
                        <div class="sidebar-brand-text mx-3">GSB Admin
                        </div>
                    </a>

                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">

                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?id=<?php echo $data; ?>">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Accueil</span></a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Menu
                    </div>


                    <?php
                    if ($type == "visiteur" or $type == "delegue") { ?>
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="compterendu.php?id=<?php echo $data; ?>">
                                <span>Ajoutez un compte rendue</span>
                            </a>
                        </li>


                    <?php }

                    if ($type == "responsable" or  $type == "delegue") { ?>
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="activity_visiteur.php?id=<?php echo $data; ?>">
                                <span>Activité visiteur</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="consulter.php?id=<?php echo $data; ?>">
                                <span>consulter compte utilisateur</span>
                            </a>
                        </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="page_practicien.php?id=<?php echo $data; ?>">
                            <span>Practicien</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="medicament.php?id=<?php echo $data; ?>">
                            <span>Medicament</span>
                        </a>
                    </li><?php
                    if ($type == "responsable") { ?>
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="inscription.php?id=<?php echo $data; ?>">
                                <span>Ajouer un utilisateur</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="new_medicament.php?id=<?php echo $data; ?>">
                                <span>Ajouer un médicament</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="new_praticien.php?id=<?php echo $data; ?>">
                                <span>Ajouer un praticien</span>
                            </a>
                        </li>

                    <?php } ?>
                     <li class="nav-item">
                            <a class="nav-link collapsed" href="logout.php">
                                <span>Se déconnecter</span>
                            </a>
                        </li>
                    
                </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $user;?></span>
                            
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                               
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
    
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
    
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        </div>
    
                        <!-- Content Row -->
    
                        <div class="row">
                       <?php if ($type == "visiteur" or  $type =="delegue"){?>
                            <!-- Area Chart -->
                            <div class="col-xl-15 col-lg-10">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">visiteur</h6>
                                        <div class="dropdown no-arrow">
                                  
                                            <?php
                                            include'connexion2.php';
                                                                                     
                                                echo
                                                '<div class="table-responsive">
                                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>Nom</th>
                                                                <th>Prenom</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>';
                                                        $query = "SELECT * FROM users WHERE type IN ('visiteur') ORDER BY id_User DESC LIMIT 0, 5";
                                                        $reponse = $con->query($query);
                                                             //filtrer l’ordre des résultats inverse l'ordre grace a DESC
                                            while ($donnees = $reponse->fetch()){
                                                echo
                                                            '<tr>
                                                                <td>'.  htmlspecialchars($donnees['nom']) .'</td>
                                                                <td>' . htmlspecialchars($donnees['prenom']) . '</td>
                                                                <td><a href="modif_compte.php?id_form='.htmlspecialchars($donnees['id_User']).'">modifier</a></td>
                                                                
                                                                  
                                                            </tr>';}
                                            $reponse->closeCursor(); //fini la série d'un fletch
                                                echo
                                                        '</tbody>
                                                    </table>
                                                </div>'
                                            ;   //ecrit ce qu'on a récuperer
                                             
    
                                            ?>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-15 col-lg-10">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">delegue</h6>
                                        <div class="dropdown no-arrow">
                                  
                                            <?php
                                            include'connexion2.php';
                                                                                     
                                                echo
                                                '<div class="table-responsive">
                                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>Nom</th>
                                                                <th>Prenom</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>';
                                                        $query = "SELECT * FROM users WHERE type IN ('delegue') ORDER BY id_User DESC LIMIT 0, 5";
                                                        $reponse = $con->query($query);
                                                             //filtrer l’ordre des résultats inverse l'ordre grace a DESC
                                            while ($donnees = $reponse->fetch()){
                                                echo
                                                            '<tr>
                                                                <td>'.  htmlspecialchars($donnees['nom']) .'</td>
                                                                <td>' . htmlspecialchars($donnees['prenom']) . '</td>
                                                                  
                                                                
                                                                  
                                                            </tr>';}
                                            $reponse->closeCursor(); //fini la série d'un fletch
                                                echo
                                                        '</tbody>
                                                    </table>
                                                </div>'
                                            ;   //ecrit ce qu'on a récuperer
                                             
    
                                            ?>
                                        </div>
                            <?php };?>
                        </div>
    
                </div>
                <!-- End of Main Content -->
    
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2021</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
    
            </div>
            <!-- End of Content Wrapper -->
    
        </div>
        <!-- End of Page Wrapper -->
    
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
    
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    
        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
    
        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>
    
        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>
    
    </body>
    
    </html>
    <?php }}
else{
   
    session_destroy();
                      header("location:login.php");
                      exit;
};
?>