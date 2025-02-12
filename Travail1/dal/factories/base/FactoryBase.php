<?php
abstract class FactoryBase {
    public function dbConnect() {
        $host = "sql.decinfo-cchic.ca";
        $utilisateur = "dev-2310197";
        $motDePasse = "Zazou2468";
        $nomDeLaBD = "h25_web_transac_2310197";
        $port = "33306";

        // Connexion avec MySQLi
        $mysqli = new mysqli($host, $utilisateur, $motDePasse, $nomDeLaBD, $port);

        // Vérification de la connexion
        if ($mysqli->connect_error) {
            die("Échec de connexion à la base de données : " . $mysqli->connect_error);
        }

        return $mysqli;
    }
}
?>
