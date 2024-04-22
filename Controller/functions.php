<?php
include '../config.php';
include '../Model/crudpanel.php';
class admincrudpanel
{

    function upditem($pic,$brand,$modele,$prix,$reviews,$ndp,$clima,$vitesse,$carburant,$catego,$id){
         $sql = "UPDATE `vehicule` SET `img`='$pic',`marque`='$brand',`model`='$modele',`prix`='$prix',`reviews`='$reviews',`nb_place`='$ndp',`ac`='$clima',`boite`='$vitesse',`carburant`='$carburant',`id_c`='$catego' WHERE `idVehicule`='$id'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            return "OK!";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function upditemrent($pic,$brand,$modele,$prix,$reviews,$ndp,$clima,$vitesse,$carburant,$catego,$id){
         $sql = "UPDATE `carslouer` SET `img`='$pic',`marque`='$brand',`model`='$modele',`prix`='$prix',`reviews`='$reviews',`nb_place`='$ndp',`ac`='$clima',`boite`='$vitesse',`carburant`='$carburant',`id_c`='$catego' WHERE `idVehicule`='$id'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            return "OK!";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function statistiques()
    {
        $sql = "SELECT marque,count(*) from vehicule group by marque ";

        $db = config::getConnexion();
        try
        {
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e)
        {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function deleteproduitr($id){
        $sql = "DELETE FROM `carslouer` WHERE idVehicule='$id'";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        try {
            $req->execute();
            return "OK!";
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function deletecatego($id){
        $sql = "DELETE FROM `list_categ` WHERE id='$id'";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        try {
            $req->execute();
            return "OK!";
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function deleteproduit($id){
        $sql = "DELETE FROM `vehicule` WHERE idVehicule='$id'";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        try {
            $req->execute();
            return "OK!";
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function getsingletype($id)
    {
        $sql = "SELECT lista FROM list_categ WHERE list_categ.id=:id";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }

    function addpiece($pic,$mod,$prix,$poid,$fabriquant,$etap,$catego){
        $sql = "INSERT INTO `listpiece`(`idp`, `img`, `nompiece`, `prixpiece`, `poidspiece`, `pays`, `etatp`, `category`) VALUES (NULL,'$pic','$mod','$prix','$poid','$fabriquant','$etap','$catego')";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            return "OK!";
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function piecexist($id){
        $sql="SELECT * FROM `listpiece` WHERE idp='$id'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            if($query->rowCount()==0){
                return "LEE!";
            }
            return "OK!";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function getallvatpi(){
        $sql = "SELECT * FROM categorypiece";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function getexactpiece($id){
        $sql="SELECT * FROM `listpiece` WHERE idp='$id'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updpiece($pic,$mod,$prix,$poid,$fabriquant,$etap,$catego,$idf){
        $sql = "UPDATE `listpiece` SET  `img`='$pic',`nompiece`='$mod',`prixpiece`='$prix',`poidspiece`='$poid',`pays`='$fabriquant',`etatp`='$etap',`category`= '$catego' WHERE idp='$idf'";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            return "OK!";
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }


    function deletepiece($id)
    {
        $sql = "DELETE FROM listpiece WHERE idp  = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function getsingletypepiece($id)
    {
        $sql = "SELECT nom_cat FROM categorypiece WHERE categorypiece.idCategory=:id";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }



    function getAllMembers()
    {
        $sql = "SELECT * FROM `users`";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            return $query->rowCount();
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function getAllpiece()
    {
        $sql = "SELECT * FROM `listpiece`";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            return $query->rowCount();
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function getAllblogs()
    {
        $sql = "SELECT * FROM `bloglist`";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            return $query->rowCount();
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function getAllcars()
    {
        $sql = "SELECT * FROM `vehicule`";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            return $query->rowCount();
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }

    function simplecheck($usermail, $tokenAccess)
    {
        $sql = "SELECT * FROM `resetpassword` WHERE email='$usermail' AND hash='$tokenAccess' AND done='0'";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            if ($query->rowCount() != 0)
            {
                return "OK";
            }
            else
            {
                return "NO";
            }
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }

    }

    function updatepasswordAPI($email, $token, $newpassword)
    {
        $sql = "UPDATE `resetpassword` SET done='1' WHERE email='$email' AND hash='$token'";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->execute();
        $nouvelle = md5($newpassword);
        $sql = "UPDATE `users` SET pasw='$nouvelle' WHERE email='$email'";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->execute();
        return "OK";
    }

    function addReserv($carid, $fullname, $phonenumber, $emailc, $debut, $fin, $totalprice)
    {
        $sql = "INSERT INTO `rentcars`(`id`, `carid`, `fullname`, `phonenumber`, `email`, `debut`, `fin`, `prix`) VALUES (NULL,'$carid','$fullname','$phonenumber','$emailc','$debut','$fin','$totalprice')";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            return "OK";
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }

    }
    function getexactcarrent($id)
    {
        $sql = "SELECT * FROM carslouer WHERE idVehicule='$id'";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function getexactcar($id)
    {
        $sql = "SELECT * FROM vehicule WHERE idVehicule='$id'";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function generaterent(){
        $contents = '';
        $sql = "SELECT * FROM carslouer";
        $db = config::getConnexion();
        $query = $db->query($sql);
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $contents .= "
            <tr>
                <td>".$row['marque']." ".$row['model']."</td>
                <td>".$row['prix']." TND</td>
                <td>".$row['nb_place']."</td>
                <td>".$row['boite']."</td>
            ";
            $contents .="<td>".$row['carburant']."</td>";
            $contents .= "</tr>";
        }
        return $contents;
    }


    function generatesell(){
        $contents = '';
        $sql = "SELECT * FROM vehicule";
        $db = config::getConnexion();
        $query = $db->query($sql);
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $contents .= "
            <tr>
                <td>".$row['marque']." ".$row['model']."</td>
                <td>".$row['prix']." TND</td>
                <td>".$row['nb_place']."</td>
                <td>".$row['boite']."</td>
            ";
            $contents .="<td>".$row['carburant']."</td>";
            $contents .= "</tr>";
        }
        return $contents;
    }

    function getexactcarlouer($id)
    {
        $sql = "SELECT * FROM carslouer WHERE idVehicule='$id'";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }

    function getAllitemsr()
    {
        $sql = "SELECT * FROM carslouer";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function getAllitems()
    {
        $sql = "SELECT * FROM vehicule";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function getalllist()
    {
        $sql = "SELECT lista FROM list_categ";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }

    function getalllist0()
    {
        $sql = "SELECT * FROM list_categ";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function count4mef($marque)
    {
        $sql = "SELECT * FROM vehicule WHERE marque='$marque'";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            return $query->rowCount();
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }

    function getmydetails($email)
    {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }

    function getLastFacture()
    {
        $db = config::getConnexion();
        $DB = new config();

        $sql = "SELECT * FROM facture ORDER BY ID DESC LIMIT 1";
        $db = config::getConnexion();
        try
        {
            $lastFactureanier = $db->prepare($sql);
            $lastFactureanier->execute();

            foreach ($lastFactureanier as $ta3b)
            {
                return $ta3b['id'];
            }

        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }

    }

    function getIDUser($email)
    {
        $sql = "SELECT id FROM users WHERE email='$email'";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            foreach ($query as $ta3b)
            {
                return $ta3b['id'];
            }
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }

    }

    function getPanierProduct()
    {
        $db = config::getConnexion();
        $DB = new config();

        $sql = "SELECT * FROM ligne_panier lp inner join vehicule v on lp.id_vehicule = v.idVehicule   where lp.id_panier = " . $this->getLastPanier();
        $req = $db->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    function getPanierProductPiece()
    {
        $db = config::getConnexion();
        $DB = new config();
        $sql = "SELECT * FROM ligne_panier lp  inner join  listpiece p on lp.id_piece = p.idp   where lp.id_panier = " . $this->getLastPanier();
        $req = $db->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    function getLastPanier()
    {
        $db = config::getConnexion();
        $DB = new config();

        $lastPanier = $DB->query('SELECT * FROM panier WHERE paye=0 and id_user = ' . $_SESSION['id'] . ' ORDER BY ID DESC LIMIT 1');
        $id_panier = 0;
        if (!empty($lastPanier))
        {
            $id_panier = $lastPanier[0]->id;
        }
        else
        {
            $sql = "INSERT INTO panier  (paye,id_user)
                  VALUES (:paid , :id_user)";

            try
            {

                $query = $db->prepare($sql);
                $query->execute(['paid' => 0, 'id_user' => $_SESSION['id']]);
                $lastPanier = $DB->query('SELECT * FROM panier WHERE paye=0 ORDER BY ID DESC LIMIT 1');
                $id_panier = $lastPanier[0]->id;
            }
            catch(Exception $e)
            {
                echo 'Error: ' . $e->getMessage();
                die();
            }
        }
        return $id_panier;
    }

    function addToPanier($id_vehicule, $id_piece)
    {
        $db = config::getConnexion();
        $DB = new config();
        $sql = "";
        if ($id_vehicule != 0)
        {

            $sql = "INSERT INTO ligne_panier (id_vehicule , id_panier)
            VALUES (:id_vehicule,:id_panier)";
            try
            {

                $query = $db->prepare($sql);
                $query->execute(['id_vehicule' => $id_vehicule, 'id_panier' => $this->getLastPanier() , ]);
            }
            catch(Exception $e)
            {
                echo 'Error: ' . $e->getMessage();
                die();
            }
        }

        if ($id_piece != 0)
        {
            $sql = "INSERT INTO ligne_panier (id_piece , id_panier)
    VALUES (:id_piece,:id_panier)";
            try
            {

                $query = $db->prepare($sql);
                $query->execute(['id_piece' => $id_piece, 'id_panier' => $this->getLastPanier() , ]);
            }
            catch(Exception $e)
            {
                echo 'Error: ' . $e->getMessage();
                die();
            }
        }

        header('Location: panier.php');

    }

    function getTotal()
    {
        $total = 0;
        foreach ($this->getPanierProduct() as $value)
        {
            $total += $value->prix * $value->quantite;
        }

        foreach ($this->getPanierProductPiece() as $value)
        {
            $total += $value->prixpiece * $value->quantite;
        }
        return $total;
    }

    function deleteFromPanier($id_ligne_panier)
    {
        $db = config::getConnexion();
        $DB = new config();
        $sql = "DELETE FROM ligne_panier WHERE id = :id_ligne";

        try
        {

            $query = $db->prepare($sql);
            $query->execute(['id_ligne' => $id_ligne_panier]);
        }
        catch(Exception $e)
        {
            echo 'Error: ' . $e->getMessage();
            die();
        }

    }

    function editQuantite($quantite, $ligne_panier_id)
    {
        $db = config::getConnexion();
        $DB = new config();
        $sql = "UPDATE ligne_panier set quantite = :qq WHERE id = :id_ligne";

        try
        {

            $query = $db->prepare($sql);
            $query->execute(['qq' => $quantite, 'id_ligne' => $ligne_panier_id]);
        }
        catch(Exception $e)
        {
            echo 'Error: ' . $e->getMessage();
            die();
        }
    }

    function editPanier($id_panier)
    {
        $db = config::getConnexion();
        $DB = new config();
        $sql = "UPDATE panier set paye = 1 WHERE id = :panier";

        try
        {

            $query = $db->prepare($sql);
            $query->execute(['panier' => $id_panier]);
        }
        catch(Exception $e)
        {
            echo 'Error: ' . $e->getMessage();
            die();
        }
    }

    function createFacture()
    {
        $db = config::getConnexion();
        $DB = new config();
        $sql = "INSERT INTO facture (id_panier) VALUES (:id_panier)";
        try
        {
            $query = $db->prepare($sql);
            $query->execute(['id_panier' => $this->getLastPanier() , ]);
        }
        catch(Exception $e)
        {
            echo 'Error: ' . $e->getMessage();
            die();
        }
        $this->editPanier($this->getLastPanier());
        header('Location: facture.php?id_facture=' . $this->getLastFacture());

    }

    function getFacture($id_facture)
    {
        $db = config::getConnexion();
        $DB = new config();
        $sql = "SELECT * FROM facture where id = " . $id_facture;
        try
        {

            $facture = $db->prepare($sql);
            $facture->execute();
            foreach ($facture as $ta3b)
            {
                return $ta3b;
            }
        }
        catch(Exception $e)
        {
            echo 'Error: ' . $e->getMessage();
            die();
        }
    }

    function getFactureProducts($id_facture)
    {
        $db = config::getConnexion();
        $DB = new config();
        $facure = 'SELECT * FROM facture where id = ' . $id_facture;
        $req = $db->prepare($facure);
        $req->execute();

        $list = 'SELECT * FROM ligne_panier lp inner join vehicule v on lp.id_vehicule = v.idVehicule where lp.id_panier = ' . $req->fetchAll(PDO::FETCH_OBJ) [0]->id_panier;
        $req2 = $db->prepare($list);
        $req2->execute();
        return $req2->fetchAll(PDO::FETCH_OBJ);
    }

    function getFactureProductsPiece($id_facture)
    {
        $db = config::getConnexion();
        $DB = new config();
        $facure = 'SELECT * FROM facture where id = ' . $id_facture;
        $req = $db->prepare($facure);
        $req->execute();
        $list = $DB->query('SELECT * FROM ligne_panier lp inner join listpiece p on lp.id_piece = p.idp where lp.id_panier = ' . $req->fetchAll(PDO::FETCH_OBJ) [0]
            ->id_panier);
        return $list;
    }

    function getTotalFacture($id_facture)
    {
        $total = 0;
        foreach ($this->getFactureProducts($id_facture) as $value)
        {
            $total += $value->prix * $value->quantite;
        }
        foreach ($this->getFactureProductsPiece($id_facture) as $value)
        {
            $total += $value->prixpiece * $value->quantite;
        }
        return $total;
    }

    function getAllPanierWithFacture($idUser)
    {
        $db = config::getConnexion();
        $DB = new config();
        $sql = "SELECT p.* , (f.id) as id_facture FROM `panier` p left join facture f on f.id_panier = p.id where p.id_user = " . $idUser;
        $req = $db->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);

    }
    function getPanierProductById($idCmmande)
    {
        $db = config::getConnexion();
        $DB = new config();
        $sql = 'SELECT * FROM ligne_panier lp inner join vehicule v on lp.id_vehicule = v.idVehicule where lp.id_panier = ' . $idCmmande;
        $req = $db->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);

    }

    function addcategop($catego)
    {
        $db = config::getConnexion();
        $query = $db->prepare("SELECT * FROM `categorypiece` WHERE `nom_cat`='$catego'");
        try{
            $query->execute();
            $n=$query->rowCount();
            if($n!=0){
                return "EXIST!";
            }
            $query = $db->prepare("INSERT INTO `categorypiece`(`idCategory`, `nom_cat`) VALUES (Null,'$catego')");
            $query->execute();
            return "OK!";
        }
        catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function addcatego($catego)
    {
        $db = config::getConnexion();
        $query = $db->prepare("SELECT * FROM `list_categ` WHERE `lista`='$catego'");
        try{
            $query->execute();
            $n=$query->rowCount();
            if($n!=0){
                return "EXIST!";
            }
            $query = $db->prepare("INSERT INTO `list_categ`(`id`, `lista`) VALUES (Null,'$catego')");
            $query->execute();
            return "OK!";
        }
        catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function deletecategop($id){
        $sql = "DELETE FROM `categorypiece` WHERE idCategory='$id'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function getlistcategp(){
        $sql = 'SELECT * FROM categorypiece';
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function getlistcateg(){
        $sql = 'SELECT * FROM list_categ';
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function getListcategoriepiece()
    {
        $sql = 'SELECT * FROM categorypiece';
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function getListPiece()
    {
        $sql = 'SELECT * FROM listpiece ORDER BY prixpiece DESC';
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function count4me($marque)
    {
        $sql = "SELECT * FROM listpiece WHERE category='$marque'";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            return $query->rowCount();
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function signup($firstname, $lastname, $email, $password, $phonenumber, $ip)
    {
        $sql1 = "SELECT * FROM users WHERE email='$email'";
        $sql2 = "SELECT * FROM users WHERE phonenumber='$phonenumber'";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql1);
            $query->execute();
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
        if (!$query->rowCount() == 0)
        {
            return "ALREADY";
        }
        try
        {
            $query = $db->prepare($sql2);
            $query->execute();
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
        if (!$query->rowCount() == 0)
        {
            return "ALREADYP";
        }

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://v2.namsor.com/NamSorAPIv2/api2/json/genderBatch',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{"personalNames":[{"id":"b590b04c-da23-4f2f-a334-aee384ee420a","firstName":"' . $firstname . '","lastName": "' . $lastname . '"}]}',
            CURLOPT_HTTPHEADER => array(
                'X-API-KEY: f0f02db8d7a8e683bbb81dbe2668d29c',
                'Accept: application/json',
                'Content-Type: application/json'
            ) ,
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $behy = json_decode($response, true);
        $finally = $behy["personalNames"][0]["likelyGender"];
        $passwox = md5($password);
        $sql = "INSERT INTO `users`(`id`, `nom`, `prenom`, `gender`, `email`, `pasw`, `phonenumber`, `type`, `verified`, `ip`) VALUES (NULL,'$firstname','$lastname','$finally','$email','$passwox','$phonenumber','1','0','$ip')";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            $hash = md5(rand(pow(10, 3 - 1) , pow(10, 3) - 1));
            $res = $db->query("INSERT INTO `verificationmail`(`id`, `email`, `token`, `done`) VALUES (NULL,'$email','$hash','0')");
            require 'sendgrid/vendor/autoload.php';
            $emaixl = new \SendGrid\Mail\Mail();
            $emaixl->setFrom("amir.othman@esprit.tn", "AlphAuto");
            $emaixl->setSubject("Lien de vérification de votre adresse e-mail  🏆");
            $emaixl->addTo($email, "AMIR OTHMAN");
            $lien_Arij = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $linkrezz = $lien_Arij . "verify.php?email=" . $email . "&token=" . $hash;
            $emaixl->addContent("text/html", '<!DOCTYPE html><html><head><meta charset="utf-8"><meta http-equiv="x-ua-compatible" content="ie=edge"><title>Email Confirmation</title><meta name="viewport" content="width=device-width, initial-scale=1"><style type="text/css">@media screen { @font-face {font-family: \'Source Sans Pro\';font-style: normal;font-weight: 400;src: local(\'Source Sans Pro Regular\'), local(\'SourceSansPro-Regular\'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format(\'woff\'); } @font-face {font-family: \'Source Sans Pro\';font-style: normal;font-weight: 700;src: local(\'Source Sans Pro Bold\'), local(\'SourceSansPro-Bold\'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format(\'woff\'); }}body,table,td,a { -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;}table,td { mso-table-rspace: 0pt; mso-table-lspace: 0pt;}img { -ms-interpolation-mode: bicubic;}a[x-apple-data-detectors] { font-family: inherit !important; font-size: inherit !important; font-weight: inherit !important; line-height: inherit !important; color: inherit !important; text-decoration: none !important;}div[style*="margin: 16px 0;"] { margin: 0 !important;}body { width: 100% !important; height: 100% !important; padding: 0 !important; margin: 0 !important;}table { border-collapse: collapse !important;}a { color: #1a82e2;}img { height: auto; line-height: 100%; text-decoration: none; border: 0; outline: none;}</style></head><body style="background-color: #e9ecef;"><div class="preheader" style="display: none; max-width: 0; max-height: 0; overflow: hidden; font-size: 1px; line-height: 1px; color: #fff; opacity: 0;"> A preheader is the short summary text that follows the subject line when an email is viewed in the inbox.</div><table border="0" cellpadding="0" cellspacing="0" width="100%"> <tr><td align="center" bgcolor="#e9ecef"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="center" valign="top" style="padding: 36px 24px;"><a href="https://www.esprit.tn" target="_blank" style="display: inline-block;"> <img src="https://i.imgur.com/FG3o6Gz.png" alt="Logo" border="0" width="300" style="display: block; width: 48px; max-width: 300px; min-width: 300px;"></a></td> </tr></table></td> </tr> <tr><td align="center" bgcolor="#e9ecef"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="left" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; border-top: 3px solid #d4dadf;"><h1 style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">Confirmez votre adresse email 🧩</h1></td> </tr></table></td> </tr> <tr><td align="center" bgcolor="#e9ecef"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;"><p style="margin: 0;">Cher(e) ' . $email . ',<br><br>Appuyez sur le bouton ci-dessous pour confirmer votre adresse e-mail. Si vous n\'avez pas créé de compte, vous pouvez supprimer cet e-mail en toute sécurité.</p></td> </tr> <tr><td align="left" bgcolor="#ffffff"><table border="0" cellpadding="0" cellspacing="0" width="100%"> <tr><td align="center" bgcolor="#ffffff" style="padding: 12px;"><table border="0" cellpadding="0" cellspacing="0"> <tr><td align="center" bgcolor="red" style="border-radius: 6px;"><a href="' . $linkrezz . '" target="_blank" style="display: inline-block; padding: 16px 36px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; color: #ffffff; text-decoration: none; border-radius: 6px;">Vérifiez maintenant</a></td> </tr></table></td> </tr></table></td> </tr> <tr><td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;"><p style="margin: 0;">Si cela ne fonctionne pas, copiez et collez le lien suivant dans votre navigateur:</p><p style="margin: 0;"><a href="' . $linkrezz . '" target="_blank">' . $linkrezz . '</a></p></td> </tr> <tr><td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-bottom: 3px solid #d4dadf"><p style="margin: 0;">Cordialement,<br> ©AlphAuto Team</p></td> </tr></table></td> </tr> <tr><td align="center" bgcolor="#e9ecef" style="padding: 24px;"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="center" bgcolor="#e9ecef" style="padding: 12px 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; color: #666;"><p style="margin: 0;">Vous avez reçu cet e-mail car nous avons reçu une demande de vérification de votre compte. Si vous ne l\'avez pas demandé, vous pouvez supprimer cet e-mail en toute sécurité.</p></td> </tr></table></td> </tr></table></body></html>');
            $sendgrid = new \SendGrid(''); //add Your Sendgrid Key HERE
            $response = $sendgrid->send($emaixl);
            return "DONE";
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function getRealIpAddr()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
        {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    function logout()
    {
        //session_start();
        session_unset();
        session_destroy();
        header("Location: index.php");
    }
    function updatepassword($email, $currentpassword, $newpassword)
    {
        $db = config::getConnexion();
        try
        {
            $password = md5($currentpassword);
            $sql = "SELECT * FROM users WHERE email='$email' AND pasw='$password'";
            $query = $db->prepare($sql);
            $query->execute();
            if ($query->rowCount() == 0)
            {
                return "WRONGPASSWORD";
            }
            else
            {
                $npassword = md5($newpassword);
                $nsql = "UPDATE users SET pasw='$npassword' WHERE email='$email'";
                $quercy = $db->prepare($nsql);
                $quercy->execute();
                return "DONE";
            }
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }

    }
    function getfeedback(){
        $sql = "SELECT * FROM feedbacks";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }

    function getunreadfeedback(){
        $sql = "SELECT * FROM feedbacks WHERE seen='0'";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            return $query->rowCount();
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }

    function getexactfeed($id){
        $sql = "SELECT * FROM feedbacks WHERE id='$id'";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function savereply($idMessage,$Replym,$emailV){
        $sql="INSERT INTO `myreplies`(`id`, `idfeed`, `reply`) VALUES (Null,'$idMessage','$Replym')";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            require 'sendgrid/vendor/autoload.php';
            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("amir.othman@esprit.tn", "AlphAuto");
            $email->setSubject("Nous avons répondu à votre question 👍");
            $email->addTo($emailV, "AMIR OTHMAN");
            $email->addContent("text/html", '<!DOCTYPE html><html><head><meta charset="utf-8"><meta http-equiv="x-ua-compatible" content="ie=edge"><title>Email Confirmation</title><meta name="viewport" content="width=device-width, initial-scale=1"><style type="text/css">@media screen { @font-face {font-family: \'Source Sans Pro\';font-style: normal;font-weight: 400;src: local(\'Source Sans Pro Regular\'), local(\'SourceSansPro-Regular\'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format(\'woff\'); } @font-face {font-family: \'Source Sans Pro\';font-style: normal;font-weight: 700;src: local(\'Source Sans Pro Bold\'), local(\'SourceSansPro-Bold\'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format(\'woff\'); }}body,table,td,a { -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;}table,td { mso-table-rspace: 0pt; mso-table-lspace: 0pt;}img { -ms-interpolation-mode: bicubic;}a[x-apple-data-detectors] { font-family: inherit !important; font-size: inherit !important; font-weight: inherit !important; line-height: inherit !important; color: inherit !important; text-decoration: none !important;}div[style*="margin: 16px 0;"] { margin: 0 !important;}body { width: 100% !important; height: 100% !important; padding: 0 !important; margin: 0 !important;}table { border-collapse: collapse !important;}a { color: #1a82e2;}img { height: auto; line-height: 100%; text-decoration: none; border: 0; outline: none;}</style></head><body style="background-color: #e9ecef;"><div class="preheader" style="display: none; max-width: 0; max-height: 0; overflow: hidden; font-size: 1px; line-height: 1px; color: #fff; opacity: 0;"> A preheader is the short summary text that follows the subject line when an email is viewed in the inbox.</div><table border="0" cellpadding="0" cellspacing="0" width="100%"> <tr><td align="center" bgcolor="#e9ecef"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="center" valign="top" style="padding: 36px 24px;"><a href="https://www.esprit.tn" target="_blank" style="display: inline-block;"> <img src="https://i.imgur.com/FG3o6Gz.png" alt="Logo" border="0" width="300" style="display: block; width: 48px; max-width: 300px; min-width: 300px;"></a></td> </tr></table></td> </tr> <tr><td align="center" bgcolor="#e9ecef"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="left" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; border-top: 3px solid #d4dadf;"><h1 style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">Nous avons répondu à votre question 👍 </h1></td> </tr></table></td> </tr> <tr><td align="center" bgcolor="#e9ecef"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;"><p style="margin: 0;">Cher(e) ' . $emailV . ' 👋🏼,<br><br>Merci pour ton e-mail ❤️ .<br><br>'.$Replym.'.</p></td> </tr> <tr><td align="left" bgcolor="#ffffff"></td> </tr> <tr><td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-bottom: 3px solid #d4dadf"><p style="margin: 0;">Cordialement,<br> ©AlphAuto Team</p></td> </tr></table></td> </tr> <tr><td align="center" bgcolor="#e9ecef" style="padding: 24px;"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="center" bgcolor="#e9ecef" style="padding: 12px 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; color: #666;"><p style="margin: 0;">Vous avez reçu cet e-mail car nous avons vu que vous êtes allé nous contacter. Si vous ne l\'avez pas demandé, vous pouvez supprimer cet e-mail en toute sécurité.</p></td> </tr></table></td> </tr></table></body></html>');
            $sendgrid = new \SendGrid(''); //add Your Sendgrid Key HERE
            $response = $sendgrid->send($email);
            return "DONE";
        }
        catch(Exception $e)
        {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function didireplytofeed($feedid){
        $sql = "SELECT * FROM myreplies WHERE idfeed='$feedid'";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function getmylastreply($feedid){
        $sql = "SELECT * FROM myreplies WHERE idfeed='$feedid' ORDER BY ID DESC LIMIT 1";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function generateRowPiece(){
        $contents = '';
        $sql = "SELECT * FROM listpiece";
        $db = config::getConnexion();
        $query = $db->query($sql);
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $contents .= "
            <tr>
                <td>".$row['nompiece']."</td>
                <td>".$row['prixpiece']." TND</td>
                <td>".$row['poidspiece']."</td>
                <td>".$row['pays']."</td>
                <td>".$row['etatp']."</td>
                <td>".$row['category']."</td>
            </tr>
            ";
        }
        return $contents;
    }

    function addfeedback($firstname, $lastname, $emacil, $phonenumber, $message, $ip)
    {
        $sql = "INSERT INTO `feedbacks`(`id`, `firstname`, `lastname`, `phonenumber`, `email`, `message`, `ip` ,`seen`) VALUES (NULL,'$firstname','$lastname','$phonenumber','$emacil','$message','$ip','0')";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            require 'sendgrid/vendor/autoload.php';
            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("amir.othman@esprit.tn", "AlphAuto");
            $email->setSubject("Nous avons reçu votre message 👍");
            $email->addTo($emacil, "AMIR OTHMAN");
            $email->addContent("text/html", '<!DOCTYPE html><html><head><meta charset="utf-8"><meta http-equiv="x-ua-compatible" content="ie=edge"><title>Email Confirmation</title><meta name="viewport" content="width=device-width, initial-scale=1"><style type="text/css">@media screen { @font-face {font-family: \'Source Sans Pro\';font-style: normal;font-weight: 400;src: local(\'Source Sans Pro Regular\'), local(\'SourceSansPro-Regular\'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format(\'woff\'); } @font-face {font-family: \'Source Sans Pro\';font-style: normal;font-weight: 700;src: local(\'Source Sans Pro Bold\'), local(\'SourceSansPro-Bold\'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format(\'woff\'); }}body,table,td,a { -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;}table,td { mso-table-rspace: 0pt; mso-table-lspace: 0pt;}img { -ms-interpolation-mode: bicubic;}a[x-apple-data-detectors] { font-family: inherit !important; font-size: inherit !important; font-weight: inherit !important; line-height: inherit !important; color: inherit !important; text-decoration: none !important;}div[style*="margin: 16px 0;"] { margin: 0 !important;}body { width: 100% !important; height: 100% !important; padding: 0 !important; margin: 0 !important;}table { border-collapse: collapse !important;}a { color: #1a82e2;}img { height: auto; line-height: 100%; text-decoration: none; border: 0; outline: none;}</style></head><body style="background-color: #e9ecef;"><div class="preheader" style="display: none; max-width: 0; max-height: 0; overflow: hidden; font-size: 1px; line-height: 1px; color: #fff; opacity: 0;"> A preheader is the short summary text that follows the subject line when an email is viewed in the inbox.</div><table border="0" cellpadding="0" cellspacing="0" width="100%"> <tr><td align="center" bgcolor="#e9ecef"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="center" valign="top" style="padding: 36px 24px;"><a href="https://www.esprit.tn" target="_blank" style="display: inline-block;"> <img src="https://i.imgur.com/FG3o6Gz.png" alt="Logo" border="0" width="300" style="display: block; width: 48px; max-width: 300px; min-width: 300px;"></a></td> </tr></table></td> </tr> <tr><td align="center" bgcolor="#e9ecef"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="left" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; border-top: 3px solid #d4dadf;"><h1 style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">Nous avons reçu votre message 👍 </h1></td> </tr></table></td> </tr> <tr><td align="center" bgcolor="#e9ecef"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;"><p style="margin: 0;">Cher(e) ' . $firstname . ' 👋🏼,<br><br>Merci pour ton e-mail ❤️ , Nous l\'avons reçu  😁.<br><br>Un représentant du service client vous contactera dans la journée.</p></td> </tr> <tr><td align="left" bgcolor="#ffffff"></td> </tr> <tr><td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-bottom: 3px solid #d4dadf"><p style="margin: 0;">Cordialement,<br> ©AlphAuto Team</p></td> </tr></table></td> </tr> <tr><td align="center" bgcolor="#e9ecef" style="padding: 24px;"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="center" bgcolor="#e9ecef" style="padding: 12px 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; color: #666;"><p style="margin: 0;">Vous avez reçu cet e-mail car nous avons vu que vous êtes allé nous contacter. Si vous ne l\'avez pas demandé, vous pouvez supprimer cet e-mail en toute sécurité.</p></td> </tr></table></td> </tr></table></body></html>');
            $sendgrid = new \SendGrid('');//add Your Sendgrid Key HERE
            $response = $sendgrid->send($email);
            return "DONE";
        }
        catch(Exception $e)
        {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function getFullName()
    {
        $db = config::getConnexion();
        try
        {
            $sql = "SELECT * FROM config";
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function getdetails($email)
    {
        $db = config::getConnexion();
        try
        {
            $sql = "SELECT * FROM users WHERE email='$email'";
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function askforadmin($email)
    {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            foreach ($query as $ta3b)
            {
                if ($ta3b['type'] == 0)
                {
                    $isitadmin = 'oui';
                }
                else
                {
                    $isitadmin = 'non';
                }
            }
            return $isitadmin;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function updatesitedetails($sitename,$siteemail,$sitephone,$siteaddress,$sitefacebook,$siteinsta,$siteyoutube,$idsite){
        $sql = "UPDATE `config` SET `sitename`='$sitename',`email`='$siteemail',`phonenumber`='$sitephone',`address`='$$siteaddress',`fb`='$sitefacebook',`insta`='$siteinsta',`yt`='$siteyoutube' WHERE `id`='$idsite'";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            return "OK!";
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function updateadmindetails($myfirstname,$mylastname,$myemail){
        $sql = "UPDATE `users` SET `nom`='$myfirstname',`prenom`='$mylastname' WHERE `email`='$myemail'";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            return "OK!";
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function resultupdateadminpassword($currentpassword,$newpassword,$mail){
        $npsw = md5($newpassword);
        $cpsw = md5($currentpassword);
        $sql1 = "SELECT * FROM users WHERE email='$mail' AND pasw='$cpsw'";
        $sql2 = "UPDATE users SET pasw='$npsw' WHERE email='$mail'";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql1);
            $query->execute();
            if($query->rowCount() == 0){
                return "NO!";
            }
            $query = $db->prepare($sql2);
            $query->execute();
            return "OK!";
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }






    function simplecheckverification($usermail, $tokenAccess)
    {
        $sql = "SELECT * FROM `verificationmail` WHERE email='$usermail' AND token='$tokenAccess' AND done='0'";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            if ($query->rowCount() != 0)
            {
                return "OK";
            }
            else
            {
                return "NO";
            }
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }

    }

    function verificationEmail($email, $token)
    {
        $sql1 = "DELETE FROM `verificationmail` WHERE email='$email' AND token='$token'";
        $sql2 = "UPDATE `users` SET `verified`='1' WHERE `email`='$email'";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql1);
            $query->execute();
            $query = $db->prepare($sql2);
            $query->execute();
            return true;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }

    function login($email, $password)
    {
        $db = config::getConnexion();
        try
        {
            $password = md5($password);
            $sql = "SELECT * FROM users WHERE email='$email' AND pasw='$password'";
            $query = $db->prepare($sql);
            $query->execute();
            if ($query->rowCount() == 0)
            {
                return '0';
            }
            foreach ($query as $ta3b)
            {
                if ($ta3b['verified'] == 0)
                {
                    return '1';
                }
                if ($ta3b['type'] == 0)
                {
                    $isitadmin = 'oui';
                }
                else
                {
                    $isitadmin = 'non';
                }
            }
            return $isitadmin;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function sendblogparmail($emailu,$blogid){
        require 'sendgrid/vendor/autoload.php';
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("amir.othman@esprit.tn", "AlphAuto");
        $email->setSubject("Il faut lire ce blog 📮");
        $email->addTo($emailu, "AMIR OTHMAN");
        $linkrezz = "http://localhost/ESPRIT/view/blog-detail.php?id=".$blogid;
        $email->addContent("text/html", '<!DOCTYPE html><html><head><meta charset="utf-8"><meta http-equiv="x-ua-compatible" content="ie=edge"><title>Email Confirmation</title><meta name="viewport" content="width=device-width, initial-scale=1"><style type="text/css">@media screen { @font-face {font-family: \'Source Sans Pro\';font-style: normal;font-weight: 400;src: local(\'Source Sans Pro Regular\'), local(\'SourceSansPro-Regular\'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format(\'woff\'); } @font-face {font-family: \'Source Sans Pro\';font-style: normal;font-weight: 700;src: local(\'Source Sans Pro Bold\'), local(\'SourceSansPro-Bold\'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format(\'woff\'); }}body,table,td,a { -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;}table,td { mso-table-rspace: 0pt; mso-table-lspace: 0pt;}img { -ms-interpolation-mode: bicubic;}a[x-apple-data-detectors] { font-family: inherit !important; font-size: inherit !important; font-weight: inherit !important; line-height: inherit !important; color: inherit !important; text-decoration: none !important;}div[style*="margin: 16px 0;"] { margin: 0 !important;}body { width: 100% !important; height: 100% !important; padding: 0 !important; margin: 0 !important;}table { border-collapse: collapse !important;}a { color: #1a82e2;}img { height: auto; line-height: 100%; text-decoration: none; border: 0; outline: none;}</style></head><body style="background-color: #e9ecef;"><div class="preheader" style="display: none; max-width: 0; max-height: 0; overflow: hidden; font-size: 1px; line-height: 1px; color: #fff; opacity: 0;"> A preheader is the short summary text that follows the subject line when an email is viewed in the inbox.</div><table border="0" cellpadding="0" cellspacing="0" width="100%"> <tr><td align="center" bgcolor="#e9ecef"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="center" valign="top" style="padding: 36px 24px;"><a href="https://www.esprit.tn" target="_blank" style="display: inline-block;"> <img src="https://i.imgur.com/FG3o6Gz.png" alt="Logo" border="0" width="300" style="display: block; width: 48px; max-width: 300px; min-width: 300px;"></a></td> </tr></table></td> </tr> <tr><td align="center" bgcolor="#e9ecef"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="left" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; border-top: 3px solid #d4dadf;"><h1 style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">Il faut lire ce blog 📮️ </h1></td> </tr></table></td> </tr> <tr><td align="center" bgcolor="#e9ecef"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;"><p style="margin: 0;">Cher(e) ' . $emailu . ',<br><br>Vous devez lire ce blog 📜 , je suis sûr que vous l\'aimerez  🥰 : </p></td> </tr> <tr><td align="left" bgcolor="#ffffff"><table border="0" cellpadding="0" cellspacing="0" width="100%"> <tr><td align="center" bgcolor="#ffffff" style="padding: 12px;"><table border="0" cellpadding="0" cellspacing="0"> <tr><td align="center" bgcolor="red" style="border-radius: 6px;"><a href="' . $linkrezz . '" target="_blank" style="display: inline-block; padding: 16px 36px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; color: #ffffff; text-decoration: none; border-radius: 6px;">accès au blog</a></td> </tr></table></td> </tr></table></td> </tr> <tr><td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;"><p style="margin: 0;">Si cela ne fonctionne pas, copiez et collez le lien suivant dans votre navigateur:</p><p style="margin: 0;"><a href="' . $linkrezz . '" target="_blank">' . $linkrezz . '</a></p></td> </tr> <tr><td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-bottom: 3px solid #d4dadf"><p style="margin: 0;">Cordialement,<br> ©AlphAuto Team</p></td> </tr></table></td> </tr> <tr><td align="center" bgcolor="#e9ecef" style="padding: 24px;"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="center" bgcolor="#e9ecef" style="padding: 12px 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; color: #666;"><p style="margin: 0;">Vous avez reçu cet e-mail car nous avons reçu une demande de envoyer le lien de blog vers votre e-mail . Si vous ne l\'avez pas demandé, vous pouvez supprimer cet e-mail en toute sécurité.</p></td> </tr></table></td> </tr></table></body></html>');
        $sendgrid = new \SendGrid(''); //add Your Sendgrid Key HERE
        $response = $sendgrid->send($email);
        return "CBON";
    }
    function reset($emaxil)
    {
        $db = config::getConnexion();
        $res = $db->query("SELECT * FROM users WHERE email='$emaxil'");
        $nbr = $res->rowCount();
        if ($nbr == 0) return "INVALIDEMAIL";
        else
        {
            $hash = md5(rand(pow(10, 3 - 1) , pow(10, 3) - 1));
            $res = $db->query("SELECT * FROM resetpassword WHERE hash='$hash'");
            $nbr = $res->rowCount();
            if ($nbr == 0)
            {
                $res = $db->query("INSERT INTO `resetpassword`(`id`, `email`, `hash`, `done`) VALUES (NULL,'$emaxil','$hash','0')");
                require 'sendgrid/vendor/autoload.php';
                $email = new \SendGrid\Mail\Mail();
                $email->setFrom("amir.othman@esprit.tn", "AlphAuto");
                $email->setSubject("Réinitialisez votre mot de passe ⚙️");
                $email->addTo($emaxil, "AMIR OTHMAN");
                $lien_Arij = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                $linkrezz = $lien_Arij . "/change.php?email=" . $emaxil . "&token=" . $hash;
                $email->addContent("text/html", '<!DOCTYPE html><html><head><meta charset="utf-8"><meta http-equiv="x-ua-compatible" content="ie=edge"><title>Email Confirmation</title><meta name="viewport" content="width=device-width, initial-scale=1"><style type="text/css">@media screen { @font-face {font-family: \'Source Sans Pro\';font-style: normal;font-weight: 400;src: local(\'Source Sans Pro Regular\'), local(\'SourceSansPro-Regular\'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format(\'woff\'); } @font-face {font-family: \'Source Sans Pro\';font-style: normal;font-weight: 700;src: local(\'Source Sans Pro Bold\'), local(\'SourceSansPro-Bold\'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format(\'woff\'); }}body,table,td,a { -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;}table,td { mso-table-rspace: 0pt; mso-table-lspace: 0pt;}img { -ms-interpolation-mode: bicubic;}a[x-apple-data-detectors] { font-family: inherit !important; font-size: inherit !important; font-weight: inherit !important; line-height: inherit !important; color: inherit !important; text-decoration: none !important;}div[style*="margin: 16px 0;"] { margin: 0 !important;}body { width: 100% !important; height: 100% !important; padding: 0 !important; margin: 0 !important;}table { border-collapse: collapse !important;}a { color: #1a82e2;}img { height: auto; line-height: 100%; text-decoration: none; border: 0; outline: none;}</style></head><body style="background-color: #e9ecef;"><div class="preheader" style="display: none; max-width: 0; max-height: 0; overflow: hidden; font-size: 1px; line-height: 1px; color: #fff; opacity: 0;"> A preheader is the short summary text that follows the subject line when an email is viewed in the inbox.</div><table border="0" cellpadding="0" cellspacing="0" width="100%"> <tr><td align="center" bgcolor="#e9ecef"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="center" valign="top" style="padding: 36px 24px;"><a href="https://www.esprit.tn" target="_blank" style="display: inline-block;"> <img src="https://i.imgur.com/FG3o6Gz.png" alt="Logo" border="0" width="300" style="display: block; width: 48px; max-width: 300px; min-width: 300px;"></a></td> </tr></table></td> </tr> <tr><td align="center" bgcolor="#e9ecef"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="left" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; border-top: 3px solid #d4dadf;"><h1 style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">Réinitialisez votre mot de passe ⚙️ </h1></td> </tr></table></td> </tr> <tr><td align="center" bgcolor="#e9ecef"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;"><p style="margin: 0;">Cher(e) ' . $emaxil . ',<br><br>veuillez cliquer sur le bouton ci-dessous afin de changer votre mot de passe : </p></td> </tr> <tr><td align="left" bgcolor="#ffffff"><table border="0" cellpadding="0" cellspacing="0" width="100%"> <tr><td align="center" bgcolor="#ffffff" style="padding: 12px;"><table border="0" cellpadding="0" cellspacing="0"> <tr><td align="center" bgcolor="red" style="border-radius: 6px;"><a href="' . $linkrezz . '" target="_blank" style="display: inline-block; padding: 16px 36px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; color: #ffffff; text-decoration: none; border-radius: 6px;">Update Password</a></td> </tr></table></td> </tr></table></td> </tr> <tr><td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;"><p style="margin: 0;">Si cela ne fonctionne pas, copiez et collez le lien suivant dans votre navigateur:</p><p style="margin: 0;"><a href="' . $linkrezz . '" target="_blank">' . $linkrezz . '</a></p></td> </tr> <tr><td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-bottom: 3px solid #d4dadf"><p style="margin: 0;">Cordialement,<br> ©AlphAuto Team</p></td> </tr></table></td> </tr> <tr><td align="center" bgcolor="#e9ecef" style="padding: 24px;"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="center" bgcolor="#e9ecef" style="padding: 12px 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; color: #666;"><p style="margin: 0;">Vous avez reçu cet e-mail car nous avons reçu une demande de modifier de votre mot de passe. Si vous ne l\'avez pas demandé, vous pouvez supprimer cet e-mail en toute sécurité.</p></td> </tr></table></td> </tr></table></body></html>');
                $sendgrid = new \SendGrid(''); //add Your Sendgrid Key HERE
                $response = $sendgrid->send($email);
                return "CBON";
            }
        }
    }
    function getgender($firstname, $lastname)
    {
        $firstname = strval($firstname);
        if (strlen(strval($lastname)) < 1)
        {
            $lastname = "Othman";
        }
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://v2.namsor.com/NamSorAPIv2/api2/json/genderBatch',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{"personalNames":[{"id":"b590b04c-da23-4f2f-a334-aee384ee420a","firstName":"' . $firstname . '","lastName": "' . $lastname . '"}]}',
            CURLOPT_HTTPHEADER => array(
                'X-API-KEY: f0f02db8d7a8e683bbb81dbe2668d29c',
                'Accept: application/json',
                'Content-Type: application/json'
            ) ,
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $behy = json_decode($response, true);
        return $behy["personalNames"][0]["likelyGender"];
    }
    function Allproducts()
    {
        $db = config::getConnexion();
        try
        {
            $sql = "SELECT * FROM bloglist";
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }

    function Alltthreeblogs()
    {
        $db = config::getConnexion();
        try
        {
            $sql = "SELECT * FROM bloglist Limit 3";
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function additemr($pic,$brand,$modele,$prix,$reviews,$ndp,$clima,$vitesse,$carburant,$catego){
        $sql="INSERT INTO `carslouer`(`idVehicule`, `img`, `marque`, `model`, `prix`, `reviews`, `nb_place`, `ac`, `boite`, `carburant`,`id_c`) VALUES (Null,'$pic','$brand','$modele','$prix','$reviews','$ndp','$clima','$vitesse','$carburant','$catego')";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            return "OK!";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    


    function additem($pic,$brand,$modele,$prix,$reviews,$ndp,$clima,$vitesse,$carburant,$catego){
        $sql="INSERT INTO `vehicule`(`idVehicule`, `img`, `marque`, `model`, `prix`, `reviews`, `nb_place`, `ac`, `boite`, `carburant`,`id_c`) VALUES (Null,'$pic','$brand','$modele','$prix','$reviews','$ndp','$clima','$vitesse','$carburant','$catego')";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            return "OK!";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function carexistS($id){
        $sql="SELECT * FROM `vehicule` WHERE idVehicule='$id'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            if($query->rowCount()==0){
                return "LEE!";
            }
            return "OK!";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function editcategop($id,$new)
    {
        $db = config::getConnexion();
        $query = $db->prepare("UPDATE `categorypiece` SET `nom_cat`='$new' WHERE idCategory='$id'");
        try{
            $query->execute();

        }
        catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function editcatego($id,$new)
    {
        $db = config::getConnexion();
        $query = $db->prepare("UPDATE `list_categ` SET `lista`='$new' WHERE id='$id'");
        try{
            $query->execute();

        }
        catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function categist($id){
        $sql="SELECT * FROM `list_categ` WHERE id='$id'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function categistp($id){
        $sql="SELECT * FROM `categorypiece` WHERE idCategory='$id'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function categpxist($id){
        $sql="SELECT * FROM `categorypiece` WHERE idCategory='$id'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            if($query->rowCount()==0){
                return "LEE!";
            }
            return "OK!";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function categoxistS($id){
        $sql="SELECT * FROM `list_categ` WHERE id='$id'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            if($query->rowCount()==0){
                return "LEE!";
            }
            return "OK!";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function carexistR($id){
        $sql="SELECT * FROM `carslouer` WHERE idVehicule='$id'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            if($query->rowCount()==0){
                return "LEE!";
            }
            return "OK!";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

    ////////////
    function Allcarssell()
    {
        $db = config::getConnexion();
        try
        {
            $sql = "SELECT * FROM vehicule";
            $query = $db->prepare($sql);
            $query->execute();
            $totalPages = ceil($query->rowCount() / 4);
            return $totalPages;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }

    function Allcarslouer()
    {
        $db = config::getConnexion();
        try
        {
            $sql = "SELECT * FROM carslouer";
            $query = $db->prepare($sql);
            $query->execute();
            $totalPages = ceil($query->rowCount() / 4);
            return $totalPages;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }

    function Allpiecesexll()
    {
        $db = config::getConnexion();
        try
        {
            $sql = "SELECT * FROM listpiece";
            $query = $db->prepare($sql);
            $query->execute();
            $totalPages = ceil($query->rowCount() / 4);
            return $totalPages;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }

    function Allpiecepanel()
    {
        $db = config::getConnexion();
        try
        {
            $sql = "SELECT * FROM listpiece ";
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function didireply($id){
        $db = config::getConnexion();
        try
        {
            $sql = "SELECT * FROM `answerlocation` WHERE request_id='$id'";
            $query = $db->prepare($sql);
            $query->execute();
            if($query->rowCount()==0){
                return "LEE!";
            }
            return "OUIII";
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        } 

    }

    function sendmailreply($cmail,$replyz){
        require 'sendgrid/vendor/autoload.php';
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("amir.othman@esprit.tn", "AlphAuto");
        $email->setSubject("A propos de votre demande de location de voiture");
        $email->addTo($cmail, "AMIR OTHMAN");
        if($replyz!="ok"){
            $email->addContent("text/html", '<!DOCTYPE html><html><head><meta charset="utf-8"><meta http-equiv="x-ua-compatible" content="ie=edge"><title>Email Confirmation</title><meta name="viewport" content="width=device-width, initial-scale=1"><style type="text/css">@media screen { @font-face {font-family: \'Source Sans Pro\';font-style: normal;font-weight: 400;src: local(\'Source Sans Pro Regular\'), local(\'SourceSansPro-Regular\'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format(\'woff\'); } @font-face {font-family: \'Source Sans Pro\';font-style: normal;font-weight: 700;src: local(\'Source Sans Pro Bold\'), local(\'SourceSansPro-Bold\'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format(\'woff\'); }}body,table,td,a { -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;}table,td { mso-table-rspace: 0pt; mso-table-lspace: 0pt;}img { -ms-interpolation-mode: bicubic;}a[x-apple-data-detectors] { font-family: inherit !important; font-size: inherit !important; font-weight: inherit !important; line-height: inherit !important; color: inherit !important; text-decoration: none !important;}div[style*="margin: 16px 0;"] { margin: 0 !important;}body { width: 100% !important; height: 100% !important; padding: 0 !important; margin: 0 !important;}table { border-collapse: collapse !important;}a { color: #1a82e2;}img { height: auto; line-height: 100%; text-decoration: none; border: 0; outline: none;}</style></head><body style="background-color: #e9ecef;"><div class="preheader" style="display: none; max-width: 0; max-height: 0; overflow: hidden; font-size: 1px; line-height: 1px; color: #fff; opacity: 0;"> A preheader is the short summary text that follows the subject line when an email is viewed in the inbox.</div><table border="0" cellpadding="0" cellspacing="0" width="100%"> <tr><td align="center" bgcolor="#e9ecef"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="center" valign="top" style="padding: 36px 24px;"><a href="https://www.esprit.tn" target="_blank" style="display: inline-block;"> <img src="https://i.imgur.com/FG3o6Gz.png" alt="Logo" border="0" width="300" style="display: block; width: 48px; max-width: 300px; min-width: 300px;"></a></td> </tr></table></td> </tr> <tr><td align="center" bgcolor="#e9ecef"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="left" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; border-top: 3px solid #d4dadf;"><h1 style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">A propos de votre demande de location de voiture </h1></td> </tr></table></td> </tr> <tr><td align="center" bgcolor="#e9ecef"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;"><p style="margin: 0;">Cher(e) ' . $cmail . ' 👋🏼,<br><br>merci pour votre commentaire ❤️.<br></br>Nous sommes désolés de vous dire que la voiture n\'est pas disponible. </p></td> </tr> <tr><td align="left" bgcolor="#ffffff"></td> </tr> <tr><td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-bottom: 3px solid #d4dadf"><p style="margin: 0;">Cordialement,<br> ©AlphAuto Team</p></td> </tr></table></td> </tr> <tr><td align="center" bgcolor="#e9ecef" style="padding: 24px;"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="center" bgcolor="#e9ecef" style="padding: 12px 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; color: #666;"><p style="margin: 0;">Vous avez reçu cet e-mail car nous avons vu que vous aviez écrit un commentaire pour nous. Si vous ne l\'avez pas demandé, vous pouvez supprimer cet e-mail en toute sécurité.</p></td> </tr></table></td> </tr></table></body></html>');
        }else{
            $email->addContent("text/html", '<!DOCTYPE html><html><head><meta charset="utf-8"><meta http-equiv="x-ua-compatible" content="ie=edge"><title>Email Confirmation</title><meta name="viewport" content="width=device-width, initial-scale=1"><style type="text/css">@media screen { @font-face {font-family: \'Source Sans Pro\';font-style: normal;font-weight: 400;src: local(\'Source Sans Pro Regular\'), local(\'SourceSansPro-Regular\'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format(\'woff\'); } @font-face {font-family: \'Source Sans Pro\';font-style: normal;font-weight: 700;src: local(\'Source Sans Pro Bold\'), local(\'SourceSansPro-Bold\'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format(\'woff\'); }}body,table,td,a { -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;}table,td { mso-table-rspace: 0pt; mso-table-lspace: 0pt;}img { -ms-interpolation-mode: bicubic;}a[x-apple-data-detectors] { font-family: inherit !important; font-size: inherit !important; font-weight: inherit !important; line-height: inherit !important; color: inherit !important; text-decoration: none !important;}div[style*="margin: 16px 0;"] { margin: 0 !important;}body { width: 100% !important; height: 100% !important; padding: 0 !important; margin: 0 !important;}table { border-collapse: collapse !important;}a { color: #1a82e2;}img { height: auto; line-height: 100%; text-decoration: none; border: 0; outline: none;}</style></head><body style="background-color: #e9ecef;"><div class="preheader" style="display: none; max-width: 0; max-height: 0; overflow: hidden; font-size: 1px; line-height: 1px; color: #fff; opacity: 0;"> A preheader is the short summary text that follows the subject line when an email is viewed in the inbox.</div><table border="0" cellpadding="0" cellspacing="0" width="100%"> <tr><td align="center" bgcolor="#e9ecef"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="center" valign="top" style="padding: 36px 24px;"><a href="https://www.esprit.tn" target="_blank" style="display: inline-block;"> <img src="https://i.imgur.com/FG3o6Gz.png" alt="Logo" border="0" width="300" style="display: block; width: 48px; max-width: 300px; min-width: 300px;"></a></td> </tr></table></td> </tr> <tr><td align="center" bgcolor="#e9ecef"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="left" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; border-top: 3px solid #d4dadf;"><h1 style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">A propos de votre demande de location de voiture </h1></td> </tr></table></td> </tr> <tr><td align="center" bgcolor="#e9ecef"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;"><p style="margin: 0;">Cher(e) ' . $cmail . ' 👋🏼,<br><br>merci pour votre commentaire ❤️.<br></br>la voiture est prête à être récupérée ! Pour plus de détails vous pouvez nous appeler </p></td> </tr> <tr><td align="left" bgcolor="#ffffff"></td> </tr> <tr><td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-bottom: 3px solid #d4dadf"><p style="margin: 0;">Cordialement,<br> ©AlphAuto Team</p></td> </tr></table></td> </tr> <tr><td align="center" bgcolor="#e9ecef" style="padding: 24px;"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="center" bgcolor="#e9ecef" style="padding: 12px 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; color: #666;"><p style="margin: 0;">Vous avez reçu cet e-mail car nous avons vu que vous aviez écrit un commentaire pour nous. Si vous ne l\'avez pas demandé, vous pouvez supprimer cet e-mail en toute sécurité.</p></td> </tr></table></td> </tr></table></body></html>');
        }
        $sendgrid = new \SendGrid('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');
        try
        {
            $response = $sendgrid->send($email);
            //print $response->statusCode() . "\n";
            //print_r($response->headers());
            //print $response->body() . "\n";
            
        }
        catch(Exception $e)
        {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        }

    }



    function getmyreply($id){
        $db = config::getConnexion();
        try
        {
            $sql = "SELECT * FROM `answerlocation` WHERE request_id='$id'";
            $query = $db->prepare($sql);
            $query->execute();
                foreach ($query as $singleus){
                    return $singleus['my_reply'];
                }
            
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        } 

    }
    function yesireplied($reqid,$asw){
        $db = config::getConnexion();
        try
        {
            $sql = "INSERT INTO `answerlocation`(`id`, `request_id`, `my_reply`) VALUES (Null,'$reqid','$asw')";
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        } 

    }
    function Alllocationpanel()
    {
        $db = config::getConnexion();
        try
        {
            $sql = "SELECT * FROM rentcars ";
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function Allpiecesell($pages)
    {
        $db = config::getConnexion();
        try
        {
            $calc = 4 * $pages;
            $start = $calc - 4;
            $sql = "SELECT * FROM listpiece Limit " . $start . ", 4";
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }

    function Allproductslouer($pages)
    {
        $db = config::getConnexion();
        try
        {
            $calc = 4 * $pages;
            $start = $calc - 4;
            $sql = "SELECT * FROM carslouer Limit " . $start . ", 4";
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }

    function Allproductssell($pages)
    {
        $db = config::getConnexion();
        try
        {
            $calc = 4 * $pages;
            $start = $calc - 4;
            $sql = "SELECT * FROM vehicule Limit " . $start . ", 4";
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }

    function Allproductswi()
    {
        $db = config::getConnexion();
        try
        {
            $sql = "SELECT * FROM bloglist";
            $query = $db->prepare($sql);
            $query->execute();
            $totalPages = ceil($query->rowCount() / 4);
            return $totalPages;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }

    function AllproductsPagi($pages)
    {
        $db = config::getConnexion();
        try
        {
            $calc = 4 * $pages;
            $start = $calc - 4;
            $sql = "SELECT * FROM bloglist Limit " . $start . ", 4";
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }

    ///////////////
    function customproductswithord($total)
    {
        $db = config::getConnexion();
        try
        {
            $sql = "SELECT * FROM bloglist ORDER BY datep LIMIT " . $total;
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function customproducts($total)
    {
        $db = config::getConnexion();
        try
        {
            $sql = "SELECT * FROM bloglist ORDER BY RAND() LIMIT " . $total;
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function getexactitem($id)
    {
        $db = config::getConnexion();
        try
        {
            $sql = "SELECT * FROM bloglist WHERE id=" . $id;
            $query = $db->prepare($sql);
            $query->execute();
            if ($query->rowCount() == 0)
            {
                return "NOOOOOO";
            }
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function getcomments($postid)
    {
        $db = config::getConnexion();
        try
        {
            $sql = "SELECT * FROM comments WHERE blogid=" . $postid;
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function addcomment($comment)
    {
        $sql = "INSERT INTO `comments`(`id`, `blogid`, `firstname`, `lastname`, `gender`, `email`, `phonenumber`, `message`, `ip`, `seen`) VALUES (NULL,:myblogid,:firstname,:lastname,:gender,:emailadd,:phonenumber,:message,:commentip,0)";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute(['myblogid' => $comment->getblogid() , 'firstname' => $comment->getfirstname() , 'lastname' => $comment->getlastname() , 'gender' => $comment->getgender() , 'emailadd' => $comment->getemail() , 'phonenumber' => $comment->getphonenumber() , 'message' => $comment->getmessage() , 'commentip' => $comment->getip() , ]);
        }
        catch(Exception $e)
        {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function numunreadcomments()
    {
        $sql = "SELECT * FROM comments WHERE seen='0'";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            return $query->rowCount();
        }
        catch(Exception $e)
        {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function numallcomments()
    {
        $sql = "SELECT * FROM comments";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            return $query->rowCount();
        }
        catch(Exception $e)
        {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function deletecomment($commentid){

        $sql = "DELETE FROM `comments` WHERE id='$commentid'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            return "OK!";
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }

    }


    function getusertype($email){
        $db = config::getConnexion();
        try
        {
            $sql = "SELECT * FROM users WHERE email='$email'";
            $query = $db->prepare($sql);
            $query->execute();
            if($query->rowCount()==0){
                return 'NOTUSER!';
            }else{
                foreach ($query as $singleus){
                    if($singleus['type']=='1'){
                        return 'USER!';
                    }else if($singleus['type']=='0'){
                        return 'ADMIN!';
                    }
                }
            }
            return "ERROR!";
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }


    function getpanelcomments()
    {
        $db = config::getConnexion();
        try
        {
            $sql = "SELECT * FROM comments";
            $query = $db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function deleteitforme($id)
    {
        $db = config::getConnexion();
        try
        {
                $sql = "DELETE FROM `bloglist` WHERE id=" . $id;
                $query = $db->prepare($sql);
                $query->execute();
                $sql = "DELETE FROM `comments` WHERE blogid=" . $id;
                $query = $db->prepare($sql);
                $query->execute();
            
            return True;
        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function postblog($newblog)
    {
        $sql = "INSERT INTO `bloglist`(`id`, `title`, `img`, `description`, `fulltxt`, `datep`) VALUES (NULL,:title,:imgpatch,:description,:fullparag,:datep)";
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute(['title' => $newblog->gettitle() , 'imgpatch' => $newblog->getimg() , 'description' => $newblog->getdescription() , 'fullparag' => $newblog->getfulltxt() , 'datep' => $newblog->getdatep() , ]);
        }
        catch(Exception $e)
        {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function updateblog($newblog, $id)
    {
        $sql = "UPDATE `bloglist` SET `title`=:title,`description`=:description,`img`=:imgpatch,`datep`=:datep,`fulltxt`=:fullparag WHERE `id`=" . $id;
        $db = config::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute(['title' => $newblog->gettitle() , 'imgpatch' => $newblog->getimg() , 'description' => $newblog->getdescription() , 'fullparag' => $newblog->getfulltxt() , 'datep' => $newblog->getdatep() , ]);
        }
        catch(Exception $e)
        {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function send_sms($to, $firstname, $gender)
    {
        if ($gender == 'male')
        {
            $text = 'Dear Mr. ' . $firstname . "\n Thank you for you comment\n";
        }
        else
        {
            $text = 'Dear Mrs. ' . $firstname . "\n Thank you for you comment\n";
        }
        $url = 'https://rest.nexmo.com/sms/json?' . http_build_query(['api_key' => '0e86ab31', 'api_secret' => 'qENoL0YabFXElnQ3', 'to' => $to, 'from' => 'AlphAuto', 'text' => $text, 'type' => 'unicode']);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        return $response;
    }
    function send_email($emacil, $firstname, $comment)
    {
        require 'sendgrid/vendor/autoload.php';
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("amir.othman@esprit.tn", "AlphAuto");
        $email->setSubject("Merci pour votre commentaire 🚀🤙");
        $email->addTo($emacil, "AMIR OTHMAN");
        $email->addContent("text/html", '<!DOCTYPE html><html><head><meta charset="utf-8"><meta http-equiv="x-ua-compatible" content="ie=edge"><title>Email Confirmation</title><meta name="viewport" content="width=device-width, initial-scale=1"><style type="text/css">@media screen { @font-face {font-family: \'Source Sans Pro\';font-style: normal;font-weight: 400;src: local(\'Source Sans Pro Regular\'), local(\'SourceSansPro-Regular\'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format(\'woff\'); } @font-face {font-family: \'Source Sans Pro\';font-style: normal;font-weight: 700;src: local(\'Source Sans Pro Bold\'), local(\'SourceSansPro-Bold\'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format(\'woff\'); }}body,table,td,a { -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;}table,td { mso-table-rspace: 0pt; mso-table-lspace: 0pt;}img { -ms-interpolation-mode: bicubic;}a[x-apple-data-detectors] { font-family: inherit !important; font-size: inherit !important; font-weight: inherit !important; line-height: inherit !important; color: inherit !important; text-decoration: none !important;}div[style*="margin: 16px 0;"] { margin: 0 !important;}body { width: 100% !important; height: 100% !important; padding: 0 !important; margin: 0 !important;}table { border-collapse: collapse !important;}a { color: #1a82e2;}img { height: auto; line-height: 100%; text-decoration: none; border: 0; outline: none;}</style></head><body style="background-color: #e9ecef;"><div class="preheader" style="display: none; max-width: 0; max-height: 0; overflow: hidden; font-size: 1px; line-height: 1px; color: #fff; opacity: 0;"> A preheader is the short summary text that follows the subject line when an email is viewed in the inbox.</div><table border="0" cellpadding="0" cellspacing="0" width="100%"> <tr><td align="center" bgcolor="#e9ecef"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="center" valign="top" style="padding: 36px 24px;"><a href="https://www.esprit.tn" target="_blank" style="display: inline-block;"> <img src="https://i.imgur.com/FG3o6Gz.png" alt="Logo" border="0" width="300" style="display: block; width: 48px; max-width: 300px; min-width: 300px;"></a></td> </tr></table></td> </tr> <tr><td align="center" bgcolor="#e9ecef"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="left" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; border-top: 3px solid #d4dadf;"><h1 style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">Merci pour votre commentaire 🚀🤙 </h1></td> </tr></table></td> </tr> <tr><td align="center" bgcolor="#e9ecef"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;"><p style="margin: 0;">Cher(e) ' . $firstname . ' 👋🏼,<br><br>merci pour votre commentaire ❤️.<br><br>Nous venons de vous envoyer cet e-mail pour vous dire merci beaucoup de croire en nous,<br><br>Nous faisons de notre mieux pour vous offrir la meilleure expérience et les meilleures informations sur les voitures 🏎 </p></td> </tr> <tr><td align="left" bgcolor="#ffffff"></td> </tr> <tr><td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-bottom: 3px solid #d4dadf"><p style="margin: 0;">Cordialement,<br> ©AlphAuto Team</p></td> </tr></table></td> </tr> <tr><td align="center" bgcolor="#e9ecef" style="padding: 24px;"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr><td align="center" bgcolor="#e9ecef" style="padding: 12px 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; color: #666;"><p style="margin: 0;">Vous avez reçu cet e-mail car nous avons vu que vous aviez écrit un commentaire pour nous. Si vous ne l\'avez pas demandé, vous pouvez supprimer cet e-mail en toute sécurité.</p></td> </tr></table></td> </tr></table></body></html>');
        $sendgrid = new \SendGrid('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');
        try
        {
            $response = $sendgrid->send($email);
            //print $response->statusCode() . "\n";
            //print_r($response->headers());
            //print $response->body() . "\n";
            
        }
        catch(Exception $e)
        {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        }

    }
    // backoffice
    public function getAllPanier()
    {

        $db = config::getConnexion();
        $DB = new config();
        $list = 'SELECT * FROM panier';
        $req = $db->prepare($list);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

}

