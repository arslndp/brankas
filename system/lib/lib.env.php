<?php

 /*	   Database Environment 	  */	
/* ----------------------------- */

	define('__U_DB__', 'root'); //username

	define('__P_DB__', 'toor'); //password

	define('__UNCONNECT__', !empty($e));

	define('__CONNECTED__', empty($e));

/* ----------------------------- */


//	 Template Environment
/* ----------------------------- */

	define('__T_HEAD__', 'app/view/blade.head.php'); // head template

	define('__T_HOME__', 'app/view/blade.home.php'); // home template

	define('__T_FOOT__', 'app/view/blade.foot.php'); // foot template

	define('__T_SIBA__', 'app/view/blade.sidebar.php'); // sidebar template

	define('__T_SIPA__', 'app/view/blade.sidepanel.php'); // sidepanel template

/* ----------------------------- */


// 	 Resources Style
/* ----------------------------- */

	define('__RS_CSS__', 'app/resources/css/'); // css directrory

	define('__RS_JS__', 'app/resources/js/'); // js directory

	define('__RS_IMG__', 'app/resources/img/'); // image directory

/* ----------------------------- */


// 	 Anti Direct Link
/* ----------------------------- */
	
	define('SYSTEM', 'system/');

	define('APP', 'app/');

/* ----------------------------- */


// 	 Error Handling
/* ----------------------------- */

	define('__DB_ERROR__', '<h1>DB DOWN SERVER</h1>');



/* ----------------------------- */