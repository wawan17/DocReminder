<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of report
 *
 * @author wawan.setiawan
 */
class report extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('fpdf');
        $this->load->model(array('m_kas_penerimaan', 'm_kas_pengeluaran', 'm_kode_perkiraan'));
    }

    /*
     * Reporting
     */

    public function laporan_penerimaan_kas() {
        $data['rpt_title'] = 'Laporan Penerimaan Kas';
        $data['report'] = $this->m_kas_penerimaan->get_all_penerimaan();
        $this->load->view('reports/rpt_penerimaan_kas', $data);
    }

    public function laporan_pengeluaran_kas() {
        $data['rpt_title'] = 'Laporan Pengeluaran Kas';
        $data['report'] = $this->m_kas_pengeluaran->get_all_pengeluaran();
        $this->load->view('reports/rpt_pengeluaran_kas', $data);
    }

    public function laporan_saldo_kas() {
        $data['rpt_title'] = 'Laporan Saldo Kas';
        $data['report'] = $this->m_kas_penerimaan->get_union();
        $this->load->view('reports/rpt_saldo_kas', $data);
    }

    public function cetak_bukti_penerimaan($no_bkm='') {
        define('FPDF_FONTPATH', $this->config->item('fonts_path'));

        $data['title'] = 'Laporan Penerimaan Kas';
        $data['report'] = $this->m_kas_penerimaan->get_id('penerimaankas', 'no_bkm', $no_bkm);
        $this->load->view('reports/cetak_penerimaan_kas', $data);
    }
    
    public function cetak_bukti_pengeluaran($no_bkk='') {
        define('FPDF_FONTPATH', $this->config->item('fonts_path'));

        $data['title'] = 'Laporan Pengeluaran Kas';
        $data['report'] = $this->m_kas_pengeluaran->get_id('pengeluarankas', 'no_bkk', $no_bkk);
        $this->load->view('reports/cetak_pengeluaran_kas', $data);
    }

}
