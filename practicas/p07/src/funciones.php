<?php

    function ejercicio1($num) {
        return ($num % 5 == 0 && $num % 7 == 0);
    }

    function ejercicio2(){
        $matriz = [];
        $iteraciones = 0;
        $encontrado = false;

        while (!$encontrado) {
            $num1 = rand(1, 999);
            $num2 = rand(1, 999);
            $num3 = rand(1, 999);

            $matriz[] = [$num1, $num2, $num3];

            if (($num1 % 2 != 0) && ($num2 % 2 == 0) && ($num3 % 2 != 0)) {
                $encontrado = true;
            }
            $iteraciones++;
        }

        return [
            'matriz' => $matriz,
            'iteraciones' => $iteraciones,
            'totalNumeros' => $iteraciones * 3
        ];
    }


