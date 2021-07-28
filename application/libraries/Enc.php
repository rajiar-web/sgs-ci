<?php class Enc
{
    function encrypt($string,$action='e')
    {
           $ff = & get_instance();
           $extraKey = $ff->config->item('enckey');
            global $flag;

            $encryptedIP = '';

           

            $output = false;

            $encrypt_method = "AES-256-CBC";
            $secret_key = $flag['2nd-encrypt-key'].$encryptedIP.'-'.$extraKey;
            $secret_iv = $flag['2nd-encrypt-secret'].$encryptedIP.'-'.$extraKey;

            $key = hash('sha256', $secret_key);
            $iv = substr(hash('sha256', $secret_iv), 0, 16);

            $output;

            if($action == 'e'){
                $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
                $output = base64_encode($output);
                //replace equal signs with char that hopefully won't show up
                $output = str_replace('=', '[equal]', $output);
            }else if($action == 'd'){
                //put back equal signs where your custom var is
                $setString = str_replace('[equal]', '=', $string);
                $output = openssl_decrypt(base64_decode($setString), $encrypt_method, $key, 0, $iv);
            }

            return $output;
        }
         function encrypt_pwd($unique_id,$pass)
        {
            $pKey = $unique_id;
            $p1 = md5($pass);
            $p2 = $pKey . $p1 . md5($pKey);
            $new_pwd = md5(sha1($p2));
            return $new_pwd;
        }
}