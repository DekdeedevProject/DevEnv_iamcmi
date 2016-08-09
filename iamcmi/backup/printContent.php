<!DOCTYPE html>
<?php 
$content = "

<html>
  <head>
    <style>
body {
  background: rgb(204,204,204); 
}
page {
  background: white;
  display: block;
  margin: 0 0 0 0;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
page[size='A4'] {  
  width: 21cm;
  height: 29.7cm; 
}
page[size='A4'][layout='portrait'] {
  width: 29.7cm;
  height: 21cm;  
}
page[size='A3'] {
  width: 29.7cm;
  height: 42cm;
}
page[size='A3'][layout='portrait'] {
  width: 42cm;
  height: 29.7cm;  
}
page[size='A5'] {
  width: 14.8cm;
  height: 21cm;
}
page[size='A5'][layout='portrait'] {
  width: 21cm;
  height: 14.8cm;  
}
@media print {
  body, page {
    margin: 0 0 0 0;
    box-shadow: 0;
  }
}
table{
	border-collapse: collapse;
	width:100%; 
}
table, th, td {
    border: 1px solid black;
}
div {
    font-size:x-small;
}
    </style>
  </head>
  <body>
	<page size='A4'>
	test
	</page>
  </body>
</html>

";
?>