<?php
require 'vendor/autoload.php';
use Laminas\Ldap\Ldap;

ini_set('display_errors', 0);
#
# Entrada a esborrar: usuari 3 creat amb el projecte zendldap2
#
$uid = $_GET["uid"];
$unorg = $_GET["unorg"];
$dn = 'uid='.$uid.',ou='.$unorg.',dc=fjeclot,dc=net';
#
#Opcions de la connexió al servidor i base de dades LDAP
$opcions = [
    'host' => 'zend-ansasa.fjeclot.net',
    'username' => 'cn=admin,dc=fjeclot,dc=net',
    'password' => 'fjeclot',
    'bindRequiresDn' => true,
    'accountDomainName' => 'fjeclot.net',
    'baseDn' => 'dc=fjeclot,dc=net',
];
# Esborrant l'entrada
#
$ldap = new Ldap($opcions);
$ldap->bind();
try{
    $ldap->delete($dn);
    echo "<b>Entrada esborrada</b><br>";
} catch (Exception $e){
    echo "<br>";
}

?>
<html>
<h2>Tanca la sessió</h2><a href="http://zend-ansasa.fjeclot.net/daw2_m08uf23_projecte_sanchez_andrea/index.php">Tanca la sessió</a>
    <body>
    <h1>ELIMINA USUARI</h1>
    	<form action="http://zend-ansasa.fjeclot.net/daw2_m08uf23_projecte_sanchez_andrea/elimina.php" method="POST">
			Identificador <input type="text" name="uid"><br>
			Unitat Organitzativa <input type="text" name="unorg"><br>
			<input type="submit" value="Envia" />
    	</form>
    	<a href="http://zend-ansasa.fjeclot.net/daw2_m08uf23_projecte_sanchez_andrea/menu.php">Menú usuari</a><br>
    </body>
</html>