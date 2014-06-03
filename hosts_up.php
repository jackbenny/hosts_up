<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="HostsUp" />
<meta name="author" content="Jack-Benny Persson" />

<link rel="stylesheet" type="text/css" href="hosts_up.css" title="HostsUp"/>
<title>HostsUp</title>
</head>

<body>

<div id = "middle">

<?php
$network = "192.168.0.0/24";

$hosts = shell_exec("nmap $network -sn");

/* Match any IP-number
    [0-9] = all digits from 0-9
    {1,3} = one, two or three digits
    \. = a dot
    Hence, 0-9 one, two or three time, a dot, and then all over again
*/
preg_match_all("/[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}/", $hosts, 
    $out);

print "<h1>Hosts that are up</h1>\n";
print "<p>\n";

foreach ($out[0] as $i)
{
    print $i . "<br />\n";
}

print "</p>\n";

?>

</div>

</body>
</html>
