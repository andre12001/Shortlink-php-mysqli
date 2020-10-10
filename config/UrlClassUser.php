<?php
require_once(realpath(dirname(__FILE__) . '/ConfigUrl.php'));
class URLShortener{
    function generateShortURL($n){
        $db = new Connect;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $shortURL = '';
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $shortURL .= $characters[$index];
        }
        $checkURL = $db->prepare('SELECT id FROM tbl_shorlink WHERE short_url = :new_url');
        $checkURL -> execute(['new_url' => $shortURL]);
        $num = $checkURL->fetchAll(PDO::FETCH_COLUMN);
        $checkExistingURL = count($num);
        if($checkExistingURL != 0){
            $shortURL = $shortURL . count($num);
        }

        return $shortURL;
    }
    function validate(){
        $db = new Connect;
        $long_url = isset($_POST['long_url']) ? $_POST['long_url'] : '';
        $long_url = trim($long_url);
        if(!empty($long_url)){
            $start_date =date("h:i:s-j-M-Y");	
            if(!empty($_SERVER['HTTP_CLIENT_IP'])){
                $ipaddres=$_SERVER['HTTP_CLIENT_IP'];
                }
                elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                $ipaddres=$_SERVER['HTTP_X_FORWARDED_FOR'];
                }
                else{
                $ipaddres=$_SERVER['REMOTE_ADDR'];
                }
            
                function create_url_slug($string){
                $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
                return $slug;
            } 

            $session_username = $_SESSION['username'];
     
            $shortURL = $this->generateShortURL(5);
            $insertData = $db->prepare('INSERT INTO tbl_shorlink (session_username, long_url, short_url, ipaddres, start_date) 
            VALUES (:session_username, :long_url, :short_url, :ipaddres, :start_date)');
            $insertData->execute([
                'session_username' => $session_username,
                'long_url' => $long_url,
                'short_url' => $shortURL,
                'ipaddres' => $ipaddres,
                'start_date' => $start_date
            ]);
            if($insertData){
                return '
                <p class="text-danger">ini adalah hasilnya, silahkan copy url tersebut : <div class="input-group mb-3">
                <input type="text" class="form-control" id="pilih" value="' 
                . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
                "https" : "http") . "://"
                 . $_SERVER['SERVER_NAME'] . '/' . $shortURL . '"
                <div class="input-group-append">
                <button class="btn btn-primary" type="button" name="mydiv" id="mydiv" onclick="copy_text()">Copy</button>
                </div>
                </div>';
            }
        }else{
            return '<p style="text-align:center;">Please fill it the form!</p>';
        }
        
    }
    function mainForm(){
        $a = isset($_GET['action']) ? $_GET['action'] : '';
        return '
            <div class="form_block">
                <div id="title">
                   
                </div>
                <div class="body">'.
                    ($a == 'validate' ? $this->validate() : '')
                    .'<form action="?action=validate" method="POST">
                    
                    <div class="form-group">
                        <input type="url" class="form-control" id="long_url" name="long_url" aria-describedby="long_url" placeholder="Masukan Url/Link, Contoh : https://google.com" required>
                    </div>
                    <input type="submit" class="btn btn-primary submit" name="simpan" value="Shorten">
                    </form>
                </div>
            </div>
        ';
    }
}
?>