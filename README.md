# curlist 
This is a small library for sending/receiving requests/responses to/from a remote URL using curl in PHP.
<br>website: http://www.snsina.com
<h3>Frameworks</h3>
Curlist can be installed and used in Symfony 2, Zend Framework 2 and any modern framework which supports namespace and composer.

<h3>Installation</h3>
To install run either if following commands in the root directory of project.

<ul>
<li>composer require "snsina/curlist":"dev-master"</li>
</ul>
OR
<ul>
<li>php composer.phar require "snsina/curlist":"dev-master"</li>
</ul>

<h3>Set Options</h3>
 You may refer to this page for having options: http://php.net/manual/en/function.curl-setopt.php
 
 <h3>Supported request methods</h3>
 <ul>
 <li><b>GET</b>: supported</li>
 <li><b>POST</b>: supported</li>
 <li><b>PUT</b>: will be supported soon</li>
 <li><b>DELETE</b>: will be supported soon</li>
 </ul>
 
 <h3>How to use</h3>
 ```
 use Snsina\Curlist\CurlSvc;
 ....
 $curl = new CurlSvc();
 
 // get
 $curl->get($url, array $options, $headers);
 
 //post
 $curl->post($url, array $options, $headers);
 
 ```
