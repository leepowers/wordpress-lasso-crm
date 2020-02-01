<?php

/**
 * Integration API functions
 * 
 */
class lassocrm_api {

    static protected $instance = null;

    static public function get_instance() {
        if (is_null(self::$instance)) {
            self::$instance = new lassocrm_api;
        }
        return self::$instance;
    }

    static public function submit_lead(lassocrm_lead $lead, $debug = false) {
        return self::get_instance()->send_request($lead->toArray(), $debug);
    }

    public function send_request(array $post_fields, $debug = false) {
        // Post fields
        if (!isset($post_fields["projectIds"]) || empty($post_fields["projectIds"])) {
            $post_fields["projectIds"] = array();
            $post_fields["projectIds"][]= (int)LASSOCRM_API_PROJECT_ID;
        }
        if (!isset($post_fields["clientId"]) || empty($post_fields["clientId"])) {
            $post_fields["clientId"] = (int)LASSOCRM_API_CLIENT_ID;
        }
        // Website tracking
        $domain_account_id = isset($_COOKIE["lasso_crm_domain_account_id"]) ? $_COOKIE["lasso_crm_domain_account_id"] : "";
        $guid = isset($_COOKIE["lasso_crm_guid"]) ? $_COOKIE["lasso_crm_guid"] : "";
        if ($domain_account_id && $guid) {
            $post_fields["domainAccountId"] = $domain_account_id;
            $post_fields["guid"] = $guid;
        }
        // Headers
        $uid = "";
        if (function_exists("get_field")) {
            $uid = get_field("wc_lasso_uid", "option");
        }
        if (empty($uid)) {
            $uid = LASSOCRM_API_UID;
        }
        $headers = array(
            'Content-Type: application/json',
            'X-Lasso-Auth: Token='. $uid . ',Version=1.0',
        );
        if ($debug) {
            lassocrm_dump("Headers: ", $headers);
        }
        $json_post = json_encode($post_fields);
        if ($debug) {
            lassocrm_dump("post fields:", $post_fields);
            lassocrm_dump("post fields JSON:", $json_post);
        }
        // Send to Lasso API
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HEADER, true);
        curl_setopt($curl, CURLOPT_URL, LASSOCRM_API_URL);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json_post);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 25);
        $curl_result = curl_exec($curl);
        $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if ($debug) {
            lassocrm_dump($curl_result);
            lassocrm_dump(curl_getinfo($curl));
            lassocrm_dump("HTTP response code: $http_status");
        }
        if ($http_status && substr($http_status, 0, 1) == 2) {
            return true;
        } else {
            return "Lasso bad response code - '$http_status' - " . substr($http_status, 0, 1);
        }
    }


}