<?php
require('../fpdf181/fpdf.php');
define('FPDF_FONTPATH','font/');

class MYPDF extends FPDF
{
    // Page header
function Header()
{
    if($this->grid)
            $this->DrawGrid();
    
    $this->Image('../img/seg-logo.jpg',5,5,50,20);
    $this->Image('../img/example-logo.jpg',60,5,90,20);
    // $this->Cell(75);
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
// Margins
var $left = 10;
var $right = 10;
var $top = 10;
var $bottom = 10;
    
// Create Table
function WriteTable($tcolums)
{
  // go through all colums
  for ($i = 0; $i < sizeof($tcolums); $i++)
  {
     $current_col = $tcolums[$i];
     $height = 0;
     
     // get max height of current col
     $nb=0;
     for($b = 0; $b < sizeof($current_col); $b++)
     {
        // set style
        $this->SetFont($current_col[$b]['font_name'], $current_col[$b]['font_style'], $current_col[$b]['font_size']);
        $color = explode(",", $current_col[$b]['fillcolor']);
        $this->SetFillColor($color[0], $color[1], $color[2]);
        $color = explode(",", $current_col[$b]['textcolor']);
        $this->SetTextColor($color[0], $color[1], $color[2]);            
        $color = explode(",", $current_col[$b]['drawcolor']);            
        $this->SetDrawColor($color[0], $color[1], $color[2]);
        $this->SetLineWidth($current_col[$b]['linewidth']);
                    
        $nb = max($nb, $this->NbLines($current_col[$b]['width'], $current_col[$b]['text']));            
        $height = $current_col[$b]['height'];
     }  
     $h=$height*$nb;
     
     
     // Issue a page break first if needed
     $this->CheckPageBreak($h);
     
     // Draw the cells of the row
     for($b = 0; $b < sizeof($current_col); $b++)
     {
        $w = $current_col[$b]['width'];
        $a = $current_col[$b]['align'];
        
        // Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        
        // set style
        $this->SetFont($current_col[$b]['font_name'], $current_col[$b]['font_style'], $current_col[$b]['font_size']);
        $color = explode(",", $current_col[$b]['fillcolor']);
        $this->SetFillColor($color[0], $color[1], $color[2]);
        $color = explode(",", $current_col[$b]['textcolor']);
        $this->SetTextColor($color[0], $color[1], $color[2]);            
        $color = explode(",", $current_col[$b]['drawcolor']);            
        $this->SetDrawColor($color[0], $color[1], $color[2]);
        $this->SetLineWidth($current_col[$b]['linewidth']);
        
        $color = explode(",", $current_col[$b]['fillcolor']);            
        $this->SetDrawColor($color[0], $color[1], $color[2]);
        
        
        // Draw Cell Background
        $this->Rect($x, $y, $w, $h, 'FD');
        
        $color = explode(",", $current_col[$b]['drawcolor']);            
        $this->SetDrawColor($color[0], $color[1], $color[2]);
        
        // Draw Cell Border
        if (substr_count($current_col[$b]['linearea'], "T") > 0)
        {
           $this->Line($x, $y, $x+$w, $y);
        }            
        
        if (substr_count($current_col[$b]['linearea'], "B") > 0)
        {
           $this->Line($x, $y+$h, $x+$w, $y+$h);
        }            
        
        if (substr_count($current_col[$b]['linearea'], "L") > 0)
        {
           $this->Line($x, $y, $x, $y+$h);
        }
                    
        if (substr_count($current_col[$b]['linearea'], "R") > 0)
        {
           $this->Line($x+$w, $y, $x+$w, $y+$h);
        }
        
        
        // Print the text
        $this->MultiCell($w, $current_col[$b]['height'], $current_col[$b]['text'], 0, $a, 0);
        
        // Put the position to the right of the cell
        $this->SetXY($x+$w, $y);         
     }
     
     // Go to the next line
     $this->Ln($h);          
  }                  
}
   
// If the height h would cause an overflow, add a new page immediately
function CheckPageBreak($h)
{
  if($this->GetY()+$h>$this->PageBreakTrigger)
     $this->AddPage($this->CurOrientation);
}

// Computes the number of lines a MultiCell of width w will take
function NbLines($w, $txt)
{
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
       $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r", '', $txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
       $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
       $c=$s[$i];
       if($c=="\n")
       {
          $i++;
          $sep=-1;
          $j=$i;
          $l=0;
          $nl++;
          continue;
       }
       if($c==' ')
          $sep=$i;
       $l+=$cw[$c];
       if($l>$wmax)
       {
          if($sep==-1)
          {
             if($i==$j)
                $i++;
          }
          else
             $i=$sep+1;
          $sep=-1;
          $j=$i;
          $l=0;
          $nl++;
       }
       else
          $i++;
    }
    return $nl;
}
        
function DrawGrid()
{
  if($this->grid===true){
      $spacing = 5;
  } else {
      $spacing = $this->grid;
  }
  $this->SetDrawColor(204,255,255);
  $this->SetLineWidth(0.35);
  for($i=0;$i<$this->w;$i+=$spacing){
      $this->Line($i,0,$i,$this->h);
  }
  for($i=0;$i<$this->h;$i+=$spacing){
      $this->Line(0,$i,$this->w,$i);
  }
  $this->SetDrawColor(0,0,0);

  $x = $this->GetX();
  $y = $this->GetY();
  $this->SetFont('Arial','I',8);
  $this->SetTextColor(204,204,204);
  for($i=20;$i<$this->h;$i+=20){
      $this->SetXY(1,$i-3);
      $this->Write(4,$i);
  }
  for($i=20;$i<(($this->w)-($this->rMargin)-10);$i+=20){
      $this->SetXY($i-1,1);
      $this->Write(4,$i);
  }
  $this->SetXY($x,$y);
}
}

function i25($xpos, $ypos, $code, $basewidth=1, $height=10){

  $wide = $basewidth;
  $narrow = $basewidth / 3 ;

  // wide/narrow codes for the digits
  $barChar['0'] = 'nnwwn';
  $barChar['1'] = 'wnnnw';
  $barChar['2'] = 'nwnnw';
  $barChar['3'] = 'wwnnn';
  $barChar['4'] = 'nnwnw';
  $barChar['5'] = 'wnwnn';
  $barChar['6'] = 'nwwnn';
  $barChar['7'] = 'nnnww';
  $barChar['8'] = 'wnnwn';
  $barChar['9'] = 'nwnwn';
  $barChar['A'] = 'nn';
  $barChar['Z'] = 'wn';

  // add leading zero if code-length is odd
  if(strlen($code) % 2 != 0){
      $code = '0' . $code;
  }

  $this->SetFont('Arial','',10);
  $this->Text($xpos, $ypos + $height + 4, $code);
  $this->SetFillColor(0);

  // add start and stop codes
  $code = 'AA'.strtolower($code).'ZA';

  for($i=0; $i<strlen($code); $i=$i+2){
      // choose next pair of digits
      $charBar = $code[$i];
      $charSpace = $code[$i+1];
      // check whether it is a valid digit
      if(!isset($barChar[$charBar])){
          $this->Error('Invalid character in barcode: '.$charBar);
      }
      if(!isset($barChar[$charSpace])){
          $this->Error('Invalid character in barcode: '.$charSpace);
      }
      // create a wide/narrow-sequence (first digit=bars, second digit=spaces)
      $seq = '';
      for($s=0; $s<strlen($barChar[$charBar]); $s++){
          $seq .= $barChar[$charBar][$s] . $barChar[$charSpace][$s];
      }
      for($bar=0; $bar<strlen($seq); $bar++){
          // set lineWidth depending on value
          if($seq[$bar] == 'n'){
              $lineWidth = $narrow;
          }else{
              $lineWidth = $wide;
          }
          // draw every second value, because the second digit of the pair is represented by the spaces
          if($bar % 2 == 0){
              $this->Rect($xpos, $ypos, $lineWidth, $height, 'F');
          }
          $xpos += $lineWidth;
      }
  }
}

include 'config/config.php'; 
// include 'header.php'; 

// retrive data from DB
$sqlID = "SPO_002";
$sBy = "POL_QuoNum";
$sDesc = "NCMI0000042";

$conn = connOpen();
setSearchCriteria($sBy,$sDesc);
$searchResult   = executeSql($conn,$sqlID);
$searchResultSize = $searchResult->num_rows;
$row = $searchResult->fetch_assoc();
// include 'config/Condition/PCS_CON_002.php';
// Instanciation of inherited class
// $pdf = new PDF();
$pdf=new MYPDF('P','mm','A4');
// Add page with a grid and default spacing (5mm)
$pdf->grid = true;

// Add page with a grid (10mm spacing)
// $pdf->grid = 10;
// Disable grid
// $pdf->grid = false;

$pdf->AliasNbPages();
$pdf->AddPage();

// $pdf->SetFont('times','',12);
$pdf->AddFont('angsa','','angsa.php');
$pdf->SetFont('angsa','',12);

// $pdf->Cell(40,5,iconv( 'UTF-8','TIS-620',$row["POL_QuoNum"] ),1,0,'C');

// create table
$columns = array();
// header col
$col = array();
$col[] = array('text' => 'Datum', 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '135,206,250', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => 'Text', 'width' => '125', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '135,206,250', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => 'Soll', 'width' => '15', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '135,206,250', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => 'Haben', 'width' => '15', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '135,206,250', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => 'Saldo', 'width' => '15', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '135,206,250', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');   
$columns[] = $col;

// Draw Table   
$pdf->WriteTable($columns);

$pdf->Output();
?>
