<?php

use Dompdf\Options;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

defined('BASEPATH') or exit('No direct script access allowed');

class Operator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model('admin_model');
    }

    public function index()
    {
        if (isset($_SESSION['id_user'])) {
            $data['title'] = "Dashboard Operator";
            $data['notif'] = $this->admin_model->hitungNew();
            $data['rencana'] = $this->admin_model->getRencanaByBulan();
            //CHART
            $data['lapor'] = $this->admin_model->getChartVol();
            $data['bln'] = $this->admin_model->getCharVol2();
            $this->load->view('headfoot/header_operator', $data);
            $this->load->view('headfoot/navbar_dash_operator', $data);
            $this->load->view('operator/index', $data);
        } else {
            redirect('CLogin/logout');
        }
    }

    //RENCANA PERJADIN
    public function rencana_perjadin($id)
    {
        if (isset($_SESSION['id_user'])) {
            $data['title'] = "Rencana Perjadin";
            $data['notif'] = $this->admin_model->hitungNew();
            $data['rencana'] = $this->admin_model->getRencanaByIdUser($id);
            $this->load->view('headfoot/header_operator', $data);
            $this->load->view('headfoot/navbar_dash_operator', $data);
            $this->load->view('operator/rencana_perjadin', $data);
            $this->load->view('headfoot/footer', $data);
        } else {
            redirect('CLogin/logout');
        }
    }

    public function detail_rencana($id)
    {
        if (isset($_SESSION['id_user'])) {
            $data['title'] = "Detail Rencana Perjadin";
            $data['notif'] = $this->admin_model->hitungNew();
            $data['rencana'] = $this->admin_model->getRencanaById($id);
            $this->load->view('headfoot/header_operator', $data);
            $this->load->view('headfoot/navbar_dash_operator', $data);
            $this->load->view('operator/detail_rencana', $data);
            $this->load->view('headfoot/footer', $data);
        } else {
            redirect('CLogin/logout');
        }
    }

    public function tambah_laporan($id)
    {
        if (isset($_SESSION['id_user'])) {
            $this->admin_model->proses_tambah_laporan();
            echo "<script>alert('Anda berhasil menambah data');</script>";
            redirect('Operator/detail_rencana/' . $id, 'refresh');
        } else {
            redirect('CLogin/logout');
        }
    }

    public function tambah_rencana_perjadin()
    {
        if (isset($_SESSION['id_user'])) {

            $data['title'] = 'Tambah Rencana Perjadin';
            $data['notif'] = $this->admin_model->hitungNew();
            $data['output'] = $this->admin_model->groupByOutputRencana();

            $this->form_validation->set_rules('kegiatan', 'kegiatan', 'required');
            $this->form_validation->set_rules('total_volume', 'total_volume', 'required');
            $this->form_validation->set_rules('tanggal_berangkat', 'tanggal_berangkat', 'required');
            $this->form_validation->set_rules('tanggal_pulang', 'tanggal_pulang', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('headfoot/header_operator', $data);
                $this->load->view('headfoot/navbar_dash_operator', $data);
                $this->load->view('operator/tambah_rencana_perjadin', $data);
            } else {
                $this->admin_model->proses_tambah_rencana();
                echo "<script>alert('Anda berhasil menambah data');</script>";
                redirect('Operator/rencana_perjadin/' . $_SESSION['id_user'], 'refresh');
            }
        } else {
            redirect('CLogin/logout');
        }
    }

    public function edit_rencana($id)
    {
        if (isset($_SESSION['id_user'])) {

            $data['title'] = 'Edit Rencana Perjadin';
            $data['rencana'] = $this->admin_model->getRencanaById($id);

            $this->form_validation->set_rules('tanggal_berangkat', 'tanggal_berangkat', 'required');
            $this->form_validation->set_rules('tanggal_pulang', 'tanggal_pulang', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('headfoot/header_operator', $data);
                $this->load->view('headfoot/navbar_dash_operator', $data);
                $this->load->view('operator/edit_rencana', $data);
            } else {
                $this->admin_model->proses_edit_rencana();
                echo "<script>alert('Anda berhasil mengedit data');</script>";
                redirect('Operator/rencana_perjadin/' . $_SESSION['id_user'], 'refresh');
            }
        } else {
            redirect('CLogin/logout');
        }
    }

    public function hapus_rencana($id)
    {
        if (isset($_SESSION['id_user'])) {

            if ($this->admin_model->proses_hapus_rencana($id)) {
                $this->session->set_flashdata('hapus_rencana', true);
            } else {
                $this->session->set_flashdata('hapus_rencana', false);
            }
            echo "<script>alert('Data Berhasil Dihapus :)');</script>";
            redirect('Operator/rencana_perjadin/' . $_SESSION['id_user'], 'refresh');
        } else {
            redirect('CLogin/logout');
        }
    }

    public function select_kegiatan_output()
    {
        $id = $this->input->post('id');
        $data = $this->admin_model->getKegiatanByOutput($id);
        echo json_encode($data);
    }

    public function hitung_volume_rencana()
    {
        $tanggal_berangkat = $_POST['tanggal_berangkat'];
        $tanggal_pulang = $_POST['tanggal_pulang'];
        $tgm = strtotime($tanggal_berangkat);
        $tgs = strtotime($tanggal_pulang);
        $abs = abs($tgs - $tgm);
        $volume = floor($abs / (60 * 60 * 24) + 1);

        echo json_encode($volume);
    }

    public function select_kegiatan_id()
    {
        $id = $this->input->post('v1');
        $data = $this->admin_model->getKegiatanById1($id);
        echo json_encode($data);
    }

    //RIWAYAT PERJADIN
    public function riwayat_perjadin($id)
    {
        if (isset($_SESSION['id_user'])) {
            $data['title'] = "Riwayat Perjadin";
            $data['rencana'] = $this->admin_model->getRencanaByIdUser($id);
            $this->load->view('headfoot/header_operator', $data);
            $this->load->view('headfoot/navbar_dash_operator', $data);
            $this->load->view('operator/riwayat_perjadin', $data);
            $this->load->view('headfoot/footer', $data);
        } else {
            redirect('CLogin/logout');
        }
    }

    public function detail_riwayat($id)
    {
        if (isset($_SESSION['id_user'])) {
            $data['title'] = "Detail Riwayat Perjadin";
            $data['rencana'] = $this->admin_model->getRencanaById($id);
            $this->load->view('headfoot/header_operator', $data);
            $this->load->view('headfoot/navbar_dash_operator', $data);
            $this->load->view('operator/detail_riwayat', $data);
            $this->load->view('headfoot/footer', $data);
        } else {
            redirect('CLogin/logout');
        }
    }

    //PENGATURAN AKUN
    public function pengaturan_akun($id)
    {
        if (isset($_SESSION['id_user'])) {

            $data['title'] = 'Pengaturan Akun';
            $data['user'] = $this->admin_model->getPenggunaById($id);

            $this->form_validation->set_rules('nama', 'nama', 'required');
            $this->form_validation->set_rules('nip', 'nip', 'required');
            $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('pendidikan', 'pendidikan', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('headfoot/header_operator', $data);
                $this->load->view('headfoot/navbar_dash_operator', $data);
                $this->load->view('operator/pengaturan_akun', $data);
                $this->load->view('headfoot/footer', $data);
            } else {
                $this->admin_model->proses_edit_pengguna();
                echo "<script>alert('Anda berhasil mengedit akun');</script>";
                redirect('operator/pengaturan_akun/' . $id, 'refresh');
            }
        } else {
            redirect('CLogin/logout');
        }
    }

    //CALENDER DASHBOARD
    public function getTanggal()
    {
        $event_data = $this->admin_model->getCal();
        foreach ($event_data as $row) {
            $data[] = array(
                'id' => $row['id_rencana'],
                'title' => $row['nama'],
                'start' => $row['tanggal_berangkat'],
                'end' => $row['tanggal_pulang']
            );
        }
        echo json_encode($data);
    }

    public function filterCetak()
    {
        if (isset($_SESSION['id_user'])) {
            $data['title'] = "Filter Cetak";
            $data['rencana'] = $this->admin_model->getRiwayat();
            $this->load->view('headfoot/header_operator', $data);
            $this->load->view('headfoot/navbar_dash_operator', $data);
            $this->load->view('operator/form_filter');
            $this->load->view('headfoot/footer', $data);
        } else {
            redirect('CLogin/logout');
        }
    }

    public function filterExport()
    {
        if (isset($_SESSION['id_user'])) {
            $data['title'] = "Filter Export";
            $data['rencana'] = $this->admin_model->getRiwayat();
            $this->load->view('headfoot/header_operator', $data);
            $this->load->view('headfoot/navbar_dash_operator', $data);
            $this->load->view('operator/form_filter_export');
            $this->load->view('headfoot/footer', $data);
        } else {
            redirect('CLogin/logout');
        }
    }

    public function prosesCetak()
    {
        if (isset($_SESSION['id_user'])) {
            $data['title'] = "Filter Cetak";
            $data['rencana'] = $this->admin_model->getRiwayat();

            $this->form_validation->set_rules('bulan', 'bulan', 'required');
            $this->form_validation->set_rules('tahun', 'tahun', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('headfoot/header_operator', $data);
                $this->load->view('headfoot/navbar_dash_operator', $data);
                $this->load->view('operator/form_filter');
                $this->load->view('headfoot/footer', $data);
            } else {
                $data['data'] = $this->admin_model->filterCetak();
                $this->load->library('pdf');

                $this->pdf->setPaper('A4', 'landscape');
                $this->pdf->filename = "laporan_perjadin.pdf";
                $this->pdf->set_option('isRemoteEnabled', true);
                $this->pdf->load_view('operator/pdf_perjadin', $data);
            }
        } else {
            redirect('CLogin/logout');
        }
    }

    public function prosesExport()
    {
        if (isset($_SESSION['id_user'])) {
            $data['title'] = "Filter Export";
            $data['rencana'] = $this->admin_model->getRiwayat();

            $this->form_validation->set_rules('bulan', 'bulan', 'required');
            $this->form_validation->set_rules('tahun', 'tahun', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('headfoot/header_operator', $data);
                $this->load->view('headfoot/navbar_dash_operator', $data);
                $this->load->view('operator/form_filter_export');
                $this->load->view('headfoot/footer', $data);
            } else {
                header("Content-type: application/vnd-ms-excel");
                header("Content-Disposition: attachment; filename=Laporan_Perjadin.xls");

                $data['data'] = $this->admin_model->filterCetak();
                $this->pdf->load_view('operator/excel_perjadin', $data);
            }
        } else {
            redirect('CLogin/logout');
        }
    }

    public function export()
    {
        if (isset($_SESSION['id_user'])) {
            $data['title'] = "Filter Export";
            $data['rencana'] = $this->admin_model->getRiwayat();

            $this->form_validation->set_rules('bulan', 'bulan', 'required');
            $this->form_validation->set_rules('tahun', 'tahun', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('headfoot/header_operator', $data);
                $this->load->view('headfoot/navbar_dash_operator', $data);
                $this->load->view('operator/form_filter_export');
                $this->load->view('headfoot/footer', $data);
            } else {
                $semua_pengguna = $this->admin_model->filterCetak3()->result();
                $nol = $this->admin_model->filterCetak3()->num_rows();

                if ($nol > 0) {

                    $spreadsheet = new Spreadsheet;

                    foreach ($semua_pengguna as $p) {
                        $spreadsheet->setActiveSheetIndex(0)
                            ->mergeCells('A2:F2')
                            ->mergeCells('A3:F3')
                            ->setCellValue('A2', 'REKAPITULASI PERJALANAN DINAS PEGAWAI')
                            ->setCellValue('A3', 'BADAN PUSAT STATISTIK KOTA MALANG')
                            ->setCellValue('A5', 'Nama')
                            ->setCellValue('A6', 'Bulan')
                            ->setCellValue('B5', ': ' . $p->nama)
                            ->setCellValue('B6', ': ' . date('F', strtotime($p->tanggal_berangkat)))
                            ->setCellValue('A7', 'No')
                            ->setCellValue('B7', 'Tanggal Berangkat')
                            ->setCellValue('C7', 'Tanggal Pulang')
                            ->setCellValue('D7', 'Tanggal Laporan')
                            ->setCellValue('E7', 'Output')
                            ->setCellValue('F7', 'Kegiatan');

                        break;
                    }

                    //BOLD
                    $spreadsheet->getActiveSheet()->getStyle("A1:A4")->getFont()->setBold(true);
                    $spreadsheet->getActiveSheet()->getStyle("A7:F7")->getFont()->setBold(true);

                    //CENTER ALIGNMENT
                    $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $spreadsheet->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $spreadsheet->getActiveSheet()->getStyle('A7:F7')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                    //BORDER THEAD
                    $spreadsheet->getActiveSheet()->getStyle('A7')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                    $spreadsheet->getActiveSheet()->getStyle('A7')->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('A7')->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('A7')->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                    $spreadsheet->getActiveSheet()->getStyle('B7')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                    $spreadsheet->getActiveSheet()->getStyle('B7')->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('B7')->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('B7')->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                    $spreadsheet->getActiveSheet()->getStyle('C7')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                    $spreadsheet->getActiveSheet()->getStyle('C7')->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('C7')->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('C7')->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                    $spreadsheet->getActiveSheet()->getStyle('D7')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                    $spreadsheet->getActiveSheet()->getStyle('D7')->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('D7')->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('D7')->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                    $spreadsheet->getActiveSheet()->getStyle('E7')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                    $spreadsheet->getActiveSheet()->getStyle('E7')->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('E7')->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('E7')->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                    $spreadsheet->getActiveSheet()->getStyle('F7')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                    $spreadsheet->getActiveSheet()->getStyle('F7')->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('F7')->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('F7')->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                    //CELL SIZE
                    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth('10');
                    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth('25');
                    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth('25');
                    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth('25');
                    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth('50');
                    $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth('50');

                    $kolom = 8;
                    $nomor = 1;
                    foreach ($semua_pengguna as $p) {

                        $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('A' . $kolom, $nomor)
                            ->setCellValue('B' . $kolom, date('l, j F Y', strtotime($p->tanggal_berangkat)))
                            ->setCellValue('C' . $kolom, date('l, j F Y', strtotime($p->tanggal_pulang)))
                            ->setCellValue('E' . $kolom, $p->output)
                            ->setCellValue('F' . $kolom, $p->kegiatan);

                        if ($p->laporan == NULL) {
                            $spreadsheet->setActiveSheetIndex(0)->setCellValue('D' . $kolom, "Laporan Belum Dikumpulkan");
                        } else {
                            $spreadsheet->setActiveSheetIndex(0)->setCellValue('D' . $kolom, date('l, j F Y', strtotime($p->tanggal_pengumpulan)));
                        }

                        //WRAP TEXT
                        $spreadsheet->getActiveSheet()->getStyle('E' . $kolom)->getAlignment()->setWrapText(true);
                        $spreadsheet->getActiveSheet()->getStyle('F' . $kolom)->getAlignment()->setWrapText(true);

                        //MIDLE ALIGN
                        $spreadsheet->getActiveSheet()->getStyle('A' . $kolom)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                        $spreadsheet->getActiveSheet()->getStyle('B' . $kolom)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                        $spreadsheet->getActiveSheet()->getStyle('C' . $kolom)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                        $spreadsheet->getActiveSheet()->getStyle('D' . $kolom)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                        $spreadsheet->getActiveSheet()->getStyle('E' . $kolom)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                        $spreadsheet->getActiveSheet()->getStyle('F' . $kolom)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

                        $spreadsheet->getActiveSheet()->getStyle('A' . $kolom)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                        //BOREDER TBODY
                        $spreadsheet->getActiveSheet()->getStyle('A' . $kolom)->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('A' . $kolom)->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('A' . $kolom)->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('A' . $kolom)->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                        $spreadsheet->getActiveSheet()->getStyle('B' . $kolom)->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('B' . $kolom)->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('B' . $kolom)->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('B' . $kolom)->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                        $spreadsheet->getActiveSheet()->getStyle('C' . $kolom)->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('C' . $kolom)->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('C' . $kolom)->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('C' . $kolom)->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                        $spreadsheet->getActiveSheet()->getStyle('D' . $kolom)->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('D' . $kolom)->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('D' . $kolom)->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('D' . $kolom)->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                        $spreadsheet->getActiveSheet()->getStyle('E' . $kolom)->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('E' . $kolom)->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('E' . $kolom)->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('E' . $kolom)->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                        $spreadsheet->getActiveSheet()->getStyle('F' . $kolom)->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('F' . $kolom)->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('F' . $kolom)->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('F' . $kolom)->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                        $kolom++;
                        $nomor++;
                    }

                    $writer = new Xlsx($spreadsheet);

                    header('Content-Type: application/vnd.ms-excel');
                    header('Content-Disposition: attachment;filename="Laporan Perjadin.xlsx"');
                    header('Cache-Control: max-age=0');

                    $writer->save('php://output');
                } else {
                    echo "<script>alert('Tidak ada data perjadin');</script>";
                    redirect('operator/filterExport', 'refresh');
                }
            }
        } else {
            redirect('CLogin/logout');
        }
    }
}
