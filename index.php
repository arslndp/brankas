<?php

	session_start();

/* ---------------------------------------------------- */
	define('BASEPATH', 'system/');
/* ---------------------------------------------------- */


/* ---------------------------------------------------- */
	
	require 'system/lib/lib.env.php';

	require 'system/db/db.config.php';

	require 'system/action/action.akun.php';

	require 'system/action/action.anggota.php';

	require 'system/action/action.simpanan.php';

	require 'system/action/action.pinjaman.php';

	require 'system/action/action.angsuran.php';

/* ---------------------------------------------------- */
	
	if($_SESSION['AKUN'])
	{

		/* ---------------------------------------------------- */

			include 'app/view/blade.head.php';

			include __T_SIBA__;

			include __T_SIPA__;

		/* ---------------------------------------------------- */


			if(!empty($_GET['page']))
			{

				include 'app/page/'.$_GET['page'].'/index.php';

			}else{

				if( ! empty($_GET['action']))
				{
					include 'app/action/action.'.$_GET['action'].'.php';
				}else{
					include 'app/view/blade.home.php';
				}

			}

		/* ---------------------------------------------------- */

			include 'app/view/blade.foot.php';

		/* ---------------------------------------------------- */
	}
	else{

		echo "<script>window.location='login.php'</script>";

	}