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
class Document extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('m_document'));
        $this->is_logged_in();
    }

    public function index($id = '') {
        if ($id != '') {
            $data['document'] = $this->m_document->get_id('document', 'no_doc', $id);
        }
        $data['documents'] = $this->m_document->get_all('document');
        $data['title'] = 'Document List';
        $this->load->view('document', $data);
    }

    public function mail() {
        $this->load->view('email/email');
    }

    public function add() {
        if ($this->input->post('status')=='') {
            $status= 'o';
        } else {
            $status = 'c';
        }
        $no_doc_space = str_replace("/","",  $this->input->post('no_doc'));
        $no_doc = str_replace(" ","", $no_doc_space);
        $data = array(
            'no_doc' => $no_doc,
            'no_doc_ori' => $this->input->post('no_doc'),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'from_date' => substr($this->input->post('from_date'),6,4).'-'.substr($this->input->post('from_date'),3,2).'-'.substr($this->input->post('from_date'),0,2),
            'to_date' => substr($this->input->post('to_date'),6,4).'-'.substr($this->input->post('to_date'),3,2).'-'.substr($this->input->post('to_date'),0,2),
            'email' => $this->input->post('email'),
            'status' => $status,
            'create_date' => date('Y-m-d'),
            'created_by' => $this->session->userdata('name')
        );

        $sql = $this->m_document->add('document', $data);
        if($sql) {
            echo "Document no ".$this->input->post('no_doc')." tersimpan";
        } else {
            echo "Gagal menyimpan data";
        }
    }
    
    // upload file
    public function upload_file() {
        $date = substr($this->input->post('from_date'),6,4).substr($this->input->post('from_date'),3,2).substr($this->input->post('from_date'),0,2);
        $title = str_replace(" ", "-", $this->input->post('title'));
        if ($this->input->post('fileLegal') !== null) {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'pdf';
            $config['file_name'] = $date.'_'.$this->input->post('title');
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('fileLegal')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error_msg', $error['error']);
            } else {
                $uploaded = $this->upload->data();
            }
        }
    }

    public function update() {
        $no_doc_space = str_replace("/","",  $this->input->post('no_doc'));
        $id = str_replace(" ","", $no_doc_space);
        if ($this->input->post('status')=='') {
            $status= 'o';
        } else {
            $status = 'c';
        }
        $data = array(
            'no_doc_ori' => $this->input->post('no_doc'),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'from_date' => substr($this->input->post('from_date'),6,4).'-'.substr($this->input->post('from_date'),3,2).'-'.substr($this->input->post('from_date'),0,2),
            'to_date' => substr($this->input->post('to_date'),6,4).'-'.substr($this->input->post('to_date'),3,2).'-'.substr($this->input->post('to_date'),0,2),
            'email' => $this->input->post('email'),
            'status' => $status,
            'last_edit_date' => date('Y-m-d'),
            'last_edited_by' => $this->input->ip_address()
        );

        $sql = $this->m_document->update('document', 'no_doc', $id, $data);
        if ($sql) {
            echo "Data telah diperbarui";
        } else {
            echo "Gagal update data";
        }
    }

    public function delete() {
        $no_doc_space = str_replace("/","",  $this->input->post('no_doc'));
        $id = str_replace(" ","", $no_doc_space);
        $sql = $this->m_document->delete('document', 'no_doc', $id);
        if ($sql) {
            echo "Data telah dihapus";
        } else {
            echo "Gagal hapus data";
        }
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

    public function close($no_doc) {
        $data = array(
            'status' => 'c'
        );
        $query = $this->m_document->update('document', 'no_doc', $no_doc, $data);
        if ($query) {
            echo "Document closed";
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
    
    public function import_from_excel() {
        
        $config['upload_path'] = APPPATH.'third_party/PHPExcel';
        $config['allowed_types'] = 'xlsx';
        $config['overwrite']= TRUE;

        $this->load->library('upload', $config); 
        if ( ! $this->upload->do_upload()) {
            echo $this->upload->display_errors();
        } else {
            $uploaded=  $this->upload->data();
            
            // set import to excel
            $this->load->library('excel');
            
            
        
            $path = APPPATH.'third_party/PHPExcel/'.$uploaded['file_name'];
            //$path = APPPATH."third_party/PHPExcel/tes.xlsx";
            
            $objReader = PHPExcel_IOFactory::createReader('Excel2007');
            $objReader->setReadDataOnly(true);
            
            $objPHPExcel = $objReader->load($path);
            
            $objWorksheet = $objPHPExcel->getActiveSheet();

            $highestRow = $objWorksheet->getHighestRow(); // e.g. 10
            //$highestColumn = $objWorksheet->getHighestColumn(); // e.g 'F'
            //$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
            
            // echo $highestColumn.$highestRow;
            
            for($row=1;$row<=$highestRow;++$row) {
                $excel_from_date = $objWorksheet->getCellByColumnAndRow(3,$row)->getValue();
                $excel_to_date = $objWorksheet->getCellByColumnAndRow(4,$row)->getValue();
                $from_date = PHPExcel_Shared_Date::ExcelToPHPObject($excel_from_date)->format('Y-m-d');
                $to_date = PHPExcel_Shared_Date::ExcelToPHPObject($excel_to_date)->format('Y-m-d');

                $data=array(
                    'no_doc' => $objWorksheet->getCellByColumnAndRow(7,$row)->getValue(),
                    'no_doc_ori' => $objWorksheet->getCellByColumnAndRow(0,$row)->getValue(),
                    'title' => $objWorksheet->getCellByColumnAndRow(1,$row)->getValue(),
                    'description' => $objWorksheet->getCellByColumnAndRow(2,$row)->getValue(),
                    'from_date' => $from_date,
                    'to_date' => $to_date,
                    'email' => $objWorksheet->getCellByColumnAndRow(5,$row)->getValue(),
                    'status' => $objWorksheet->getCellByColumnAndRow(6,$row)->getValue(),
                    'create_date' => date('Y-m-d'),
                    'created_by' => $this->session->userdata('name')
                );

                $this->m_document->add('document',$data); 
            }
            echo 'Import file success';
        }
    }
    
    public function export_to_excel() {
        $this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('document');
        $this->excel->getActiveSheet()->setCellValue('A1', 'DOCUMENT LIST');
        $this->excel->getActiveSheet()->mergeCells('A1:L1');
        $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        
        //set column width
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(50);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(50);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(25);
        $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(25);
        $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
        
        // set table header
        $this->excel->getActiveSheet()->setCellValue('A3', 'DOC NO');
        $this->excel->getActiveSheet()->setCellValue('B3', 'TITLE');
        $this->excel->getActiveSheet()->setCellValue('C3', 'DESCRIPTION');
        $this->excel->getActiveSheet()->setCellValue('D3', 'FROM DATE');
        $this->excel->getActiveSheet()->setCellValue('E3', 'TO DATE');
        $this->excel->getActiveSheet()->setCellValue('F3', 'RECIPIENT');
        $this->excel->getActiveSheet()->setCellValue('G3', 'STATUS');
        $this->excel->getActiveSheet()->setCellValue('H3', 'CREATE DATE');
        $this->excel->getActiveSheet()->setCellValue('I3', 'LAST EDIT DATE');
        $this->excel->getActiveSheet()->setCellValue('J3', 'CREATED BY');
        $this->excel->getActiveSheet()->setCellValue('K3', 'LAST EDIT BY');
        $this->excel->getActiveSheet()->setCellValue('L3', 'DOC ID');
        
        $this->excel->getActiveSheet()->getStyle('A3')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('B3')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('C3')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('D3')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('E3')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('F3')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('G3')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('H3')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('I3')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('J3')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('K3')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('L3')->getFont()->setBold(true);
        
        
        
        $document = $this->m_document->get_all('document');  
        $cellRow=3;
        
        foreach ($document->result() as $row) { 
            
            $cellRow++;
            
            $this->excel->getActiveSheet()->setCellValue('A' . $cellRow, strtoupper($row->no_doc_ori));
            $this->excel->getActiveSheet()->setCellValue('B' . $cellRow, strtoupper($row->title));
            $this->excel->getActiveSheet()->setCellValue('C' . $cellRow, strtoupper($row->description));
            $this->excel->getActiveSheet()->setCellValue('D' . $cellRow, date('m/d/Y', strtotime($row->from_date)));
            $this->excel->getActiveSheet()->setCellValue('E' . $cellRow, date('m/d/Y', strtotime($row->to_date)));
            $this->excel->getActiveSheet()->setCellValue('F' . $cellRow, $row->email);
            $this->excel->getActiveSheet()->setCellValue('G' . $cellRow, $row->status);
            $this->excel->getActiveSheet()->setCellValue('H' . $cellRow, $row->create_date);
            $this->excel->getActiveSheet()->setCellValue('I' . $cellRow, $row->last_edit_date);
            $this->excel->getActiveSheet()->setCellValue('J' . $cellRow, strtoupper($row->created_by));
            $this->excel->getActiveSheet()->setCellValue('K' . $cellRow, strtoupper($row->last_edited_by));
            $this->excel->getActiveSheet()->setCellValue('L' . $cellRow, strtoupper($row->no_doc));
        }

        $filename = 'documents.xlsx';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="' . $filename . '"'); //tell the browser what's the filename
        header('Cache-Control: max-age=0'); // no chache
        //save it to Excel5 format(excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want ti save it as .XLSX excel 2007 format

        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
        $objWriter->save('php://output');
    }
    
    

}
