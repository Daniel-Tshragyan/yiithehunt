<?php

namespace backend\models;

use common\models\CategoryPost;
use common\models\Notification;
use common\models\NotificationsUsers;
use Yii;
use yii\base\Model;
use common\models\Post;

class PostForm extends Post

{
    public $image;
    public $title;
    public $content;
    public $categoryIds = [];
    public $newPost;
    public $id;

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['content'], 'required'],
            [['image'], 'required'],
            [['title', 'content', 'image'], 'string', 'max' => 255],
            [['content'], 'string'],
            ['categoryIds', 'required']
        ];
    }

    public function addPost()
    {
        if (!$this->validate()) {
            return null;
        }
        $post = new Post();
        $post->image = $this->image;
        $post->title = $this->title;
        $post->content = $this->content;

        $post->save();
        $this->newPost = $post;
        return true;
    }

    public function addCategories()
    {
        foreach ($this->categoryIds as $item) {
            $categoryPost = new CategoryPost();
            $categoryPost->category_id = $item;
            $categoryPost->post_id = $this->newPost->id;
            $categoryPost->save();
        }
        return $this->addNotification();
    }

    public function addNotification()
    {

        foreach ($this->newPost->categories as $category) {
            if (!empty($category->users)) {
                $notification = new Notification();
                $notification->content = "Added new post <a href='/post/show/".$this->newPost->id."'>".$this->newPost->title."</a> with <a href='/category/show/".$category->id."'>".$category->title."</a> Category";
                $notification->save();
                foreach ($category->users as $user) {
                    $notificationUsers = new NotificationsUsers();
                    $notificationUsers->user_id = $user->id;
                    $notificationUsers->notification_id = $notification->id;
                    $notificationUsers->save();
                }
            }
        }

        return true;
    }

    public function upload()
    {
        if (!is_null($this->image) && !empty($this->image)) {
            $random = Yii::$app->security->generateRandomString(12).'.'.$this->image->extension;
            $path = Yii::getAlias('@frontend') . "/web/images/editor";

            if (\yii\helpers\FileHelper::createDirectory($path, 0775, true)) {
                $this->image->saveAs($path .'/'.$random);
            }

            $this->image = $random;
        }
        return true;
    }


}