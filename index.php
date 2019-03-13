<?php
 $accessToken = "CwYcqVS3XK9U+VHvq16CWDtVIJZq/xqLdASXGTBuLZ1uUTq54Y8SsqBlY2H0dEjW8Jz+ldrd6yf+rTRJMlXIt2OcBTTlOwKJpnpOXyzyOirRdbFzm+/KrBsNcj32qPnFYgYvq12yD2Jl9d2CLrLUAwdB04t89/1O/w1cDnyilFU=";//copy ข้อความ Channel access token ตอนที่ตั้งค่า
   $content = file_get_contents('php://input');
   $arrayJson = json_decode($content, true);
   $arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {$accessToken}";
   //รับข้อความจากผู้ใช้
   $message = $arrayJson['events'][0]['message']['text'];
   //รับ id ของผู้ใช้
   $id = ["U51dcf76939ded741540ca6463e11a930"];
   #ตัวอย่าง Message Type "Text + Sticker"
   $arrayPostData['to'] = $id;
   if($_POST['action'] == "submit" && isset($_POST['data'])){
   	$result = explode(":", $_POST['data']);
    $arrayPostData['messages'][0]['type'] = "text";
    $arrayPostData['messages'][0]['text'] = "แจ้งเตือนยอดน้องปัจจุบัน \n - น้องทั้งหมด ".$result[0]." คน \n - น้องลาทั้งหมด ".$result[1]." คน \n - น้องคงเหลือ ".$result[2]." คน \n - น้องผู้ชายทั้งหมด ".$result[3]." คน \n - น้องผู้ชายลาทั้งหมด ".$result[4]." คน \n - น้องผู้ชายคงเหลือ ".$result[5]." คน \n - น้องผู้หญิงทั้งหมด ".$result[6]." คน \n - น้องผู้หญิงลาทั้งหมด ".$result[7]." คน \n - น้องผู้หญิงคงเหลือ ".$result[8]." คน";
   }
   $arrayPostData['messages'][1]['type'] = "text";
    $arrayPostData['messages'][1]['text'] = "แจ้งเตือนยอดน้องผู้ชายปัจจุบัน \n - น้องผู้ชายทั้งหมด ".$result[3]." คน \n - น้องผู้ชายลาทั้งหมด ".$result[4]." คน \n - น้องผู้ชายคงเหลือ ".$result[5]." คน";
   }
   $arrayPostData['messages'][2]['type'] = "text";
    $arrayPostData['messages'][2]['text'] = "แจ้งเตือนยอดน้องผู้หญิงปัจจุบัน \n - น้องผู้หญิงทั้งหมด ".$result[6]." คน \n - น้องผู้หญิงลาทั้งหมด ".$result[7]." คน \n - น้องผู้หญิงคงเหลือ ".$result[8]." คน";
   }
   pushMsg($arrayHeader,$arrayPostData);
  
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
   exit;  
?>
