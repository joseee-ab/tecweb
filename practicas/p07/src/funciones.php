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

    function ejercicio3W($num) {
        $encontrado = false;
        unset($numAle);
        while (!$encontrado) {
            $numAle = rand(1, 999);
            if ($numAle % $num == 0) {
                $encontrado = true;
            }
        }
        return $numAle;
    }

    function ejercicio3DW($num) {
        unset($numAle);
        do {
            $numAle = rand(1, 999);
        } while ($numAle % $num != 0);

        return $numAle;
    }

    function ejercicio4() {
        $arreglo = [];
        for ($i = 97; $i <= 122; $i++) {
            $arreglo[$i] = chr($i);
        }
        return $arreglo;
    }

    function ejercicio5($edad, $sexo) {
        if ($sexo === "femenino" && $edad >= 18 && $edad <= 35) {
            return true;
        } else {
            return false;
        }
    }


