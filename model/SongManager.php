<?php
    require_once('model/Manager.php');

    

     //I changed Kumyang code to Kumyoung code as that's what the api calls it
    class SongManager extends Manager {

        /**
         * __construct
         *
         * @return void
         */
        function __construct() {
            parent::__construct();
        }       

        public function addSong($playlistId, $singer, $song, $tjCode, $kumyoungCode) {
            $tjCode = ($tjCode) ? $tjCode : null;
            $kumyoungCode = ($kumyoungCode) ? $kumyoungCode : null;
            $singer = htmlspecialchars($singer);
            $song = htmlspecialchars($song);
            $addSong = $this->_db->prepare("INSERT INTO songs(playlistId, singer, song, tjCode, kumyoungCode) VALUES(:playlistId, :singer, :song, :tjCode, :kumyoungCode)");
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
            $songs = $this->_db->prepare('SELECT s.id as songId, s.playlistId AS playlistId, s.song AS songName, s.singer AS singerName, s.tjCode AS tjCode, s.kumyoungCode AS kumyoungCode, s.dateAdded AS dateAdded, p.name AS playlistName, p.id AS id 
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

        private function countSongsFromPlaylist($playlistId) {
            $count = $this->_db->prepare('SELECT count(*) AS songCount FROM songs s WHERE playlistId = :id');
            $resp = $count->execute(array(
                'id' => $playlistId
            ));
            $songCount = $count->fetch()['songCount'];
            $count->closeCursor();
            return $songCount;
        }

        public function editBrandCodes($songId,$tjCode,$kumyoungCode) {
            $tjCode = ($tjCode) ? $tjCode : null;
            $kumyoungCode = ($kumyoungCode) ? $kumyoungCode : null;
            $song = $songId;
            $editCodes = $this->_db->prepare("UPDATE songs SET tjCode = :tjCode, kumyoungCode = :kumyoungCode WHERE id = :song");
            $editCodes->bindParam(':song',$song,PDO::PARAM_STR);
            $editCodes->bindParam(':tjCode',$tjCode,PDO::PARAM_INT);
            $editCodes->bindParam(':kumyoungCode',$kumyoungCode,PDO::PARAM_INT);
            $status = $editCodes->execute();
                   
            if (!$status) {
                throw new PDOException('Unable to add song!');
            } 

            $editCodes->closeCursor();  

        }

        public function deleteSong($songId) {
            $params = array(
                'songId' => $songId
            );
            $song = $this->_db->prepare("SELECT id, playlistId FROM songs WHERE id = :songId");
            $song->execute($params);
            $selectedSong = $song->fetch();
            $existingSongId = $selectedSong['id'];
            $playlistId = $selectedSong['playlistId'];

            if ($existingSongId != "") {
                $delSong = $this->_db->prepare("DELETE FROM songs WHERE id = :songId");
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