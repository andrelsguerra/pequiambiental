<?php

class Application_Form_Cliente extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	
    
    	    	
    	$this->setName('FormularioCliente');
        $ID_CLIENTE = new Zend_Form_Element_Hidden('$ID_CLIENTE');
        $ID_CLIENTE->addFilter('Int');
        $ID_CLIENTE->removeDecorator('Label');
        
        
        
        $DT_ATUALIZACAO = new Zend_Form_Element_Hidden('DT_ATUALIZACAO');
      
        $DT_ATUALIZACAO->removeDecorator('Label');
        
        
        $NM_CLIENTE= new Zend_Form_Element_Text('NM_CLIENTE');
        $NM_CLIENTE->setLabel('NOME')
             ->setRequired(true)
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty')
        	 ->removeDecorator('DtDdWrapper')
        	 ->removeDecorator('HtmlTag')
             ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter nome');
        
        $NR_CNPJ = new Zend_Form_Element_Text('NR_CNPJ');
        $NR_CNPJ->setLabel('CNPJ')
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty')
        	 ->removeDecorator('DtDdWrapper')
        	 ->removeDecorator('HtmlTag')
             ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter cnpj');
        
       	$TX_OBSERVACAO = new Zend_Form_Element_Textarea('TX_OBSERVACAO');
        $TX_OBSERVACAO->setLabel('OBSERVAÇÃO')
            		
					  ->removeDecorator('DtDdWrapper')
        			  ->removeDecorator('HtmlTag')
       				  ->removeDecorator('Label')
         			  ->setAttrib('class', 'form-control')
    				  ->setAttrib('rows', '5');    
         	
        $NM_LOGRADOURO = new Zend_Form_Element_Text('NM_LOGRADOURO');
        $NM_LOGRADOURO->setLabel('LOGRADOURO')
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty')
        	 ->removeDecorator('DtDdWrapper')
        	 ->removeDecorator('HtmlTag')
             ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter logradouro');
        
        
    	
    	$NR_NUMERO = new Zend_Form_Element_Text('NR_NUMERO');
        $NR_NUMERO->setLabel('NÚMERO')

             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty')
        	 ->removeDecorator('DtDdWrapper')
        	 ->removeDecorator('HtmlTag')
             ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter número');			  
    				  
    	$DS_COMPLEMENTO = new Zend_Form_Element_Text('DS_COMPLEMENTO');
        $DS_COMPLEMENTO->setLabel('LOGRADOURO')
           
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty')
        	 ->removeDecorator('DtDdWrapper')
        	 ->removeDecorator('HtmlTag')
             ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter complemento');		
        
         	 
         	 
    				 
    	$NM_BAIRRO = new Zend_Form_Element_Text('NM_BAIRRO');
        $NM_BAIRRO->setLabel('BAIRRO')
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
    	
    		
    	$NM_CIDADE = new Zend_Form_Element_Text('NM_CIDADE');
        $NM_CIDADE->setLabel('CIDADE')
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty')
        	 ->removeDecorator('DtDdWrapper')
        	 ->removeDecorator('HtmlTag')
             ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter cidade');
         	 
    	
    	$estados = array("AC"=>"Acre", "AL"=>"Alagoas", "AM"=>"Amazonas", "AP"=>"Amapá","BA"=>"Bahia","CE"=>"Ceará","DF"=>"Distrito Federal","ES"=>"Espírito Santo","GO"=>"Goiás","MA"=>"Maranhão","MT"=>"Mato Grosso","MS"=>"Mato Grosso do Sul","MG"=>"Minas Gerais","PA"=>"Pará","PB"=>"Paraíba","PR"=>"Paraná","PE"=>"Pernambuco","PI"=>"Piauí","RJ"=>"Rio de Janeiro","RN"=>"Rio Grande do Norte","RO"=>"Rondônia","RS"=>"Rio Grande do Sul","RR"=>"Roraima","SC"=>"Santa Catarina","SE"=>"Sergipe","SP"=>"São Paulo","TO"=>"Tocantins");
    	
    	$NM_UF = new Zend_Form_Element_Select( 'NM_UF' );
        $NM_UF->setLabel('UF')
            ->addMultiOptions($estados)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty')
        	->removeDecorator('DtDdWrapper')
        	->removeDecorator('HtmlTag')
            ->removeDecorator('Label')
         	->setAttrib('class', 'form-control select2') ->setAttrib('placeholder', 'Enter uf');;		 

    				  
    	$FK_RAMO_ATIVIDADE= new Zend_Form_Element_Select('FK_RAMO_ATIVIDADE');
        $FK_RAMO_ATIVIDADE->setAttrib('class', 'form-control');
        
        $ramoAtividade= new Application_Model_DbTable_RamoAtividade();
        $FK_RAMO_ATIVIDADE->setLabel('RAMO ATIVIDADE')
        ->setRequired(true)
		->removeDecorator('DtDdWrapper')
        	 ->removeDecorator('HtmlTag')
             ->removeDecorator('Label')
             ->setAttrib('class', 'form-control select2');
             
         
        $listaRamoAtividade=$ramoAtividade->getRamoAtividadeCombo();
        $FK_RAMO_ATIVIDADE->setMultiOptions( $listaRamoAtividade );			  
    	
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel("Adiconar");
        $submit->setAttrib('id', 'submitbutton');
         $submit->removeDecorator('DtDdWrapper')
         ->setAttrib('class', 'btn btn-primary button')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label');        
            
    $this->addElements(array($ID_CLIENTE,$NM_CLIENTE,$NR_CNPJ,$TX_OBSERVACAO,$NM_LOGRADOURO,$NR_NUMERO,$DS_COMPLEMENTO,$NM_BAIRRO,$NR_CEP,$NM_CIDADE,$NM_UF,$DT_ATUALIZACAO,$FK_RAMO_ATIVIDADE,$submit));     
     $this->setDecorators( array( array('ViewScript', array('viewScript' => '/forms/formularioCliente.phtml'))));   
	
    }


}

