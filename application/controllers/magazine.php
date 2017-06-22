<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magazine extends CI_Controller {
   /**
   * Index Page for Magazine Controller
   */ 
    public function index(){
        $data = array();
        $this->load->model('Publication');
        $publication = new Publication();
        $publication->load(1);
        $data['publication'] = $publication;
        
        $this->load->model('Issue');
        $issue = new Issue();
        $issue->load(1);
        $data['issue'] = $issue;    
        
        $this->load->view('magazines');
        $this->load->view('magazine', $data);
    }
    
   /**
   * Add a Magazine
   */ 
    public function add(){
        // Populate publications
        $this->load->model('Publication');
        $publications = $this->Publication->get();
        $publication_form_options = array();
        foreach($publications as $id => $publication){
           $publication_form_options[$id] = $publication->publication_name;
        }
        $this->load->view('magazine_form', array(
            '$publication_form_options' => $publication_form_options,
        )); 
        
    }

}