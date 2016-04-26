# PHP-Web-Views
Get Visitor Info with PHP. Stores website visitors information (ip,location,date,os,browser) into a SQLite database. <br>Used for web counters as well as web traffic analytics.

Gets and stores the following information from the user: Visit Number, IP Adress, Location of ISP/IP, Day, Time, URL Visited, and OS and Browser type  `'$ip','$location','$day','$time','$url','$info'`

Easily implemented into any html page with `<?php include($_SERVER['DOCUMENT_ROOT'].'/visit.php') ?>`

Views folder is just a simple database layout with login (as seen below, ip adresses smudged out)

![alt tag](http://atillasaadat.me/views/views.png)
