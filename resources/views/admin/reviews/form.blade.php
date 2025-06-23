<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label class="form-label">Kiểu đánh giá</label>
            <div>
                <label class="radio-inline me-3">
                    <input type="radio" ng-model="form.type" value="text" /> Văn bản
                </label> &nbsp;
                <label class="radio-inline">
                    <input type="radio" ng-model="form.type" value="video" /> Video
                </label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group custom-group">
                    <label class="form-label required-label">Tên khách hàng</label>
                    <input class="form-control " type="text" ng-model="form.name">
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.name[0] %></strong>
                    </span>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group custom-group">
                    <label class="form-label">Địa chỉ</label>
                    <input class="form-control " type="text" ng-model="form.position">
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.position[0] %></strong>
                    </span>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12" ng-show="form.type === 'video'">
                <div class="form-group custom-group">
                    <label class="form-label required-label">Link youtube</label>
                    <input class="form-control " type="text" ng-model="form.youtube">
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.youtube[0] %></strong>
                    </span>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12" ng-show="form.type === 'text'">
                <div class="form-group custom-group">
                    <label class="form-label required-label">Nội dung phản hồi</label>
                    <textarea id="my-textarea" class="form-control" ng-model="form.message" rows="4"></textarea>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.message[0] %></strong>
                    </span>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12" ng-show="form.type==='text'">
                <label class="form-label">Ảnh</label>
                <div class="main-img-preview">
                    <p class="help-block-img">* Ảnh định dạng: jpg, png không quá 2MB.</p>
                    <img class="thumbnail img-preview" ng-src="<% form.image.path %>">
                </div>
                <div class="input-group" style="width: 100%; text-align: center">
                    <div class="input-group-btn" style="margin: 0 auto">
                        <div class="fileUpload fake-shadow cursor-pointer">
                            <label class="mb-0" for="<% form.image.element_id %>">
                                <i class="glyphicon glyphicon-upload"></i> Chọn ảnh
                            </label>
                            <input class="d-none" id="<% form.image.element_id %>" type="file" class="attachment_upload" accept=".jpg,.jpeg,.png,.gif">
                        </div>
                    </div>
                </div>
                <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.image[0] %></strong>
                </span>
            </div>
        </div>
    </div>
</div>
