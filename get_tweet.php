<?php 
    session_start();
    if(!isset($_SESSION['usuario'])){
        header('Location: index.php?erro=1');
    }
    require_once ('db.class.php');
    $id_usuario = $_SESSION['id_usuario'];

    $objDB = new db();
    $link = $objDB->conecta_mysql();
    
    $sql = " Select date_format(t.data_inclusao, '%d %b %Y %T') ";
    $sql.= " as data_inclusao_formatada, t.tweet, u.usuario ";
    $sql.= " from tweet as t join usuarios as u on (t.id_usuario = u.id) ";
    $sql.= " where id_usuario = $id_usuario ";
    $sql.= " or id_usuario in (select seguindo_id_usuario from usuarios_seguidores where id_usuario = $id_usuario) ";
    $sql.= " order by data_inclusao desc ";
    
    $resultado_id = mysqli_query($link, $sql);
    
    if($resultado_id){
        while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
            /*var_dump($registro);
            echo '<br/><br/>';*/
            echo '<a href="#" class="list-group-item">';
                echo '<h4 class="list-group-item-heading">'.$registro['usuario'].' <small>- '.$registro['data_inclusao_formatada'].' </small></h4>';
                echo '<p class="list-group-item-text">'.$registro['tweet'].'</p>';
            echo '</a>';
        }
    }
    else{
        echo 'erro na consulta de tweets';
    }
    
    
?>