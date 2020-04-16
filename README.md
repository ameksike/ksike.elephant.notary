# notary-elephant
This is simple and light template engine for php and html support

Note that a [template processor](https://en.wikipedia.org/wiki/Template_processor) also known as a template engine or template parser, is software designed to combine templates with a data model to produce result documents. The language that the templates are written in is known as a template language or templating language. The result is any kind of formatted output, including documents, web pages, or source code (in source code generation), either in whole or in fragments. A template engine is ordinarily included as a part of a web template system or application framework, and may be used also as a preprocessor or filter. 

### How load the library and configure it 
In this case, the resource called Carrier is used, which abstracts the developers from the process of loading the required library into memory, through the association of routes with namespaces. [for more information about Carrier library access this link](https://github.com/ameksike/ksike.elephant.carrier) 
```php
//... step 1: include the loader and set Ksike namespace path
include __DIR__ . "/lib/carrier/src/Main.php";
Carrier::active(array( 'Ksike'=> __DIR__ .'/../' ));
//... step 2: define the namespaces to use
use Ksike\notary\src\server\Main as Notary;
```

### How to process simple HTML templates using double quotes
```php
	$out = Notary::this()->compile(
		"<h3> esto es un tpl simple </h3> '{\$data}' ... ", 
		"MY-VALUE"
	);
	print_r($out); 
```

### How to process simple HTML templates using single quotes
```php
	$out = Notary::this()->compile(
		'<h3> esto es un tpl simple </h3> \'$data\' ... ', 
		"MY-VALUE"
	);
	echo($out); 
```

### How to process simple HTML templates using array of values
```php
	$out = Notary::this()->compile(
		"<h3> esto es un tpl \$type </h3> '\$data' ... ", 
		array(
			"data"=>"MY-VALUE", 
			"type"=>"HTML-VALUE"
		)
	);
	echo($out); 
```

### How to process templates stored in html files
```php
	$out = Notary::this()->compile( 
		__DIR__ ."/tpl/test2.html" , 
		array(
			"data"=>"MY-VALUE", 
			"test"=>"MY2-VALUE",
			"type"=>"HTML-VALUE"
		)
	);
	echo($out); 
```

### How to process templates stored in files of type PHP
```php
	$out = Notary::this()->compile( 
		__DIR__ ."/tpl/test1.php" , 
		array(
			"active"=>"MIO", 
			"cfg"=> ["lissa", "mary", "lucy"]
		)
	);
	echo($out);  
```

### How to process objects inside templates
```php

	class Person { 
		public function getName(){ 
			return "tastico"; 
		} 
	}

	$out = Notary::this()->compile( 
		__DIR__ ."/tpl/test1.html" , 
		new Person
	);

	echo($out);  echo " <br>  \n";


```

### How to process objects inside templates, another way to use
```php
	$out = Notary::this()->compile( 
		' Ejm: $el in {$obj->getName()} ',
		[ 
			"obj" => new Person, 
			"el"  => "data" 
		] 
	);
	echo($out); 
```

### How to set template path
```php
	Notary::this()->path( __DIR__ ."/tpl/");
	$out = Notary::this()->compile(
		"test2.html" , 
		[ "test" => "MIO" ]
	);
	echo($out);  

	$out = Notary::this()->compile(
		"test1.html" , 
		[ "data"=> new Person ]
	);
	echo($out); 
	
	//... How to get template path
	$out = Notary::this()->path();
	echo($out); 
```


[For more information about this library access this link and test or review demos](https://github.com/ameksike/ksike.elephant.notary/tree/master/demo) 

