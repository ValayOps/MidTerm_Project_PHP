<?php

class collection
{
    #declaring array of items
    public $items = [];

    #fuction to handle the list to ADD data of any of  the object products,customer,purchase
    public function add($primary_key, $item)
    {
        $this->items[$primary_key] = $item;
    }

    #fuction to handle the list to Remove data of any of  the object products,customer,purchase
    public function remove($primary_key)
    {
        if (isset($this->items[$primary_key])) {
            unset($this->items[$primary_key]);
        }
    }
    
    #function that gets the data for the user
    public function get($primary_key)
    {
        if (isset($this->items[$primary_key])) {
            return $this->items[$primary_key];
        }
    }
    
    #function that return the total number of records in the list
    public function count($primary_key)
    {
        return count($this->items);
    }
}
