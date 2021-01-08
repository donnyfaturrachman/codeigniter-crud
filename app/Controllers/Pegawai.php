<?php namespace App\Controllers;

class Pegawai extends BaseController
{
    public function __construct() {
 
        // Memanggil form helper
        helper('form');
    }

	public function index()
    {	
        $db = \Config\Database::connect();
        $builder = $db->table('pegawai'); 
        $query = $builder->get();
        $hasil['table'] ='';
        $no=1;
        foreach ($query->getResult('array') as $row)
        {			
            $hasil['table'] .='<tr>
                                <td>'.$no++.'</td>
                                <td>'.$row['nip'].'</td>
                                <td>'.$row['name'].'</td>
                                <td>'.$row['email'].'</td>
                                <td><img src="'.base_url().'/uploads/'.$row['path'].'" width="100"></td>
                                <td>
                                    <button type="button" class="btn btn-xs btn-success edit" data-id="'.$row['id'].'" title="Edit"><i class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-xs btn-danger hapus" data-id="'.$row['id'].'" title="Hapus"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>';
        }    	
        if (!$this->validate([]))
        {
            $hasil['validation'] = $this->validator;
        }
        $data['script'] = view('pegawai/script');
        $data['content'] = view('pegawai/index',$hasil);
        return view('template/_template',$data);
    }

	public function simpan()
	{	
		if ($this->request->getPost('paths')) {
	    	if ($_FILES['path']['name'] != "") {
		        $validated = $this->validate([
		            'path' => 'uploaded[path]|mime_in[path,image/jpg,image/jpeg,image/gif,image/png]|max_size[path,1024]'
		        ]);
	    	} else {
	    		$validated = true;
	    	}
		} else {
	        $validated = $this->validate([
	            'path' => 'uploaded[path]|mime_in[path,image/jpg,image/jpeg,image/gif,image/png]|max_size[path,1024]'
	        ]);
		}

        if ($validated == FALSE) {
             
            // Kembali ke function index supaya membawa data uploads dan validasi
            return $this->index();
 
        } else {
		    $db = \Config\Database::connect();
		    $builder = $db->table('pegawai'); 	

		    if ($this->request->getPost('paths')) {
		    	if ($_FILES['path']['name'] != "") {
		    		$avatar = $this->request->getFile('path');
		            $avatar->move(ROOTPATH . 'public/uploads');
		            $path = $avatar->getName();
		    	} else {
		    		$path = $this->request->getPost('paths');
		    	}
		    } else {
	            $avatar = $this->request->getFile('path');
	            $avatar->move(ROOTPATH . 'public/uploads');
	            $path = $avatar->getName();
		    }

		    $data = array(
		    		'nip' => $this->request->getPost('nip'),
		            'name' => $this->request->getPost('name'),
		            'email' => $this->request->getPost('email'),
		            'gender'  => $this->request->getPost('gender'),
		            'hobby'  => $this->request->getPost('hobby'),
		            'path'  => $path
		    );
		    // echo "<pre>";var_dump($data);exit();
		    if($this->request->getPost('id')==''){
		        $builder->insert($data);
		    }else{
		        $builder->set($data);
		        $builder->where('id',$this->request->getPost('id'));
		        $builder->update();
		    }		
		    return redirect()->to(''.base_url().'/pegawai');
        }
	}

	public function edit($id)
	{		
	    $db = \Config\Database::connect();
	    $query = $db->query("SELECT * from pegawai where id=$id");
	    $hasil = $query->getFirstRow();
	    echo json_encode($hasil);
	}

	public function hapus($id)
	{
	    $db = \Config\Database::connect();
	    $builder = $db->table('pegawai'); 
	    $builder->where('id',$id);
	    $builder->delete();
	}
}