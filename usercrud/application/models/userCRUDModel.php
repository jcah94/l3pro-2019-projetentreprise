<?php


class userCRUDModel extends CI_Model{


    public function get_userCRUD(){
        if(!empty($this->input->get("search"))){
          $this->db->like('username', $this->input->get("search"));
          $this->db->or_like('email', $this->input->get("search"));
        }
        $query = $this->db->get("user");
        return $query->result();
    }


    public function insert_user()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email')
        );
        return $this->db->insert('user', $data);
    }


    public function update_user($id)
    {
        $data=array(
            'username' => $this->input->post('username'),
            'email'=> $this->input->post('email')
        );
        if($id==0){
            return $this->db->insert('user',$data);
        }else{
            $this->db->where('id',$id);
            return $this->db->update('user',$data);
        }
    }


    public function find_user($id)
    {
        return $this->db->get_where('user', array('id' => $id))->row();
    }


    public function delete_user($id)
    {
        return $this->db->delete('user', array('id' => $id));
    }
}
?>
