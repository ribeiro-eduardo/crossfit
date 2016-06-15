<?php
	
	class reuniaoBO {
		
		public $paginaAdmin;

		function newReuniao($reuniaoVO) {
			
			$db = new DBMySQL();
			
			$query = "INSERT INTO `reuniao` (`nome`,`data`,`horario`,`local`,`endereco`) VALUES ";
			
			$query .= "('".$reuniaoVO->getNome()."','".$reuniaoVO->getData()."','".$reuniaoVO->getHorario()."','".$reuniaoVO->getLocal()."','".$reuniaoVO->getEndereco()."');";
			
			$db->do_query($query);
			
			$db->close();			
			
		}
		
		function editReuniao($reuniaoVO) {
			
			$db = new DBMySQL();
			
			$query = "UPDATE `reuniao` SET";
			
			$query .= " `nome` = '".$reuniaoVO->getNome()."',";

			$query .= " `data` = '".$reuniaoVO->getData()."',";

			$query .= " `horario` = '".$reuniaoVO->getHorario()."',";
			
			$query .= " `local` = '".$reuniaoVO->getLocal()."',";

			$query .= " `endereco` = '".$reuniaoVO->getEndereco()."'";
								
			$query .= " WHERE `id` = '".$reuniaoVO->getId()."'";
			
			$db->do_query($query);
			
			$db->close();
			
		}
		
		function deleteReuniao($reuniaoVO) {
			
			$db = new DBMySQL();
			
			$query = "DELETE FROM `reuniao` WHERE `id` = '".$reuniaoVO->getId()."'";
			
			$db->do_query($query);
			
			$db->close();		
			
		}

		
		function get($reuniaoVO) {
			
			$db = new DBMySQL();
			
			if($reuniaoVO->getId() != "") {
				
				$query = "SELECT * FROM `reuniao` WHERE `id` = '".$reuniaoVO->getId()."'";
				
				$db->do_query($query);
				
				$result = $db->getRow();
				
				
			} else {
				
				$query = "SELECT * FROM `reuniao` ORDER BY `id` ASC";
				
				$db->do_query($query);
				
				$r = 0;
				
				while($row = $db->getRow()) {
					
					$result[$r] = $row;
					
					$r++;
					
				}
				
			}
			
			return $result;
			
		}

		function getUltima() {

			$db = new DBMySQL();

			$query = "SELECT * FROM `reuniao` ORDER BY `id` DESC LIMIT 1;";

			$db->do_query($query);

			$r = 0;
				
			while($row = $db->getRow()) {
					
				$result[$r] = $row;
					
				$r++;
					
			}
			
			return $result;

		}
		

		function paginaAdmin($admin){
			if($admin == TRUE){
				$this->paginaAdmin = TRUE;
			}else{
				$this->paginaAdmin = FALSE;
			}
		}
		
	}


?>