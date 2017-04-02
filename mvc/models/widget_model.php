<?php

class Widget_Model
{
    public static function getWidgetList()
    {
        $widgetList = array();      
        $db = Database::getConnection();        
        $result = $db->query('SELECT id, name FROM widgets ORDER BY ASC'); //create new table (widgets) with id,name,status
        $i = 0;
                
        while ($row = $result->fetch()) {
            $widgetList[$i]['id'] = $row['id'];
            $widgetList[$i]['name'] = $row['name'];
            $i++;
            }
        return $widgetList;
    }
}