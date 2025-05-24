<!-------------------------------------------------CATEGORY MODAL ------------------------------------------------->
<!-------------------------------------------------CATEGORY MODAL ------------------------------------------------->
<!-------------------------------------------------CATEGORY MODAL ------------------------------------------------->
<!--Edit Category Modal -->
<div class="modal fade" id="editCategory<?php echo $cat['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Category</h5>
                <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
            </div>
            <div class="modal-body">
                <form id="-edit-category-form" onsubmit="return edit_category_form(<?php echo $cat['id']; ?>)">
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputCategoryName<?php echo $cat['id']; ?>" type="text" placeholder="Enter Category name" value="<?php echo $cat['category_name']; ?>" required/>
                            <label for="inputCategoryName<?php echo $cat['id']; ?>">Category name</label>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputDescription<?php echo $cat['id']; ?>" type="text" placeholder="Enter Description" value="<?php echo $cat['description']; ?>"/>
                            <label for="inputDescription<?php echo $cat['id']; ?>">Description</label>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="mb-3 mb-md-0" style="border: 1px solid lightgrey; border-style: solid; border-radius: 5px">
                            <p name="status<?php echo $cat['id']; ?>">Visible</p>
                            <?php 
                                if($cat['status'] <> '0'){
                                    ?>
                                        <input id="inputStatus<?php echo $cat['id']; ?>" type="checkbox" checked/>
                                    <?php
                                }
                                else{
                                    ?>
                                        <input id="inputStatus<?php echo $cat['id']; ?>" type="checkbox"/>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                <br>
                <span id="edit-category-message<?php echo $cat['id']; ?>"></span>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Category Modal-->
<div class="modal fade" id="deleteCategory<?php echo $cat['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this category?</p>
                <br>
                <strong>This action cannot be undone.</strong>
            </div>
            <br>
            <span id="delete-category-message"></span>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCategoryConfirm" onclick="delete_category_btn(<?php echo $cat['id']; ?>)">Submit</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteCategoryConfirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
            </div>
            <div class="modal-body">
                <p>Deletion Successful:</p>
                <br>
                <strong>Category have been deleted successfully!</strong>
            </div>
            <br>
            <span id="delete-category-message"></span>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<!--========================================= END CATEGORY MODAL =========================================-->
<!--========================================= END CATEGORY MODAL =========================================-->
<!--========================================= END CATEGORY MODAL =========================================-->
