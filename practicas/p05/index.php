<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
                echo '<li>$a = '."$a";
                echo '<li>$b = '."$b";
                echo '<li>$c = '."$c";   
            echo '</ul>';
            echo '<p>Inciso b:</p>'; 
            $a = "PHP server";
            $b = &$a;
            echo '<ul>';
                echo '<li>$a = '."$a";
                echo '<li>$b = '."$b";
                echo '<li>$c = '."$c";   
            echo '</ul>';

        echo '<h2>Ejercicio 3</h2>';
        echo '<p>Muestra el contenido de cada variable inmediatamente después de cada asignación,
        verificar la evolución del tipo de estas variables (imprime todos los componentes de los
        arreglo):</p>';
            $a = "PHP5";
            echo "\$a = $a <br/>";
            $z[] = &$a;
            echo '$z = ';
            var_dump($z);
            echo "<br/>";
            $b = "5a version de PHP";
            echo "\$b = $b <br/>";
            $c = (int)$b*10;
            echo "\$c = $c <br/>";
            $a .= $b;
            echo "\$a = $a <br/>";
            $b *= $c;
            echo "\$b = $b <br/>";
            $z[0] = "MySQL";
            echo '$z = ';
            var_dump($z);

        echo '<h2>Ejercicio 4</h2>';
        echo '<p>Lee y muestra los valores de las variables del ejercicio anterior, pero ahora con la ayuda de
        la matriz $GLOBALS o del modificador global de PHP.</p>';
            echo "a: ".$GLOBALS['a']."<br>";
            echo "z: "; 
            print_r($GLOBALS['z']);
            echo "<br>";
            echo "b: ".$GLOBALS['b']."<br/>";
            echo "c: ".$GLOBALS['c']."<br/>";
            echo "a: ".$GLOBALS['a']."<br/>";
            echo "b: ".$GLOBALS['b']."<br/>";
            echo "z: "; 
            print_r($GLOBALS['z']);
        
        echo '<h2>Ejercicio 5</h2>';
        echo '<p>Dar el valor de las variables $a, $b, $c al final del siguiente script:</p>'; 
        unset($a, $b, $c);  
        $a = "7 personas";
        $b = (integer) $a;
        $a = "9E3";
        $c = (double) $a; 

        echo "a: $a<br/>";
        echo "b: $b<br/>";
        echo "c: $c<br/>";
        
        echo '<h2>Ejercicio 6</h2>';
        echo '<p>Dar y comprobar el valor booleano de las variables $a, $b, $c, $d, $e y $f y muéstralas
        usando la función var_dump(<datos>).</p>';
        unset($a, $b, $c);  

        $a = "0";
        $b = "TRUE";
        $c = FALSE;
        $d = ($a OR $b);
        $e = ($a AND $c);
        $f = ($a XOR $b);
        echo '$a = ';
        var_dump($a);
        echo "<br/>";
        echo '$b = ';
        var_dump($b);
        echo "<br/>";
        echo '$c = ';
        var_dump($c);
        echo "<br/>";
        echo '$d = ';
        var_dump($d);
        echo "<br/>";
        echo '$e = ';
        var_dump($e);
        echo "<br/>";
        echo '$f = ';
        var_dump($f);
        echo "<br/>";

        echo '<p>Después investiga una función de PHP que permita transformar el valor booleano de $c y $e
        en uno que se pueda mostrar con un echo:</p>';
        echo "c = " . var_export($c, true) . "<br/>";
        echo "e = " . var_export($e, true) . "<br/>";

        echo '<h2>Ejercicio 7</h2>';
        echo '<p>Usando la variable predefinida $_SERVER, determina lo siguiente:</p>';
        echo '<ul>';
        echo '<li> a. La versión de Apache y PHP'.phpversion().$_SERVER['SERVER_SOFTWARE']."</li>";
        echo '<li> b. El nombre del sistema operativo (servidor)'.PHP_OS."</li>";
        echo '<li> c. El idioma del navegador (cliente)'. $_SERVER['HTTP_ACCEPT_LANGUAGE']."</li>";
    ?>
</body>
</html>