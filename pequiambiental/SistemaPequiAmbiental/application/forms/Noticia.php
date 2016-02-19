<?php
header("Content-Type: text/html; charset=ISO-8859-1", true);
class Application_Form_Noticia extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	
    
    	    	
    	$this->setName('FormularioNoticia');
        $ID_NOTICIA = new Zend_Form_Element_Hidden('ID_NOTICIA');
        $ID_NOTICIA->addFilter('Int');
        $ID_NOTICIA->removeDecorator('Label');
        
        $FK_ARQUIVO = new Zend_Form_Element_Hidden('FK_ARQUIVO');
        $FK_ARQUIVO->addFilter('Int');
        $FK_ARQUIVO->removeDecorator('Label');
        
        $DS_TITULO= new Zend_Form_Element_Text('DS_TITULO');
        $DS_TITULO->setLabel('TÍTULO')
             ->setRequired(true)
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty')
        	 ->removeDecorator('DtDdWrapper')
        	 ->removeDecorator('HtmlTag')
             ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', "Enter título");
        
        $TX_NOTICIA = new Zend_Form_Element_Textarea('TX_NOTICIA');
        $TX_NOTICIA->setLabel('TEXTO')
            	 ->setRequired(true)
					  ->removeDecorator('DtDdWrapper')
        			  ->removeDecorator('HtmlTag')
       				  ->removeDecorator('Label')
         			  ->setAttrib('class', 'form-control')
    				  ->setAttrib('rows', '20');    	  
    	
    	$DS_RESUMO = new Zend_Form_Element_Textarea('DS_RESUMO');
        $DS_RESUMO->setLabel('RESUMO')
            	 ->setRequired(true)
					  ->removeDecorator('DtDdWrapper')
        			  ->removeDecorator('HtmlTag')
       				  ->removeDecorator('Label')
         			  ->setAttrib('class', 'form-control')
    				  ->setAttrib('rows', '5');  			  
    	
    	$DT_NOTICIA = new Zend_Form_Element_Hidden('DT_NOTICIA');
        $DT_NOTICIA->removeDecorator('Label');	
    	
    	$tiposNoticia = array("1"=>"NOTICIAS", "2"=>"NOVIDADES", "3"=>"RECADOS");
    	
    	$FK_TIPO_NOTICIA = new Zend_Form_Element_Select( 'FK_TIPO_NOTICIA' );
        $FK_TIPO_NOTICIA->setLabel('TIPO NOTÍCIA')
         ->setRequired(true)
            ->addMultiOptions($tiposNoticia)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty')
        	->removeDecorator('DtDdWrapper')
        	->removeDecorator('HtmlTag')
            ->removeDecorator('Label')
         	->setAttrib('class', 'form-control select2') ->setAttrib('placeholder', "Enter tipo notícia");;		 
    	
    	$FK_OPERADOR = new Zend_Form_Element_Hidden('FK_OPERADOR');
        $FK_OPERADOR->addFilter('Int');
        $FK_OPERADOR->removeDecorator('Label');		  
            
     $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel("Adiconar");
        $submit->setAttrib('id', 'submitbutton');
         $submit->removeDecorator('DtDdWrapper')
         ->setAttrib('class', 'btn btn-primary button')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label');        
            
    $this->addElements(array($ID_NOTICIA,$DS_TITULO,$TX_NOTICIA,$FK_ARQUIVO,$DS_RESUMO,$DT_NOTICIA,$FK_TIPO_NOTICIA,$FK_OPERADOR,$submit));     
     $this->setDecorators( array( array('ViewScript', array('viewScript' => '/forms/formularioNoticia.phtml'))));   
	
    }


}

