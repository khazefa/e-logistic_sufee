<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' ); 

/**
 * Class : BaseController
 * Base Class to control over all the classes
 * @author : Sigit Prayitno
 * @version : 1.0
 * @since : Mei 2017
 */
class BaseController extends CI_Controller {
	protected $vendorId = '';
	protected $vendorUR = '';
	protected $vendorPict = '';
	protected $name = '';
	protected $role = '';
	protected $roleText = '';
	protected $dept = '';
	protected $deptText = '';
	protected $calledName = '';
	protected $global = array ();

	/**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
    }
	
    /**
     * Takes mixed data and optionally a status code, then creates the response
     *
     * @access public
     * @param array|NULL $data
     *        	Data to output to the user
     *        	running the script; otherwise, exit
     */
    public function response($data = NULL) {
        $this->output->set_status_header ( 200 )->set_content_type ( 'application/json', 'utf-8' )->set_output ( json_encode ( $data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) )->_display ();
        exit ();
    }

    /**
     * This function used to check the user is logged in or not
     */
    function isLoggedIn() {
        $isSessionFilled = $this->session->userdata ( 'isSessionFilled' );

        if (! isset ( $isSessionFilled ) || $isSessionFilled != TRUE) {
            redirect ( 'login' );
        } else {
            $this->vendorId = $this->session->userdata ( 'vendorId' );
            $this->vendorUR = $this->session->userdata ( 'vendorUR' );
            $this->name = $this->session->userdata ( 'vendorName' );
            $this->role = $this->session->userdata ( 'role' );
            $this->roleText = $this->session->userdata ( 'roleText' );

            $this->global ['name'] = $this->name;
            $this->global ['role'] = $this->role;
            $this->global ['role_text'] = $this->roleText;
        }
    }
    
    /**
        * This function is used to logged out user from system
        */
       function logout_app() {
           $sess_items = array('isSessionFilled','vendorId','vendorUR','vendorName'
               ,'role','roleText');
           $this->session->unset_userdata($sess_items);
           redirect ( 'login' );
       }

    /**
     * This function is used to check the access
     */
    function isAbove() {
        if ($this->role == ROLE_ABOVE) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * This function is used to check the access
     */
    function isSuperUser() {
        if ($this->role == ROLE_SUPER) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * This function is used to check the access
     */
    function isAdmin() {
        if ($this->role == ROLE_ADMIN) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * This function is used to check the access
     */
    function isSuperAdmin() {
        if ($this->role == ROLE_SUPERADMIN) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * This function is used to check the access
     */
    function isUser() {
        if ($this->role == ROLE_USER) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * This function is used to check the access
     */
    function isCourier() {
        if ($this->role == BASE_KUR) {
            return true;
        } else {
            return false;
        }
    }
	
    /**
     * This function is used to load the set of views
     */
    function loadThis($parentView) {
        $this->global ['pageTitle'] = APP_NAME.' : Access Denied';

        $this->load->view( $parentView.'/'.'templates/v_header', $this->global );
        $this->load->view( 'access' );
        $this->load->view( $parentView.'/'.'templates/v_header' );
    }

	/**
     * This function used to load views
     * @param {string} $viewName : This is view name
     * @param {mixed} $headerInfo : This is array of header information
     * @param {mixed} $pageInfo : This is array of page information
     * @param {mixed} $footerInfo : This is array of footer information
     * @return {null} $result : null
     */
    function loadViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL){
        $this->load->view('front/templates/v_header', $headerInfo);
        $this->load->view($viewName, $pageInfo);
        $this->load->view('front/templates/v_footer', $footerInfo);
    }

	/**
     * This function used to load views
     * @param {string} $viewName : This is view name
     * @param {mixed} $headerInfo : This is array of header information
     * @param {mixed} $pageInfo : This is array of page information
     * @param {mixed} $footerInfo : This is array of footer information
     * @return {null} $result : null
     */
    function loadBackViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL){
        $this->load->view('backside/templates/v_header', $headerInfo);
        $this->load->view($viewName, $pageInfo);
        $this->load->view('backside/templates/v_footer', $footerInfo);
    }
}