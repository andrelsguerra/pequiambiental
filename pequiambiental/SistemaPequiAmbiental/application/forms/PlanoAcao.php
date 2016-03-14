<?php

class Application_Form_PlanoAcao extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	
    
    	    	
    	$this->setName('FormularioServico');
        $id = new Zend_Form_Element_Hidden('ID_PLANO_ACAO');
        $id->addFilter('Int');
        $id->removeDecorator('Label');
        
        $DS_ASSUNTO= new Zend_Form_Element_Text('DS_ASSUNTO');
        $DS_ASSUNTO->setLabel('ASSUNTO')
        ->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty')
        ->removeDecorator('DtDdWrapper')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label')
        ->setAttrib('class', 'form-control')
        ->setAttrib('placeholder', 'Enter assunto ');
        
        $TX_PLANO_ACAO = new Zend_Form_Element_Textarea('TX_PLANO_ACAO');
        $TX_PLANO_ACAO->setLabel('AÇÕES')
        ->setRequired(true)
        ->removeDecorator('DtDdWrapper')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label')
        ->setAttrib('class', 'form-control')
        ->setAttrib('rows', '20');
        
        $FK_PROJETO= new Zend_Form_Element_Select('FK_PROJETO');
        $projeto= new Application_Model_DbTable_Projeto();
        $FK_PROJETO->setLabel('PROJETO');
        $FK_PROJETO->setMultiOptions( $projeto->getProjetoCombo() )
        ->setRequired(true)
        ->removeDecorator('DtDdWrapper')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label')
        ->setAttrib('class', 'form-control select2');
        
        
        $FK_STATUS_PLANO_ACAO= new Zend_Form_Element_Select('FK_STATUS_PLANO_ACAO');
        $statusPlanoAcao= new Application_Model_DbTable_StatusPlanoAcao();
        $FK_STATUS_PLANO_ACAO->setLabel('STATUS');
        $FK_STATUS_PLANO_ACAO->setMultiOptions( $statusPlanoAcao->getStatusPlanoAcaoCombo())
        ->setRequired(true)
        ->removeDecorator('DtDdWrapper')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label')
        ->setAttrib('class', 'form-control select2');
        
        $FK_OPERADOR= new Zend_Form_Element_Select('FK_OPERADOR');
        $operador= new Application_Model_DbTable_Operador();
        $FK_OPERADOR->setLabel('OPERADOR');
        $FK_OPERADOR->setMultiOptions( $operador->getOperadorCombo())
        ->setRequired(true)
        ->removeDecorator('DtDdWrapper')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label')
        ->setAttrib('class', 'form-control select2');
        
        $DT_ATUALIZACAO =new Zend_Form_Element_Text('DT_ATUALIZACAO');
        $DT_ATUALIZACAO->setLabel('DATA ATUALIZAÇÃO')
      
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty')
        ->removeDecorator('DtDdWrapper')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label')
        ->setAttrib('class', 'form-control data');
        
        $DT_PREVISAO= new Zend_Form_Element_Text('DT_PREVISAO');
        $DT_PREVISAO->setLabel('DATA PREVISÃO')
        ->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty')
        ->removeDecorator('DtDdWrapper')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label')
        ->setAttrib('class', 'form-control data');
        
        $DT_CONTROLE= new Zend_Form_Element_Text('DT_CONTROLE');
        $DT_CONTROLE->setLabel('DATA CONTROLE')
        ->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty')
        ->removeDecorator('DtDdWrapper')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label')
        ->setAttrib('class', 'form-control data');
        
        $DT_CONCLUSAO =new Zend_Form_Element_Text('DT_CONCLUSAO');
        $DT_CONCLUSAO->setLabel('DATA CONCLUSAO')
       
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty')
        ->removeDecorator('DtDdWrapper')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label')
        ->setAttrib('class', 'form-control data');
        
        
       
      /* I*/
            
     $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel("Adiconar");
        $submit->setAttrib('id', 'submitbutton');
         $submit->removeDecorator('DtDdWrapper')
         ->setAttrib('class', 'btn btn-primary button')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label');        
            
    $this->addElements(array($id,$submit,$DS_ASSUNTO,$TX_PLANO_ACAO,$FK_PROJETO,$FK_OPERADOR,$FK_STATUS_PLANO_ACAO,$DT_ATUALIZACAO,$DT_PREVISAO,$DT_CONTROLE,$DT_CONCLUSAO));     
     $this->setDecorators( array( array('ViewScript', array('viewScript' => '/forms/formularioPlanoAcao.phtml'))));   
	
    }


}

