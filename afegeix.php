<?php
require 'vendor/autoload.php';
use Laminas\Ldap\Attribute;
use Laminas\Ldap\Ldap;

ini_set('display_errors', 0);

$uid=$_GET["uid"];
$unorg=$_GET["unorg"];
$num_id=$_GET["uidNumber"];
$grup=$_GET["gidNumber"];
$dir_pers=$_GET["homedirectory"];
$sh=$_GET["loginshell"];
$cn=$_GET["cn"];
$sn=$_GET["sn"];
$nom=$_GET["givenname"];
$mobil=$_GET["mobile"];
$adressa=$_GET["postaladdress"];
$telefon=$_GET["telephonenumber"];
$titol=$_GET["title"];
$descripcio=$_GET["description"];
$objcl=array('inetOrgPerson','organizationalPerson','person','posixAccount','shadowAccount','top');
#
#Afegint la nova entrada
$domini = 'dc=fjeclot,dc=net';
$opcions = [
    'host' => 'zend-dacomo.fjeclot.net',
    'username' => "cn=admin,$domini",
    'password' => 'fjeclot',
    'bindRequiresDn' => true,
    'accountDomainName' => 'fjeclot.net',
    'baseDn' => 'dc=fjeclot,dc=net',
];
$ldap = new Ldap($opcions);
$ldap->bind();
$nova_entrada = [];
Attribute::setAttribute($nova_entrada, 'objectClass', $objcl);
Attribute::setAttribute($nova_entrada, 'uid', $uid);
Attribute::setAttribute($nova_entrada, 'uidNumber', $num_id);
Attribute::setAttribute($nova_entrada, 'gidNumber', $grup);
Attribute::setAttribute($nova_entrada, 'homeDirectory', $dir_pers);
Attribute::setAttribute($nova_entrada, 'loginShell', $sh);
Attribute::setAttribute($nova_entrada, 'cn', $cn);
Attribute::setAttribute($nova_entrada, 'sn', $sn);
Attribute::setAttribute($nova_entrada, 'givenName', $nom);
Attribute::setAttribute($nova_entrada, 'mobile', $mobil);
Attribute::setAttribute($nova_entrada, 'postalAddress', $adressa);
Attribute::setAttribute($nova_entrada, 'telephoneNumber', $telefon);
Attribute::setAttribute($nova_entrada, 'title', $titol);
Attribute::setAttribute($nova_entrada, 'description', $descripcio);
$dn = 'uid='.$uid.',ou='.$unorg.',dc=fjeclot,dc=net';
if($ldap->add($dn, $nova_entrada)) echo "Usuari creat";	
?>
<html>
<body>
<h1>MODIFICA USUARI</h1>
    	<form action="http://zend-ansasa.fjeclot.net/daw2_m08uf23_projecte_sanchez_andrea/afegeix.php" method="POST">
			Identificador <input type="text" name="uid"><br>
			Unitat Organitzativa <input type="text" name="unorg"><br>
			uidNumber <input type="text" name="uidNumber"><br>
			gidNumber <input type="text" name="gidNumber"><br>
			Directori personal <input type="text" name="homedirectory"><br>
			Shell <input type="text" name="loginshell"><br>
			cn <input type="text" name="cn"><br>
			sn <input type="text" name="sn"><br>
			givenName <input type="text" name="givenname"><br>
			PostalAdress <input type="text" name="postaladdress"><br>
			mobile <input type="text" name="mobile"><br>
			telephoneNumber <input type="text" name="telephonenumber"><br>
			title <input type="text" name="title"><br>
			description <input type="text" name="description"><br>
			<input type="submit" value="Agefeix" />
			</form>
			<a href="http://zend-ansasa.fjeclot.net/daw2_m08uf23_projecte_sanchez_andrea/menu.php">Menú usuari</a><br>
</body>


</html>