<?php error_reporting(0); ?>

<?php
class Report
{
    private $conn;
    function __construct() {
    $servername = "localhost";
    $dbname = "oms_db";
    $username = "root";
    $password = "";
  

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
       }else{
        $this->conn=$conn;  
       }

    }


    public function report_list(){
        
       $sql = "SELECT * FROM reports ORDER BY rep_id asc ";
       $result=  $this->conn->query($sql);
       return $result;  
    }
    
    public function create_report_info($post_data=array()){
         
       if(isset($post_data['create_report'])){
       $rep_name= mysqli_real_escape_string($this->conn,trim($post_data['rep_name']));
       $rep_author= mysqli_real_escape_string($this->conn,trim($post_data['rep_author']));
       $rep_type= mysqli_real_escape_string($this->conn,trim($post_data['rep_type']));
       $rep_date= mysqli_real_escape_string($this->conn,trim($post_data['rep_date']));

       $sql="INSERT INTO reports (rep_name, rep_author, rep_type, rep_date) VALUES ('$rep_name', '$rep_author','$rep_type','$rep_date')";
        
        $result=  $this->conn->query($sql);
        
           if($result){
 
              echo "<script type='text/javascript'>alert('Created successfully!')</script>";
              header('Location: reports.php');
			
           }
          
       unset($post_data['create_report']);
	    
       }
    
        
    }
    
    public function view_report_by_rep_id($id){
       if(isset($id)){
       $rep_id= mysqli_real_escape_string($this->conn,trim($id));
      
       $sql="Select * from reports where rep_id='$rep_id'";
        
       $result=  $this->conn->query($sql);
     
        return $result->fetch_assoc(); 
    
       }  
	   
    }
    

    
    public function delete_report_info_by_id($id){
        
       if(isset($id)){
       $rep_id= mysqli_real_escape_string($this->conn,trim($id));

       $sql="DELETE FROM  reports  WHERE rep_id =$rep_id";
        $result=  $this->conn->query($sql);
        
           if($result){
               $_SESSION['message']="Successfully Deleted Report Info";
            
           }
       }
         header('Location: ./index.php?page=reports'); 
    }
    function __destruct() {
    mysqli_close($this->conn);  
    }
    
}

?>