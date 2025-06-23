<script>
    class PostCategory extends BaseClass {
        no_set = [];
        all_categories = @json(\App\Model\Admin\PostCategory::getForSelect(2, true));

        before(form) {
            this.image = {};
            this.show_home_page = 1;
        }

        after(form) {
            if(this.categories) {
                this.all_categories = this.categories;
            }
        }


        get parent_id() {
            return this._parent_id;
        }

        set parent_id(value) {
            this._parent_id = Number(value);
        }

        get image() {
            return this._image;
        }

        set image(value) {
            this._image = new Image(value, this);
        }

        clearImage() {
            if (this.image) this.image.clear();
        }

        get submit_data() {
            let data = {
                name: this.name,
                intro: this.intro,
                parent_id: this._parent_id,
                show_home_page: this.show_home_page,
            }
            data = jsonToFormData(data);
            let image = this.image.submit_data;
            if (image) data.append('image', image);

            return data;
        }
    }
</script>
