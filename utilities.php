<?php

function alertAndWaitTo($msg, $url, $time){
echo "<script>
        alert(\"$msg\");
        setTimeout(function() {
        window.location.href = \"$url\";
        }, $time);
    </script>";
}

function alertAndGoTo($msg, $url){
echo "<script>
        alert(\"$msg\");
        window.location.href = \"$url\";
    </script>";
}

function alertAndBack($msg){
echo "<script>
        alert(\"$msg\");
        window.history.back();
    </script>";
}

function alertAndClickBack($msg){
echo "
    <style>
        button{
            padding: 8px;
            padding-left: 16px;
            padding-right: 16px;
            background-color: white;
            color: ;
            border-radius: 4px;
            border:;
        }
    </style>
    <button onclick =\"goBack()\">回上一頁</button>
    <script>
        alert(\"$msg\");
        function goBack(){
            window.history.back();
        }
        
    </script>";
}

function replaceScript($input){
$input = str_replace("<script>", "[script]", $input);
$input = str_replace("</script>", "[/script]", $input);
return $input;
}
