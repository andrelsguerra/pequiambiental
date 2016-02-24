<!DOCTYPE HTML><html lang='pt' dir='ltr'><meta charset="utf-8" /><meta name="robots" content="noindex,nofollow" /><meta http-equiv="X-UA-Compatible" content="IE=Edge"><link rel="icon" href="favicon.ico" type="image/x-icon" /><link rel="shortcut icon" href="favicon.ico" type="image/x-icon" /><link rel="stylesheet" type="text/css" href="phpmyadmin.css.php?server=1&amp;token=ed357400b4aa86a24f84238664c34397&amp;nocache=5578406292ltr" /><link rel="stylesheet" type="text/css" href="./themes/pmahomme/jquery/jquery-ui-1.9.2.custom.css" /><title>127.0.0.1 / 127.0.0.1 / biosconsultori / qrelatservicos | phpMyAdmin 4.0.4</title><script type='text/javascript' src='js/get_scripts.js.php?scripts[]=jquery/jquery-1.8.3.js&scripts[]=ajax.js&scripts[]=keyhandler.js&scripts[]=jquery/jquery-ui-1.9.2.custom.js&scripts[]=jquery/jquery.sprintf.js&scripts[]=jquery/jquery.cookie.js&scripts[]=jquery/jquery.mousewheel.js&scripts[]=jquery/jquery.event.drag-2.2.js&scripts[]=jquery/jquery-ui-timepicker-addon.js&scripts[]=jquery/jquery.ba-hashchange-1.3.js&scripts[]=jquery/jquery.debounce-1.0.5.js&scripts[]=jquery/jquery.menuResizer-1.0.js&scripts[]=rte.js&scripts[]=functions.js&scripts[]=navigation.js&scripts[]=indexes.js&scripts[]=common.js&scripts[]=codemirror/lib/codemirror.js&scripts[]=codemirror/mode/mysql/mysql.js'></script><script type='text/javascript' src='js/messages.php?lang=pt&amp;db=biosconsultori&amp;server=0&amp;token=ed357400b4aa86a24f84238664c34397'></script><script type='text/javascript' src='js/get_image.js.php?theme=pmahomme'></script><script type="text/javascript">// <![CDATA[
PMA_commonParams.setAll({common_query:"server=0&token=ed357400b4aa86a24f84238664c34397",opendb_url:"db_structure.php",safari_browser:"0",querywindow_height:"400",querywindow_width:"600",collation_connection:"utf8mb4_general_ci",lang:"pt",server:"0",table:"",db:"biosconsultori",token:"ed357400b4aa86a24f84238664c34397",text_dir:"ltr",pma_absolute_uri:"http://127.0.0.1/phpmyadmin/",pma_text_default_tab:"Procurar",pma_text_left_default_tab:"Estrutura",confirm:"1"});
AJAX.scriptHandler.add("jquery/jquery-1.8.3.js",0).add("ajax.js",0).add("keyhandler.js",1).add("jquery/jquery-ui-1.9.2.custom.js",0).add("jquery/jquery.sprintf.js",0).add("jquery/jquery.cookie.js",0).add("jquery/jquery.mousewheel.js",0).add("jquery/jquery.event.drag-2.2.js",0).add("jquery/jquery-ui-timepicker-addon.js",0).add("jquery/jquery.ba-hashchange-1.3.js",0).add("jquery/jquery.debounce-1.0.5.js",0).add("jquery/jquery.menuResizer-1.0.js",0).add("rte.js",1).add("messages.php?lang=pt&amp;db=biosconsultori&amp;server=0&amp;token=ed357400b4aa86a24f84238664c34397",0).add("get_image.js.php?theme=pmahomme",0).add("functions.js",1).add("navigation.js",0).add("indexes.js",1).add("common.js",1).add("codemirror/lib/codemirror.js",0).add("codemirror/mode/mysql/mysql.js",0);
$(function() {AJAX.fireOnload("keyhandler.js");AJAX.fireOnload("rte.js");AJAX.fireOnload("functions.js");AJAX.fireOnload("indexes.js");AJAX.fireOnload("common.js");});
// ]]></script></head><body><div id="pma_navigation"><div id="pma_navigation_resizer"></div><div id="pma_navigation_collapser"></div><div id="pma_navigation_content"><a class="hide navigation_url" href="navigation.php?ajax_request=1&amp;token=ed357400b4aa86a24f84238664c34397"></a><!-- LOGO START --><div id="pmalogo">    <a href="index.php?token=ed357400b4aa86a24f84238664c34397"><img src="./themes/pmahomme/img/logo_left.png" alt="phpMyAdmin" id="imgpmalogo" /></a></div><!-- LOGO END --><!-- LINKS START --><div id="leftframelinks"><a href="index.php?token=ed357400b4aa86a24f84238664c34397" title="Início"><img src="themes/dot.gif" title="Início" alt="Início" class="icon ic_b_home" /></a><a href="querywindow.php?db=biosconsultori&amp;table=qrelatservicos&amp;token=ed357400b4aa86a24f84238664c34397&amp;no_js=true" id="pma_open_querywindow" class="disableAjax" title="Janela de consulta"><img src="themes/dot.gif" title="Janela de consulta" alt="Janela de consulta" class="icon ic_b_selboard" /></a><a href="./doc/html/index.html" target="documentation" title="Documentação do phpMyAdmin"><img src="themes/dot.gif" title="Documentação do phpMyAdmin" alt="Documentação do phpMyAdmin" class="icon ic_b_docs" /></a><a href="./url.php?url=http%3A%2F%2Fdev.mysql.com%2Fdoc%2Frefman%2F5.5%2Fen%2Findex.html&amp;token=ed357400b4aa86a24f84238664c34397" target="mysql_doc"><img src="themes/dot.gif" title="Documentação" alt="Documentação" class="icon ic_b_sqlhelp" /></a><a href="#" id="pma_navigation_reload" title="Reload navigation frame"><img src="themes/dot.gif" title="Reload navigation frame" alt="Reload navigation frame" class="icon ic_s_reload" /></a></div><!-- LINKS ENDS --><!-- RECENT START --><div id="recentTableList"><form method="post" action="sql.php"><input type="hidden" name="db" value="" /><input type="hidden" name="table" value="" /><input type="hidden" name="server" value="1" /><input type="hidden" name="token" value="ed357400b4aa86a24f84238664c34397" /><select name="selected_recent_table" id="recentTable"><option value="">(Tabelas Recentes) ...</option><option value="{&quot;db&quot;:&quot;biosconsultori&quot;,&quot;table&quot;:&quot;qrelatservicos&quot;}">`biosconsultori`.`qrelatservicos`</option><option value="{&quot;db&quot;:&quot;biosconsultori3&quot;,&quot;table&quot;:&quot;TB_OPERADOR&quot;}">`biosconsultori3`.`TB_OPERADOR`</option><option value="{&quot;db&quot;:&quot;biosconsultori&quot;,&quot;table&quot;:&quot;tblfunc&quot;}">`biosconsultori`.`tblfunc`</option><option value="{&quot;db&quot;:&quot;biosconsultori3&quot;,&quot;table&quot;:&quot;perfil&quot;}">`biosconsultori3`.`perfil`</option><option value="{&quot;db&quot;:&quot;biosconsultori&quot;,&quot;table&quot;:&quot;tblpostos&quot;}">`biosconsultori`.`tblpostos`</option><option value="{&quot;db&quot;:&quot;biosconsultori3&quot;,&quot;table&quot;:&quot;TB_PROJETO&quot;}">`biosconsultori3`.`TB_PROJETO`</option><option value="{&quot;db&quot;:&quot;biosconsultori3&quot;,&quot;table&quot;:&quot;TB_STATUS_PROJETO&quot;}">`biosconsultori3`.`TB_STATUS_PROJETO`</option><option value="{&quot;db&quot;:&quot;biosconsultori&quot;,&quot;table&quot;:&quot;tblstatusprotproc&quot;}">`biosconsultori`.`tblstatusprotproc`</option><option value="{&quot;db&quot;:&quot;biosconsultori3&quot;,&quot;table&quot;:&quot;TB_STATUS&quot;}">`biosconsultori3`.`TB_STATUS`</option><option value="{&quot;db&quot;:&quot;biosconsultori&quot;,&quot;table&quot;:&quot;tblproc&quot;}">`biosconsultori`.`tblproc`</option></select></form></div><!-- RECENT END --><img src="./themes/pmahomme/img/ajax_clock_small.gif" title="Carregando" alt="Carregando" style="visibility: hidden;" class="throbber" /><div id="pma_navigation_tree" class="list_container highlight"><div class="dbselector pageselector"><form action="navigation.php" method="post"><input type="hidden" name="server" value="1" /><input type="hidden" name="token" value="ed357400b4aa86a24f84238664c34397" /> <select class="pageselector  ajax" name="pos" >                <option selected="selected" style="font-weight: bold" value="0">1</option>
                <option  value="25">2</option>
 </select></form><a class="ajax" title="Seguinte" href="navigation.php?server=1&amp;pos=25&amp;token=ed357400b4aa86a24f84238664c34397" > &gt; </a><a class="ajax" title="Fim" href="navigation.php?server=1&amp;pos=25&amp;token=ed357400b4aa86a24f84238664c34397" >&gt;&gt;</a></div>
<div><ul><li class='first'><div class='block'><i class='first'></i><b></b><a class='expander' href='#'><span class='hide aPath'>cm9vdA==.Ymlvc2NvbnN1bHRvcmk=</span><span class='hide vPath'>cm9vdA==.Ymlvc2NvbnN1bHRvcmk=</span><span class='hide pos'>0</span><img src="themes/dot.gif" title="" alt="" class="icon ic_b_plus" /></a></div><div class='block'><a href='db_operations.php?server=1&amp;db=biosconsultori&amp;token=ed357400b4aa86a24f84238664c34397'><img src="themes/dot.gif" title="" alt="" class="icon ic_s_db" /></a></div><a href='db_structure.php?server=1&amp;db=biosconsultori&amp;token=ed357400b4aa86a24f84238664c34397'>biosconsultori</a></li><li><div class='block'><i></i><b></b><a class='expander' href='#'><span class='hide aPath'>cm9vdA==.Ymlvc2NvbnN1bHRvcmkz</span><span class='hide vPath'>cm9vdA==.Ymlvc2NvbnN1bHRvcmkz</span><span class='hide pos'>0</span><img src="themes/dot.gif" title="" alt="" class="icon ic_b_plus" /></a></div><div class='block'><a href='db_operations.php?server=1&amp;db=biosconsultori3&amp;token=ed357400b4aa86a24f84238664c34397'><img src="themes/dot.gif" title="" alt="" class="icon ic_s_db" /></a></div><a href='db_structure.php?server=1&amp;db=biosconsultori3&amp;token=ed357400b4aa86a24f84238664c34397'>biosconsultori3</a></li><li><div class='block'><i></i><b></b><a class='expander' href='#'><span class='hide aPath'>cm9vdA==.Y2Rjb2w=</span><span class='hide vPath'>cm9vdA==.Y2Rjb2w=</span><span class='hide pos'>0</span><img src="themes/dot.gif" title="" alt="" class="icon ic_b_plus" /></a></div><div class='block'><a href='db_operations.php?server=1&amp;db=cdcol&amp;token=ed357400b4aa86a24f84238664c34397'><img src="themes/dot.gif" title="" alt="" class="icon ic_s_db" /></a></div><a href='db_structure.php?server=1&amp;db=cdcol&amp;token=ed357400b4aa86a24f84238664c34397'>cdcol</a></li><li><div class='block'><i></i><b></b><a class='expander' href='#'><span class='hide aPath'>cm9vdA==.Y2lyb2M=</span><span class='hide vPath'>cm9vdA==.Y2lyb2M=</span><span class='hide pos'>0</span><img src="themes/dot.gif" title="" alt="" class="icon ic_b_plus" /></a></div><div class='block'><a href='db_operations.php?server=1&amp;db=ciroc&amp;token=ed357400b4aa86a24f84238664c34397'><img src="themes/dot.gif" title="" alt="" class="icon ic_s_db" /></a></div><a href='db_structure.php?server=1&amp;db=ciroc&amp;token=ed357400b4aa86a24f84238664c34397'>ciroc</a></li><li><div class='block'><i></i><b></b><a class='expander' href='#'><span class='hide aPath'>cm9vdA==.Y3JlZGVuY2lhbA==</span><span class='hide vPath'>cm9vdA==.Y3JlZGVuY2lhbA==</span><span class='hide pos'>0</span><img src="themes/dot.gif" title="" alt="" class="icon ic_b_plus" /></a></div><div class='block'><a href='db_operations.php?server=1&amp;db=credencial&amp;token=ed357400b4aa86a24f84238664c34397'><img src="themes/dot.gif" title="" alt="" class="icon ic_s_db" /></a></div><a href='db_structure.php?server=1&amp;db=credencial&amp;token=ed357400b4aa86a24f84238664c34397'>credencial</a></li><li><div class='block'><i></i><b></b><a class='expander' href='#'><span class='hide aPath'>cm9vdA==.Y3Jvc3Mtc2FsZQ==</span><span class='hide vPath'>cm9vdA==.Y3Jvc3Mtc2FsZQ==</span><span class='hide pos'>0</span><img src="themes/dot.gif" title="" alt="" class="icon ic_b_plus" /></a></div><div class='block'><a href='db_operations.php?server=1&amp;db=cross-sale&amp;token=ed357400b4aa86a24f84238664c34397'><img src="themes/dot.gif" title="" alt="" class="icon ic_s_db" /></a></div><a href='db_structure.php?server=1&amp;db=cross-sale&amp;token=ed357400b4aa86a24f84238664c34397'>cross-sale</a></li><li><div class='block'><i></i><b></b><a class='expander' href='#'><span class='hide aPath'>cm9vdA==.Y3Jvc3Nfc2FsZXM=</span><span class='hide vPath'>cm9vdA==.Y3Jvc3Nfc2FsZXM=</span><span class='hide pos'>0</span><img src="themes/dot.gif" title="" alt="" class="icon ic_b_plus" /></a></div><div class='block'><a href='db_operations.php?server=1&amp;db=cross_sales&amp;token=ed357400b4aa86a24f84238664c34397'><img src="themes/dot.gif" title="" alt="" class="icon ic_s_db" /></a></div><a href='db_structure.php?server=1&amp;db=cross_sales&amp;token=ed357400b4aa86a24f84238664c34397'>cross_sales</a></li><li><div class='block'><i></i><b></b><a class='expander' href='#'><span class='hide aPath'>cm9vdA==.ZG9jbWFuYWdlcg==</span><span class='hide vPath'>cm9vdA==.ZG9jbWFuYWdlcg==</span><span class='hide pos'>0</span><img src="themes/dot.gif" title="" alt="" class="icon ic_b_plus" /></a></div><div class='block'><a href='db_operations.php?server=1&amp;db=docmanager&amp;token=ed357400b4aa86a24f84238664c34397'><img src="themes/dot.gif" title="" alt="" class="icon ic_s_db" /></a></div><a href='db_structure.php?server=1&amp;db=docmanager&amp;token=ed357400b4aa86a24f84238664c34397'>docmanager</a></li><li><div class='block'><i></i><b></b><a class='expander' href='#'><span class='hide aPath'>cm9vdA==.ZG90eg==</span><span class='hide vPath'>cm9vdA==.ZG90eg==</span><span class='hide pos'>0</span><img src="themes/dot.gif" title="" alt="" class="icon ic_b_plus" /></a></div><div class='block'><a href='db_operations.php?server=1&amp;db=dotz&amp;token=ed357400b4aa86a24f84238664c34397'><img src="themes/dot.gif" title="" alt="" class="icon ic_s_db" /></a></div><a href='db_structure.php?server=1&amp;db=dotz&amp;token=ed357400b4aa86a24f84238664c34397'>dotz</a></li><li><div class='block'><i></i><b></b><a class='expander' href='#'><span class='hide aPath'>cm9vdA==.ZG90ejI=</span><span class='hide vPath'>cm9vdA==.ZG90ejI=</span><span class='hide pos'>0</span><img src="themes/dot.gif" title="" alt="" class="icon ic_b_plus" /></a></div><div class='block'><a href='db_operations.php?server=1&amp;db=dotz2&amp;token=ed357400b4aa86a24f84238664c34397'><img src="themes/dot.gif" title="" alt="" class="icon ic_s_db" /></a></div><a href='db_structure.php?server=1&amp;db=dotz2&amp;token=ed357400b4aa86a24f84238664c34397'>dotz2</a></li><li><div class='block'><i></i><b></b><a class='expander' href='#'><span class='hide aPath'>cm9vdA==.ZXN0cnV0dXJhX29yZ2FuaXphY2lvbmFs</span><span class='hide vPath'>cm9vdA==.ZXN0cnV0dXJhX29yZ2FuaXphY2lvbmFs</span><span class='hide pos'>0</span><img src="themes/dot.gif" title="" alt="" class="icon ic_b_plus" /></a></div><div class='block'><a href='db_operations.php?server=1&amp;db=estrutura_organizacional&amp;token=ed357400b4aa86a24f84238664c34397'><img src="themes/dot.gif" title="" alt="" class="icon ic_s_db" /></a></div><a href='db_structure.php?server=1&amp;db=estrutura_organizacional&amp;token=ed357400b4aa86a24f84238664c34397'>estrutura_organizacional</a></li><li><div class='block'><i></i><b></b><a class='expander' href='#'><span class='hide aPath'>cm9vdA==.ZXh0X3pm</span><span class='hide vPath'>cm9vdA==.ZXh0X3pm</span><span class='hide pos'>0</span><img src="themes/dot.gif" title="" alt="" class="icon ic_b_plus" /></a></div><div class='block'><a href='db_operations.php?server=1&amp;db=ext_zf&amp;token=ed357400b4aa86a24f84238664c34397'><img src="themes/dot.gif" title="" alt="" class="icon ic_s_db" /></a></div><a href='db_structure.php?server=1&amp;db=ext_zf&amp;token=ed357400b4aa86a24f84238664c34397'>ext_zf</a></li><li><div class='block'><i></i><b></b><a class='expander' href='#'><span class='hide aPath'>cm9vdA==.aGFwcHlob3Vy</span><span class='hide vPath'>cm9vdA==.aGFwcHlob3Vy</span><span class='hide pos'>0</span><img src="themes/dot.gif" title="" alt="" class="icon ic_b_plus" /></a></div><div class='block'><a href='db_operations.php?server=1&amp;db=happyhour&amp;token=ed357400b4aa86a24f84238664c34397'><img src="themes/dot.gif" title="" alt="" class="icon ic_s_db" /></a></div><a href='db_structure.php?server=1&amp;db=happyhour&amp;token=ed357400b4aa86a24f84238664c34397'>happyhour</a></li><li><div class='block'><i></i><b></b><a class='expander' href='#'><span class='hide aPath'>cm9vdA==.aW5mb3JtYXRpb25fc2NoZW1h</span><span class='hide vPath'>cm9vdA==.aW5mb3JtYXRpb25fc2NoZW1h</span><span class='hide pos'>0</span><img src="themes/dot.gif" title="" alt="" class="icon ic_b_plus" /></a></div><div class='block'><a href='db_operations.php?server=1&amp;db=information_schema&amp;token=ed357400b4aa86a24f84238664c34397'><img src="themes/dot.gif" title="" alt="" class="icon ic_s_db" /></a></div><a href='db_structure.php?server=1&amp;db=information_schema&amp;token=ed357400b4aa86a24f84238664c34397'>information_schema</a></li><li><div class='block'><i></i><b></b><a class='expander' href='#'><span class='hide aPath'>cm9vdA==.bG9zdHR5</span><span class='hide vPath'>cm9vdA==.bG9zdHR5</span><span class='hide pos'>0</span><img src="themes/dot.gif" title="" alt="" class="icon ic_b_plus" /></a></div><div class='block'><a href='db_operations.php?server=1&amp;db=lostty&amp;token=ed357400b4aa86a24f84238664c34397'><img src="themes/dot.gif" title="" alt="" class="icon ic_s_db" /></a></div><a href='db_structure.php?server=1&amp;db=lostty&amp;token=ed357400b4aa86a24f84238664c34397'>lostty</a></li><li><div class='block'><i></i><b></b><a class='expander' href='#'><span class='hide aPath'>cm9vdA==.bHcxMzQ4NjAwNjU3NTA=</span><span class='hide vPath'>cm9vdA==.bHcxMzQ4NjAwNjU3NTA=</span><span class='hide pos'>0</span><img src="themes/dot.gif" title="" alt="" class="icon ic_b_plus" /></a></div><div class='block'><a href='db_operations.php?server=1&amp;db=lw134860065750&amp;token=ed357400b4aa86a24f84238664c34397'><img src="themes/dot.gif" title="" alt="" class="icon ic_s_db" /></a></div><a href='db_structure.php?server=1&amp;db=lw134860065750&amp;token=ed357400b4aa86a24f84238664c34397'>lw134860065750</a></li><li><div class='block'><i></i><b></b><a class='expander' href='#'><span class='hide aPath'>cm9vdA==.bXlzcWw=</span><span class='hide vPath'>cm9vdA==.bXlzcWw=</span><span class='hide pos'>0</span><img src="themes/dot.gif" title="" alt="" class="icon ic_b_plus" /></a></div><div class='block'><a href='db_operations.php?server=1&amp;db=mysql&amp;token=ed357400b4aa86a24f84238664c34397'><img src="themes/dot.gif" title="" alt="" class="icon ic_s_db" /></a></div><a href='db_structure.php?server=1&amp;db=mysql&amp;token=ed357400b4aa86a24f84238664c34397'>mysql</a></li><li><div class='block'><i></i><b></b><a class='expander' href='#'><span class='hide aPath'>cm9vdA==.b250cmFkZWZ5MTU=</span><span class='hide vPath'>cm9vdA==.b250cmFkZWZ5MTU=</span><span class='hide pos'>0</span><img src="themes/dot.gif" title="" alt="" class="icon ic_b_plus" /></a></div><div class='block'><a href='db_operations.php?server=1&amp;db=ontradefy15&amp;token=ed357400b4aa86a24f84238664c34397'><img src="themes/dot.gif" title="" alt="" class="icon ic_s_db" /></a></div><a href='db_structure.php?server=1&amp;db=ontradefy15&amp;token=ed357400b4aa86a24f84238664c34397'>ontradefy15</a></li><li><div class='block'><i></i><b></b><a class='expander' href='#'><span class='hide aPath'>cm9vdA==.cGVyZm9ybWFuY2Vfc2NoZW1h</span><span class='hide vPath'>cm9vdA==.cGVyZm9ybWFuY2Vfc2NoZW1h</span><span class='hide pos'>0</span><img src="themes/dot.gif" title="" alt="" class="icon ic_b_plus" /></a></div><div class='block'><a href='db_operations.php?server=1&amp;db=performance_schema&amp;token=ed357400b4aa86a24f84238664c34397'><img src="themes/dot.gif" title="" alt="" class="icon ic_s_db" /></a></div><a href='db_structure.php?server=1&amp;db=performance_schema&amp;token=ed357400b4aa86a24f84238664c34397'>performance_schema</a></li><li><div class='block'><i></i><b></b><a class='expander' href='#'><span class='hide aPath'>cm9vdA==.cGhwbXlhZG1pbg==</span><span class='hide vPath'>cm9vdA==.cGhwbXlhZG1pbg==</span><span class='hide pos'>0</span><img src="themes/dot.gif" title="" alt="" class="icon ic_b_plus" /></a></div><div class='block'><a href='db_operations.php?server=1&amp;db=phpmyadmin&amp;token=ed357400b4aa86a24f84238664c34397'><img src="themes/dot.gif" title="" alt="" class="icon ic_s_db" /></a></div><a href='db_structure.php?server=1&amp;db=phpmyadmin&amp;token=ed357400b4aa86a24f84238664c34397'>phpmyadmin</a></li><li><div class='block'><i></i><b></b><a class='expander' href='#'><span class='hide aPath'>cm9vdA==.c2lwYXQ=</span><span class='hide vPath'>cm9vdA==.c2lwYXQ=</span><span class='hide pos'>0</span><img src="themes/dot.gif" title="" alt="" class="icon ic_b_plus" /></a></div><div class='block'><a href='db_operations.php?server=1&amp;db=sipat&amp;token=ed357400b4aa86a24f84238664c34397'><img src="themes/dot.gif" title="" alt="" class="icon ic_s_db" /></a></div><a href='db_structure.php?server=1&amp;db=sipat&amp;token=ed357400b4aa86a24f84238664c34397'>sipat</a></li><li><div class='block'><i></i><b></b><a class='expander' href='#'><span class='hide aPath'>cm9vdA==.dGVtcGU4NzlfY2lyb2M=</span><span class='hide vPath'>cm9vdA==.dGVtcGU4NzlfY2lyb2M=</span><span class='hide pos'>0</span><img src="themes/dot.gif" title="" alt="" class="icon ic_b_plus" /></a></div><div class='block'><a href='db_operations.php?server=1&amp;db=tempe879_ciroc&amp;token=ed357400b4aa86a24f84238664c34397'><img src="themes/dot.gif" title="" alt="" class="icon ic_s_db" /></a></div><a href='db_structure.php?server=1&amp;db=tempe879_ciroc&amp;token=ed357400b4aa86a24f84238664c34397'>tempe879_ciroc</a></li><li><div class='block'><i></i><b></b><a class='expander' href='#'><span class='hide aPath'>cm9vdA==.dGVzdA==</span><span class='hide vPath'>cm9vdA==.dGVzdA==</span><span class='hide pos'>0</span><img src="themes/dot.gif" title="" alt="" class="icon ic_b_plus" /></a></div><div class='block'><a href='db_operations.php?server=1&amp;db=test&amp;token=ed357400b4aa86a24f84238664c34397'><img src="themes/dot.gif" title="" alt="" class="icon ic_s_db" /></a></div><a href='db_structure.php?server=1&amp;db=test&amp;token=ed357400b4aa86a24f84238664c34397'>test</a></li><li><div class='block'><i></i><b></b><a class='expander' href='#'><span class='hide aPath'>cm9vdA==.dG0xMTQ=</span><span class='hide vPath'>cm9vdA==.dG0xMTQ=</span><span class='hide pos'>0</span><img src="themes/dot.gif" title="" alt="" class="icon ic_b_plus" /></a></div><div class='block'><a href='db_operations.php?server=1&amp;db=tm114&amp;token=ed357400b4aa86a24f84238664c34397'><img src="themes/dot.gif" title="" alt="" class="icon ic_s_db" /></a></div><a href='db_structure.php?server=1&amp;db=tm114&amp;token=ed357400b4aa86a24f84238664c34397'>tm114</a></li><li class='last'><div class='block'><i></i><a class='expander' href='#'><span class='hide aPath'>cm9vdA==.dG0xMTY=</span><span class='hide vPath'>cm9vdA==.dG0xMTY=</span><span class='hide pos'>0</span><img src="themes/dot.gif" title="" alt="" class="icon ic_b_plus" /></a></div><div class='block'><a href='db_operations.php?server=1&amp;db=tm116&amp;token=ed357400b4aa86a24f84238664c34397'><img src="themes/dot.gif" title="" alt="" class="icon ic_s_db" /></a></div><a href='db_structure.php?server=1&amp;db=tm116&amp;token=ed357400b4aa86a24f84238664c34397'>tm116</a></li></ul></div></div></div></div><noscript><div class="error"><img src="themes/dot.gif" title="" alt="" class="icon ic_s_error" /> O Javascript tem de estar activo a partir deste ponto</div></noscript><div id='floating_menubar'></div><div id='serverinfo'><img src="themes/dot.gif" title="" alt="" class="icon ic_s_host item" /><a href="index.php?token=ed357400b4aa86a24f84238664c34397" class="item">127.0.0.1</a><span class='separator item'>&nbsp;»</span><img src="themes/dot.gif" title="" alt="" class="icon ic_s_db item" /><a href="db_structure.php?db=biosconsultori&amp;token=ed357400b4aa86a24f84238664c34397" class="item">biosconsultori</a><div class="clearfloat"></div></div><div id="topmenucontainer" class="menucontainer"><ul id="topmenu"  class="resizable-menu"><li><a class="tab" href="db_structure.php?db=biosconsultori&amp;token=ed357400b4aa86a24f84238664c34397" ><img src="themes/dot.gif" title="Estrutura" alt="Estrutura" class="icon ic_b_props" /> Estrutura</a></li><li><a class="tab" href="db_sql.php?db=biosconsultori&amp;token=ed357400b4aa86a24f84238664c34397&amp;db_query_force=1" ><img src="themes/dot.gif" title="SQL" alt="SQL" class="icon ic_b_sql" /> SQL</a></li><li><a class="tab" href="db_search.php?db=biosconsultori&amp;token=ed357400b4aa86a24f84238664c34397" ><img src="themes/dot.gif" title="Pesquisar" alt="Pesquisar" class="icon ic_b_search" /> Pesquisar</a></li><li><a class="tab" href="db_qbe.php?db=biosconsultori&amp;token=ed357400b4aa86a24f84238664c34397" ><img src="themes/dot.gif" title="Pesquisa por formulário" alt="Pesquisa por formulário" class="icon ic_s_db" /> Pesquisa por formulário</a></li><li><a class="tab" href="db_export.php?db=biosconsultori&amp;token=ed357400b4aa86a24f84238664c34397" ><img src="themes/dot.gif" title="Exportar" alt="Exportar" class="icon ic_b_export" /> Exportar</a></li><li><a class="tab" href="db_import.php?db=biosconsultori&amp;token=ed357400b4aa86a24f84238664c34397" ><img src="themes/dot.gif" title="Importar" alt="Importar" class="icon ic_b_import" /> Importar</a></li><li><a class="tab" href="db_operations.php?db=biosconsultori&amp;token=ed357400b4aa86a24f84238664c34397" ><img src="themes/dot.gif" title="Operações" alt="Operações" class="icon ic_b_tblops" /> Operações</a></li><li><a class="tab" href="server_privileges.php?db=biosconsultori&amp;token=ed357400b4aa86a24f84238664c34397&amp;checkprivs=biosconsultori&amp;viewing_mode=db" ><img src="themes/dot.gif" title="Privilégios" alt="Privilégios" class="icon ic_s_rights" /> Privilégios</a></li><li><a class="tab" href="db_routines.php?db=biosconsultori&amp;token=ed357400b4aa86a24f84238664c34397" ><img src="themes/dot.gif" title="Rotinas" alt="Rotinas" class="icon ic_b_routines" /> Rotinas</a></li><li><a class="tab" href="db_events.php?db=biosconsultori&amp;token=ed357400b4aa86a24f84238664c34397" ><img src="themes/dot.gif" title="Eventos" alt="Eventos" class="icon ic_b_events" /> Eventos</a></li><li><a class="tab" href="db_triggers.php?db=biosconsultori&amp;token=ed357400b4aa86a24f84238664c34397" ><img src="themes/dot.gif" title="Acionadores" alt="Acionadores" class="icon ic_b_triggers" /> Acionadores</a></li><li><a class="tab" href="db_tracking.php?db=biosconsultori&amp;token=ed357400b4aa86a24f84238664c34397" ><img src="themes/dot.gif" title="Rastreando" alt="Rastreando" class="icon ic_eye" /> Rastreando</a></li><li><a class="tab" href="pmd_general.php?db=biosconsultori&amp;token=ed357400b4aa86a24f84238664c34397" ><img src="themes/dot.gif" title="Desenhador" alt="Desenhador" class="icon ic_b_relations" /> Desenhador</a></li></ul>
<div class="clearfloat"></div></div>
<a id="goto_pagetop" href="#" title="Clique na barra para deslizar para o topo da página"><img src="themes/dot.gif" title="" alt="" class="icon ic_s_top" /></a><div id="page_content"><a class="hide" id="update_recent_tables" href="index.php?ajax_request=1&amp;recent_table=1&amp;token=ed357400b4aa86a24f84238664c34397"></a>-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 23-Fev-2016 às 23:02
-- Versão do servidor: 5.5.32
-- versão do PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `biosconsultori`
--
CREATE DATABASE IF NOT EXISTS `biosconsultori` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `biosconsultori`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `acesso_uggroups`
--

CREATE TABLE IF NOT EXISTS `acesso_uggroups` (
  `GroupID` int(11) NOT NULL AUTO_INCREMENT,
  `Label` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`GroupID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `acesso_uggroups`
--

INSERT INTO `acesso_uggroups` (`GroupID`, `Label`) VALUES
(1, 'Operadores'),
(2, 'Chefão'),
(3, 'Gerente'),
(4, 'Uploader boy'),
(5, 'Cliente AAF'),
(6, 'GQ - Gerência Qualidade'),
(7, 'GT  Gerência Técnica'),
(8, 'GC - Gerência Comercial'),
(9, 'TecCampo'),
(10, 'TecCampo'),
(11, 'AAdm');

-- --------------------------------------------------------

--
-- Estrutura da tabela `acesso_ugmembers`
--

CREATE TABLE IF NOT EXISTS `acesso_ugmembers` (
  `UserName` varchar(50) DEFAULT NULL,
  `GroupID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acesso_ugmembers`
--

INSERT INTO `acesso_ugmembers` (`UserName`, `GroupID`) VALUES
('Fernanda', 1),
('poli', 1),
('admin', -1),
('admin', 1),
('deborah', 1),
('Paulo', -1),
(' Marcelo', 1),
('karina', 1),
('karina', 4),
('Rubinger', 1),
('william', 1),
('capitao', 5),
('Cooperauto', 5),
('Marcia Shima', 1),
('alice', 1),
('Carolina Aun', 1),
('marcela.chin', 4),
('lilia', 1),
('ISABELA', 1),
('Paula Quissa', 1),
('ENILDA', 3),
('GABI2012', 3),
('NADIA', 1),
('DEBORA', 1),
('MMartns', 1),
('FROTA 4x4', 4),
('8080', 1),
('ADRIANE', 1),
('Adrienne', 1),
('AEREO', 1),
('ANDRE', 8),
('ANDRE1', 3),
('ANDRE_w', 1),
('Anna', 1),
('aron', 1),
('BERNARDO', 1),
('bianca', 1),
('CARINE', 1),
('Carol', 3),
('Carol', 4),
('Claudia', 1),
('daniel', 1),
('EDNA', 1),
('erika', 1),
('erika', 3),
('fabiana', 1),
('financeiro', 1),
('FROTA', 4),
('GABRIELA', 1),
('Giselle', 3),
('hotel', 4),
('IANDRA', 1),
('JARDIM', 1),
('JOAO LOPES', 3),
('LAIS', 1),
('LIDER', 1),
('LILLYAN', -1),
('LILLYAN', 2),
('LILLYAN', 3),
('LUCIA', 1),
('lujan', 3),
('MAGNO', 1),
('MAISA', 1),
('marcela', 2),
('MARCIA', 1),
('MARIANA', 1),
('MARIANE', 1),
('MMARTINS', 1),
('NELLY', 1),
('NIL', 3),
('PAULA', 1),
('PAULO', 2),
('pedrolacerda', 1),
('Rafaela', 1),
('richardson', 1),
('Sandrageo', 1),
('SINCERO', 1),
('THAYS', 1),
('TIAGO', 1),
('VANESSA', 1),
('VANESSA', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `acesso_ugrights`
--

CREATE TABLE IF NOT EXISTS `acesso_ugrights` (
  `TableName` varchar(50) DEFAULT NULL,
  `GroupID` int(11) DEFAULT NULL,
  `AccessMask` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acesso_ugrights`
--

INSERT INTO `acesso_ugrights` (`TableName`, `GroupID`, `AccessMask`) VALUES
('admin_rights', -1, 'ADESPIM'),
('admin_members', -1, 'ADESPIM'),
('admin_users', -1, 'ADESPIM'),
('q_relserv Report', -1, 'AEDSPIM'),
('q_relserv Report', 2, 'AEDSPIM'),
('q_relserv Report', 3, 'AEDSPIM'),
('q_relserv Report', 1, 'AEDSPIM'),
('q_relserv', -1, 'AEDSPIM'),
('q_relserv', 2, 'AEDSPIM'),
('q_relserv', 3, 'AEDSPIM'),
('Carga Mensal por Processo', -1, 'AEDSPIM'),
('Carga Mensal por Processo', 2, 'AEDSPIM'),
('Carga Mensal por Processo', 4, 'AS'),
('Carga Mensal por Operador', -1, 'AEDSPIM'),
('Carga Mensal por Operador', 2, 'AEDSPIM'),
('Carga Mensal por Operador', 4, 'AS'),
('Carga por projeto', -1, 'AEDSPIM'),
('Gráfico Carga', -1, 'AEDSPIM'),
('tblunidade', -1, 'AEDSPIM'),
('tblunidade', 11, 'SPI'),
('tblunidade', 2, 'AEDSPIM'),
('tblunidade', 8, 'AEDSPI'),
('tblunidade', 3, 'M'),
('tblunidade', 6, 'AEDSPI'),
('tblunidade', 7, 'AEDSPI'),
('tblunidade', 10, 'SPI'),
('tbltipoproc', -1, 'AEDSPIM'),
('tbltipoproc', 11, 'SPI'),
('tbltipoproc', 2, 'AEDSPIM'),
('tbltipoproc', 8, 'AEDSPI'),
('tbltipoproc', 3, 'M'),
('tbltipoproc', 6, 'AEDSPI'),
('tbltipoproc', 7, 'AEDSPI'),
('tbltipoproc', 10, 'SPI'),
('tblstatusprotproc', -1, 'AEDSPIM'),
('tblstatusprotproc', 11, 'SPI'),
('tblstatusprotproc', 2, 'AEDSPIM'),
('tblstatusprotproc', 8, 'AEDSPI'),
('tblstatusprotproc', 3, 'M'),
('tblstatusprotproc', 6, 'AEDSPI'),
('tblstatusprotproc', 7, 'AEDSPI'),
('tblstatusprotproc', 10, 'SPI'),
('tblrel_servicos', -1, 'EDSPIM'),
('tblrel_servicos', 11, 'ASPI'),
('tblrel_servicos', 2, 'AEDSPIM'),
('tblrel_servicos', 8, 'AEDSPI'),
('tblrel_servicos', 3, 'AEDSPIM'),
('tblrel_servicos', 6, 'AEDSPI'),
('tblrel_servicos', 7, 'AEDSPI'),
('tblrel_servicos', 1, 'AS'),
('tblrel_servicos', 10, 'ASPI'),
('tblrel_servicos', 4, 'AS'),
('tblproc', -1, 'AEDSPIM'),
('tblproc', 11, 'SPI'),
('tblproc', 2, 'AEDSPIM'),
('tblproc', 5, 'SPI'),
('tblproc', 8, 'AEDSPI'),
('tblproc', 3, 'AEDSPIM'),
('tblproc', 6, 'AEDSPI'),
('tblproc', 7, 'AEDSPI'),
('tblproc', 1, 'ES'),
('tblproc', 10, 'SPI'),
('tblproc', 4, 'S'),
('tblpostos', -1, 'AEDSPIM'),
('tblpostos', 11, 'SPI'),
('tblpostos', 2, 'AEDSPIM'),
('tblpostos', 8, 'AEDSPI'),
('tblpostos', 3, 'AEDSPIM'),
('tblpostos', 6, 'AEDSPI'),
('tblpostos', 7, 'AEDSPI'),
('tblpostos', 1, 'S'),
('tblpostos', 10, 'SPI'),
('tblpostos', 4, 'AEDSPIM'),
('tbloperproc', -1, 'AEDSPIM'),
('tbloperproc', 11, 'SPI'),
('tbloperproc', 2, 'AEDSPIM'),
('tbloperproc', 8, 'AEDSPI'),
('tbloperproc', 3, 'AEDSM'),
('tbloperproc', 6, 'AEDSPI'),
('tbloperproc', 7, 'AEDSPI'),
('tbloperproc', 1, 'ES'),
('tbloperproc', 10, 'SPI'),
('tbloperproc', 4, 'AS'),
('tblfunc', -1, 'AEDSPIM'),
('tblfunc', 11, 'SPI'),
('tblfunc', 2, 'AEDSPIM'),
('tblfunc', 8, 'AEDSPI'),
('tblfunc', 3, 'AEDSM'),
('tblfunc', 6, 'AEDSPI'),
('tblfunc', 7, 'AEDSPI'),
('tblfunc', 1, 'ES'),
('tblfunc', 10, 'SPI'),
('tblfunc', 4, 'AS'),
('tbldocs', -1, 'AEDSPIM'),
('tbldocs', 11, 'ASPI'),
('tbldocs', 2, 'AEDSPIM'),
('tbldocs', 5, 'SPI'),
('tbldocs', 8, 'AEDSPI'),
('tbldocs', 3, 'AEDSM'),
('tbldocs', 6, 'AEDSPI'),
('tbldocs', 7, 'ASPI'),
('tbldocs', 1, 'AESPI'),
('tbldocs', 10, 'ASPI'),
('tbldocs', 4, 'AES'),
('tbldescdocs', -1, 'AED'),
('tbldescdocs', 2, 'AEDSPIM'),
('tbldescdocs', 8, 'AE'),
('tbldescdocs', 6, 'AE'),
('tbldescdocs', 7, 'AE'),
('tbldescdocs', 4, 'AE'),
('tblcontrat', -1, 'M'),
('tblcontrat', 11, 'SPI'),
('tblcontrat', 2, 'AEDSPIM'),
('tblcontrat', 8, 'AEDSPI'),
('tblcontrat', 3, 'M'),
('tblcontrat', 6, 'AEDSPI'),
('tblcontrat', 7, 'AEDSPI'),
('tblcontrat', 10, 'SPI'),
('tblcontrat', 4, 'AS'),
('tblcontatos', -1, 'AEDSPIM'),
('tblcontatos', 11, 'SPI'),
('tblcontatos', 2, 'AEDSPIM'),
('tblcontatos', 8, 'AEDSPI'),
('tblcontatos', 3, 'AEDSM'),
('tblcontatos', 6, 'AEDSPI'),
('tblcontatos', 7, 'AEDSPI'),
('tblcontatos', 1, 'AESP'),
('tblcontatos', 10, 'SPI'),
('tblcontatos', 4, 'AEDS'),
('tblclassific', -1, 'M'),
('tblclassific', 11, 'SPI'),
('tblclassific', 2, 'AEDSPIM'),
('tblclassific', 8, 'AEDSPI'),
('tblclassific', 3, 'M'),
('tblclassific', 6, 'AEDSPI'),
('tblclassific', 7, 'AEDSPI'),
('tblclassific', 10, 'SPI'),
('tblclassific', 4, 'AS'),
('tblband', -1, 'M'),
('tblband', 11, 'SPI'),
('tblband', 2, 'AEDSPIM'),
('tblband', 8, 'AEDSPI'),
('tblband', 3, 'M'),
('tblband', 6, 'AEDSPI'),
('tblband', 7, 'AEDSPI'),
('tblband', 10, 'SPI'),
('tblband', 4, 'AS'),
('tblact', -1, 'AEDSPIM'),
('tblact', 11, 'SPI'),
('tblact', 2, 'AEDSPIM'),
('tblact', 8, 'AEDSPI'),
('tblact', 3, 'AEDSPIM'),
('tblact', 6, 'AEDSPI'),
('tblact', 7, 'AEDSPI'),
('tblact', 1, 'AESP'),
('tblact', 10, 'SPI'),
('tblact', 4, 'AS'),
('qrelatservicos', 11, 'SPI'),
('qrelatservicos', 2, 'AEDSPIM'),
('qrelatservicos', 8, 'AEDSPI'),
('qrelatservicos', 3, 'AEDSPIM'),
('qrelatservicos', 6, 'AEDSPI'),
('qrelatservicos', 7, 'AEDSPI'),
('qrelatservicos', 10, 'SPI'),
('Todos os Projetos', -1, 'AEDSPIM'),
('Todos os Projetos', 11, 'SPI'),
('Todos os Projetos', 2, 'AEDSPIM'),
('Todos os Projetos', 8, 'AEDSPI'),
('Todos os Projetos', 3, 'M'),
('Todos os Projetos', 6, 'AEDSPI'),
('Todos os Projetos', 7, 'AEDSPI'),
('Todos os Projetos', 10, 'SPI'),
('Todos os Projetos', 4, 'AEDSP'),
('Operadores Adimin', -1, 'AEDSPIM'),
('Operadores Adimin', 11, 'SPI'),
('Operadores Adimin', 2, 'AEDSPIM'),
('Operadores Adimin', 5, 'E'),
('Operadores Adimin', 8, 'AEDSPI'),
('Operadores Adimin', 3, 'M'),
('Operadores Adimin', 6, 'AEDSPI'),
('Operadores Adimin', 7, 'AEDSPI'),
('Operadores Adimin', 1, 'S'),
('Operadores Adimin', 10, 'SPI'),
('Operadores Adimin', 4, 'AS'),
('Meus PAs N Concluídos', -1, 'M'),
('Meus PAs N Concluídos', 11, 'SPI'),
('Meus PAs N Concluídos', 2, 'AEDSPIM'),
('Meus PAs N Concluídos', 8, 'AEDSPI'),
('Meus PAs N Concluídos', 3, 'AEDSPIM'),
('Meus PAs N Concluídos', 6, 'AEDSPI'),
('Meus PAs N Concluídos', 7, 'AEDSPI'),
('Meus PAs N Concluídos', 1, 'AESPI'),
('Meus PAs N Concluídos', 10, 'SPI'),
('Meus PAs N Concluídos', 4, 'AS'),
('Meus PAs', -1, 'AEDSM'),
('Meus PAs', 11, 'SPI'),
('Meus PAs', 2, 'AEDSPIM'),
('Meus PAs', 8, 'AEDSPI'),
('Meus PAs', 3, 'AEDSPIM'),
('Meus PAs', 6, 'AEDSPI'),
('Meus PAs', 7, 'AEDSPI'),
('Meus PAs', 1, 'S'),
('Meus PAs', 10, 'SPI'),
('Meus PAs', 4, 'AS'),
('Meus Contatos', -1, 'M'),
('Meus Contatos', 11, 'SPI'),
('Meus Contatos', 2, 'AEDSPIM'),
('Meus Contatos', 8, 'AEDSPI'),
('Meus Contatos', 3, 'M'),
('Meus Contatos', 6, 'AEDSPI'),
('Meus Contatos', 7, 'AEDSPI'),
('Meus Contatos', 10, 'SPI'),
('Meus Contatos', 4, 'AS'),
('Contatos', -1, 'AEDSPIM'),
('Contatos', 11, 'SPI'),
('Contatos', 2, 'AEDSPIM'),
('Contatos', 8, 'AEDSPI'),
('Contatos', 3, 'AEDSPIM'),
('Contatos', 6, 'AEDSPI'),
('Contatos', 7, 'AEDSPI'),
('Contatos', 1, 'AESPI'),
('Contatos', 10, 'SPI'),
('Contatos', 4, 'AS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bios_app1_uggroups`
--

CREATE TABLE IF NOT EXISTS `bios_app1_uggroups` (
  `GroupID` int(11) NOT NULL AUTO_INCREMENT,
  `Label` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`GroupID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bios_app1_ugmembers`
--

CREATE TABLE IF NOT EXISTS `bios_app1_ugmembers` (
  `UserName` varchar(50) DEFAULT NULL,
  `GroupID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bios_app1_ugmembers`
--

INSERT INTO `bios_app1_ugmembers` (`UserName`, `GroupID`) VALUES
('74', -1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bios_app1_ugrights`
--

CREATE TABLE IF NOT EXISTS `bios_app1_ugrights` (
  `TableName` varchar(50) DEFAULT NULL,
  `GroupID` int(11) DEFAULT NULL,
  `AccessMask` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bios_app1_ugrights`
--

INSERT INTO `bios_app1_ugrights` (`TableName`, `GroupID`, `AccessMask`) VALUES
('tblpostos', -1, 'ADESPIM'),
('tblcontatos', -1, 'ADESPIM'),
('tblband', -1, 'ADESPIM'),
('tblclassific', -1, 'ADESPIM'),
('tblproc', -1, 'ADESPIM'),
('tbltipoproc', -1, 'ADESPIM'),
('tblunidade', -1, 'ADESPIM'),
('tblfunc', -1, 'ADESPIM'),
('tblcontrat', -1, 'ADESPIM'),
('tblstatusprotproc', -1, 'ADESPIM'),
('tbldocs', -1, 'ADESPIM'),
('tbldescdocs', -1, 'ADESPIM'),
('tbloperproc', -1, 'ADESPIM'),
('admin_members', -1, 'ADESPIM'),
('admin_users', -1, 'ADESPIM');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bios_app_uggroups`
--

CREATE TABLE IF NOT EXISTS `bios_app_uggroups` (
  `GroupID` int(11) NOT NULL AUTO_INCREMENT,
  `Label` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`GroupID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bios_app_ugmembers`
--

CREATE TABLE IF NOT EXISTS `bios_app_ugmembers` (
  `UserName` varchar(50) DEFAULT NULL,
  `GroupID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bios_app_ugmembers`
--

INSERT INTO `bios_app_ugmembers` (`UserName`, `GroupID`) VALUES
('74', -1),
('admin', -1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bios_app_ugrights`
--

CREATE TABLE IF NOT EXISTS `bios_app_ugrights` (
  `TableName` varchar(50) DEFAULT NULL,
  `GroupID` int(11) DEFAULT NULL,
  `AccessMask` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bios_app_ugrights`
--

INSERT INTO `bios_app_ugrights` (`TableName`, `GroupID`, `AccessMask`) VALUES
('tblpostos', -1, 'ADESPIM'),
('tblcontatos', -1, 'ADESPIM'),
('tblband', -1, 'ADESPIM'),
('tblclassific', -1, 'ADESPIM'),
('tblproc', -1, 'ADESPIM'),
('tbltipoproc', -1, 'ADESPIM'),
('tblunidade', -1, 'ADESPIM'),
('tblfunc', -1, 'ADESPIM'),
('tblcontrat', -1, 'ADESPIM'),
('tblstatusprotproc', -1, 'ADESPIM'),
('tbldocs', -1, 'ADESPIM'),
('tbldescdocs', -1, 'ADESPIM'),
('tbloperproc', -1, 'ADESPIM'),
('admin_members', -1, 'ADESPIM'),
('admin_users', -1, 'ADESPIM');

<!-- PMA-SQL-ERROR -->
    <div class="error"><h1>Erro</h1>
<p><strong>Comando SQL:</strong>
<a href="tbl_sql.php?sql_query=SHOW+TABLE+STATUS+FROM+%60biosconsultori%60+LIKE+%27qrelatservicos%27&amp;show_query=1&amp;db=biosconsultori&amp;table=qrelatservicos&amp;token=ed357400b4aa86a24f84238664c34397"><span class="nowrap"><img src="themes/dot.gif" title="Edita" alt="Edita" class="icon ic_b_edit" /> Edita</span></a>    </p>
<p>
<span class="syntax"><span class="inner_sql"><a href="./url.php?url=http%3A%2F%2Fdev.mysql.com%2Fdoc%2Frefman%2F5.5%2Fen%2Fshow.html&amp;token=ed357400b4aa86a24f84238664c34397" target="mysql_doc"><span class="syntax_alpha syntax_alpha_reservedWord">SHOW</span></a>  <span class="syntax_alpha syntax_alpha_reservedWord">TABLE</span>  <span class="syntax_alpha syntax_alpha_reservedWord">STATUS</span>  <span class="syntax_alpha syntax_alpha_reservedWord">FROM</span>  <span class="syntax_quote syntax_quote_backtick">`biosconsultori`</span>  <a href="./url.php?url=http%3A%2F%2Fdev.mysql.com%2Fdoc%2Frefman%2F5.5%2Fen%2Fstring-comparison-functions.html%23operator_like&amp;token=ed357400b4aa86a24f84238664c34397" target="mysql_doc"><span class="syntax_alpha syntax_alpha_reservedWord">LIKE</span></a>  <span class="syntax_quote syntax_quote_single">'qrelatservicos'</span></span></span>
</p>
<p>
    <strong>Mensagens do MySQL : </strong><a href="./url.php?url=http%3A%2F%2Fdev.mysql.com%2Fdoc%2Frefman%2F5.5%2Fen%2Ferror-messages-server.html&amp;token=ed357400b4aa86a24f84238664c34397" target="mysql_doc"><img src="themes/dot.gif" title="Documentação" alt="Documentação" class="icon ic_b_help" /></a>
</p>
<code>
#1143 - SELECT command denied to user ''@'%' for column 'Pr_CodProc' in table 'tblproc'
</code><br />
</div></div><script type="text/javascript">// <![CDATA[
AJAX.scriptHandler;
$(function() {});
// ]]></script></body></html>