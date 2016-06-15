<?php

	class galeriasBO {


		function newGaleria($galeriasVO) {

			$db = new DBMySQL();

			$query = "INSERT INTO `galerias` (`nome`, `status`) ";

			$query .= "VALUES ('".$galeriasVO->getNome()."','".$galeriasVO->getStatus()."');";

			$db->do_query($query);

			return $query;

			$db->close();

		}

		function editGaleria($galeriasVO) {

			$db = new DBMySQL();

			$query = "UPDATE `galerias` SET ";

			$query .= "`nome` = '".$galeriasVO->getNome()."'";

			$query .= " WHERE `id` = '".$galeriasVO->getId()."'";

			$db->do_query($query);

			return $query;

			$db->close();

		}

		function deleteGaleria($galeriasVO) {

			$db = new DBMySQL();

			$query = "UPDATE `galerias` SET `status` = 0 WHERE `id` = ".$galeriasVO->getId().";";

			$db->do_query($query);

			return $query;

			$db->close();

		}


		function get($galeriasVO) {

			$db = new DBMySQL();

			if($galeriasVO->getId() != "") {

				$query = "SELECT * FROM `galerias` WHERE `id` = '".$galeriasVO->getId()."'";

				$db->do_query($query);

				$result = $db->getRow();


			} else {

				$query = "SELECT * FROM `galerias` WHERE `status` = 1 ORDER BY `id` ASC";

				$db->do_query($query);

				$r = 0;

				while($row = $db->getRow()) {

					$result[$r] = $row;

					$r++;

				}

			}

			return $result;


		}

		function getNext(){

            $db = new DBMySQL();

            $db->do_query("SELECT AUTO_INCREMENT FROM information_schema.tables WHERE table_name = 'galerias'");

            $result = $db->getRow();

            return $result;

        }


		function count() {

			$db = new DBMySQL();

			$db->do_query("SELECT COUNT(`id`) AS 'total' FROM `galerias`");

			$result = $db->getRow();

			return $result;

		}

		function paginacao($inicio,$TAMANHO_PAGINA) {

			$db = new DBMySQL();

			$db->do_query("SELECT * FROM `galerias` ORDER BY `id` DESC LIMIT ".$TAMANHO_PAGINA);

			$r = 0;

			while($row = $db->getRow()) {

				$result[$r] = $row;

				$r++;

			}

			return $result;

		}

	}

?>