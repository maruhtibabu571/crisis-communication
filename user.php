include('config.php');
    $conn =  mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD,DB_NAME) or die("Unable to connect to MySQL");
    //0: temperature
    //1: humidity
    //2: pressure
    //3: light

    if (mysqli_real_escape_string($conn,$_POST['temperature']) ==NULL ||mysqli_real_escape_string($conn,$_POST['temperature']) ==NAN){
        $temperature="NULL";
    }else{
        $temperature=mysqli_real_escape_string($conn,$_POST['temperature']);
    }
    if (mysqli_real_escape_string($conn,$_POST['humidity']) ==NULL){
        $humidity="NULL";
    }else{
        $humidity=mysqli_real_escape_string($conn,$_POST['humidity']);
    }
    if (mysqli_real_escape_string($conn,$_POST['pressure']) ==NULL){
        $pressure="NULL";
    }else{
        $pressure=mysqli_real_escape_string($conn,$_POST['pressure']);
    }
    if (mysqli_real_escape_string($conn,$_POST['light']) ==NULL){
        $light="NULL";
    }else{
        $light=mysqli_real_escape_string($conn,$_POST['light']);
    }
    $logdate= date("Y-m-d H:i:s");

    $insertSQL="INSERT into ".TB_ENV." (logdate,temperature,humidity,pressure,light) values ('".$logdate."',".$temperature.",".$humidity.",".$pressure.",".$light.")";
    mysqli_query($conn,$insertSQL) or die("INSERT Query has Failed - ".$insertSQL );
