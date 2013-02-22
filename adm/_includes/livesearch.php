<?php
//get the q parameter from URL
$q=$_GET["q"];
$form=$_GET["form"];
$dv=$_GET["dv"];
$tp=$_GET["tp"];

$xmlDoc = new DOMDocument();
$xmlDoc->load($tp.".xml");

$x=$xmlDoc->getElementsByTagName('link');

//lookup all links from the xml file if length of q>0
if (strlen($q) > 0)
{
$hint="";
for($i=0; $i<($x->length); $i++)
 {
 $y=$x->item($i)->getElementsByTagName('title');
 $z=$x->item($i)->getElementsByTagName('url');
 if ($y->item(0)->nodeType==1)
  {
  //find a link matching the search text
  if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q))
   {
   if ($hint=="")
    {
    $hint=$hint . "<br /><a onclick=\"document.".$form.".search.value='".$y->item(0)->childNodes->item(0)->nodeValue."'; document.getElementById('".$dv."').style.display='none'\" style='cursor:pointer;'>" . 
    $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
    }
   else
    {
    $hint=$hint . "<br /><a onclick=\"document.".$form.".search.value='".$y->item(0)->childNodes->item(0)->nodeValue."'; document.getElementById('".$dv."').style.display='none'\" style='cursor:pointer;'>" . 
    $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
    }
   }
  }
 }
}

// Set output to "no suggestion" if no hint were found
// or to the correct values
if ($hint == "")
 {
 $response="Este produto existe?";
 }
else
 {
 $response=$hint;
 }

//output the response
echo $response;
?>