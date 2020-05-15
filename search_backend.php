<?php SESSION_START();
require 'connect.php';
require 'connect_b.php';
if(isset($_POST['search'])){
    $search_word ="ค้นหารายการจากรหัสหรือชื่อครุภัณฑ์: ";
    $search_word .= $_POST['searchtxt']." ";
    if($_POST['rm']!=""){
        $rm = $_POST['rm'];
        $search_word .= "ห้องที่จัดเก็บ: ".$rm." ";   
    }
    $content = $search_word;
    echo $content;
    exit();
}

if(isset($_POST['new'])){
    $content = "<form class='searchbox'>
    <div class='form__group'>
    <input type='text' class='form__input' id='searchtxt' placeholder='รหัสครุภัณฑ์/ชื่อครุภัณฑ์' />
    <label style='text-align:center' for='name' class='form__label'>รหัสครุภัณฑ์/ชื่อครุภัณฑ์</label>
    </div>
    <br>
    <center>
    <table  class='select_layout'>
    <tr>
        <td class='tdsp'>
            <div class='select'>
                <select name='format' id = 'gm'>
                <option placeholder='' value=''>วิธีที่ได้รับมา</option>";
               
                        $sql = 'SELECT * FROM getmethod ';
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                        $content.= "<option value=".$row['method'].">".$row['method']."</option>";
                        }     }
               
             $content.=   "</select>
            </div>
        </td>
        <td class='tdsp'>
            <div class='select'>
                <select name='rm' id = 'rm'>
                <option placeholder='' value=''>ห้องที่จัดเก็บครุภัณฑ์</option>";
                     $sql = 'SELECT * FROM room ';
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    $content.= "<option value=".$row['room_ID']." >".$row['room']."</option>";
                    }     } 

               $content.=" </select>
            </div>
        </td>
        <td class='tdsp'>
            <div class='select'>
                <select name='format' id ='tp'>
                <option placeholder='' value=''>ประเภทของครุภัณฑ์</option>";
                    $sql = 'SELECT * FROM assettype ';
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    $content.= "<option value=".$row['asset_type_ID'].">".$row['asset_type_name']."</option>";
                    }     }
                $content .= "</select>
            </div>
        </td>
    </tr>
    <tr>
        <td class='tdsp'>
            <div class='select'>
                <select name='format' id ='stt'>
                <option placeholder='' value=''>สถานะการใช้งาน</option>";
                     $sql = 'SELECT * FROM assetstat ';
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    $content .= "<option value=".$row['asset_stat_ID'].">".$row['asset_stat_name']."</option>";
                    }     }         
                $content .="</select>
            </div>
        </td>
        <td class='tdsp'>
            <div class='select'>
                <select name='format' id = 'dstt'>
                <option placeholder='' value=''>ลักษณะการติดตั้ง</option>";
                        
                            $sql = 'SELECT * FROM deploy_stat ';
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                            $content.=  "<option value=".$row['dstat_ID'].">".$row['dstat']."</option>";
                            }     }
                       
               $content .= "</select>
            </div>
        </td>
        <td class='tdsp'>
            <div class='select'>
                <select name='format' id ='rp'>
                <option placeholder='' value=''>ผู้รับผิดชอบ</option>";
                    
                        $sql = 'SELECT * FROM respon_per ';
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                        $content.= "<option value=".$row['resper_ID'].">".$row['resper_firstname']." ".$row['resper_lastname']."</option>";
                        }     }
                   
               $content .="</select>
            </div>
        </td>
    </tr>
    </table>
    <table style='text-align:center'>
        <tr>
            <th><button type='button' class='btns first' id = 'search_button'>ค้นหา</button></th>
        </tr>
    </table>
    <p id = 'testq'>dasafs</p>
    </center>
    </form>";
    echo $content;
    exit();
}
?>