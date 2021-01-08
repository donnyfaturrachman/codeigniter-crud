<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data['content'] = view('pegawai/home');
		return view('template/_template',$data);
	}

	//--------------------------------------------------------------------

}
