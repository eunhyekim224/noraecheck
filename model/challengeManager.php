<?php   
    require_once('model/Manager.php');


    
    class ChallengeManager extends Manager {

        function __construct() {
            parent::__construct();
        } 

 

        public function getChallenge($memberId) {
            $playlists = $this->_db->prepare('SELECT c.singer AS player, s.singer AS singer , s.song AS song, s.tjCode AS tj, s.kumyoungCode AS kumyoung, c.songId AS songId
                                        FROM challenges c
                                        JOIN songs s
                                        ON c.songId = s.id
                                        WHERE c.memberId = :memberId');
            $playlists->bindParam(':memberId',$memberId,PDO::PARAM_INT);
            $playlistsResp = $playlists->execute();
            if(!$playlistsResp) {
                throw new PDOException('Unable to retrieve the challenge!');
            }
            $challengeArray = [];
            while($data = $playlists->fetch()){
                $roundArray = [
                    "player" => $data['player'],
                    "singer" => $data['singer'],
                    "song" => $data['song'],
                    "tj" => $data['tj'],
                    "kumyoung" => $data['kumyoung'],
                    "songId" => $data['songId'],
                ];
                array_push($challengeArray,$roundArray);
            }
            return $challengeArray;
        }

        public function updateScore($memberId,$score,$songId) {
            $update = $this->_db->prepare("UPDATE challenges SET score = :score WHERE memberId = :memberId AND songId = :songId");
            $update->bindParam(':score',$score,PDO::PARAM_INT);
            $update->bindParam(':memberId',$memberId,PDO::PARAM_INT);
            $update->bindParam(':songId',$songId,PDO::PARAM_INT);
            
            $update->execute();
            if(!$update) {
                throw new PDOException('Unable to edit this playlist!');
            }

            $update->closeCursor();
            return $score;
        }
    
}