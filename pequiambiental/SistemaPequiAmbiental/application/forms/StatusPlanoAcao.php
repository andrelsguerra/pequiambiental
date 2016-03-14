<?php

class Application_Form_StatusPlanoAcao extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	
    
    	    	
    	$this->setName('FormularioStatusPlanoAcao');
        $ID_STATUS_PLANO_ACAO = new Zend_Form_Element_Hidden('ID_STATUS_PLANO_ACAO');
        $ID_STATUS_PLANO_ACAO->addFilter('Int');
        $ID_STATUS_PLANO_ACAO->removeDecorator('Label');
        
        $NM_STATUS_PLANO_ACAO= new Zend_Form_Element_Text('NM_STATUS_PLANO_ACAO');
        $NM_STATUS_PLANO_ACAO->setLabel('STATUS')
             ->setRequired(true)
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty')
        	 ->removeDecorator('DtDdWrapper')
        	 ->removeDecorator('HtmlTag')
             ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter status');
        
        	  
    				  
    				  
            
     $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel("Adiconar");
        $submit->setAttrib('id', 'submitbutton');
         $submit->removeDecorator('DtDdWrapper')
         ->setAttrib('class', 'btn btn-primary button')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label');        
            
    $this->addElements(array($ID_STATUS_PLANO_ACAO,$NM_STATUS_PLANO_ACAO,$submit));     
     $this->setDecorators( array( array('ViewScript', array('viewScript' => '/forms/formularioStatusPlanoAcao.phtml'))));   
	
    }


}

