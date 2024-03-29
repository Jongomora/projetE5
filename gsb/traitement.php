<?php
       
    
       session_start();

    

        if(isset( $_POST ['id'],$_POST['pw']))
        {
            include 'connexion.php';
            $id=$_POST ['id'];
            $pw=$_POST['pw'];
       
       if (isset ($_POST ['id']) && isset($_POST['pw'])){
        if($id !== "" && $pw !== "")
        {
        $requete = "SELECT count(*) FROM users where 
        username = '".$id."' and password = '".hash('sha256', $pw)."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
            if($count!=0) // nom d'utilisateur et mot de passe correctes
            {
                $type= "SELECT FROM users type";
              
                if ($type == 'responsable'){
            $_SESSION['id'] = $id;
            header('Location: principale_resp.php');
                }
            else if ($type == 'visiteur'){
                $_SESSION['id'] = $id;
                header('Location: principale.php');
                    }
                
            }
           else {
            header('Location: login.php?erreur==1');          

           }
    }}}

        ?>