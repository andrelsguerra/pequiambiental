<?php

class Application_Form_RamoAtividade extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	
    
    	    	
    	$this->setName('FormularioRamoAtividade');
        $ID_RAMO_ATIVIDADE = new Zend_Form_Element_Hidden('ID_RAMO_ATIVIDADE');
        $ID_RAMO_ATIVIDADE->addFilter('Int');
        $ID_RAMO_ATIVIDADE->removeDecorator('Label');
        
        $DS_RAMO_ATIVIDADE= new Zend_Form_Element_Text('DS_RAMO_ATIVIDADE');
        $DS_RAMO_ATIVIDADE->setLabel('RAMO DE ATIVIDADE')
             ->setRequired(true)
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty')
        	 ->removeDecorator('DtDdWrapper')
        	 ->removeDecorator('HtmlTag')
             ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter ramo de atividade');
        
        	  
    				  
    				  
            
     $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel("Adiconar");
        $submit->setAttrib('id', 'submitbutton');
         $submit->removeDecorator('DtDdWrapper')
         ->setAttrib('class', 'btn btn-primary button')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label');        
            
    $this->addElements(array($ID_RAMO_ATIVIDADE,$DS_RAMO_ATIVIDADE,$submit));     
     $this->setDecorators( array( array('ViewScript', array('viewScript' => '/forms/formularioRamoAtividade.phtml'))));   
	
    }


}

