<div class="modal fade" id="imageUploadModal">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">


            <div class="modal-header">
                <h5>Upload Image</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>


            <div class="modal-body">

                <div class="row">

                    <div class="col-md-6 border-end">

                        <h6>Upload Progress</h6>

                        <div class="progress mb-3">

                            <div id="uploadProgressBar" class="progress-bar progress-bar-striped progress-bar-animated"
                                style="width:0%">
                            </div>

                        </div>


                        <ul class="list-group small">

                            <li class="list-group-item" id="stage1">1️⃣ Image Selected</li>
                            <li class="list-group-item" id="stage2">2️⃣ Verifying Image</li>
                            <li class="list-group-item" id="stage3">3️⃣ Validating Format</li>
                            <li class="list-group-item" id="stage4">4️⃣ Ready for Upload</li>

                        </ul>


                        <input type="file" id="imageInput" class="form-control mt-3"
                            accept="image/png,image/jpeg,image/webp">


                        <div id="imageInfo" class="small mt-3 text-muted"></div>

                    </div>


                    <div class="col-md-6 text-center">

                        <h6>Preview</h6>

                        <div
                            style="height:300px;border:1px dashed #ccc;display:flex;align-items:center;justify-content:center">

                            <img id="previewImage" style="max-width:100%;max-height:100%;display:none">

                            <span id="previewPlaceholder">
                                No Image Selected
                            </span>

                        </div>

                    </div>

                </div>

            </div>


            <div class="modal-footer">

                <button class="btn btn-success" id="confirmUpload">
                    Use Image
                </button>

            </div>

        </div>
    </div>
</div>
