<?php

class Node
{
    private $id;
    private $name;
    private $parentId;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function serialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'parentId' => $this->parentId
        ];
    }
}