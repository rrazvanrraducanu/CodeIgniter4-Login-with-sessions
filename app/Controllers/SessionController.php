<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
class SessionController extends Controller
{
	public function index(){
		return view('login');
	}
        public function check(){
            $session=session();
            $username=$this->request->getVar('username');
            $password=$this->request->getVar('password');
            if(($username=="Popescu")&&($password=="Bogdan")){
                $session->set('username',$username);
            //    echo $username;
              return redirect()->route('welcome');
            }else{
                $data['error']='Error message!!!';
                return view('login',$data);
            }
	}
	public function logout(){
            $session=session();
            $session->destroy();
            return view('login'); 
        }
        public function welcome(){
            $session=session();
            if($session->get('username')){
                $data['username']=$session->get('username');
            return view('welcome',$data);
        }else
            return redirect()->route('logout');
        }     
}
 
      