<?php

/**
 *
 */
class Bootstrap
{
    private $_url = null;
    private $_role = null;
    private $_controller = null;

    public function __construct($role)
    {
        // Set role folder link
        $this->_role = $role;
    }

    public function init()
    {
        // Set url link
        $this->getUrl();
        //Neu khong co action nao thi chuyen ve trang index
        if (empty($this->_url[0])) {
            $this->loadDefaultController();
            return false;
        }

        $this->loadExistingController();
        $this->callControllerMethod();
    }

    private function getUrl()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        //Xoa khoang trang thua o ben phai chuoi
        $url = rtrim($url, '/');
        //Kiem tra url co hop le hay khong, neu khong se tra ve false
        $url = filter_var($url, FILTER_SANITIZE_URL);
        //Tach tung action trong chuoi thanh tung phan tu trong mang
        $this->_url = explode('/', $url);
    }

    private function loadDefaultController()
    {
        require $this->_role . 'controllers/index.php';
        $this->_controller = new Index();
        $this->_controller->index();
        $this->_controller->loadModel('index');
    }

    private function loadExistingController()
    {
        //Khoi tao controller theo phan tu thu nhat tren mang url
        $file = $this->_role . 'controllers/' . $this->_url[0] . '.php';
        if (file_exists($file)) {
            require $file;
            //Khoi tao controller
            $this->_controller = new $this->_url[0];
            //Khoi tao model trong controller
            $this->_controller->loadModel($this->_url[0]);
        } else {
            //Hien thi trang error roi dung lai
            $this->error();
            die();
        }
    }

    private function callControllerMethod()
    {
        $length = count($this->_url);

        if ($length > 1) {
            if (!method_exists($this->_controller, $this->_url[1])) {
                $this->error();
            }
        }
        switch ($length) {
            case 5:
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
                break;
            case 4:
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
                break;
            case 3:
                $this->_controller->{$this->_url[1]}($this->_url[2]);
                break;
            case 2:
                $this->_controller->{$this->_url[1]}();
                break;
            default:
                $this->_controller->index();
                break;
        }
    }

    public function error()
    {
        require $this->_role . 'controllers/errors.php';
        $this->_controller = new Errors();
        $this->_controller->index();
        return false;
    }
}
