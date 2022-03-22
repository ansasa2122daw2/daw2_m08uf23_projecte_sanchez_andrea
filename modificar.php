<?php
require 'vendor/autoload.php';

use Laminas\Ldap\Attribute;
use Laminas\Ldap\Ldap;

ini_set('display_errors', 0);
if ($_POST['method'] == "PUT") {
    if ($_POST['uid'] && $_POST['ou'] && $_POST['radioValue'] && $_POST['nouContingut']) {
        
        $atribut = $_POST['radioValue'];
        $nou_contingut = $_POST['nouContingut'];
        
        $uid = $_POST['uid'];
        $ou = $_POST['ou'];
        $dn = 'uid=' . $uid . ',ou=' . $ou . ',dc=fjeclot,dc=net';
        
        $opcions = [
            'host' => 'zend-ansasa.fjeclot.net',
            'username' => 'cn=admin,dc=fjeclot,dc=net',
            'password' => 'fjeclot',
            'bindRequiresDn' => true,
            'accountDomainName' => 'fjeclot.net',
            'baseDn' => 'dc=fjeclot,dc=net',
        ];
        
        $ldap = new Ldap($opcions);
        $ldap->bind();
        $entrada = $ldap->getEntry($dn);
        if ($entrada) {
            Attribute::setAttribute($entrada, $atribut, $nou_contingut);
            $isModificat = true;
            $ldap->update($dn, $entrada);
            echo "Atribut modificat correctament<br />";
        } else {
            echo "<b>Aquesta entrada no existeix</b><br />";
        }
    }
}

?>
<html>
    <h1>MODIFICAR UN USUARI</h1>
    <form action="http://zend-ansasa.fjeclot.net/daw2_m08uf23_projecte_sanchez_andrea/modificar.php" method="POST" autocomplete="off">
      <input type="text" name="ou" placeholder="Unitat Organitzativa" required /><br>
      <input type="text" name="uid" placeholder="Usuari" required /><br>
      <input type="radio" name="radioValue" value="uidNumber" />uidNumber<br>
      <input type="radio" name="radioValue" value="gidNumber" />gidNumber<br>
      <input type="radio" name="radioValue" value="homeDirectory" />homeDirectory<br>
      <input type="radio" name="radioValue" value="loginShell" />loginShell<br>
      <input type="radio" name="radioValue" value="cn" />cn<br>
      <input type="radio" name="radioValue" value="sn" />sn<br>
      <input type="radio" name="radioValue" value="givenName" />givenName<br>
      <input type="radio" name="radioValue" value="postalAddress" />postalAddress<br>
      <input type="radio" name="radioValue" value="mobile" />mobile<br>
      <input type="radio" name="radioValue" value="telephoneNumber" />telephoneNumber<br>
      <input type="radio" name="radioValue" value="title" />title<br>
      <input type="radio" name="radioValue" value="description" />description<br>
       <input type="text" name="nouContingut" placeholder="Nou Contingut" required /><br>
       <input type="submit" class="button" value="Modificar Usuari" /><br>
      </form>
      <a href="http://zend-ansasa.fjeclot.net/daw2_m08uf23_projecte_sanchez_andrea/menu.php">Menú usuari</a><br>
</html>