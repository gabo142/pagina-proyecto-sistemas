<?php
require_once("c://xampp/htdocs/proyecto/config/db.php");

class usernameModel {
    private $PDO;
    
    public function __construct() {
        $con = new db();
        $this->PDO = $con->conexion();
    }
    
    public function insertar($nombre, $direccion, $telefono, $correo_electronico, $estado, $password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $statement = $this->PDO->prepare("INSERT INTO username (nombre, direccion, telefono, correo_electronico, estado, password) 
            VALUES (:nombre, :direccion, :telefono, :correo_electronico, :estado, :password)"
        );
        $statement->bindParam(":nombre", $nombre);
        $statement->bindParam(":direccion", $direccion);
        $statement->bindParam(":telefono", $telefono);
        $statement->bindParam(":correo_electronico", $correo_electronico);
        $statement->bindParam(":estado", $estado);
        $statement->bindParam(":password", $hashed_password);
        return ($statement->execute()) ? $this->PDO->lastInsertId() : false;
    }

    public function buscarPorCorreo($correo_electronico) {
        $statement = $this->PDO->prepare("SELECT * FROM username WHERE correo_electronico = :correo_electronico");
        $statement->bindParam(":correo_electronico", $correo_electronico);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function show($id){
        $statement = $this->PDO->prepare("SELECT * FROM username WHERE id = :id LIMIT 1");
        $statement->bindParam(":id", $id);
        return ($statement->execute()) ? $statement->fetch() : false ;
    }

    public function index(){
        $statement = $this->PDO->prepare("SELECT * FROM username ORDER BY id DESC");
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function update($id, $nombre, $direccion, $telefono, $correo_electronico, $estado){
        $statement = $this->PDO->prepare("UPDATE username SET 
            nombre = :nombre,
            direccion = :direccion,
            telefono = :telefono,
            correo_electronico = :correo_electronico,
            estado = :estado
            WHERE id = :id"
        );
        $statement->bindParam(":nombre", $nombre);
        $statement->bindParam(":direccion", $direccion);
        $statement->bindParam(":telefono", $telefono);
        $statement->bindParam(":correo_electronico", $correo_electronico);
        $statement->bindParam(":estado", $estado);
        $statement->bindParam(":id", $id);
        return ($statement->execute()) ? $id : false;
    }

    public function delete($id){
        $statement = $this->PDO->prepare("DELETE FROM username WHERE id = :id");
        $statement->bindParam(":id", $id);
        return ($statement->execute()) ? true : false;
    }
    
}
?>
