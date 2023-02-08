<?php

class Backup extends DatabaseConnection{


    function backup_tables($tables, $backupName) {

        $this->conn->query("SET NAMES 'utf8'");
    
        //get all of the tables
        if($tables == '*'){
            $tables = array();
            $result = $this->conn->query('SHOW TABLES');
            while($row = $result->fetch_row()){
                $tables[] = $row[0];
            }
        }else{

            $tables = is_array($tables) ? $tables : explode(',',$tables);
        }
    
        $return = '';
        //cycle through
        foreach($tables as $table){
            $query = $this->conn->query('SELECT * FROM '.$table);
            $num_fields = $query->field_count;
            $num_rows = $query->num_rows;
    
            $return.= 'DROP TABLE IF EXISTS '.$table.';';
            $res = $this->conn->query('SHOW CREATE TABLE '.$table);
            $row2 = $res->fetch_row();
            $return.= "\n\n".$row2[1].";\n\n";
            $counter = 1;
    
            //Over tables
            for ($i = 0; $i < $num_fields; $i++) {   //Over rows
                while($row = $res->fetch_row()){   
                    if($counter == 1){
                        $return.= 'INSERT INTO '.$table.' VALUES(';
                    } else{
                        $return.= '(';
                    }
    
                    //Over fields
                    for($j=0; $j<$num_fields; $j++) {
                        $row[$j] = addslashes($row[$j]);
                        $row[$j] = str_replace("\n","\\n",$row[$j]);
                        if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                        if ($j<($num_fields-1)) { $return.= ','; }
                    }
    
                    if($num_rows == $counter){
                        $return.= ");\n";
                    } else{
                        $return.= "),\n";
                    }
                    ++$counter;
                }
            }
            $return.="\n\n\n";
        }
    
        //save file
        $currentTime = date("d-m-Y-H-i", time());

        $fileName = $backupName.'-'.$currentTime.'-'.(md5(implode(',',$tables))).'.sql';
        $fileDir  = '../../database-backup/';


        if (!file_exists($fileDir)) {
            if(mkdir($fileDir, 0777)){
                $fileWithPath = $fileDir.$fileName;
            }else {
                echo 'Sorry,Folder san not create!';
            }

        } else {
            $fileWithPath = $fileDir.$fileName;

        }


        // $fileWithPath = $fileDir.$fileName;
        $handle = fopen($fileWithPath,'w+');
        fwrite($handle,$return);
        if(fclose($handle)){
            // echo "Done, the file name is: ".$fileName;
            return true;
            // exit; 
        }
    }

    
}


?>