<?php

class HelperFunction extends Eloquent {
    /*

     */

    private function messages() {

        return array(
            'successfullSave' => 'saved successfully',
            'failedSave' => 'failed to save record.contact your admin for further assistance',
            'successfullUpdate' => 'record updated successfully',
            'failedUpdate' => 'record updated successfully',
        );
    }
    //public static function return_data
    public static function return_json_data($data = null, $success = false, $message = "", $total = 0) {

        $dataToReturn = array(
            'data' => $data,
            'success' => $success,
            'message' => $message,
            'total' => $total,
        );
        return $dataToReturn;
    }
    
    public static function success_save_message($model) {

        return $model.' Saved Successfully';
    }

    public static function success_update_message($model) {

        return $model.' Updated Successfully';
    }
    public static function failed_save_message() {
        return "failed to save record.contact your admin for further assistance";
    }
    public static function filter_data($query = null, $key = 'id', $array = null, $type = 'int') {

        if ($query == null or $array == null)
            return;
        switch ($type) {

            case 'int':
                if (array_key_exists($key, $array)) {
                    $query->where($key, '=', $array[$key]);
                }
                break;
            default:

                if (array_key_exists($key, $array)) {
                    if ($key != '')
                        $query->where($key, '=', $array[$key]);
                }
                break;
        }
        return $query;
    }

    public static function get_date($format = 'Y-m-d H:i:s') {
        return Date($format);
    }

    public static function get_user_id() {
        //return Auth::user()->id;
        $testing = HelperFunction::get_config('testing');
        // if (!$testing)
        //     return Auth::user()->id;
        // else
        //     return 1;
        
        return !HelperFunction::get_config('testing') ? Auth::user()->id: 1;
    }

    /**
     * converts field names containing underscores to camel casing
     * @param  [array] $list[a list of field names.a field can or can not contain underscores]
     * @return [type]       [description]
     */
    public function array_mapper($fields) {

        //ticket_id
        foreach ($fields as $field) {

            # if $field contans an underscore, split by the underscore
            //if($field)
        }
    }

    /**
     * use to determine  messages to send to the client side when an error occurs.
     * @param  [type]  $exception [the exception that occured]
     * @param  boolean $is_error  [whether an error or a validation failure]
     * @return [type]             [returns a json object]
     */
    public static function catch_error($exception = null, $is_error = true, $message = "") {
        //$data =null,$success = false,$message="",$total=0
        try {
            //get config value with key 'environment' from the globalconfig file.
            // $env = Config::get('globalconfig.environment', 'development');
            // if ($is_error) {
            //     if ($env === 'development')
            //         return DataHelper::return_json_data(null, false, HelperFunction::format_exception($exception));
            //     return DataHelper::return_json_data(null, false, $message);
            // }
            
            if ($is_error)                
                return DataHelper::return_json_data(null, false, HelperFunction::format_exception($exception));
            
            return DataHelper::return_json_data(null, false, $message);
        } catch (Exception $e) {
            return DataHelper::return_json_data(null, false, "an error occured.contact your system admin");
        }
    }

    public static function get_admin_error_msg() {

        return Config::get("globalconfig.global_error_message");
    }
    /**
     * [function responsible for retriving  a config value from the globalconfig file]
     * @param  [string] $config_key [the config key to use to retrive the config value]
     * @return [object]             [value could be an array,string,integer etc.Depending on the value
     *                              specified in the configuration]
     */
    public static function get_config($config_key) {

        return Config::get('globalconfig.' . $config_key);
    }
    /**
     * [function responsible for retriving  a config value from the validationconfig file]
     * @param  [string] $config_key [the config key to use to retrive the config value]
     * @return [object]             [value could be an array,string,integer etc depending on the value
     *                              specified in the configuration]
     */
    public static function get_config_value($config_key) {
        //var_dump($config_key);
        return Config::get('validationconfig.' . $config_key);
    }
    /**
     * [function responsible for formating error messages.Messages are formatted depending on whether
     * the application is in a production  or in development stage]
     * @param  [exception] $exception [the exception to be formatted]
     * @return [string]              [formatted message]
     */
    private static function format_exception($exception) {

        //get config value with key 'environment' from the globalconfig file.
        $env = Config::get('globalconfig.environment');

        if ($env === 'development')
            $message = $exception->getMessage() . 'On Line Number-> ' . $exception->getLine() .
                '<br>In file ' . $exception->getFile();
        else
            $message = $exception->getMessage();
        
        HelperFunction::log_errors($exception);
        return $message;
    }
    /**
     * [function responsible for formatting validation error messages]
     * @param  [object] $validation [the validation object]
     * @return [string]             [string containing the error message]
     */
    public static function format_message($validation) {
        //var_dump($validation);
        $message = "";
        foreach ($validation as $key => $value) {

            $message = $message . $value . "<br>";
        }
        return $message;
    }
    /**
     * [function responsible for formating datetime values sent from the browser or clientSide.
     * By default the year,month,day, hour,minute,seconds date format is used.]
     * @param  [datetime] $date        [the date value to format]
     * @param  [string] $date_format   [the date format to applly to the date value]
     * @return [datetime]              [the formatted datetime value]
     */
    public static function format_date_from_client($date,$date_format='Y-m-d H:i:s'){
     
            $newDate = new DateTime($date);
            $formatted_date = $newDate->format($date_format);
            return $formatted_date;
    }
    /**
     * [function responsible for formating datetime values to the browser or clientSide.
     * a default value is provided]
     * @param  [datetime] $date        [the date value to format]
     * @param  [string] $date_format   [the date format to applly to the date value]
     * @return [datetime]              [the formatted datetime value]
     */
    public static function format_date_to_client($date,$date_format='l\, jS F Y\, H:i:s'){
     
            $newDate = new DateTime($date);
            $formatted_date = $newDate->format($date_format);
            return $formatted_date;
    }
    /**
     * [function responsible for formating float to two decimal places.
     * a default value is provided]
     * @param  [number] $date        [the number to format]
     * @return [float]              [the formatted float value]
     */
    public static function format_to_2_decimal_places($number){     
            
            //$formatted_number = round($number, 2);
            $formatted_number = number_format((float)$number, 2, '.', '');
            
            return floatval($formatted_number);
    }

    public static function paginate($page, $limit, $query_result ){ 

        if($limit == 0)  
            $limit = HelperFunction::get_config('default_page_size');
            
        $paginate_start = ($page - 1) * $limit;

        return $query_result->skip($paginate_start)
                            ->take($limit);
    }
    
    public static function is_admin(){

        $role_id = Auth::user()->role_id;
        if($role_id == HelperFunction::get_config('admin_id'))
            return true;

        return false;
    }

    public static function log_errors($e){

        Log::exception($e);

    }

    public static function paginate_raw_query($page, $limit, $query_result ){ 

        if($limit == 0)  
            $limit = HelperFunction::get_config('default_page_size');
            
        $paginate_start = ($page - 1) * $limit;

        return $query_result." limit {$limit} offset {$paginate_start}";        
    }

    public static function calculate_age($date){
     
            $age = "";
            $current_date = new DateTime();
            $b_date = new DateTime($date);

            $difference = $b_date->diff($current_date);
            $date_diff = intval($difference->days); 
            
            $yrs = intval( ($date_diff / 365) );
            $mths = intval( (($date_diff - ($yrs * 365)) / 31) );
            $days = intval( (($date_diff - ($yrs * 365)) - ($mths * 31)) );

            if ($yrs > 0) { $age = $yrs." yrs "; }
            //if ($mths > 0) { $age = $age.' '.$mths." mths "; }
            //if ($days > 0) { $age = $age.' '.$days." days"; }
            
            return $age;
    }

    public static function calculate_date_of_birth($age){
        $days = $age * 356;
        $now = strtotime(date('Y-m-d')); 
        $date_of_birth = strtotime($days."+1 day",$now);
        
        return date("Y-m-d",$date_of_birth);
    }

    public static function append_time_to_date($date, $time){
        
        $d = new DateTime($date);
        $a = strval($d->format('Y-m-d'));
        $a = $a.' '.$time;
        $dat = new DateTime($a);
        
        return $dat;
    }

    public static function get_time_from_datetime($date){

        $d = new DateTime($date);
        return $d->format('H:i');
    }

    public static function get_hour_from_datetime($date){

        $d = new DateTime($date);
        return $d->format('H');
    }

    public static function get_date_from_datetime($date){

        $d = new DateTime($date);
        return $d->format('Y-m-d');

    }

    //this function will return the number of days in a particular month
    //in a given date
    public static function get_number_of_days($year, $month){
        $month = intval($month);
        $year = intval($year);
        return cal_days_in_month(CAL_GREGORIAN, $month, $year);
        
    }


    public static function calculate_cedi_amount($amount){        
        try{
            $cedi_id = HelperFunction::get_config('cedi_id');
            $rate = DB::table('exchange_rates')->where('currency_id', '=', $cedi_id)->only('rate');
            return HelperFunction::format_to_2_decimal_places($amount * $rate);
        }catch(Exception $e){
            return HelperFunction::catch_error($e,true);
        }
    }

    public static function calculate_dolar_amount($amount){        
        try{
            $dolar_id = HelperFunction::get_config('dollar_id');
            $rate = DB::table('exchange_rates')->where('currency_id', '=', $dolar_id)->only('rate');
            return HelperFunction::format_to_2_decimal_places($amount * $rate);
        }catch(Exception $e){
            return HelperFunction::catch_error($e,true);
        }
    }

   /* public static function get_week_range($date){
        $range = [];
        $the_date = new DateTime($date);
        if($the_date->format('w') == 0){
            array_push($range, date('Y-m-d', strtotime($date . ' + 0 day')));
            array_push($range, date('Y-m-d', strtotime($date . ' + 1 day')));
            array_push($range, date('Y-m-d', strtotime($date . ' + 2 day')));
            array_push($range, date('Y-m-d', strtotime($date . ' + 3 day')));
            array_push($range, date('Y-m-d', strtotime($date . ' + 4 day')));
            array_push($range, date('Y-m-d', strtotime($date . ' + 5 day')));
            array_push($range, date('Y-m-d', strtotime($date . ' + 6 day')));
        }
        elseif ($the_date->format('w') == 1) {
            array_push($range, date('Y-m-d', strtotime('-1 day', strtotime($date))));
            array_push($range, date('Y-m-d', strtotime($date . ' + 0 day')));
            array_push($range, date('Y-m-d', strtotime($date . ' + 1 day')));
            array_push($range, date('Y-m-d', strtotime($date . ' + 2 day')));
            array_push($range, date('Y-m-d', strtotime($date . ' + 3 day')));
            array_push($range, date('Y-m-d', strtotime($date . ' + 4 day')));
            array_push($range, date('Y-m-d', strtotime($date . ' + 5 day')));
        }
        elseif ($the_date->format('w') == 2) {
            array_push($range, date('Y-m-d', strtotime('-2 day', strtotime($date))));
            array_push($range, date('Y-m-d', strtotime('-1 day', strtotime($date))));
            array_push($range, date('Y-m-d', strtotime($date . ' + 0 day')));
            array_push($range, date('Y-m-d', strtotime($date . ' + 1 day')));
            array_push($range, date('Y-m-d', strtotime($date . ' + 2 day')));
            array_push($range, date('Y-m-d', strtotime($date . ' + 3 day')));
            array_push($range, date('Y-m-d', strtotime($date . ' + 4 day')));
        }
        elseif ($the_date->format('w') == 3) {
            array_push($range, date('Y-m-d', strtotime('-3 day', strtotime($date))));
            array_push($range, date('Y-m-d', strtotime('-2 day', strtotime($date))));
            array_push($range, date('Y-m-d', strtotime('-1 day', strtotime($date))));
            array_push($range, date('Y-m-d', strtotime($date . ' + 0 day')));
            array_push($range, date('Y-m-d', strtotime($date . ' + 1 day')));
            array_push($range, date('Y-m-d', strtotime($date . ' + 2 day')));
            array_push($range, date('Y-m-d', strtotime($date . ' + 3 day')));
        }
        elseif ($the_date->format('w') == 4) {
            array_push($range, date('Y-m-d', strtotime('-4 day', strtotime($date))));
            array_push($range, date('Y-m-d', strtotime('-3 day', strtotime($date))));
            array_push($range, date('Y-m-d', strtotime('-2 day', strtotime($date))));
            array_push($range, date('Y-m-d', strtotime('-1 day', strtotime($date))));
            array_push($range, date('Y-m-d', strtotime($date . ' + 0 day')));
            array_push($range, date('Y-m-d', strtotime($date . ' + 1 day')));
            array_push($range, date('Y-m-d', strtotime($date . ' + 2 day')));
        }
        elseif ($the_date->format('w') == 5) {
            array_push($range, date('Y-m-d', strtotime('-5 day', strtotime($date))));
            array_push($range, date('Y-m-d', strtotime('-4 day', strtotime($date))));
            array_push($range, date('Y-m-d', strtotime('-3 day', strtotime($date))));
            array_push($range, date('Y-m-d', strtotime('-2 day', strtotime($date))));
            array_push($range, date('Y-m-d', strtotime('-1 day', strtotime($date))));
            array_push($range, date('Y-m-d', strtotime($date . ' + 0 day')));
            array_push($range, date('Y-m-d', strtotime($date . ' + 1 day')));
        }
        elseif ($the_date->format('w') == 6) {
            array_push($range, date('Y-m-d', strtotime('-6 day', strtotime($date))));
            array_push($range, date('Y-m-d', strtotime('-5 day', strtotime($date))));
            array_push($range, date('Y-m-d', strtotime('-4 day', strtotime($date))));
            array_push($range, date('Y-m-d', strtotime('-3 day', strtotime($date))));
            array_push($range, date('Y-m-d', strtotime('-2 day', strtotime($date))));
            array_push($range, date('Y-m-d', strtotime('-1 day', strtotime($date))));
            array_push($range, date('Y-m-d', strtotime($date . ' + 0 day')));
        }
        
        return $range;
    }*/
 
}