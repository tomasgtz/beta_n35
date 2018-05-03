<?php
App::uses('AppController', 'Controller');
/**
 * Orders Controller
 *
 * @property Order $Order
 * @property PaginatorComponent $Paginator
 */
class OrdersController extends AppController {

	public $fileMessageError;
/**
 * Components
 *
 * @var array
 */
	public $components = array();

/**
 * index method
 *
 * @return void
 */
	public function index() {
        $this->Order->recursive = 0;
        $user = $this->Auth->user();
        if (isset($user['role']) && $user['role'] == 'admin' ) {
          $this->set('orders', $this->Order->find("all"));
        } else {
          $this->set('orders', $this->Order->find("all",array("conditions" => array("user_id" => $user['id']))));
        }		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
		$this->set('order', $this->Order->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

		if ($this->request->is('put')) {
			
			if($this->request->data['Order']['set_order'] == 1) {
				
				$validData = $this->validateFields();

				if($validData === false) {
					$this->Flash->error(__('Favor de llenar los siguientes campos antes de colocar pedido:<br>Cliente, Email, Tipo de pago, Comprobante, Modelo, Precio y Cantidad '));
					return $this->redirect(array('controller'=>'Quotes', 'action' => 'index'));
				}
			}

			$this->Order->create();
			//debug($this->request->data);
			$data = $this->request->data;
			unset($data['Order']['payment_url']);

			if($this->request->data['Order']['set_order'] == 1) {
				$data['Order']['orders_phase_id'] = 5;
			} else {
				$data['Order']['orders_phase_id'] = 13;	
			}
			
			
			if ($this->Order->save($data)) {

				// save the order detail
				$this->LoadModel('OrdersDetail');
				$this->OrdersDetail->create();
				$data['Orders_Detail'][0]['order_id'] = $this->Order->getLastInsertId();
				$this->OrdersDetail->save($data['Orders_Detail'][0]);
				
				// save the services of the detail row
				$this->LoadModel('OrdersDetailsService');
				$services = array();
				
				foreach($data['Order']['service_id'] as $id => $value) {
					$services[] = array('OrdersDetailsService' =>
						array('orders_detail_id' => $this->OrdersDetail->getLastInsertId(), 
					'service_id' => $value)
					);
				}				
				$this->OrdersDetailsService->saveAll($services);				
				$filepath = $this->saveFile( $this->Order->getLastInsertId() );

				// save payment file
				if ($filepath !== false) {
					
					unset($data);
					$data['Order']['id'] = $this->Order->getLastInsertId();
					$data['Order']['payment_url'] = $filepath;
					$this->Order->save($data);
					
					$this->Flash->success(__('The order has been saved.'));
					return $this->redirect(array('action' => 'index'));

				} else {
				
					$this->Flash->error(__('Error:' . $this->fileMessageError ));
				}

			} else {
				$this->Flash->error(__('Error: la orden no pudo ser guardada'));
			}
		}
		
		// --------- convert quote into order 
		$quote_id = $this->request['pass'][0];
		$quote = $this->Order->Quote->findById($quote_id);

		if($this->Order->findByQuoteId($quote_id)) {
			$this->Flash->error(__('La cotizacion ya había sido convertida a pedido anteriormente.'));
			return $this->redirect(array('controller'=>'Quotes', 'action' => 'index'));
		}
		
		$this->request->data['Order'] = $quote['Quote'];
		$this->request->data['Order']['quote_id'] = $quote_id;
		$this->request->data['Quote'] = $quote['Quote'];
		$this->request->data['Branch'] = $quote['Branch'];
		$this->request->data['Orders_Detail'] = $quote['Quotes_Detail'];
		// -------------------------------------

		// ---- load services list -------------
		$this->LoadModel('Services');
		$services = $this->Services->find('list');
		$selected = $this->Services->find('list', array(
        'fields' => array('id')));
		// -------------------------------------

		$quotes = $this->Order->Quote->find('list');
		$branches = $this->Order->Branch->find('list');
		$paymentsTypes = $this->Order->PaymentsType->find('list');
		$ordersPhases = $this->Order->OrdersPhase->find('list');
		$createdUsers = $this->Order->CreatedUser->find('list');
		$modifiedUsers = $this->Order->ModifiedUser->find('list');
		$statuses = $this->Order->Status->find('list');
//		debug( $services );
		$this->set(compact( 'quotes', 'branches', 'paymentsTypes', 'ordersPhases', 'createdUsers', 'modifiedUsers', 'statuses', 'services', 'selected'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		
		// set appropiate view according role
		$this->view = 'edit.admin';
		$role = $this->Auth->user()['role'];
		
		if($role == 'normal') {
			$this->view = 'edit.user';
		}

		// validate user can edit his own orders only
		if ($or = $this->Order->findById($id)) {
			if($role == 'admin') {
				// admin can see all orders
			} else if($or['Branch']['user_id'] <> $this->Auth->user()['id']) {
				throw new NotFoundException(__('Access denied'));
			}
		}

		if ($this->request->is(array('post', 'put'))) {
			debug($this->request->data);

			if ($this->Order->save($this->request->data)) {


				$this->Flash->success(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The order could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
			$this->request->data = $this->Order->find('first', $options);
		}
		
		$this->LoadModel('OrdersDetailsService');
		$this->OrdersDetailsService->recursive = -1;
		$selected = $this->OrdersDetailsService->find('list', array('fields' => array('service_id'), 'conditions' => array('orders_detail_id' => $this->request->data['Orders_Detail'][0]['id'])));
		
		$this->LoadModel('Services');
		$services = $this->Services->find('list');
		
		$quotes = $this->Order->Quote->find('list');
		$branches = $this->Order->Branch->find('list');
		$paymentsTypes = $this->Order->PaymentsType->find('list');
		$ordersPhases = $this->Order->OrdersPhase->find('list');
		$createdUsers = $this->Order->CreatedUser->find('list');
		$modifiedUsers = $this->Order->ModifiedUser->find('list');
		$statuses = $this->Order->Status->find('list');
		$this->set(compact('quotes', 'branches', 'paymentsTypes', 'ordersPhases', 'createdUsers', 'modifiedUsers', 'statuses', 'services', 'selected' ));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Order->delete()) {
			$this->Flash->success(__('The order has been deleted.'));
		} else {
			$this->Flash->error(__('The order could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


	public function isAuthorized($user) {
        // Admin can access every action
        if (isset($user['role'])) {
            return true;
        }
        // Default deny
        return parent::isAuthorized($user);
    }


	public function saveFile($order_id) {
	
		$app = str_replace('Controller\\', '', __DIR__ . DIRECTORY_SEPARATOR);
		$paymentsPath = $app . 'webroot' . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR;
		
		$extension = substr(strtolower(strrchr($this->request->data['Order']['payment_url']['name'], '.')), 1);
		$allowedExtensions = array('jpg', 'jpeg', 'gif', 'png', 'pdf', 'doc', 'docx', 'zip');
		
		if( !in_array($extension, $allowedExtensions) ) // Check extensions
		{
			$this->fileMessageError = 'El pedido fue creado, sin embargo, el comprobante de pago que estás intentando subir tiene una extension desconocida';
			return false;
		}
		
		$fullName = $this->request->data['Order']['payment_url']['name'];
		$nameWithoutExt = str_replace($extension, '', $fullName);

		$fileName  =  $nameWithoutExt.
		'_Orden_'.$order_id.'_'.date('YmdHis') .'.'. $extension;

		// Valida si el archivo pudo ser cargado en el directorio
		if(!move_uploaded_file( $this->request->data['Order']['payment_url']['tmp_name'], $paymentsPath.$fileName ) ) 
		{
			$this->fileMessageError = 'El pedido fue creado, sin embargo, el comprobante de pago no pudo cargarse correctamente';
			return false;
		}

		return $fileName;
	}


	public function validateFields() {

		if(!isset($this->request->data['Order']['payment_url']['tmp_name']) || $this->request->data['Order']['payment_url']['tmp_name'] == null) {
			$this->request->data['Order']['payment_url']['tmp_name'] = '';
		}

		if(!isset($this->request->data['Order']['customer_name']) || $this->request->data['Order']['customer_name'] == null) {
			$this->request->data['Order']['customer_name'] = '';
		}

		if(!isset($this->request->data['Order']['customer_email']) || $this->request->data['Order']['customer_email'] == null) {
			$this->request->data['Order']['customer_email'] = '';
		}

		if(!isset($this->request->data['Order']['payments_type_id']) || $this->request->data['Order']['payments_type_id'] == null) {
			$this->request->data['Order']['payments_type_id'] = '';
		}

		if(!isset($this->request->data['Orders_Detail'][0]['part_number']) || $this->request->data['Orders_Detail'][0]['part_number'] == null) {
			$this->request->data['Orders_Detail'][0]['part_number'] = '';
		}

		if(!isset($this->request->data['Orders_Detail'][0]['price']) || $this->request->data['Orders_Detail'][0]['price'] == null) {
			$this->request->data['Orders_Detail'][0]['price'] = '';
		}

		if(!isset($this->request->data['Orders_Detail'][0]['quantity']) || $this->request->data['Orders_Detail'][0]['quantity'] == null) {
			$this->request->data['Orders_Detail'][0]['quantity'] = '';
		}

		if(empty($this->request->data['Order']['payment_url']['tmp_name']) || 
			empty($this->request->data['Order']['customer_name']) || 
			empty($this->request->data['Order']['customer_email']) || 
			empty($this->request->data['Order']['payments_type_id']) || 
			empty($this->request->data['Orders_Detail'][0]['part_number']) || 
			empty($this->request->data['Orders_Detail'][0]['price']) || 
			empty($this->request->data['Orders_Detail'][0]['quantity'])
		) {
			debug($this->request->data);die;
			return false;
		}

		return true;
	}
}
