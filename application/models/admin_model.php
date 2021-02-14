<?php

defined('BASEPATH') or exit('No direct script access allowed');

class admin_model extends CI_Model
{
    //PENGGUNA
    function all()
    {
        $data = $this->db->query("SELECT * from user");
        return $data->result();
    }

    public function getPenggunaById($id)
    {
        $query = $this->db->get_where('user', array('id_user' => $id));
        return $query->row_array();
    }

    function proses_tambah_pengguna()
    {
        $this->id_user = uniqid();
        $data = [
            "nama" => $this->input->post('nama', true),
            "nip" => $this->input->post('nip', true),
            "jabatan" => $this->input->post('jabatan', true),
            "email" =>  $this->input->post('email', true),
            "password" => $this->input->post('password', true),
            "pendidikan" => $this->input->post('pendidikan', true),
            "level" => $this->input->post('level', true),
        ];
        $this->db->insert('user', $data);
    }

    public function proses_edit_pengguna()
    {
        $post = $this->input->post();
        $this->id_user = $post["id_user"];
        $this->nama = $post["nama"];
        $this->nip = $post["nip"];
        $this->jabatan = $post["jabatan"];
        $this->email = $post["email"];
        $this->password = $post["password"];
        $this->pendidikan = $post["pendidikan"];
        $this->level = $post["level"];

        $this->db->update('user', $this, array('id_user' => $post['id_user']));
    }

    public function proses_hapus_pengguna($id)
    {
        return $this->db->delete('user', array("id_user" => $id));
    }

    //KEGIATAN
    function all_kegiatan()
    {
        $data = $this->db->query("SELECT * from kegiatan");
        return $data->result();
    }

    public function getKegiatanById($id)
    {
        $query = $this->db->get_where('kegiatan', array('id_kegiatan' => $id));
        return $query->row_array();
    }

    public function getKegiatanById1($id)
    {
        $this->db->select('*');
        $this->db->from('kegiatan');
        $this->db->where('id_kegiatan', $id);
        $this->db->limit(1);
        return $this->db->get()->result_array();
    }

    function proses_tambah_kegiatan()
    {
        $this->id_user = uniqid();
        $output = strtoupper($this->input->post('output', true));
        $komponen = strtoupper($this->input->post('komponen', true));
        $satuan = strtoupper($this->input->post('satuan', true));
        $data = [
            "output" => $output,
            "komponen" => $komponen,
            "kegiatan" => $this->input->post('kegiatan', true),
            "volume" =>  $this->input->post('volume', true),
            "satuan" => $satuan,
            "tanggal_mulai" =>  $this->input->post('tanggal_mulai', true),
            "tanggal_selesai" =>  $this->input->post('tanggal_selesai', true),
        ];
        $this->db->insert('kegiatan', $data);
    }

    public function proses_edit_kegiatan()
    {
        $post = $this->input->post();
        $this->id_kegiatan = $post["id_kegiatan"];
        $this->output = strtoupper($post["output"]);
        $this->komponen = strtoupper($post["komponen"]);
        $this->kegiatan = $post["kegiatan"];
        $this->volume = $post["volume"];
        $this->satuan = strtoupper($post["satuan"]);
        $this->tanggal_mulai = $post["tanggal_mulai"];
        $this->tanggal_selesai = $post["tanggal_selesai"];

        $this->db->update('kegiatan', $this, array('id_kegiatan' => $post['id_kegiatan']));
    }

    public function proses_hapus_kegiatan($id)
    {
        return $this->db->delete('kegiatan', array("id_kegiatan" => $id));
    }

    //RENCANA PERJADIN
    function allRencanaPerjadin()
    {
        $data = $this->db->query("SELECT * from rencana_perjadin");
        return $data->result();
    }

    public function getRencanaByIdUser($id)
    {
        $this->db->select('*');
        $this->db->from('rencana_perjadin');
        $this->db->join('user', 'user.id_user = rencana_perjadin.id_user');
        $this->db->join('kegiatan', 'kegiatan.id_kegiatan = rencana_perjadin.id_kegiatan');
        $this->db->where('rencana_perjadin.id_user', $id);
        return $this->db->get()->result();
    }

    public function groupByOutputRencana()
    {
        $this->db->select('output');
        $this->db->from('kegiatan');
        $this->db->group_by('output');
        return $this->db->get()->result();
    }

    public function getRencanaById($id)
    {
        $this->db->select('*');
        $this->db->from('rencana_perjadin');
        $this->db->join('user', 'rencana_perjadin.id_user=user.id_user');
        $this->db->join('kegiatan', 'rencana_perjadin.id_kegiatan = kegiatan.id_kegiatan');
        $this->db->where('rencana_perjadin.id_rencana', $id);
        return $this->db->get()->row_array();
    }

    public function getRencanaByBulan()
    {
        $bulan = date('m');

        $this->db->select('*');
        $this->db->from('rencana_perjadin');
        $this->db->join('user', 'rencana_perjadin.id_user=user.id_user');
        $this->db->join('kegiatan', 'rencana_perjadin.id_kegiatan = kegiatan.id_kegiatan');
        $this->db->where(array('MONTH(rencana_perjadin.tanggal_berangkat)' => $bulan));
        $this->db->order_by('rencana_perjadin.tanggal_berangkat', 'asc');

        return $this->db->get()->result_array();
    }

    public function getKegiatanByOutput($o)
    {
        $hasil = $this->db->query("SELECT * FROM kegiatan WHERE output='$o'");
        return $hasil->result();
    }

    function proses_tambah_rencana()
    {
        $this->id_user = uniqid();
        $tgl_brkt = $this->input->post('tanggal_pulang');
        $vol = $this->input->post('volume', true);
        $tmp_vol = $this->input->post('tmp_volume', true);
        $due = date('Y-m-d', strtotime('+14 days', strtotime($tgl_brkt)));

        //MENGISI KOLOM TMP VOLUME PADA DB UNTUK MENYIMPAN VOLUME ASLI DARI KEGIATAN TERPILIH
        if ($tmp_vol == null || $tmp_vol == 0) {
            $dt = [
                "id_kegiatan" => $this->input->post('kegiatan', true),
                "tmp_volume" => $vol,
            ];

            $this->db->update('kegiatan', $dt, array('id_kegiatan' => $dt['id_kegiatan']));
        }

        //MENGURANGI VOLUME DENGAN VOLUME YANG DIAJUKAN
        $vol2 = $this->input->post('volume', true);
        $tot_vol = $this->input->post('total_volume', true);
        if ($vol2 > $tot_vol) {
            $sisa = $vol2 - $tot_vol;

            $dt1 = [
                "id_kegiatan" => $this->input->post('kegiatan', true),
                "volume" => $sisa,
            ];

            $this->db->update('kegiatan', $dt1, array('id_kegiatan' => $dt1['id_kegiatan']));
        } else {
            $sisa = $tot_vol - $vol2;

            $dt1 = [
                "id_kegiatan" => $this->input->post('kegiatan', true),
                "volume" => $sisa,
            ];

            $this->db->update('kegiatan', $dt1, array('id_kegiatan' => $dt1['id_kegiatan']));
        }

        $data = [
            "id_user" => $this->input->post('id_user', true),
            "id_kegiatan" => $this->input->post('kegiatan', true),
            "total_volume" => $this->input->post('total_volume', true),
            "tanggal_berangkat" => $this->input->post('tanggal_berangkat', true),
            "tanggal_pulang" => $this->input->post('tanggal_pulang', true),
            "tanggal_pengumpulan" => $this->input->post('tanggal_pengumpulan', true),
            "due_date" => $due,
        ];
        $this->db->insert('rencana_perjadin', $data);
    }

    function proses_tambah_laporan()
    {
        $post = $this->input->post();
        $this->id_rencana = $post["id_rencana"];
        $this->tanggal_pengumpulan = $post["tanggal_pengumpulan"];
        $this->notif = 2;
        $this->laporan = $this->uploadfile();
        // $data = [
        //     "id_rencana" => $this->input->post('id_rencana', true),
        //     "laporan" => $this->uploadfile(),
        //     "tanggal_pengumpulan" => $this->input->post('tanggal_pengumpulan', true),
        // ];
        $this->db->update('rencana_perjadin', $this, array('id_rencana' => $post['id_rencana']));
    }

    public function uploadfile()
    {
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'zip|rar|doc|docx|xls|xlsx|pdf';
        $config['overwrite'] = true;
        // $config['max_size'] = 1024;
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('laporan')) {
            return $this->upload->data("file_name");
        }
    }

    public function proses_edit_rencana()
    {
        $post = $this->input->post();
        $this->id_rencana = $post["id_rencana"];
        $this->id_kegiatan = $post["id_kegiatan"];
        $this->id_user = $post["id_user"];
        $this->tanggal_berangkat = $post["tanggal_berangkat"];
        $this->tanggal_pulang = $post["tanggal_pulang"];
        $this->total_volume = $post["total_volume"];
        $this->notif = 2;

        $this->db->update('rencana_perjadin', $this, array('id_rencana' => $post['id_rencana']));
    }

    public function proses_hapus_rencana($id)
    {
        $query = $this->db->query("SELECT total_volume, id_kegiatan FROM rencana_perjadin WHERE id_rencana = " . $id);

        if ($query->num_rows() == 1) {
            foreach ($query->result() as $data) {
                $vol = $data->total_volume;
                $id_k = $data->id_kegiatan;

                $query1 = $this->db->query("SELECT volume FROM kegiatan WHERE id_kegiatan = " . $id_k);

                foreach ($query1->result() as $data1) {
                    $vol_asli = $data1->volume;
                }
            }

            $jumlah = $vol_asli + $vol;

            $data2 = [
                "id_kegiatan" => $id_k,
                "volume" => $jumlah,
            ];
            $this->db->update('kegiatan', $data2, array('id_kegiatan' => $data2['id_kegiatan']));

            return $this->db->delete('rencana_perjadin', array("id_rencana" => $id));
        }
    }

    //RIWAYAT PERJADIN
    public function getRiwayat()
    {
        $this->db->select('*');
        $this->db->from('rencana_perjadin');
        $this->db->join('user', 'user.id_user = rencana_perjadin.id_user');
        $this->db->join('kegiatan', 'kegiatan.id_kegiatan = rencana_perjadin.id_kegiatan');
        $this->db->order_by('tanggal_berangkat', 'asc');

        return $this->db->get()->result();
    }

    public function cetakByIdUser($id)
    {
        $this->db->select('*');
        $this->db->from('rencana_perjadin');
        $this->db->join('user', 'user.id_user = rencana_perjadin.id_user');
        $this->db->join('kegiatan', 'kegiatan.id_kegiatan = rencana_perjadin.id_kegiatan');
        $this->db->where('rencana_perjadin.id_user', $id);
        $this->db->where('rencana_perjadin.status', 2);

        return $this->db->get()->result();
    }

    //NOTIF
    public function hitungNew()
    {
        $this->db->select('*');
        $this->db->like('notif', 1);
        $this->db->or_like('notif', 2);
        return $this->db->get('rencana_perjadin')->num_rows();
    }

    public function notif()
    {
        $this->db->select('*');
        $this->db->from('rencana_perjadin');
        $this->db->join('user', 'rencana_perjadin.id_user=user.id_user');
        $this->db->join('kegiatan', 'rencana_perjadin.id_kegiatan = kegiatan.id_kegiatan');
        $this->db->like('rencana_perjadin.notif', 1);
        $this->db->or_like('rencana_perjadin.notif', 2);
        $this->db->order_by('rencana_perjadin.tanggal_pengumpulan', 'desc');
        return $this->db->get()->result();
    }

    public function bacaNotif($id)
    {
        $this->notif = 0;
        $this->db->update('rencana_perjadin', $this, array('id_rencana' => $id));
    }

    //KALENDER INDEX
    public function getCal()
    {
        $this->db->select('*');
        $this->db->from('rencana_perjadin');
        $this->db->join('user', 'user.id_user = rencana_perjadin.id_user');
        $this->db->join('kegiatan', 'kegiatan.id_kegiatan = rencana_perjadin.id_kegiatan');
        $this->db->order_by('tanggal_berangkat', 'asc');

        return $this->db->get()->result_array();
    }

    //CHART INDEX
    public function getChartVol()
    {
        $query = $this->db->query("SELECT SUM(total_volume) AS total_volume, laporan FROM rencana_perjadin WHERE laporan = 0 GROUP BY MONTH(tanggal_berangkat)");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    public function getCharVol2()
    {
        $query = $this->db->query("SELECT SUM(total_volume) AS total_volume FROM rencana_perjadin GROUP BY MONTH(tanggal_berangkat)");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    //FILTER CETAK
    public function filterCetak2()
    {
        $bulan = $this->input->post('bulan', true);
        $tahun = $this->input->post('tahun', true);

        $this->db->select('*');
        $this->db->from('rencana_perjadin');
        $this->db->join('user', 'user.id_user = rencana_perjadin.id_user');
        $this->db->join('kegiatan', 'kegiatan.id_kegiatan = rencana_perjadin.id_kegiatan');
        $this->db->where(array('MONTH(rencana_perjadin.tanggal_berangkat)' => $bulan));
        $this->db->where(array('YEAR(rencana_perjadin.tanggal_berangkat)' => $tahun));
        $this->db->order_by('user.nama', 'asc');
        $this->db->order_by('rencana_perjadin.tanggal_berangkat', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function filterCetak()
    {
        $nama = $this->input->post('nama', true);
        $bulan = $this->input->post('bulan', true);
        $tahun = $this->input->post('tahun', true);

        $this->db->select('*');
        $this->db->from('rencana_perjadin');
        $this->db->join('user', 'user.id_user = rencana_perjadin.id_user');
        $this->db->join('kegiatan', 'kegiatan.id_kegiatan = rencana_perjadin.id_kegiatan');
        $this->db->where('rencana_perjadin.id_user', $nama);
        $this->db->where(array('MONTH(rencana_perjadin.tanggal_berangkat)' => $bulan));
        $this->db->where(array('YEAR(rencana_perjadin.tanggal_berangkat)' => $tahun));
        $this->db->order_by('rencana_perjadin.tanggal_berangkat', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function filterCetak3()
    {
        $nama = $this->input->post('nama', true);
        $bulan = $this->input->post('bulan', true);
        $tahun = $this->input->post('tahun', true);

        $this->db->select('*');
        $this->db->from('rencana_perjadin');
        $this->db->join('user', 'user.id_user = rencana_perjadin.id_user');
        $this->db->join('kegiatan', 'kegiatan.id_kegiatan = rencana_perjadin.id_kegiatan');
        $this->db->where('rencana_perjadin.id_user', $nama);
        $this->db->where(array('MONTH(rencana_perjadin.tanggal_berangkat)' => $bulan));
        $this->db->where(array('YEAR(rencana_perjadin.tanggal_berangkat)' => $tahun));
        $this->db->order_by('user.nama', 'asc');
        $this->db->order_by('rencana_perjadin.tanggal_berangkat', 'asc');
        return $this->db->get();
    }

    public function filterCetak4()
    {
        $bulan = $this->input->post('bulan', true);
        $tahun = $this->input->post('tahun', true);

        $this->db->select('*');
        $this->db->from('rencana_perjadin');
        $this->db->join('user', 'user.id_user = rencana_perjadin.id_user');
        $this->db->join('kegiatan', 'kegiatan.id_kegiatan = rencana_perjadin.id_kegiatan');
        $this->db->where(array('MONTH(rencana_perjadin.tanggal_berangkat)' => $bulan));
        $this->db->where(array('YEAR(rencana_perjadin.tanggal_berangkat)' => $tahun));
        $this->db->order_by('user.nama', 'asc');
        $this->db->order_by('rencana_perjadin.tanggal_berangkat', 'asc');
        return $this->db->get();
    }
}
