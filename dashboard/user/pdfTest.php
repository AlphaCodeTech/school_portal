<?php 
        require "fpdf/fpdf.php";

        class myPDF extends FPDF{
            
            function header(){
                /*$this->Image('bg.jpg',0,0,300,300);*/
                $this->Image('bg.jpg',0,0);
                $this->SetFont('Arial','B',14);
                $this->cell(30,2,'Snow high School',0,0,'C');
                $this->Ln();
            }

            function footer(){
                $this->SetY(-15);
                $this->SetFont('Arial','',8);
                $this->cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
            }
        }

        $pdf = new myPDF();
        $pdf->AliasNbPages();
        $pdf->AddPage('P','Legal',0);
        $pdf->Output();