<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        header('Location: index.php?erro=1');
    }
    
    require_once ('db.class.php');
    
    $id_usuario = $_SESSION['id_usuario'];
    $deixar_seguir_id_usuario = $_POST['deixar_seguir_id_usuario'];
    
    if($id_usuario =='' || $deixar_seguir_id_usuario ==''){
        die();
    }
    else{
        $objDB = new db();
        $link = $objDB->conecta_mysql();
        
        $sql = "delete from usuarios_seguidores where id_usuario =  $id_usuario and seguindo_id_usuario = $deixar_seguir_id_usuario";
        
        mysqli_query($link, $sql);
    }
    
    

?>