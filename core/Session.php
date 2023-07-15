<?php

// Lớp session
class Session
{
	// Hàm bắt đầu session
	public function start()
	{
		session_start();
	}

	// Hàm lưu session 
	public function send($user)
	{
		$_SESSION['userems'] = $user;
	}

	// Hàm lấy dữ liệu session
	public function get()
	{
		if (isset($_SESSION['userems'])) {
			$user = $_SESSION['userems'];
		} else {
			$user = '';
		}
		return $user;
	}

	// Hàm xoá session
	public function destroy()
	{
		session_destroy();
	}
}
