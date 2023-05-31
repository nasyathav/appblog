<?php

use orm\Post;

class Article extends MY_Controller{

   public function form(){
      $notif = '';

    if($this->input->post()){
      $title = $this->input->post('title');
      $article = $this->input->post('article');

      if($title == '' || $article == ''){
         $notif = 'Titel dan artikel tidak boleh kosong';
      }else{
         $post = new Post();
         $post->title = $title;
         $post->article = $article;
         $post->save();
      }

      view('backend/Article/form' , ['notif' => $notif]);
   }

   }
   public function list(){
      $post_list = Post::all();

      view('backend.Article.list' , ['post_list' => $post_list]);
}
}   