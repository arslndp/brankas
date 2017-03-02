<?php

/* --------------------------------------------- */

		
/* --------------------------------------------- */

/**
* 
*/
class simpanan
{
	
	protected $db;

	function __construct($db)
	{
		$this->db = $db;
	}

		function list()
		{
			$sql = "SELECT tb_simpanan.* , tb_anggota.* 
					FROM tb_simpanan
					INNER JOIN tb_anggota
					ON tb_anggota.id_anggota = tb_simpanan.id_anggota
					ORDER BY tb_simpanan.id_simpanan DESC";
			$x = $this->db -> prepare($sql);
			$x -> execute();
			$f = $x -> fetchAll();
			return $f;
		}

		function myList()
		{
			session_start();
			$id = $_SESSION['AKUN']['id_akun'];
			$sql = "SELECT tb_simpanan.* , tb_anggota.* 
					FROM tb_simpanan
					INNER JOIN tb_anggota
					ON tb_anggota.id_anggota = tb_simpanan.id_anggota
					WHERE tb_anggota.id_anggota = ?";
			$x = $this->db -> prepare($sql);
			$x -> execute(array($id));
			$f = $x -> fetchAll();
			return $f;
		}

		function mySimpananAC()
		{
			session_start();
			$id = $_SESSION['AKUN']['id_akun'];
			$sql = "SELECT tb_simpanan.* , tb_anggota.* 
					FROM tb_simpanan
					INNER JOIN tb_anggota
					ON tb_anggota.id_anggota = tb_simpanan.id_anggota
					WHERE tb_anggota.id_anggota = ?
					AND tb_simpanan.ket_smpn = 'APPROVE'";
			$x = $this->db -> prepare($sql);
			$x -> execute(array($id));
			$f = $x -> fetchAll();
			return $f;
		}

		function mySimpananNc()
		{
			session_start();
			$id = $_SESSION['AKUN']['id_akun'];
			$sql = "SELECT tb_simpanan.* , tb_anggota.* 
					FROM tb_simpanan
					INNER JOIN tb_anggota
					ON tb_anggota.id_anggota = tb_simpanan.id_anggota
					WHERE tb_anggota.id_anggota = ?
					AND tb_simpanan.ket_smpn = 'TIDAK APPROVE'";
			$x = $this->db -> prepare($sql);
			$x -> execute(array($id));
			$f = $x -> fetchAll();
			return $f;	
		}

		function add($nms,$id,$val)
		{	
			/* ----------------------------- */
				$ket = "BELUM APPROVE";

				$q = "SELECT * FROM tb_simpanan";
				$y = $this->db -> prepare($q);
				$y -> execute();
				$rC = $y -> rowCount();
				$art = $rC + 1;
				$kd = 'SM'.$art;

				$tgl = date('Y-m-d H:i:S');

			/* ----------------------------- */
			
			$sql = "INSERT tb_simpanan(id_simpanan,nm_simpanan,id_anggota,tgl_simpanan,besar_simpanan,ket_smpn)
					VALUES(?,?,?,?,?,?)";
			$x = $this->db -> prepare($sql);
			$x -> execute(array($kd,$nms,$id,$tgl,$val,$ket));
			if ($x) 
			{
				return 'ok';
			}
			else
			{
				return 'fail';
			}
		}

		function acc($id)
		{
			$status = "APPROVE";
			$sql = "UPDATE tb_simpanan SET ket_smpn = ? WHERE id_simpanan = ?";
			$x = $this->db -> prepare($sql);
			$x -> execute(array($status,$id));
		}

		function tolak($id)
		{
			$status = "TIDAK APPROVE";
			$sql = "UPDATE tb_simpanan SET ket_smpn = ? WHERE id_simpanan = ?";
			$x = $this->db -> prepare($sql);
			$x -> execute(array($status,$id));
		}
}