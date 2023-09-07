<?php

class Producto
{

    private $data;

    function __construct($nombre, $descripcion, $precio)
    {
        $this->data = array(
            "id" => null,
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "precio" => $precio
        );
    }

    function save()
    {
        if ($this->data['id'] == null) {
            $this->insert();
        } else {
            $this->update();
        }
    }

    function insert()
    {
        $db = Database::getInstance();

        $state = $db->prepare(
            "INSERT INTO productos VALUES(
                null,
                :nombre,
                :descripcion,
                :precio
            )"
        );
        $state->bindValue(':nombre', $this->data['nombre']);
        $state->bindValue(':descripcion', $this->data['descripcion']);
        $state->bindValue(':precio', $this->data['precio']);
        $state->execute();

        $this->data['id'] = $db->lastInsertId();
    }

    function update()
    {
        $db = Database::getInstance();

        $state = $db->prepare(
            "UPDATE productos SET 
                nombre = :nombre,
                descripcion = :descripcion,
                precio = :precio
                WHERE producto_id = :id;
            )"
        );
        $state->bindValue(':nombre', $this->data['nombre']);
        $state->bindValue(':descripcion', $this->data['descripcion']);
        $state->bindValue(':precio', $this->data['precio']);
        $state->bindValue(':id', $this->data['id']);
        $state->execute();
    }

    function __set($prop, $value)
    {
        $this->data[$prop] = $value;
    }
}
