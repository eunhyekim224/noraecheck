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

            $addSong->closeCursor();  

        }

        public function getSongs($playlistId) {
            $db = $this->dbConnect();
            $songs = $db->prepare('SELECT s.id as songId, s.playlistId AS playlistId, s.song AS songName, s.singer AS singerName, s.tjCode AS tjCode, s.kumyoungCode AS kumyoungCode, s.dateAdded AS dateAdded, p.name AS playlistName, p.id AS id 
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

        private function countSongsFromPlaylist($playlistId) {
            $db = $this->dbConnect();
            $count = $db->prepare('SELECT count(*) AS songCount FROM songs s WHERE playlistId = :id');
            $resp = $count->execute(array(
                'id' => $playlistId
            ));
            $songCount = $count->fetch()['songCount'];
            $count->closeCursor();
            return $songCount;
        }

        public function deleteSong($songId) {
            $db = $this->dbConnect();
            $params = array(
                'songId' => $songId
            );
            $song = $db->prepare("SELECT id, playlistId FROM songs WHERE id = :songId");
            $song->execute($params);
            $selectedSong = $song->fetch();
            $existingSongId = $selectedSong['id'];
            $playlistId = $selectedSong['playlistId'];

            if ($existingSongId != "") {
                $delSong = $db->prepare("DELETE FROM songs WHERE id = :songId");
                $delSong->execute($params);
    
                $numberOfDeletedSongs = $delSong->rowCount();
                if ($numberOfDeletedSongs < 1) {
                    throw new PDOException('No songs have been deleted!'); 
                }
                $delSong->closeCursor();
            }
            $song->closeCursor();
            return $playlistId;
        }
    }