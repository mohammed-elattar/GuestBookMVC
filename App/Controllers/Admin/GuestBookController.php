<?php

namespace App\Controllers\Admin;

use System\Controller;

class GuestBookController extends Controller
{
  /**
   * Display Posts  List
   *
   * @return mixed
   */
  public function index()
  {
    $this->html->setTitle('Guestbook Posts');

    $data['posts'] = $this->load->model('GuestBook')->all();

    $data['success'] = $this->session->has('success') ? $this->session->pull('success') : null;

    $view = $this->view->render('admin/guestbook/list', $data);

    return $this->adminLayout->render($view);
  }

  /**
   * Open Posts  Form
   *
   * @return string
   */
  public function add()
  {
    return $this->form();
  }

  /**
   * Submit for creating new post
   *
   * @return string | json
   */
  public function submit()
  {
    $json = [];

    if ($this->isValid()) {
      // it means there are no errors in form validation
      $this->load->model('Posts')->create();

      $json['success'] = 'Post Has Been Created Successfully';

      $json['redirectTo'] = $this->url->link('/admin/posts');
    } else {
      // it means there are errors in form validation
      $json['errors'] = $this->validator->flattenMessages();
    }

    return $this->json($json);
  }

  /**
   * Display Edit Form
   *
   * @param int $id
   * @return string
   */
  public function edit($id)
  {
    $postsModel = $this->load->model('GuestBook');

    if (! $postsModel->exists($id)) {
      return $this->url->redirectTo('/404');
    }

    $post = $postsModel->get($id);

    return $this->form($post);
  }

  /**
   * Display Form
   *
   * @param \stdClass $post
   */
  private function form($post = null)
  {
    if ($post) {
      // editing form
      $data['target'] = 'edit-post-' . $post->id;

      $data['action'] = $this->url->link('/admin/guestbook/save/' . $post->id);

      $data['heading'] = 'Edit Post';
    } else {
      // adding form
      $data['target'] = 'add-post-form';

      $data['action'] = $this->url->link('/admin/posts/submit');

      $data['heading'] = 'Add New Post';
    }

    $post = (array) $post;

    $data['status'] = array_get($post, 'status', 'enabled');
    $data['details'] = array_get($post, 'details');
    $data['id'] = array_get($post, 'id');

    $data['image'] = '';

    if (! empty($post['image'])) {
      // default path to upload post image : public/images
      $data['image'] = $this->url->link('public/images/' . $post['image']);
    }
    return $this->view->render('admin/guestbook/form', $data);
  }

  /**
   * Submit for creating new post
   *
   * @return string | json
   */
  public function save($id)
  {
    $json = [];

    if ($this->isValid($id)) {
      // it means there are no errors in form validation
      $this->load->model('GuestBook')->update($id);

      $json['success'] = 'Posts  Has Been Updated Successfully';

      $json['redirectTo'] = $this->url->link('/admin/guestbook');
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
  private function isValid($id = null)
  {
    $this->validator->required('details');

    if (is_null($id)) {
      $this->validator->requiredFile('image')->image('image');
    } else {
      $this->validator->image('image');
    }

    return $this->validator->passes();
  }
}
