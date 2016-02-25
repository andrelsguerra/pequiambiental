<?php
error_reporting(E_ALL | E_STRICT);
if(!defined('BASE_PATH')) {
    define('BASE_PATH', dirname(__FILE__) . '/..');
}
ini_set('display_errors', true);
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
/**
     * inits FirePHP for debugging
     *
     * @return void
     */

    protected function _initFirebugDebugger() {
       // if(APPLICATION_ENV == 'development') {
            // don't debug while not in "development"
            $logger = new Zend_Log();
            $writer = new Zend_Log_Writer_Firebug();
            $logger->addWriter($writer);
 
            Zend_Registry::set('logger',$logger);
     //   }
    }
    protected function _initAcl()
	{
		$aclSetup = new Aplicacao_Acl_Setup();
		setlocale (LC_ALL, 'pt_BR');
date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_MONETARY,'ptb'); // formato monetario padrao brasileiro 1.000,00
}
	protected function _initView () {
		ini_set('default_charset', 'UTF-8');
    $view = new Zend_View();
    // snip...
    $view->setEncoding('utf-8');
    
    // snip...
    return $view;
}
public function _initPlugins()
{
   $frontController = Zend_Controller_Front::getInstance();
   $frontController->registerPlugin(new Aplicacao_Plugin_Auth());
   $session = new Zend_Session_Namespace();

}
protected function _initNavigation()
{
   /* $this->bootstrap('layout');
    $layout = $this->getResource('layout');
    $view = $layout->getView();
    $config = new Zend_Config_Xml(APPLICATION_PATH.'/configs/navigation.xml');
 
    $navigation = new Zend_Navigation($config);
    $view->navigation($navigation);*/
}

protected function _initHelpers()
{
	$viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
	
	$viewRenderer->initView();

	// add zend view helper path
	//$viewRenderer->view->addHelperPath('ZF/View/Helper/');
	$viewRenderer->view->addHelperPath('ZF/View/Helper/', "ZF_View_Helper");

	// add zend action helper path
	//Zend_Controller_Action_HelperBroker::addPath('ZF/Controller/Helper/');
	Zend_Controller_Action_HelperBroker::addPath('ZF/Controller/Helper/', "ZF_Controller_Action_Helper");
}

}

