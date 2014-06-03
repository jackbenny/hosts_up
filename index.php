<?php
include("htmlblock.html");

// Change the network variable to your network
$network = "192.168.0.0/24";

$hosts = shell_exec("nmap $network -sn");

// Regexp to match any IP-number
preg_match_all("/[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}/", $hosts, 
    $out);

print "<h1>Hosts that are up</h1>\n";
print "<p>\n";

foreach ($out[0] as $i)
{
    print "<a href=\"scan.php?host=$i\">$i</a> <br />\n";
}

print "</p>\n";

?>

</div>

</body>
</html>
