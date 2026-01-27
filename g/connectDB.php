<?php
#ตัวแปรข้อมมูล
                $host ="localhost";  
                $user = "root";
                $pwd = "";
                $DB = "4083db"; 
                #เชื่อมต่อฐานข้อมูล
                $conn = mysqli_connect($host,$user,$pwd,$DB) or die ("เชื่อมต่อฐานข้อมูลไม่ได้");
                mysqli_query($conn, "SET NAMES utf8");
?>