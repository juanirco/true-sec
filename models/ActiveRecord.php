<?php
namespace Model;
class ActiveRecord {

    // Database
    protected static $db;
    protected static $table = '';
    protected static $columnsDB = [];

    // Alerts & messages
    protected static $alerts = [];
    
    // Define DB conection - includes/database.php
    public static function setDB($database) {
        self::$db = $database;
    }

    public static function setAlert($type, $message) {
        static::$alerts[$type][] = $message;
    }
    // Validation
    public static function getAlerts() {
        return static::$alerts;
    }

    public function validate() {
        static::$alerts = [];
        return static::$alerts;
    }

    // Records - CRUD
    public function save() {
        $result = '';
        if(!is_null($this->id)) {
            // update
            $result = $this->update();
        } else {
            // Creating a new record
            $result = $this->create();
        }
        return $result;
    }

    public static function all() {
        $query = "SELECT * FROM " . static::$table;
        $result = self::SQLconsult($query);
        return $result;
    }

    // Search a record by its id
    public static function find($id) {
        $query = "SELECT * FROM " . static::$table  ." WHERE id = $id";
        $result = self::SQLconsult($query);
        return array_shift( $result ) ;
    }

    // Get records
    public static function get($limit) {
        $query = "SELECT * FROM " . static::$table . " LIMIT $limit";
        $result = self::SQLconsult($query);
        return array_shift( $result ) ;
    }

        // Get records
        public static function get_limit($limit) {
            $query = "SELECT * FROM " . static::$table . " LIMIT $limit";
            $result = self::SQLconsult($query);
            return $result;
        }

    // Search Where with Column 
    public static function where($column, $value) {
        $query = "SELECT * FROM " . static::$table . " WHERE $column = '$value'";
        $result = self::SQLconsult($query);
        return array_shift( $result ) ;
    }

    // Search Where with Column 
public static function wherefirst($column, $value) {
    $query = "SELECT * FROM " . static::$table . " WHERE $column = '$value'";
    $result = self::SQLconsult($query);
    return !empty($result) ? $result[0] : null;
}

    // Search all records that belongs to an ID
    public static function belongsTo($column, $value) {
        $query = "SELECT * FROM " . static::$table . " WHERE $column = '$value'";
        $result = self::SQLconsult($query);
        return $result;
    }

    // SQL for advanced consults.
    public static function SQL($consult) {
        $query = $consult;
        $result = self::SQLconsult($query);
        return $result;
    }

    // create a new record
    public function create() {
        // Data sanitize
        $atributes = $this->atributesSanitize();

        // Insert into DB
        $query = " INSERT INTO " . static::$table . " ( ";
        $query .= join(', ', array_keys($atributes));
        $query .= " ) VALUES ('"; 
        $query .= join("', '", array_values($atributes));
        $query .= "') ";

        // Consult result
        $result = self::$db->query($query);

        return [
           'result' =>  $result,
           'id' => self::$db->insert_id
        ];
    }

    public function update() {
        // Sanitizar los datos
        $atributes = $this->atributesSanitize();

        // Iterar para ir agregando cada campo de la BD
        $values = [];
        foreach($atributes as $key => $value) {
            $values[] = "{$key}='{$value}'";
        }

        $query = "UPDATE " . static::$table ." SET ";
        $query .=  join(', ', $values );
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 "; 

        // debug($query);

        $result = self::$db->query($query);
        return $result;
    }

    // Delete a record - Takes the Active Record ID
    public function delete() {
        $query = "DELETE FROM "  . static::$table . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $result = self::$db->query($query);
        return $result;
    }

    // Delete all records - Takes the Active Record ID
    public function deleteAll() {
        $query = "DELETE FROM "  . static::$table . " WHERE projectId = " . self::$db->escape_string($this->id);
        $result = self::$db->query($query);
        return $result;
    }

    public static function SQLconsult($query) {
        // DB consult
        $result = self::$db->query($query);

        // Iterate results
        $array = [];
        while($record = $result->fetch_assoc()) {
            $array[] = static::createObject($record);
        }

        // free memory
        $result->free();

        // return results
        return $array;
    }

    protected static function createObject($record) {
        $object = new static;

        foreach($record as $key => $value ) {
            if(property_exists( $object, $key  )) {
                $object->$key = $value;
            }
        }

        return $object;
    }



    // Identify and join DB atributes
    public function atributes() {
        $atributes = [];
        foreach(static::$columnsDB as $column) {
            if($column === 'id') continue;
            $atributes[$column] = $this->$column;
        }
        return $atributes;
    }

    public function atributesSanitize() {
        $atributes = $this->atributes();
        $sanitized = [];
        foreach($atributes as $key => $value ) {
            $sanitized[$key] = self::$db->escape_string($value);
        }
        return $sanitized;
    }

    public function sync($args=[]) { 
        foreach($args as $key => $value) {
          if(property_exists($this, $key) && !is_null($value)) {
            $this->$key = $value;
          }
        }
    }
}