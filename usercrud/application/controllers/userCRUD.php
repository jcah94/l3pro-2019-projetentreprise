<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class userCRUD extends CI_Controller {


   public $userCRUD;


   // /**
   //  * Get All Data from this method.
   //  *
   //  * @return Response
   // */
   public function __construct() {
      parent::__construct();


      $this->load->library('form_validation');
      $this->load->library('session');
      $this->load->model('userCRUDModel');


      $this->userCRUD = new userCRUDModel;
   }


   // /**
   //  * Display Data this method.
   //  *
   //  * @return Response
   // */
   public function index()
   {
       $data['data'] = $this->userCRUD->get_userCRUD();


       $this->load->view('theme/header');
       $this->load->view('userCRUD/list',$data);
       $this->load->view('theme/footer');
   }

   //
   // /**
   //  * Show Details this method.
   //  *
   //  * @return Response
   // */
   public function show($id)
   {
      $user = $this->userCRUD->find_user($id);


      $this->load->view('theme/header');
      $this->load->view('userCRUD/show',array('user'=>$user));
      $this->load->view('theme/footer');
   }

   //
   // /**
   //  * Create from display on this method.
   //  *
   //  * @return Response
   // */
   public function create()
   {
      $this->load->view('theme/header');
      $this->load->view('userCRUD/create');
      $this->load->view('theme/footer');
   }

   //
   // /**
   //  * Store Data from this method.
   //  *
   //  * @return Response
   // */
   public function store()
   {
        $this->form_validation->set_rules('username', 'Utilisateur', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');


        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('userCRUD/create'));
        }else{
           $this->userCRUD->insert_user();
           redirect(base_url('userCRUD'));
        }
    }

   //
   // /**
   //  * Edit Data from this method.
   //  *
   //  * @return Response
   // */
   public function edit($id)
   {
       $user = $this->userCRUD->find_user($id);


       $this->load->view('theme/header');
       $this->load->view('userCRUD/edit',array('user'=>$user));
       $this->load->view('theme/footer');
   }


   // /**
   //  * Update Data from this method.
   //  *
   //  * @return Response
   // */
   public function update($id)
   {
        $this->form_validation->set_rules('username', 'Utilisateur', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');


        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('userCRUD/edit/'.$id));
        }else{
          $this->userCRUD->update_user($id);
          redirect(base_url('userCRUD'));
        }
   }


   // /**
   //  * Delete Data from this method.
   //  *
   //  * @return Response
   // */
   public function delete($id)
   {
       $user = $this->userCRUD->delete_user($id);
       redirect(base_url('userCRUD'));
   }
}
