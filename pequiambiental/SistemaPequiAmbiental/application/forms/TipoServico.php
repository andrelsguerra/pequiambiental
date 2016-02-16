<?php

class Application_Form_TipoServico extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	
    
    	    	
    	$this->setName('FormularioTipoServico');
        $ID_TIPO_SERVICO = new Zend_Form_Element_Hidden('ID_TIPO_SERVICO');
        $ID_TIPO_SERVICO->addFilter('Int');
        $ID_TIPO_SERVICO->removeDecorator('Label');
        
        $NM_TIPO_SERVICO= new Zend_Form_Element_Text('NM_TIPO_SERVICO');
        $NM_TIPO_SERVICO->setLabel('RAMO DE ATIVIDADE')
             ->setRequired(true)
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty')
        	 ->removeDecorator('DtDdWrapper')
        	 ->removeDecorator('HtmlTag')
             ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter tipo de serviço');
        
        	  
    				  
    				  
            
     $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel("Adiconar");
        $submit->setAttrib('id', 'submitbutton');
         $submit->removeDecorator('DtDdWrapper')
         ->setAttrib('class', 'btn btn-primary button')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label');        
            
    $this->addElements(array($ID_TIPO_SERVICO,$NM_TIPO_SERVICO,$submit));     
     $this->setDecorators( array( array('ViewScript', array('viewScript' => '/forms/formularioTipoServico.phtml'))));   
	
    }


}

