<?php

/* ------------------------- */

/* ------------------------- */

/**
* 
*/
class pinjaman
{

	protected $db;
	
	function __construct($db)
	{
		$this->db = $db;
	}

		function add($nms,$id,$val)
		{

			$q = "SELECT * FROM tb_pinjaman";
			$c = $this->db -> prepare($q);
			$c -> execute();
			$fc = $c -> rowCount();
			$art = $fc + 1;

			$kode = 'PNJ'.$art;

			$ang = "ANG".$art;

			$tgl_pinjam = date('Y-m-d');

			$tgl_pengajuan_pinjam = date('Y-m-d');

			$ket = "BELUM ACC";

			$sql = "INSERT INTO tb_pinjaman(id_pinjaman,
											nama_pinjaman,
											id_anggota,
											besar_pinjaman,
											tgl_pengajuan_pinjam,
											tgl_pinjam,
											id_angsuran,
											ket_acc)
					VALUES(?,?,?,?,?,?,?,?)";

			$x = $this->db -> prepare($sql);
			$x -> execute(array($kode,$nms,$id,$val,$tgl_pengajuan_pinjam,$tgl_pinjam,$ang,$ket));
		}

		function katList()
		{
			$sql = "SELECT * FROM tb_kategori_pinjaman";
			$x = $this->db -> prepare($sql);
			$x -> execute();
			$f = $x -> fetchAll();
			return $f;
		}

		function countPinjamanNA()
		{
			$sql = "SELECT * FROM tb_pinjaman WHERE ket_acc = 'BELUM ACC'";
			$x = $this->db -> prepare($sql);
			$x -> execute();
			$f = $x -> rowCount();
			return $f;
		}

		function fetchPinjaman()
		{
			$sql = "SELECT tb_kategori_pinjaman.* , tb_pinjaman.* , tb_anggota.*
					FROM tb_pinjaman
					INNER JOIN tb_kategori_pinjaman ON tb_kategori_pinjaman.nama_kategori = tb_pinjaman.nama_pinjaman
					INNER JOIN tb_anggota ON tb_anggota.id_anggota = tb_pinjaman.id_anggota";
			$x = $this->db -> prepare($sql);
			$x -> execute();
			$f = $x -> fetchAll();
			return $f;
		}

		function tolak($id)
		{
			$status = "TIDAK ACC";
			$sql = "UPDATE tb_pinjaman SET ket_acc = ? WHERE id_pinjaman = ?";
			$x = $this->db -> prepare($sql);
			$x -> execute(array($status,$id));
		}

		function acc($id)
		{
			$status = "ACC";
			$date = date('Y-m-d');
			$sql = "UPDATE tb_pinjaman SET ket_acc = ? , tgl_acc_peminjam = ? WHERE id_pinjaman = ?";
			$x = $this->db -> prepare($sql);
			$x -> execute(array($status,$date,$id));
		}

		function myPinjaman()
		{
			session_start();
			$sql = "SELECT tb_kategori_pinjaman.* , tb_pinjaman.* , tb_anggota.*
					FROM tb_pinjaman
					INNER JOIN tb_kategori_pinjaman ON tb_kategori_pinjaman.nama_kategori = tb_pinjaman.nama_pinjaman
					INNER JOIN tb_anggota ON tb_anggota.id_anggota = tb_pinjaman.id_anggota
					WHERE tb_pinjaman.id_anggota = ?
					ORDER BY tb_pinjaman.id_pinjaman DESC";
			$x = $this->db  -> prepare($sql);
			$x -> execute(array($_SESSION['AKUN']['id_anggota']));
			$f = $x -> fetchAll();
			return $f;
		}

		function myPinjamanBAC()
		{
			session_start();
			$sql = "SELECT tb_kategori_pinjaman.* , tb_pinjaman.* , tb_anggota.*
					FROM tb_pinjaman
					INNER JOIN tb_kategori_pinjaman ON tb_kategori_pinjaman.nama_kategori = tb_pinjaman.nama_pinjaman
					INNER JOIN tb_anggota ON tb_anggota.id_anggota = tb_pinjaman.id_anggota
					WHERE tb_pinjaman.ket_acc = 'BELUM ACC'
					AND tb_pinjaman.id_anggota = ?
					ORDER BY tb_pinjaman.id_pinjaman DESC";
			$x = $this->db  -> prepare($sql);
			$x -> execute(array($_SESSION['AKUN']['id_anggota']));
			$f = $x -> fetchAll();
			return $f;	
		}

		function myPinjamanTAC()
		{
			session_start();
			$sql = "SELECT tb_kategori_pinjaman.* , tb_pinjaman.* , tb_anggota.*
					FROM tb_pinjaman
					INNER JOIN tb_kategori_pinjaman ON tb_kategori_pinjaman.nama_kategori = tb_pinjaman.nama_pinjaman
					INNER JOIN tb_anggota ON tb_anggota.id_anggota = tb_pinjaman.id_anggota
					WHERE tb_pinjaman.ket_acc = 'TIDAK ACC'
					AND tb_pinjaman.id_anggota = ?
					ORDER BY tb_pinjaman.id_pinjaman DESC";
			$x = $this->db  -> prepare($sql);
			$x -> execute(array($_SESSION['AKUN']['id_anggota']));
			$f = $x -> fetchAll();
			return $f;		
		}

		function myPinjamanACC()
		{
			session_start();
			$sql = "SELECT tb_kategori_pinjaman.* , tb_pinjaman.* , tb_anggota.*
					FROM tb_pinjaman
					INNER JOIN tb_kategori_pinjaman ON tb_kategori_pinjaman.nama_kategori = tb_pinjaman.nama_pinjaman
					INNER JOIN tb_anggota ON tb_anggota.id_anggota = tb_pinjaman.id_anggota
					WHERE tb_pinjaman.ket_acc = 'ACC'
					AND tb_pinjaman.id_anggota = ?
					ORDER BY tb_pinjaman.id_pinjaman DESC";
			$x = $this->db  -> prepare($sql);
			$x -> execute(array($_SESSION['AKUN']['id_anggota']));
			$f = $x -> fetchAll();
			return $f;					
		}
}