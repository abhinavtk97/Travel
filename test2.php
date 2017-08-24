<html>
<?php
$dbc=mysqli_connect("localhost","root","","moz") or die('could not connect to database.');
    //$dbc=mysqli_connect(DB_HOST2325,DB_USER2325,DB_PASSWORD2325,DB_NAME2325) or die('could not connect to database.');

    try{
        $handler = new PDO("mysql:host=127.0.0.1;dbname=moz;charset=utf8", "root", "");
        $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
    $i=0;
    ini_set('max_execution_time', 0);

    $query="SELECT * FROM our_travel";  //Getting details of registered users.
$data=mysqli_query($dbc,$query);
$nick_present=array();
while($row=mysqli_fetch_array($data))
{
    array_push($nick_present,$row['nick']);
}

$query="SELECT nick FROM main_leader_travel"; //Adding nicknames from leaderboard to check for pre-usage
$data=mysqli_query($dbc,$query);
$nick_present_main=array();
while($row=mysqli_fetch_array($data))
{
    array_push($nick_present_main,$row['nick']);
}

$flag=0; $i=-1; $global=0; $name=''; $query_names='';

ini_set("allow_url_fopen", 1);
    $k=0;
    $j=0;
    $s=100;
while($j<=$s)
{
$json = file_get_contents('https://location-leaderboard.services.mozilla.com/api/v1/leaders/country/IN/?offset='.$k.'');
$arr = json_decode($json);
//    print_r($arr);
     $l= $arr->count;
    echo $l;
    $s=$l/10;
   $i=0;
    if($k==20){
        $k=30;
        $j=$j+1;
        continue;
    }
    //echo 'https://location-leaderboard.services.mozilla.com/api/v1/leaders/country/IN/?offset='.$k.'';
    // echo $arr->results[$i]->name;
//echo $obj->access_token;

while($i<10)
{
    //echo $arr->results[$i]->name;
    //echo $arr->results[$i]->uid;
    //echo $arr->results[$i]->observations;
    //echo $arr->results[$i]->rank;
    if($arr){
       // var_dump($arr->results[$i]->name);
    $name=$arr->results[$i]->name;
    $uid=$arr->results[$i]->uid;
    $obs=$arr->results[$i]->observations;
    $rank=$arr->results[$i]->rank;
    $i=$i+1;

        if(in_array($name,$nick_present)){

            $query='UPDATE our_travel SET score="'.$obs.'", globalrank="'.$rank.'" WHERE nick="'.$name.'";';
            mysqli_query($dbc,$query);
        }
        if(!in_array($name,$nick_present_main))
            {
                $query_names='INSERT INTO `main_leader_travel`(`nick`) VALUES ("'.$name.'");';
                mysqli_query($dbc,$query_names);
            }


//    echo $name. " added<br>";
//        $result = $handler->prepare("INSERT INTO our_travel VALUES (:name, NULL, :score, NULL, NULL, NULL, NULL, :glrank)");
//            $result->bindParam(":name", $name);
//                    $result->bindParam(":score", $obs);
//
//                    $result->bindParam(":glrank", $rank);
//
//            $result->execute();
    }



 //////////////////////////
//$query="INSERT INTO our_travel ('nick','score','globalrank') VALUES ('$name',$obs,$rank)";
//(SELECT * FROM `main_leader_travel`
//WHERE `nick`="'.$name.'");';
//mysqli_query($dbc,$query);

//////////////



}
    $k=$k+10;
    $j=$j+1;
}
    mysqli_close($dbc);

?>
</html>
