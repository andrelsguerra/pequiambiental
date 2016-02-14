<?php

class Application_Form_Projeto extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	
    	$this->setAttrib('enctype', 'multipart/form-data');
    	    	
    	$this->setName('FormularioCompra');
        $id = new Zend_Form_Element_Hidden('id_projeto');
        $id->addFilter('Int');
        $id->removeDecorator('Label');
        
       
            
     $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel("Adiconar");
        $submit->setAttrib('id', 'submitbutton');
         $submit->removeDecorator('DtDdWrapper')
         ->setAttrib('class', 'btn btn-primary button')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label');        
            
    $this->addElements(array($id,$submit));     
     $this->setDecorators( array( array('ViewScript', array('viewScript' => '/forms/formularioProjeto.phtml'))));   
	
    }


}

