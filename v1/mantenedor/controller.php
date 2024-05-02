<?php 

class Controlador{

    private $lista;
    public function __construct()
    {
        $this->lista = [];

}
public function getAll(){
    $con = new Conexion();
    $sql = "SELECT id, nombre, activo FROM mantenedor;";
    $rs = mysqli_query($con->getConnection(), $sql);
    if ($rs){
        while($tupla = mysqli_fetch_assoc($rs));
        $tupla['activo'] = $tupla ['activo'] == 1 ? true: false;


    }

    $con->closeConnection();
    return $this->lista;
}
}
