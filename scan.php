<?php
include("htmlblock.html");

print "<h1>Open ports on $_GET[host]</h1>\n";
print "<pre>\n";

$portscan = shell_exec("nmap $_GET[host]");
preg_match_all('/[0-9]{1,5}\/..p.*/', $portscan, $openports);

foreach ($openports[0] as $out)
{
    print "$out\n";
}


?>

</pre>
</div>
</body>
</html>

