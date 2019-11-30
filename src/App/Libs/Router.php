<?php

class App_Libs_Router {
    const PARAM_NAME = "r";
    const HOME_PAGE = "home";
    const INDEX_PAGE = "index";

    public static $sourcePath;

    public function __construct($sourcePath="") {
        if ($sourcePath) {
            self::$sourcePath = $sourcePath;
        }
    }

    public function getGET($name = NULL) {
        if($name !== NULL) {
            return isset($_GET[$name]) ? $_GET[$name] : NULL;
        }
        return $_GET;
    }

    public function getPOST($name = NULL) {
        if($name !== NULL) {
            return isset($_POST[$name]) ? $_POST[$name] : NULL;
        }
        return $_POST;
    }

    public function router() {
        $url = $this->getGET(self::PARAM_NAME);
        if (!is_string($url) || $url == self::INDEX_PAGE) {
            $url = self::HOME_PAGE;
        }
        $path = self::$sourcePath."/".$url.".php";

        if (file_exists($path)) {
            return require_once $path;
        } else {
            $this->pageNotFound();
        }
    }

    public function pageNotFound() {
        echo "404 Page Not Found";
        die();
    }

    public function createUrl($url, $param=[]) {
        if ($url)
            $param[self::PARAM_NAME] = $url;
        return $_SERVER['PHP_SELF']."?".http_build_query($param);
    }

    /**
     * tu dong chuyen sang 1 trang khac khi goi ham
     */
    public function redirect($url) {
        $u = $this->createUrl($url);
        header("Location:$u");
    }

    public function homePage() {
        $this->redirect(self::HOME_PAGE);
    }

    public function loginPage() {
        $this->redirect("login");
    }
}