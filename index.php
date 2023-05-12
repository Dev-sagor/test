<?php
require_once ('functions.php');
$task='encode';
if(isset($_GET['task']) && $_GET['task'] != ''){
   $task= $_GET['task'];
}
$key='abcdefghijklmnopqrstuvwxyz0123456789';
if('key' == $task){
   $originalKey=str_split($key);
   shuffle($originalKey);
   $key=join('', $originalKey);
}else if(isset($_POST['key']) && $_POST['key'] != ''){
   $key=$_POST['key'];
}
$scremblerData='';
if('encode' == $task){
   $data=$_POST['data'] ?? '';
   if($data != ''){
      $scremblerData=scremblerf($data, $key);
   }
}
if('decode' == $task){
   $data=$_POST['data'] ?? '';
   if($data != ''){
      $scremblerData=decodeData($data, $key);
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="styles.css">
   <title>Document</title>
</head>
<body>
   <div class="container">
   <div class="main">
      <div class="row">
         <div class="para">
          <h1>Data Scrembler!</h1>
            <p class="descipiton">Data scrembler is a funtion, that's scremble your text under a key and make unreadble from others user. But if the user this cretain key then he/she can it decode and can get actual data.<br>
            <span>Created by <span style="color:red; font-weight:900;">DEVELOPER SAGOR</span>, professional web developer and E-Commerce expert.</span>
            </p>
         </div

         <p class="nav-cls">
            <a class="left" href="/test?task=decode">Decode</a>
            <a class="middle" href="/test?task=encode">Encode</a>
            <a class="right" href="/test?task=key">Generate A Key</a>
         </p>

            <form method="POST" action="index.php<?php if('decode' == $task){echo '?task=decode';} ?>">
               <label for="key">Generate A Key:-</label>
                  <input type="text" name="key" id="key"<?php displayKey($key); ?>>
               <label for="data">Input Your Data:-</label>
                  <textarea name="data" id="data" cols="20" rows="3"><?php if(isset($_POST['data'])){echo $_POST['data'];} ?></textarea>
               <label for="result">Result:-</label>
                  <textarea name="result" id="result" cols="20" rows="3"><?php echo $scremblerData; ?></textarea>
               <input type="submit" name="submit" value="SUBMIT">
         </form>
      </div>
   </div>
   </div>
</body>
</html>