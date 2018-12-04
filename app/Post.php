<?php

  namespace App;

  class Post {

    public function getPosts($session) {
      if(!$session->has('posts')) {
        $this->createDummyData($session);
      }
      return $session->get('posts');
    }

    public function getPost($session, $id){
      if(!$session->has('posts')) {
        $this->createDummyData();
      }
      return $session->get('posts')[$id];
    }

    public function addPost($session, $title, $price, $description) {
      if (!$session->has('posts')) {
        $this->createDummyData();
      }
      $posts = $session->get('posts');
      array_push($posts, ['title' => $title, 'price' => $price,'description' => $description]);
      $session->put('posts', $posts);
    }

    public function editPost($session, $id, $title, $price, $description){
      $posts = $session->get('posts');
      $posts[$id] = ['title' => $title, 'price' => $price,'description' => $description];
      $session->put('posts', $posts);
    }

    private function createDummyData($session) {
      $posts = [
        [
          'title'   => 'SAMSUNG 970 EVO',
          'price'   => '$344.99',
          'description' => 'M.2 2280 1TB PCIe Gen3. X4, NVMe 1.3 64L V-NAND 3-bit MLC Internal Solid State Drive (SSD) MZ-V7E1T0BW'
        ],
        [
          'title'   => 'SAMSUNG 860 EVO Series',
          'price'   => '$147.99',
          'description' => 'M.2 2280 1TB SATA III V-NAND 3-bit MLC Internal Solid State Drive (SSD) MZ-N6E1T0BW'
        ]
      ];
      $session->put('posts', $posts);
    }
  }

