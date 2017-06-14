<?php

class MY_model extends CI_Model{
    const DB_TABLE = 'abstract';
    const DB_TABLE_PK = 'abstract'
        
    /**
    * Create record
    */
    private function insert(){
        $this->db->insert($this::DB_TABLE, $this);
        $this->{$this::DB_TABLE_PK} = $this->db->insert_id();
    }    
    
    /**
    * Update record
    */
    private function update(){
        $this->db->update($this::DB_TABLE, $this, $this::DB_TABLE_PK);
    } 
    
    /**
    * Populate from array or standard class
    * @param mixed $row
    */
     public function populate($row){
        foreach($row as $key => $value){
            $this->$key = $value;
        }
    }
    /**
    *Load from database
    * @param int $id
    */
    public function load($id){
        $query = $this->db->get_where($this::TABLE, array($this::DB_TABLE_PK => $id,));
        $this->populate($query->row());
    }
    
    /**
    * Delete record
    */
    public function delete(){
        $this->db->update($this::DB_TABLE, array($this::DB_TABLE_PK => $this->{$this::DB_TABLE_PK},));
        unset($this->{$this::DB_TABLE});
    }
    
    /**
    * Save the record
    */
    public function save(){
        if(isset($this->{this->{$this::DB_TABLE_PK})){
            $this->update();
        }
         else{
             $this->insert();
         }
    }
    
    /**
    * Get an array of Models with optional limit, offset
    * @param int $id
    */
                  
    
    
}