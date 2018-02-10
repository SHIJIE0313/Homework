<? php$url = "http://komunitasweb.com/";  
if (preg_match('/^(http|https|ftp)://([A-Z0-9][A-Z0-9_-]*(?:.[A-Z0-9][A-Z0-9_-]*)+):?(d+)?/?/i', $url)) {  
    echo "Your url is ok.";  
} else {  
    echo "Wrong url.";  
} 
?>
// 检验一个域名是否正确