{"filter":false,"title":"Projeto.php","tooltip":"/application/controllers/Projeto.php","undoManager":{"mark":51,"position":51,"stack":[[{"start":{"row":35,"column":5},"end":{"row":36,"column":0},"action":"insert","lines":["",""],"id":729},{"start":{"row":36,"column":0},"end":{"row":36,"column":3},"action":"insert","lines":["\t\t\t"]}],[{"start":{"row":36,"column":3},"end":{"row":36,"column":4},"action":"insert","lines":["$"],"id":730}],[{"start":{"row":36,"column":4},"end":{"row":36,"column":5},"action":"insert","lines":["i"],"id":731}],[{"start":{"row":36,"column":5},"end":{"row":36,"column":6},"action":"insert","lines":["m"],"id":732}],[{"start":{"row":36,"column":6},"end":{"row":36,"column":7},"action":"insert","lines":["a"],"id":733}],[{"start":{"row":36,"column":7},"end":{"row":36,"column":8},"action":"insert","lines":["g"],"id":734}],[{"start":{"row":36,"column":8},"end":{"row":36,"column":9},"action":"insert","lines":["e"],"id":735}],[{"start":{"row":36,"column":9},"end":{"row":36,"column":10},"action":"insert","lines":["m"],"id":736}],[{"start":{"row":36,"column":10},"end":{"row":36,"column":11},"action":"insert","lines":["="],"id":737}],[{"start":{"row":36,"column":11},"end":{"row":36,"column":13},"action":"insert","lines":["\"\""],"id":738}],[{"start":{"row":36,"column":12},"end":{"row":36,"column":13},"action":"insert","lines":["N"],"id":739}],[{"start":{"row":36,"column":13},"end":{"row":36,"column":14},"action":"insert","lines":["U"],"id":740}],[{"start":{"row":36,"column":13},"end":{"row":36,"column":14},"action":"remove","lines":["U"],"id":741}],[{"start":{"row":36,"column":12},"end":{"row":36,"column":13},"action":"remove","lines":["N"],"id":742}],[{"start":{"row":36,"column":12},"end":{"row":36,"column":13},"action":"insert","lines":["I"],"id":743}],[{"start":{"row":36,"column":13},"end":{"row":36,"column":14},"action":"insert","lines":["M"],"id":744}],[{"start":{"row":36,"column":14},"end":{"row":36,"column":15},"action":"insert","lines":["A"],"id":745}],[{"start":{"row":36,"column":15},"end":{"row":36,"column":16},"action":"insert","lines":["G"],"id":746}],[{"start":{"row":36,"column":16},"end":{"row":36,"column":17},"action":"insert","lines":["E"],"id":747}],[{"start":{"row":36,"column":17},"end":{"row":36,"column":18},"action":"insert","lines":["M"],"id":748}],[{"start":{"row":36,"column":19},"end":{"row":36,"column":20},"action":"insert","lines":[";"],"id":749}],[{"start":{"row":36,"column":2},"end":{"row":36,"column":20},"action":"remove","lines":["\t$imagem=\"IMAGEM\";"],"id":750}],[{"start":{"row":36,"column":2},"end":{"row":37,"column":0},"action":"remove","lines":["",""],"id":751}],[{"start":{"row":35,"column":5},"end":{"row":36,"column":0},"action":"insert","lines":["",""],"id":752},{"start":{"row":36,"column":0},"end":{"row":36,"column":3},"action":"insert","lines":["\t\t\t"]}],[{"start":{"row":36,"column":3},"end":{"row":37,"column":0},"action":"insert","lines":["",""],"id":753},{"start":{"row":37,"column":0},"end":{"row":37,"column":3},"action":"insert","lines":["\t\t\t"]}],[{"start":{"row":37,"column":3},"end":{"row":38,"column":0},"action":"insert","lines":["",""],"id":754},{"start":{"row":38,"column":0},"end":{"row":38,"column":3},"action":"insert","lines":["\t\t\t"]}],[{"start":{"row":38,"column":3},"end":{"row":39,"column":0},"action":"insert","lines":["",""],"id":755},{"start":{"row":39,"column":0},"end":{"row":39,"column":3},"action":"insert","lines":["\t\t\t"]}],[{"start":{"row":39,"column":3},"end":{"row":40,"column":0},"action":"insert","lines":["",""],"id":756},{"start":{"row":40,"column":0},"end":{"row":40,"column":3},"action":"insert","lines":["\t\t\t"]}],[{"start":{"row":37,"column":3},"end":{"row":55,"column":2},"action":"insert","lines":["if($imagem != NULL) { ","\t$nomeFinal = time().'.jpg';","\tif (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {","\t\t$tamanhoImg = filesize($nomeFinal); ","","\t\t$mysqlImg = addslashes(fread(fopen($nomeFinal, \"r\"), $tamanhoImg)); ","","\t\tmysql_connect($host,$username,$password) or die(\"Impossível Conectar\"); ","","\t\t@mysql_select_db($db) or die(\"Impossível Conectar\"); ","","\t\t","\t\tmysql_query(\"INSERT INTO projeto (imagem) VALUES ('$mysqlImg')\") or die(\"O sistema não foi capaz de executar a query\"); ","","\t\tunlink($nomeFinal);","\t\t","\t\theader(\"location:exibir.php\");","\t}","} "],"id":757}],[{"start":{"row":38,"column":0},"end":{"row":38,"column":1},"action":"insert","lines":["\t"],"id":758},{"start":{"row":39,"column":0},"end":{"row":39,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":40,"column":0},"end":{"row":40,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":41,"column":0},"end":{"row":41,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":42,"column":0},"end":{"row":42,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":43,"column":0},"end":{"row":43,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":44,"column":0},"end":{"row":44,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":45,"column":0},"end":{"row":45,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":46,"column":0},"end":{"row":46,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":47,"column":0},"end":{"row":47,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":48,"column":0},"end":{"row":48,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":49,"column":0},"end":{"row":49,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":50,"column":0},"end":{"row":50,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":51,"column":0},"end":{"row":51,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":52,"column":0},"end":{"row":52,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":53,"column":0},"end":{"row":53,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":54,"column":0},"end":{"row":54,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":55,"column":0},"end":{"row":55,"column":1},"action":"insert","lines":["\t"]}],[{"start":{"row":38,"column":0},"end":{"row":38,"column":1},"action":"insert","lines":["\t"],"id":759},{"start":{"row":39,"column":0},"end":{"row":39,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":40,"column":0},"end":{"row":40,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":41,"column":0},"end":{"row":41,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":42,"column":0},"end":{"row":42,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":43,"column":0},"end":{"row":43,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":44,"column":0},"end":{"row":44,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":45,"column":0},"end":{"row":45,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":46,"column":0},"end":{"row":46,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":47,"column":0},"end":{"row":47,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":48,"column":0},"end":{"row":48,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":49,"column":0},"end":{"row":49,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":50,"column":0},"end":{"row":50,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":51,"column":0},"end":{"row":51,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":52,"column":0},"end":{"row":52,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":53,"column":0},"end":{"row":53,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":54,"column":0},"end":{"row":54,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":55,"column":0},"end":{"row":55,"column":1},"action":"insert","lines":["\t"]}],[{"start":{"row":38,"column":0},"end":{"row":38,"column":1},"action":"insert","lines":["\t"],"id":760},{"start":{"row":39,"column":0},"end":{"row":39,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":40,"column":0},"end":{"row":40,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":41,"column":0},"end":{"row":41,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":42,"column":0},"end":{"row":42,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":43,"column":0},"end":{"row":43,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":44,"column":0},"end":{"row":44,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":45,"column":0},"end":{"row":45,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":46,"column":0},"end":{"row":46,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":47,"column":0},"end":{"row":47,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":48,"column":0},"end":{"row":48,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":49,"column":0},"end":{"row":49,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":50,"column":0},"end":{"row":50,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":51,"column":0},"end":{"row":51,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":52,"column":0},"end":{"row":52,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":53,"column":0},"end":{"row":53,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":54,"column":0},"end":{"row":54,"column":1},"action":"insert","lines":["\t"]},{"start":{"row":55,"column":0},"end":{"row":55,"column":1},"action":"insert","lines":["\t"]}],[{"start":{"row":41,"column":0},"end":{"row":41,"column":3},"action":"remove","lines":["\t\t\t"],"id":761}],[{"start":{"row":40,"column":41},"end":{"row":41,"column":0},"action":"remove","lines":["",""],"id":762}],[{"start":{"row":43,"column":4},"end":{"row":46,"column":3},"action":"remove","lines":["\tmysql_connect($host,$username,$password) or die(\"Impossível Conectar\"); ","\t\t\t","\t\t\t\t\t@mysql_select_db($db) or die(\"Impossível Conectar\"); ","\t\t\t"],"id":763}],[{"start":{"row":44,"column":4},"end":{"row":44,"column":5},"action":"remove","lines":["\t"],"id":764}],[{"start":{"row":44,"column":3},"end":{"row":44,"column":4},"action":"remove","lines":["\t"],"id":765}],[{"start":{"row":44,"column":2},"end":{"row":44,"column":3},"action":"remove","lines":["\t"],"id":766}],[{"start":{"row":44,"column":1},"end":{"row":44,"column":2},"action":"remove","lines":["\t"],"id":767}],[{"start":{"row":44,"column":0},"end":{"row":44,"column":1},"action":"remove","lines":["\t"],"id":768}],[{"start":{"row":43,"column":4},"end":{"row":44,"column":0},"action":"remove","lines":["",""],"id":769}],[{"start":{"row":29,"column":2},"end":{"row":33,"column":71},"action":"remove","lines":["\tif($imagem != NULL) { ","\t\t\t\t$nomeFinal = time().'.jpg';","\t\t\t\tif (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {","\t\t\t\t\t$tamanhoImg = filesize($nomeFinal); ","\t\t\t\t\t$imagem = addslashes(fread(fopen($nomeFinal, \"r\"), $tamanhoImg)); "],"id":770},{"start":{"row":29,"column":2},"end":{"row":34,"column":3},"action":"insert","lines":["\tif($imagem != NULL) { ","\t\t\t\t$nomeFinal = time().'.jpg';","\t\t\t\tif (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {","\t\t\t\t\t$tamanhoImg = filesize($nomeFinal); ","\t\t\t\t\t$mysqlImg = addslashes(fread(fopen($nomeFinal, \"r\"), $tamanhoImg)); ","\t\t\t"]}],[{"start":{"row":38,"column":2},"end":{"row":50,"column":5},"action":"remove","lines":["\tif($imagem != NULL) { ","\t\t\t\t$nomeFinal = time().'.jpg';","\t\t\t\tif (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {","\t\t\t\t\t$tamanhoImg = filesize($nomeFinal); ","\t\t\t\t\t$mysqlImg = addslashes(fread(fopen($nomeFinal, \"r\"), $tamanhoImg)); ","\t\t\t","\t\t\t\t","\t\t\t\t\tmysql_query(\"INSERT INTO projeto (imagem) VALUES ('$mysqlImg')\") or die(\"O sistema não foi capaz de executar a query\"); ","\t\t\t","\t\t\t\t\tunlink($nomeFinal);","\t\t\t\t\t","\t\t\t\t\theader(\"location:exibir.php\");","\t\t\t\t}"],"id":771}],[{"start":{"row":38,"column":2},"end":{"row":40,"column":3},"action":"remove","lines":["","\t\t\t} ","\t\t\t"],"id":772}],[{"start":{"row":39,"column":0},"end":{"row":41,"column":2},"action":"remove","lines":["\t\t\t","\t\t\t","\t\t"],"id":773}],[{"start":{"row":38,"column":2},"end":{"row":39,"column":0},"action":"remove","lines":["",""],"id":774}],[{"start":{"row":43,"column":96},"end":{"row":43,"column":103},"action":"remove","lines":["$imagem"],"id":775},{"start":{"row":43,"column":96},"end":{"row":43,"column":105},"action":"insert","lines":["$mysqlImg"]}],[{"start":{"row":34,"column":0},"end":{"row":34,"column":3},"action":"remove","lines":["\t\t\t"],"id":776}],[{"start":{"row":33,"column":73},"end":{"row":34,"column":0},"action":"remove","lines":["",""],"id":777}],[{"start":{"row":37,"column":1},"end":{"row":37,"column":2},"action":"remove","lines":["\t"],"id":778}],[{"start":{"row":37,"column":0},"end":{"row":37,"column":1},"action":"remove","lines":["\t"],"id":779}],[{"start":{"row":36,"column":3},"end":{"row":37,"column":0},"action":"remove","lines":["",""],"id":780}]]},"ace":{"folds":[{"start":{"row":6,"column":26},"end":{"row":9,"column":2},"placeholder":"..."},{"start":{"row":60,"column":29},"end":{"row":79,"column":1},"placeholder":"..."},{"start":{"row":82,"column":34},"end":{"row":119,"column":1},"placeholder":"..."},{"start":{"row":122,"column":34},"end":{"row":139,"column":1},"placeholder":"..."}],"scrolltop":195,"scrollleft":0,"selection":{"start":{"row":36,"column":3},"end":{"row":36,"column":3},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":78,"state":"php-start","mode":"ace/mode/php"}},"timestamp":1477754649925,"hash":"058f6acbc85bd26173a879c16c341594acb305ca"}