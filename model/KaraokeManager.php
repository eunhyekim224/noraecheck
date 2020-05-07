<?php   
  require_once('model/Manager.php');
  
  class KaraokeManager extends Manager {

      function __construct() {
          parent::__construct();
      } 

      public function getTjSongs($category, $entry) {
        switch($category) {
          case 'title':
            $tjSongs = $this->_db->prepare("SELECT id, title, artist
                                       FROM songs_tj
                                       WHERE title LIKE concat('%', :entry, '%')");
            break;
          case 'artist':
            $tjSongs = $this->_db->prepare("SELECT id, title, artist
                                       FROM songs_tj
                                       WHERE artist LIKE concat('%', :entry, '%')");
            break;
          case 'id':
            $tjSongs = $this->_db->prepare("SELECT id, title, artist
                                       FROM songs_tj
                                       WHERE id LIKE concat('%', :entry, '%')");
        }
    
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
        switch($category) {
          case 'title':
            $kySongs = $this->_db->prepare("SELECT id, title, artist
                                       FROM songs_ky
                                       WHERE title LIKE concat('%', :entry, '%')");
            break;
          case 'artist':
            $kySongs = $this->_db->prepare("SELECT id, title, artist
                                       FROM songs_ky
                                       WHERE artist LIKE concat('%', :entry, '%')");
            break;
          case 'id':
            $kySongs = $this->_db->prepare("SELECT id, title, artist
                                       FROM songs_ky
                                       WHERE id LIKE concat('%', :entry, '%')");
        }

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
  