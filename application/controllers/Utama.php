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
		}

		function index(){

			$this->load->view('template/header');
			$this->load->view('apotek/index');
			$this->load->view('template/footer');
		}

		function data_barang(){
			$data['barang'] = $this->db->get('tbl_barang')->result_array();
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
			$this->load->view('apotek/penjualan2', $data);
			$this->load->view('template/footer');
		}

		function data_penjualan(){

			$data['penjualan'] = $this->db->get('tbl_penjualan')->result_array();

			$this->load->view('template/header');
			$this->load->view('apotek/data_penjualan', $data);
			$this->load->view('template/footer');

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

			$data['order'] = $this->db->get_where('tbl_penjualan',['kode_penjualan' => $kode])->result_array();
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

			

			$data['barang'] = $this->db->get('tbl_barang')->result_array();
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

			$data['penjualan'] = $this->db->get('tbl_penjualan')->result_array();
			$this->load->view('apotek/cetak_datapenjualan', $data);

			$paper_size = "A4";
			$orientatation = "Landscape";
			$html = $this->output->get_output();

			$this->dompdf->set_paper($paper_size, $orientatation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("Laporan_data_penjualan.pdf", array('Attachment' => 0));


		}


	}

	?>