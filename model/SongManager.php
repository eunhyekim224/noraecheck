<?php
    require_once('model/Manager.php');

    

     //I changed Kumyang code to Kumyoung code as that's what the api calls it
    class SongManager extends Manager {

        public function addSong($playlistId, $singer, $song, $tjCode, $kumyoungCode) {
            echo "playlist : ".$playlistId ."singer : ". $singer ."song : ". $song ."tjC : ". $tjCode ."kumyoungCode : ". $kumyoungCode;
            $db = $this->dbConnect();
           
            $tjCode = ($tjCode) ? $tjCode : null;
            $kumyoungCode = ($kumyoungCode) ? $kumyoungCode : null;
           
            $addSong = $db->prepare("INSERT INTO songs(playlistId, singer, song, tjCode, kumyoungCode) VALUES(:playlistId, :singer, :song, :tjCode, :kumyoungCode)");
            $status = $addSong->execute(array(
                'playlistId' => $playlistId,
                'singer' => htmlspecialchars($singer),
                'song' => htmlspecialchars($song),
                'tjCode' => $tjCode,
                'kumyoungCode' => $kumyoungCode,
            ));
                   
            if (!$status) {
                throw new PDOException('Unable to add song!');
            } 
        }

        public function getSongs($playlistId) {
            $db = $this->dbConnect();
            $songs = $db->prepare('SELECT s.playlistId AS playlistId, s.song AS songName, s.singer AS singerName, s.tjCode AS tjCode, s.kumyoungCode AS kumyoungCode, s.dateAdded AS dateAdded, p.name AS playlistName, p.id AS id 
                                       FROM songs s
                                       JOIN playlists p
                                       ON s.playlistId = p.id
                                       WHERE p.id = :id');
            $resp = $songs->execute(array(
                'id' => $playlistId
            ));
            if(!$resp) {
                throw new PDOException('Unable to display this playlist!');
            }
            return $songs;
        }
    }

