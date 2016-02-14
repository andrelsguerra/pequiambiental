<?php

class Application_Form_Servico extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	
    
    	    	
    	$this->setName('FormularioServico');
        $id = new Zend_Form_Element_Hidden('id_projeto');
        $id->addFilter('Int');
        $id->removeDecorator('Label');
        
      /* ID_SERVICO
       DS_SERVICO
       FK_OPERADOR
       NR_CARGA_HORARIA
       FK_TIPO_SERVICO
       DT_SERVICO
       FK_PROJETO
       FL_PCP*/
            
     $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel("Adiconar");
        $submit->setAttrib('id', 'submitbutton');
         $submit->removeDecorator('DtDdWrapper')
         ->setAttrib('class', 'btn btn-primary button')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label');        
            
    $this->addElements(array($id,$submit));     
     $this->setDecorators( array( array('ViewScript', array('viewScript' => '/forms/formularioServico.phtml'))));   
	
    }


}

