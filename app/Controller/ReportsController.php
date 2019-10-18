<?php
App::uses('AppController', 'Controller');

App::import('Vendor','tcpdf/xtcpdf');

/**
 * Reports Controller
 *
 * @property Report $Report
 * @property PaginatorComponent $Paginator
 */
class ReportsController extends AppController {

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
		$this->Report->recursive = 0;
		$this->set('reports', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Report->exists($id)) {
			throw new NotFoundException(__('Invalid report'));
		}
		$options = array('conditions' => array('Report.' . $this->Report->primaryKey => $id));
		$this->set('report', $this->Report->find('first', $options));
	}

/**
 * getpdf method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function getpdf($jobcenter_id = null) {
		
		$this->get($jobcenter_id, true);

	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Report->create();
			if ($this->Report->save($this->request->data)) {
				$this->Flash->success(__('The report has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The report could not be saved. Please, try again.'));
			}
		}
		$companies = $this->Report->Company->find('list');
		$jobcenters = $this->Report->Jobcenter->find('list');
		$statuses = $this->Report->Status->find('list');
		$this->set(compact('companies', 'jobcenters', 'statuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Report->exists($id)) {
			throw new NotFoundException(__('Invalid report'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Report->save($this->request->data)) {
				$this->Flash->success(__('The report has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The report could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Report.' . $this->Report->primaryKey => $id));
			$this->request->data = $this->Report->find('first', $options);
		}
		$companies = $this->Report->Company->find('list');
		$jobcenters = $this->Report->Jobcenter->find('list');
		$statuses = $this->Report->Status->find('list');
		$this->set(compact('companies', 'jobcenters', 'statuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Report->id = $id;
		if (!$this->Report->exists()) {
			throw new NotFoundException(__('Invalid report'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Report->delete()) {
			$this->Flash->success(__('The report has been deleted.'));
		} else {
			$this->Flash->error(__('The report could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


/**
 * get method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function get($jobcenter_id = null, $pdf = false) {
		
		if ($jobcenter_id === null || $jobcenter_id <= 0) {
			$this->Flash->error(__('Por favor seleccione un centro de trabajo existente'));
			return $this->redirect(array('controller' => 'Jobcenters', 'action' => 'index'));
		}

		$this->loadModel('Response');
		$responses = $this->Response->find('all', ['fields' => ['jobcenter_id','no_interview','question_id','response_value',
																'Question.number','Question.querstionary_type','Question.text','Question.category','Question.domain','Question.dimension',
																'Question.r_always','Question.r_almost_always','Question.r_sometimes',
																'Question.r_almost_never','Question.r_never'
															   ], 
												   'conditions' => ['jobcenter_id' => $jobcenter_id, 'Status.text' => 'Active']]);  
		
		if(empty($responses)) {
			$this->Flash->error(__('No se encontraron evaluaciones para este centro'));
			return $this->redirect(array('controller' => 'Jobcenters', 'action' => 'index'));
		}
		
		$this->loadModel('Jobcenter');
		$jobcenter = $this->Jobcenter->find('first', ['conditions' => ['Jobcenter.id' => $jobcenter_id, 'Status.text' => 'Active']]); 
		
		$this->loadModel('State');
		$state = $this->State->find('first', ['conditions' => ['State.id' => $jobcenter['Jobcenter']['state_id'] ]]); 

		// array(1 => 'Siempre', 2 => 'Casi siempre', 3 => 'Algunas veces', 4 => 'Casi nunca', 5 => 'Nunca');
		foreach($responses as $i => $v) {

			$r_always[ $v['Response']['question_id'] ]			= 0;
			$r_almost_always[ $v['Response']['question_id'] ]	= 0;
			$r_sometimes[ $v['Response']['question_id'] ]		= 0;
			$r_almost_never[ $v['Response']['question_id'] ]	= 0;
			$r_never[ $v['Response']['question_id'] ]			= 0;
			
			$questionary_type = $v['Question']['querstionary_type'];
		}
		
		$total = 0;

		foreach($responses as $i => $v) {

			if( $v['Response']['response_value'] == '1' ) {
				
				$value = $v['Question']['r_always'];
				$r_always[ $v['Response']['question_id'] ] += 1;
				
			} else if( $v['Response']['response_value'] == '2' ) {
				
				$value = $v['Question']['r_almost_always'];
				$r_almost_always[ $v['Response']['question_id'] ] += 1;

			} else if( $v['Response']['response_value'] == '3' ) {
				
				$value = $v['Question']['r_sometimes'];
				$r_sometimes[ $v['Response']['question_id'] ] += 1;
			
			} else if( $v['Response']['response_value'] == '4' ) {
				
				$value = $v['Question']['r_almost_never'];
				$r_almost_never[ $v['Response']['question_id'] ] += 1;
			
			} else if( $v['Response']['response_value'] == '5' ) {
				
				$value = $v['Question']['r_never'];
				$r_never[ $v['Response']['question_id'] ] += 1;
			}

			$questions_list[$v['Response']['question_id']] = ['question_id' => $v['Response']['question_id'], 
															  'number' => $v['Question']['number'], 
															  'question_text' => $v['Question']['text']
															 ];

			@$categories_results_tmp[ $v['Question']['category'] ] += $value;

			@$domains_results_tmp[ $v['Question']['domain'] ] += $value;
			
			
			$total += $value;
		}


		if( $questionary_type == 'III' ) { 


			foreach($categories_results_tmp as $name => $value) {
				
				if( $name == 'Ambiente de trabajo' ) {
					
					if( $value < 5 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Nulo o despreciable', 'color' => '#9BE5F7'];
				
					} else if ( $value >= 5 && $value < 9 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Bajo', 'color' => '#6BF56E'];

					} else if ( $value >= 9 && $value < 11 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Medio', 'color' => '#FFFF00'];

					} else if ( $value >= 11 && $value < 14 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Alto', 'color' => '#FFC000'];

					} else {
					
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Muy alto', 'color' => '#FF0000'];

					}

				} else if( $name == 'Factores propios de la actividad' ) {
					
					if( $value < 15 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Nulo o despreciable', 'color' => '#9BE5F7'];
				
					} else if ( $value >= 15 && $value < 30 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Bajo', 'color' => '#6BF56E'];

					} else if ( $value >= 30 && $value < 45 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Medio', 'color' => '#FFFF00'];

					} else if ( $value >= 45 && $value < 60 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Alto', 'color' => '#FFC000'];

					} else {
					
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Muy alto', 'color' => '#FF0000'];

					}
				
				} else if( $name == 'Organizacion del tiempo de trabajo' ) {
					
					if( $value < 5 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Nulo o despreciable', 'color' => '#9BE5F7'];
				
					} else if ( $value >= 5 && $value < 7 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Bajo', 'color' => '#6BF56E'];

					} else if ( $value >= 7 && $value < 10 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Medio', 'color' => '#FFFF00'];

					} else if ( $value >= 10 && $value < 13 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Alto', 'color' => '#FFC000'];

					} else {
					
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Muy alto', 'color' => '#FF0000'];

					}
				
				} else if( $name == 'Liderazgo y relaciones en el trabajo' ) {
					
					if( $value < 14 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Nulo o despreciable', 'color' => '#9BE5F7'];
				
					} else if ( $value >= 14 && $value < 29 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Bajo', 'color' => '#6BF56E'];

					} else if ( $value >= 29 && $value < 42 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Medio', 'color' => '#FFFF00'];

					} else if ( $value >= 42 && $value < 58 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Alto', 'color' => '#FFC000'];

					} else {
					
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Muy alto', 'color' => '#FF0000'];

					}
				
				} else if( $name == 'Entorno organizacional' ) {
					
					if( $value < 10 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Nulo o despreciable', 'color' => '#9BE5F7'];
				
					} else if ( $value >= 10 && $value < 14 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Bajo', 'color' => '#6BF56E'];

					} else if ( $value >= 14 && $value < 18 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Medio', 'color' => '#FFFF00'];

					} else if ( $value >= 18 && $value < 23 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Alto', 'color' => '#FFC000'];

					} else {
					
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Muy alto', 'color' => '#FF0000'];

					}
				
				}
			
			}

			foreach($domains_results_tmp as $name => $value) {
				
				if ( $name == 'Condiciones en el ambiente de trabajo' ) {

					if( $value < 5 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Nulo o despreciable', 'color' => '#9BE5F7'];
				
					} else if ( $value >= 5 && $value < 9 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Bajo', 'color' => '#6BF56E'];

					} else if ( $value >= 9 && $value < 11 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Medio', 'color' => '#FFFF00'];

					} else if ( $value >= 11 && $value < 14 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Alto', 'color' => '#FFC000'];

					} else {
					
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Muy alto', 'color' => '#FF0000'];

					}

				} else if ( $name == 'Carga de trabajo' ) {

					if( $value < 15 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Nulo o despreciable', 'color' => '#9BE5F7'];
				
					} else if ( $value >= 15 && $value < 21 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Bajo', 'color' => '#6BF56E'];

					} else if ( $value >= 21 && $value < 27 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Medio', 'color' => '#FFFF00'];

					} else if ( $value >= 27 && $value < 37 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Alto', 'color' => '#FFC000'];

					} else {
					
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Muy alto', 'color' => '#FF0000'];

					}
				
				} else if ( $name == 'Falta de control sobre el trabajo' ) {

					if( $value < 11 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Nulo o despreciable', 'color' => '#9BE5F7'];
				
					} else if ( $value >= 11 && $value < 16 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Bajo', 'color' => '#6BF56E'];

					} else if ( $value >= 16 && $value < 21 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Medio', 'color' => '#FFFF00'];

					} else if ( $value >= 21 && $value < 25 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Alto', 'color' => '#FFC000'];

					} else {
					
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Muy alto', 'color' => '#FF0000'];

					}
				
				} else if ( $name == 'Jornada de trabajo' ) {

					if( $value < 1 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Nulo o despreciable', 'color' => '#9BE5F7'];
				
					} else if ( $value >= 1 && $value < 2 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Bajo', 'color' => '#6BF56E'];

					} else if ( $value >= 2 && $value < 4 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Medio', 'color' => '#FFFF00'];

					} else if ( $value >= 4 && $value < 6 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Alto', 'color' => '#FFC000'];

					} else {
					
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Muy alto', 'color' => '#FF0000'];

					}
				
				} else if ( $name == 'Interferencia en la relacion trabajo-familia' ) {

					if( $value < 4 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Nulo o despreciable', 'color' => '#9BE5F7'];
				
					} else if ( $value >= 4 && $value < 6 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Bajo', 'color' => '#6BF56E'];

					} else if ( $value >= 6 && $value < 8 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Medio', 'color' => '#FFFF00'];

					} else if ( $value >= 8 && $value < 10 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Alto', 'color' => '#FFC000'];

					} else {
					
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Muy alto', 'color' => '#FF0000'];

					}
				
				} else if ( $name == 'Liderazgo' ) {

					if( $value < 9 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Nulo o despreciable', 'color' => '#9BE5F7'];
				
					} else if ( $value >= 9 && $value < 12 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Bajo', 'color' => '#6BF56E'];

					} else if ( $value >= 12 && $value < 16 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Medio', 'color' => '#FFFF00'];

					} else if ( $value >= 16 && $value < 20 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Alto', 'color' => '#FFC000'];

					} else {
					
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Muy alto', 'color' => '#FF0000'];

					}

				} else if ( $name == 'Relaciones en el trabajo' ) {

					if( $value < 10 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Nulo o despreciable', 'color' => '#9BE5F7'];
				
					} else if ( $value >= 10 && $value < 13 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Bajo', 'color' => '#6BF56E'];

					} else if ( $value >= 13 && $value < 17 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Medio', 'color' => '#FFFF00'];

					} else if ( $value >= 17 && $value < 21 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Alto', 'color' => '#FFC000'];

					} else {
					
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Muy alto', 'color' => '#FF0000'];

					}

				} else if ( $name == 'Violencia' ) {

					if( $value < 7 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Nulo o despreciable', 'color' => '#9BE5F7'];
				
					} else if ( $value >= 7 && $value < 10 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Bajo', 'color' => '#6BF56E'];

					} else if ( $value >= 10 && $value < 13 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Medio', 'color' => '#FFFF00'];

					} else if ( $value >= 13 && $value < 16 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Alto', 'color' => '#FFC000'];

					} else {
					
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Muy alto', 'color' => '#FF0000'];

					}

				} else if ( $name == 'Reconocimiento del desempeno' ) {

					if( $value < 6 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Nulo o despreciable', 'color' => '#9BE5F7'];
				
					} else if ( $value >= 6 && $value < 10 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Bajo', 'color' => '#6BF56E'];

					} else if ( $value >= 10 && $value < 14 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Medio', 'color' => '#FFFF00'];

					} else if ( $value >= 14 && $value < 18 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Alto', 'color' => '#FFC000'];

					} else {
					
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Muy alto', 'color' => '#FF0000'];

					}

				} else if ( $name == 'Insuficiente sentido de pertenencia e, inestabilidad' ) {

					if( $value < 4 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Nulo o despreciable', 'color' => '#9BE5F7'];
				
					} else if ( $value >= 4 && $value < 6 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Bajo', 'color' => '#6BF56E'];

					} else if ( $value >= 6 && $value < 8 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Medio', 'color' => '#FFFF00'];

					} else if ( $value >= 8 && $value < 10 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Alto', 'color' => '#FFC000'];

					} else {
					
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Muy alto', 'color' => '#FF0000'];

					}

				}
			
			}


			if( $total < 50 ) {
				
				$total_evaluation_text = 'Nulo o despreciable';
				$total_evaluation_color = '#9BE5F7';
	
			} else if ( $total >= 50 && $total < 75 ) {
				
				$total_evaluation_text = 'Bajo';
				$total_evaluation_color = '#6BF56E';

			} else if ( $total >= 75 && $total < 99 ) {
				
				$total_evaluation_text = 'Medio';
				$total_evaluation_color = '#FFFF00';

			} else if ( $total >= 99 && $total < 140 ) {
				
				$total_evaluation_text = 'Alto';
				$total_evaluation_color = '#FFC000';

			} else {
			
				$total_evaluation_text = 'Muy alto';
				$total_evaluation_color = '#FF0000';

			}
		
		} else if ( $questionary_type == 'II' ) { 
		
			foreach($categories_results_tmp as $name => $value) {
				
				if( $name == 'Ambiente de trabajo' ) {
					
					if( $value < 3 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Nulo o despreciable', 'color' => '#9BE5F7'];
				
					} else if ( $value >= 3 && $value < 5 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Bajo', 'color' => '#6BF56E'];

					} else if ( $value >= 5 && $value < 7 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Medio', 'color' => '#FFFF00'];

					} else if ( $value >= 7 && $value < 9 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Alto', 'color' => '#FFC000'];

					} else {
					
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Muy alto', 'color' => '#FF0000'];

					}

				} else if( $name == 'Factores propios de la actividad' ) {
					
					if( $value < 10 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Nulo o despreciable', 'color' => '#9BE5F7'];
				
					} else if ( $value >= 10 && $value < 20 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Bajo', 'color' => '#6BF56E'];

					} else if ( $value >= 20 && $value < 30 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Medio', 'color' => '#FFFF00'];

					} else if ( $value >= 30 && $value < 40 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Alto', 'color' => '#FFC000'];

					} else {
					
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Muy alto', 'color' => '#FF0000'];

					}
				
				} else if( $name == 'Organizacion del tiempo de trabajo' ) {
					
					if( $value < 4 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Nulo o despreciable', 'color' => '#9BE5F7'];
				
					} else if ( $value >= 4 && $value < 6 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Bajo', 'color' => '#6BF56E'];

					} else if ( $value >= 6 && $value < 9 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Medio', 'color' => '#FFFF00'];

					} else if ( $value >= 9 && $value < 12 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Alto', 'color' => '#FFC000'];

					} else {
					
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Muy alto', 'color' => '#FF0000'];

					}
				
				} else if( $name == 'Liderazgo y relaciones en el trabajo' ) {
					
					if( $value < 10 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Nulo o despreciable', 'color' => '#9BE5F7'];
				
					} else if ( $value >= 10 && $value < 18 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Bajo', 'color' => '#6BF56E'];

					} else if ( $value >= 18 && $value < 28 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Medio', 'color' => '#FFFF00'];

					} else if ( $value >= 28 && $value < 38 ) {
						
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Alto', 'color' => '#FFC000'];

					} else {
					
						$categories_results[ $name ] = ['result' => $value, 'risk_level' => 'Muy alto', 'color' => '#FF0000'];

					}
				
				}
			
			}

			foreach($domains_results_tmp as $name => $value) {
				
				if ( $name == 'Condiciones en el ambiente de trabajo' ) {

					if( $value < 3 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Nulo o despreciable', 'color' => '#9BE5F7'];
				
					} else if ( $value >= 3 && $value < 5 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Bajo', 'color' => '#6BF56E'];

					} else if ( $value >= 5 && $value < 7 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Medio', 'color' => '#FFFF00'];

					} else if ( $value >= 7 && $value < 9 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Alto', 'color' => '#FFC000'];

					} else {
					
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Muy alto', 'color' => '#FF0000'];

					}

				} else if ( $name == 'Carga de trabajo' ) {

					if( $value < 12 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Nulo o despreciable', 'color' => '#9BE5F7'];
				
					} else if ( $value >= 12 && $value < 16 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Bajo', 'color' => '#6BF56E'];

					} else if ( $value >= 16 && $value < 20 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Medio', 'color' => '#FFFF00'];

					} else if ( $value >= 20 && $value < 24 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Alto', 'color' => '#FFC000'];

					} else {
					
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Muy alto', 'color' => '#FF0000'];

					}
				
				} else if ( $name == 'Falta de control sobre el trabajo' ) {

					if( $value < 5 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Nulo o despreciable', 'color' => '#9BE5F7'];
				
					} else if ( $value >= 5 && $value < 8 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Bajo', 'color' => '#6BF56E'];

					} else if ( $value >= 8 && $value < 11 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Medio', 'color' => '#FFFF00'];

					} else if ( $value >= 11 && $value < 14 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Alto', 'color' => '#FFC000'];

					} else {
					
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Muy alto', 'color' => '#FF0000'];

					}
				
				} else if ( $name == 'Jornada de trabajo' ) {

					if( $value < 1 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Nulo o despreciable', 'color' => '#9BE5F7'];
				
					} else if ( $value >= 1 && $value < 2 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Bajo', 'color' => '#6BF56E'];

					} else if ( $value >= 2 && $value < 4 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Medio', 'color' => '#FFFF00'];

					} else if ( $value >= 4 && $value < 6 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Alto', 'color' => '#FFC000'];

					} else {
					
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Muy alto', 'color' => '#FF0000'];

					}
				
				} else if ( $name == 'Interferencia en la relacion trabajo-familia' ) {

					if( $value < 1 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Nulo o despreciable', 'color' => '#9BE5F7'];
				
					} else if ( $value >= 1 && $value < 2 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Bajo', 'color' => '#6BF56E'];

					} else if ( $value >= 2 && $value < 4 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Medio', 'color' => '#FFFF00'];

					} else if ( $value >= 4 && $value < 6 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Alto', 'color' => '#FFC000'];

					} else {
					
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Muy alto', 'color' => '#FF0000'];

					}
				
				} else if ( $name == 'Liderazgo' ) {

					if( $value < 3 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Nulo o despreciable', 'color' => '#9BE5F7'];
				
					} else if ( $value >= 3 && $value < 5 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Bajo', 'color' => '#6BF56E'];

					} else if ( $value >= 5 && $value < 8 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Medio', 'color' => '#FFFF00'];

					} else if ( $value >= 8 && $value < 11 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Alto', 'color' => '#FFC000'];

					} else {
					
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Muy alto', 'color' => '#FF0000'];

					}

				} else if ( $name == 'Relaciones en el trabajo' ) {

					if( $value < 5 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Nulo o despreciable', 'color' => '#9BE5F7'];
				
					} else if ( $value >= 5 && $value < 8 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Bajo', 'color' => '#6BF56E'];

					} else if ( $value >= 8 && $value < 11 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Medio', 'color' => '#FFFF00'];

					} else if ( $value >= 11 && $value < 14 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Alto', 'color' => '#FFC000'];

					} else {
					
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Muy alto', 'color' => '#FF0000'];

					}

				} else if ( $name == 'Violencia' ) {

					if( $value < 7 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Nulo o despreciable', 'color' => '#9BE5F7'];
				
					} else if ( $value >= 7 && $value < 10 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Bajo', 'color' => '#6BF56E'];

					} else if ( $value >= 10 && $value < 13 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Medio', 'color' => '#FFFF00'];

					} else if ( $value >= 13 && $value < 16 ) {
						
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Alto', 'color' => '#FFC000'];

					} else {
					
						$domains_results[ $name ] = ['result' => $value, 'risk_level' => 'Muy alto', 'color' => '#FF0000'];

					}

				}
			
			}
			
			if( $total < 20 ) {
				
				$total_evaluation_text = 'Nulo o despreciable';
				$total_evaluation_color = '#9BE5F7';

			} else if ( $total >= 20 && $total < 45 ) {
				
				$total_evaluation_text = 'Bajo';
				$total_evaluation_color = '#6BF56E';

			} else if ( $total >= 45 && $total < 70 ) {
				
				$total_evaluation_text = 'Medio';
				$total_evaluation_color = '#FFFF00';

			} else if ( $total >= 70 && $total < 90 ) {
				
				$total_evaluation_text = 'Alto';
				$total_evaluation_color = '#FFC000';

			} else {
			
				$total_evaluation_text = 'Muy alto';
				$total_evaluation_color = '#FF0000';
			}

		}

		$risk = array();

		
		$risk['Nulo o despreciable'] = 'El riesgo resulta despreciable por lo que no se requiere medidas adicionales.';
		$risk['Bajo'] = 'Es necesario una mayor difusion de la política de prevención de riesgos psicosociales y programas para: la prevencion de los factores de riesgo psicosocial, la promocion de un entorno organizacional favorable y la prevención de la violencia laboral.';
		$risk['Medio'] = 'Se requiere revisar la politica de prevencion de riesgos psicosociales y programas para la prevencion de los factores de riesgo psicosocial, la promocion de un entorno organizacional favorable y la prevencion de la violencia laboral, asi como reforzar su aplicacion y difusion, mediante un Programa de intervencion.';
		$risk['Alto'] = 'Se requiere realizar un analisis de cada categoria y dominio, de manera que se puedan determinar las acciones de intervencion apropiadas a traves de un Programa de intervencion, que podra incluir una evaluacion especifica1 y debera incluir una campana de sensibilizacion, revisar la politica de prevencion de riesgos psicosociales y programas para la prevencion de los factores de riesgo psicosocial, la promocion de un entorno organizacional favorable y la prevencion de la violencia laboral, asi como reforzar su aplicacion y difusion.';
		$risk['Muy alto'] = 'Se requiere realizar el analisis de cada categoria y dominio para establecer las acciones de intervencion apropiadas, mediante un Programa de intervencion que debera incluir evaluaciones especificas1, y contemplar campanas de sensibilizacion, revisar la politica de prevencion de riesgos psicosociales y programas para la prevencion de los factores de riesgo psicosocial, la promocion de un entorno organizacional favorable y la prevencion de la violencia laboral, asi como reforzar su aplicacion y difusion.';

	
		$this->set(compact('jobcenter', 'state', 'questions_list', 'r_always', 'r_almost_always', 'r_sometimes', 
						   'r_almost_never', 'r_never', 'total', 'total_evaluation_text', 'total_evaluation_color',
							'categories_results', 'risk','domains_results' ));

	
		if( $pdf ) {
			
			$this->layout = 'pdf';
			$this->render();
		}
	}



}
