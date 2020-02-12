<?php 

class Database
{

    private function config()
    {
        return include __DIR__ . '/../config.php';
    }

    public function __construct()
    {
        $config = $this->config();
        mysql_connect(
            $config['db']['host'],
            $config['db']['user'],
            $config['db']['password']
        );
        mysql_select_db($config['db']['dbname']);
    }

    public function DBQuery($sql)
    {
        $res = mysql_query($sql);
        if (!$res) {
            echo mysql_error();
            return array();
        }

        $ret = array();
        while ($row = mysql_fetch_assoc($res)) {
            $ret[] = $row;
        }
        return $ret;
    }

    public function DBExec($sql)
    {
        $res = mysql_query($sql);
        if ($res === false) {

            return false;
        }
        else {
            return true;
        }
    }
}