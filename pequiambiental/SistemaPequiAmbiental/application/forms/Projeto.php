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
        
        
        $nm_projeto = new Zend_Form_Element_Text('NM_PROJETO');
        $nm_projeto->setLabel('PROJETO')
             ->setRequired(true)
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty')
        	 ->removeDecorator('DtDdWrapper')
        	 ->removeDecorator('HtmlTag')
             ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter projeto');
       
          
          
       /* TP_PROJETO
        DT_CADASTRO
        FK_AGENCIA_AMBIENTAL
        NR_CONTRATO
        TX_OBSERVACAO
        DS_GESTOR
        FK_CLIENTE
        FK_STATUS
        FL_ATIVO
        FK_INDICACAO*/
       
         
     $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel("Adiconar");
        $submit->setAttrib('id', 'submitbutton');
         $submit->removeDecorator('DtDdWrapper')
         ->setAttrib('class', 'btn btn-primary button')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label');        
            
    $this->addElements(array($id,$nm_projeto,$submit));     
     $this->setDecorators( array( array('ViewScript', array('viewScript' => '/forms/formularioProjeto.phtml'))));   
	
    }


}

