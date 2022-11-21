<?php
function sayhello($name = "guest"){
    echo "Hi ".$name;
    echo "<br>Hello<br>";
}
function calcbmi($n,$w,$h){
    $bmi=$w/($h*$h);
    if ($bmi>) {
        echo "<br>".$n."'s BMI = ".$bmi."<br>";
    }
    
}
sayhello();
sayhello("hari");
calcbmi("hari","60","6");
?>