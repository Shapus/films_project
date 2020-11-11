<?php 
    ob_start();
?>
    <div class="row d-flex justify-content-around align-items-center">
        <a href="favorites?type=0" class="col-2 d-flex type-btn">Все</a>
        <a href="favorites?type=1" class="col-2 d-flex type-btn">Фильмы</a>
        <a href="favorites?type=2" class="col-2 d-flex type-btn">Сериалы</a>
        <a href="favorites?type=3" class="col-2 d-flex type-btn">Сезоны</a>
        <a href="favorites?type=4" class="col-2 d-flex type-btn">Серии</a>
    </div>
<?php
    View::itemRow("Фильмы", $films, null);
    View::itemRow("Сериалы", $serials, null);
    foreach($parents as $parent){
        $seasonsBuffer = array();
        $seriasBuffer = array();
        $seasons = isset($seasons)?$seasons:array();
        $serias = isset($serias)?$serias:array();
        for($i=0;$i<count($seasons);$i++){
            if($seasons[$i]['item_id'] == $parent['id']){
                array_push($seasonsBuffer, $seasons[$i]);
            }
        }
        for($i=0;$i<count($serias);$i++){
            if($serias[$i]['item_id'] == $parent['id']){
                array_push($seriasBuffer, $serias[$i]);
            }
        }
        $serias = is_null($serias)?array():$serias;
        View::itemRow($parent['title'], array_merge($seasonsBuffer, $seriasBuffer), $parent);
    }
    
    $type = isset($_GET['type'])?$_GET['type']:0;
    $category = isset($_GET['category'])?"&category={$_GET['category']}":"";
    $content = ob_get_clean();
    include_once 'view/layout/layout.php';
?>