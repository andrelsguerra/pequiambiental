<?php

class Application_Form_StatusProjeto extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	
    
    	    	
    	$this->setName('FormularioStatusProjeto');
        $ID_STATUS_PROJETO = new Zend_Form_Element_Hidden('ID_STATUS_PROJETO');
        $ID_STATUS_PROJETO->addFilter('Int');
        $ID_STATUS_PROJETO->removeDecorator('Label');
        
        $NM_STATUS_PROJETO= new Zend_Form_Element_Text('NM_STATUS_PROJETO');
        $NM_STATUS_PROJETO->setLabel('STATUS')
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
            
    $this->addElements(array($ID_STATUS_PROJETO,$NM_STATUS_PROJETO,$submit));     
     $this->setDecorators( array( array('ViewScript', array('viewScript' => '/forms/formularioStatusProjeto.phtml'))));   
	
    }


}

