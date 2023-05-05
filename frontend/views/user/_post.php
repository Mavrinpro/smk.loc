<ul class="todo-list-wrapper list-group list-group-flush">
    <li class="list-group-item">
        <div class="todo-indicator bg-focus"></div>
        <div class="widget-content p-0">
            <div class="widget-content-wrapper">
                <div class="widget-content-left mr-2">
                    <div class="custom-checkbox custom-control">
                        <input type="checkbox" id="exampleCustomCheckbox<?= $model->id ?>" class="custom-control-input">
                        <label class="custom-control-label" for="exampleCustomCheckbox<?= $model->id ?>">&nbsp;</label>
                    </div>
                </div>
                <div class="widget-content-left">
                    <?php if ($model->status == 10){ ?>
                    <div class="widget-heading text-success"><?= $model->username ?></div>
                    <?php }else{ ?>
                    <div class="widget-heading text-danger"><?= $model->username ?></div>
                    <?php } ?>
                    <div class="widget-subheading">
                        <div>By Johnny
                            <div class="badge badge-pill badge-info ml-2">NEW</div>
                        </div>
                    </div>
                </div>
                <div class="widget-content-right widget-content-actions">
                    <div class="d-inline-block dropdown">
                        <button type="button" aria-haspopup="true" data-toggle="dropdown" aria-expanded="false" class="border-0 btn-transition btn btn-link">
                            <i class="fa fa-ellipsis-h"></i>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right" style="">
                            <h6 tabindex="-1" class="dropdown-header">Header</h6>
                            <button type="button" disabled="" tabindex="-1" class="disabled dropdown-item">Action</button>
                            <button type="button" tabindex="0" class="dropdown-item">Another Action</button>
                            <div tabindex="-1" class="dropdown-divider"></div>
                            <button type="button" tabindex="0" class="dropdown-item">Another Action</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>
</ul>
