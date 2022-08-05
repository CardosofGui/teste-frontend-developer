<?php 

    # Constantes de acesso ao Banco de Dados
    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));

    define('USER', $cleardb_url["user"]);
    define('PASSWORD', $cleardb_url["pass"]);
    define('HOST',$cleardb_url["host"]);
    define('DB', substr($cleardb_url["host"], 1));
        
    # Tenta se conectar com o Banco de Dados
    # Status 200 = Conexão bem sucedida
    # Status 404 = Erro na conexão
    try{
        $connPDO = array('status' => 200, 'pdo' => new PDO("mysql:host=".HOST.";dbname=".DB."; charset=UTF8", USER, PASSWORD));
    } catch(PDOException $ex){
        $connPDO = array('status' => 404, 'pdo' => 'Error');
    }
