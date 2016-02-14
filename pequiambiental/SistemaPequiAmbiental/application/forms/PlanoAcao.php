<?php

class Application_Form_PlanoAcao extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	
    
    	    	
    	$this->setName('FormularioServico');
        $id = new Zend_Form_Element_Hidden('id_projeto');
        $id->addFilter('Int');
        $id->removeDecorator('Label');
       
      /* ID_PLANO_ACAO 
       DS_ASSUNTO
       TX_PLANO_ACAO
       FK_PROJETO
       DT_ATUALIZACAO
       FK_STATUS
       FK_OPERADOR
       DT_PREVISAO
       DT_CONCLUSAO
       DT_CONTROLE*/
            
     $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel("Adiconar");
        $submit->setAttrib('id', 'submitbutton');
         $submit->removeDecorator('DtDdWrapper')
         ->setAttrib('class', 'btn btn-primary button')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label');        
            
    $this->addElements(array($id,$submit));     
     $this->setDecorators( array( array('ViewScript', array('viewScript' => '/forms/formularioPlanoAcao.phtml'))));   
	
    }


}

