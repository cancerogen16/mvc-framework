<?php

namespace App\Core;

use App\Controllers\Controller;

class Application
{
    public static string $ROOT_DIR;

    /**
     * @var Router
     */
    public Router $router;
    /**
     * @var Request
     */
    public Request $request;
    /**
     * @var Response
     */
    public Response $response;
    /**
     * @var Session
     */
    public Session $session;
    /**
     * @var Database
     */
    public Database $db;
    /**
     * @var ?DbModel
     */
    public ?DbModel $user;
    /**
     * @var string
     */
    public string $userClass;

    public string $layout = 'main';
    /**
     * @var Application
     */
    public static Application $app;
    /**
     * @var ?Controller
     */
    public ?Controller $controller = null;

    /**
     *
     */
    public function __construct($rootPath, array $config)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;

        $this->request = new Request();
        $this->response = new Response();

        $this->session = new Session();

        $this->router = new Router($this->request, $this->response);

        $this->db = new Database($config['db']);

        $this->userClass = $config['userClass'];

        $primaryValue = $this->session->get('user');

        if ($primaryValue) {
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
        } else {
            $this->user = null;
        }
    }

    /**
     * @return void
     */
    public function run()
    {
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            $this->response->setStatusCode($e->getCode());

            echo $this->router->renderView('_error', [
                'exception' => $e,
            ]);
        }
    }

    /**
     * @return Controller
     */
    public function getController(): Controller
    {
        return $this->controller;
    }

    /**
     * @param Controller $controller
     */
    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }

    /**
     * @param DbModel $user
     * @return bool
     */
    public function login(DbModel $user): bool
    {
        $this->user = $user;

        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};

        $this->session->set('user', $primaryValue);

        return true;
    }

    /**
     * @return void
     */
    public function logout()
    {
        $this->user = null;

        $this->session->remove('user');
    }

    /**
     * @return bool
     */
    public static function isGuest(): bool
    {
        return !self::$app->user;
    }
}