<?php

    session_start();

    if ($_SESSION['status'] == 'Admin'){
        echo "";
    }
    else{
        echo "<script>location.href='login.php'</script>";
    }
?>

<?php

class FlatDB {
    private static $field_deliemeter = ",";
    private static $linebreak = "\n";
    private static $table_extension = '.csv';

    public $table_name;
    public $table_contents = array("FIELDS" => NULL, "RECORDS" => NULL);

    public function openTable($table_name) {        
        // Check if this table is found
        $table_name = $table_name.self::$table_extension;
        if(file_exists($table_name) === FALSE) throw new Exception('Table not found.');

        // Set the table in a property
        $this->table_name = $table_name;

        // Get the fields
        $table = file($this->table_name, FILE_IGNORE_NEW_LINES); 
        $table_fields = explode(self::$field_deliemeter, $table[0]);
        unset($table[0]);

        // Put all records in an array
        $records = array();
        $num = 0;
        foreach($table as $record) {
            $records_temp = explode(self::$field_deliemeter, $record);
            $count = count($records_temp);
            for($i = 0; $i < $count; $i++) 
                $records[$num][$table_fields[$i]] = $records_temp[$i];
            $num++;
        }

        $this->table_contents['FIELDS'] = $table_fields;
        $this->table_contents['RECORDS'] = $records;
    }

    /*
    ** This method updates fields based on a criteria
    ** 
    ** @param   array   $update an array containing the fields the user wants to update
    ** @param   array   $where  an array which has field => value combinations which is the criteria
    **
    ** @example
    ** $db = new FlatDB;
    ** $db->openTable('Test.csv');
    ** $update = array("group_id" => 1);
    ** $where = array("group_id" => 2);
    ** $db->updateRecords($update, $where);
    **/
    public function updateRecords($update, $where) {
        // Check if the connection is opened
        if(empty($this->table_name) === TRUE) throw new Exception('There is no connection to a table opened.');

        // Check if each field in update and where are found
        foreach($update as $field => $value) 
            if(in_array($field, $this->table_contents['FIELDS']) === FALSE) throw new Exception($field." is not found.");

        foreach($where as $field => $value)
            if(in_array($field, $this->table_contents['FIELDS']) === FALSE) throw new Exception($field." is not found.");

        // Find the record that the user queried in where
        $user_records = $this->table_contents['RECORDS'];
        $preserved_records = array();
        foreach($where as $field => $value) {
            foreach($this->table_contents['RECORDS'] as $key => $record) {
                if($record[$field] != $value) {
                    unset($user_records[$key]);
                    $preserved_records[$key] = $record;
                }
            }
        }

        // Update whatever needs updating
        $user_records_temp = $user_records;
        foreach($user_records_temp as $key => $record) {
            foreach($update as $field => $value) {
                $user_records[$key][$field] = $value;
            }
        }

        // Merge the preserved records and the records that were updated, then sort them by their record number
        $user_records += $preserved_records;
        ksort($user_records, SORT_NUMERIC);

        // Modify the property of the records and insert the new table
        $this->table_contents['RECORDS'] = $user_records;

        // Implode it so we can save it in a file
        $final_array[] = implode(self::$field_deliemeter, $this->table_contents['FIELDS']);
        foreach($user_records as $record)
            $final_array[] = implode(self::$field_deliemeter, $record);

        // Implode by linebreaks
        $data = implode(self::$linebreak, $final_array);

        // Save the file
        file_put_contents($this->table_name, $data);
    }
}


?>



<?php 


$db = new FlatDB;
$db->openTable('users');
$update = array("Name" => $_POST["name"], "Email" => $_POST["email"], "Phone" => $_POST["phone"], "Membership" => $_POST["membership"]);
$where = array("Email" => $_POST["useremail"]);
$db->updateRecords($update, $where);
?>



<?php
header("Location: admin.php");
exit();
?>