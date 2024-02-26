<?php
require_once("conexion.php");
//require_once('path/to/decrypt.php')
class Trabajo extends Conexion{
    //private $datos;
    private $conexion;

    public function __construct()
    {
        $this->conexion=new Conexion();
        $this->conexion=$this->conexion->obtenerConexion();
    }

    public function RegistrarHabitacion(string $codigo, string $numero, string $tipo, string $capacidad, string $precio, string $estado, string $descripcion, string $imagen):int{
        $sql="INSERT INTO tipo_habitacion VALUES(:cod,:tip,:cap,:pre)";
        $sql2="INSERT INTO habitacion VALUES(:nro,:cod,:est,:descp,:img)";
        $consult=$this->conexion->prepare($sql);
        $consult2=$this->conexion->prepare($sql2);
        $consult->bindValue(":cod",$codigo);
        $consult->bindValue(":tip",$tipo);
        $consult->bindValue(":cap",$capacidad);
        $consult->bindValue(":pre",$precio);
        $consult2->bindValue(":cod",$codigo);
        $consult2->bindValue(":nro",$numero);
        $consult2->bindValue(":est",$estado);
        $consult2->bindValue(":descp",$descripcion);
        $consult2->bindValue(":img",$imagen);
        $resultado=$consult->execute();
        $resultado2=$consult2->execute();

        if ($resultado>0){
            if($resultado2>0){
                echo "<script type='text/javascript'>
            alert('Registro adicionado correctamente...');
            window.location='seleccionar.php';
            </script>";
        
            }
        else{
            echo "<script type='text/javascript'>
			echo ('error En la asignacion del registro.....');
			window.location='seleccionar.php';
			</script>";
        }
    }
}

    public function insertarUsuario(string $correo, string $contraseña, string $imagen, string $num_doc, string $tipo_doc, string $nombres, string $apellidos, string $telefono, string $direccion, string $tipo_usuario):int{
        $password=PASSWORD_HASH($contraseña,PASSWORD_DEFAULT,array("cost"=>14));
        $sql="INSERT INTO usuarios VALUES (:em, :pass, :imagen)";
        $sql2="INSERT INTO persona VALUES(:num,:tip_doc,:nom,:ap,:em,:tel,:dir,:tip)";
        $consult=$this->conexion->prepare($sql);
        $consult2=$this->conexion->prepare($sql2);
        $consult->bindValue(":em",$correo);
        $consult->bindValue(":pass",$password);
        $consult->bindValue(":imagen", $imagen);
        $consult2->bindValue(":num",$num_doc);
        $consult2->bindValue(":tip_doc",$tipo_doc);
        $consult2->bindValue(":nom",$nombres);
        $consult2->bindValue(":ap",$apellidos);
        $consult2->bindValue(":em",$correo);
        $consult2->bindValue(":tel",$telefono);
        $consult2->bindValue(":dir",$direccion);
        $consult2->bindValue(":tip",$tipo_usuario);
        $resultado=$consult->execute();
        $resultado2=$consult2->execute();
        if($resultado>0){
            if($resultado2>0){
            echo "<script type='text/javascript'>
            alert('Usuario adicionado correctamente...');
            window.location='seleccionar.php';
            </script>";
        }
        }
            else{
                echo "<script type='text/javascript'>
                echo ('error En la asignacion del registro.....');
                window.location='seleccionar.php';
                </script>";
            }
    }
    public function registrarReserva(string $fecha_inicio, string $fecha_fin, string $precio, string $cod_tipo, string $num_doc):int{
        $sql="INSERT INTO reserva(fecha_inicio, fecha_fin, precio, cod_tipo_hab, num_doc) VALUES (:fecha_ini, :fecha_f, :pre, :cod_tip, :num)";
        $consult=$this->conexion->prepare($sql);
        //$consult->bindValue(':cod',$cod_reserva);
        $consult->bindValue(':fecha_ini',$fecha_inicio);
        $consult->bindValue(':fecha_f',$fecha_fin);
        $consult->bindValue(':pre',$precio);
        $consult->bindValue(':cod_tip',$cod_tipo);
        $consult->bindValue(':num',$num_doc);
        $resultado=$consult->execute();

        if ($resultado>0){
            echo "<script type='text/javascript'>
            alert('Registro adicionado correctamente...');
            window.location='seleccionar.php';
            </script>";
        }
        else{
            echo "<script type='text/javascript'>
            echo ('error En la asignacion del registro.....');
            window.location='registrar.php';
            </script>";
        }
    }
    public function traerTipos(){
        $sql="SELECT * FROM tipo_persona";
        $consult=$this->conexion->prepare($sql);
        $consult->execute();
        $result=$consult->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function traerDatos($inicio,$resultados_por_pagina){
        //$pagina_actual
        $sql="SELECT * FROM usuarios JOIN persona ON usuarios.correo_electronico=persona.correo_electronico ORDER BY nombres LIMIT :inicio,:resultados";
        $consult=$this->conexion->prepare($sql);
        $consult->bindValue(':inicio',$inicio,PDO::PARAM_INT);
        $consult->bindValue(':resultados',$resultados_por_pagina,PDO::PARAM_INT);
        $consult->execute();
        $result=$consult->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function traerTotal(){
        $sql="SELECT COUNT(*) AS total FROM persona";
        $consult=$this->conexion->query($sql);
        $total_resultados=$consult->fetchColumn();
        return $total_resultados;
    }
    public function eliminarUsuario(string $email){
        $sql="DELETE FROM usuarios WHERE correo_electronico= :em";
        $consult=$this->conexion->prepare($sql);
        $consult->BindValue(':em',$email);
        $resultado=$consult->execute();

        if ($resultado) {
            echo "<script type='text/javascript'>
			alert ('Usuario Eliminado Correctamente...');
			window.location='seleccionar.php';
		    </script>";
        } else {
            echo "Error al eliminar el usuario.";
        }
        }

    public function traerDatosReserva($inicio,$resultados_por_pagina){
        //$pagina_actual
        $sql="SELECT * FROM reserva LIMIT :inicio,:resultados";
        $consult=$this->conexion->prepare($sql);
        $consult->bindValue(':inicio',$inicio,PDO::PARAM_INT);
        $consult->bindValue(':resultados',$resultados_por_pagina,PDO::PARAM_INT);
        $consult->execute();
        $result=$consult->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function traerTotalReserva(){
        $sql="SELECT COUNT(*) AS total FROM reserva";
        $consult=$this->conexion->query($sql);
        $total_resultados=$consult->fetchColumn();
        return $total_resultados;
    }

    public function actualizar_reserva( string $cod, string $d1, string  $d2, string $d3, string $d4, string $d5):int{
        $sql="UPDATE reserva SET cod_reserva=:codr, fecha_inicio=:fecha_in, fecha_fin=:fecha_f, precio=:pre, cod_tipo_hab=:cod WHERE cod_reserva=:codr";
        $consult=$this->conexion->prepare($sql);
        $consult->bindParam(":codr",$cod);
        $consult->bindParam(":fecha_in",$d1);
        $consult->bindParam(':fecha_f', $d2);
        $consult->bindParam(":pre",$d3);
        $consult->bindParam(":cod",$d4);
        $consult->bindParam(":num",$d5);
        $resultado=$consult->execute();
        if($resultado>0){
            echo "<script type='text/javascript'>
			alert ('Asignación de reserva actualizada correctamente...');
			window.location='seleccionar.php';
		    </script>";
            }
    }
    public function eliminarReserva(string $cod){
        $sql="DELETE FROM reserva WHERE cod_reserva= :cod";
        $consult=$this->conexion->prepare($sql);
        $consult->BindValue(':cod',$cod);
        $resultado=$consult->execute();

        if ($resultado) {
            echo "<script type='text/javascript'>
            alert ('Reserva cancelada exitosamente...');
            window.location='seleccionar.php';
            </script>";
        } else {
            echo "Error al eliminar el usuario.";
        }
        }

    public function traer_Reserva($v1){
        $sql="SELECT * FROM reserva WHERE cod_reserva=:cod";
        $consult=$this->conexion->prepare($sql);
        $consult->bindParam(':cod', $v1, PDO::PARAM_STR);
        $consult->execute();
		$result=$consult->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

    public function traerDatosHabitacion($inicio,$resultados_por_pagina){
        //$pagina_actual
        $sql="SELECT * FROM tipo_habitacion JOIN habitacion ON tipo_habitacion.cod_tipo_hab=habitacion.cod_tipo_hab LIMIT :inicio,:resultados";
        $consult=$this->conexion->prepare($sql);
        $consult->bindValue(':inicio',$inicio,PDO::PARAM_INT);
        $consult->bindValue(':resultados',$resultados_por_pagina,PDO::PARAM_INT);
        $consult->execute();
        $result=$consult->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function traerTotalHabitacion(){
        $sql="SELECT COUNT(*) AS total FROM habitacion";
        $consult=$this->conexion->query($sql);
        $total_resultados=$consult->fetchColumn();
        return $total_resultados;
    }

    
    public function traerTipoHabitacion(){
        $sql="SELECT * FROM tipo_habitacion";
        $consult=$this->conexion->prepare($sql);
        $consult->execute();
        $result=$consult->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function traerHabitacion($v1){
        $sql="SELECT * FROM tipo_habitacion JOIN habitacion on tipo_habitacion.cod_tipo_hab=habitacion.cod_tipo_hab WHERE habitacion.cod_tipo_hab=:cod";
        $consult=$this->conexion->prepare($sql);
        $consult->bindParam(':cod', $v1, PDO::PARAM_STR);
        $consult->execute();
		$result=$consult->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

    public function TraerEstado($v1){
        $sql="SELECT estado_hab FROM habitacion WHERE nro_hab=:nro";
        $consult=$this->conexion->prepare($sql);
        $consult->bindParam(':nro', $v1, PDO::PARAM_STR);
        $consult->execute();
        $result=$consult->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function actualizar_habitacion(string $id, string $d2, string $d3, string $d4, string $d5, string $d6, string $d7):int{
        $sql="UPDATE tipo_habitacion SET cod_tipo_hab=:cod, nom_tipo_hab=:nom, capacidad=:cap, valor_base=:valor WHERE cod_tipo_hab=:cod";
        $sql2="UPDATE habitacion SET nro_hab=:nro, cod_tipo_hab=:cod, estado_hab=:estado, descripcion_hab=:descp WHERE nro_hab=:nro";
        $consult=$this->conexion->prepare($sql);
        $consult2=$this->conexion->prepare($sql2);
        $consult->bindParam(":cod",$id);
        $consult->bindParam(':nom', $d3);
        $consult->bindParam(":cap",$d4);
        $consult->bindParam(":valor",$d5);
        $consult2->bindParam(":nro",$d2);
        $consult2->bindParam(":cod",$id);
        $consult2->bindParam(":estado",$d6);
        $consult2->bindParam(":descp",$d7);
        $resultado=$consult->execute();
        $resultado2=$consult2->execute();
        if($resultado>0){
            if($resultado2>0){
            echo "<script type='text/javascript'>
			alert ('Usuario Actualizado Correctamente...');
			window.location='seleccionar.php';
		    </script>";
            }
    }
}
    public function eliminarHabitacion(string $codigo){
        $sql="DELETE FROM tipo_habitacion WHERE cod_tipo_hab= :cod";
        $consult=$this->conexion->prepare($sql);
        $consult->BindValue(':cod',$codigo);
        $resultado=$consult->execute();

        if ($resultado) {
            echo "<script type='text/javascript'>
            alert ('Habitación eliminada Correctamente...');
            window.location='seleccionar.php';
            </script>";
        } else {
            echo "Error al eliminar el usuario.";
        }
        }

    public function traer_Uno($v1){
        $sql="SELECT * FROM usuarios JOIN persona on usuarios.correo_electronico=persona.correo_electronico WHERE persona.correo_electronico=:correo";
        $consult=$this->conexion->prepare($sql);
        $consult->bindParam(':correo', $v1, PDO::PARAM_STR);
        $consult->execute();
		$result=$consult->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
    public function traerTipodoc($v1){
        $sql="SELECT tipo_doc FROM persona WHERE correo_electronico=:correo";
        $consult=$this->conexion->prepare($sql);
        $consult->bindParam(':correo', $v1, PDO::PARAM_STR);
        $consult->execute();
        $result=$consult->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function actualizar_usuario(string $d1, string $d2, string $d3, string $d4, string $d5, string $d6, string $d7, string $d8, string $id):int{
        $sql="UPDATE usuarios SET correo_electronico=:em, contraseña=:pass WHERE correo_electronico=:correo";
        $sql2="UPDATE persona SET num_doc=:num, tipo_doc=:tip, nombres=:nom, apellidos=:ape, correo_electronico=:em, telefono=:tel, direccion=:dir, cod_usuario=:cod WHERE num_doc=:num";
        $consult=$this->conexion->prepare($sql);
        $consult2=$this->conexion->prepare($sql2);
        $consult->bindParam(":em",$d1);
        $consult->bindParam(':correo', $d1, PDO::PARAM_STR);
        $consult->bindParam(":pass",$d2);
        $consult2->bindParam(":num",$d3);
        $consult2->bindParam(":tip",$d4);
        $consult2->bindParam(":nom",$d5);
        $consult2->bindParam(":ape",$d6);
        $consult2->bindParam(":em",$d1);
        $consult2->bindParam(":tel",$d7);
        $consult2->bindParam(":dir",$d8);
        $consult2->bindParam(":cod",$id);
        $resultado=$consult->execute();
        $resultado2=$consult2->execute();
        if($resultado>0){
            if($resultado2>0){
            echo "<script type='text/javascript'>
			alert ('Usuario Actualizado Correctamente...');
			window.location='seleccionar.php';
		    </script>";
            }
    }
}
    public function iniciar_sesion($email, $contraseña) {
        $consult = $this->conexion->prepare("SELECT * FROM usuarios WHERE correo_electronico=:em");
        $consult->bindParam(":em",$email);
        $consult->execute();
        $resultado=$consult->fetch(PDO::FETCH_ASSOC);
            if(!$resultado){
                echo '<center><h3 class="mensaje">Usuario o contraseña incorrectos</h3></center>';
            }
            else{
                $pass=$resultado['contraseña'];
                if (password_verify($contraseña,$pass)){
                    $_SESSION['correo_electronico']=$resultado['correo_electronico'];
                    header('location: clases/opciones.php');
                }else{
                    echo '<center><h3 class="mensaje">Usuario o contraseña incorrectos</h3></center>';
                }   
            }
    }
}
?>
<style>
    .mensaje{
        position:relative;
        top: 402px;
        color: rgb(190, 0, 0);
    }
</style>