<?php
namespace DreamboxRecorder\Controller;

class Recording extends AbstractController {

	public function has() {
		$id = $this->_request->getParam('id');
		$query = "SELECT * FROM recording WHERE id=" . $this->_db->real_escape_string($id);
		$result = $this->_db->query($query);
		
		return $this->_response->write($result->num_rows);
	}

	public function save() {
		$ids = $this->_request->getParam('save');
		if (!empty($ids)) {
			foreach ($ids as $id) {
				// ugly access to superglobals, have to fix that in Core\Request, even i dont think its good to pass array-values by post request
				// do this in a orm, even if its only one table, its just ugly
				$query = "INSERT INTO recording SET 
					id = " . $this->_db->real_escape_string($id) . ",
					token = '" . $this->_db->real_escape_string($_POST['token'][$id]) . "',
					state = 'waiting',
					file = '',
					title = '" . $this->_db->real_escape_string($_POST['title'][$id]) . "',
					subtitle = '" . $this->_db->real_escape_string($_POST['subtitle'][$id]) . "'
				";
				$this->_db->query($query);
			}
		}
		
		return $this->_response->write(true);
	}
	
	public function delete() {
		$ids = $this->_request->getParam('delete');
		return $this->_response->write('got me');
	}

}
?>