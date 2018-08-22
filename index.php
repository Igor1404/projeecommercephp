<?php 

require_once("vendor/autoload.php");

use Slim\Slim;
use Hcode\Page;


$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {
    
    
    
    echo "funcionou!";
    echo "<br>";
    echo "<br>";
    $pages = new Page();
    $pages->setTPL("index");

});

$app->run();

/*
 * 
 *  
 * 
        $page = new Hcode\Page();
        $page->setTPL("index");
        
 * $sql = new Hcode\DB\Sql();
	
        $resultado = $sql->select("SELECT * FROM tb_users");
        
        echo json_encode($resultado);
 * 
 * 
 * 
 *  */



 ?>
