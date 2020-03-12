<?php
    namespace Wcoding\Noraecheck\Model;

    require_once('./model/Manager.php');

    /**
     * TODO: decide on how the songs are stored in the table
     * TODO: join playlist and member tables 
     * TODO: function to deletePlaylist
     * TODO: function to deleteAllPlaylists
     */

    class PlaylistManager extends Manager {
        public function addPlaylist($memberId, $name, $songs) {
            $db = $this->dbConnect();          
            $addMember = $db->prepare("INSERT INTO playlists(memberId, name, songs) VALUES(:memberId, :name, :songs)");
            $status = $addMember->execute(array(
                'memberId' => $memberId,
                'name' => htmlspecialchars($name),
                'songs' =>  $songs
            ));
            if (!$status) {
                throw new PDOException('Unable to create the playlist!');
            } 
        }

        public function getAllPlaylists($memberId) {
            $db = $this->dbConnect();
            $playlists = $db->prepare('SELECT memberId, name, songs, creationDate FROM playlists WHERE memberId = :memberId ORDER BY creationDate DESC');
            $resp = $playlists->execute(array(
                'memberId' => $memberId
            ));
            if(!$resp) {
                throw new PDOException('Unable to retrieve all playlists!');
            }
            return $playlists;
        }
        
        public function getPlaylist($memberId, $name) {
            $db = $this->dbConnect();
            $playlist = $db->prepare('SELECT memberId, name, songs, creationDate FROM playlists WHERE memberId = :memberId AND name = :name');
            $resp = $playlists->execute(array(
                'memberId' => $memberId,
                'name' => $name
            ));
            if(!$resp) {
                throw new PDOException('Unable to retrieve this playlist!');
            }
            return $playlists;
        }
    }

