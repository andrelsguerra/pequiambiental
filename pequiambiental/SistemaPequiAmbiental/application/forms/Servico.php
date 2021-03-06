<?php

class Application_Form_Servico extends Zend_Form
{
	protected $_OPERADOR;
	protected $_PROJETOS;
	//protected $_PROJETO;//Na hora de editar o pcp nao pode alterar o projeto
	

    public function setOperador($operador)
    {
       // $this->_myParameters = $myParameters;
        $this->_OPERADOR = $operador;
    	//$this->_OPERADOR='1';
    	//Zend_Registry::get('logger')->log("testeddd", Zend_Log::INFO);
    	$projeto= new Application_Model_DbTable_Projeto();
    	//$this->_PROJETOS=$projeto->getProjetoCombo() ;
    	$this->_PROJETOS=$projeto->getProjetosOperadorPermissao($operador);
    	
    }
    public function setProjetos($projeto)
    {
       // $this->_myParameters = $myParameters;
     //   $this->$_PROJETO = $projeto;
    	//$this->_OPERADOR='1';
    	//Zend_Registry::get('logger')->log("testeddd", Zend_Log::INFO);
    	$projeto= new Application_Model_DbTable_Projeto();
    	//$this->_PROJETOS=$projeto->getProjetoCombo() ;
    	$this->_PROJETOS=$projeto->getProjetoEditCombo($projeto);
    	
    }
    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	if(!isset($this->_PROJETOS)){
    		$projeto= new Application_Model_DbTable_Projeto();
    		$this->_PROJETOS=$projeto->getProjetoCombo() ;
    	}  
    
    	    	
    	$this->setName('FormularioServico');
        $ID_SERVICO = new Zend_Form_Element_Hidden('ID_SERVICO');
        $ID_SERVICO->addFilter('Int');
        $ID_SERVICO->removeDecorator('Label');
        
        
        $FK_OPERADOR = new Zend_Form_Element_Hidden('FK_OPERADOR');
        $FK_OPERADOR->addFilter('Int');
        $FK_OPERADOR->removeDecorator('Label');
       
        $FL_PCP = new Zend_Form_Element_Hidden('FL_PCP');
        $FL_PCP->addFilter('Int');
        $FL_PCP->removeDecorator('Label');
        
      /* 
       
       
       
       
       
       
       */

        $FK_TIPO_SERVICO= new Zend_Form_Element_Select('FK_TIPO_SERVICO');
        $tipoServico= new Application_Model_DbTable_TipoServico();
        $FK_TIPO_SERVICO->setLabel('TIPO SERVIÇO');
        $FK_TIPO_SERVICO->setMultiOptions( $tipoServico->getTipoServicoCombo() )
        ->setRequired(true)
        ->removeDecorator('DtDdWrapper')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label')
        ->setAttrib('class', 'form-control select2');
        
		$FK_PROJETO= new Zend_Form_Element_Select('FK_PROJETO');
        $projeto= new Application_Model_DbTable_Projeto();
        $FK_PROJETO->setLabel('PROJETO');
        $FK_PROJETO->setMultiOptions( $this->_PROJETOS )
        ->setRequired(true)
        ->removeDecorator('DtDdWrapper')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label')
        ->setAttrib('class', 'form-control select2');

        
       $DS_SERVICO = new Zend_Form_Element_Textarea('DS_SERVICO');
       $DS_SERVICO->setLabel('SERVIÇO')
         	
         	 ->removeDecorator('DtDdWrapper')
         	 ->removeDecorator('HtmlTag')
         	 ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control ')
         	 ->setAttrib('rows', '20');
        
        $DT_SERVICO = new Zend_Form_Element_Text('DT_SERVICO');
        $DT_SERVICO->setLabel('DATA')
        ->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty')
        ->removeDecorator('DtDdWrapper')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label')
        ->setAttrib('class', 'form-control')
         ->addPrefixPath('Aplicacao_Validate', 'Aplicacao/Validate/', 'validate')
			->addValidator(new Aplicacao_Validate_Data())
        ->setAttrib('placeholder', 'Enter serviço ');
        
        $NR_CARGA_HORARIA = new Zend_Form_Element_Text('NR_CARGA_HORARIA');
        $NR_CARGA_HORARIA->setLabel('CARGA HORARIA')
        ->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty')
        ->removeDecorator('DtDdWrapper')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label')
         ->addValidator('float', true, array('locale' => 'en_US'))
        ->setAttrib('class', 'form-control')
        ->setAttrib('placeholder', 'Enter carga horária ');
        
        
            
     $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel("Adiconar");
        $submit->setAttrib('id', 'submitbutton');
         $submit->removeDecorator('DtDdWrapper')
         ->setAttrib('class', 'btn btn-primary button')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label');        
            
    $this->addElements(array($ID_SERVICO,$FK_PROJETO,$DS_SERVICO,$FK_OPERADOR,$FK_TIPO_SERVICO,$DT_SERVICO,$FL_PCP,$NR_CARGA_HORARIA,$submit));     
     $this->setDecorators( array( array('ViewScript', array('viewScript' => '/forms/formularioServico.phtml'))));   
	
    }


}

