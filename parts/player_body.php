<div class="col-9 p-3">
    <div id="accordion">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="my-btn-modal" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    My Team
                    </button>
                </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <?php
                        include '../core/player.php';
                        $player = new player();
                        echo $player->team();
                    ?>
                </div>
            </div>
        </div>
        <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="my-btn-modal" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                        Fields
                        </button>
                    </h5>
                    </div>
    
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                    </div>
                </div>
            </div>
    </div>
</div>