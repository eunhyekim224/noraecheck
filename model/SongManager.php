<?php
    require_once('model/Manager.php');

    

     //I changed Kumyang code to Kumyoung code as that's what the api calls it
    class SongManager extends Manager {

        public function addSong($playlistId, $singer, $song, $tjCode, $kumyoungCode) {
            echo "playlist : ".$playlistId ."singer : ". $singer ."song : ". $song ."tjC : ". $tjCode ."kumyoungCode : ". $kumyoungCode;
            $db = $this->dbConnect();
           
            $tjCode = ($tjCode) ? $tjCode : null;
            $kumyoungCode = ($kumyoungCode) ? $kumyoungCode : null;
            $singer = htmlspecialchars($singer);
            $song = htmlspecialchars($song);
            $addSong = $db->prepare("INSERT INTO songs(playlistId, singer, song, tjCode, kumyoungCode) VALUES(:playlistId, :singer, :song, :tjCode, :kumyoungCode)");
            $addSong->bindParam(':playlistId',$playlistId,PDO::PARAM_INT);
            $addSong->bindParam(':singer',$singer,PDO::PARAM_STR);
            $addSong->bindParam(':song',$song,PDO::PARAM_STR);
            $addSong->bindParam(':tjCode',$tjCode,PDO::PARAM_INT);
            $addSong->bindParam(':kumyoungCode',$kumyoungCode,PDO::PARAM_INT);
            $status = $addSong->execute();
                   
            if (!$status) {
                throw new PDOException('Unable to add song!');
            } 

            $addSong->closeCursor();  

        }

        public function getSongs($playlistId) {
            $db = $this->dbConnect();
            $songs = $db->prepare('SELECT s.playlistId AS playlistId, s.song AS songName, s.singer AS singerName, s.tjCode AS tjCode, s.kumyoungCode AS kumyoungCode, s.dateAdded AS dateAdded, p.name AS playlistName, p.id AS id 
                                       FROM songs s
                                       JOIN playlists p
                                       ON s.playlistId = p.id
                                       WHERE p.id = :id');
            $songs->bindParam(':id',$playlistId,PDO::PARAM_INT);
            $resp = $songs->execute();
            if(!$resp) {
                throw new PDOException('Unable to display this playlist!');
            }
            return $songs;
        }
    }

