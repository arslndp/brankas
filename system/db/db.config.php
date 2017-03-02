<?php
/* --------------------------- */
// conntection to the database	
/* --------------------------- */

	try {
		
		$db = new PDO('mysql:host=localhost;dbname=smpn_pnjm',__U_DB__,__P_DB__);

	} catch (PDOException $e) { /* code haha */ }
