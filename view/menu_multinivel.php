<?php

//include_once '../controller/db_connect.php';

function db_connection(){
    $hostname = "localhost";
    $user = "Admin";
    $password = "admin";
    $db_name = "base_dados_loja";

    $connect = mysqli_connect($hostname, $user, $password, $db_name);
    mysqli_set_charset($connect, "utf8");
    return $connect;
}

function mostrar_menu($categoria){

    $connect = db_connection();
    
    $menus = '';

    $menus .= montar_menu($connect, $categoria);
    return $menus;
}

function montar_menu($connect, $categoria){
    $menu = '';

    $sql = "SELECT * FROM subcategorias";
    $result = mysqli_query($connect, $sql);

    while($row = mysqli_fetch_array($result)){
        if($row['categorias_id'] == $categoria){
            $menu .= '<li class="nav-item"><a a class="nav-link" href="/www/ZeroFila/view/home.php?subcategorias_id_url='.$row['subcategorias_id'].'">'.$row['nome'].'</a></li>';
            //$menu .= '<li><a href="home.php">'.$row['nome'].'</a></li>';
        }
    }
    return $menu;
}

/*function montar_menu($connect){
    $menu = '';

    $sql = "SELECT * FROM subcategorias";
    $result = mysqli_query($connect, $sql);

    while($row = mysqli_fetch_array($result)){
        if($row['categoria_id'] == $categoria){
            $menu .= '<li>'.$row['nome'].'</li>';
        }
    }
    return $menu;
}*/

/*function montar_menu($connect){
    $menu = '';

    $sql_categorias = '';
    $sql_subcategorias = '';

    $sql_categorias = "SELECT * FROM categorias";
    $sql_subcategorias = "SELECT * FROM subcategorias";

    $resultado_categoria = mysqli_query($connect, $sql_categorias);
    $resultado_subcategoria = mysqli_query($connect, $sql_subcategorias);

    //$row_categorias = mysqli_fetch_array($resultado_categoria);
    //$row_subcategoria = mysqli_fetch_array($resultado_subcategoria);

    while($row_categorias = mysqli_fetch_array($resultado_categoria)){
        $menu .= '<li>'.$row_categorias['nome'];
        $menu .= '<ul class="submenu">';
        while($row_subcategoria = mysqli_fetch_array($resultado_subcategoria)){
            if($row_subcategoria['categorias_id'] == $row_categorias['categorias_id']){
                $menu .= '<li>'.$row_subcategoria['nome'].'</li>';
            }
        }
        $menu .= '</ul>';
        $menu .= '</li>';
    }

    return $menu;
}*/


/*function coletar_categorias($connect){
    //$menu = '';
    $sql = '';
    
    $sql = "SELECT * FROM categorias";

    $resultado = mysqli_query($connect, $sql);

    /*while($row = mysqli_fetch_array($resultado)){
       $menu .= '<li>'.$row['nome'].'</li>';
    }*/
    //return mysqli_fetch_array($resultado);
//}

/*function coletar_subcategorias($connect){
    //$submenu = '<lu>';
    $sql = '';
    
    $sql = "SELECT * FROM subcategorias";
    $result = mysqli_query($connect, $sql);

    /*while($row = mysqli_fetch_array($result)){
        $submenu .= '<li>'.$row['nome'].'</li>';
    }*/

   // return mysqli_fetch_array($result);
//}

/**
 * function gerar_menu_multinivel($connect, $parent_id = NULL){
    $menu = '';
    $sql = '';
    if(is_null($parent_id)){
        $sql = "SELECT * FROM 'produtos' WHERE 'subcategoria_id' IS NULL";
    } else {
        $sql = "SELECT * FROM 'produtos' WHERE 'subcategoria_id' = $parent_id";
    }

    $result = mysqli_query($connect, $sql);

    while($row = mysqli_fetch_assoc($result)){
        if($row['nome']){
            $menu.= '<li><a href="descricao_produto.php">'$row['nome']'</a></li>';
        } else {
            $menu .= '<li><a href="#">'$row['title']'</a>';
        }

        $menu .= '<ul class="dropdown">.gerar_menu_multinivel($connect, $row[id]).</ul>';
        $menu .= '</li>';

    }

    return $menu;
}
 */