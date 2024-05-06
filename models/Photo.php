<?php

namespace Model;

class Photo extends ActiveRecord{
    protected static $table = 'photos';
    protected static $columnsDB = ['id', 'route', 'projectId'];

    public $id;
    public $route;
    public $projectId;

    
    public function __construct($args = []) 
    {
        $this->id = $args['id'] ?? null;
        $this->route = $args['route'] ?? '';
        $this->projectId = $args['projectId'] ?? null;
    }
}