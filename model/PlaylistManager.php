<?php
    require_once('model/Manager.php');

    /**
     * TODO: do comments for all functions
     */

    class PlaylistManager extends Manager {
                
        /**
         * __construct
         *
         * @return void
         */
        function __construct() {
            parent::__construct();
        }       
        /**
         * addPlaylist
         *
         * @param  mixed $memberId
         * @param  mixed $name
         * @return void
         */
        public function addPlaylist($memberId, $name) {
            $name = htmlspecialchars($name);      
            $addMember = $this->_db->prepare("INSERT INTO playlists(memberId, name) VALUES(:memberId, :name)");
            $addMember->bindParam(':memberId',$memberId,PDO::PARAM_INT);
            $addMember->bindParam(':name',$name,PDO::PARAM_STR);
            $status = $addMember->execute();
            if (!$status) {
                throw new PDOException('Unable to create the playlist!');
            }
            $addMember->closeCursor(); 
            return $this->_db->lastInsertId(); 

        }
                
        /**
         * getAllPlaylists
         *
         * @param  mixed $memberId
         * @return void
         */
        public function getAllPlaylists($memberId) {
            $playlists = $this->_db->prepare('SELECT p.memberId AS memberId, p.id AS playlistId, m.username AS username, p.name AS playlistName, DATE_FORMAT(p.creationDate, "%d/%m/%Y") AS playlistCreationDate,
                                        (SELECT COUNT(s.id) FROM songs s WHERE s.playlistId = p.id) AS songCount
                                        FROM playlists p
                                        JOIN members m
                                        ON p.memberId = m.id
                                        WHERE p.memberId = :memberId ORDER BY creationDate DESC');
            $playlists->bindParam(':memberId',$memberId,PDO::PARAM_INT);
            $playlistsResp = $playlists->execute();
            if(!$playlistsResp) {
                throw new PDOException('Unable to retrieve all playlists!');
            }
            return $playlists;
        }

        public function getMainPlaylist($playlistId) {
            $playlist = $this->_db->prepare('SELECT p.id AS playlistId, m.username AS username, p.name AS playlistName, DATE_FORMAT(p.creationDate, "%d/%m/%Y") AS playlistCreationDate,
                                        (SELECT COUNT(s.id) FROM songs s WHERE s.playlistId = p.id) AS songCount
                                        FROM playlists p
                                        JOIN members m
                                        ON p.memberId = m.id
                                        WHERE p.id = :playlistId');
            $playlistResp = $playlist->execute(array(
                'playlistId' => $playlistId
            ));
            if(!$playlistResp) {
                throw new PDOException('Unable to retrieve the selected playlist!');
            }
            return $playlist;
        }

                
        /**
         * deletePlaylist
         *
         * @param  mixed $playlistId
         * @return void
         */
        public function deletePlaylist($playlistId) {
            $playlist = $this->_db->prepare("SELECT id FROM playlists WHERE id = :playlistId");
            $playlist->bindParam(':playlistId',$playlistId,PDO::PARAM_INT);
            $playlist->execute();
            $existingPlaylistId = $playlist->fetch();
            if($existingPlaylistId != "") {
                $del = $this->_db->prepare("DELETE FROM playlists WHERE id = :playlistId");
                $del->bindParam(':playlistId',$playlistId,PDO::PARAM_INT);
                $del->execute($params);
                
                $numberOfDeletedRows = $del->rowCount();
                if ($numberOfDeletedRows < 1) {
                    throw new PDOException('No playlists have been deleted!'); 
                }
                $this->deleteSongsFromAPlaylist($playlistId);
                $del->closeCursor();
            }
            $playlist->closeCursor();
        }

        public function deleteSongsFromAPlaylist($playlistId) {
            $delSongs = $this->_db->prepare("DELETE FROM songs WHERE playlistId = :playlistId");
            $delSongs->bindParam(':playlistId',$playlistId,PDO::PARAM_INT);
            $delSongs->execute();
            $delSongs->closeCursor();
        }

        public function editPlaylistName($playlistName,$playlistId) {
            $editPlaylistName = $this->_db->prepare("UPDATE playlists SET name = :playlistName WHERE id = :playlistId");
            $editPlaylistName->execute(array(
                'playlistName' => $playlistName,
                'playlistId' => $playlistId
            ));
            if(!$editPlaylistName) {
                throw new PDOException('Unable to edit this playlist!');
            }

            $editPlaylistName->closeCursor();
        }
    }

