//////////////////////////////////Confirmation box
function confirmation (url,title) {	var answer = confirm(title); if (answer){ window.location.href = url; } }

//////////////////////////////////Checks All CheckBoxes
function checkAll(form) { for (i=0; i<document.form.elements.length; i++) { if (document.form.elements[i].type=="checkbox") document.form.elements[i].checked=true; } }

//////////////////////////////////Unchecks All CheckBoxes
function uncheckAll(form) { for (i=0; i<document.form.elements.length; i++) { if (document.form.elements[i].type=="checkbox") document.form.elements[i].checked=false; } }

//////////////////////////////////Insert Extra Images
var inIndex = 1; var controlIndex = 0;
function setIndex(pNumero){
	inIndex = pNumero;
}
function fcnAddLinha(pParent, inIndex) {

  var tblTarget;
  var tblRow;
  var tblCol1;
  var tblCol2;
  var rowImage;
  var rowspanRowImage;
  inIndex++;
  setIndex(inIndex);
  tblTarget = document.getElementById(pParent);
  tblRow = tblTarget.insertRow(7);
  tblRow.className = "";
  tblCol1 = tblRow.insertCell(0);
  tblCol1.className = "";
  tblCol1.innerHTML = "<div class='formImg2' id='formImg2_"+inIndex+"' style='float: left; margin-right: 30px;'><form action='_edit_img.php' method='post' name='form' enctype='multipart/form-data'><input type='file' name='fotoDica_"+inIndex+"' class='file' /></form></div>";

}

function fcnAddLinha2(pParent, Index){
  var tblTarget
  var tblRow
  var tblCol1
  var tblCol2
  var rowImage
  var rowspanRowImage
  if(Index == 0 || controlIndex == 1){ inIndex++; }
  else{ inIndex=Index; inIndex++; controlIndex = 1; }
  setIndex(inIndex);
  tblTarget = document.getElementById(pParent);
  tblRow = tblTarget.insertRow(-1); // o -1 é para inserir apos a ultima linha
  tblRow.className = "hover"; // AQUI VOCE SETA A CLASS CSS DA 'LINHA'
  tblCol1 = tblRow.insertCell(0);
  tblCol1.className = "info";
  tblCol1.innerHTML = "<span><strong>Imagem extra " + inIndex + ":</strong></span><br /><input type=\"file\" name=\"image_full_" + inIndex + "\" class=\"file\" />";
  tblCol2 = tblRow.insertCell(1);
  tblCol2.className = "info";
  tblCol2.innerHTML = "<br /><input type=\"file\" name=\"image_thumb_" + inIndex + "\" class=\"file\" />";

  tblRow = tblTarget.insertRow(-1); // o -1 é para inserir apos a ultima linha
  //tblRow.className = "hover"; // AQUI VOCE SETA A CLASS CSS DA 'LINHA'
  tblCol1 = tblRow.insertCell(0);
  tblCol1.className = "info";
  tblCol1.innerHTML = "Descri&ccedil;&atilde;o " + inIndex + ":<br /> <textarea  style=\"float: left; height: 169px; width: 500px;\" name=\"description_" + inIndex + "\" class=\"textarea\" style=\"height: 100px;\" ></textarea>";


  //Coloca o select para os efeitos
  /*tblTarget = document.getElementById(pParent);
  tblRow = tblTarget.insertRow(-1); // o -1 é para inserir apos a ultima linha
  tblRow.className = "hover"; // AQUI VOCE SETA A CLASS CSS DA 'LINHA'
  tblCol1 = tblRow.insertCell(0);
  tblCol1.className = "info";
  tblCol1.innerHTML = "<span><strong>Efeito:</strong><span> Efeito utilizado neste produto</span>";
  tblCol2 = tblRow.insertCell(1);
  tblCol2.className = "info";
  tblCol2.innerHTML = "<select name=\"efeito_image_" + inIndex + "\" ><option value=\"1\">Marmorizado</option><option value=\"2\">Glitter</option><option value=\"7\">Artigo sem brilho</option><option value=\"8\">Estampa</option><option value=\"9\">Couro natural</option><option value=\"10\">Efeito Tartaruga</option></select>";
  */
  /*rowImage = document.getElementById("col_imagens");
  rowspanRowImage = $("#col_imagens").attr("rowspan");
  rowspanRowImage = rowspanRowImage + 2;
  $("#col_imagens").attr("rowspan",rowspanRowImage);*/
}

//////////////////////////////////LiveSearch
var xmlHttp;
function showResult(str,dv,frm,tp) {
	//str = da onde vem o valor buscado
	//dv = o nome da div que serão exibidos
	//frm = o nome do formulário de submit
	//tp = o tipo de xml
if (str.length==0)  { 
 document.getElementById(dv).innerHTML="";
 document.getElementById(dv).style.border="0px";
 return; }
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null) {
 alert ("Browser does not support HTTP Request");
 return; } 
var url="../_includes/livesearch.php";
url=url+"?q="+str;
url=url+"&form="+frm;
url=url+"&dv="+dv;
url=url+"&tp="+tp;
url=url+"&sid="+Math.random();
xmlHttp.onreadystatechange=stateChanged ;
xmlHttp.open("GET",url,true);
xmlHttp.send(null);
function stateChanged() { 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") { 
 document.getElementById(dv).
 innerHTML=xmlHttp.responseText;
 document.getElementById(dv).
 style.border="1px solid #A5ACB2";
 } }
function GetXmlHttpObject(){
var xmlHttp=null;
try {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest(); }
catch (e) {
 // Internet Explorer
 try  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");  }
 catch (e)  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");  } }
return xmlHttp;}
}

//////////////////////////////////PNGHack
var clear="../_images/clear.gif" //path to clear.gif
pngfix=function(){var els=document.getElementsByTagName('*');var ip=/\.png/i;var i=els.length;while(i-- >0){var el=els[i];var es=el.style;if(el.src&&el.src.match(ip)&&!es.filter){es.height=el.height;es.width=el.width;es.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+el.src+"',sizingMethod='crop')";el.src=clear;}else{var elb=el.currentStyle.backgroundImage;if(elb.match(ip)){var path=elb.split('"');var rep=(el.currentStyle.backgroundRepeat=='no-repeat')?'crop':'scale';es.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+path[1]+"',sizingMethod='"+rep+"')";es.height=el.clientHeight+'px';es.backgroundImage='none';var elkids=el.getElementsByTagName('*');if (elkids){var j=elkids.length;if(el.currentStyle.position!="absolute")es.position='static';while (j-- >0)if(!elkids[j].style.position)elkids[j].style.position="relative";}}}}}
window.attachEvent('onload',pngfix);