
function getDatos()
{
    var nombre = prompt("Nombre: ", "");

    var edad = prompt("Edad: ", 0);

    var div1 = document.getElementById('nombre');
    div1.innerHTML = '<h3> Nombre: '+nombre+'</h3>';

    var div2 = document.getElementById('edad');
    div2.innerHTML = '<h3> Edad: '+edad+'</h3>';
}

function ejemplo1() {
    var div = document.getElementById("resultado1");
    div.innerHTML = "<h3>Hola Mundo</h3>";
}

function ejemplo2() {
    var nombre2 = prompt("Nombre: ", "");
    var edad2 = prompt("Edad: ", 0);
    var altura = prompt("Altura: ", 0.0);
    var casado = confirm("¿Casado?: ");

    var div1 = document.getElementById('nombre2');
    var div2 = document.getElementById('edad2');
    var div3 = document.getElementById('altura');
    var div4 = document.getElementById('casado');

    div1.innerHTML = '<h3> Nombre: '+nombre2+'</h3>';
    div2.innerHTML = '<h3> Edad: '+edad2+'</h3>';
    div3.innerHTML = '<h3> Altura: '+altura+'</h3>';
    if (casado){
        div4.innerHTML = '<h3> Casado: Si</h3>';
    } else {
        div4.innerHTML = '<h3> Casado: No</h3>';
    }

}

function ejemplo3() {
    var nombre3 = prompt("Nombre: ", "");
    var edad3 = prompt("Edad: ", 0);

    var div = document.getElementById('resultado3');
    div.innerHTML = '<h3>Hola ' + nombre3 + ', así que tienes ' + edad3 + ' años.</h3>';
}

function ejemplo4() {
    var valor1 = prompt("Introducir primer número:", "");
    var valor2 = prompt("Introducir segundo número:", "");

    val1 = parseInt(valor1);
    val2 = parseInt(valor2);

    var suma = val1 + val2;
    var producto = val1 * val2;

    var div1 = document.getElementById('valor1');
    var div2 = document.getElementById('valor2');

    div1.innerHTML = '<h3>La suma es: '+ val1 +' + '+ val2 +' = '+suma+'</h3>';
    div2.innerHTML = '<h3>El producto es: '+ val1 +' * '+ val2 +' = '+producto+'</h3>';
}

function ejemplo5() {
    var nombre5 = prompt("Nombre:", "");
    var nota = prompt("Nota:", "");

    valor = parseFloat(nota);

    
    var div = document.getElementById('resultado5');
    if (valor >= 4.0){
        div.innerHTML = '<h3> '+nombre5+'esta  aprobado con un '+valor+'</h3>';
    }else{
        div.innerHTML = '<h3> '+nombre5+'no esta  aprobado con un '+valor+'</h3>';
    }
}

function ejemplo6(){
    var num1 = prompt("Ingresa el primer numero:", "");
    var num2 = prompt("Ingresa el segundo numero:", "");

    var val1 = parseInt(num1);
    var val2 = parseInt(num2);

    var div = document.getElementById('resultado6');

    if (val1 > val2){
        div.innerHTML = '<h3>El mayor es: '+val1+'</h3>';
    } else{
        div.innerHTML = '<h3>El menor es: '+val2+'</h3>';
    }
}

function ejemplo7(){
    var nota1 = prompt("1er nota:", "");
    var nota2 = prompt("2da nota:", "");
    var nota3 = prompt("3er nota:", "");

    var n1 = parseFloat(nota1);
    var n2 = parseFloat(nota2);
    var n3 = parseFloat(nota3);

    var pro = (n1 + n2 + n3) / 3;
    var div = document.getElementById('resultado7');

    if (pro >= 7) div.innerHTML = '<h3>Aprobado</h3>';
    else if (pro >= 4) div.innerHTML = '<h3>Regular </h3>';
    else div.innerHTML = '<h3>Reprobado</h3>';
}

function ejemplo8(){
    var valor = prompt("Ingresar un valor comprendido entre 1 y 5:", "");
    var val = parseInt(valor);
    var div = document.getElementById('resultado8');

    switch(val) {
        case 1: div.innerHTML = '<h3>Uno</h3>'; break;
        case 2: div.innerHTML = '<h3>Dos</h3>'; break;
        case 3: div.innerHTML = '<h3>Tres</h3>'; break;
        case 4: div.innerHTML = '<h3>Cuatro</h3>'; break;
        case 5: div.innerHTML = '<h3>Cinco</h3>'; break;
        default: div.innerHTML = '<h3>Debe ingresar un valor comprendido entre 1 y 5</h3>'; break;
    }
}

function ejemplo9(){
    var color = prompt("Ingrese el color del que quiera pintar el fondo de la ventana (rojo, verde, azul):", "").toLowerCase();

    switch(color) {
        case 'rojo': document.body.style.backgroundColor = '#ff0000'; break;
        case 'verde': document.body.style.backgroundColor = '#00ff00'; break;
        case 'azul': document.body.style.backgroundColor = '#0000ff'; break;
        default: alert("Ingrese un color valido"); break;
    }
}

function ejemplo10(){
    var div = document.getElementById('resultado10');
    div.innerHTML = '';
    var x = 1;
    while (x <= 100) {
        div.innerHTML += '<h3> '+x+' </h3>';
        x++;
    }
}

function ejemplo11(){
    var x = 1
    var suma = 0;
    var div = document.getElementById('resultado11');

    for (x; x <= 5; x++) {
        var valor = prompt("Ingresa un valor:", "");
        var val = parseInt(valor);
        suma += val;
    }

    div.innerHTML = '<h3>La suma de los valores es: '+suma+'</h3>';
}

function ejemplo12(){
    var div = document.getElementById('resultado12');
    div.innerHTML = '';
    var valor;
    do {
        valor = prompt("Ingresa un valor entre 0 y 999:", "");
        var val = parseInt(valor);

        div.innerHTML += '<h3> El valor '+val+' tiene ';
        if (val < 10) div.innerHTML += '1 dígito</h3>';
        else if (val < 100) div.innerHTML += '2 dígitos</h3>';
        else div.innerHTML += '3 dígitos</h3>';
    } while (val != 0);
}

function ejemplo13(){
    var div = document.getElementById('resultado13');
    div.innerHTML = '';
    for (var f = 1; f <= 10; f++) {
        div.innerHTML += '<h3>'+f+' </h3>';   
    }
}

function ejemplo14(){
    var div = document.getElementById('resultado14');
    div.innerHTML = '';
    for (var i = 1; i <= 3; i++) {
        div.innerHTML += '<h3> Cuidado</h3>';
        div.innerHTML += '<h3> Ingresa tu documento correctamente</h3>';
    }
}

function mensaje15(){
    var div = document.getElementById('resultado15');
    div.innerHTML += '<h3> Cuidado </h3>';
    div.innerHTML += '<h3> Ingresa tu documento correctamente </h3>';
}

function ejemplo15(){
    for (var i = 1; i <= 3; i++){
        mensaje15();
    }
}

function mostrarRango(x1, x2){
    var div = document.getElementById('resultado16');
    div.innerHTML = '';
    for(var inicio = x1; inicio <= x2; inicio++) {
        div.innerHTML += '<h3> '+inicio+' </h3>';  
    }
}

function ejemplo16(){
    var valor1 = prompt("Ingrese el valor inferior:", "");
    var valor2 = prompt("Ingrese el valor superior:", "");

    var val1 = parseInt(valor1);
    var val2 = parseInt(valor2);

    mostrarRango(val1, val2);
}

function convertirCastellano17(x){
    var div = document.getElementById('resultado17');
    if (x == 1) div.innerHTML = '<h3>Uno </h3>';
    else if(x == 2) div.innerHTML = '<h3>Dos </h3>';
    else if(x == 3) div.innerHTML = '<h3>Tres </h3>';
    else if(x == 4) div.innerHTML = '<h3>Cuatro </h3>';
    else if(x == 5) div.innerHTML = '<h3>Cinco </h3>';
    else div.innerHTML = '<h3> Valor incorrecto </h3>';
}

function ejemplo17() {
    var valor = prompt("Ingrese un valor entre 1 y 5:", "");
    var val = parseInt(valor);
    convertirCastellano17(val);
}

function convertirACastellano18(x){
    var div = document.getElementById('resultado18');
    switch(x) {
        case 1: div.innerHTML = '<h3>Uno </h3>'; break;
        case 2: div.innerHTML = '<h3>Dos </h3>'; break;
        case 3: div.innerHTML = '<h3>Tres </h3>'; break;
        case 4: div.innerHTML = '<h3>Cuatro </h3>'; break;
        case 5: div.innerHTML = '<h3>Cinco </h3>'; break;
        default: div.innerHTML = '<h3>Valor incorrecto </h3>'; break;
    }
}

function ejemplo18() {
    var valor = prompt("Ingrese un valor entre 1 y 5:", "");
    var val = parseInt(valor);
    convertirACastellano18(val);
}