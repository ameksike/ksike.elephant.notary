# notary-elephant
This is simple and light template engine for php and html support

```php
	/*
	 * Ejemplo de utilizacion del la biblioteca Ksike/Notary
	 * */
	  
	//... paso 1: cargar la biblioteca
	include __DIR__ . "/lib/carrier/src/Main.php";
	Carrier::active(array(
		'Ksike'=> __DIR__ .'/../'
	));
	//... paso 2: definir los espacios de nombres a utilizar
	use Ksike\notary\src\server\Main as Notary;
```

```php
	//... paso 3: utilizar la biblioteca
	//... ... procesar plantillas html simples utilizando comillas dobles
	$out = Notary::this()->compile("<h3> esto es un tpl simple </h3> '{\$data}' ... ", "MIO");
	print_r($out);  echo " <br>  \n"; 
	
	//... ... procesar plantillas html simples utilizando comillas simples
	$out = Notary::this()->compile('<h3> esto es un tpl simple </h3> \'$data\' ... ', "MIO");
	echo($out); echo " <br>  \n"; 
```
```php
	//... ...  procesar plantillas html simples utilizando arreglo de valores
	$out = Notary::this()->compile("<h3> esto es un tpl \$type </h3> '\$data' ... ", array("data"=>"MIO", "type"=>"html"));
	echo($out);  echo " <br>  \n";  

	//... ...  procesar plantillas almacenadas en ficheros de tipo html
	$out = Notary::this()->compile( __DIR__ ."/tpl/test2.html" , array("test"=>"MIO"));
	echo($out);  echo " <br>  \n";  
```

```php
	//... ...  procesar plantillas almacenadas en ficheros de tipo php
	$out = Notary::this()->compile( __DIR__ ."/tpl/test1.php" , array("active"=>"MIO", "cfg"=>array("lissa", "mary", "lucy")));
	echo($out);  echo " <br>  \n";  
```

```php
	//... ...  procesar objetos dentro de las plantillas ejemplo 1
	class Person { public function getName(){ return "tastico"; } }
	$out = Notary::this()->compile( __DIR__ ."/tpl/test1.html" , new Person);
	echo($out);  echo " <br>  \n";
	//... ...  procesar objetos dentro de las plantillas ejemplo 2
	$out = Notary::this()->compile( ' Ejm: $el in {$myobj->getName()} ', array("myobj"=>new Person, "el"=>"data" ) );
	echo($out);  echo " <br>  \n";
```

```php
	//... ...  establecer ruta de las plantillas 
	Notary::this()->path( __DIR__ ."/tpl/");
	$out = Notary::this()->compile("test2.html" , array("test"=>"MIO"));
	echo($out);  echo " <br>  \n";
	$out = Notary::this()->compile("test1.html" , array("data"=> new Person));
	echo($out);  echo " <br>  \n";
	
	//... ...  obtener ruta de las plantillas 
	echo(Notary::this()->path());  echo " <br>  \n";
```