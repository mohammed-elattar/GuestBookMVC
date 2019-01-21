<?php

namespace App\Models;

use System\Model;

class GuestBookModel extends Model
{
    const PENDING = "pending";

     /**
     * Table name
     *
     * @var string
     */
    protected $table = 'guestbook';

    /**
    * Get All GuestBooks That Enabled by Admin
    *
    * @return array
    */
    public function all($status = null)
    {
        if(!empty($status)){
            $this->where('g.status=?', $status);
        }
        return $this->select('g.*', 'u.first_name', 'u.last_name')
                    ->from('guestbook g')
                    ->join('LEFT JOIN users u ON g.user_id=u.id')
                    ->fetchAll();
    }

    public function create($userId)
    {
        $image = $this->uploadImage();

        if ($image) {
            $this->data('image', $image);
        }


        $this->data('details', $this->request->post('details'))
             ->data('user_id', $userId)
             ->data('status', self::PENDING)
             ->data('created', $now = time())
             ->insert('guestbook');
    }

  /**
   * Update Posts Record By Id
   *
   * @param int $id
   * @return void
   */
  public function update($id)
  {
    $image = $this->uploadImage();

    if ($image) {
      $this->data('image', $image);
    }


    $this->data('details', $this->request->post('details'))
      ->data('status', $this->request->post('status'))
      ->where('id=?' , $id)
      ->update('guestbook');
  }

     /**
     * Upload Post Image
     *
     * @return string
     */
     private function uploadImage()
     {
         $image = $this->request->file('image');

         if (! $image->exists()) {
             return '';
         }

         return $image->moveTo($this->app->file->toPublic('images'));
     }
}
