<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Notify {

private static $androidKey = 'AIzaSyDPZA2aH4pXsJCuaQpToATzGz3t4AROHsk';
private static $iosCert = 'libraries/ProdPushCK.pem'; //PRODUCCION
private static $passphrase = 'Un1com3rPu$h16';

var $message = '';
var $banner = '';
var $title = '';
var $subtitle = '';
var $tickerText = '';
var $vibrate = 1;
var $sound = 1;
var $idnotify = 1;
var $registrationIds;
var $debugStr;
var $isDebug = false;
var $CI;

    public function __construct(){
            $this->debugStr = '';            
            $this->CI = & get_instance ();
    }

    private function getDevices($type,$tienda){
        $this->registrationIds = array();
        if($tienda){
            $this->CI->db->where('idTienda', $tienda);
        }
        $query = $this->CI->db->get_where('v_clientespush',array('tipo' => $this->tipoDispositivo($type)));
            $dbresult = $query->result();
            if ( $dbresult ) {
                foreach ( $dbresult as $item) {
                    array_push($this->registrationIds, $item->token);
                }
            }else{
                $this->debugStr .= 'No se encontraron dispositivos' .PHP_EOL;
            }
    }


    private function getDeviceByUUID($uuid,$type,$tienda ){
        $this->registrationIds = array();
        if($tienda){
            $this->CI->db->where('idTienda', $tienda);
        }
        $query = $this->CI->db->get_where('v_clientespush',array('tipo' => $this->tipoDispositivo($type),'uuid' => $uuid));
            $dbresult = $query->row();
            if ( $dbresult ) {
                array_push($this->registrationIds, $dbresult->token);
            }else{
                $this->debugStr .= 'No se encontraron dispositivos '.$this->tipoDispositivo($type) .PHP_EOL;
            }
    }

    public function tipoDispositivo($id){
            switch ($id) {
                case 1:
                    $device = 'Android';
                    break;
                case 2:
                    $device = 'iOS';
                    break;
            }
        return $device;
    }


    public function setNotificationData($idNoti=null,$msg ='', $banner = '', $title='',$subtitle='',$tickerText='', $vibrate='',$sound=''){
        
        $this->message = $msg;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->tickerText = $tickerText;
        $this->vibrate = $vibrate;
        $this->sound = $sound;
        $this->banner = $banner;
        $this->idnotify = $idNoti;
    }

    public function sendNotification($uuid = null,$tienda=null){
        $this->SendiOS($uuid,$tienda);
        $this->SendAndroid($uuid,$tienda);
    }

    public function SendiOS($uuid = null,$tienda=null){
        if ($uuid){
             $this->getDeviceByUUID($uuid,2,$tienda);
         }else{
            $this->getDevices(2,$tienda);
        }
        if (empty($this->registrationIds)) return false;
        
        ///////////////////////////////////////////////////////////////////////////////
        $ctx = stream_context_create();
        stream_context_set_option($ctx, 'ssl', 'local_cert', realpath(APPPATH.self::$iosCert));
        stream_context_set_option($ctx, 'ssl', 'passphrase', self::$passphrase);

        // Open a connection to the APNS server
        if (!$this->isDebug){
            $host = 'ssl://gateway.push.apple.com:2195'; //PRODUCCION
        }else{
            $host = 'ssl://gateway.sandbox.push.apple.com:2195'; //DESARROLLO
        }
        $fp = stream_socket_client(
            $host, $err,
            $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

        if (!$fp){
            $this->debugStr .= "Failed to connect: $err $errstr" . PHP_EOL;
            return false; 
        }
        
        $this->debugStr .= 'Connected to APNS' . PHP_EOL;

        // Create the payload body
        $body['aps'] = array(
            'alert' => $this->title,
            'message' => $this->message,
            'banner' => $this->banner,
            'idnotify' => $this->idnotify,
            'type' => 1,
            'sound' => 'default',
            'badge' => 1,
            "content-available"=> true
            );

        // Encode the payload as JSON
        $payload = json_encode($body);
        // Build the binary notification
        $success = 0;
        $failed = 0;
        foreach ($this->registrationIds as $deviceToken) {    
      //  echo $deviceToken. "\n";   
            $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
            // Send it to the server
            $result = fwrite($fp, $msg, strlen($msg));
            if ($result == 0) {
                    $failed++;
                } else {
                    $success++;
                }
            //usleep(500000);
        }
        // Close the connection to the server
        fclose($fp); 
        $finalResult = array('success' => $success, 'failed' => $failed);
        $this->debugStr .= json_encode($finalResult);
        return true;
    }

    public function SendAndroid($uuid = null,$tienda=null){
    // prep the bundle
        if ($uuid){
             $this->getDeviceByUUID($uuid,1,$tienda);
         }else{
            $this->getDevices(1,$tienda);
        }

        if (empty($this->registrationIds)) return false;
            $msg = array
            (
                'message'       => $this->message,
                'title'         => $this->title,
                'banner'        => $this->banner,
                'idnotify'      => $this->idnotify,
                'subtitle'      => $this->subtitle,
                'tickerText'    => $this->tickerText,
                'vibrate'   => $this->vibrate,
                'sound'     => $this->sound
            );
            $groups = array_chunk($this->registrationIds, 1000);
            foreach($groups as $group) {
                    $fields = array
                    (
                        'registration_ids'  => $group,
                        'data'              => $msg
                    );

                    $headers = array
                    (
                        'Authorization: key=' . self::$androidKey,
                        'Content-Type: application/json'
                    );

                    $ch = curl_init();
                    curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
                    curl_setopt( $ch,CURLOPT_POST, true );
                    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
                    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
                    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
                    curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
                    $result = curl_exec($ch );
                    curl_close( $ch );
                    $this->debugStr = $result;
                    }
            return $result;
    }

}
?>