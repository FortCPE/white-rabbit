<?php
//mysql://b379b46b1d3faf:3fd19d7d@us-cdbr-iron-east-03.cleardb.net/heroku_765e6206795ae96?reconnect=true
 $accessToken = "CwYcqVS3XK9U+VHvq16CWDtVIJZq/xqLdASXGTBuLZ1uUTq54Y8SsqBlY2H0dEjW8Jz+ldrd6yf+rTRJMlXIt2OcBTTlOwKJpnpOXyzyOirRdbFzm+/KrBsNcj32qPnFYgYvq12yD2Jl9d2CLrLUAwdB04t89/1O/w1cDnyilFU=";//copy ข้อความ Channel access token ตอนที่ตั้งค่า
   $content = file_get_contents('php://input');
   $arrayJson = json_decode($content, true);
   $arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {$accessToken}";
   //รับข้อความจากผู้ใช้
   $message = $arrayJson['events'][0]['message']['text'];
   $server = 'us-cdbr-iron-east-03.cleardb.net';
   $username = 'b379b46b1d3faf';
   $password = '3fd19d7d';
   $db = 'heroku_765e6206795ae96';
   $pdo = new PDO("mysql:host=$server;dbname=$db", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); 
   if(strpos($message, "ขอยอดน้องทั้งหมด") !== false){
      if(isset($arrayJson['events'][0]['source']['groupId'])){
         $id = $arrayJson['events'][0]['source']['groupId'];
         $arrayPostData['to'] = $id;
         $post = [
           'submit' => true
         ];
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, 'https://registrar.2bkmutt.com/core/get_info.php');
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
         $response = curl_exec($ch);
         $result = explode(":", $response);
         $arrayPostData['messages'][0]['type'] = "text";
         $arrayPostData['messages'][0]['text'] = "แจ้งเตือนยอดน้องปัจจุบัน \n - น้องทั้งหมด ".$result[0]." คน \n - น้องลาทั้งหมด ".$result[1]." คน \n - น้องคงเหลือ ".$result[2]." คน";
         $arrayPostData['messages'][1]['type'] = "text";
         $arrayPostData['messages'][1]['text'] = "ยอดน้องผู้ชายปัจจุบัน \n - น้องผู้ชายทั้งหมด ".$result[3]." คน \n - น้องผู้ชายลาทั้งหมด ".$result[4]." คน \n - น้องผู้ชายคงเหลือ ".$result[5]." คน";
         $arrayPostData['messages'][2]['type'] = "text";
         $arrayPostData['messages'][2]['text'] = "ยอดน้องผู้หญิงปัจจุบัน \n - น้องผู้หญิงทั้งหมด ".$result[6]." คน \n - น้องผู้หญิงลาทั้งหมด ".$result[7]." คน \n - น้องผู้หญิงคงเหลือ ".$result[8]." คน";
         
         replyMsg($arrayHeader,$arrayPostData);
      }else{
         $id = $arrayJson['events'][0]['source']['userId'];
         $arrayPostData['to'] = $id;
         $post = [
           'submit' => true
         ];
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, 'https://registrar.2bkmutt.com/core/get_info.php');
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
         $response = curl_exec($ch);
         $result = explode(":", $response);
         $arrayPostData['messages'][0]['type'] = "text";
         $arrayPostData['messages'][0]['text'] = "แจ้งเตือนยอดน้องปัจจุบัน \n - น้องทั้งหมด ".$result[0]." คน \n - น้องลาทั้งหมด ".$result[1]." คน \n - น้องคงเหลือ ".$result[2]." คน";
         $arrayPostData['messages'][1]['type'] = "text";
         $arrayPostData['messages'][1]['text'] = "ยอดน้องผู้ชายปัจจุบัน \n - น้องผู้ชายทั้งหมด ".$result[3]." คน \n - น้องผู้ชายลาทั้งหมด ".$result[4]." คน \n - น้องผู้ชายคงเหลือ ".$result[5]." คน";
         $arrayPostData['messages'][2]['type'] = "text";
         $arrayPostData['messages'][2]['text'] = "ยอดน้องผู้หญิงปัจจุบัน \n - น้องผู้หญิงทั้งหมด ".$result[6]." คน \n - น้องผู้หญิงลาทั้งหมด ".$result[7]." คน \n - น้องผู้หญิงคงเหลือ ".$result[8]." คน";
         
         replyMsg($arrayHeader,$arrayPostData);
      }
   }else if(strpos($message, "ขอยอดน้อง sec1") !== false){
      if(isset($arrayJson['events'][0]['source']['groupId'])){
         $id = $arrayJson['events'][0]['source']['groupId'];
         $arrayPostData['to'] = $id;
         $post = [
           'submit' => true
         ];
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, 'https://registrar.2bkmutt.com/core/get_info.php');
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
         $response = curl_exec($ch);
         $result = explode(":", $response);
         $arrayPostData['messages'][0]['type'] = "text";
         $arrayPostData['messages'][0]['text'] = "ยอดน้อง SEC 1 \n - ยอดน้องทั้งหมด ".$result[9]." คน \n - ยอดน้องลา ".$result[10]." คน \n - น้องคงเหลือ ".$result[11]." คน";
         $arrayPostData['messages'][1]['type'] = "text";
         $arrayPostData['messages'][1]['text'] = "ยอดน้องผู้ชายปัจจุบัน \n - น้องผู้ชายทั้งหมด ".$result[12]." คน \n - น้องผู้ชายลาทั้งหมด ".$result[13]." คน \n - น้องผู้ชายคงเหลือ ".$result[14]." คน";
         $arrayPostData['messages'][2]['type'] = "text";
         $arrayPostData['messages'][2]['text'] = "ยอดน้องผู้หญิงปัจจุบัน \n - น้องผู้หญิงทั้งหมด ".$result[15]." คน \n - น้องผู้หญิงลาทั้งหมด ".$result[16]." คน \n - น้องผู้หญิงคงเหลือ ".$result[17]." คน";
         replyMsg($arrayHeader,$arrayPostData);
      }else{
         $id = $arrayJson['events'][0]['source']['userId'];
         $arrayPostData['to'] = $id;
         $post = [
           'submit' => true
         ];
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, 'https://registrar.2bkmutt.com/core/get_info.php');
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
         $response = curl_exec($ch);
         $result = explode(":", $response);
         $arrayPostData['messages'][0]['type'] = "text";
         $arrayPostData['messages'][0]['text'] = "ยอดน้อง SEC 1 \n - ยอดน้องทั้งหมด ".$result[9]." คน \n - ยอดน้องลา ".$result[10]." คน \n - น้องคงเหลือ ".$result[11]." คน";
         $arrayPostData['messages'][1]['type'] = "text";
         $arrayPostData['messages'][1]['text'] = "ยอดน้องผู้ชายปัจจุบัน \n - น้องผู้ชายทั้งหมด ".$result[12]." คน \n - น้องผู้ชายลาทั้งหมด ".$result[13]." คน \n - น้องผู้ชายคงเหลือ ".$result[14]." คน";
         $arrayPostData['messages'][2]['type'] = "text";
         $arrayPostData['messages'][2]['text'] = "ยอดน้องผู้หญิงปัจจุบัน \n - น้องผู้หญิงทั้งหมด ".$result[15]." คน \n - น้องผู้หญิงลาทั้งหมด ".$result[16]." คน \n - น้องผู้หญิงคงเหลือ ".$result[17]." คน";
         replyMsg($arrayHeader,$arrayPostData);
      }
   }else if(strpos($message, "ขอยอดน้อง sec2") !== false){
      if(isset($arrayJson['events'][0]['source']['groupId'])){
         $id = $arrayJson['events'][0]['source']['groupId'];
         $arrayPostData['to'] = $id;
         $post = [
           'submit' => true
         ];
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, 'https://registrar.2bkmutt.com/core/get_info.php');
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
         $response = curl_exec($ch);
         $result = explode(":", $response);
         $arrayPostData['messages'][0]['type'] = "text";
         $arrayPostData['messages'][0]['text'] = "ยอดน้อง SEC 2 \n - ยอดน้องทั้งหมด ".$result[18]." คน \n - ยอดน้องลา ".$result[19]." คน \n - น้องคงเหลือ ".$result[20]." คน";
         $arrayPostData['messages'][1]['type'] = "text";
         $arrayPostData['messages'][1]['text'] = "ยอดน้องผู้ชายปัจจุบัน \n - น้องผู้ชายทั้งหมด ".$result[21]." คน \n - น้องผู้ชายลาทั้งหมด ".$result[22]." คน \n - น้องผู้ชายคงเหลือ ".$result[23]." คน";
         $arrayPostData['messages'][2]['type'] = "text";
         $arrayPostData['messages'][2]['text'] = "ยอดน้องผู้หญิงปัจจุบัน \n - น้องผู้หญิงทั้งหมด ".$result[24]." คน \n - น้องผู้หญิงลาทั้งหมด ".$result[25]." คน \n - น้องผู้หญิงคงเหลือ ".$result[26]." คน";
         replyMsg($arrayHeader,$arrayPostData);
      }else{
         $id = $arrayJson['events'][0]['source']['userId'];
         $arrayPostData['to'] = $id;
         $post = [
           'submit' => true
         ];
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, 'https://registrar.2bkmutt.com/core/get_info.php');
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
         $response = curl_exec($ch);
         $result = explode(":", $response);
         $arrayPostData['messages'][0]['type'] = "text";
         $arrayPostData['messages'][0]['text'] = "ยอดน้อง SEC 2 \n - ยอดน้องทั้งหมด ".$result[18]." คน \n - ยอดน้องลา ".$result[19]." คน \n - น้องคงเหลือ ".$result[20]." คน";
         $arrayPostData['messages'][1]['type'] = "text";
         $arrayPostData['messages'][1]['text'] = "ยอดน้องผู้ชายปัจจุบัน \n - น้องผู้ชายทั้งหมด ".$result[21]." คน \n - น้องผู้ชายลาทั้งหมด ".$result[22]." คน \n - น้องผู้ชายคงเหลือ ".$result[23]." คน";
         $arrayPostData['messages'][2]['type'] = "text";
         $arrayPostData['messages'][2]['text'] = "ยอดน้องผู้หญิงปัจจุบัน \n - น้องผู้หญิงทั้งหมด ".$result[24]." คน \n - น้องผู้หญิงลาทั้งหมด ".$result[25]." คน \n - น้องผู้หญิงคงเหลือ ".$result[26]." คน";
         replyMsg($arrayHeader,$arrayPostData);
      }
   }else if(strpos($message, "ผูกบัญชี") !== false){
      $id = $arrayJson['events'][0]['source']['userId'];
      $arrayPostData['to'] = $id;
      $check_connection = $pdo->prepare("SELECT * FROM user_id WHERE user_id = :user_id");
      $check_connection->execute(Array(
         ":user_id" => $id
      ));
      $row_connection = $check_connection->rowCount();
      if($row_connection >= 1):
         $arrayPostData['messages'][0]['type'] = "text";
         $arrayPostData['messages'][0]['text'] = "[System] ผูกบัญชีไปแล้วนะ ลืมหรอ อิอิ";
          replyMsg($arrayHeader,$arrayPostData);
      else:
         $query_connection = $pdo->prepare("INSERT INTO `user_id` (`id`, `user_id`) VALUES (:id, :user_id);");
         $result = $query_connection->execute(Array(
            ":id" => NULL,
            ":user_id" => $id
         ));
         if($result):
            $arrayPostData['messages'][0]['type'] = "text";
            $arrayPostData['messages'][0]['text'] = "[System] ผูกบัญชีแล้วจ้า รอรับการแจ้งเตือนได้เลย";
            $arrayPostData['messages'][1]['type'] = "sticker";
            $arrayPostData['messages'][1]['packageId'] = "2";
            $arrayPostData['messages'][1]['stickerId'] = "34";
         else:
            $arrayPostData['messages'][0]['type'] = "text";
            $arrayPostData['messages'][0]['text'] = "[System] ไม่สามารถผูกบัญชีได้ กรุณาลองใหม่";
            $arrayPostData['messages'][1]['type'] = "sticker";
            $arrayPostData['messages'][1]['packageId'] = "2";
            $arrayPostData['messages'][1]['stickerId'] = "34";
         endif;
         replyMsg($arrayHeader,$arrayPostData);
      endif;
   }else if($message == "@id"){
      $id = $arrayJson['events'][0]['source']['userId'];
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = $id;
      replyMsg($arrayHeader,$arrayPostData);
   }
   if($_POST['action'] == "submit" && isset($_POST['data'])){
      $query_connection = $pdo->prepare("SELECT user_id FROM user_id");
      $query_connection->execute();
      $id = [];
      while($fetch_connection = $query_connection->fetch(PDO::FETCH_ASSOC)){
         array_push($id, $fetch_connection['user_id']);
      }
      #ตัวอย่าง Message Type "Text + Sticker"
      $arrayPostData['to'] = $id;
      $result = explode(":", $_POST['data']);
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "แจ้งเตือนยอดน้องปัจจุบัน \n - น้องทั้งหมด ".$result[0]." คน \n - น้องลาทั้งหมด ".$result[1]." คน \n - น้องคงเหลือ ".$result[2]." คน";
      $arrayPostData['messages'][1]['type'] = "text";
      $arrayPostData['messages'][1]['text'] = "ยอดน้องผู้ชายปัจจุบัน \n - น้องผู้ชายทั้งหมด ".$result[3]." คน \n - น้องผู้ชายลาทั้งหมด ".$result[4]." คน \n - น้องผู้ชายคงเหลือ ".$result[5]." คน";
      $arrayPostData['messages'][2]['type'] = "text";
      $arrayPostData['messages'][2]['text'] = "ยอดน้องผู้หญิงปัจจุบัน \n - น้องผู้หญิงทั้งหมด ".$result[6]." คน \n - น้องผู้หญิงลาทั้งหมด ".$result[7]." คน \n - น้องผู้หญิงคงเหลือ ".$result[8]." คน";      
      pushMsg($arrayHeader,$arrayPostData);
   }
  
   function pushMsg($arrayHeader,$arrayPostData){
      $strUrl = "https://api.line.me/v2/bot/message/multicast";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$strUrl);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($ch);
      curl_close ($ch);
   }
   function replyMsg($arrayHeader,$arrayPostData){
      $strUrl = "https://api.line.me/v2/bot/message/push";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$strUrl);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($ch);
      curl_close ($ch);
   }
   exit;  
?>
