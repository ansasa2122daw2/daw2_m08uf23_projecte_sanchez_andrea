<?php
    require 'vendor/autoload.php';
	use Laminas\Ldap\Ldap;

	if ($_POST['adm'] && $_POST['cts']) {
	    $opcions = [
	        'host' => 'zend-ansasa.fjeclot.net',
	        'username' => "cn=admin,dc=fjeclot,dc=net",
	        'password' => 'fjeclot',
	        'bindRequiresDn' => true,
	        'accountDomainName' => 'fjeclot.net',
	        'baseDn' => 'dc=fjeclot,dc=net',
	    ];
	    $ldap = new Ldap($opcions);
	    $dn = 'cn=' . $_POST['adm'] . ',dc=fjeclot,dc=net';
	    $ctsnya = $_POST['cts'];
	    try {
	        $ldap->bind($dn, $ctsnya);
	        session_start();
	        $SESSIONDATA = array("adm" => $_POST['adm'], "cts" => $_POST['cts']);
	        $_SESSION['adm'] = $SESSIONDATA;
	        header("Location: http://zend-ansasa.fjeclot.net/daw2_m08uf23_projecte_sanchez_andrea/menu.php");
	    } catch (Exception $e) {
	        echo "<b>Error, Usuari i/o contrasenya incorrecta</b><br>";
	    }
	}
?>
<html>
	<head>
		<title>
			AUTENTICACIÓ AMB LDAP 
		</title>
	</head>
	<body>
		<a href="http://zend-ansasa.fjeclot.net/autent/index.php">Torna a la pàgina inicial</a>
	</body>
</html>
