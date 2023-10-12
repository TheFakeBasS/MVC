<?php
class TableLogic {
    public function __construct()
    {
        try{
        }catch (PDOException $e){
        }
    }
    public function destruct(){

    }

    public function search()
    {       
        
    }

    public function createTable($result,$act,$id_name){
        $tableheader = false;
        $html = "<div styles='overflow-x=auto'>";
        $html .= "<table>";

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            if ($tableheader == false) {
                $html .= "<tr>";
                // $html .= ($addcheckboxes == true) ? $this -> createCheckbox($controller,$row[$uniquecolumn]);
                // var_dump($row);

                foreach($row as $key => $value) 
                {
                    $html .= "<th>{$key}</th>";
                }
                $html .= "<th>Actions</th>";
                $html .= "</tr>";
                $tableheader = true;
            }

            $html .= "<tr>";
            foreach ($row as $key => $value){
                $html .= "<td data-titles='{$key}'>{$value}</td>";
            }
            $id = $row[$id_name];   
            $html .= "<td><button><a href='index.php?act={$act}&op=update&id={$id}'>update <i class='fa fa-edit'></i></button></a></td>";
            $html .= "<td><button><a href='index.php?act={$act}&op=delete&id={$id}'>Delete <i class='fa fa-trash'></i></button></a></td>";
            $html .= "<td><button><a href='index.php?act={$act}&op=read&id={$id}'>Read <i class='fa fa-book'></i></button></a></td>";
            $html .= "</tr>";        
        }
        $html .= "</table></div><br>";
        return $html;
    }
    public function createButtons($pages, $act){
            $pages = 5;
            $html = "";
            for($i=1;$i < $pages;$i++){
                $html .= "<a href= ?act=" . $act . "&op=reads&p=" . $i . ">{$i}</a>&nbsp";
        
        }
        return $html;
    }
}
