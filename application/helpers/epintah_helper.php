<?php 

function is_logged_in()
{

	$ci = get_instance();
	if (!$ci->session->userdata('email')){
		redirect('auth');
	}
	else
	{

		$role_id = $ci->session->userdata('role_id');
		// echo $role_id['role_id'];
		// print_r($role_id);
		// echo $ci->session->userdata('email');
		$menu = $ci->uri->segment(1);

		$queryMenu = $ci->db->get_where('user_sub_menu', ['url' => $menu])->row_array();
		$menu_id = $queryMenu['menu_id'];
		$queryMenu2 = $ci->db->get_where('user_menu', ['id' => $role_id])->row_array();
		$role = $queryMenu2['id'];

		// $k['user'] = $ci->db->get_where('user_sub_menu', ['url' => $menu])->row_array();

		// $data['user'] = $ci->db->get_where('users', ['email' => $ci->session->userdata('email')])->row_array();
		// $menu_id = $queryMenu['menu_id'];
		// $menu = $user['menu_id'];

		// $userAccess = $ci->db->get_where('users_access_menu', [
		// 	'role_id' => $role_id,
		// 	'menu_id' => $menu_id
		// ]);

		// echo $menu_id;
		// echo $role;
		// die();
		// die();

		if ($role != $menu_id){
			redirect('auth/blocked');

		}

	}

}




 ?>