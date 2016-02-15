<?php

class Application_Form_Contato extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	
    
    	    	
    	$this->setName('FormularioContato');
        $ID_CONTATO = new Zend_Form_Element_Hidden('ID_CONTATO');
        $ID_CONTATO->addFilter('Int');
        $ID_CONTATO->removeDecorator('Label');
        
        $nm_contato = new Zend_Form_Element_Text('NM_CONTATO');
        $nm_contato->setLabel('NOME')
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty')
        	 ->removeDecorator('DtDdWrapper')
        	 ->removeDecorator('HtmlTag')
             ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter nome');
        
        $nm_cargo = new Zend_Form_Element_Text('NM_CARGO');
        $nm_cargo->setLabel('CARGO')
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty')
        	 ->removeDecorator('DtDdWrapper')
        	 ->removeDecorator('HtmlTag')
             ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter cargo');
        
       	$nr_telefone = new Zend_Form_Element_Text('NR_TELEFONE');
        $nr_telefone->setLabel('TELEFONE 1')
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty')
        	 ->removeDecorator('DtDdWrapper')
        	 ->removeDecorator('HtmlTag')
             ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter telefone');
         	
        $nr_telefone2 = new Zend_Form_Element_Text('NR_TELEFONE2');
        $nr_telefone2->setLabel('TELEFONE 2')
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty')
        	 ->removeDecorator('DtDdWrapper')
        	 ->removeDecorator('HtmlTag')
             ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter telefone');
        
        $tx_observacao = new Zend_Form_Element_Textarea('TX_OBSERVACAO');
        $tx_observacao->setLabel('OBSERVAÇÃO')
            	
					  ->removeDecorator('DtDdWrapper')
        			  ->removeDecorator('HtmlTag')
       				  ->removeDecorator('Label')
         			  ->setAttrib('class', 'form-control')
    				  ->setAttrib('rows', '5');    
    	
    	$ds_email = new Zend_Form_Element_Text('DS_EMAIL');
        $ds_email->setLabel('E-MAIL')
            
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty')
        	 ->removeDecorator('DtDdWrapper')
        	 ->removeDecorator('HtmlTag')
             ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter e-mail');			  
    				  
    	$nm_logradouro = new Zend_Form_Element_Text('NM_LOGRADOURO');
        $nm_logradouro->setLabel('LOGRADOURO')
       
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty')
        	 ->removeDecorator('DtDdWrapper')
        	 ->removeDecorator('HtmlTag')
             ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter logradouro');			  
    				 
    	$nr_endereco = new Zend_Form_Element_Text('NR_ENDERECO');
        $nr_endereco->setLabel('NÚMERO')
           
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty')
        	 ->removeDecorator('DtDdWrapper')
        	 ->removeDecorator('HtmlTag')
             ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter número');
    	
    	$ds_complemento = new Zend_Form_Element_Text('DS_COMPLEMENTO');
        $ds_complemento->setLabel('COMPLEMENTO')
          
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty')
        	 ->removeDecorator('DtDdWrapper')
        	 ->removeDecorator('HtmlTag')
             ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter complemento');
    	
    		
    	$nm_bairro = new Zend_Form_Element_Text('NM_BAIRRO');
        $nm_bairro->setLabel('BAIRRO')
           
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty')
        	 ->removeDecorator('DtDdWrapper')
        	 ->removeDecorator('HtmlTag')
             ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter bairro');
         	 
         
        $nm_bairro = new Zend_Form_Element_Text('NM_BAIRRO');
        $nm_bairro->setLabel('BAIRRO')
          
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty')
        	 ->removeDecorator('DtDdWrapper')
        	 ->removeDecorator('HtmlTag')
             ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter bairro');
    	
    	$estados = array("AC"=>"Acre", "AL"=>"Alagoas", "AM"=>"Amazonas", "AP"=>"Amapá","BA"=>"Bahia","CE"=>"Ceará","DF"=>"Distrito Federal","ES"=>"Espírito Santo","GO"=>"Goiás","MA"=>"Maranhão","MT"=>"Mato Grosso","MS"=>"Mato Grosso do Sul","MG"=>"Minas Gerais","PA"=>"Pará","PB"=>"Paraíba","PR"=>"Paraná","PE"=>"Pernambuco","PI"=>"Piauí","RJ"=>"Rio de Janeiro","RN"=>"Rio Grande do Norte","RO"=>"Rondônia","RS"=>"Rio Grande do Sul","RR"=>"Roraima","SC"=>"Santa Catarina","SE"=>"Sergipe","SP"=>"São Paulo","TO"=>"Tocantins");
    	
    	$nm_uf = new Zend_Form_Element_Select( 'NM_UF' );
        $nm_uf->setLabel('UF')
            ->addMultiOptions($estados)
          
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty')
        	->removeDecorator('DtDdWrapper')
        	->removeDecorator('HtmlTag')
            ->removeDecorator('Label')
         	->setAttrib('class', 'form-control');		 


		$nr_cep = new Zend_Form_Element_Text('NR_CEP');
        $nr_cep->setLabel('CEP')
             
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty')
        	 ->removeDecorator('DtDdWrapper')
        	 ->removeDecorator('HtmlTag')
             ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter cep');
         	 
         	 
        $fl_agenda = new Zend_Form_Element_Select( 'FL_AGENDA' );
        $fl_agenda->setLabel('AGENDA')->addMultiOptions(array('0' => 'NÃO','1' => 'SIM' )  )
           
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty')
        	 ->removeDecorator('DtDdWrapper')
        	 ->removeDecorator('HtmlTag')
             ->removeDecorator('Label')
         	 ->setAttrib('class', 'form-control')
         	 ->setAttrib('placeholder', 'Enter cep');
//fk_CLIENTE
    				  
    	$fk_cliente= new Zend_Form_Element_Select('FK_CLIENTE');
        $fk_cliente->setAttrib('class', 'form-control');
        
        $cliente = new Application_Model_DbTable_Cliente();
        $fk_cliente->setLabel('CLIENTE')
        ->setRequired(true)
		->removeDecorator('DtDdWrapper')
        	 ->removeDecorator('HtmlTag')
             ->removeDecorator('Label');
         
        $listaClientes=$cliente->getClienteCombo();
        $fk_cliente->setMultiOptions( $listaClientes );			  
    				  
    				  
    				  
    				  
    				  
    				  
            
     $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel("Adiconar");
        $submit->setAttrib('id', 'submitbutton');
         $submit->removeDecorator('DtDdWrapper')
         ->setAttrib('class', 'btn btn-primary button')
        ->removeDecorator('HtmlTag')
        ->removeDecorator('Label');        
            
    $this->addElements(array($ID_CONTATO,$nm_contato,$nm_cargo,$nr_telefone,$nr_telefone2,$tx_observacao,$ds_email,$nm_logradouro,$nr_endereco,$ds_complemento,$nm_bairro,$nm_uf,$fk_cliente,$nr_cep,$fl_agenda,$submit));     
     $this->setDecorators( array( array('ViewScript', array('viewScript' => '/forms/formularioContato.phtml'))));   
	
    }


}

