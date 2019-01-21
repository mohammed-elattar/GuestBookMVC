<?php

namespace App\Controllers\Blog;

use System\Application;
use System\Controller;

class GuestBookController extends Controller
{
    const ENABLED_STATUS = "enabled";
    private $user;
    public function __construct(Application $app)
    {
      parent::__construct($app);
      $loginModel = $this->load->model('Login');
      if (!$loginModel->isLogged()) {
        return $this->url->redirectTo('/404');
      }
      $this->user = $loginModel->user();
    }


  /**
     * Display Post Page
     *
     * @param string name
     * @param int $id
     * @return mixed
     */
    public function index()
    {
        $guestBook = $this->load->model('GuestBook')->all(self::ENABLED_STATUS);

        if (! $guestBook) {
            return $this->url->redirectTo('/404');
        }

        $this->html->setTitle("Guest Book");
        $data['posts'] = $guestBook;
        $postController = $this->load->controller('Blog/GuestBook');
        $data['post_box'] = function ($post) use ($postController) {
            return $postController->box($post);
        };
        $view = $this->view->render('blog/guestbook/guestbook', $data);

        return $this->blogLayout->render($view);
    }

  public function createPost()
  {
    $this->blogLayout->title('Create New Post');

    $view = $this->view->render('blog/guestbook/create');

    // disable sidebar
    $this->blogLayout->disable('sidebar');

    return $this->blogLayout->render($view);
  }

  /**
   * Submit for creating new user
   *
   * @return string | json
   */
  public function submit()
  {
    $json = [];

    if ($this->isValid()) {

      $this->load->model('GuestBook')->create($this->user->id);

      $json['success'] = 'Post Has Been Created Successfully';

      $json['redirectTo'] = $this->url->link('/guestbook');
    } else {
      // it means there are errors in form validation
      $json['errors'] = $this->validator->flattenMessages();
    }

    return $this->json($json);
  }

  /**
   * Validate the form
   *
   * @param int $id
   * @return bool
   */
  private function isValid()
  {
    $this->validator->required('details', 'Post Details is Required');
    return $this->validator->passes();
  }


     /**
     * Load the post box view for the given post
     *
     * @param \stdClass $post
     * @return string
     */
    public function box($post)
    {
        return $this->view->render('blog/post-box', compact('post'));
    }
}
