<?php

class Application_Form_Operador extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	
    	$this->setName('nome');
    	$this->setAttrib('enctype', 'multipart/form-data');
        $ID_OPERADOR = new Zend_Form_Element_Hidden('ID_OPERADOR');
        $ID_OPERADOR->addFilter('Int');
        
		$NM_OPERADOR= new Zend_Form_Element_Text('NM_OPERADOR');
        $NM_OPERADOR->setLabel('NOME')
        ->setRequired(true)
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty')
        	 ->removeDecorator('DtDdWrapper')
        	 ->removeDecorator('HtmlTag')
             ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter nome');
         	 
         	 
        $DS_TELEFONE_PESSOAL= new Zend_Form_Element_Text('DS_TELEFONE_PESSOAL');
        $DS_TELEFONE_PESSOAL->setLabel('TELEFONE PESSOAL')
  
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty')
        	 ->removeDecorator('DtDdWrapper')
        	 ->removeDecorator('HtmlTag')
             ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter telefone pessoal');
         	 
         	 
        $DS_TELEFONE_BIOS= new Zend_Form_Element_Text('DS_TELEFONE_BIOS');
        $DS_TELEFONE_BIOS->setLabel('TELEFONE BIOS')
  
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty')
        	 ->removeDecorator('DtDdWrapper')
        	 ->removeDecorator('HtmlTag')
             ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter telefone bios'); 	
         	 
        $DS_EMAIL_PESSOAL= new Zend_Form_Element_Text('DS_EMAIL_PESSOAL');
        $DS_EMAIL_PESSOAL->setLabel('E-MAIL PESSOAL')
  
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty')
        	 ->removeDecorator('DtDdWrapper')
        	 ->removeDecorator('HtmlTag')
             ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter e-mail pessoal'); 
        
        $DS_EMAIL_BIOS= new Zend_Form_Element_Text('DS_EMAIL_BIOS');
        $DS_EMAIL_BIOS->setLabel('E-MAIL BIOS')
         	 
         	 ->addFilter('StripTags')
         	 ->addFilter('StringTrim')
         	 ->addValidator('NotEmpty')
         	 ->removeDecorator('DtDdWrapper')
         	 ->removeDecorator('HtmlTag')
         	 ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter e-mail bios');
       
        $DS_ENDERECO= new Zend_Form_Element_Text('DS_ENDERECO');
        $DS_ENDERECO->setLabel('ENDEREÇO')
         	 
         	 ->addFilter('StripTags')
         	 ->addFilter('StringTrim')
         	 ->addValidator('NotEmpty')
         	 ->removeDecorator('DtDdWrapper')
         	 ->removeDecorator('HtmlTag')
         	 ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter endereco');
        
         $DS_BAIRRO= new Zend_Form_Element_Text('DS_BAIRRO');
         $DS_BAIRRO->setLabel('BAIRRO')
         	 
         	 ->addFilter('StripTags')
         	 ->addFilter('StringTrim')
         	 ->addValidator('NotEmpty')
         	 ->removeDecorator('DtDdWrapper')
         	 ->removeDecorator('HtmlTag')
         	 ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter bairro');
         
         $NR_CEP= new Zend_Form_Element_Text('NR_CEP');
         $NR_CEP->setLabel('CEP')
         	 
         	 ->addFilter('StripTags')
         	 ->addFilter('StringTrim')
         	 ->addValidator('NotEmpty')
         	 ->removeDecorator('DtDdWrapper')
         	 ->removeDecorator('HtmlTag')
         	 ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter cep');
         
        
         $NR_CPF= new Zend_Form_Element_Text('NR_CPF');
         $NR_CPF->setLabel('CPF')
         	 
         	 ->addFilter('StripTags')
         	 ->addFilter('StringTrim')
         	 ->addValidator('NotEmpty')
         	 ->removeDecorator('DtDdWrapper')
         	 ->removeDecorator('HtmlTag')
         	 ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter cpf');
         
         $NR_IDENTIDADE= new Zend_Form_Element_Text('NR_IDENTIDADE');
         $NR_IDENTIDADE->setLabel('Nº IDENTIDADE')
         	 
         	 ->addFilter('StripTags')
         	 ->addFilter('StringTrim')
         	 ->addValidator('NotEmpty')
         	 ->removeDecorator('DtDdWrapper')
         	 ->removeDecorator('HtmlTag')
         	 ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter nÂº identidade');
         	 
         $DT_NASCIMENTO= new Zend_Form_Element_Text('DT_NASCIMENTO');
         $DT_NASCIMENTO->setLabel('DATA NASCIMENTO')
         ->setRequired(true)
         	 ->addFilter('StripTags')
         	 ->addFilter('StringTrim')
         	 ->addValidator('NotEmpty')
         	 ->removeDecorator('DtDdWrapper')
         	 ->removeDecorator('HtmlTag')
         	 ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter data nascimento');         	 
    
         $DS_REGISTRO_PROFISSIONAL= new Zend_Form_Element_Text('DS_REGISTRO_PROFISSIONAL');
         $DS_REGISTRO_PROFISSIONAL->setLabel('REGISTRO PROFISSIONAL')
         	 
         	 ->addFilter('StripTags')
         	 ->addFilter('StringTrim')
         	 ->addValidator('NotEmpty')
         	 ->removeDecorator('DtDdWrapper')
         	 ->removeDecorator('HtmlTag')
         	 ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter data registro profissional');
         	 
         $DS_CTF_IBAM= new Zend_Form_Element_Text('DS_CTF_IBAM');
         $DS_CTF_IBAM->setLabel('CTF IBAMA')
         	 
         	 ->addFilter('StripTags')
         	 ->addFilter('StringTrim')
         	 ->addValidator('NotEmpty')
         	 ->removeDecorator('DtDdWrapper')
         	 ->removeDecorator('HtmlTag')
         	 ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter ctf ibama');
         
         $DS_SKYPE= new Zend_Form_Element_Text('DS_SKYPE');
         $DS_SKYPE->setLabel('SKYPE')
         	 
         	 ->addFilter('StripTags')
         	 ->addFilter('StringTrim')
         	 ->addValidator('NotEmpty')
         	 ->removeDecorator('DtDdWrapper')
         	 ->removeDecorator('HtmlTag')
         	 ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter skype');
         
         $DS_LOGIN= new Zend_Form_Element_Text('DS_LOGIN');
         $DS_LOGIN->setLabel('LOGIN')
         ->setRequired(true)
         	 ->addFilter('StripTags')
         	 ->addFilter('StringTrim')
         	 ->addValidator('NotEmpty')
         	 ->removeDecorator('DtDdWrapper')
         	 ->removeDecorator('HtmlTag')
         	 ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter skype');
        
         $DS_SENHA= new Zend_Form_Element_Password('DS_SENHA');
         $DS_SENHA->setLabel('SENHA')
         ->setRequired(true)
         	 ->addFilter('StripTags')
         	 ->addFilter('StringTrim')
         	 ->addValidator('NotEmpty')
         	 ->removeDecorator('DtDdWrapper')
         	 ->removeDecorator('HtmlTag')
         	 ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter senha');
         	 
          $REPETIR_SENHA= new Zend_Form_Element_Password('REPETIR_SENHA');
          $REPETIR_SENHA->setLabel('REPETIR SENHA')
          ->setRequired(true)
         	 ->addFilter('StripTags')
         	 ->addFilter('StringTrim')
         	 ->addValidator('NotEmpty')
         	 ->removeDecorator('DtDdWrapper')
         	 ->removeDecorator('HtmlTag')
         	 ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter repetir senha');
          
         
          $NM_CONTATO_FAMILIAR= new Zend_Form_Element_Text('NM_CONTATO_FAMILIAR');
          $NM_CONTATO_FAMILIAR->setLabel('NOME CONTATO FAMILIAR')
         	 
         	 ->addFilter('StripTags')
         	 ->addFilter('StringTrim')
         	 ->addValidator('NotEmpty')
         	 ->removeDecorator('DtDdWrapper')
         	 ->removeDecorator('HtmlTag')
         	 ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter nome contato familiar');
       

          $NR_TELEFONE_CONTATO_FAMILIAR= new Zend_Form_Element_Text('NR_TELEFONE_CONTATO_FAMILIAR');
          $NR_TELEFONE_CONTATO_FAMILIAR->setLabel('Nº TELEFONE CONTATO FAMILIAR')
         	 
         	 ->addFilter('StripTags')
         	 ->addFilter('StringTrim')
         	 ->addValidator('NotEmpty')
         	 ->removeDecorator('DtDdWrapper')
         	 ->removeDecorator('HtmlTag')
         	 ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter nº telefone contato familiar');
          
         	 
          $FK_PERFIL= new Zend_Form_Element_Select('FK_PERFIL');
          $perfil = new Application_Model_DbTable_Perfil();
          $FK_PERFIL->setLabel('Perfil');
          $FK_PERFIL->setMultiOptions( $perfil->getPerfil() )
          ->setRequired(true)
         	 ->removeDecorator('DtDdWrapper')
         	 ->removeDecorator('HtmlTag')
         	 ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control select2');
         	 
         	 
         	 $submit = new Zend_Form_Element_Submit('submit');
         	 $submit->setLabel("Adiconar");
         	 $submit->setAttrib('id', 'submitbutton');
         	 $submit->removeDecorator('DtDdWrapper')
         	 ->setAttrib('class', 'btn btn-primary button')
         	 ->removeDecorator('HtmlTag')
         	 ->removeDecorator('Label');
         	 
        
        $this->addElements(array($ID_OPERADOR,$NM_OPERADOR,$DS_TELEFONE_PESSOAL,$DS_TELEFONE_BIOS,$DS_EMAIL_PESSOAL,$DS_EMAIL_BIOS,$DS_ENDERECO,$DS_BAIRRO,$NR_CEP,$NR_CPF,$NR_IDENTIDADE,$DT_NASCIMENTO,$DS_REGISTRO_PROFISSIONAL,$DS_CTF_IBAM,$DS_SKYPE,$DS_LOGIN,$DS_SENHA,$REPETIR_SENHA,$NM_CONTATO_FAMILIAR, $NR_TELEFONE_CONTATO_FAMILIAR, $FK_PERFIL,$submit));
     // $this->addElements(array($id, $nome, $email,$senha, $submit));
        $this->setDecorators( array( array('ViewScript', array('viewScript' => '/forms/formularioOperador.phtml'))));
    }


}

