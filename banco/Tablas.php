
<?php
class Tabla{ 
	private $db;
  
      private $filas = array();
	public function __construct(){ 
		$dsn = 'mysql:host=localhost;dbname=Banco;charset=utf8' ;
		$usuario="root";
		$pass ="";
		
		try {
			$this->db = new PDO( $dsn, $usuario, $pass );
			$this->db->exec("SET CHARACTER SET UTF8)");
		} catch ( PDOException $e) {

			die( "¡Error!: " . $e->getMessage() . "<br/>");
		}
    }

      public function tablaClientes() { 
       $consulta = $this->db->prepare("CREATE TABLE clientes (cl_dni VARCHAR(9)  NOT NULL, " . 
                               "cl_nom VARCHAR(50) NOT NULL, " . 
                               "cl_dir VARCHAR(60) NOT NULL, " . 
                               "cl_tel VARCHAR(9)  NOT NULL, " . 
                               "cl_ema VARCHAR(65) NOT NULL, " . 
                               "cl_fna DATE, " . 
                               "cl_fcl DATE        NOT NULL, " . 
                               "cl_ncu TINYINT(2)  NOT NULL, " . 
                               "cl_sal INT(8)      NOT NULL, " . 
                               "PRIMARY KEY (cl_dni)) ENGINE = MYISAM;" );
       $consulta->execute();
       if ($consulta->rowCount()>0){ 
           while($row=$consulta->fetch()) {
                $this->filas[] = $row; 
            }
        return $this->filas;
        }
    } 

      public function tablaCuentas() { 
       $consulta = $this->db->prepare($sql = ("CREATE TABLE cuentas (cu_ncu VARCHAR(10)  NOT NULL, " . 
                              "cu_dn1 VARCHAR(9)   NOT NULL, " . 
                              "cu_dn2 VARCHAR(9), " . 
                              "cu_sal INT(8)      NOT NULL, " . 
                              "PRIMARY KEY (cu_ncu), " . 
                              "FOREIGN KEY (cu_dn1, cu_dn2) REFERENCES clientes(cl_dni, cl_dni)" . 
                              ") ENGINE = MYISAM" ));
       $consulta->execute();
       if ($consulta->rowCount()>0){ 
           while($row=$consulta->fetch()) {
                $this->filas[] = $row; 
            }
        return $this->filas;
        }
    } 

        public function tablaMovimientos() { 
       $consulta = $this->db->prepare($sql =("CREATE TABLE movimientos (mo_ncu VARCHAR(10)  NOT NULL, " . 
                                  "mo_fec DATE         NOT NULL, " . 
                                  "mo_hor VARCHAR(6)   NOT NULL, " . 
                                  "mo_des VARCHAR(80)  NOT NULL, " . 
                                  "mo_imp INT(8)       NOT NULL, " . 
                                  "PRIMARY KEY (mo_ncu, mo_fec, mo_hor)) ENGINE = MYISAM;"));
       $consulta->execute();
       if ($consulta->rowCount()>0){ 
           while($row=$consulta->fetch()) {
                $this->filas[] = $row; 
            }
        return $this->filas;
        }
    } 

    


}

$tablas = new Tabla();

$tablas->tablaMovimientos();
$tablas->tablaCuentas();
$tablas->tablaClientes();
