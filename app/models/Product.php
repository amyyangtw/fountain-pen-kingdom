<?php
    class Product{
        private $db;

        public function __construct(){
            $this->db=new Database;
        }

        public function getProducts(){
            $this->db->query('SELECT * FROM items');

            $results=$this->db->resultSet();
            return $results;

        }
    }
