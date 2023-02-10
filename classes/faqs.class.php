<?php 
class faqs extends DatabaseConnection{

    // addfaqs start

    function addFaqs($question, $ans, $page){
        $question = addslashes(trim($question));
        $ans      = addslashes(trim($ans));
        $page     = addslashes(trim($page));

        $sql = "INSERT INTO `faqs`
               ( `question`, `ans`, `page`, added_on)
               VALUES
               ('$question', '$ans', '$page', now())";

        $res = $this->conn->query($sql);
        return $res;

    }
    // eof

    
// display start 
function getfaqDetail(){

    $faqData = array();

    $sql = "SELECT * FROM faqs";

    $faqQuery   = $this->conn->query($sql);

    while($row  = $faqQuery->fetch_array()){    

    $faqData[]	= $row;
    }

    return $faqData;

}
// end display



//updatePage start 
function getfaqDetails($id){

    $select     = "SELECT * FROM faqs WHERE id='$id'";

    $query      = $this->conn->query($select);

    return $query;

}

// end updatePage


//get faqs by page name
function getfaqqu($page){
    $data       = array();
    $select     = "SELECT * FROM faqs WHERE `page` ='$page'";
    $res        = $this->conn->query($select);
    $rows       = $res->num_rows;
    if ($rows > 0) {
        while ($result = $res->fetch_assoc()) {
            $data[] = $result;
        }
    }

    return $data;

}//eof getfaqqu

// end updatePage

function editfaqs($question, $ans, $page, $id){

    $sqledit = "UPDATE `faqs` 
                SET `question` = '$question',
                `ans`      = '$ans',
                `page`     = '$page', 
                `id`       = '$id'
                WHERE
                `faqs`.`id` = '$id'";

    $result1 = $this->conn->query($sqledit);
    return $result1;
}// eof




    //delete

    function deletefaq($Id){

        $sqldal = "DELETE FROM `faqs` WHERE `faqs`.`id` = '$Id'";

        $result = $this->conn->query($sqldal);

        return $result;

    }
    
    // eof 

}
?>