<?php

// Note :: Cookies store on User's Current Browser

// =>to create cookie setcookie('cookiename','value')
// =>to read cookie ,it comes with array method so we use pre and print_r $_COOKIES['cookiename']
// =>to delete cookie, setcookie('cookiename','value',time()-3600);
// =>Syntax (Note :: gone after browser end)
// setcookie('cookiename','value',expire);
// setcookie('cookiename','value',expire,path);


// echo time();

// echo "<br/>";
//             //  s m hr day
// echo time()+60*60*24*2; //2 day

// echo "<br/>";

// echo time()+(86400*2); //2day

?>
<!DOCTYPE html>
<html>
 <head>
    <title>Cookies</title>
 </head>
 <body>
    <ul>
        <li><a href="./l55cookiesset.php" target="_blank" >Set Cookies</a></li>
        <li><a href="./l55cookiesread.php" target="_blank" >Read Cookies</a></li>
        <li><a href="./l55cookiesdelete.php" target="_blank" >Delete Cookies</a></li>
        <li><a href="./l55cookieslesson/l55cookiesset2.php" target="_blank" >Set Cookies 2</a></li>
    </ul>
 </body>
</html>