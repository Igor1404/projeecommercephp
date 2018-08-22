<?php

namespace Hcode;
use Rain\Tpl;

class Page {
    

//================================================================
//CLASSES    

    private $tpl;
    private $options = [];
    private $defaults = [
        
        "header"=>true,
        "footer"=>true,
        "data"=>[]
        
    ];

    //================================================================
    //FUNÇÃO MÁGICA CONSTRUCT DE CONFIGURAÇÃO DO REDIRECIONAMENTO.
    public function __construct($opts = array()){
       
        
        $this->options = array_merge($this->defaults, $opts);
        
        //$_SERVER["DOCUMENT_ROOT"].
        
        $config = array(
            
            "base_url"      => null,
            "tpl_dir"       => \filter_input(INPUT_SERVER, "DOCUMENT_ROOT"). "views/",//$_SERVER["DOCUMENT_ROOT"]."views",
            "cache_dir"     => \filter_input(INPUT_SERVER, "DOCUMENT_ROOT"). "views-cache/",
            "debug"         => false
   
         );

	Tpl::configure( $config );
        
        $this->tpl = new Tpl();
        
        
        if($this->options["data"]){$this->setData($this->options["data"]);}
        
        if($this->options["header"] === true){$this->tpl->draw("header", false);}
        
            
    }
    
    
    //================================================================
    //função que vai ser direcionada ao footer.html
    public function __destruct(){
        
        if ($this->options["footer"] === true) {$this->tpl->draw("footer", false);}
     
    }
      
  
    //================================================================
    //função para setar dados redirecionados do HTML para o index.php
    private function setData($data = array()){
        
      foreach ($data as $key => $value) {
          
            $this->tpl->assign($key, $value);
            
        }
        
    }
    //================================================================
    //setar o template body.html
    public function setTPL($tplname, $data = array(), $returnHTML = false){
        
       $this->setData($data);
       
       return $this->tpl->draw($tplname, $returnHTML); 
       
    }

}


/*

namespace Hcode;
use Rain\Tpl;

class Page {
    

//================================================================
//CLASSES    

    private $tpl;
    private $options = [];
    private $defaults = [
        
        "header"=>true,
        "footer"=>true,
        "data"=>[]
        
    ];

    //================================================================
    //FUNÇÃO MÁGICA CONSTRUCT DE CONFIGURAÇÃO DO REDIRECIONAMENTO.
    public function __construct($opts = array()){
       
        
        $this->options = array_merge($this->defaults, $opts);
        
        //$_SERVER["DOCUMENT_ROOT"].
        
        $config = array(
            
            "base_url"      => null,
            "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"]."/views/",
            "cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
            "debug"         => false
   
         );

	Tpl::configure( $config );
        
        $this->tpl = new Tpl();
        
        
        if($this->options["data"]){$this->setData($this->options["data"]);}
        
        if($this->options["header"]){$this->tpl->draw("header");}
        
            
    }
    
    
    //================================================================
    //função que vai ser direcionada ao footer.html
    public function __destruct(){
        
        if ($this->options["footer"] === true) {$this->tpl->draw("footer", false);}
     
    }
      
  
    //================================================================
    //função para setar dados redirecionados do HTML para o index.php
    private function setData($data = array()){
        
      foreach ($data as $key => $value) {
          
            $this->tpl->assign($key, $value);
            
        }
        
    }
    //================================================================
    //setar o template body.html
    public function setTPL($tplname, $data = array(), $returnHTML = false){
        
       $this->setData($data);
       
       return $this->tpl->draw($tplname, $returnHTML); 
       
    }
    
  
    
    
}
 * 
 *  */



?>
