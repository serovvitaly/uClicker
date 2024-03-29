<?php

class VisitorHelper
{
    public static function getVisitorByUid($visitor_uid, $vendor)
    {
        $vendor = trim($vendor);
        $vendor = strtoupper($vendor);
        
        $visitor_obj = \Visitor::where('uid', '=', $visitor_uid)->where('vendor', '=', $vendor)->first();
        
        if (!$visitor_obj) {
            
            $visitor_obj = new \Visitor();
            
            $visitor_obj->uid    = $visitor_uid;
            
            $visitor_obj->vendor = $vendor;
            
            
            $url = "https://api.vk.com/method/users.get?user_ids={$visitor_uid}&fields=sex,bdate,city,country";
            
            $response_json = file_get_contents($url);
        
            $response_mix  = json_decode($response_json);
            
            if (!isset($response_mix->response) or !is_array($response_mix->response) or !isset($response_mix->response[0])) {
                return false;
            }
            
            $response = $response_mix->response[0];
            
            $visitor_obj->first_name = $response->first_name;
            
            $visitor_obj->last_name  = $response->last_name;
            
            $visitor_obj->sex        = $response->sex;
            
            $visitor_obj->birthday   = '';
            
            
            $visitor_obj->save();
        }
        
        return $visitor_obj;
    }
}