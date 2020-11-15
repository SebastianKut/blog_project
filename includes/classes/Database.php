<?php

class Database{        

    const SELECTSINGLE = 1;
    const SELECTALL = 2;
    const EXECUTE = 3;
        
    private $pdo;

    public function __construct(){
        
        $this->pdo = new PDO("mysql:host=localhost;dbname=blog_project", "blog_admin", "test1234");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        
    }

    //Add queryDB() here
    public function queryDB($sql, $mode, $values = array()) {
        // 1. prepare statement
        $stmt = $this->pdo->prepare($sql);
        //2. bind values to the statement from multidimensional array $values 
        //Svalues = [[:placeholder1, value1], [:placeholder2, value2],]
        foreach($values as $valueToBind){
            $stmt->bindValue($valueToBind[0], $valueToBind[1]);
            };
        //3. execute query    
        $stmt->execute();    
        //4. check if data has to be fetched after querry
        if ( $mode != Database::SELECTSINGLE && $mode != Database::SELECTALL && $mode != Database::EXECUTE ) {
            throw new Exception('Invalid mode');
        } else if ( $mode == Database::SELECTSINGLE ) {
           return $stmt->fetch(PDO::FETCH_ASSOC);
        } else if ( $mode == Database::SELECTALL ) {
           return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}
    