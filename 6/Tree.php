<?php

class Tree
{
    private $nodes = [];

    public function addNode($node, $parentNodeId = 0)
    {
        $node->setParentId($parentNodeId);
        $node->setId($this->getNextFreeId());
        array_push($this->nodes, $node);
    }

    public function getTree()
    {
        return $this->nodes;
    }

    public function serializedNodes()
    {
        $out = array_map(function ($el) {return $el->serialize();}, $this->nodes);
        return $out;
    }

    public function getStats()
    {
        $ids = [];
        foreach ($this->nodes as $node) {
            array_push($ids, $node->getId());
        }
        return ['nodes_count' => count($this->nodes), 'ids' => $ids];
    }

    private function getNextFreeId()
    {
        return count($this->nodes) + 1;
    }
}