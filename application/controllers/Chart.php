<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
	}
	 
	function tomi()
	{
		$chartData=file_get_contents('assets/visin.json');
		$chartData=json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $chartData), true);

//Diagram satu		
	$res=array();
	$keysArray=array();
		foreach($chartData as $row)
	{
		$jenis=(int)$row['nilai'];
			if($jenis!=0)
		{
			if(!isset($res[$row['jenis']]))
		{
				$res[$row['jenis']]=array($row['nilai']);
				array_push($keysArray,$row['jenis']);
		}
		else{
				array_push($res[$row['jenis']], $row['nilai']);
			}
		}
	}
		$PieChartData=array();
		foreach($keysArray as $row)
		{
			$PieChartData[]=[$row,array_sum($res[$row])];
		}
		$data['PieChartTitle']='Jumlah unggas berdasarkan jenis unggas di kabupaten seragen dari tahun 2011 - 2015';
		$data['PieChartData']=json_encode($PieChartData);

//Diagram dua
	$totaltahun=[array('TAHUN','JUMLAH UNGGAS',array('role'=>'style') )];
	$totaldata=array();
		foreach($chartData as $row)
	{
		$tom=$row['tahun'];
		
			if(!isset($totaldata[$tom]))
		{
			$totaldata[$tom]=[$row['nilai']];
		}
		else{
				array_push($totaldata[$tom],$row['nilai']);
			}
	}
	$tom=array_keys($totaldata);
		foreach(array_keys($totaldata) as $row)
	{
		$dat =[ (double)$row,array_sum($totaldata[$row]),'Jumlah'];
		array_push($totaltahun, $dat);
	}
		$data['BarChartTitle']= ' Jumlah Unggas Pertahun di kabupaten seragen ';
		$data['BarChartData']=json_encode($totaltahun);

//Diagram tiga
	$kecadata=[array('Kecamatan', 'JUMLAH UNGGAS')];
	$totaldata1=array();
		foreach($chartData as $row)
	{
		$bot=$row['kecamatan'];
	
		if(!isset($totaldata1[$bot]))
	{
		$totaldata1[$bot]=[$row['nilai']];
	}
	else{
			array_push($totaldata1[$bot],$row['nilai']);
		}
	}
	$bos=array_keys($totaldata1);
		foreach(array_keys($totaldata1) as $row)
	{
		$dat =[ $row,array_sum($totaldata1[$row])];
		array_push($kecadata, $dat);
	}
	$data['lineChartTitle']= ' Jumlah Unggas perkecamatan di kabupaten seragen ';
	$data['LineChartData']=json_encode($kecadata);


//Diagram empat
	$kecam=[array('Kecamatan', 'JUMLAH TELUR')];
	$totaldata2=array();
		foreach($chartData as $row)
	{
		$bot1=$row['kecamatan'];
		
		if(!isset($totaldata2[$bot1]))
	{
		$totaldata2[$bot1]=[$row['telur']];
	}
	else{
			array_push($totaldata2[$bot1],$row['telur']);
		}	
	}
	$bot1=array_keys($totaldata2);
		foreach(array_keys($totaldata2) as $row)
	{
		$dat =[ $row,array_sum($totaldata2[$row])];
		array_push($kecam, $dat);
	}
	$data['lineChartTitle1']= ' Jumlah Telur perkecamatan di kabupaten seragen ';
	$data['LineChartData1']=json_encode($kecam);

//Diagram lima
	$kecam1=[array('Tahun', 'JUMLAH TELUR')];
	$totaldata3=array();
		foreach($chartData as $row)
	{
		$bot1=$row['tahun'];
		
		if(!isset($totaldata3[$bot1]))
	{
		$totaldata3[$bot1]=[$row['telur']];
	}
	else{
			array_push($totaldata3[$bot1],$row['telur']);
		}	
	}
	$bot1=array_keys($totaldata3);
		foreach(array_keys($totaldata3) as $row)
	{
		$dat =[ $row,array_sum($totaldata3[$row])];
		array_push($kecam1, $dat);
	}
	$data['lineChartTitle2']= ' Jumlah Telur pertahun di kabupaten seragen ';
	$data['LineChartData2']=json_encode($kecam1);

		$this->load->view('tomi', $data);
	}
}
