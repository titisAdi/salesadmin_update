<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('tcpdf/tcpdf.php');


class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		// Logo
		$image_file = './assets/img/proposal/logo.png';
		$this->Image($image_file, 10, 10, 15, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('helvetica', 'B', 20);
		// Title
		$this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
	}

	// Page footer
	public function Footer() {
		// Logo
		$image_file = './assets/img/proposal/footer.png';
		$this->Image($image_file, 0, 265, 220, '', 'png', '', 'B', false, 300, '', false, false, 0, false, false, false);
		// Position at 15 mm from bottom
		$this->SetY(-25);
		// Set font
		$this->SetFont('helvetica', 'BI', 11);
		$this->SetTextColor(0, 0, 0, 0);
		// Page number
		$this->Cell(0, 10,'   '.$this->getAliasNumPage(), 0, false, 'L', 0, '', 0, false, 'T', 'M');
	}
}