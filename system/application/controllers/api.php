<?php



require(APPPATH.'/libraries/REST_Controller.php');



class Api extends REST_Controller {

    function search_get(){
        $this->load->model(array('languages','pastes'));
	$search = $this->get('term');
	$onlySubject = $this->get('subject');
	if( "$onlySubject" == "" ){ $this->db->select('pid, title, name, raw'); }
	if( "$onlySubject" == "only" ){ $this->db->select('pid, title');}
	$this->db->where('MATCH (name,title,raw) AGAINST ("'. $search .'" IN BOOLEAN MODE)', NULL, FALSE);
        $searchQuery = $this->db->get('pastes');
	$searchQueryNumRows=$searchQuery->num_rows();
	if($searchQueryNumRows == 0){
	$toto=array("Results"=>"NoResults.");
        $this->response($toto, 400);
	} else {
	$searchData = $searchQuery->result_array();
        $this->response($searchData,200);
	}
	}

    function list_get(){
        $this->load->model(array('languages','pastes'));
        $this->db->select('pid, title, raw');
        $listQuery = $this->db->get('pastes');
	$listData = $listQuery->result_array();
        $this->response($listData,200);
        }

    function raw_get(){
	$pasteid = $this->get('pid');
        $this->load->model(array('languages','pastes'));
        $this->db->where('pid', $pasteid);
        $query = $this->db->get('pastes');
                foreach ($query->result_array() as $row)
                {
                        $data['raw'] = $row['raw'];
                }
            $this->response($data,200);
        }

    function paste_get(){
	$pasteid = $this->get('pid');
        $this->load->model(array('languages','pastes'));
        $this->db->where('pid', $pasteid);
        $query = $this->db->get('pastes');
                foreach ($query->result_array() as $row)
                {
                    $data['title'] = $row['title'];
                        $data['pid'] = $row['pid'];
                        $data['name'] = $row['name'];
                        $data['raw'] = $row['raw'];
                }
            $this->response($data,200);
        }

    function addme_get(){
		$data['created'] = time();
		$data['name'] = htmlspecialchars($this->get('name'));
		$data['title'] = htmlspecialchars($this->get('title'));
		$data['lang'] = htmlspecialchars($this->get('lang'));
		$data['expire'] = $this->get('expire');
		$data['raw'] = htmlspecialchars($this->get('raw'));
        $this->response($data,200);
    }

}

?>  
