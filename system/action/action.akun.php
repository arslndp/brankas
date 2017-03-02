<?php

/* ------------------------------- */

/**
* 
*/
class akun
{
	
	protected $db;

	function __construct($db)
	{
		$this->db = $db;
	}

	function login($u,$p)
	{
		$sql = "SELECT * FROM tb_login WHERE username = ? AND password = md5(?)";
		$x = $this->db -> prepare($sql);
		$x -> execute(array($u,$p));
		$f = $x -> fetch();
		$r = $x -> rowCount();

		if($r == '1')
		{

			if ($f['type_user'] == 'ANGOTA') 
			{

				session_start();
				$q = "SELECT tb_login.* , tb_anggota.*
					  FROM tb_anggota
					  INNER JOIN tb_login ON tb_anggota.id_anggota = tb_login.id_akun
					  WHERE tb_login.id_akun = ?
					  AND tb_login.type_user = 'ANGOTA'";
				$j = $this->db -> prepare($q);
				$j -> execute(array($f['id_akun']));
				$fAll = $j -> fetch();
				$_SESSION['AKUN'] = $fAll;
				//return header('location:index.php?page=anggota/data');
			
			}
			if ($f['type_user'] == 'PETUGAS') 
			{

				session_start();
				$q = "SELECT tb_login.* , tb_petugas_koperasi.*
					  FROM tb_login
					  INNER JOIN tb_petugas_koperasi
					  ON tb_login.id_akun = tb_petugas_koperasi.id_petugas
					  WHERE tb_login.id_akun = ?
					  AND tb_login.type_user = 'PETUGAS'";
				$j = $this->db -> prepare($q);
				$j -> execute(array($f['id_akun']));
				$fAll = $j -> fetch();
				$_SESSION['AKUN'] = $fAll;
				//return header('location:index.php');

			}
			else
			{
				
			}
		}
		else
		{
			header('location:index.php');
		}
	}
}