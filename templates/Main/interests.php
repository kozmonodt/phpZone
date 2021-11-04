<?php include_once __DIR__ . '/../header.php'?>
    <div id="content">
        <script type="text/javascript" src="/js/print_list.js"></script>
        <p id="laba">Мои интересы</p>
        <UL>
            <?php foreach ($interests as $interest):?>
            <LI><a href="#<?= $interest->getInterest()?>"><?= $interest->getInterest()?></a></LI>
            <?php endforeach;?>
        </UL>
        <?php foreach ($interests as $interest):?>
            <p><?= $interest->getText()?></p>
        <?php endforeach;?>




       <!-- --><?php
/*        //Print anchor list
        echo "<UL>";
        while($hobbie = current($data)){
            echo "<LI><a href=\"#".key($data)."\">".key($data)."</a></LI>";
            next($data);
        }
        reset($data);
        echo "</UL>";
        //Print text
        while($hobbie = current($data)){
            echo "<p id=\"".key($data)."\">".$hobbie."</p>";
            next($data);
        }
        */?>
    </div>
<?php include_once __DIR__ . '/../footer.php'?>