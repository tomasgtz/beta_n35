<?php
App::uses('AppController', 'Controller');
class ArchivosController extends AppController
{		

  public function beforeFilter()
  {

  }

  public function isAuthorized($user) {
  
  //everyone has access to this controller      
  return true;    
}



  public function pagos()
  {
  
    if( $this->request->is('get') )
    {
  		if( isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] !== '')
  		{

		$fileName = $this->request->params['pass'][0].'.'.$this->request->params['ext'];
		$app = str_replace('Controller' . DIRECTORY_SEPARATOR, '', __DIR__ . DIRECTORY_SEPARATOR);
		$paymentsPath = $app . 'webroot' . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR;


        // Ruta completa de archivo
            $rutaCompletaDeArchivo = $paymentsPath.$fileName;

  			if(file_exists($rutaCompletaDeArchivo))
  			{
  				$this->response->file(
  					$rutaCompletaDeArchivo
  					,array(
  						 'download' => true
  						,'name' => $fileName
  					)
  				);
  			}
  			else
  			{
  				throw new NotFoundException();
  			}
  		}
  		else
  		{
  			throw new NotFoundException();
  		}
    }
    else
    {
      throw new NotFoundException();
    }
		return $this->response;
  }
}