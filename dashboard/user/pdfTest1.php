<?php
/* Caveat: I'm not a PHP programmer, so this may or may
 * not be the most idiomatic code...
 *
 * FPDF is a free PHP library for creating PDFs:
 * http://www.fpdf.org/
 */
require("fpdf/fpdf.php");
class PDF extends FPDF {
    const DPI = 150;
    const MM_IN_INCH = 25.4;
    /*const A4_HEIGHT = 210;
    const A4_WIDTH = 297;*/
    const Legal_HEIGHT = 215;
    const Legal_WIDTH = 350;
    // tweak these values (in pixels)
    const MAX_WIDTH = 1150;
    const MAX_HEIGHT = 1650;
    function pixelsToMM($val) {
        return $val * self::MM_IN_INCH / self::DPI;
    }
    function resizeToFit($imgFilename) {
        list($width, $height) = getimagesize($imgFilename);
        $widthScale = self::MAX_WIDTH / $width;
        $heightScale = self::MAX_HEIGHT / $height;
        $scale = min($widthScale, $heightScale);
        return array(
            round($this->pixelsToMM($scale * $width)),
            round($this->pixelsToMM($scale * $height))
        );
    }
    function centreImage($img) {
        list($width, $height) = $this->resizeToFit($img);
        // you will probably want to swap the width/height
        // around depending on the page's orientation
        $this->Image(
            $img, (self::Legal_HEIGHT - $width) / 2,
            (self::Legal_WIDTH - $height) / 2,
            $width,
            $height
        );
    }

    function header(){
        /*$this->Image('bg.jpg',0,0,300,300);*/
        $this->centreImage('bg.jpg',0,0);
        $this->SetFont('Arial','B',14);
        $this->cell(30,7,'Snow high School',0,0,'C');
        $this->Ln();
        $this->cell(30,2,'Snow high School',0,0,'C');
        $this->Ln();
        $this->cell(30,2,'Snow high School',0,0,'C');
        $this->Ln();
        $this->cell(30,2,'Snow high School',0,0,'C');
        $this->Ln();
        $this->cell(30,2,'Snow high School',0,0,'C');
        $this->Ln();
        $this->cell(30,2,'Snow high School',0,0,'C');
        $this->Ln();
        $this->Ln();
        $this->cell(30,2,'Snow high School',0,0,'C');
        $this->Ln();
    }

    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
// usage:
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','Legal',0);
$pdf->Output();
?>