<?php

/**
* 
*/
class angsuran
{
	
	protected $db;

	function __construct($db)
	{
		$this->db = $db;
	}

		function add($kd,$val)
		{
			$sql = "SELECT tb_pinjaman.* , tb_kategori_pinjaman.* , tb_anggota.* 
					FROM tb_pinjaman 
					INNER JOIN tb_kategori_pinjaman ON tb_pinjaman.nama_pinjaman = tb_kategori_pinjaman.nama_kategori
					INNER JOIN tb_anggota ON tb_pinjaman.id_anggota = tb_anggota.id_anggota
					WHERE tb_pinjaman.id_pinjaman = ?";
			$x = $this->db -> prepare($sql);
			$x -> execute(array($kd)); 
			$f = $x -> fetch();

			$q = "INSERT INTO tb_angsuran(id_angsuran,
										  id_kategori,
										  id_anggota,
										  tgl_pembayaran,
										  angsuran_ke,
										  besar_angsuran,
										  ket)
				  VALUES(?,?,?,?,?,?,?)";
			$xl = $this->db -> prepare($q);
			$xl -> execute(array());

		}

		function fetch()
		{
			$sql = "SELECT tb_pinjaman.* , tb_kategori_pinjaman.* , tb_anggota.* , tb_angsuran.* , tb_detail_angsuran.*
					FROM tb_pinjaman 
					INNER JOIN tb_kategori_pinjaman ON tb_pinjaman.nama_pinjam = tb_kategori_pinjaman.nama_kategori
					INNER JOIN tb_anggota ON tb_pinjaman.id_anggota = tb_anggota.id_anggota
					INNER JOIN tb_angsuran ON tb_pinjaman.id_angsuran = tb_angsuran.id_angsuran
					INNER JOIN tb_detail_angsuran ON tb_pinjaman.id_angsuran = tb_detail_angsuran.id_angsuran";
			$x = $this->db -> prepare($sql);
			$x -> execute();
			$f = $x -> fetchAll();
			return $f;
		}	
}