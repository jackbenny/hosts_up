<?php
include("htmlblock.html");

// Change the network variable to your network
$network = "192.168.0.0/24";

$hosts = shell_exec("nmap $network -sn");

// Regexp to match any IP-number
preg_match_all("/[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}/", $hosts, 
    $ip);

// Match hostnames (only the host part, up to the first dot)
preg_match_all("/(?<=for\s)([a-z]*)/", $hosts, $name);


print "<h1>Hosts that are up</h1>\n";
print "<p>\n";

$counter = 0;
foreach ($ip[0] as $i)
{
    print "<a href=\"scan.php?host=$i\">$i</a>&emsp;" . $name["0"]["$counter"] . 
    "<br />\n";
    $counter++;
}

print "</p>\n";
?>

</div>
</body>
</html>
