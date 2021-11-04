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
    ** This method deletes records from a table
    ** 
    ** @param   array   $where  an array which has field => value combinations which is the criteria
    **
    ** @example
    ** $db = new FlatDB;
    ** $db->openTable('Test.csv');
    ** $where = array("group_id" => 3);
    ** $db->deleteRecords($where);
    **/
    public function deleteRecords($where) {
        if(is_array($where) === FALSE) throw new Exception('The argument must be an array');
        if(empty($this->table_name) === TRUE) throw new Exception('You need to open a connection to a database first.');

        // Check if each field in insert is found
        foreach($where as $field => $value) 
            if(in_array($field, $this->table_contents['FIELDS']) === FALSE) throw new Exception($field." is not found.");

        // Find the records that match and delete them
        $records = $this->table_contents['RECORDS'];
        foreach($records as $key => $record) {
            foreach($where as $field => $value) {
                if($record[$field] == $value) unset($records[$key]);
            }
        }

        // Save the records in the property
        $this->table_contents['RECORDS'] = $records;

        // Format it for saving
        $data = array();
        $data[] = implode(self::$field_deliemeter, $this->table_contents['FIELDS']);

        foreach($records as $record)
            $data[] = implode(self::$field_deliemeter, $record);

        // Implode by linebreaks
        $data = implode(self::$linebreak, $data);           

        // Save the file
        file_put_contents($this->table_name, $data);
    }

}


?>



<?php 

$db = new FlatDB;
$db->openTable('users');
$where = array("Email" => $_POST["email"]);
$db->deleteRecords($where);

?>



<?php
header("Location: admin.php");
exit();
?>