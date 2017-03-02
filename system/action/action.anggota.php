<?php
	
	/**
	* 
	*/
	class anggota
	{

		protected $db;
		
		function __construct($db)
		{
			$this->db = $db;
		}

			function count()
			{

				$sql = "SELECT * FROM tb_anggota";
				$x = $this->db -> prepare($sql);
				$x -> execute();
				$r = $x -> rowCount();
				return $r;

			}


			function list()
			{
				$sql = "SELECT * FROM tb_anggota";
				$x = $this->db -> prepare($sql);
				$x -> execute();
				$f = $x -> fetchAll();
				return $f;
			}

	}