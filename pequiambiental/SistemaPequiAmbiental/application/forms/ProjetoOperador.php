<?php

class Application_Form_ProjetoOperador extends Zend_Form
{
	protected $_OPERADOR;
	protected $_PROJETO;

    public function setOperador($operador)
    {
       // $this->_myParameters = $myParameters;
        $this->_OPERADOR = $operador;
    	//$this->_OPERADOR='1';
    	//Zend_Registry::get('logger')->log("testeddd", Zend_Log::INFO);
    	
    }
	public function setProjeto($projeto)
    {
       
    			$this->_PROJETO = $projeto;
    		
    }
    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	
    
    	    	
    	$this->setName('FormularioProjetoOperador');
        
        
        
       /* $FK_PROJETO = new Zend_Form_Element_Hidden('FK_PROJETO');
        $FK_PROJETO->addFilter('Int');
        $FK_PROJETO->removeDecorator('Label');*/
       
      
        
      /* 
       
       
       
       
       
       
       */

        $FK_OPERADOR= new Zend_Form_Element_Select('FK_OPERADOR');
        $operador= new Application_Model_DbTable_Operador();
        $FK_OPERADOR->setLabel('OPERADOR');
        $FK_OPERADOR->setMultiOptions( $operador->getOperadores() )
        ->setRequired(true)
        ->removeDecorator('DtDdWrapper')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label')
        ->setAttrib('class', 'form-control select2');
        
		$FK_PROJETO= new Zend_Form_Element_Select('FK_PROJETO');
        $projeto= new Application_Model_DbTable_Projeto();
        $FK_PROJETO->setLabel('PROJETO');
        $FK_PROJETO->setMultiOptions( $projeto->getProjetoIndividualCombo($this->_PROJETO) )
        ->setRequired(true)
        ->removeDecorator('DtDdWrapper')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label')
        ->setAttrib('class', 'form-control select2');

        
     
        
        
            
     $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel("Adiconar");
        $submit->setAttrib('id', 'submitbutton');
         $submit->removeDecorator('DtDdWrapper')
         ->setAttrib('class', 'btn btn-primary button')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label');        
            
    $this->addElements(array($FK_PROJETO,$FK_OPERADOR,$submit));     
     $this->setDecorators( array( array('ViewScript', array('viewScript' => '/forms/formularioProjetoOperador.phtml'))));   
	
    }


}

