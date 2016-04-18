<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of words
 *
 * @author shichisen
 */
class words {
    private $response = array(
                                "status"    =>      "failed",
                                "comment"   =>      "error before initial",
                                "data"      =>      ""
                             );
    //put your code here
    function convertToArray($db_result){
        $return_array = array();
        while($row = $db_result->fetch_assoc()){
            $eachrow = array(
                                "id_table_vocab"      =>  $row["id_table_vocab"],
                                "word"                =>  $row["word"],
                                "deck"                =>  $row["deck"],
                                "vocab_id"            =>  $row["vocab_id"],
                                "meaning_id"          =>  $row["meaning_id"],
                                "id_table_meaning"    =>  $row["id_table_meaning"],
                                "type"                =>  $row["type"],
                                "meaning"             =>  $row["meaning"]
                            );
            array_push($return_array,$eachrow);
        }
        return $return_array;
    }
            
    function getOneNoMeaningWord($db_con){
        
        $sql = "SELECT vocab.`id` AS 'id_table_vocab', vocab.word, vocab.deck, 
            has_meaning.vocab_id, has_meaning.meaning_id, meaning.id AS 'id_table_meaning', 
            meaning.type, meaning.meaning
            FROM vocab
            LEFT JOIN has_meaning on vocab.id=has_meaning.vocab_id 
            LEFT JOIN meaning on has_meaning.meaning_id=meaning.id 
            WHERE has_meaning.vocab_id IS NULL 
            ORDER BY rand() 
            LIMIT 1";
        
        $db_result = $db_con->query($sql);
        
        if($db_result->num_rows > 0){
            $this->response["data"] = $this->convertToArray($db_result);
            $this->response["comment"] = "";
            $this->response["status"] = "success";
        }
        return $this->response;
    }
    
}
