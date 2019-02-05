<?php
    require('../fpdf/mysql_table.php');

class PDF extends PDF_MySQL_Table
{
    function Header()
    {
        $this->AddFont('SourceSansPro','','SourceSansPro-Black.php');
        $this->SetFont('SourceSansPro','',10);
        $this->Image('../../icons/Concordia.jpg', 59,8,15);
    
        $this->Cell(0,6,'Concordia Childrens Services Inc.',0,1,'C');
        $this->AddFont('SourceSansProLight','','SourceSansPro-Light.php');
        $this->SetFont('SourceSansProLight','',10);
        $this->Cell(0,6,'4443 Sta. Mesa, Manila 1016 Philippines',0,1,'C');
        $this->Ln();
        $this->Ln();

        $title = $_GET['title'];
        // Title
    
        $this->AddFont('SourceSansRegular','','SourceSansPro-Regular.php');
        $this->SetFont('SourceSansRegular','',18);
        $this->Cell(0,6,$title,0,1,'C');
        $this->Ln(10);
        // Ensure table header is printed
        parent::Header();
    }

    // Page footer
    function Footer()
    {
        $info = 'Date Created: '.date('m-d-Y');
        
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('SourceSansRegular','',10);
        $this->Cell(0,6,$info,0,1,'L');
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
        parent::Footer();
    }
}

$label = $_GET['label'];
$count = $_GET['count'];

$pdf = new PDF();
$pdf->AddPage();
$pdf->AddFont('SourceSansProLight','','SourceSansPro-Light.php');
$pdf->SetFont('SourceSansProLight','',14);
$pdf->Cell(0,6,$label.$count,0,1,'C');
$pdf->Output();

// Connect to database


//$link = mysqli_connect('localhost', 'root', '', 'omisdb');
//$query = $_GET['query'];

//$pdf = new PDF();
//$pdf->AddPage();
// First table: output all columns
//$pdf->Table($link, $query);
//$pdf->AddPage();
// Second table: specify 3 columns
/*$pdf->AddCol('rank',20,'','C');
$pdf->AddCol('name',40,'Country');
$pdf->AddCol('pop',40,'Pop (2001)','R');
$prop = array('HeaderColor'=>array(255,150,100),
            'color1'=>array(210,245,255),
            'color2'=>array(255,255,210),
            'padding'=>2);
$pdf->Table($link,'select name, format(pop,0) as pop, rank from country order by rank limit 0,10',$prop);*/
//$pdf->Output();
?>