<?php
App::uses('AppController', 'Controller');
/**
 * Responses Controller
 *
 * @property Response $Response
 * @property PaginatorComponent $Paginator
 */
class ResponsesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Response->recursive = 0;
		$this->set('responses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Response->exists($id)) {
			throw new NotFoundException(__('Invalid response'));
		}
		$options = array('conditions' => array('Response.' . $this->Response->primaryKey => $id));
		$this->set('response', $this->Response->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {

			foreach($this->request->data['Response'] as $index => $value ) {
				
				if( substr($index, 0, 1) == 'q') {

					$arr = array();
					$this->Response->create();

					$tmp = explode('_', $index);
					$arr['Response']['jobcenter_id']	= $this->request->data['Response']['jobcenter_id'];
					$arr['Response']['no_interview']	= $this->request->data['Response']['no_interview'];
					$arr['Response']['question_id']		= $tmp[1];
					$arr['Response']['response_value']	= $value;

					$this->Response->save($arr);
				}
			}

			
			$this->Flash->success(__('La informacion ha sido guardada'));
			return $this->redirect(array('action' => 'startevaluation', $this->request->data['Response']['jobcenter_id']));
			
	}
}


/**
 * selectcenter method
 *
 * @return void
 */
	public function selectcenter($id = null) {
		if ($this->request->is('post')) {
			$this->Response->create();
			if ($this->Response->save($this->request->data)) {
				$this->Flash->success(__('The response has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The response could not be saved. Please, try again.'));
			}
		}
		$this->loadModel('Jobcenter');
		$this->set('jobcenters', $this->Jobcenter->find("all", array('conditions' => array('company_id' => $id))));
	}


/**
 * startevaluation method
 *
 * @return void
 */
	public function startevaluation($id = null) {

		$this->loadModel('User');
		$user = $this->User->find('first', array('conditions' => array( 'User.id' => $userId = $this->Auth->user('id'))));

		if( $user['User']['role'] != 'admin' && $user['User']['paid'] == '0') {
			return $this->redirect(array('controller' => 'Companies' ));
		}

		if ($this->request->is('post')) {
			$this->Response->create();
			if ($this->Response->save($this->request->data)) {
				$this->Flash->success(__('The response has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The response could not be saved. Please, try again.'));
			}
		}

		$this->loadModel('Jobcenter');
		$jobcenter = $this->Jobcenter->find("first", array('conditions' => array('Jobcenter.id' => $id)));

		$no_employees_to_interview = $this->calculateNumberOfInterviews( $jobcenter['Jobcenter']['no_employees'] );		
		$jobcenter['Jobcenter']['no_employees_to_interview'] = $no_employees_to_interview;

		if ($no_employees_to_interview === false) {

			$this->Flash->error(__('Favor de capturar los datos completos del centro de trabajo'));
			return $this->redirect(array('controller' => 'Jobcenters', 'action' => 'edit', $id));
		}

		$no_evaluations = $this->calculateNumberOfEvaluations( $jobcenter['Jobcenter']['no_employees'] );		
		$jobcenter['Jobcenter']['no_evaluations'] = $no_evaluations;

		$this->Jobcenter->save($jobcenter);

		$interview_type = $this->calculateInterviewType( $jobcenter['Jobcenter']['no_employees'] );

		$interview_no = $this->getNextInterviewNumber( $id, $no_evaluations );


		if( $interview_no === false ) {
			
			$this->Flash->error(__('Ya se han contestado el maximo numero de encuestas para este centro de trabajo'));
			return $this->redirect(array('controller' => 'Jobcenters'));
		}
		
		$this->set(compact('interview_no', 'no_evaluations'));
		
		$this->loadModel('Question');
		$questions = $this->Question->find("all", array('conditions' => array('querstionary_type' => $interview_type)));
		
		$this->set(compact('questions'));

		$this->set('jobcenter_id', $id); 
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Response->exists($id)) {
			throw new NotFoundException(__('Invalid response'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Response->save($this->request->data)) {
				$this->Flash->success(__('The response has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The response could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Response.' . $this->Response->primaryKey => $id));
			$this->request->data = $this->Response->find('first', $options);
		}
		$questions = $this->Response->Question->find('list');
		$statuses = $this->Response->Status->find('list');
		$this->set(compact('questions', 'statuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Response->id = $id;
		if (!$this->Response->exists()) {
			throw new NotFoundException(__('Invalid response'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Response->delete()) {
			$this->Flash->success(__('The response has been deleted.'));
		} else {
			$this->Flash->error(__('The response could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}



	public function calculateNumberOfInterviews( $no_employees ) {
	
		if ( null === $no_employees || $no_employees < 1 ) {
		
			return false;
		}


		if( $no_employees <= 15 ) {
			$no_employees_to_interview = 1;
		
		} else if( $no_employees > 15 && $no_employees <= 50 ) {
			$no_employees_to_interview = 2;
		
		}  else if( $no_employees > 50 && $no_employees <= 105 ) {
			$no_employees_to_interview = 3;
		
		} else {
			$no_employees_to_interview = ceil ( $no_employees / 35 );
		} 

		if($no_employees_to_interview > 15) {
			$no_employees_to_interview = 15;
		}

		return $no_employees_to_interview;
	}


	public function calculateNumberOfEvaluations( $no_employees ) {
	
		if ( null === $no_employees || $no_employees < 1 ) {
		
			return false;
		}

		$no_evaluations = ( 0.9604 * $no_employees ) / (  (0.0025 * ( $no_employees - 1 )) + 0.9604 );

		return ceil($no_evaluations);
	}


	public function calculateInterviewType( $no_employees ) {
	
		if( $no_employees <= 50 ) {
			$interview_type = 'II';
		
		} else {
			$interview_type = 'III';
		}

		return $interview_type;
	}

	public function getNextInterviewNumber( $id, $max_evaluations ) {
	
		
		$options = array('conditions' => array('jobcenter_id' => $id ), 'order' => ['no_interview' => 'DESC']);
		$last_response = $this->Response->find('first', $options);
	
		if( empty($last_response) ) {
			return 1;
		}

		if( ($last_response['Response']['no_interview'] + 1 ) > $max_evaluations ) {
			return false;
		}

		return $last_response['Response']['no_interview'] + 1;
	}
}
