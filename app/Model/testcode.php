<?php

class PostsController extends AppController {
  public function index() {
    $this->paginate = array(
      'contain' => array(
        // we want to get the post author
        'User' => array(
          // we just need his name and email
          'fields' => array('first_name','last_name','email')
          // we also want to get his avatar image
          'UserAvatar' => array(
            // we just need a few things from the user_avatars
            // table
            'fields' => array('url','width','height'),
          ),
        ),
        // each post could have a slideshow
        'PostSlideshow' => array(
          // we just need the basics about the images
          'fields'=>array('caption','url','width','height'),
        ), 
        // we also want to get all comments for each post
        'PostComment' => array(
          // we really only need the comment text and date
          'fields' => array('comment_text','created'),
          // but we also want to get the name and email of each
          // commenter
          'User' => array(
            'fields' => array('first_name','last_name','email'),
            // and we also want to get the commenters' avatars
            'UserAvatar' => array(
              'fields' => array('url','width','height'),
            ),            
          ),
        ),
      ),
      // we just need a few things about each post
      'fields' => array('headline','body','created'),
      // only get posts that are published
      'conditions' => array(
        'Post.published' => true, 
      ),      
      // show most recent first
      'order' => 'Post.created DESC',
      'limit' => 10,
    );
    $posts = $this->paginate('Post');
    $this->set(compact('posts'));
  }
}