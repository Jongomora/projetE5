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

$id_form = $_GET['id_form'];

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

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/compterendu.css">
	<title>formulaire RAPPORT_VISITE</title>
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
			<div id="content-wrapper" class="">
				<div id="content" class="carre">
					<div name="bas" style="background-color:#456BD9;color:white;">
						<form name="compterendu" method="post" action="traitement_modif_CR.php?id_form=<?php echo $id_form; ?>">
                       <?php $reponse = $con->query("SELECT * FROM form_visite WHERE id_form = $id_form ");     //filtrer l’ordre des résultats inverse l'ordre grace a DESC
                        while ($donnees = $reponse->fetch()){
                        ?>
                        <h1> Modification rapport de visite </h1>
							<label class="titre">PRATICIEN :</label>
                            <select name="PRAT_NOM" id="pet-select">
                                            <option value="">Veuillez choisir le practicien</option>
                                            <?php $nom = $con->query("SELECT * FROM practiciens");

                                            while ($data = $nom->fetch()) { ?>
                                                <option value="<?php echo $data['Nom_praticiens']; ?>"><?php echo $data['Nom_praticiens']; ?>, <?php echo  $data['Prenom_praticiens']; ?></option>
                                            <?php } ?>
                                        </select></br>
							<label class="titre">DATE :</label><input type="date" name="RAP_DATE" value="2022-12-05" required /></br>
							<label class="titre">MOTIF :</label><select  name="RAP_MOTIF" class="zone"required ></br>
															<option value="PRD">Périodicité</option>
															<option value="ACT">Actualisation</option>
															<option value="REL">Relance</option>
															<option value="SOL">Sollicitation praticien</option>
															<option value="AUT">Autre</option>
														</select></br>
							<label class="titre">BILAN DE VISITE :</label><textarea rows="5" cols="50" name="RAP_BILAN" class="zone"required ><?php echo $donnees['bilan']; ?></textarea></br>
                            <label class="titre">MEDICAMENT :</label>
                            <select name="MED_NOM" id="pet-select" multiple>
                                
                                            <?php $nom = $con->query("SELECT * FROM medicament");

                                            while ($data = $nom->fetch()) { ?>
                                                <option value="<?php echo $data['nom_commercial']; ?>"><?php echo $data['nom_commercial']; ?></option>
                                            <?php } ?>
                                        </select></br>                            <label class="titre">AVIS DU CONSULTANT : </label><textarea rows="5" cols="50" name="AVIS_VISIT" class="zone" value="Contenu" required ><?php echo $donnees['avis_visiteur']; ?></textarea></br>
							<label class="titre"></label><div class="zone"><input type="submit" id='submit'></input></br>
						
                        <?php } ?>
                        </form>
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