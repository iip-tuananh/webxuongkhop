<div class="card mb-4 border-0 shadow-sm">
    <div class="card-body">

        <style>
            .star-rating i {
                cursor: pointer;
                transition: transform .1s;
            }
            .star-rating i:hover,
            .star-rating i:hover ~ i {
                transform: scale(1.2);
            }

        </style>
        <!-- Thông tin cơ bản -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="userName" class="form-label">Người gửi</label>
                <input type="text"  class="form-control" id="userName"
                       ng-model="form.user_name"
                       value="<% form.user_name %>">
                <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.user_name[0] %></strong>
                    </span>
            </div>
            <div class="col-md-6">
                <label for="userEmail" class="form-label">Số điện thoại</label>
                <input type="text"  class="form-control"
                       ng-model="form.user_phone"
                       value="<% form.user_phone %>">
                <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.user_phone[0] %></strong>
                    </span>
            </div>

            <div class="col-md-6">
                <label for="userEmail" class="form-label">Địa chỉ</label>
                <input type="text"  class="form-control" i
                       ng-model="form.user_address"
                       value="<% form.user_address %>">
                <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.user_address[0] %></strong>
                    </span>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="createdAt" class="form-label">Ngày gửi</label>

                <input class="form-control " datetime type="text" ng-model="form.send_at" />

                <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.send_at[0] %></strong>
                    </span>
            </div>
            <div class="col-md-6" ng-if="mode != 'create'">
                <label for="approvedBy" class="form-label">Người duyệt</label>
                <input type="text"  class="form-control" id="approvedBy"
                       value="<% form.approved ? form.approved.name : '' %> – <% form.approve_date || '' %>">
                <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.name[0] %></strong>
                    </span>
            </div>

            <div class="col-md-6" ng-if="mode == 'create'">
                <label for="approvedBy" class="form-label">Người duyệt</label>
                <input type="text"  class="form-control" id="approvedBy"
                       value="<% user.name %>" disabled>
                <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.name[0] %></strong>
                    </span>
            </div>


        </div>

{{--        <div class="row g-3 mb-3">--}}
{{--            <div class="col-md-6">--}}
{{--                <label class="form-label">--}}
{{--                    <i class="fas fa-star me-1"></i>Đánh giá--}}
{{--                </label>--}}
{{--                <div class="form-control-plaintext">--}}
{{--                  <span ng-repeat="n in [1,2,3,4,5]" class="me-1">--}}
{{--                    <i ng-if="n <= form.rating" class="fas fa-star text-warning"></i>--}}
{{--                    <i ng-if="n > form.rating" class="far fa-star text-muted"></i>--}}
{{--                  </span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label">
                    <i class="fas fa-star me-1"></i>Đánh giá
                </label>
                <div class="star-rating">
      <span ng-repeat="n in [1,2,3,4,5]" class="me-1">
        <i
            class="fa-star"
            ng-class="{
            'fas text-warning': n <= form.rating,
            'far text-muted': n > form.rating
          }"
            ng-click="form.rating = n"
            ng-mouseenter="hover = n"
            ng-mouseleave="hover = 0"
        ></i>
      </span>
                </div>
            </div>
            <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.rating[0] %></strong>
                    </span>
        </div>


        <!-- Nội dung -->
        <div class="mb-4">
            <label for="userName" class="form-label">Tiêu đề</label>
            <input type="text"  class="form-control" id="title"
                   ng-model="form.title"
                   value="<% form.title %>">
            <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.title[0] %></strong>
                    </span>

            <br>
            <label for="content" class="form-label">Nội dung</label>
            <textarea class="form-control" id="content" rows="5"
                      ng-model="form.content"
            ><% form.content %></textarea>
            <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.content[0] %></strong>
                    </span>


        </div>

        <style>
            /* CSS */
            .form-select {
                border-radius: 0.75rem;       /* bo viền mềm mại */
                border: 1px solid #ced4da;    /* viền nhạt */
                background-color: #fbfcfd;    /* nền sáng hơn */
                transition: border-color .2s, box-shadow .2s;
            }
            .form-select:focus {
                border-color: #86b7fe;
                box-shadow: 0 0 .25rem rgba(13,110,253,.25);
                outline: none;
            }
        </style>
        <!-- Đổi trạng thái -->
        <div class="form-floating mb-3">
            <label for="status">Đổi trạng thái</label> &nbsp;

            <select
                class="form-select shadow-sm px-3 py-2"
                id="status"
                ng-model="form.status"

                aria-label="Đổi trạng thái">
                <option value="" disabled selected>Chọn trạng thái</option>
                <option
                    ng-selected="form.status == s.id"
                    ng-repeat="s in statues"
                    ng-value="s.id"
                    ng-class="{
        'text-warning': s.id === 1,
        'text-success': s.id === 2,
        'text-danger' : s.id === 3
      }">
                    <% s.name %>
                </option>
            </select>

            <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.status[0] %></strong>
                    </span>
        </div>

    </div>
</div>
