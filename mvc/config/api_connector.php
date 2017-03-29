<?php
/**
 * Class api_connector
 * @author: Timur Misharin
 * @version: 1.0
 *
 */
class api_connector{
    private $curl_handle=null;
    private $query=null;
    private $arr=null;

    /**
     * api_connector constructor.
     * @param $widg_name
     */
    public function __construct($widg_name){
        $this->curl_handle=curl_init();
        curl_setopt($this->curl_handle, CURLOPT_URL, $widg_name);
        curl_setopt($this->curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($this->curl_handle, CURLOPT_RETURNTRANSFER, 1);
        $this->jsn_decode();
    }

    /**
     * json decoder
     */
    private function jsn_decode(){
        $this->query=curl_exec($this->curl_handle);
        $this->arr=json_decode($this->query);
    }

    /**
     * printing test function
     * must printing a array of information
     */
    public function test_print(){
        print_r($this->arr);
    }

    /**
     * destructor
     */
    public function __destruct()
    {
        curl_close($this->curl_handle);
    }

    /**
     * getter of array
     * @return array
     */
    public function get_array(){
        return $this->arr;
    }

    /**
     * getter of json
     * @return json
     */
    public function get_json(){
        return $this->query;
    }
}//api_connector