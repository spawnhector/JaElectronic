<?php 

function redirecto($url,$token=null){
    if ($token) {
        session(['token'=>$token]);
    }
    return redirect()->route($url);
}

function curl($url, $method, array $fields = null) {
    
    if (!session('token')) {
        return redirect()->route('index');
    }

    if (session('token')) {
        $curl = curl_init();
        
        if ($fields) {
            curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => $fields,
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Authorization: Bearer '.session('token').''
            ),
            ));
        } else {
            curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Authorization: Bearer '.session('token').''
            ),
            ));
        }
        

        $response = json_decode(curl_exec($curl),true);

        curl_close($curl);

        return $response;
    }

}

function curlOut($url, $method, array $fields = null) {
    
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => $method,
    CURLOPT_POSTFIELDS => $fields,
    CURLOPT_HTTPHEADER => array(
        'Accept: application/json'
    ),
    ));

    $response = json_decode(curl_exec($curl),true);

    curl_close($curl);

    return $response;

}

function domain($apiPort){
    $split = explode(':',$_SERVER['HTTP_HOST']);
    $split[1] = $apiPort;
    $host = $split[0].':'.$split[1];
    $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
                "https" : "http") . "://" . $host;
  
    return $link;
}

function CartItems(){
    if (session()->has('token')) {
        $isAuth = curl(''.domain('8080').'api/user','GET');
        dd($isAuth);
    } else {
        if (session()->has('cart')) {
            // dd(session('cart'));
            return session('cart');
        } else {
            return false;
        }
    }
    
}