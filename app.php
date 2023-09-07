<?php
session_start();
require_once 'models/cart.php';

class App
{

    function __construct()
    {
        // Descomentar para testear:

        // AGREGAR PRODUCTOS CON ADD
        // Cart::add('5', 1);

        // AGREGAR PRODUCTOS CON PUT
        // Cart::put('5', 1);

        // ELIMINAR PRODUCTOS
        // Cart::remove(5);

        // OBTENER INDICE DEL PRODUCTO POR CODIGO
        // Cart::getIndexByCode(5);

        // LIMPIAR CARRITO
        // Cart::clear();

        // VAR DUMP DEL CARRITO
        var_dump(Cart::get());
    }
}
