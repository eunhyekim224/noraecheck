<?php   
  require_once('model/Manager.php');
  
  class KaraokeManager extends Manager {

      function __construct() {
          parent::__construct();
      } 

      public function getTjSongs($category, $entry) {
        $tjSongs = $this->_db->prepare('SELECT id, title, artist
                                       FROM songs_tj
                                       WHERE :category = :entry');
        $tjSongs->bindParam(':category', $category, PDO::PARAM_STR);
        $tjSongs->bindParam(':entry', $entry, PDO::PARAM_STR);
        $resp = $tjSongs->execute();
        if(!$resp) {
          throw new PDOException('Unable to get TJ songs');
        }

        $tjSongsArray = [];
          while ($tjSong = $tjSongs->fetch()) {
              $songObj = array(
                'brand' => 'tj',
                'no' => $tjSong['id'],
                'title' => $tjSong['title'],
                'singer' => $tjSong['artist']
              );
              array_push($tjSongsArray, $songObj);
          }
        return $tjSongsArray;
      } 

      public function getKySongs($category, $entry) {
        $kySongs = $this->_db->prepare('SELECT id, title, artist
                                       FROM songs_ky
                                       WHERE :category = :entry');
        $kySongs->bindParam(':category', $category, PDO::PARAM_STR);
        $kySongs->bindParam(':entry', $entry, PDO::PARAM_STR);
        $resp = $kySongs->execute();
        if(!$resp) {
          throw new PDOException('Unable to get KY songs');
        }

        $kySongsArray = [];
          while ($kySong = $kySongs->fetch()) {
              $songObj = array(
                'brand' => 'ky',
                'no' => $kySong['id'],
                'title' => $kySong['title'],
                'singer' => $kySong['artist']
              );
              array_push($kySongsArray, $songObj);
          }
        return $kySongsArray;
      }
  }
  