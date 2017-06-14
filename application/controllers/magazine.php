<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magazine extends CI_Controller {
   /**
   * Index Page for Magazine Controller
   */ 
    public function index(){
        $this->load->model('Publication');
        $this->Publication->publication_name = 'Sandy Shore';
        $this->Publication->save();
        echo '<tt>e<pre>'. var_export($this->Publication, TRUE).'</pre></tt>';
        
        $this->load->model('Issue');
        $issue = new Issue();
        $issue->publication_id = $this->Publication->publication_id;
        $issue->issue_number = 2;
        $issue->issue_date_publication = date('2013-02-01');
        $issue.save();
        
         echo '<tt>e<pre>'. var_export($issue, TRUE).'</pre></tt>';
        
        $this->load->view('magazines');
    }

}