<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List matakuliah</title>
    <?php 
        loadTop();
        loadCSS("dashboard.override.css");
    ?>
</head>
<body>

    <?php
        loadPengajarNavbar();
    ?>

    <div class="my-sidebar-right">
        <div class="my-row">
            <?php if (gettype($list_matkul) !== 'boolean') {?>
                <ul class="collection">
                        <?php foreach($list_matkul as $l) {?>
                            <li class="collection-item avatar">
                                <i class="material-icons circle red">library_books</i>
                                <span class="title">Nama matakuliah</span>
                                <p><?= $l->matkul_nama?></p>
                            </li>
                        <?php }?>
                </ul>
            <?php }else{?>
                <div class="col s12 m12 card-panel">
                    Anda belum mempunyai mata kuliah
                </div>
            <?php }?>
        </div>
    </div>


    
</body>
    <?php 
        loadBottom(); 
        loadJS("dashboard.override.js");
        loadJS("list-matkul.js");
    ?>
</html>