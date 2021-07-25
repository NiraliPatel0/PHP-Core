<?php
#
# Name: Nirali Patel
#

# send GET request using PHP
$url = 'http://localhost/Nirali/WebService/Rest/student.php';
# set data
$data = array('VIEW' => 'value', 'ID' => 1);

// Use key 'http' even if you send the request to https
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded \r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);

$context  = stream_context_create($options);
# send request
$result = file_get_contents($url, false, $context);
if ($result === FALSE) {
    echo "Not found!";
}

# convert json to array php
$jsonArray = json_decode($result,true);
echo "<h2>Using POST method</h2><ul>";
foreach($jsonArray as $k=>$v){
    echo "<li>".$k." : ".$v."</li>";
}
echo "</ul>";



# send GET request using PHP
$id=2;
$url = "http://localhost/Nirali/WebService/Rest/student.php?VIEW=1&ID=$id";

# send request
$result = file_get_contents($url);
if ($result === FALSE) {
    echo "Not found!";
}

# convert json to array php
$jsonArray = json_decode($result,true);
echo "<h2>Using GET method</h2><ul>";
foreach($jsonArray as $k=>$v){
    echo "<li>".$k." : ".$v."</li>";
}
echo "</ul>";



