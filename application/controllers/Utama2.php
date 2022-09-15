<?php 

	/**
	 * 
	 */
	class Utama2 extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->library('cart');
			if ($this->session->username == null) {
				redirect('login/');
			}
		}

		function index(){

			$data['item'] = $this->db->get('tbl_item')->result_array();
			$data['cart'] = $this->cart->contents();
			$data['total'] = $this->cart->total();

			$data['item2'] = $this->db->get('tbl_item')->num_rows();
			$data['role'] = $this->db->get('tbl_role')->num_rows();
			$data['user'] = $this->db->get('tbl_user')->num_rows();

			$this->load->view('template/header');
			$this->load->view('utama/index', $data);
			$this->load->view('template/footer');
		}

		function cart(){

			$kode_item = $this->input->post('kode_item');
			$nama_item = $this->input->post('nama_item');
			$harga = $this->input->post('harga');
			$stok = $this->input->post('stok');
			$qty = $this->input->post('qty');
			$unit = $this->input->post('unit');

			$data = array(
				'id'      => $kode_item,
				'qty'     => $qty,
				'price'   => $harga,
				'name'    => $nama_item,
				'harga' => $harga,
				'stok' => $stok,
				'unit' => $unit,
			);

			$this->cart->insert($data);
			redirect('utama/');
		}

		function display_cart(){

			$cart = $this->cart->contents();
			var_dump($cart);
		}

		function update_cart(){

			$rowid = $this->input->get('rowid');
			$qty = $this->input->get('qty');
			
			$data = [
				'rowid' => $rowid,
				'qty' => $qty,
			];
			
			$this->cart->update($data);
			
			$cart = $this->cart->get_item($rowid);
			echo "Rp " . number_format($cart['subtotal'],0,',','.');
		}

		function update_total(){

			$rowid = $this->input->get('rowid');
			$qty = $this->input->get('qty');
			
			$data = [
				'rowid' => $rowid,
				'qty' => $qty,
			];

			$this->cart->update($data);

			$total = $this->cart->total();
			echo "Rp " . number_format($total,0,',','.');
		}

		function update_totalbayar(){

			$rowid = $this->input->get('rowid');
			$qty = $this->input->get('qty');
			
			$data = [
				'rowid' => $rowid,
				'qty' => $qty,
			];

			$this->cart->update($data);

			$total = $this->cart->total();
			
			$tot = $total;
			$ppn = 11;
			$ret = $ppn / 100;
			$hasilret = $tot * $ret;
			$hasil = $tot + $hasilret;

			echo "Rp " . number_format($hasil,0,',','.');

		}

		function update_totalbayar2(){

			$rowid = $this->input->get('rowid');
			$qty = $this->input->get('qty');
			
			$data = [
				'rowid' => $rowid,
				'qty' => $qty,
			];

			$this->cart->update($data);

			$total = $this->cart->total();
			
			$tot = $total;
			$ppn = 11;
			$ret = $ppn / 100;
			$hasilret = $tot * $ret;
			$hasil = $tot + $hasilret;

			echo $hasil;

		}

		

		function hapus_cart(){

			$cart = $this->cart->contents();
			foreach ($cart as $item) {
				$this->cart->remove($item['rowid']);
			}
		}

		function harga(){
			$data['harga'] = $this->db->get_where('tbl_harga')->result_array();

			$this->load->view('template/header');
			$this->load->view('utama/harga', $data);
			$this->load->view('template/footer');

			if (isset($_POST['kirim'])) {

				$data = [
					'kode_harga' => rand(0,10000),
					'harga' => $this->input->post('harga'),
				];

				$this->db->insert('tbl_harga', $data);
				$this->session->set_flashdata('message', 'swal("Yess!", "Data harga berhasil diinput", "success" );');
				redirect('utama/harga');

			}
		}

		function edit_harga(){

			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->update('tbl_harga',['harga' => $this->input->post('harga')]);
			$this->session->set_flashdata('message', 'swal("Yess!", "Data harga berhasil diubah", "success" );');
			redirect('utama/harga');

		}

		function hapus_harga(){
			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->delete('tbl_harga');
			$this->session->set_flashdata('message', 'swal("Yess!", "Data harga berhasil dihapus", "success" );');
			redirect('utama/harga');

		}

		function user(){
			$data['user'] = $this->db->get('tbl_user')->result_array();
			$data['role'] = $this->db->get('tbl_role')->result_array();

			$this->load->view('template/header');
			$this->load->view('utama/user', $data);
			$this->load->view('template/footer');

			if (isset($_POST['kirim'])) {

				$data = [
					'kode_user' => 'user-'.rand(0,10000),
					'username' => $this->input->post('user'),
					'role' => $this->input->post('role'),
					'pass' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
				];

				$this->db->insert('tbl_user', $data);
				$this->session->set_flashdata('message', 'swal("Yess!", "Data user berhasil diinput", "success" );');
				redirect('utama/user');

			}
		}

		function edit_user(){

			$data = [
				'username' => $this->input->post('username'),
				'role' => $this->input->post('role'),
				'pass' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
			];

			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->update('tbl_user',$data);
			$this->session->set_flashdata('message', 'swal("Yess!", "Data user berhasil diubah", "success" );');
			redirect('utama/user');

		}

		function hapus_user(){
			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->delete('tbl_user');
			$this->session->set_flashdata('message', 'swal("Yess!", "Data user berhasil dihapus", "success" );');
			redirect('utama/user');

		}

		function role(){
			$data['role'] = $this->db->get_where('tbl_role')->result_array();

			$this->load->view('template/header');
			$this->load->view('utama/role', $data);
			$this->load->view('template/footer');

			if (isset($_POST['kirim'])) {

				$data = [
					'kode_role' => 'role-'.rand(0,10000),
					'role' => $this->input->post('role'),
				];

				$this->db->insert('tbl_role', $data);
				$this->session->set_flashdata('message', 'swal("Yess!", "Data role berhasil diinput", "success" );');
				redirect('utama/role');

			}
		}

		function edit_role(){

			$data = [
				'role' => $this->input->post('role'),
				
			];

			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->update('tbl_role',$data);
			$this->session->set_flashdata('message', 'swal("Yess!", "Data role berhasil diubah", "success" );');
			redirect('utama/role');

		}

		function hapus_role(){
			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->delete('tbl_role');
			$this->session->set_flashdata('message', 'swal("Yess!", "Data  role berhasil dihapus", "success" );');
			redirect('utama/role');

		}

		function unit(){
			$data['unit'] = $this->db->get_where('tbl_unit')->result_array();

			$this->load->view('template/header');
			$this->load->view('utama/unit', $data);
			$this->load->view('template/footer');

			if (isset($_POST['kirim'])) {

				$data = [
					'kode' => 'unit-'.rand(0,10000),
					'unit' => $this->input->post('unit'),
				];

				$this->db->insert('tbl_unit', $data);
				$this->session->set_flashdata('message', 'swal("Yess!", "Data unit berhasil diinput", "success" );');
				redirect('utama/unit');

			}
		}

		function edit_unit(){

			$data = [
				'unit' => $this->input->post('unit'),
				
			];

			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->update('tbl_unit',$data);
			$this->session->set_flashdata('message', 'swal("Yess!", "Data unit berhasil diubah", "success" );');
			redirect('utama/unit');

		}

		function hapus_unit(){
			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->delete('tbl_unit');
			$this->session->set_flashdata('message', 'swal("Yess!", "Data unit berhasil dihapus", "success" );');
			redirect('utama/unit');

		}

		function item(){
			$data['item'] = $this->db->get_where('tbl_item')->result_array();
			$data['harga'] = $this->db->get_where('tbl_harga')->result_array();
			$data['unit'] = $this->db->get_where('tbl_unit')->result_array();

			$this->load->view('template/header');
			$this->load->view('utama/item', $data);
			$this->load->view('template/footer');

			if (isset($_POST['kirim'])) {

				$data = [
					'kode_item' => 'item-'.rand(0,10000),
					'nama_item' => $this->input->post('nama_item'),
					'harga' => $this->input->post('harga'),
					'stok' => $this->input->post('stok'),
					'unit' => $this->input->post('unit'),
				];

				$this->db->insert('tbl_item', $data);
				$this->session->set_flashdata('message', 'swal("Yess!", "Data item berhasil diinput", "success" );');
				redirect('utama/item');

			}
		}

		function edit_item(){

			$data = [
				'nama_item' => $this->input->post('nama_item'),
				'harga' => $this->input->post('harga'),
				'stok' => $this->input->post('stok'),
				'unit' => $this->input->post('unit'),
				
			];

			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->update('tbl_item',$data);
			$this->session->set_flashdata('message', 'swal("Yess!", "Data item berhasil diubah", "success" );');
			redirect('utama/item');

		}

		function hapus_item(){
			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->delete('tbl_item');
			$this->session->set_flashdata('message', 'swal("Yess!", "Data item berhasil dihapus", "success" );');
			redirect('utama/item');

		}

		function privilege(){

			$data['priv'] = $this->db->get_where('tbl_privilege')->result_array();
			$data['role'] = $this->db->get_where('tbl_role')->result_array();

			$this->load->view('template/header');
			$this->load->view('utama/privilege', $data);
			$this->load->view('template/footer');
		}

		function tambah_priv(){

			$acc = $this->input->post('access[]');
			$jml = count($acc);

			for ($i=0; $i < $jml ; $i++) { 
				
				$data = [
					'role' => $this->input->post('role'),
					'access' => $acc[$i],
				];

				
				$cek = $this->db->get_where('tbl_privilege',['role' => $this->input->post('role'), 'access' => $acc[$i]])->Row_array();

				if ($cek == true) {
					
					$this->session->set_flashdata('message', 'swal("Ops!", "Data privilege ada yang sama", "error" );');
					redirect('utama/privilege');

				}else{

					$this->db->insert('tbl_privilege', $data);
				}
			}

			$this->session->set_flashdata('message', 'swal("Yess!", "Data privilege berhasil ditambah", "success" );');
			redirect('utama/privilege');

		}

		function hapus_priv(){

			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->delete('tbl_privilege');
			$this->session->set_flashdata('message', 'swal("Yess!", "Data privilege berhasil dihapus", "success" );');
			redirect('utama/privilege');
		}

		function getRomawi(){
			$bln = date('m');
			switch ($bln){
				case 1: 
				return "I";
				break;
				case 2:
				return "II";
				break;
				case 3:
				return "III";
				break;
				case 4:
				return "IV";
				break;
				case 5:
				return "V";
				break;
				case 6:
				return "VI";
				break;
				case 7:
				return "VII";
				break;
				case 8:
				return "VIII";
				break;
				case 9:
				return "IX";
				break;
				case 10:
				return "X";
				break;
				case 11:
				return "XI";
				break;
				case 12:
				return "XII";
				break;
			}

		}

		function bayar(){

			$bln = $this->getRomawi();
			$total = $this->cart->total();

			$invoice = 'INVOICE/'.$bln.'/'.date('Y').'/'.rand(0,1000); 

			$cart = $this->cart->contents();
			foreach ($cart as $item) {
				$data = [
					'kode_user' => '',
					'invoice' => $invoice,
					'item' => $item['name'],
					'harga' => $item['price'],
					'qty' => $item['qty'],
					'unit' => $item['unit'],
					'total_harga' =>  $item['subtotal'],
					'total_sebelum_ppn' => $total,
					'total_ppn' => $this->input->post('totalbayar'),

				];

				$this->db->insert('tbl_pembelian', $data);

				$pr = $this->db->get_where('tbl_item',['kode_item' => $item['id']] )->row_array();
				$stok = $pr['stok'] - $item['qty'];
				$this->db->where('kode_item', $item['id']);
				$update = $this->db->update('tbl_item',['stok' =>$stok]);
				
			}

			$data = [
				'kode_user' => '',
				'invoice' => $invoice,
				'total_harga' => $total,
				'total_harga_ppn' => $this->input->post('totalbayar'),
				'uang' => $this->input->post('uang_anda'),	
				'kembalian' => $this->input->post('kembalian'),
			];
			$this->db->insert('tbl_pembayaran', $data);
			$this->hapus_cart();
			$this->session->set_flashdata('message', 'swal("Yess!", "Data pembelian berhasil ditambah", "success" );');
			redirect('utama/');
		}

		function pembelian(){

			$data['pembelian'] = $this->db->get('tbl_pembelian')->result_array();

			$this->load->view('template/header');
			$this->load->view('utama/pembelian', $data);
			$this->load->view('template/footer');
		}

		function hapus_pembelian(){
			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->delete('tbl_pembelian');
			$this->session->set_flashdata('message', 'swal("Yess!", "Data berhasil dihapus", "success" );');
			redirect('utama/pembelian');

		}


	}
?>