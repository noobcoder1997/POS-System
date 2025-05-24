<!--Add CATEGORY Modal -->
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Category</h5>
                <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
            </div>
            <div class="modal-body"> 
                <form id="-add-category-form">
                    <div class="col-sm-12 mb-3">
                         
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputCategoryName" type="text" placeholder="Enter Category name" required/>
                            <label for="inputCategoryName">Category name</label>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <textarea class="form-control" id="inputDescription" type="text" placeholder="Enter Description" rows='5'></textarea>
                            <label for="inputDescription">Description</label>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="mb-3 mb-md-0" style="border: 1px solid lightgrey; border-style: solid; border-radius: 5px">
                            <p id="status">Visible</p>
                            <input id="inputStatus" type="checkbox"/>
                        </div>
                    </div>
                <br>
                <span id="add-category-message"></span>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>