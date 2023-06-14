<?php 
    require_once 'conexion.php';
    class Productos {
        private $conexion;
        
        public function __construct() {
            $this->conexion = new Conexion(); // Crear una instancia de la clase de conexión existente
        }

        public function agregarProductos($titulo, $descripcion, $precio, $stock, $imagen) {
            try {
                $sql = "INSERT INTO videojuego (titulo, descripcion, precio, stock, imagen) VALUES (:titulo, :descripcion, :precio, :stock, :imagen)";
                $consulta = $this->conexion->prepare($sql);
                $consulta->bindParam(':titulo', $titulo);
                $consulta->bindParam(':descripcion', $descripcion);
                $consulta->bindParam(':precio', $precio);
                $consulta->bindParam(':stock', $stock);
                $consulta->bindParam(':imagen', $imagen);
                $consulta->execute();
                return true;
            } catch (PDOException $e) {
                return false;
            }
        }
    

        public function mostrarProductos(){
            $sql = "SELECT * FROM videojuego";
            $consulta = $this->conexion->prepare($sql); 
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }

        public function eliminarProducto(){


        }


        public function actualizarProducto(){


        }

    }
?>