<?php

class Database
{
    protected $connection = null;
    
    public function __construct()
    {
        try {
            $this->connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
    	
            if ( mysqli_connect_errno()) {
                throw new Exception("Could not connect to database.");   
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());   
        }			
    }
    protected function select($query = "" , $params = []): array
    {
       
        try {
            $stmt = $this->connection->prepare( $query );
            if($stmt == false) {
                throw New Exception("Unable to do prepared statement: " . $query);
            }
            if( $params ) {
                $stmt->bind_param($params[0], ...$params[1]);
            }
            $stmt->execute();
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);				
            $stmt->close();
            return $result;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
    }
   

    protected function register($query = "" , $params = [])
    {
       $result = 0; 
        try {
            $stmt = $this->connection->prepare( $query );
            if($stmt == false) {
                throw New Exception("Unable to do prepared statement: " . $query);
            }
            if( $params ) {
                $stmt->bind_param($params[0], ...$params[1]);
            }
            if($stmt->execute()){
                $result =  $stmt->insert_id;
            }

            $stmt->close();
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
        return $result;
    }


    protected function update($query = "" , $params = [])
    {
        try {
            $stmt = $this->connection->prepare( $query );
            if($stmt == false) {
                throw New Exception("Unable to do prepared statement: " . $query);
            }
            if( $params ) {
                $stmt->bind_param($params[0], ...$params[1]);
            }
            $stmt->execute();
            $stmt->close();
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
    }
}