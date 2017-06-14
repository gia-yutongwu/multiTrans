<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
.w3-third img{margin-bottom: -6px; opacity: 0.8; cursor: pointer}
.w3-third img:hover{opacity: 1}
 #txtbox
    {
     font-size:18pt;
     height:420px;
     width:200px;
    }
</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidebar/menu -->

<nav class="w3-sidebar w3-bar-block w3-white w3-animate-left w3-text-grey w3-collapse w3-top w3-center" style="z-index:3;width:300px;font-weight:bold" id="mySidebar"><br>
  <h3 class="w3-padding-64 w3-center"><b>Multi<br>Trans</b></h3>
</nav>


<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-white w3-xlarge w3-padding-16">
  <span class="w3-left w3-padding">Multi Trans</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

  <!-- Push down content on small screens --> 
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  <!-- Photo grid -->
  <div class="w3-row">
    <br>
    <br>
    <br>

    <form action="/translate.php" method="get">
      English: <textarea name="english" cols="40" rows="5"></textarea>
      Chinese: <textarea name="chinese" cols="40" rows="5"></textarea><br>
      French: <textarea name="french" cols="40" rows="5"></textarea>
      German: <textarea name="german" cols="40" rows="5"></textarea><br>
      Spanish: <textarea name="spanish" cols="40" rows="5"></textarea><br><br>
    <input type="submit" value="Translate!">
    </form>
      
   
    <div class="w3-third">
      
    </div>

    <div class="w3-third">
      
    </div>
    
    <div class="w3-third">
      
    </div>
    <br>
    <br>
  </div>

  
  <!-- Modal for full size images on click-->
  <div id="modal01" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display='none'">
    <span class="w3-button w3-black w3-xlarge w3-display-topright">×</span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
      <img id="img01" class="w3-image">
      <p id="caption"></p>
    </div>
  </div>


  <?php
/**
 * Copyright 2016 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
# [START translate_quickstart]
# Includes the autoloader for libraries installed with composer
require __DIR__ . '/vendor/autoload.php';
# Imports the Google Cloud client library
use Google\Cloud\Translate\TranslateClient;

putenv('GOOGLE_APPLICATION_CREDENTIALS=multiTrans-7dd8db520e04.json');
require_once 'google-api-php-client/vendor/autoload.php'; 
$client = new Google_Client();
$client->useApplicationDefaultCredentials();
date_default_timezone_set('America/Los_Angeles');

if ($_GET['english']) {
    trans_en();
}
if ($_GET['chinese']) {
    trans_zh();
}
if ($_GET['german']) {
    trans_de();
}
if ($_GET['french']) {
    trans_fr();
}
if ($_GET['spanish']) {
    trans_es();
}

function trans_en() {
 
  $projectId = 'multitrans-170720';
  $translate = new TranslateClient([
    'projectId' => $projectId
  ]);
  $text = $_GET['english'];
  $target_fr = 'fr';
  $target_de = 'de';
  $target_zh = 'zh';
  $target_es = 'es';
  $trans_fr = $translate->translate($text, [
    'target' => $target_fr
  ]);
  $trans_de = $translate->translate($text, [
    'target' => $target_de
  ]);
  $trans_es = $translate->translate($text, [
    'target' => $target_es
  ]);
  $trans_zh = $translate->translate($text, [
    'target' => $target_zh
  ]);
  echo '<div class="w3-container w3-dark-grey w3-center w3-text-light-grey w3-padding-32" id="about">';
  echo '<div class="w3-content w3-justify" style="max-width:600px">';
  echo '<p> English: '.$text.'</p>';
  echo '<p> French: '.$trans_fr['text'].'</p>';
  echo '<p> Chinese: '.$trans_zh['text'].'</p>';
  echo '<p> German: '.$trans_de['text'].'</p>';
  echo '<p> Spanish: '.$trans_es['text'].'</p>';
  echo '</div></div>';
}

function trans_es() {
 
  $projectId = 'multitrans-170720';
  $translate = new TranslateClient([
    'projectId' => $projectId
  ]);
  $text = $_GET['spanish'];
  $target_fr = 'fr';
  $target_de = 'de';
  $target_zh = 'zh';
  $target_en = 'en';
  $trans_fr = $translate->translate($text, [
    'target' => $target_fr
  ]);
  $trans_de = $translate->translate($text, [
    'target' => $target_de
  ]);
  $trans_en = $translate->translate($text, [
    'target' => $target_en
  ]);
  $trans_zh = $translate->translate($text, [
    'target' => $target_zh
  ]);
  echo '<div class="w3-container w3-dark-grey w3-center w3-text-light-grey w3-padding-32" id="about">';
  echo '<div class="w3-content w3-justify" style="max-width:600px">';
  echo '<p> English: '.$trans_en['text'].'</p>';
  echo '<p> French: '.$trans_fr['text'].'</p>';
  echo '<p> Chinese: '.$trans_zh['text'].'</p>';
  echo '<p> German: '.$trans_de['text'].'</p>';
  echo '<p> Spanish: '.$text.'</p>';
  echo '</div></div>';
}

function trans_de() {
 
  $projectId = 'multitrans-170720';
  $translate = new TranslateClient([
    'projectId' => $projectId
  ]);
  $text = $_GET['german'];
  $target_fr = 'fr';
  $target_es = 'es';
  $target_zh = 'zh';
  $target_en = 'en';
  $trans_fr = $translate->translate($text, [
    'target' => $target_fr
  ]);
  $trans_en = $translate->translate($text, [
    'target' => $target_en
  ]);
  $trans_es = $translate->translate($text, [
    'target' => $target_es
  ]);
  $trans_zh = $translate->translate($text, [
    'target' => $target_zh
  ]);
  echo '<div class="w3-container w3-dark-grey w3-center w3-text-light-grey w3-padding-32" id="about">';
  echo '<div class="w3-content w3-justify" style="max-width:600px">';
  echo '<p> English: '.$trans_en['text'].'</p>';
  echo '<p> French: '.$trans_fr['text'].'</p>';
  echo '<p> Chinese: '.$trans_zh['text'].'</p>';
  echo '<p> German: '.$text.'</p>';
  echo '<p> Spanish: '.$trans_es['text'].'</p>';
  echo '</div></div>';
}

function trans_fr() {
 
  $projectId = 'multitrans-170720';
  $translate = new TranslateClient([
    'projectId' => $projectId
  ]);
  $text = $_GET['french'];
  $target_es = 'es';
  $target_de = 'de';
  $target_zh = 'zh';
  $target_en = 'en';
  $trans_de = $translate->translate($text, [
    'target' => $target_de
  ]);
  $trans_en = $translate->translate($text, [
    'target' => $target_en
  ]);
  $trans_es = $translate->translate($text, [
    'target' => $target_es
  ]);
  $trans_zh = $translate->translate($text, [
    'target' => $target_zh
  ]);
  echo '<div class="w3-container w3-dark-grey w3-center w3-text-light-grey w3-padding-32" id="about">';
  echo '<div class="w3-content w3-justify" style="max-width:600px">';
  echo '<p> English: '.$trans_en['text'].'</p>';
  echo '<p> French: '.$text.'</p>';
  echo '<p> Chinese: '.$trans_zh['text'].'</p>';
  echo '<p> German: '.$trans_de['text'].'</p>';
  echo '<p> Spanish: '.$trans_es['text'].'</p>';
  echo '</div></div>';
}

function trans_zh() {
 
  $projectId = 'multitrans-170720';
  $translate = new TranslateClient([
    'projectId' => $projectId
  ]);
  $text = $_GET['chinese'];
  $target_es = 'es';
  $target_de = 'de';
  $target_fr = 'fr';
  $target_en = 'en';
  $trans_de = $translate->translate($text, [
    'target' => $target_de
  ]);
  $trans_en = $translate->translate($text, [
    'target' => $target_en
  ]);
  $trans_es = $translate->translate($text, [
    'target' => $target_es
  ]);
  $trans_fr = $translate->translate($text, [
    'target' => $target_fr
  ]);
  echo '<div class="w3-container w3-dark-grey w3-center w3-text-light-grey w3-padding-32" id="about">';
  echo '<div class="w3-content w3-justify" style="max-width:600px">';
  echo '<p> English: '.$trans_en['text'].'</p>';
  echo '<p> French: '.$trans_fr['text'].'</p>';
  echo '<p> Chinese: '.$text.'</p>';
  echo '<p> German: '.$trans_de['text'].'</p>';
  echo '<p> Spanish: '.$trans_es['text'].'</p>';
  echo '</div></div>';
}
?>

  <!-- Footer -->
  <footer class="w3-container w3-padding-32 w3-grey">  
    
  </footer>
  
  <div class="w3-black w3-center w3-padding-24">Template from <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity">w3.css</a></div>

<!-- End page content -->

</div>

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}

</script>

</body>
</html>