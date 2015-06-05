<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Document
 *
 * @author wawan.setiawan
 */
class Outside extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('m_document'));
        //$this->is_logged_in();
    }

    public function index() {
        $this->load->view('outside');
    }

    public function mail() {
        $this->load->view('email/email');
    }

    public function check_document() {
        $today = date('Y-m-d', strtotime("+1 month"));
        $day15 = date('Y-m-d', strtotime("+15 day"));
        $day7 = date('Y-m-d', strtotime("+7 day"));
        $newer = new DateTime(date('Y-m-d'));

        $document = $this->m_document->get_all_open_doc('document');
        foreach ($document->result() as $row) {
            $no_doc = $row->no_doc;
            $title = $row->title;
            $description = $row->description;
            $from_date = $row->from_date;
            $to_date = $row->to_date;
            $email = $row->email;
            $status = $row->status;

            $to_date_current = new DateTime($to_date);

            if ($today == $to_date) {
                $day_to_expire = 30;
            } else if ($day15 == $to_date) {
                $day_to_expire = 15;
            } else if ($day7 == $to_date) {
                $day_to_expire = 7;
            } else if (($newer >= $to_date_current) == 1) {
                $day_to_expire = 0;
            }

            if (($today == $to_date) || ($day15 == $to_date) || ($day7 == $to_date) || (($newer >= $to_date_current)) == 1) {
                $message = array($no_doc, $title, $description, $from_date, $to_date, $email, $status);
                $this->send_mail($email, $title, $message, $day_to_expire);
            }
        }
        //echo $day15."<br>"; echo $day7."<br>";
    }

    public function confirm() {
        $no_doc = $this->input->get('d');
        $q = $this->m_document->get_id('document', 'no_doc', $no_doc);
        foreach ($q as $r) {
            $stat = $r->status;
        }
        if ($stat == 'o') {
            $this->load->view('confirm');
        } else {
            $this->load->view('has_confirm');
        }
    }

    public function confirm_add() {
        $no_doc = $this->input->get('d');
        $q = $this->m_document->get_id('document', 'no_doc', $no_doc);
        foreach ($q as $r) {
            $stat = $r->status;
        }
        if ($stat == 'o') {
            $this->load->view('confirm_add');
        } else {
            $this->load->view('has_confirm');
        }
    }

    public function close() {
        $no_doc = $this->input->post('no_doc');
        $staff_name = $this->input->post('staff_name');
        $data = array(
            'status' => 'c',
            'last_edit_date' => date('Y-m-d'),
            'last_edited_by' => $staff_name . ' : ' . $this->input->ip_address()
        );
        $query = $this->m_document->update('document', 'no_doc', $no_doc, $data);
        if ($query) {
            $data['no_doc'] = $no_doc;
            $data['staff_name'] = $staff_name;
            $data['ip'] = $this->input->ip_address();
            $this->load->view('has_confirm', $data);
        } else {
            echo "Transaction failed. please try again";
        }
    }

    public function contract_continue() {
        $no = $this->input->post('no_doc');

        $data = array(
            'from_date' => substr($this->input->post('from_date'),6,4).'-'.substr($this->input->post('from_date'),3,2).'-'.substr($this->input->post('from_date'),0,2),
            'to_date' => substr($this->input->post('to_date'),6,4).'-'.substr($this->input->post('to_date'),3,2).'-'.substr($this->input->post('to_date'),0,2),
            'last_edit_date' => date('Y-m-d'),
            'last_edited_by' => $this->input->post('staff_name') . ' : ' . $this->input->ip_address()
        );

        $sql = $this->m_document->update('document', 'no_doc', $no, $data);
        if ($sql) {
            $data['no_doc'] = $this->input->post('no_doc');
            $data['staff_name'] = $this->input->post('staff_name');
            $data['ip'] = $this->input->ip_address();
            $this->load->view('has_update', $data);
        } else {
            echo "Transaction failed. please try again";
        }
    }

    private function send_mail($to, $subject, $message, $day_to_expire) {
        $data['day_to_expire'] = $day_to_expire;
        $data['no_doc'] = $message[0];
        $data['title'] = $message[1];
        $data['description'] = $message[2];
        $data['from_date'] = $message[3];
        $data['to_date'] = $message[4];
        $data['email'] = $message[5];
        $data['status'] = $message[6];

        $this->load->library('email');

        $messages = $this->load->view('email/email', $data, TRUE);

        $this->email->clear();

        $this->email->to($to);
        $this->email->from('admin.it@mpm-rent.com');
        $this->email->subject($subject);
        $this->email->message($messages);
        $this->email->send();

        echo $this->email->print_debugger();
    }

}
