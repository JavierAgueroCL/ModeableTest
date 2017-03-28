<?php
abstract class DataBase {
  private $conexion;
  protected $query;
  public $mensaje;
	public $error;
	public $result;
  public $prefix = "moldeable";
  protected $rows = array();

	/**
	 * Abre la conexion a la base de datos
	 * @return Object
	 */
	private function abrir_conexion() {
		$this->conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	}
	/**
	 * Abre la conexion a la base de datos
	 * @return Bolean
	 */
	private function cerrar_conexion() {
		$this->conexion->close();
	}

  /**
	 * Ejecuta una consulta unica (UDPDATE, INSERT)
	 * @return Object
	 */
  protected function ejecutar_consulta() {
		if($_POST) {
			$this->abrir_conexion();
			$this->result = $mysqli->query($this->query);
			if($this->result == false) {
        $this->error = "Exito";
        $this->mensaje = 'Ha fallado la consulta';
			}
			else {
				$this->error = "Exito";
				$this->mensaje = '';
			}
      $result->free();
			$this->cerrar_conexion();
		} else {
			$this->error = "Error";
			$this->mensaje = 'Metodo no permitido';
		}
	}

  /**
	 * Devuelve los resultados de una consulta (SELECT)
	 * @return Array
	 */
   protected function obtener_consulta() {
 		$this->abrir_conexion();
 		$result = $this->conexion->query($this->query);
 		  while ($this->rows[] = $result->fetch_assoc());
 		$result->free();
 		$this->cerrar_conexion();
 	}

  /**
	 * Devuelve los resultados de una consulta (SELECT)
	 * @return Array
	 */
  protected function sanitizar($input){
  	$input = trim($input);
      if (is_array($input)){
          foreach($input as $var=>$val) {
              $output[$var] = sanitize($val);
          }
      }
      else {
          if (get_magic_quotes_gpc()) {
              $input = stripslashes($input);
          }
          $input  = cleanString($input);
          $this->abrir_conexion();
          $output = mysql_real_escape_string($input);
          $this->cerrar_conexion();
      }

    $output = utf8_decode($output);
    return $output;
  }

}
?>
