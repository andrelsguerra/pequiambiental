<?php

class Application_Form_Projeto extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	
    	$this->setAttrib('enctype', 'multipart/form-data');
    	    	
    	$this->setName('FormularioCompra');
        $ID_PROJETO = new Zend_Form_Element_Hidden('ID_PROJETO');
        $ID_PROJETO->addFilter('Int');
        $ID_PROJETO->removeDecorator('Label');
        
        
        $NM_PROJETO = new Zend_Form_Element_Text('NM_PROJETO');
        $NM_PROJETO->setLabel('NOME PROJETO')
             ->setRequired(true)
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty')
        	 ->removeDecorator('DtDdWrapper')
        	 ->removeDecorator('HtmlTag')
             ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter nome ');
       
         $DT_CADASTRO= new Zend_Form_Element_Text('DT_CADASTRO');
         $DT_CADASTRO->setLabel('DATA CADASTRO')
         	 ->setRequired(true)
         	 ->addFilter('StripTags')
         	 ->addFilter('StringTrim')
         	 ->addValidator('NotEmpty')
         	 ->removeDecorator('DtDdWrapper')
         	 ->removeDecorator('HtmlTag')
         	 ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control');
          
         	 $FK_AGENCIA_AMBIENTAL= new Zend_Form_Element_Select('FK_AGENCIA_AMBIENTAL');
         	 $agenciaAmbiental= new Application_Model_DbTable_AgenciaAmbiental();
         	 $FK_AGENCIA_AMBIENTAL->setLabel('AGÊNCIA AMBIENTAL');
         	 $FK_AGENCIA_AMBIENTAL->setMultiOptions( $agenciaAmbiental->getAgenciaAmbientalCombo () )
         	 ->setRequired(true)
         	 ->removeDecorator('DtDdWrapper')
         	 ->removeDecorator('HtmlTag')
         	 ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control select2');
       
         	 $NR_CONTRATO= new Zend_Form_Element_Text('NR_CONTRATO');
         	 $NR_CONTRATO->setLabel('Nº CONTRATO')
       
         	 ->addFilter('StripTags')
         	 ->addFilter('StringTrim')
         	 ->addValidator('NotEmpty')
         	 ->removeDecorator('DtDdWrapper')
         	 ->removeDecorator('HtmlTag')
         	 ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter nº contrato ');
         	 
         	 $TX_OBSERVACAO = new Zend_Form_Element_Textarea('TX_OBSERVACAO');
         	 $TX_OBSERVACAO->setLabel('OBSERVAÇÃO')
         	
         	 ->removeDecorator('DtDdWrapper')
         	 ->removeDecorator('HtmlTag')
         	 ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('rows', '20');
         	 
         	 
         	 
         	 $FK_CLIENTE= new Zend_Form_Element_Select('FK_CLIENTE');
         	 $cliente= new Application_Model_DbTable_Cliente();
         	 $FK_CLIENTE->setLabel('CLIENTE');
         	 $FK_CLIENTE->setMultiOptions( $cliente->getClienteCombo() )
         	 ->setRequired(true)
         	 ->removeDecorator('DtDdWrapper')
         	 ->removeDecorator('HtmlTag')
         	 ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control select2');
         	 
         	 
         	 $FK_STATUS_PROJETO= new Zend_Form_Element_Select('FK_STATUS_PROJETO');
         	 $statusProjeto= new Application_Model_DbTable_StatusProjeto();
         	 $FK_STATUS_PROJETO->setLabel('STATUS');
         	 $FK_STATUS_PROJETO->setMultiOptions( $statusProjeto->getStatusProjetoCombo())
         	 ->setRequired(true)
         	 ->removeDecorator('DtDdWrapper')
         	 ->removeDecorator('HtmlTag')
         	 ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control select2');
         	 
         	 /*$tiposNoticia = array("1"=>"SIM", "2"=>"NÃO);
         	  
         	 $FL_ATIVO = new Zend_Form_Element_Select( 'FL_ATIVO' );
         	 $FL_ATIVO->setLabel('ATIVO')
         	 ->setRequired(true)
         	 ->addMultiOptions($tiposNoticia)
         	 ->addFilter('StripTags')
         	 ->addFilter('StringTrim')
         	 ->addValidator('NotEmpty')
         	 ->removeDecorator('DtDdWrapper')
         	 ->removeDecorator('HtmlTag')
         	 ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control select2') ->setAttrib('placeholder', "Enter tipo not�cia");;*/
         	 
         	 $FK_INDICACAO= new Zend_Form_Element_Select('FK_INDICACAO');
         	 $statusIndicacao= new Application_Model_DbTable_Indicacao();
         	 $FK_INDICACAO->setLabel('INDICAÇÃO');
         	 $FK_INDICACAO->setMultiOptions( $statusIndicacao->getIndicacaoCombo())
         	 ->setRequired(true)
         	 ->removeDecorator('DtDdWrapper')
         	 ->removeDecorator('HtmlTag')
         	 ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control select2');
         	 
         	 
         	 $Fk_GESTOR= new Zend_Form_Element_Select('Fk_GESTOR');
         	 $gestor= new Application_Model_DbTable_Operador();
         	 $Fk_GESTOR->setLabel('GESTOR');
         	 $Fk_GESTOR->setMultiOptions( $gestor->getOperadorCombo())
         	
         	 ->removeDecorator('DtDdWrapper')
         	 ->removeDecorator('HtmlTag')
         	 ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control select2');
    
         	 
         	 $FK_TIPO_PROJETO= new Zend_Form_Element_Select('FK_TIPO_PROJETO');
         	 $tipoProjeto= new Application_Model_DbTable_TipoProjeto();
         	 $FK_TIPO_PROJETO->setLabel('TIPO PROJETO');
         	 $FK_TIPO_PROJETO->setMultiOptions( $tipoProjeto->getTipoProjetoCombo())
         	 ->setRequired(true)
         	 ->removeDecorator('DtDdWrapper')
         	 ->removeDecorator('HtmlTag')
         	 ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control select2');
         
     	$submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel("Adiconar");
        $submit->setAttrib('id', 'submitbutton');
        $submit->removeDecorator('DtDdWrapper')
         ->setAttrib('class', 'btn btn-info pull-right')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label');    
        
        $ADICIONAR= new Zend_Form_Element_Button('ADICIONAR');
        $ADICIONAR->setLabel("Adiconar");
        
        $ADICIONAR->setAttrib('id', 'submitbutton');
        $ADICIONAR->setAttrib('data-toggle', 'modal');
        $ADICIONAR->setAttrib('data-target', '#myModal');
        $ADICIONAR->removeDecorator('DtDdWrapper')
        ->setAttrib('class', 'btn btn-info btn-flat')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label');
            
     $this->addElements(array($ID_PROJETO,$NM_PROJETO,$DT_CADASTRO,$FK_AGENCIA_AMBIENTAL,$NR_CONTRATO,$FK_CLIENTE,$TX_OBSERVACAO,$FK_STATUS_PROJETO,$FK_INDICACAO,$Fk_GESTOR,$FK_TIPO_PROJETO,$submit,$ADICIONAR));     
     $this->setDecorators( array( array('ViewScript', array('viewScript' => '/forms/formularioProjeto.phtml'))));   
	
    }


}

