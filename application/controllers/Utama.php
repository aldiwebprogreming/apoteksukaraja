<?php 

	/**
	 * 
	 */
	class Utama extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->library('dompdf_gen');

			if ($this->session->username == null) {
				redirect('login/');
			}
		}

		function index(){

			$tgl = date('Y-m-d');

			$data['pelanggan'] = $this->db->get('tbl_pelanggan')->num_rows();
			$data['admin'] =  $this->db->get('tbl_user')->num_rows();

			$data['penjualan_hariini'] =  $this->db->get_where('tbl_penjualan',['tgl' => $tgl])->num_rows();
			$data['penjualan_all'] =  $this->db->get_where('tbl_penjualan')->num_rows();

			$this->db->select_sum('total_harga');
			$data['pemasukan_hariini'] = $this->db->get_where('tbl_penjualan',['tgl' => $tgl])->row_array();

			$this->db->select_sum('total_harga');
			$data['pemasukan_all'] = $this->db->get('tbl_penjualan')->row_array();

			$data['barang'] = $this->db->get('tbl_barang')->num_rows();

			$this->load->view('template/header');
			$this->load->view('apotek/index', $data);
			$this->load->view('template/footer');
		}

		function data_barang(){

			if (isset($_POST['tgl1'])) {
				
				$tgl_awal = $this->input->post('tgl1');
				$tgl_akhir = $this->input->post('tgl2');

				$data['tgl_awal'] = $tgl_awal;
				$data['tgl_akhir'] = $tgl_akhir;

				$data['tgl'] = $tgl_awal. ' S/D '. $tgl_akhir;

				$this->db->where("tgl BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['barang'] = $this->db->get('tbl_barang')->result_array();


				$this->db->select_sum('stok');
				$this->db->select_sum('harga');
				$this->db->where("tgl BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['total'] = $this->db->get('tbl_barang')->row_array();

			}else{

				$data['tgl'] = '';
				$data['barang'] = $this->db->get('tbl_barang')->result_array();

				$this->db->select_sum('stok');
				$this->db->select_sum('harga');
				$data['total'] = $this->db->get('tbl_barang')->row_array();
			}


			
			$this->load->view('template/header');
			$this->load->view('apotek/data_barang', $data);
			$this->load->view('template/footer');

			if (isset($_POST['kirim'])) {
				
				$data = [
					'kode_barang' =>$this->input->post('kode_barang'),
					'nama_barang' => $this->input->post('nama_barang'),
					'harga' => $this->input->post('harga'),
					'satuan' => $this->input->post('satuan'),
					'stok' => $this->input->post('stok'),
					'keterangan' => $this->input->post('keterangan'),
					'tgl' => date('Y-m-d'),

				];

				$this->db->insert('tbl_barang', $data);
				$this->session->set_flashdata('message', 'swal("Yess!", "Data barang berhasil ditambah", "success" );');
				redirect('utama/data_barang');
			}elseif (isset($_POST['edit'])) {
				
				$data = [
					'kode_barang' =>$this->input->post('kode_barang'),
					'nama_barang' => $this->input->post('nama_barang'),
					'harga' => $this->input->post('harga'),
					'satuan' => $this->input->post('satuan'),
					'stok' => $this->input->post('stok'),
					'keterangan' => $this->input->post('keterangan'),

				];
				$this->db->where('kode_barang', $this->input->post('kode_barang'));
				$this->db->update('tbl_barang', $data);
				$this->session->set_flashdata('message', 'swal("Yess!", "Data barang berhasil diedit", "success" );');
				redirect('utama/data_barang');
			}elseif (isset($_POST['hapus'])) {
				
				$id = $this->input->post('id');
				$this->db->where('id', $id);
				$this->db->delete('tbl_barang');
				$this->session->set_flashdata('message', 'swal("Yess!", "Data barang berhasil dihapus", "success" );');
				redirect('utama/data_barang');
			}
		}


		function data_produk(){
			$data['produk'] = $this->db->get('tbl_produk')->result_array();
			$this->load->view('template/header');
			$this->load->view('apotek/data_produk', $data);
			$this->load->view('template/footer');
		}

		function tambah_produk(){

			$data = [
				'nama_produk' => $this->input->post('nama_produk'),
				'qty' => $this->input->post('qty'),
				'unit' => $this->input->post('unit'),
				'harga_netto' => $this->input->post('harga_netto'),
				'diskon' => $this->input->post('diskon'),
				'harga_jual' => $this->input->post('harga_jual'),
			];

			$this->db->insert('tbl_produk', $data);
			$this->session->set_flashdata('message', 'swal("Yess!", "Data produk berhasil ditambah", "success" );');
			redirect('utama/data_produk');

		}

		function hapus_produk(){

			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->delete('tbl_produk');
			$this->session->set_flashdata('message', 'swal("Yess!", "Data produk berhasil dihapus", "success" );');
			redirect('utama/data_produk');

		}

		function cetak_dataproduk(){

			$data['produk'] = $this->db->get('tbl_produk')->result_array();
			$this->load->view('apotek/cetak_dataproduk', $data);

			$paper_size = "A4";
			$orientatation = "Portrait";
			$html = $this->output->get_output();

			$this->dompdf->set_paper($paper_size, $orientatation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("Data produk.pdf", array('Attachment' => 0));


		}


		function data_pelanggan(){

			$data['pelanggan'] = $this->db->get('tbl_pelanggan')->result_array();
			$this->load->view('template/header');
			$this->load->view('apotek/data_pelanggan', $data);
			$this->load->view('template/footer');

			if (isset($_POST['kirim'])) {

				$data = [
					'kode_pelanggan' =>$this->input->post('kode_pelanggan'),
					'nama_pelanggan' => $this->input->post('nama_pelanggan'),
					'alamat' => $this->input->post('alamat'),

				];

				$this->db->insert('tbl_pelanggan', $data);
				$this->session->set_flashdata('message', 'swal("Yess!", "Data pelanggan berhasil ditambah", "success" );');
				redirect('utama/data_pelanggan');
			}elseif (isset($_POST['edit'])) {

				$data = [
					'kode_pelanggan' =>$this->input->post('kode_pelanggan'),
					'nama_pelanggan' => $this->input->post('nama_pelanggan'),
					'alamat' => $this->input->post('alamat'),

				];
				$this->db->where('kode_pelanggan', $this->input->post('kode_pelanggan'));
				$this->db->update('tbl_pelanggan', $data);
				$this->session->set_flashdata('message', 'swal("Yess!", "Data barang berhasil diedit", "success" );');
				redirect('utama/data_pelanggan');
			}elseif (isset($_POST['hapus'])) {

				$id = $this->input->post('id');
				$this->db->where('id', $id);
				$this->db->delete('tbl_pelanggan');
				$this->session->set_flashdata('message', 'swal("Yess!", "Data barang berhasil dihapus", "success" );');
				redirect('utama/data_pelanggan');
			}

		}

		function data_user(){

			$data['user'] = $this->db->get('tbl_user')->result_array();
			$this->load->view('template/header');
			$this->load->view('apotek/data_user', $data);
			$this->load->view('template/footer');

			if (isset($_POST['kirim'])) {

				$data = [
					'kode_user' =>$this->input->post('kode_user'),
					'username' => $this->input->post('username'),
					'role' => $this->input->post('role'),
					'pass' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),

				];

				$this->db->insert('tbl_user', $data);
				$this->session->set_flashdata('message', 'swal("Yess!", "Data user berhasil ditambah", "success" );');
				redirect('utama/data_user');
			}elseif (isset($_POST['edit'])) {

				$data = [
					'kode_user' =>$this->input->post('kode_user'),
					'username' => $this->input->post('username'),
					'role' => $this->input->post('role'),
				];

				$this->db->where('kode_user', $this->input->post('kode_user'));
				$this->db->update('tbl_user', $data);
				$this->session->set_flashdata('message', 'swal("Yess!", "Data user berhasil diedit", "success" );');
				redirect('utama/data_user');
			}elseif (isset($_POST['hapus'])) {

				$id = $this->input->post('id');
				$this->db->where('id', $id);
				$this->db->delete('tbl_user');
				$this->session->set_flashdata('message', 'swal("Yess!", "Data barang berhasil dihapus", "success" );');
				redirect('utama/data_user');
			}

		}


		function penjualan(){
			$data['barang'] = $this->db->get('tbl_barang')->result_array();
			$data['pelanggan'] = $this->db->get('tbl_pelanggan')->result_array();

			$data['count'] = $this->db->get('tbl_barang')->num_rows();

			$this->load->view('template/header');
			// $this->load->view('apotek/penjualan2', $data);
			$this->load->view('apotek/penjualan_real', $data);
			$this->load->view('template/footer');
		}

		function data_penjualan(){


			if (isset($_POST['tgl1'])) {

				$tgl_awal = $this->input->post('tgl1');
				$tgl_akhir = $this->input->post('tgl2');

				$data['tgl'] = $tgl_awal.' S/D '.$tgl_akhir;

				$data['tgl_awal'] = $this->input->post('tgl1');
				$data['tgl_akhir'] = $this->input->post('tgl2');

				$this->db->where("tgl BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['penjualan'] = $this->db->get('tbl_penjualan')->result_array();


				$this->db->select_sum('total_harga');
				$this->db->select_sum('harga');
				$this->db->select_sum('qty');
				$this->db->where("tgl BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['total'] = $this->db->get('tbl_penjualan')->row_array();
			}else{

				$data['tgl'] = '';

				$data['penjualan'] = $this->db->get('tbl_penjualan')->result_array();

				$this->db->select_sum('total_harga');
				$this->db->select_sum('harga');
				$this->db->select_sum('qty');
				$data['total'] = $this->db->get('tbl_penjualan')->row_array();

			}

			$this->load->view('template/header');
			$this->load->view('apotek/data_penjualan', $data);
			$this->load->view('template/footer');

		}

		// function data_penjualan2(){

		// 	if (isset($_POST['tgl1'])) {

		// 		$tgl_awal = $this->input->post('tgl1');
		// 		$tgl_akhir = $this->input->post('tgl2');

		// 		$data['tgl'] = $tgl_awal.' S/D '.$tgl_akhir;

		// 		$data['tgl_awal'] = $this->input->post('tgl1');
		// 		$data['tgl_akhir'] = $this->input->post('tgl2');

		// 		$this->db->where("tgl BETWEEN '$tgl_awal' AND '$tgl_akhir'");
		// 		$data['penjualan'] = $this->db->get('tbl_penjualan')->result_array();


		// 		$this->db->select_sum('total_harga');
		// 		$this->db->select_sum('harga');
		// 		$this->db->select_sum('qty');
		// 		$this->db->where("tgl BETWEEN '$tgl_awal' AND '$tgl_akhir'");
		// 		$data['total'] = $this->db->get('tbl_penjualan')->row_array();
		// 	}else{

		// 		$data['tgl'] = '';

		// 		// $data['penjualan'] = $this->db->get('tbl_penjualan')->result_array();
		// 		$data['penjualan'] = $this->db->query("SELECT DISTINCT kode_penjualan, nama_barang FROM tbl_penjualan order by id DESC;")->result_array();

		// 		$this->db->select_sum('total_harga');
		// 		$this->db->select_sum('harga');
		// 		$this->db->select_sum('qty');
		// 		$data['total'] = $this->db->get('tbl_penjualan')->row_array();

		// 	}

		// 	$this->load->view('template/header');
		// 	$this->load->view('apotek/data_penjualan2', $data);
		// 	$this->load->view('template/footer');

		// }

		function data_order(){

			if (isset($_POST['tgl1'])) {

				$tgl_awal = $this->input->post('tgl1');
				$tgl_akhir = $this->input->post('tgl2');

				$data['tgl'] = $tgl_awal.' S/D '.$tgl_akhir;

				$data['tgl_awal'] = $this->input->post('tgl1');
				$data['tgl_akhir'] = $this->input->post('tgl2');

				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['order'] = $this->db->get('tbl_order')->result_array();

				$this->db->select_sum('total_harga');
				$this->db->select_sum('qty_barang');
				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['total'] = $this->db->get('tbl_order')->row_array();
			}else{


				$data['tgl'] = '';

				$data['order'] = $this->db->get('tbl_order')->result_array();

				$this->db->select_sum('total_harga');
				$this->db->select_sum('qty_barang');
				$data['total'] = $this->db->get('tbl_order')->row_array();
			}



			$this->load->view('template/header');
			$this->load->view('apotek/data_order', $data);
			$this->load->view('template/footer');

		}

		function detail_order($kode){
			$data['kode'] = $kode;
			$this->db->select_sum('total_harga');
			$this->db->select_sum('harga');
			$this->db->select_sum('qty');
			$this->db->where('kode_penjualan', $kode);
			$data['total'] = $this->db->get('tbl_penjualan')->row_array();

			$data['order'] = $this->db->get_where('tbl_penjualan',['kode_penjualan' => $kode])->result_array();
			$this->load->view('template/header');
			$this->load->view('apotek/detail_order', $data);
			$this->load->view('template/footer');
		}

		function cetak_detailorder($kode){

			$data['kode'] = $kode;

			$this->db->select_sum('total_harga');
			$this->db->select_sum('harga');
			$this->db->select_sum('qty');
			$this->db->where('kode_penjualan', $kode);
			$data['total'] = $this->db->get('tbl_penjualan')->row_array();


			$data['penjualan_detail'] = $this->db->get_where('tbl_penjualan',['kode_penjualan' => $kode])->result_array();

			$this->load->view('apotek/cetak_detailorder', $data);

			$paper_size = "A4";
			$orientatation = "Landscape";
			$html = $this->output->get_output();

			$this->dompdf->set_paper($paper_size, $orientatation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("Laporan_data_pelanggan.pdf", array('Attachment' => 0));

		}

		function cetak_dataorder(){

			if (isset($_GET['tgl_awal'])) {

				$tgl_awal = $this->input->get('tgl_awal');
				$tgl_akhir = $this->input->get('tgl_akhir');

				$data['tgl'] = $tgl_awal.' S/D '.$tgl_akhir;

				$this->db->select_sum('total_harga');
				$this->db->select_sum('qty_barang');
				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['total'] = $this->db->get('tbl_order')->row_array();

				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['order'] = $this->db->get('tbl_order')->result_array();
			}else{

				$data['tgl'] = '';

				$this->db->select_sum('total_harga');
				$this->db->select_sum('qty_barang');
				$data['total'] = $this->db->get('tbl_order')->row_array();

				$data['order'] = $this->db->get('tbl_order')->result_array();
			}
			$this->load->view('apotek/cetak_dataorder', $data);

			$paper_size = "A4";
			$orientatation = "Landscape";
			$html = $this->output->get_output();

			$this->dompdf->set_paper($paper_size, $orientatation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("Laporan_data_order.pdf", array('Attachment' => 0));

		}

		function hapus_penjualan(){

			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->delete('tbl_penjualan');
			$this->session->set_flashdata('message', 'swal("Yess!", "Data penjualan berhasil dihapus", "success" );');
			redirect('utama/data_penjualan');
		}

		function get_harga(){

			$id = $this->input->get('id');
			if ($id == '') {
				echo "Rp.0";
			}else{
				$harga = $this->db->get_where('tbl_barang',['id' => $id])->row_array();
				$hasil_harga = "Rp " . number_format($harga['harga'],0,',','.');
				echo $harga['harga'];
			}
		}

		function get_harga2(){

			$id = $this->input->get('id');
			if ($id == '') {
				echo "Rp.0";
			}else{
				$harga = $this->db->get_where('tbl_barang',['id' => $id])->row_array();
				$hasil_harga = "Rp " . number_format($harga['harga'],0,',','.');
				echo $hasil_harga;
			}
		}

		function get_alamat(){
			$id = $this->input->get('id');
			$alamat = $this->db->get_where('tbl_pelanggan',['id' => $id])->row_array();
			echo $alamat['alamat'];
		}

		function add_penjualan(){
			$kode = $this->input->post('kode');
			$tgl = $this->input->post('tgl');
			$pelanggan = $this->input->post('pelanggan');
			$alamat = $this->input->post('alamat');

			$barang = $this->input->post('barang[]');
			$qty = $this->input->post('qty[]');
			$count = count($barang);


			for ($i=0; $i < $count ; $i++) { 

				$id =  $barang[$i];
				if ($id == null) {
					// kondisi jika barang tidak dipilih
				}else{

					$item = $this->db->get_where('tbl_barang',['id' => $id])->row_array();
					$total_harga = $item['harga'] * $qty[$i];
					$data = [
						'kode_penjualan' => $kode,
						'nama_barang' => $item['nama_barang'],
						'harga' => $item['harga'],
						'qty' => $qty[$i],
						'satuan' => $item['satuan'],
						'total_harga' => $total_harga,
						'tgl' => date('Y-m-d'),
					];

				// variabel untuk update jumlah stok ke tbl_barang
					$update_stok = $item['stok'] - $qty[$i];
				// end

					// kondisi jika barang dipilih
					// proses input ke tbl_penjulaan
					$this->db->insert('tbl_penjualan', $data);
					// end

					// prosess update stok
					$this->db->where('id', $id);
					$this->db->update('tbl_barang', ['stok' => $update_stok]);
					// end

				}
			}

			$this->db->select_sum('total_harga');
			$this->db->select_sum('qty');
			$order = $this->db->get_where('tbl_penjualan',['kode_penjualan' => $kode])->row_array();

			$nama = $this->db->get_where('tbl_pelanggan',['id' => $pelanggan])->row_array();

			$data = [
				'kode_order' => $kode,
				'nama' => $nama['nama_pelanggan'],
				'alamat' => $alamat,
				'qty_barang' => $order['qty'],
				'total_harga' => $order['total_harga'],
				'date' => $tgl,
				'nb' => $this->input->post('nb'),
			];

			$this->db->insert('tbl_order', $data);

			$this->session->set_flashdata('message', 'swal("Yess!", "Data penjualan berhasil di input", "success" );');
			redirect("utama/cetak_penjualan?kode=$kode");
		}

		function print_penjualan(){

			$this->load->view('apotek/print_penjualan');
		}

		function cetak_penjualan(){

			$kode = $this->input->get('kode');

			$data['pembelian'] = $this->db->get_where('tbl_penjualan',['kode_penjualan' => $kode])->result_array();
			$data['order'] = $this->db->get_where('tbl_order',['kode_order' => $kode])->row_array();
			$this->load->view('apotek/cetak_penjualan', $data);

			$paper_size = "A4";
			$orientatation = "Portrait";
			$html = $this->output->get_output();

			$this->dompdf->set_paper($paper_size, $orientatation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("Faktur.pdf", array('Attachment' => 0));

		}

		function cetak_databarang(){

			if (isset($_GET['tgl_awal'])) {

				$tgl_awal = $this->input->get('tgl_awal');
				$tgl_akhir = $this->input->get('tgl_akhir');

				$data['tgl'] = $tgl_awal. ' S/D '. $tgl_akhir;

				$this->db->select_sum('stok');
				$this->db->select_sum('harga');
				$this->db->where("tgl BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['total'] = $this->db->get('tbl_barang')->row_array();

				$this->db->where("tgl BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['barang'] = $this->db->get('tbl_barang')->result_array();
			}else{

				$data['tgl'] = '';

				$this->db->select_sum('stok');
				$this->db->select_sum('harga');
				$data['total'] = $this->db->get('tbl_barang')->row_array();

				$data['barang'] = $this->db->get('tbl_barang')->result_array();

			}

			$this->load->view('apotek/cetak_databarang', $data);

			$paper_size = "A4";
			$orientatation = "Landscape";
			$html = $this->output->get_output();

			$this->dompdf->set_paper($paper_size, $orientatation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("Laporan_data_barang.pdf", array('Attachment' => 0));

		}

		function cetak_datapelanggan(){

			$data['pelanggan'] = $this->db->get('tbl_pelanggan')->result_array();
			$this->load->view('apotek/cetak_datapelanggan', $data);

			$paper_size = "A4";
			$orientatation = "Landscape";
			$html = $this->output->get_output();

			$this->dompdf->set_paper($paper_size, $orientatation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("Laporan_data_pelanggan.pdf", array('Attachment' => 0));


		}

		function cetak_datapenjualan(){

			if (isset($_GET['tgl_awal'])) {

				$tgl_awal = $this->input->get('tgl_awal');
				$tgl_akhir = $this->input->get('tgl_akhir');

				$data['tgl'] = $tgl_awal.' S/D '.$tgl_akhir;

				$this->db->select_sum('total_harga');
				$this->db->select_sum('harga');
				$this->db->select_sum('qty');
				$this->db->where("tgl BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['total'] = $this->db->get('tbl_penjualan')->row_array();

				$this->db->where("tgl BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['penjualan'] = $this->db->get('tbl_penjualan')->result_array();
			}else{

				$data['tgl'] = '';

				$this->db->select_sum('total_harga');
				$this->db->select_sum('harga');
				$this->db->select_sum('qty');
				$data['total'] = $this->db->get('tbl_penjualan')->row_array();

				$data['penjualan'] = $this->db->get('tbl_penjualan')->result_array();
			}
			$this->load->view('apotek/cetak_datapenjualan', $data);

			$paper_size = "A4";
			$orientatation = "Landscape";
			$html = $this->output->get_output();

			$this->dompdf->set_paper($paper_size, $orientatation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("Laporan_data_penjualan.pdf", array('Attachment' => 0));


		}

		function get_data(){

			$data = $this->db->query("SELECT DISTINCT kode_penjualan, nama_barang FROM tbl_penjualan order by id DESC;")->result_array();

			// $this->db->distinct('nama_barang');
			// $data = $this->db->get('tbl_penjualan')->result_array();
			var_dump($data);
		}

		function sendwa(){
			$api_key   = '2ad1c6ff045383d38f2ba7f13ad9d225f5794930'; // API KEY Anda
				$id_device = '6845'; // ID DEVICE yang di SCAN (Sebagai pengirim)
				$url   = 'https://api.watsap.id/send-message'; // URL API
				$no_hp = '083138184143'; // No.HP yang dikirim (No.HP Penerima)
				$pesan = '😁 Halo Terimakasih 🙏'; // Pesan yang dikirim

				$curl = curl_init();
				curl_setopt($curl, CURLOPT_URL, $url);
				curl_setopt($curl, CURLOPT_HEADER, 0);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
				curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
				curl_setopt($curl, CURLOPT_TIMEOUT, 0); // batas waktu response
				curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
				curl_setopt($curl, CURLOPT_POST, 1);

				$data_post = [
					'id_device' => $id_device,
					'api-key' => $api_key,
					'no_hp'   => $no_hp,
					'pesan'   => $pesan
				];
				curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data_post));
				curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
				$response = curl_exec($curl);
				curl_close($curl);
				echo $response;
			}


		}

	?>