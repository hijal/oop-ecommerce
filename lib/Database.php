<?php
    $filePath = realpath(dirname(__FILE__));
    include_once ($filePath.'/../config/config.php');

    class Database
    {
        public $host        = DB_HOST;
        public $username    = DB_USERNAME;
        public $password    = DB_PASSWORD;
        public $dbname      = DB_NAME;

        public $link;
        public $error;

        public function __construct()
        {
            $this -> connectDB();
        }

        private function connectDB()
        {
            $this -> link   = new mysqli(
                $this -> host,
                $this -> username,
                $this -> password,
                $this -> dbname
            );
            if(!$this -> link)
            {
                $this -> error     = "Connection failed!!".$this -> link -> connect_error;
                return false;
            }
        }

        public function select($query)
        {
            $result     = $this -> link -> query($query) or 
            die($this -> link -> error.__LINE__);

            if($result -> num_rows > 0)
            {
                return $result;
            } 
            else 
            {
                return false;
            }
        }

        public function insert($query)
        {
            $insert_row     = $this->link->query($query) or 
              die($this->link->error.__LINE__);

            if($insert_row)
            {
                return $insert_row;
            } 
            else 
            {
                return false;
            }
        }

        public function update($query)
        {
            $update_row     = $this->link->query($query) or 
              die($this->link->error.__LINE__);

            if($update_row)
            {
                return $update_row;
            } 
            else 
            {
                return false;
            }
        }

        public function delete($query)
        {
            $delete_row     = $this->link->query($query) or 
              die($this->link->error.__LINE__);

            if($delete_row)
            {
                return $delete_row;
            } 
            else 
            {
                return false;
            }
        }
    }