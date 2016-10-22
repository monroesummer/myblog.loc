<?php
$this->title = $post->title;

$this->params['breadcrumbs'][] = $this->title;
?>




<div class="panel panel-warning">
    <div class="panel-heading"><h4><span class="glyphicon glyphicon-pencil"></span> <?=$post->title?></h4></div>
    <div class="panel-body">
        <?=$post->content?>
    </div>
</div>
