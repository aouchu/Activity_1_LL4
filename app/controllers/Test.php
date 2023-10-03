
<?php

class Test extends Controller {
	public $name;
	public function index($name) {
		$this->call->model('User_model');
		$data = [
			'name' => $name,
			'users' => $this->User_model->getUsers(),
		];

		$this->call->view('test', $data);
	}
}
?>