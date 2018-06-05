<div class="col-9 p-3">
    <div id="accordion">

        <div class="card">
            

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body p-3">
                <h4 class="p-1">My Fields</h4>
                <ul class="list-group w-100">
                <?php
                    include '../core/manager.php';
                    $manager = new manager();
                    echo $manager->display_fields();
                ?>
                </ul>
                


                <button type="button" class="btn btn-success pull-right m-2 p-1" data-toggle="modal" data-target="#addFieldModal">
                Add Field
                </button>

                <div class="modal fade" id="addFieldModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Field Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="new_field_form" action="/IFM/core/manager.php" method="POST">
                                <div class="form-check p-0">
                                    <label for="location">Location</label>
                                    <input name="location" type="text" class="form-control" id="location" aria-describedby="emailHelp" placeholder="Location">
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-control" id="category" name="category" form="new_field_form">
                                        <option value="a">A</option>
                                        <option value="b">B</option>
                                        <option value="c">C</option>
                                    </select>
                                </div>
                                <button name="add_field" type="submit" class="btn btn-success pull-right p-1">Add</button>
                            </form>
                        </div>
                        <div class="modal-footer d-flex justify-content-center p-1">
                            <button type="button" class="my-btn-modal p-1" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                </div>

            </div>
            </div>
        </div>

        <div class="card">
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
            </div>
        </div>
    </div>
</div>