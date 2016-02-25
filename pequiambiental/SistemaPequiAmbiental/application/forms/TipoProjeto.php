<?php

class Application_Form_TipoProjeto extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	
    
    	    	
    	$this->setName('FormularioTipoProjeto');
        $ID_TIPO_PROJETO = new Zend_Form_Element_Hidden('ID_TIPO_PROJETO');
        $ID_TIPO_PROJETO->addFilter('Int');
        $ID_TIPO_PROJETO->removeDecorator('Label');
        
        $NM_TIPO_PROJETO= new Zend_Form_Element_Text('NM_TIPO_PROJETO');
        $NM_TIPO_PROJETO->setLabel('TIPO PROJETO')
             ->setRequired(true)
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty')
        	 ->removeDecorator('DtDdWrapper')
        	 ->removeDecorator('HtmlTag')
             ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter tipo projeto');
        
        	  
    				  
    				  
            
     $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel("Adiconar");
        $submit->setAttrib('id', 'submitbutton');
         $submit->removeDecorator('DtDdWrapper')
         ->setAttrib('class', 'btn btn-primary button')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label');        
            
    $this->addElements(array($ID_TIPO_PROJETO,$NM_TIPO_PROJETO,$submit));     
     $this->setDecorators( array( array('ViewScript', array('viewScript' => '/forms/formularioTipoProjeto.phtml'))));   
	
    }


}

