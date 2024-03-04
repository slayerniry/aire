<?php

namespace Models;

use Models\DatabaseConnection;

class t_event
{

    private $connect;
    private $table = "t_event";

    public function __construct()
    {
        $this->connect = new DatabaseConnection();
    }


    public function lireParCritere(array $critere = [])
    {
        $sSQL = "SELECT *
                FROM vw_t_event 
                WHERE 1 = 1  ";

        if (isset($critere['id_event']) && $critere['id_event'] != "")
            $sSQL .= " AND id_event = '" . ($critere['id_event']) . "'";

        if (isset($critere['id_type_event']) && $critere['id_type_event'] != "")
            $sSQL .= " AND id_type_event = '" . ($critere['id_type_event']) . "'";


        $sSQL .= " ORDER BY id_event DESC ";

        if (isset($critere['limit']) && $critere['id_type_event'] != "") {

            if ($critere['id_type_event'] == "3") {
                $sSQL .= " LIMIT " . $critere["limit"] . ",1 ";
            }

            if ($critere['id_type_event'] == "4") {

                $sSQL .= " LIMIT " . $critere["limit"] . ",4 ";
            }
        }

      
        $results =  $this->connect->execute_req_pdo($sSQL);

        return $results;
    }

    function lireMaxCode()
    {
        $sSQL = "SELECT max(id_experience) as maxi FROM `t_event`";

        $res =  $this->connect->execute_req_pdo($sSQL);

        return $res[0]["maxi"];
    }
} //fin class
