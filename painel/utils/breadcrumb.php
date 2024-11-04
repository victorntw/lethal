<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1"><?=$page?></h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="." class="text-muted"><?=$voltarpara?></a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <a href="add-<?=strtolower($page)?>" class="btn btn-success float-right m-1">Add. <?=$page?></a>
            <a href="<?=strtolower($hrefFirstBTN)?>" class="btn btn-primary float-right m-1"><?=$txtFirstBTN?></a>
        </div>
    </div>
</div>