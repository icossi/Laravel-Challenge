<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
  protected $fillable=[
      'status',
      'organization'
    ];
    public function connect($url){
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch,CURLOPT_URL,"$url");
      curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
      curl_setopt($ch,CURLOPT_HTTPAUTH,CURLAUTH_BASIC);
      curl_setopt($ch, CURLOPT_USERPWD, "icossi:dancewithme@@12");
      $data = json_decode(curl_exec($ch));
      curl_close($ch);
      return $data;
    }
    public static function getLastConecction(){
      return Connection::all()->last();
    }
}
