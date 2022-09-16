<?php 

	/**
	 * 
	 */
	class Utama extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
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
			$this->load->view('apotek/penjualan', $data);
			$this->load->view('template/footer');
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
			echo $kode = $this->input->post('kode');
			echo $tgl = $this->input->post('tgl');
			echo $pelanggan = $this->input->post('pelanggan');
			echo $alamat = $this->input->post('alamat');
			
			$barang = $this->input->post('barang[]');
			$qty = $this->input->post('qty[]');
			var_dump($qty);
		}


	}

?>