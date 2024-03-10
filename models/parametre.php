<?php

namespace Models;

use Models\DatabaseConnection;

class parametre
{

    private $connect;
    private $table = "parametre";

    public function __construct()
    {
        $this->connect = new DatabaseConnection();
    }


    public function lireCle($cle)
    {
        $sSQL = "SELECT *
                FROM parametre 
                WHERE 1 = 1 AND param_key = '$cle' ";
        $results =  $this->connect->execute_req_pdo($sSQL);

        if(count( $results) > 0){
            return $results[0]["param_value"];
        }else{
            return  "[" . $cle . "]" ;
        }

    }

    public function lireParCritere(array $critere = [])
    {
        $sSQL = "SELECT *
                FROM parametre 
                WHERE 1 = 1  ";

        if (isset($critere['param_key']) && $critere['param_key'] != "")
            $sSQL .= " AND param_key = '" . ($critere['param_key']) . "'";

        $results =  $this->connect->execute_req_pdo($sSQL);

        return $results;
    }

   
} //fin class
