<?php
require 'vendor/autoload.php';

use Laminas\Ldap\Ldap;

session_start();
if (isset($_SESSION['adm'])) {
    ini_set('display_errors', 0);
    $uid = 'webdev';
    $unorg = 'desenvolupadors';
    $dn = 'uid=' . $uid . ',ou=' . $unorg . ',dc=fjeclot,dc=net';
    
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
    $isEsborrat = false;
    try {
        if ($ldap->delete($dn)) echo "<b>Esborrat Correctament</b><br>";
        header("Location: http://zend-ansasa.fjeclot.net/daw2_m08uf23_projecte_sanchez_andrea/menu.php");
    } catch (Exception $e) {
        echo "<b>No existeix</b><br>";
    }
}


?>