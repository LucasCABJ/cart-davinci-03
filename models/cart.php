<?php

class Cart
{
    function __construct()
    {
        //
    }

    static function get()
    {
        if (isset($_SESSION['cart'])) {
            return $_SESSION['cart'];
        } else {
            $_SESSION['cart'] = array();
            return $_SESSION['cart'];
        }
    }

    static function add($code, $quantity = 1)
    {
        $cart = Cart::get();
        array_push($cart, ["code" => $code, "quantity" => $quantity]);
        $_SESSION['cart'] = $cart;
    }



    static function clear()
    {
        unset($_SESSION['cart']);
    }

    static function getIndexByCode($code)
    {

        $cart = Cart::get();
        $index = -1;

        for ($i = 0; $i < count($cart); $i++) {

            if ($cart[$i]['code'] == $code) {
                $index = $i;
                break;
            }
        }

        return $index;
    }

    static function put($code, $quantity)
    {
        $index = Cart::getIndexByCode($code);
        if ($index != -1) {
            $cart = Cart::get();
            $cart[$index]['quantity'] += $quantity;
            $_SESSION['cart'] = $cart;
        } else {
            Cart::add($code, $quantity);
        }
    }

    static function remove($code)
    {
        $index = Cart::getIndexByCode($code);
        $removed_item = false;
        if ($index != -1) {
            $cart = Cart::get();
            $removed_item = $cart[$index];
            array_splice($cart, $index, 1);
            $_SESSION['cart'] = $cart;
        }

        return $removed_item;
    }
}
