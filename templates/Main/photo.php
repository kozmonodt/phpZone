<?php include_once __DIR__ . '/../header.php'?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/modal.js"></script>
    <h1>Портфолио</h1>
    <p>
        <table style="border: solid;">
            <thead>
            <tr>
                <td colspan="3" style="text-align: center;">Фоточки</td>
            </tr>
            </thead>
            <tbody>
            <?php $iii=0; ?>
            <?php for($i=0;$i<5;$i++):?>
                <tr>

                   <?php for($ii=0; $ii<3; $ii++, $iii++):?>
                       <td>
                           <figure>
                               <img src="<?= $sources[$iii]?>" alt="Динозаврик" title="<?= $titles[$iii] ?>" width="200"
                                    onclick="modal_shit(this)" >
                               <figcaption><?= $titles[$iii] ?></figcaption>
                           </figure>
                       </td>
                   <?php endfor; ?>
                </tr>
            <?php endfor; ?>
            </tbody>
        </table>
    </p>

        <div id="myModal" class="modal">
            <span class="close" onclick="close_span()">&times;</span>
            <span class="right_arrow">&#8594;</span>
            <span class="left_arrow">&#8592;</span>
            <span class="number"></span>
            <img class="modal-content" id="img01">
            <div id="caption"></div>
        </div>
<?php include_once __DIR__ . '/../footer.php'?>
