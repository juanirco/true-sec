<?php

namespace Model;

class Project extends ActiveRecord{
    protected static $table = 'projects';
    protected static $columnsDB = ['id', 'name', 'type', 'client', 'budget', 'location', 'duration', 'durationEng', 'endDate', 'details', 'detailsEng', 'createdBy', 'token'];

    public $id;
    public $name;
    public $type;
    public $client;
    public $budget;
    public $location;
    public $duration;
    public $durationEng;
    public $endDate;
    public $details;
    public $detailsEng;
    public $createdBy;
    public $token;

    
    public function __construct($args = []) 
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->type = $args['type'] ?? '';
        $this->client = $args['client'] ?? '';
        $this->budget = $args['budget'] ?? '';
        $this->location = $args['location'] ?? '';
        $this->duration = $args['duration'] ?? '';
        $this->durationEng = $args['durationEng'] ?? '';
        $this->endDate = $args['endDate'] ?? '';
        $this->details = $args['details'] ?? '';
        $this->detailsEng = $args['detailsEng'] ?? '';
        $this->createdBy = $args['createdBy'] ?? null;
        $this->token = $args['token'] ?? null;
    }

    public function validate_form() : array {
        if(!$this->name) {
            self::$alerts['error'][] = 'El nombre es obligatorio';
        } // El [] luego de ['error'] es para indicar que debe agregarse al final del arreglo
        if(!$this->type) {
            self::$alerts['error'][] = 'El tipo de proyecto es obligatorio';
        }
        if(!$this->location) {
            self::$alerts['error'][] = 'La ubicación es obligatoria';
        }
        return self::$alerts;
    }
}