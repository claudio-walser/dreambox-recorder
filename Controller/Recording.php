<?php
namespace DreamboxRecorder\Controller;

class Recording extends AbstractController {

	public function has() {
		$id = $this->_request->getParam('id');
		$query = "SELECT * FROM recording WHERE id=" . $this->_db->real_escape_string($id);
		$result = $this->_db->query($query);
		
		return $this->_response->write($result->num_rows, $result->num_rows, true);
	}

	public function save() {
		$ids = $this->_request->getParam('ids');
		$serviceReferences = $this->_request->getParam('serviceReferences');
		$endTimes = $this->_request->getParam('endTimes');
		$startTimes = $this->_request->getParam('startTimes');
		
		if (!empty($ids)) {
			foreach ($ids as $key => $id) {
				if (!isset($serviceReferences[$key])) {
					throw new \Exception('Param ids doesent match param serviceReferences in length');
				}

				if (!isset($endTimes[$key])) {
					throw new \Exception('Param ids doesent match param serviceReferences in length');
				}

				if (!isset($startTimes[$key])) {
					throw new \Exception('Param ids doesent match param serviceReferences in length');
				}

				$serviceReference = $serviceReferences[$key];
				$timeEnd = $endTimes[$key];
				$timeStart = $startTimes[$key];
				
				// check if intersect with other recording
				// todo, some channels are possible to record in parallel, not sure if i can get it over
				// http://10.20.0.99/web/serviceplayable?sRef=&sRefPlaying=
				$query = "SELECT id FROM recording WHERE 
					(timeStart <= " . $timeStart . " AND timeEnd > " . $timeStart . ")" . 
					"OR (timeStart <= " . $timeEnd . " AND timeEnd > " . $timeEnd . ")";
				$result = $this->_db->query($query);
				if ($result->num_rows > 0) {
					return $this->_response->write('error: intersect', 1, false);
				}

				// save for recording
				$query = "INSERT INTO recording SET 
					id = " . $this->_db->real_escape_string($id) . ",
					token = '" . $this->_db->real_escape_string($serviceReference) . "',
					timeStart = " . $this->_db->real_escape_string($timeStart) . ",
					timeEnd = " . $this->_db->real_escape_string($timeEnd) . ",
					state = 'waiting',
					file = ''
					";
				$this->_db->query($query);
			}
		}
		
		return $this->_response->write($ids);
	}
	
	public function delete() {
		$ids = $this->_request->getParam('ids');
		if (!empty($ids)) {
			foreach ($ids as $key => $id) {
				$query = "DELETE FROM recording WHERE id = " . $this->_db->real_escape_string($id);
				$this->_db->query($query);
			}
		}
		
		return $this->_response->write($ids);
	}

}
?>