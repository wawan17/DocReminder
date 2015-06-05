<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->output->set_header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
        $this->output->set_header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', FALSE);
        $this->output->set_header('Pragma: no-cache'); 
    }

    public function is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if(!isset($is_logged_in) || $is_logged_in != true)
        {
            redirect('home');
        }  
    }
    
    protected function _view($view, $data) {
        $this->load->model(array('m_module_user','m_page','m_user'));
        //$data['menu']=  $this->m_module_user->get_menu_id($this->session->userdata('username'));

        $this->load->view('parts/header',$data);
        //$this->load->view('parts/menu',$data);
        $this->load->view($view, $data);
        $this->load->view('parts/footer');
    }
    
    protected function _get_id($model, $tbl, $field, $first_number, $prefix_id_length, $number_length, $number_format) {
        /* Get ajax */
        $id=  $this->input->post('id');
        if (isset($_POST['id'])) { 
            $auto_code=  $this->$model->get_max_id($tbl,$field,$id); 
            foreach ($auto_code->result() as $result) {
                $code=$result->$field;
                if ($code=='') {
                    echo $id.$first_number;
                } else {
                    $code_text=substr($code,0,$prefix_id_length);
                    $code_num=substr($code,$prefix_id_length,$number_length);
                    $code_num_plus=(int)$code_num+1;
                    $code_num_plus_format=  sprintf($number_format,$code_num_plus);
                    echo $code_text.$code_num_plus_format;
                }
            }
            exit();
        }
        /* End Get ID ajax */
    }
    
    //check record exists
    protected function _check_record($model, $tbl, $field, $id) {
        return $this->$model->check_record_exists($tbl, $field, $id);
    }
    
    //check ticket expired
    protected function _check_ticket_expire($model, $tbl, $field, $id) {
        $sql=$this->$model->check_ticket_expire($tbl, $field, $id);
        foreach ($sql->result() as $result) {
            $date=$result->printed_date;
            $today=date('Y-m-d');
            if ($date==$today) {
                $stat=1;
            } else {
                $stat=2;
            }
            return $stat;
        }
    }
    
    //alert
    protected function _alert($text, $url) {
        echo '<script type="text/javascript">'; 
        echo 'alert("'.$text.'");'; 
        echo 'window.location.href = "'.$url.'";';
        echo '</script>';
    }
    
    //print
    protected function _print($print_url, $url) {
        echo '<script type="text/javascript">'; 
        echo 'var w=window.open("'.$print_url.'")'; 
        echo 'w.window.print()';
        echo 'window.location.href = "'.$url.'";';
        echo '</script>';
    }



}


