
                <!-- Begin Page Content 
			<div id="content-wrapper" class="">
				<div id="content" class="carre">
					<div name="bas" style="background-color:#456BD9;color:white;">
						<form name="compterendu" method="post" action="traitement_compte.php?id_form=<?php echo $id_User; ?>">
                        <?php $reponse = $con->query("SELECT * FROM user WHERE id_User = $id_User ");     //filtrer l’ordre des résultats inverse l'ordre grace a DESC
                        while ($donnees = $reponse->fetch()){
                        ?>
                        <h1> Modification compte </h1>
							<label class="titre"> :</label>
                            <select name="utilisateur" id="pet-select">
                                            <?php $nom = $con->query("SELECT * FROM users");

                                            while ($data = $nom->fetch()) { ?>
                                                <option value="<?php echo $data['']; ?>"><?php echo $data['Nom_praticiens']; ?>, <?php echo  $data['Prenom_praticiens']; ?></option>
                                            <?php } ?>
                                        </select></br>
							<label class="titre">DATE :</label><input type="date" name="RAP_DATE" value="2022-12-05" required /></br>
							<label class="titre">MOTIF :</label><select  name="RAP_MOTIF" class="zone"required ></br>
															
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
						
                        <?php } ?> -->