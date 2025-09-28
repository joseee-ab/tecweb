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

    function ejercicio5($sexo, $edad){
        if ($sexo === "femenino" && $edad >= 18 && $edad <= 35) {
            echo "<h3>Bienvenida, usted está en el rango de edad permitido</h3>";
        } else {
            echo "<h3>Lo siento, usted no esta en el rango permitido</h3>";
        }
    }
        

    function obtenerVehiculos(): array {
        return [
            'ABC1234' => [
                'Auto' => ['marca' => 'HONDA', 'modelo' => 2020, 'tipo' => 'camioneta'],
                'Propietario' => ['nombre' => 'Alfonzo Esparza', 'ciudad' => 'Puebla, Pue.', 'direccion' => 'C.U., Jardines de San Manuel']
            ],
            'DEF5678' => [
                'Auto' => ['marca' => 'MAZDA', 'modelo' => 2019, 'tipo' => 'sedan'],
                'Propietario' => ['nombre' => 'Ma. del Consuelo Molina', 'ciudad' => 'Puebla, Pue.', 'direccion' => '97 oriente']
            ],
            'GHI9012' => [
                'Auto' => ['marca' => 'NISSAN', 'modelo' => 2022, 'tipo' => 'hachback'],
                'Propietario' => ['nombre' => 'Ricardo Pérez', 'ciudad' => 'Atlixco, Pue.', 'direccion' => 'Av. Hidalgo #10']
            ],
            'JKL3456' => [
                'Auto' => ['marca' => 'FORD', 'modelo' => 2015, 'tipo' => 'sedan'],
                'Propietario' => ['nombre' => 'Laura Vázquez', 'ciudad' => 'Cholula, Pue.', 'direccion' => 'Calle 14 Nte #300']
            ],
            'MNO7890' => [
                'Auto' => ['marca' => 'CHEVROLET', 'modelo' => 2023, 'tipo' => 'camioneta'],
                'Propietario' => ['nombre' => 'Héctor Jiménez', 'ciudad' => 'Ciudad de México', 'direccion' => 'Insurgentes Sur #4000']
            ],
            'PQR1122' => [
                'Auto' => ['marca' => 'VOLKSWAGEN', 'modelo' => 2018, 'tipo' => 'hachback'],
                'Propietario' => ['nombre' => 'Gabriela Soto', 'ciudad' => 'Puebla, Pue.', 'direccion' => 'Fracc. Los Héroes']
            ],
            'STU3344' => [
                'Auto' => ['marca' => 'TOYOTA', 'modelo' => 2021, 'tipo' => 'sedan'],
                'Propietario' => ['nombre' => 'José Luis Montes', 'ciudad' => 'Veracruz, Ver.', 'direccion' => 'Blvd. Adolfo Ruíz Cortines']
            ],
            'VWX5566' => [
                'Auto' => ['marca' => 'BMW', 'modelo' => 2024, 'tipo' => 'sedan'],
                'Propietario' => ['nombre' => 'Elena Ríos', 'ciudad' => 'Guadalajara, Jal.', 'direccion' => 'Av. Patria #100']
            ],
            'YZA7788' => [
                'Auto' => ['marca' => 'KIA', 'modelo' => 2017, 'tipo' => 'hachback'],
                'Propietario' => ['nombre' => 'Daniel Gómez', 'ciudad' => 'Puebla, Pue.', 'direccion' => 'Zacatlán de las Manzanas']
            ],
            'BCD9900' => [
                'Auto' => ['marca' => 'MERCEDES', 'modelo' => 2023, 'tipo' => 'camioneta'],
                'Propietario' => ['nombre' => 'Sofia Hernández', 'ciudad' => 'Monterrey, NL', 'direccion' => 'San Pedro Garza García']
            ],
            'EFG1357' => [
                'Auto' => ['marca' => 'HYUNDAI', 'modelo' => 2016, 'tipo' => 'sedan'],
                'Propietario' => ['nombre' => 'Pablo Ramos', 'ciudad' => 'Puebla, Pue.', 'direccion' => 'Col. El Mirador']
            ],
            'HIJ2468' => [
                'Auto' => ['marca' => 'RENAULT', 'modelo' => 2019, 'tipo' => 'hachback'],
                'Propietario' => ['nombre' => 'Fernanda Luna', 'ciudad' => 'Tijuana, BC', 'direccion' => 'Zona Río']
            ],
            'KLM0852' => [
                'Auto' => ['marca' => 'JEEP', 'modelo' => 2021, 'tipo' => 'camioneta'],
                'Propietario' => ['nombre' => 'Andrés Rocha', 'ciudad' => 'Puebla, Pue.', 'direccion' => 'Angelópolis']
            ],
            'NOP9513' => [
                'Auto' => ['marca' => 'PEUGEOT', 'modelo' => 2022, 'tipo' => 'sedan'],
                'Propietario' => ['nombre' => 'Verónica Cruz', 'ciudad' => 'Cancún, QR', 'direccion' => 'Av. Tulum']
            ],
            'QRS7531' => [
                'Auto' => ['marca' => 'SUZUKI', 'modelo' => 2018, 'tipo' => 'hachback'],
                'Propietario' => ['nombre' => 'Carlos Solís', 'ciudad' => 'Puebla, Pue.', 'direccion' => 'C. 16 de Septiembre']
            ]
        ];
    }


    function validarMatricula(string $matricula): bool {
        $matricula = strtoupper($matricula);
        return preg_match('/^[A-Z]{3}[0-9]{4}$/', $matricula);
    }

    function buscarVehiculoPorMatricula(string $matricula) {
        $vehiculos = obtenerVehiculos();
        $matricula = strtoupper($matricula);

        return $vehiculos[$matricula] ?? null;
    }

    function mostrarVehiculo($matricula, $vehiculo) {
        echo "<tr>";
        echo "<td>$matricula</td>";
        echo "<td>{$vehiculo['Auto']['marca']}</td>";
        echo "<td>{$vehiculo['Auto']['modelo']}</td>";
        echo "<td>{$vehiculo['Auto']['tipo']}</td>";
        echo "<td>{$vehiculo['Propietario']['nombre']}</td>";
        echo "<td>{$vehiculo['Propietario']['ciudad']}</td>";
        echo "<td>{$vehiculo['Propietario']['direccion']}</td>";
        echo "</tr>";
    }
