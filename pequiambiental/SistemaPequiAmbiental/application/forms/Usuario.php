<?php

class Application_Form_Usuario extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	
    	$this->setName('nome');
    	$this->setAttrib('enctype', 'multipart/form-data');
        $id = new Zend_Form_Element_Hidden('id_usuario');
        $id->addFilter('Int');
        
        
        
        
        $jobrole = new Zend_Form_Element_Text('jobrole');
        $jobrole->setLabel('Jobrole')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty')
             ->addFilter('StripTags')
        ->setAttrib('class', 'form-control')
        ->setAttrib('placeholder', 'Jobrole')
        ->removeDecorator('DtDdWrapper')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label');;
        
        $cellphone = new Zend_Form_Element_Text('cellphone');
        $cellphone->setLabel('Cellphone')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty')
            ->setAttrib('class', 'form-control')
        ->setAttrib('placeholder', 'Cellphone')
        ->removeDecorator('DtDdWrapper')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label');
        
        
        $nome = new Zend_Form_Element_Text('nome');
        $nome->setLabel('Nome')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty')
             ->setAttrib('class', 'form-control')
        ->setAttrib('placeholder', 'Nome')
        ->removeDecorator('DtDdWrapper')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label');
            
        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('Email')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('EmailAddress')
            ->addValidator('NotEmpty')
               ->setAttrib('class', 'form-control')
        ->setAttrib('placeholder', 'Email')
        ->removeDecorator('DtDdWrapper')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label');

        $login = new Zend_Form_Element_Text('login');
        $login->setLabel('Login')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty')
             ->setAttrib('class', 'form-control')
        ->setAttrib('placeholder', 'Login')
        ->removeDecorator('DtDdWrapper')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label');
            
        $senha = new Zend_Form_Element_Password('senha');
        $senha->setLabel('Senha')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty')
             ->setAttrib('class', 'form-control')
        ->setAttrib('placeholder', 'Senha')
        ->removeDecorator('DtDdWrapper')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label');
            
        $repetirSenha = new Zend_Form_Element_Password('repetirSenha');
        $repetirSenha->setLabel('Repetir senha')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty')
             ->setAttrib('class', 'form-control')
        ->setAttrib('placeholder', 'Repetir senha')
        ->removeDecorator('DtDdWrapper')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label');
            
       $fk_perfil= new Zend_Form_Element_Select('fk_perfil');
       $perfil = new Application_Model_DbTable_Perfil();
       $fk_perfil->setLabel('Perfil');
       $fk_perfil->setMultiOptions( $perfil->getPerfil() )
       ->removeDecorator('DtDdWrapper')
       ->removeDecorator('HtmlTag')
       ->removeDecorator('Label')
       ->setAttrib('class', 'form-control select2');
       
       

      /* $fk_arquivo= new Zend_Form_Element_File('fk_arquivo');
	   $fk_arquivo->setLabel('Arquivo')
	->addValidator('Extension', false, array('jpg', 'png', 'gif'))
	->addValidator('Size', false, 102400)
	->setDestination(BASE_PATH . '/upload');
       Zend_Registry::get('logger')->log(BASE_PATH . '/upload', Zend_Log::INFO);

       */
       $element = new Zend_Form_Element_File('fileUpload');
$element->setLabel('Arquivo')
	->addValidator('Extension', false, array('jpg', 'png', 'gif'))
	->addValidator('Size', false, 102400)
	->removeDecorator('DtDdWrapper')
	->removeDecorator('HtmlTag')
	->removeDecorator('Label');

       
      
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel("Adiconar");
        $submit->setAttrib('id', 'submitbutton');
         $submit->removeDecorator('DtDdWrapper')
         ->setAttrib('class', 'btn btn-primary button')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label');   
        
        $this->addElements(array($id, $nome, $email,$login,$senha,$repetirSenha,$fk_perfil,$element, $submit));
     // $this->addElements(array($id, $nome, $email,$senha, $submit));
        $this->setDecorators( array( array('ViewScript', array('viewScript' => '/forms/formularioUsuario.phtml'))));
    }


}

