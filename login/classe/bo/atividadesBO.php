<?php
	
	class atividadesBO {
		
		public $paginaAdmin;

		function newAtividade($atividadesVO) {
			
			$db = new DBMySQL();
			//echo $num;	
			$query = "INSERT INTO `atividades` (`data`,`horarioInicio`,`horarioFim`,`atividade`,`link`) VALUES ";
			
			$query .= "('".$atividadesVO->getData()."','".$atividadesVO->getHorarioInicio()."','".$atividadesVO->getHorarioFim()."','".$atividadesVO->getAtividade()."','".$atividadesVO->getLink()."');";

			$db->do_query($query);

			$db->close();			
			
		}
		
		function editAtividade($atividadesVO) {
			
			$db = new DBMySQL();
			
			$query = "UPDATE `atividades` SET";
			
			$query .= " `data` = '".$atividadesVO->getData()."',";
			
			$query .= " `horarioInicio` = '".$atividadesVO->getHorarioInicio()."',";

			$query .= " `horarioFim` = '".$atividadesVO->getHorarioFim()."',";

			$query .= " `atividade` = '".$atividadesVO->getAtividade()."',";

			$query .= " `link` = '".$atividadesVO->getLink()."'";
								
			$query .= " WHERE `id` = '".$atividadesVO->getId()."'";
			
			$db->do_query($query);
			
			$db->close();
			
		}
		
		function deleteAtividade($atividadesVO) {
			
			$db = new DBMySQL();
			
			$query = "DELETE FROM `atividades` WHERE `id` = '".$atividadesVO->getId()."'";
			
			$db->do_query($query);
			
			$db->close();		
			
		}
		
		function get($atividadesVO) {
			
			$db = new DBMySQL();
			
			if($atividadesVO->getId() != "") {
				
				$query = "SELECT * FROM `atividades` WHERE `id` = '".$atividadesVO->getId()."'";
				
				$db->do_query($query);
				
				$result = $db->getRow();
				
				
			} else {
				
				$query = "SELECT * FROM `atividades` ORDER BY `id` ASC";
				
				$db->do_query($query);
				
				$r = 0;
				
				while($row = $db->getRow()) {
					
					$result[$r] = $row;
					
					$r++;
					
				}
				
			}
			
			return $result;
			
		}

		/*function diasemana($data) {
			$ano =  substr("$data", 0, 4);
			$mes =  substr("$data", 5, -3);
			$dia =  substr("$data", 8, 9);

			$diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano) );

			switch($diasemana) {
				case"0": 
					$diasemana = "Domingo";       
					break;
				case"1": 
					$diasemana = "Segunda"; 
					break;
				case"2": 
					$diasemana = "Terca";   
					break;
				case"3": 
					$diasemana = "Quarta";  
					break;
				case"4": 	
					$diasemana = "Quinta";  
					break;
				case"5": 
					$diasemana = "Sexta";   
					break;
				case"6": 
					$diasemana = "Sabado";        
					break;
			}
			echo $diasemana;
		}*/


		function getDatas() {
			
			$db = new DBMySQL();
			
			$query = "SELECT * from atividades";

			//$nomeDia =	diasemana($diadasemana);
				
			$db->do_query($query);
				
			$r = 0;
				
			while($row = $db->getRow()) {
					
				$result[$r] = $row;
					
				$r++;
					
			}
						
			return $result;
			
		}

		
		function getAtividades($dia) {
		
		//$dia = dia atual
		//$datas = nomes dos dias já registrados no bd
		//$datasBD = datas do jeito que estão no BD (EX:2015-06-25)	

			$db = new DBMySQL();

			$query = "SELECT * FROM `atividades` WHERE `data` = '".$dia."' ORDER BY `horarioInicio` ";
			
							
			$db->do_query($query);
				
			$r = 0;
				
			while($row = $db->getRow()) {
						
				$result[$r] = $row;
					
				$r++;
					
			}
					
			//echo $query;			
			return $result;

			
		}
		
		function getAll($atividadesVO) {
				
			$db = new DBMySQL();
				
			if($atividadesVO->getId() != "") {
		
				$query = "SELECT * FROM `atividades` WHERE `id` = '".$atividadesVO->getId()."'";
		
				$db->do_query($query);
		
				$result = $db->getRow();
		
		
			} else {
		
				$query = "SELECT * FROM `atividades` ORDER BY `id` ASC";
		
				$db->do_query($query);
		
				$r = 0;
		
				while($row = $db->getRow()) {
						
					$result[$r] = $row;
						
					$r++;
						
				}
		
			}
				
			return $result;
				
		}
		
		function count() {
			
			$db = new DBMySQL();
			
			$db->do_query("SELECT COUNT(`id`) AS 'total' FROM `atividades`");
			
			$result = $db->getRow();
			
			return $result;
			
		}
		
		function paginacao() {
			
			$db = new DBMySQL();
		
			$db->do_query("SELECT * FROM `atividades`  ORDER BY `id` ASC");
			
			$r = 0;
			
			while($row = $db->getRow()) {
				
				$result[$r] = $row;
				
				$r++;
				
			}
			
			return $result;
			
		}
		
		function countAll() {
				
			$db = new DBMySQL();
				
			$db->do_query("SELECT COUNT(`id`) AS 'total' FROM `atividades` ");
				
			$result = $db->getRow();
				
			return $result;
				
		}
		
		function paginacaoAll($inicio,$TAMANHO_PAGINA) {
				
			$db = new DBMySQL();
				
			$db->do_query("SELECT * FROM `atividades` ORDER BY `id` ASC LIMIT ".$inicio.",".$TAMANHO_PAGINA);
				
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