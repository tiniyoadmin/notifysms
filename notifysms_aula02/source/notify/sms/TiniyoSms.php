<?php
/**
 * Created by https://tiniyo.com.
 * User: support@tiniyo.com
 * Date: 10/11/2020
 * Time: 13:37
 */

namespace Source\Notify\SMS;

class TiniyoSMS {

    private $urlService;
    private $endPoint;
    private $params;
    private $callback;

    public function __construct()
    {
        $this->urlService = 'https://api.tiniyo.com';
    }

    public function sendSMS($from, $to, $text)
    {
        $this->endPoint = sprintf("/v1/Account/%/Message",CONFIG_SMS['CLIENT_ID']);

        $this->params = [
            'src' => $from,
            'dst' => $to,
            'url' => CONFIG_SMS['CALLBACK_URL'],
            'client_id' => CONFIG_SMS['CLIENT_ID'],
            'client_secret' => CONFIG_SMS['CLIENT_SECRET'],
            'format' => 'json'
            'text' => $text
        ];

        $this->post();
    }

    private function post()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->urlService . $this->endPoint);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($this->params));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $this->callback = json_decode(curl_exec($ch));

        curl_close($ch);
    }

}
