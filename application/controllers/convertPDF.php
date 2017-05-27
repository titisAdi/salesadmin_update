<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ConvertPDF extends CI_Controller {

	public function index($get){
		$this->load->library('MYPDF');
		$this->mypdf->footer(); 
		$idpro = substr($get,0,10);
		$rev = substr($get,10,2);
		$data = $this->salesModel->proposalPdf(" where idproposal = '$idpro' and proposal.rev = '$rev'");
		$master = $this->salesModel->proposalMaster(" where idproposal = '$idpro' and rev = '$rev'");
		$workday = $this->salesModel->workdayPro("  where id_proposal = '$idpro' and rev = '$rev'");
		$last = $this->salesModel->proposalLast("  where proposal_license.idproposal = '$idpro' and proposal_license.rev = '$rev'");
		$custom = $this->salesModel->customwd(" where id_proposal = '$idpro' and rev = '$rev'");
		$totalpro= $this->salesModel->total(" where id_proposal = '$idpro' and rev = '$rev'");
		$totalcwd=array('totalcwd'=>$totalpro[0]['totalcwd']);
		$custom0=array('line'=>$custom[0]['line']);
		$custom1=array('description'=>$custom[0]['description']);
		$custom2=array('qty'=>$custom[0]['qty']);
		$custom3=array('rate'=>$custom[0]['rate']);
		$last1=array('totalwd'=>$last[0]['totalwd']);
		$last2=array('wdqty'=>$last[0]['wdqty']);
		$workday0=array('description'=>$workday[0]['description']);
		$workday1=array('qty'=>$workday[0]['qty']);
		$workday2=array('rate'=>$workday[0]['rate']);
		$master0=array('line'=>$master[0]['line']);
		$master1=array('remark'=>$master[0]['remark']);
		$master2=array('employeelimit'=>$master[0]['employeelimit']);
		$master3=array('price'=>$master[0]['price']);
		$master4=array('productname'=>$master[0]['productname']);
		$master5=array('productcode'=>$master[0]['productcode']);
		$master6=array('discount'=>$master[0]['discount']);
		$master7=array('custom_limit'=>$master[0]['custom_limit']);
		$master8=array('license'=>$master[0]['license']);
		$data0=array('customer'=>$data[0]['customer']);
		$data1=array('id_lead'=>$data[0]['id_lead']);
		$data2=array('idproposal'=>$data[0]['idproposal']);
		$data3=array('rev'=>$data[0]['rev']);
		$data4=array('date'=>$data[0]['date']);
		$data5=array('term'=>$data[0]['term']);
		$data6=array('signer'=>$data[0]['signer']);
		$data7=array('status'=>$data[0]['status']);
		
		$cwdqty = implode(" ", $totalcwd);
		$linecwd=implode(" ", $custom0);
		$desccwd=implode(" ", $custom1);
		$qtycwd=implode(" ", $custom2);
		$ratecwd=implode(" ", $custom3);
		$totalwd=implode(" ", $last1);
		$wdqty=implode(" ", $last2);
		$description=implode(" ", $workday0);
		$qty=implode(" ", $workday1);
		$rate=implode(" ", $workday2);
		$line = implode(" ",$master0);
		$remark=implode(" ",$master1);
		$employee = implode(" ",$master2);
		$price = implode(" ",$master3);
		$productname = implode(" ",$master4);
		$productcode = implode(" ",$master5);
		$discount = implode(" ",$master6);
		$custom = implode(" ",$master7);
		$license = implode(" ",$master8);
		$hitung = $price - $discount;
		$harga = number_format($hitung,0,',','.');
		$employeelimit=number_format($employee,0,',','.');
		$custom_limit=number_format($custom,0,',','.');
		$cwdtotal=number_format($cwdqty,0,',','.');

		$gridlic = '';
		$gridwd = '';
		$gridcwd = '';

		$customer= implode(" ",$data0);
		$id_lead= implode(" ",$data1);
		$idproposal= implode(" ",$data2);
		$rev= implode(" ",$data3);
		$date= implode(" ",$data4);
		$term= implode(" ",$data5);
		$signer= implode(" ",$data6);
		$status= implode(" ",$data7);
		
		if($custom != 0){
			$limit = $custom_limit;
		}else{
			$limit = $employeelimit;
		}
		$gridlic .= '<tr>
        <td style="text-align:left">'.$license.'</td>
        <td style="text-align:center">'.$limit.'</td>
        <td style="text-align:left">'.$harga.'</td>
		</tr>';
		$gridwd .= '<tr>
        <td>'.$description.'</td>
        <td style="text-align:center">'.$qty.'</td>
        <td style="text-align:center">'.number_format($rate,0,',','.').'</td>
        <td style="text-align:right">'.number_format($qty * $rate,0,',','.').'</td>
    	</tr>';
    	$gridcwd .= '<tr>
        <td style="text-align:left">'.$desccwd.'</td>
        <td style="text-align:center">'.$qtycwd.'</td>
        <td style="text-align:center">'.number_format($ratecwd,0,',','.').'</td>
        <td style="text-align:right">'.number_format($qtycwd * $ratecwd,0,',','.').'</td>
    	</tr>';

    	if($remark != 'bundle'){
    		$bundle = '';
			$wdtotal = 'FREE';
    	}else{
    		$bundle=$remark;
    		$wdtotal=number_format($totalwd,0,',','.');
    	}
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('JPayroll Application Enterprise');
		$pdf->SetTitle('Proposal JPayroll to '.$customer.'');
		$pdf->SetSubject('Proposal');
		$pdf->SetKeywords('Proposal, Jpayroll, Payroll, HRIS, Confidential');

		$pdf->setPrintHeader(false);

		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		$pdf->SetMargins(31.7, PDF_MARGIN_TOP, 31.7);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			require_once(dirname(__FILE__).'/lang/eng.php');
			$pdf->setLanguageArray($l);
		}

		$pdf->setFontSubsetting(true);

		$pdf->SetFont('helvetica', '', 11, '', true);

		$pdf->setPrintFooter(false);

		$pdf->AddPage();

		$bMargin = $pdf->getBreakMargin();
		$auto_page_break = $pdf->getAutoPageBreak();
		$pdf->SetAutoPageBreak(false, 0);
		$img_file = './assets/img/proposal/cover.jpg';
		$pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
		$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
		$pdf->setPageMark();

		$html = '<span style="color:white;text-align:center;font-weight:bold;font-size:80pt;"></span>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<table cellspacing="0" cellpadding="1" border="0">
		<tr>
		<td width="350"><span style="color:white;text-align:left;font-weight:bold;font-size:28pt;">PROPOSAL</span><br>
		<span style="color:white;text-align:left;font-size:18pt;">TO PROVIDE JPAYROLL</span><br>
		<span style="color:white;text-align:left;font-size:18pt;">APPLICATION SYSTEM</span><br>
		<span style="color:white;text-align:left;font-size:18pt;">'. "$idproposal" .' / '. "$date" .'</span>
		</td>
		<td style="text-align:right">
		<br>
		<br>
		<br>
		<img src="assets/img/proposal/logo.png" width="220" alt="personal information">
		</td>
		</tr>
		</table>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<table cellspacing="0" cellpadding="1" border="0">
		<tr>
		<td width="350"><span style="color:white;text-align:left;font-size:18pt;">Proposed For :</span><br>
		<span style="color:white;text-align:left;font-size:18pt;">'. "$customer" .'</span><br><br>
		<span style="color:white;text-align:left;font-size:12pt;">'. "$rev" .'</span><br><br>
		<span style="color:white;text-align:left;font-size:8pt;">Information in this document is strictly confidential and may not be used in whole or in part to any party except to '. "$customer" .' without the express permission of PT. Java Consulting Indonesia</span><br>
		</td>
		<td width="40">
		</td>
		<td width="200"><b>Provided By : </b><br>
		PT Java Consulting Indonesia<br>
		Wisata Bukit Mas II RE/08 <br>
		Surabaya – Indonesia<br>
		T : 031 752 0792<br>
		F : 031 752 0793<br>
		E : info@jpayroll.com<br>
		</td>
		</tr>
		</table>
		';
		$pdf->writeHTML($html, true, false, true, false, '');

		//Page1
		$pdf->AddPage();
		$pdf->setPrintFooter(true);
		$pdf->Bookmark('1. Latar Belakang', 0, 0, '', '', array(0,0,0));

		$html = <<<EOD
		<style>
		P {text-indent: 30pt;}
		p.small {
		    line-height: 70%;
		}

		p.big {
		    line-height: 180%;
		}
		</style>
		<h2 style="color:#3399FF">1. Latar Belakang</h2>
		<p class="big" style="text-align:justify">
		Payroll adalah istilah bisnis yang umum yang mengacu pada total semua catatan financial upah, gaji karyawan, pengurangan, dan bonus. Payroll dan Pajaknya memiliki pengaruh yang signifikan pada pendapatan bersih kebanyakan bisnis, sehingga mereka memainkan peran utama dalam kebanyakan perusahaan.<br>
		Penerapan Sistem Informasi di berbagai bidang merupakan suatu keharusan, karena hal tersebutlah orang lebih mengutamakan pemecahan masalah yang lebih cepat dan akurat. Sistem Informasi Sumber Daya Manusia merupakan salah satu sistem informasi terpenting yang ada di dalam sebuah perusahaan. Dengan digunakannya Sistem Informasi Sumber Daya Manusia / Software Payroll sebagai solusi tercepat dan akurat, diharapkan segala masalah dapat diatasi dengan mudah. Sistem inilah yang dapat menunjang kelancaran dalam melaksanakan proses pengolahan data gaji pegawai.<br>
		Software Payroll sangat penting karena dapat mempengaruhi moral perusahaan. Pembayaran gaji dengan tepat waktu dan sesuai ketentuan yang berlaku serta transparansi laporan gaji maupun honorarium yang telah dibayarkan sangat dibutuhkan untuk menunjang proses manajemen berkualitas. Tanpa layanan penggajian yang tepat, perusahaan bisa kehilangan karyawan untuk perusahaan lain yang memiliki reputasi gaji yang lebih baik. Software Payroll juga sangat penting untuk tujuan perpajakan, sehingga sangat penting untuk memastikan bahwa orang atau badan usaha yang menangani Proses Payroll di bisnis Anda sangat kompeten dan dapat diandalkan. Selain itu Software Payroll juga dapat mendukung data financial yang dibutuhkan dalam Sistem Enterprise Resource Planning (ERP).<br>
		Oleh karena itu, PT. Java Consulting Indonesia sebagai vendor yang berpengalaman dalam membangun aplikasi-aplikasi sistem informasi berbasis komputer membangun Software Payroll yang dapat membantu dalam menangani proses pengolahan data pegawai, data gaji pegawai, cuti, shift kerja, dan tunjangan yang diperoleh pegawai.<br>
		</p>
EOD;


		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

		//page2
		$pdf->AddPage();
		$pdf->Bookmark('2. Ruang Lingkup', 0, 0, '', '', array(0,0,0));
		$pdf->Bookmark('2.1 Data Pegawai (Personal Information)', 1, 0, '', '', array(0,0,0));
		$html = <<<EOD
		<style>
		.indent {text-indent: 30pt;}
		.indented
		   {
		   padding-left: 50pt;
		   padding-right: 50pt;
		   }
		.small {
		    line-height: 70%;
		}

		.normal {
		    line-height: 100%;
		}

		p.big {
		    line-height: 180%;
		}
		</style>
		<h2 style="color:#3399FF">2. Ruang Lingkup</h2>
		<p class="big" style="text-align:justify">
		<ul>
		<li>User tidak perlu lagi melakukan proses pengolahan penggajian dan perhitungan jam kerja pegawai. Aplikasi akan secara otomatis melakukan perhitungannya, absensi dapat dihubungkan dengan perangkat absensi sidik jari maupun RFID.</li>
		<li>Data karyawan dapat dikelompokan dan difilter sesuai dengan kebutuhan user, sehingga untuk mencari data karyawan tertentu akan sangat mudah</li>
		</ul>
		</p>
		<br>
		<h4 class="indent small" style="color:#3399FF">2.1 Data Pegawai (Personal Information)</h4>
		<p class="big" style="text-align:justify">
		<blockquote>
		User dapat mendaftarkan pegawai baru dengan suatu Nomor Induk Karyawan (NIK) yang unik, nama, jenis kelamin, tempat lahir & tanggal lahir, status pernikahan, agama, tipe employee dan foto.<br>
		<img src="./assets/img/proposal/1.jpg" alt="personal information">
		</blockquote>
		</p>

EOD;

		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
		
		//page3

		$pdf->AddPage();
		$pdf->Bookmark('2.2 Data Pekerjaan (Job Information)', 1, 0, '', '', array(0,0,0));
		$html = <<<EOD
		<style>
		.indent {text-indent: 30pt;}
		.indented
		   {
		   padding-left: 50pt;
		   padding-right: 50pt;
		   }
		.small {
		    line-height: 70%;
		}

		.normal {
		    line-height: 100%;
		}

		p.big {
		    line-height: 180%;
		}
		</style>
		<h4 class="indent small" style="color:#3399FF">2.2 Data Pekerjaan (Job Information)</h4>
		<p class="big" style="text-align:justify">
		<blockquote>
		User dapat memasukkan data – data informasi seperti status pegawai tersebut, tanggal masuk, tanggal lolos masa percobaan, grade, title, organisasi struktur, cost center, account code dari NIK tersebut.
		<br>
		<br>
		<img src="./assets/img/proposal/2.jpg" alt="personal information">
		</blockquote>
		</p>

EOD;
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

		//page4

		$pdf->AddPage();
		$pdf->Bookmark('2.3 Shift Scheduling', 1, 0, '', '', array(0,0,0));
		$html = <<<EOD
		<style>
		.indent {text-indent: 30pt;}
		.indented
		   {
		   padding-left: 50pt;
		   padding-right: 50pt;
		   }
		.small {
		    line-height: 70%;
		}

		.normal {
		    line-height: 100%;
		}

		p.big {
		    line-height: 180%;
		}
		</style>
		<h4 class="indent small" style="color:#3399FF">2.3 Shift Scheduling</h4>
		<p class="big" style="text-align:justify">
		<blockquote>
		Jenis – jenis shift dapat di definisikan oleh user sendiri, dengan memberikan jenis shift tersebut, jam masuk, jam pulang dan batasan keterlambatan untuk masing – masing shift. Kemudian shift ini akan dijadikan sebagai template pola kelompok shift karyawan.
		<br>
		<br>
		<img src="./assets/img/proposal/3.jpg" alt="personal information">
		</blockquote>
		</p>

EOD;
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

		//page5

		$pdf->AddPage();
		$pdf->Bookmark('2.4 Request Form', 1, 0, '', '', array(0,0,0));
		$pdf->Bookmark('a. Cuti Tahunan (Annual Leave)', 2, 0, '', '', array(0,0,0));
		$pdf->Bookmark('b.	Ijin Khusus (Special Leave)', 2, 0, '', '', array(0,0,0));
		$pdf->Bookmark('c.	Sakit (Sickness)', 2, 0, '', '', array(0,0,0));

		$html = <<<EOD
		<style>
		.indent {text-indent: 30pt;}
		.indented
		   {
		   padding-left: 50pt;
		   padding-right: 50pt;
		   }
		.small {
		    line-height: 70%;
		}

		.normal {
		    line-height: 100%;
		}

		p.big {
		    line-height: 180%;
		}
		</style>
		<h4 class="indent small" style="color:#3399FF">2.4 Request Form</h4>
		<p class="big" style="text-align:justify">
		<blockquote>
		a.	Cuti Tahunan (Annual Leave)<br>
		Cuti tahunan atau cuti panjang (Long Leave) dapat didefinisikan sendiri oleh user (self service), dan dapat diberlakukan untuk kelompok tertentu. Cuti dapat di perpanjang, di tambahkan atau dikurangkan secara manual dengan menggunakan transaksi cuti. Kemudian permohonan cuti tersebut harus di approve terlebih dahulu (melalui menu Posting Annual Leave).
		<br>
		<img src="./assets/img/proposal/4.jpg" alt="personal information">
		<br>
		<br>
		b.	Ijin Khusus (Special Leave)<br>
		Ijin khusus digunakan untuk pegawai yang tidak masuk dikarenakan kasus – kasus seperti Pegawai Menikah, Sunat / Baptis, Naik Haji, Keluarga Meninggal, Cuti Melahirkan, Istri Melahirkan , Istri Keguguran, dll.
		<br>
		<br>
		c.	Sakit (Sickness)<br>
		Ijin khusus digunakan untuk pegawai yang tidak masuk dikarenakan sakit dan dapat menunjukkan surat dokter, dimana nantinya ada 4 type sickness yaitu ijin sakit rawat jalan, ijin sakit karena kecelakaan waktu tugas rawat jalan, ijin opname, dan ijin opname karena kecelekaan waktu tugas.
		</blockquote>
		</p>

EOD;
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

		//page6

		$pdf->AddPage();
		$pdf->Bookmark('d.	Dispensasi (Dispentation)', 2, 0, '', '', array(0,0,0));
		$pdf->Bookmark('e.	Menstruasi (Mentruation)', 2, 0, '', '', array(0,0,0));
		$pdf->Bookmark('f.	Ijin 1 Hari Penuh', 2, 0, '', '', array(0,0,0));
		$pdf->Bookmark('g.	Ijin di tengah – tengah jam kerja', 2, 0, '', '', array(0,0,0));
		$pdf->Bookmark('h.	Perjalanan Dinas (Business Trip)', 2, 0, '', '', array(0,0,0));
		$pdf->Bookmark('i.	Emergency Call', 2, 0, '', '', array(0,0,0));
		$pdf->Bookmark('2.5	Overtime Value', 1, 0, '', '', array(0,0,0));


		$html = <<<EOD
		<style>
		.indent {text-indent: 30pt;}
		.indented
		   {
		   padding-left: 50pt;
		   padding-right: 50pt;
		   }
		.small {
		    line-height: 70%;
		}

		.normal {
		    line-height: 100%;
		}

		p.big {
		    line-height: 180%;
		}
		</style>
		<p class="big" style="text-align:justify">
		<blockquote>
		d.	Dispensasi (Dispentation)<br>
		Dispensasi digunakan untuk pegawai yang tidak masuk dikarenakan karena factor – factor lain seperti sakit tidak bisa menunjukkan surat dokter.
		<br>
		<br>
		e.	Menstruasi (Mentruation)<br>
		Cuti Menstruasi hanya dapat diambil oleh pegawai perempuan saja.
		<br>
		<br>
		f.	Ijin 1 Hari Penuh
		<br>
		<br>
		g.	Ijin di tengah – tengah jam kerja
		<br>
		<br>
		h.	Perjalanan Dinas (Business Trip)<br>
		Digunakan untuk mendaftarkan pegawai yang menjalani tugas perjalanan dinas, sehingga untuk tanggal tersebut tidak diperlukan pengecekan check clock karyawan.
		<br>
		<br>
		i.	Emergency Call
		</blockquote>
		</p>
		<h4 class="indent small" style="color:#3399FF">2.5	Overtime Value</h4>
		<p class="big" style="text-align:justify">
		<blockquote>
		Setiap jenis employee status dapat memiliki table pengali untuk jam lembur nya, dimana akan dibedakan juga jam pengali di hari kerja dan di hari libur.
		<br>
		<img src="./assets/img/proposal/5.jpg" alt="personal information">
		</blockquote>
		</p>
EOD;
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

		//page7

		$pdf->AddPage();
		$pdf->Bookmark('2.6	Overtime Order Letter', 1, 0, '', '', array(0,0,0));
		$pdf->Bookmark('2.7	Gaji Pokok (Basic Salary)', 1, 0, '', '', array(0,0,0));
		$html = <<<EOD
		<style>
		.indent {text-indent: 30pt;}
		.indented
		   {
		   padding-left: 50pt;
		   padding-right: 50pt;
		   }
		.small {
		    line-height: 70%;
		}

		.normal {
		    line-height: 100%;
		}

		p.big {
		    line-height: 150%;
		}
		</style>
		<h4 class="indent small" style="color:#3399FF">2.6	Overtime Order Letter</h4>
		<p class="big" style="text-align:justify">
		<blockquote>
		User dapat mendaftar surat perintah lembur (baik per departemen atau pun tidak), dimana surat perintah lembur untuk masing – masing pegawai dapat berbeda untuk jam dan keterangannya. Surat perintah lembur ini juga dapat menggunakan metode approval, sehingga nantinya surat perintah lembur ini harus mendapatkan approval dari atasan terlebih dahulu.
		<br>
		<img src="./assets/img/proposal/6.jpg" alt="personal information">
		</blockquote>
		</p>
		<h4 class="indent small" style="color:#3399FF">2.7	Gaji Pokok (Basic Salary)</h4>
		<p class="big" style="text-align:justify">
		<blockquote>
		Basic Salary / Gaji Pokok setiap pegawai dapat diinput oleh user.
		<br>
		<img src="./assets/img/proposal/7.jpg" alt="personal information">
		</blockquote>
		</p>
EOD;
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

		//page8

		$pdf->AddPage();
		$pdf->Bookmark('2.8	Tunjangan dan Potongan', 1, 0, '', '', array(0,0,0));
		$pdf->Bookmark('2.9	Slip Gaji (Pay Slip)', 1, 0, '', '', array(0,0,0));
		$pdf->Bookmark('2.10 Bonus dan THR', 1, 0, '', '', array(0,0,0));

		$html = <<<EOD
		<style>
		.indent {text-indent: 30pt;}
		.indented
		   {
		   padding-left: 50pt;
		   padding-right: 50pt;
		   }
		.small {
		    line-height: 70%;
		}

		.normal {
		    line-height: 100%;
		}

		p.big {
		    line-height: 150%;
		}
		</style>
		<h4 class="indent small" style="color:#3399FF">2.8	Tunjangan dan Potongan</h4>
		<p class="big" style="text-align:justify">
		<blockquote>
		User dapat mendefinisikan sendiri tunjangan dan potongan yang ada di perusahaan baik tunjangan dalam bentuk formula, nominal uang maupun manual input. Tunjangan manual input biasanya digunakan untuk tunjangan yang berhubungan dengan incentive kerja berdasarkan bobot / jumlah produksi yang dihasilkan.
		<br>
		<img src="./assets/img/proposal/8.jpg" alt="personal information">
		</blockquote>
		</p>
		<h4 class="indent small" style="color:#3399FF">2.9	Slip Gaji (Pay Slip)</h4>
		<p class="big" style="text-align:justify">
		<blockquote>
		<br>
		<img src="./assets/img/proposal/9.jpg" alt="personal information">
		</blockquote>
		</p>
		<h4 class="indent small" style="color:#3399FF">2.10	Bonus dan THR</h4>
		<p class="big" style="text-align:justify">
		<blockquote>
		<br>
		User dapat mendefinisikan sendiri parameter bonus dan THR yang ada di perusahaan dengan kriteria range lama bekerja.
		</blockquote>
		</p>
EOD;
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

		//page9

		$pdf->AddPage();
		$pdf->Bookmark('2.11 Pajak PPh 21', 1, 0, '', '', array(0,0,0));

		$html = <<<EOD
		<style>
		.indent {text-indent: 30pt;}
		.indented
		   {
		   padding-left: 50pt;
		   padding-right: 50pt;
		   }
		.small {
		    line-height: 70%;
		}

		.normal {
		    line-height: 100%;
		}

		p.big {
		    line-height: 180%;
		}
		</style>
		<h4 class="indent small" style="color:#3399FF">2.11	Pajak PPh 21</h4>
		<p class="big" style="text-align:justify">
		<blockquote>
		Perhitungan pajak akan dilakukan secara otomatis dengan format laporan PPh 21 tahunan.
		<br>
		<img src="./assets/img/proposal/10.jpg" alt="personal information"><br>
		<img src="./assets/img/proposal/11.jpg" alt="personal information">
		</blockquote>
		</p>
EOD;

		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

		//page10

		$pdf->AddPage();
		$pdf->Bookmark('2.12 Training Management', 1, 0, '', '', array(0,0,0));
		$pdf->Bookmark('2.13 Loan Management', 1, 0, '', '', array(0,0,0));

		$html = <<<EOD
		<style>
		.indent {text-indent: 30pt;}
		.indented
		   {
		   padding-left: 50pt;
		   padding-right: 50pt;
		   }
		.small {
		    line-height: 70%;
		}

		.normal {
		    line-height: 100%;
		}

		p.big {
		    line-height: 130%;
		}
		</style>
		<h4 class="indent small" style="color:#3399FF">2.12	Training Management</h4>
		<p class="big" style="text-align:justify">
		<blockquote>
		User dapat mendaftarkan ke dalam system, untuk master training yang ada di perusahaan. Dari jenis – jenis training tersebut, user dapat membuatkan rencana training untuk per pegawai ataupun per organisasi struktur dengan jabatan tertentu. 
		</blockquote>
		</p>
		<h4 class="indent small" style="color:#3399FF">2.13	Loan Management</h4>
		<p class="big" style="text-align:justify">
		<blockquote>
		User dapat mendaftarkan jenis – jenis loan / pinjaman yang ada di perusahaan dengan parameter – parameter aturan yang telah ditentukan, seperti contoh berikut :
		<br>
		<br>
		<img src="./assets/img/proposal/12.jpg" alt="personal information"><br>
		Apabila ada karyawan yang melakukan pinjaman, user dapat mencatat ke dalam system sehingga nanti-nya setiap penggajian yangt dilakukan akan terpotong dengan angsuran yang harus dibayarkan untuk melunasi pinjaman tersebut. 
		</blockquote>
		</p>
EOD;

		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

		//page11
		$pdf->AddPage();
		$pdf->Bookmark('2.14 KPI', 1, 0, '', '', array(0,0,0));


		$html = <<<EOD
		<style>
		.indent {text-indent: 30pt;}
		.indented
		   {
		   padding-left: 50pt;
		   padding-right: 50pt;
		   }
		.small {
		    line-height: 70%;
		}

		.normal {
		    line-height: 100%;
		}

		p.big {
		    line-height: 130%;
		}
		</style>
		<p class="big" style="text-align:justify">
		<blockquote>
		<img src="./assets/img/proposal/13.jpg" alt="personal information">
		</blockquote>
		</p>
		<h4 class="indent small" style="color:#3399FF">2.14	KPI</h4>
		<p class="big" style="text-align:justify">
		<blockquote>
		User dapat mendaftarkan kategori dari KPI yang akan dinilai, kemudian dari kategori tersebut, user dapat membuatkan masing – masing kriteria penilaian nya termasuk type penilaian nya (secara manual, otomatis system, subordinate). 
		<br>
		<br>
		<img src="./assets/img/proposal/14.jpg" alt="personal information"><br>
		Dari kriteria – kriteria yang telah dimasukkan, user dapat menempelkan kriteria KPI tersebut per pegawai atau per organisasi struktur.
		</blockquote>
		</p>
EOD;

		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

		//page12
		$pdf->AddPage();
		$pdf->Bookmark('2.15 Security', 1, 0, '', '', array(0,0,0));
		$html = <<<EOD
		<style>
		.indent {text-indent: 30pt;}
		.indented
		   {
		   padding-left: 50pt;
		   padding-right: 50pt;
		   }
		.small {
		    line-height: 70%;
		}

		.normal {
		    line-height: 100%;
		}

		p.big {
		    line-height: 180%;
		}
		</style>
		<h4 class="indent small" style="color:#3399FF">2.15	Security</h4>
		<p class="big" style="text-align:justify">
		<blockquote>
		Security merupakan hal yang sangat penting didalam mengelola Payroll. Setiap user dapat dibatasi hak aksesnya untuk :<br>
		a. Pada module tertentu dan akses tertentu (add, edit, delete, view)<br>
		<img src="./assets/img/proposal/15.jpg" alt="personal information">
		<br>
		b. Pada organisasi tertentu)<br>
		<img src="./assets/img/proposal/16.jpg" alt="personal information">
		</blockquote>
		</p>
EOD;
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

		//page13
		$pdf->AddPage();

		$html = <<<EOD
		<style>
		.indent {text-indent: 30pt;}
		.indented
		   {
		   padding-left: 50pt;
		   padding-right: 50pt;
		   }
		.small {
		    line-height: 70%;
		}

		.normal {
		    line-height: 100%;
		}

		p.big {
		    line-height: 180%;
		}
		</style>
		<p class="big" style="text-align:justify">
		<blockquote>
		c. Pada grade tertentu<br>
		<img src="./assets/img/proposal/17.jpg" alt="personal information">
		</blockquote>
		</p>
EOD;

		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);


		//page14
		$pdf->AddPage();
		$pdf->Bookmark('3. System Requirement ', 0, 0, '', '', array(0,0,0));
		$pdf->Bookmark('4. Implementasi', 0, 0, '', '', array(0,0,0));
		$pdf->Bookmark('5. Team Project', 0, 0, '', '', array(0,0,0));

		$html = <<<EOD
		<style>
		.indent {text-indent: 30pt;}
		.indented
		   {
		   padding-left: 50pt;
		   padding-right: 50pt;
		   }
		.small {
		    line-height: 70%;
		}

		.normal {
		    line-height: 100%;
		}

		p.big {
		    line-height: 180%;
		}
		</style>
		<h2 style="color:#3399FF">3. System Requirement </h2>
		<p class="big" style="text-align:justify">
		<table cellspacing="0" cellpadding="1" border="1">
		    <tr>
		        <td> <b>Application Server  OS</b></td>
		        <td colspan="2"> Windows XP / Server 2003 / Server 2008 / <br> Windows 7 / 8</td>
		    </tr>    
			<tr>
		        <td> <b>Database Server OS</b></td>
		        <td colspan="2"> Windows XP / Server 2003 / Server 2008/ <br> Windows 7 / 8 / RHEL 5.1</td>
		    </tr>	
			<tr>
		        <td> <b>Other System</b></td>
		        <td colspan="2"> Oracle</td>
		    </tr>	
			<tr>
		        <td> <b></b></td>
		        <td colspan="" style="text-align:center"> <b>Application Server</b></td>
		        <td colspan="" style="text-align:center"> <b>Database Server</b></td>
		    </tr>	
			<tr>
		        <td> <b>Processor</b></td>
		        <td colspan="" style="text-align:center"> Core 2 duo </td>
		        <td colspan="" style="text-align:center"> Core 2 duo </td>
		    </tr>	
			<tr>
		        <td> <b>RAM</b></td>
		        <td colspan="" style="text-align:center"> 1 G </td>
		        <td colspan="" style="text-align:center"> 4 G </td>
		    </tr>	
			<tr>
		        <td> <b>HDD</b></td>
		        <td colspan="" style="text-align:center"> 20 GB </td>
		        <td colspan="" style="text-align:center"> 100 GB </td>
		    </tr>	
			<tr>
		        <td> <b>Nerwork Card</b></td>
		        <td colspan="" style="text-align:center"> 100/ 1 G Base T </td>
		        <td colspan="" style="text-align:center"> 100/ 1 G Base T </td>
		    </tr>
		</table>
		<h2 style="color:#3399FF">4. Implementasi</h2>
		<p class="big" style="text-align:justify" class="indent">
		Implementasi merupakan proses persiapan sistem program sampai dengan sistem tersebut dapat berjalan dan digunakan sepenuhnya oleh user (pemakai). Adapun  bagian dari Implementasi adalah sebagai berikut :<br>
		1.  Sign Kontrak<br>
		2.  Assestment dan Analisa system<br>
		3.  Modifikasi aplikasi sesuai hasil assestment dan analisa system<br>
		4.  Data Migration (Pemasukan Data)<br>
		5.  Instalasi<br>
		6.  Training <br>
		7.  Simulation<br>
		8.  Serah terima program setelah program dapat digunakan sepenuhnya
		</p>
		<h2 style="color:#3399FF">5. Team Project</h2>
		<p class="big" style="text-align:justify" class="indent">
		Team project disusun untuk mempermudah bagian implementasi dan manajemen mendapatkan informasi sehingga project yang diimplementasikan akan selesai tepat waktu. Team project akan disusun dari kedua belah pihak yaitu team dari PT. Java Consulting Indonesia dan team dari $customer. 
		</p>
EOD;
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);


		// Page 15
		$pdf->AddPage();
		$pdf->Bookmark('6. Estimated Investment', 0, 0, '', '', array(0,0,0));
		$pdf->Bookmark('6.1. Software Investment Detail', 1, 0, '', '', array(0,0,0));
		$pdf->Bookmark('6.2. Estimation Work days Implementation', 1, 0, '', '', array(0,0,0));
		$pdf->Bookmark('6.3 Other Work days Investment', 1, 0, '', '', array(0,0,0));
		$html =<<<EOD
		<style>
		.indent {text-indent: 30pt;}
		.indented
		   {
		   padding-left: 50pt;
		   padding-right: 50pt;
		   }
		.small {
		    line-height: 70%;
		}

		.normal {
		    line-height: 100%;
		}

		p.big {
		    line-height: 180%;
		}
		</style>
		<h2 style="color:#3399FF">6. Estimated Investment</h2>
		<h4 style="color:#3399FF">6.1. Software Investment Detail</h4>
		<p class="big" style="text-align:justify">
		<table cellspacing="0" cellpadding="1" border="0">
		 <tr style="background-color:#3399FF;color:white;">
		        <td style="text-align:center" width="230"><b>DESCRIPTION SOFTWARE LICENSE</b></td>
		        <td style="text-align:center" width="200"><b>Employee <br> Limit</b></td>
		        <td style="text-align:center" width="100"><b>Price (Rp.)</b></td>
		    </tr>
		$gridlic
		 <tr style="background-color:#3399FF;color:white;">
		        <td></td>
		        <td></td>
		        <td></td>
		    </tr>
		</table>
		<h4 style="color:#3399FF">6.2. Estimation Work days Implementation</h4>
		<p class="big" style="text-align:justify">
		<table cellspacing="0" cellpadding="1" border="0">
		 <tr style="background-color:#3399FF;color:white;">
		        <td style="text-align:center" width="200"><b>Description</b></td>
		        <td style="text-align:center" width="100"><b>Estimation</b></td>
		        <td style="text-align:center" width="130"><b>Rate</b></td>
		        <td style="text-align:center" width="100"><b>Total (Rp.)</b></td>
		    </tr>    	
		$gridwd			
		 <tr style="background-color:#3399FF;color:white;">
		        <td style="text-align:center"> <b>Estimation Total Implementation</b></td>
		        <td style="text-align:center"> <b>$wdqty</b></td>
		        <td style="text-align:center"> <b>$bundle</b></td>
		        <td style="text-align:right"> <b>$wdtotal</b></td>
		    </tr>
		</table>
		<h4 style="color:#3399FF">6.3 Other Work days Investment</h4>
		<p class="big" style="text-align:justify">
		Digunakan apabila adanya kustomisasi report atau kustomisasi program diluar workdays pada point 6.2 diatas. <i>(n.b. kustomisasi program hanya berlaku untuk license Enterprise Edition.)</i>
		<br>
		<table cellspacing="0" cellpadding="1" border="0">
		 <tr style="background-color:#3399FF;color:white;">
		        <td style="text-align:center" width="200"><b>Description</b></td>
		        <td style="text-align:center" width="100"><b>Estimation</b></td>
		        <td style="text-align:center" width="130"><b>Rate</b></td>
		        <td style="text-align:center" width="100"><b>Total (Rp.)</b></td>
		    </tr>    
		$gridcwd
		 <tr style="background-color:#3399FF;color:white;">
		        <td style="text-align:center"><b>Total</b></td>
		        <td style="text-align:center"><b>$cwdqty</b></td>
		        <td style="text-align:center"></td>
		        <td style="text-align:right"><b>$cwdtotal</b></td>
		    </tr>
		</table>
		</p>
EOD;

		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);





		// page16
		$pdf->AddPage();
		$pdf->Bookmark('7. Term & Condition', 0, 0, '', '', array(0,0,0));
		$html = <<<EOD
		<style>
		.indent {text-indent: 30pt;}
		.indented
		   {
		   padding-left: 50pt;
		   padding-right: 50pt;
		   }
		.small {
		    line-height: 70%;
		}

		.normal {
		    line-height: 100%;
		}

		p.big {
		    line-height: 180%;
		}
		</style>
		<h2 style="color:#3399FF">7. Term & Condition</h2>
		<p class="big" style="text-align:justify">
		$term
		</p>
EOD;
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

		// Page 17
		$pdf->AddPage();
		$pdf->Bookmark('8. Maintenance Reinstatement', 0, 0, '', '', array(0,0,0));


		$html = <<<EOD
		<style>
		.indent {text-indent: 30pt;}
		.indented
		   {
		   padding-left: 50pt;
		   padding-right: 50pt;
		   }
		.small {
		    line-height: 70%;
		}

		.normal {
		    line-height: 100%;
		}

		p.big {
		    line-height: 180%;
		}
		</style>
		<h2 style="color:#3399FF">8. Maintenance Reinstatement</h2>
		<p class="big indent" style="text-align:justify">
		Apabila client tidak mengambil maintenance software tahunan, maka nanti di kemudian hari apabila client memutuskan untuk mengambil maintenance software tahunan, client harus membayar terlebih dahulu penalty dari maintenance software tahunan yang sebelumnya tidak diambil, dengan perhitungan sebagai berikut :
		<ul>
		<li> 1+ - year lapsed	-	1.33 x total maintenance current price</li>
		<li> 2+ - year lapsed	-	2.33 x total maintenance current price</li>
		</ul>
		</p>
		<table cellspacing="0" cellpadding="1" border="0">
		 <tr>
		        <td style="text-align:center" width="230">Proposed By,<br>
		PT. Java Consulting Indonesia
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		$signer
		</td>
		        <td style="text-align:center" width="100"><br>
				</td>
		        <td style="text-align:center" width="265">Approved By,<br>
		$customer
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		_________________________
		</td>
		 </tr>
		</table>
EOD;

		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

		//Table Of Content
		$pdf->addTOCPage();

		$pdf->SetFont('helvetica', 'B', 16);
		$pdf->MultiCell(0, 0, 'Daftar Isi', 0, 'C', 0, 1, '', '', true, 0);
		$pdf->Ln();

		$pdf->SetFont('helvetica', '', 12);

		$pdf->addTOC(2, 'helvetica', '.', 'INDEX', 'B', array(128,0,0));

		$pdf->endTOCPage();

		$pdf->Output('My-File-Name.pdf', 'I');
		
	}
	
}