<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
    <title>Práctica 3</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Determina cuál de las siguientes variables son válidas y explica por qué:</p>
    <p>$_myvar,  $_7var,  myvar,  $myvar,  $var7,  $_element1, $house*5</p>
    <?php
        //AQUI VA MI CÓDIGO PHP
        $_myvar;
        $_7var;
        //myvar;       // Inválida
        $myvar;
        $var7;
        $_element1;
        //$house*5;     // Invalida
        
        echo '<h4>Respuesta:</h4>';   
    
        echo '<ul>';
        echo '<li>$_myvar es válida porque inicia con guión bajo.</li>';
        echo '<li>$_7var es válida porque inicia con guión bajo.</li>';
        echo '<li>myvar es inválida porque no tiene el signo de dolar ($).</li>';
        echo '<li>$myvar es válida porque inicia con una letra.</li>';
        echo '<li>$var7 es válida porque inicia con una letra.</li>';
        echo '<li>$_element1 es válida porque inicia con guión bajo.</li>';
        echo '<li>$house*5 es inválida porque el símbolo * no está permitido.</li>';
        echo '</ul>';

        echo '<h2>Ejercicio 2</h2>';
        echo '<p>Proporcionar los valores de $a, $b, $c como sigue:</p>'; 
            echo '<p>Inciso a:</p>';
            $a = "ManejadorSQL";
            $b = 'MySQL';
            $c = &$a;
            echo '<ul>';
                echo '<li>$a = '."$a".'</li>';
                echo '<li>$b = '."$b".'</li>';
                echo '<li>$c = '."$c".'</li>';   
            echo '</ul>';
            echo '<p>Inciso b:</p>'; 
            $a = "PHP server";
            $b = &$a;
            echo '<ul>';
                echo '<li>$a = '."$a".'</li>';
                echo '<li>$b = '."$b".'</li>';
                echo '<li>$c = '."$c".'</li>';   
            echo '</ul>';

        echo '<h2>Ejercicio 3</h2>';
        echo '<p>Muestra el contenido de cada variable inmediatamente después de cada asignación,
        verificar la evolución del tipo de estas variables (imprime todos los componentes del arreglo):</p>';

        $a = "PHP5";
        echo "<p>\$a = $a</p>";

        $z[] = &$a;
        echo '<p>$z = </p><pre>';
        print_r($z);
        echo '</pre>';

        $b = "5a version de PHP";
        echo "<p>\$b = $b</p>";

        $c = (int)$b*10;
        echo "<p>\$c = $c</p>";

        $a .= $b;
        echo "<p>\$a = $a</p>";

        $b *= $c;
        echo "<p>\$b = $b</p>";

        $z[0] = "MySQL";
        echo '<p>$z = </p><pre>';
        print_r($z);
        echo '</pre>';

        echo '<h2>Ejercicio 4</h2>';
        echo '<p>Lee y muestra los valores de las variables del ejercicio anterior usando $GLOBALS:</p>';

        echo "<p>a: ".$GLOBALS['a']."</p>";
        echo "<p>z: </p><pre>";
        print_r($GLOBALS['z']);
        echo "</pre>";
        echo "<p>b: ".$GLOBALS['b']."</p>";
        echo "<p>c: ".$GLOBALS['c']."</p>";

        echo '<h2>Ejercicio 4</h2>';
        echo '<p>Lee y muestra los valores de las variables del ejercicio anterior usando $GLOBALS:</p>';
        echo '<p>a: '.$GLOBALS['a'].'</p>';
        echo '<p>z:</p>';
        echo '<pre>';
        print_r($GLOBALS['z']);
        echo '</pre>';
        echo '<p>b: '.$GLOBALS['b'].'</p>';
        echo '<p>c: '.$GLOBALS['c'].'</p>';
        echo '<p>a (otra vez): '.$GLOBALS['a'].'</p>';
        echo '<p>b (otra vez): '.$GLOBALS['b'].'</p>';
        echo '<p>z (otra vez):</p>';
        echo '<pre>';
        print_r($GLOBALS['z']);
        echo '</pre>';
        
        echo '<h2>Ejercicio 5</h2>';
        echo '<p>Dar el valor de las variables $a, $b, $c al final del siguiente script:</p>'; 
        unset($a, $b, $c);  
        $a = "7 personas";
        $b = (integer) $a;
        $a = "9E3";
        $c = (double) $a;

        echo '<p>a: '.$a.'</p>';
        echo '<p>b: '.$b.'</p>';
        echo '<p>c: '.$c.'</p>';

        echo '<h2>Ejercicio 6</h2>';
        echo '<p>Dar y comprobar el valor booleano de las variables $a, $b, $c, $d, $e y $f usando var_dump:</p>';

        unset($a, $b, $c);

        $a = "0";
        $b = "TRUE";
        $c = FALSE;
        $d = ($a OR $b);
        $e = ($a AND $c);
        $f = ($a XOR $b);

        echo '<p>$a:</p>';
        echo '<pre>'; var_dump($a); echo '</pre>';

        echo '<p>$b:</p>';
        echo '<pre>'; var_dump($b); echo '</pre>';

        echo '<p>$c:</p>';
        echo '<pre>'; var_dump($c); echo '</pre>';

        echo '<p>$d:</p>';
        echo '<pre>'; var_dump($d); echo '</pre>';

        echo '<p>$e:</p>';
        echo '<pre>'; var_dump($e); echo '</pre>';

        echo '<p>$f:</p>';
        echo '<pre>'; var_dump($f); echo '</pre>';

        echo '<p>Transformando booleanos para mostrar con echo:</p>';
        echo '<p>c = '.var_export($c, true).'</p>';
        echo '<p>e = '.var_export($e, true).'</p>';

        echo '<p>Después investiga una función de PHP que permita transformar el valor booleano de $c y $e en uno que se pueda mostrar con un echo:</p>';
        echo '<p>c = '.var_export($c, true).'</p>';
        echo '<p>e = '.var_export($e, true).'</p>';

        echo '<h2>Ejercicio 7</h2>';
        echo '<p>Usando la variable predefinida $_SERVER, determina lo siguiente:</p>';
        echo '<ul>';
        echo '<li>a. La versión de Apache y PHP: '.phpversion().' '.$_SERVER['SERVER_SOFTWARE'].'</li>';
        echo '<li>b. El nombre del sistema operativo (servidor): '.PHP_OS.'</li>';
        echo '<li>c. El idioma del navegador (cliente): '.$_SERVER['HTTP_ACCEPT_LANGUAGE'].'</li>';
        echo '</ul>';

        echo '<p> <a href="https://validator.w3.org/check?uri=referer"><img src="https://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML 1.1" height="31" width="88" /></a> echo</p>';
    ?>
</body>
</html>
