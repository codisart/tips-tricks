<?php


namespace TipsTricks\Repo;

class Entity implements EntityInterface
{
    private $id;

    private $name;

    private $plaque;

    public static function hydrate($id, $name, $plaque)
    {
        $self = new self();

        $self->id = $id;
        $self->name = $name;
        $self->plaque = $plaque;
        return $self;
    }
}
