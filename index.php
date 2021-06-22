

<form>
    <input type = "text" name = "name">
    <input type = "text" name = "text">
    <input type = "submit">
</form>
<?php

class user{

    public $name;
    public $age;
    public $sql;
    public $text;


    public function __construct(string $name,int $age,string $text,$sql )
    {
        $this ->name = $name;
        $this ->age = $age; 
        $this ->text = $text ;
        
        $this ->sql = $sql ;
        $sql = mysqli_connect("localhost:3306", "root", "root","chat_bd");

        if ($sql == false){
            echo("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
        }
        
        $str = "INSERT INTO `db` (`name`, `text`) VALUES ('$name', '$text');";
        
        $result = mysqli_query($sql, $str);
        
        $data =  mysqli_query($sql,"SELECT * FROM `db`");
        while ($row = mysqli_fetch_array($data)){
            echo($row['name'].': '.$row['text'] ." <br>");
        }
        
            
        
    }
    
    
}








$name = $_GET["name"];
$text = $_GET["text"];

if (strlen($name)>0){

    $user = new user($name,1,$text,"1");
    

}



?>
