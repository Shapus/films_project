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
    View::itemRow("Фильмы", $films);
    View::itemRow("Сериалы", $serials);
    foreach($serialsNames as $serial){
        var_dump($serias);
        $seasons = is_null($seasons)?array():$seasons;
        $serias = is_null($serias)?array():$serias;
        View::itemRow($serial['title'], array_merge($seasons, $serias));
    }
    
    $type = isset($_GET['type'])?$_GET['type']:0;
    $category = isset($_GET['category'])?"&category={$_GET['category']}":"";
    $content = ob_get_clean();
    include_once 'view/layout/layout.php';
?>