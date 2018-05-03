<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
  protected $fillable=[
      'status',
      'organization'
    ];
    /**
     * This function connect with the API and return an array with the repositories
     */
    public function connect($url){
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch,CURLOPT_URL,"$url");
      curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
      $usergithub=env('GIT_USER', 'Laravel');
      $passgithub=env('GIT_PASS', 'Laravel');
      if($usergithub!='Laravel' && $passgithub!='Laravel'){ 
        curl_setopt($ch,CURLOPT_HTTPAUTH,CURLAUTH_BASIC); // basic autentication
        curl_setopt($ch, CURLOPT_USERPWD, "$usergithub:$passgithub"); // user and password for autentication with github
      }
      $data = json_decode(curl_exec($ch));
      curl_close($ch);
      return $data;
    }

    /**
     * return the last connection to the appi
     */
    public static function getLastConecction(){
      return Connection::all()->last();
    }
}
