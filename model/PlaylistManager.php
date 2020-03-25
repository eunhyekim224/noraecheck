<?php
    require_once('model/Manager.php');

    /**
     * TODO: do comments for all functions
     */

    class PlaylistManager extends Manager {
                
        /**
         * addPlaylist
         *
         * @param  mixed $memberId
         * @param  mixed $name
         * @return void
         */
        public function addPlaylist($memberId, $name) {
            $db = $this->dbConnect();          
            $addMember = $db->prepare("INSERT INTO playlists(memberId, name) VALUES(:memberId, :name)");
            $status = $addMember->execute(array(
                'memberId' => $memberId,
                'name' => htmlspecialchars($name),
            ));
            if (!$status) {
                throw new PDOException('Unable to create the playlist!');
            }

            $addMember->closeCursor();  

        }
                
        /**
         * getAllPlaylists
         *
         * @param  mixed $memberId
         * @return void
         */
        public function getAllPlaylists($memberId) {
            $db = $this->dbConnect();
            $playlists = $db->prepare('SELECT p.memberId AS memberId, p.id AS playlistId, m.username AS username, p.name AS playlistName, DATE_FORMAT(p.creationDate, "%d/%m/%Y") AS playlistCreationDate,
                                        (SELECT COUNT(s.id) FROM songs s WHERE s.playlistId = p.id) AS songCount
                                        FROM playlists p
                                        JOIN members m
                                        ON p.memberId = m.id
                                        WHERE p.memberId = :memberId ORDER BY creationDate DESC');
            $playlistsResp = $playlists->execute(array(
                'memberId' => $memberId
            ));
            if(!$playlistsResp) {
                throw new PDOException('Unable to retrieve all playlists!');
            }
            return $playlists;
        }

        public function getMainPlaylist($playlistId) {
            $db = $this->dbConnect();
            $playlist = $db->prepare('SELECT p.id AS playlistId, m.username AS username, p.name AS playlistName, DATE_FORMAT(p.creationDate, "%d/%m/%Y") AS playlistCreationDate,
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
         * getPlaylist
         *
         * @param  mixed $memberId
         * @param  mixed $name
         * @return void
         */
        public function getPlaylist($memberId, $name) {
            echo $memberId .$name;
            $db = $this->dbConnect();
            $playlist = $db->prepare('SELECT p.memberId AS memberId, m.username AS username, p.name AS playlistName, p.creationDate AS playlistCreationDate, p.id AS playlistId 
                                       FROM playlists p
                                       JOIN members m
                                       ON p.memberId = m.id
                                       WHERE p.memberId = :memberId AND p.name = :name');
            $resp = $playlist->execute(array(
                'memberId' => $memberId,
                'name' => $name
            ));
            if(!$resp) {
                throw new PDOException('Unable to retrieve this playlist!');
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
            $db = $this->dbConnect();
            $params = array(
                'playlistId' => $playlistId
            );
            $playlist = $db->prepare("SELECT id FROM playlists WHERE id = :playlistId");
            $playlist->execute($params);
            $existingPlaylistId = $playlist->fetch();
            if($existingPlaylistId != "") {
                $del = $db->prepare("DELETE FROM playlists WHERE id = :playlistId");
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
            $db = $this->dbConnect();
            $delSongs = $db->prepare("DELETE FROM songs WHERE playlistId = :playlistId");
            $delSongs->execute(array(
                'playlistId' => $playlistId
            ));

            $delSongs->closeCursor();
        }
    }

