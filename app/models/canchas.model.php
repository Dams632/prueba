<?php
require_once "./app/config/config.php";
class Cancha extends Conectar{
    public static function mostrardatos(){
        try {
            $sql="select * from canchas";
            $stml= Conectar::getConnection()->prepare($sql);
            $stml->execute();
            $result= $stml->fetchAll();
            return $result;
        } catch (PDOException $th) {
            echo $th->getmessage();
        }
    }
    public static function obtenerDato($id){
        try {
            $sql= "select * from canchas where id= :id";
            $stml= Conectar::getConnection()->prepare($sql);
            $stml->bindParam(':id',$id);
            $stml->execute();
            $result= $stml->fetch();
            return $result;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }
    public static function insertarDatos($data){
        try {
            $sql= "insert into canchas(cod_cancha,nombre,capacidad) values (:cod_cancha, :nombre,:capacidad)";
            $stml= Conectar::getConnection()->prepare($sql);
            $stml->bindParam(':cod_cancha',$data['cod_cancha']);
            $stml->bindParam(':nombre',$data['nombre']);
            $stml->bindParam(':capacidad',$data['capacidad']);
            $stml->execute();
            $result= $stml->rowCount();
            return true;

        } catch (PDOException $th) {
            echo $th->getMessage();
        } 
    }
}