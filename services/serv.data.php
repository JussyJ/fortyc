<?php require_once 'serv.db.php';

    function callsp($spcall){
        $db = new Database();
        $myconn = $db->connsp();

        $dbh = new mysqli($myconn['host'], $myconn['username'], $myconn['password'], $myconn['db']);
        $dbh->set_charset("utf8");
        if (mysqli_connect_errno()) {
           printf("Connect failed: %s\n", mysqli_connect_error());
           exit();
        }
        if ($result_set = $dbh->query($spcall))
        {
           while($row=$result_set->fetch_object())
           {
                $data[] = $row;
           }
        }
        else
        {
           printf("<p>Error retrieving stored procedure result set:%d (%s) %s\n",
                  mysqli_errno($dbh),mysqli_sqlstate($dbh),mysqli_error($dbh));
           $dbh->close();
           exit();
        }  
        return array('count'=> count($data), 'object'=>$data);

        $result_set->close();
        $dbh->close();
    }

     echo json_encode(callsp(stripslashes($_GET['spcall'])));

    // if (isset($_GET['function'])) {
    //     switch ($_GET['function']) {
    //         case 'callsp':
    //             echo json_encode(callsp($_GET['spcall']));
    //             break;
    //         // case 'getTime':
    //         //     echo getTime();
    //         //     break;
    //         default:
    //             echo "Invalid function";
    //             break;
    //     }
    // }


?>