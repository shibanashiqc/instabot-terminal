<?php

namespace Shiban\Instabot;
use Shiban\Instabot\Instagram as Instagram;

class Application extends Instagram {
 
    /**
     * Class constructor.
     */

    public $username;
    protected $password;
    public $ua; 
    public $cookie;

    public  $proxy;

    public function __construct($proxy = 0)
    {
        $this->proxy = $proxy;
    }

    public function readline (){

    }

    public function Theme (){
 echo "
 *  INSTAGRAM  FEEDLIKER  BOT [v 3.01]
 *  STATUS @BETA
 *  AUTHOR @SHIBAN ASHIQ
 *  RECOMMENDED SLEEP 300s
  
    •••••••••••••••••••••••••••••••••••••••••
    
 * Use tools at your own risk.
 * Make sure termux runs always on background.
 * Use this Tool for personal use, not for sale.
 * Make sure your account has been verified (Email & Telp).
 
".PHP_EOL;
    }

    public function run($username,$password,$proxy=0,$sleep){

        $stp = 0;
        $fail = 0;
        $limit = 3;

        if(file_exists(__DIR__."/sessions/$username-data.json")) 
        {

        while(true):    

        $u_data = file_get_contents(__DIR__."/sessions/$username-data.json");
        $data = json_decode($u_data);
        $cookie = $data->cookies;
        $ua = $this->uamulti();

        $req = (new Instagram)->request(1, $ua, 'feed/timeline/',$cookie);
        $data = json_decode($req['1'],true);
        //die(json_encode($data));

        foreach($data['items'] as $key => $value) {
            $mediaid    = $value['id'];
            $shortcode = $value['code'];

            $like = (new Instagram)->request(1, $ua, 'media/'.$mediaid.'/like/',$cookie,(new Instagram)->hook('{"media_id":"'.$mediaid.'"}'));
            $json=json_decode($like[1]);
            $stp++;

            $resp = json_encode([
                'status' => $json->status,
                'username' => $username,
                'media_id' => $mediaid,
                'feed' => 'TimeLine',
                'Total_liked' => $stp
            ]);

            if ($data->status == 'fail'){
                $fail++;
            }

            if($fail >= $limit){
            $fp = fopen(__DIR__."/sessions/$username-data.json", 'w');
            //fwrite($fp, $array);
            fclose($fp);
            $request =  $this->instagram_login($username,$password,$proxy);    
            $fail = 0;
            }

            
            echo $resp;
            sleep($sleep);
            

            break;

            


        }
       // die(json_encode($data));

        endwhile;

        }else{

       $request =  $this->instagram_login($username,$password,$proxy);    
       }
       //echo $request;
    
    }

  

}