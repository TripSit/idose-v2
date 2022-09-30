<?php 
/**
 * Dose Entry Model 
 * 
 * @package iDose
 * @author change <spr1t3-0@riseup.net>
 */

class DoseEntry {

    protected Database $db; 

    /**
     * Construct the model class
     */
    public function __construct() {
        $this->db = new Database();
    }


    /**
     * Store a new dose entry to the database
     *
     * @param string $substance
     * @param integer $volume
     * @param string $unit
     * @param [type] $dosed_at
     * @param [type] $uuid
     * @return void
     */
    public function create(string $substance, int $volume, string $unit, $dosed_at, $uuid):void {
        
    }

    
}