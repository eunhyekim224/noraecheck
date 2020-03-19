<?php
    require_once('model/Manager.php');

    /**
     * TODO: decide on how the songs are stored in the table
     * TODO: join playlist and member tables 
     * TODO: function to deletePlaylist
     * TODO: function to deleteAllPlaylists
     */


     //I changed Kumyang code to Kumyoung code as that's what the api calls it
    class SongManager extends Manager {
        public function addSong($playlistId, $singer, $song, $tjCode, $kumyoungCode, $releaseDate, $dateAdded) {
            $db = $this->dbConnect();          
            $addMember = $db->prepare("INSERT INTO songs(playlistId, singer, song, tjCode, kumyoungCode, releaseDate, dateAdded) VALUES(:playlistId, :singer, :song, :tjCode, :kumyoungCode, :releaseDate, DATE_FORMAT(date,'%d/%m/%Y'))");
            $status = $addMember->execute(array(
                'playlistId' => $playlistId,
                'singer' => $singer,
                'song' => $song,
                'tjCode' => $tjCode,
                'kumyoungCode' => $kumyoungCode,
                'releaseDate' => $releaseDate,
                'dateAdded' => $dateAdded,
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

