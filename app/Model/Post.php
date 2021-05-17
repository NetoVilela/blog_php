<?php

class Post extends AppModel {
    public $name = 'Post';

    public $validate =array(
       'id_user'=>array(
           'rule' => 'notBlank'
       ), 
        'title' => array(
            'rule' => 'notBlank'
        ),
        'body' => array(
            'rule' => 'notBlank'
        ),
        'active' => array(
            'rule' => 'notBlank'
        )
        );

}