<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }
	public function Footer() {
		// Logo
		$img_file = './assets/img/proposal/footer.png';
		$this->Image($img_file, 0, 265, 220, '', 'png', '', 'B', false, 300, '', false, false, 0, false, false, false);
		// Position at 15 mm from bottom
		$this->SetY(-25);
		// Set font
		$this->SetFont('helvetica', 'BI', 11);
		$this->SetTextColor(0, 0, 0, 0);
		// Page number
		$this->Cell(0, 10,'   '.$this->getAliasNumPage(), 0, false, 'L', 0, '', 0, false, 'T', 'M');
	}
}

/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */